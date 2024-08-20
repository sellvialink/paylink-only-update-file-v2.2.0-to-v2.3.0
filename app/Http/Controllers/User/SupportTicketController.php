<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\UserSupportChat;
use App\Models\UserSupportTicket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\UserSupportTicketAttachment;
use Illuminate\Support\Facades\Notification;
use App\Events\Admin\SupportConversationEvent;
use App\Providers\Admin\BasicSettingsProvider;
use App\Notifications\User\SupportTicketNotification;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Support Tickets";
        $support_tickets = UserSupportTicket::authTickets()->orderByDesc("id")->paginate(10);
        return view('user.sections.support-ticket.index', compact('page_title','support_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Add New Ticket";
        return view('user.sections.support-ticket.create', compact('page_title'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'subject'           => "required|string|max:255",
            'desc'              => "required|string|max:5000",
            'attachment.*'      => "nullable|file|max:204800",
        ]);

        $user = Auth::user();

        $validated               = $validator->validate();
        $validated['name']       = $user->fullname;
        $validated['email']      = $user->email;
        $validated['token']      = generate_unique_string('user_support_tickets','token');
        $validated['user_id']    = $user->id;
        $validated['status']     = 3;
        $validated['created_at'] = now();
        $validated               = Arr::except($validated,['attachment']);

        try{
            $support_ticket_id = UserSupportTicket::insertGetId($validated);
            $email = $user->email;
            $basic_settings = BasicSettingsProvider::get();
            if($basic_settings->email_notification == true){
                try{
                    Notification::route('mail', $email)->notify(new SupportTicketNotification($validated));
                }catch(Exception $e) {

                }
            }
        }catch(Exception $e) {
            return back()->with(['error' => [__('Something Went Wrong! Please Try Again.')]]);
        }

        if($request->hasFile('attachment')) {
            $validated_files = $request->file("attachment");
            $attachment = [];
            $files_link = [];
            foreach($validated_files as $item) {
                $upload_file = upload_file($item,'support-attachment');
                if($upload_file != false) {
                    $attachment[] = [
                        'user_support_ticket_id'    => $support_ticket_id,
                        'attachment'                => $upload_file['name'],
                        'attachment_info'           => json_encode($upload_file),
                        'created_at'                => now(),
                    ];
                }
                $files_link[] = get_files_path('support-attachment') . "/". $upload_file['name'];
            }
            try{
                UserSupportTicketAttachment::insert($attachment);
            }catch(Exception $e) {
                $support_ticket_id->delete();
                delete_files($files_link);
                return back()->with(['error' => ['Oops! Faild to upload attachment. Please try again.']]);
            }
        }
        return redirect()->route('user.support.ticket.index')->with(['success' => ['Support ticket created successfully!']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conversation($encrypt_id)
    {
        $support_ticket_id = decrypt($encrypt_id);
        $support_ticket = UserSupportTicket::findOrFail($support_ticket_id);

        $page_title = "Conversation";
        return view('user.sections.support-ticket.conversation', compact('page_title','support_ticket'));
    }

    public function messageSend(Request $request) {
        $validator = Validator::make($request->all(),[
            'message'       => 'required|string|max:200',
            'support_token' => 'required|string',
        ]);
        if($validator->fails()) {
            $error = ['error' => $validator->errors()->all()];
            return Response::error($error,null,400);
        }
        $validated = $validator->validate();

        $support_ticket = UserSupportTicket::notSolved($validated['support_token'])->first();
        if(!$support_ticket) return Response::error(['error' => [__('This support ticket is closed.')]]);

        $data = [
            'user_support_ticket_id'    => $support_ticket->id,
            'sender'                    => auth()->user()->id,
            'sender_type'               => "USER",
            'message'                   => $validated['message'],
            'receiver_type'             => "ADMIN",
        ];

        try{
            $chat_data = UserSupportChat::create($data);
        }catch(Exception $e) {
            return $e;
            $error = ['error' => [__('SMS Sending Failed! Please try again')]];
            return Response::error($error,null,500);
        }

        try{
            event(new SupportConversationEvent($support_ticket,$chat_data));
        }catch(Exception $e) {
            return $e;
            $error = ['error' => [__('SMS Sending Failed! Please try again').'.']];
            return Response::error($error,null,500);
        }
    }
}
