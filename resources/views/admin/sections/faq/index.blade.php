@php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp

@extends('admin.layouts.master')

@push('css')
    <style>
        .fileholder {
            min-height: 194px !important;
        }
        textarea {
            min-height: 150px;
        }
        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,.fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view{
            height: 150px !important;
        }
    </style>
@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Setup FAQ")])
@endsection

@section('content')
<div class="custom-card">
    <div class="card-header">
        <h6 class="title">{{ __($page_title) }}</h6>
    </div>
    <div class="card-body">
        <form class="card-form" action="{{ setRoute('admin.setup.sections.section.update',$slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center mb-10-none">
                <div class="col-xl-12 col-lg-12">
                    <div class="product-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link @if (get_default_language_code() == language_const()::NOT_REMOVABLE) active @endif" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="english" aria-selected="false">English</button>
                                @foreach ($languages as $item)
                                    <button class="nav-link @if (get_default_language_code() == $item->code) active @endif" id="{{$item->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$item->name}}" type="button" role="tab" aria-controls="{{ $item->name }}" aria-selected="true">{{ $item->name }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane @if (get_default_language_code() == language_const()::NOT_REMOVABLE) fade show active @endif" id="english" role="tabpanel" aria-labelledby="english-tab">
                                <div class="form-group">
                                    @include('admin.components.form.input',[
                                        'label'     => __('Heading')."*",
                                        'name'      => $default_lang_code . "_heading",
                                        'value'     => old($default_lang_code . "_heading",$data->value->language->$default_lang_code->heading ?? "")
                                    ])
                                </div>

                                <div class="form-group">
                                    @include('admin.components.form.textarea',[
                                        'label'     => __('Sub Heading')."*",
                                        'name'      => $default_lang_code . "_sub_heading",
                                        'value'     => old($default_lang_code . "_sub_heading",$data->value->language->$default_lang_code->sub_heading ?? ""),
                                        'data_limit' => 450,
                                    ])
                                </div>
                            </div>

                            @foreach ($languages as $item)
                                @php
                                    $lang_code = $item->code;
                                @endphp
                                <div class="tab-pane @if (get_default_language_code() == $item->code) fade show active @endif" id="{{ $item->name }}" role="tabpanel" aria-labelledby="english-tab">
                                    <div class="form-group">
                                        @include('admin.components.form.input',[
                                            'label'     => __('Heading')."*",
                                            'name'      => $lang_code . "_heading",
                                            'value'     => old($lang_code . "_heading",$data->value->language->$lang_code->heading ?? "")
                                        ])
                                    </div>
                                    <div class="form-group">
                                        @include('admin.components.form.textarea',[
                                            'label'     => __('Sub Heading')."*",
                                            'name'      => $lang_code . "_sub_heading",
                                            'value'     => old($lang_code . "_sub_heading",$data->value->language->$lang_code->sub_heading ?? ""),
                                            'data_limit' => 450,
                                        ])
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 form-group">
                    @include('admin.components.button.form-btn',[
                        'class'         => "w-100 btn-loading",
                        'text'          => __('submit'),
                        'permission'    => "admin.setup.sections.section.update"
                    ])
                </div>
            </div>
        </form>
    </div>
</div>
<div class="table-area">
    <div class="table-wrapper">
        <div class="table-header">
            <h5 class="title">{{ __("Setup FAQ") }}</h5>
            <div class="table-btn-area">
                @include('admin.components.link.add-default',[
                    'text'          => "Add FAQ",
                    'href'          => "#faq-add",
                    'class'         => "modal-btn",
                    'permission'    => "admin.setup-sections.section.item.store",
                ])
            </div>
        </div>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>{{ __('Question') }}</th>
                        <th>{{ __('Answer') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data->value->items ?? [] as $key => $item)
                        <tr data-item="{{ json_encode($item) }}">
                            <td>{{ $item->language->$system_default_lang->question ?? "" }}</td>
                            <td style="width: 50%">{{ $item->language->$system_default_lang->answer ? Str::limit($item->language->$system_default_lang->answer, 50, '...') : "" }}</td>
                            <td>
                                <button class="btn btn--base view-modal-button"><i class="las la-eye"></i></button>
                                <button class="btn btn--base edit-modal-button"><i class="las la-pencil-alt"></i></button>
                                <button class="btn btn--base btn--danger delete-modal-button" ><i class="las la-trash-alt"></i></button>
                            </td>
                        </tr>
                    @empty
                        @include('admin.components.alerts.empty',['colspan' => 4])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="faq-veiw-modal" class="mfp-hide">
    <div class="modal-data">
        <div class="modal-header px-0">
            <h5 class="modal-title">{{ __("View Faq") }}</h5>
        </div>
        <div class="modal-form-data">
            <p class="view"></p>
        </div>
    </div>
</div>

{{-- faq Edit Modal --}}
@include('admin.components.modals.edit-faq')

{{-- faq Add Modal --}}
@include('admin.components.modals.faq-add')

@endsection

@push('script')
    <script src="{{ asset('public/backend/js/fontawesome-iconpicker.js') }}"></script>
    <script>
        // icon picker
        $('.icp-auto').iconpicker();
    </script>

    <script>
        openModalWhenError("faq-add","#faq-add");
        openModalWhenError("faq-edit","#faq-edit");

        var default_language = "{{ $default_lang_code }}";
        var system_default_language = "{{ $system_default_lang }}";
        var languages = "{{ $languages_for_js_use }}";
        languages = JSON.parse(languages.replace(/&quot;/g,'"'));

        $(".edit-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var editModal = $("#faq-edit");

            editModal.find("form").first().find("input[name=target]").val(oldData.id);
            editModal.find("input[name="+default_language+"_question_edit]").val(oldData.language[default_language].question);
            editModal.find("textarea[name="+default_language+"_answer_edit]").val(oldData.language[default_language].answer);

            $.each(languages,function(index,item) {
                editModal.find("input[name="+item.code+"_question_edit]").val((oldData.language[item.code] == undefined) ? '' : oldData.language[item.code].question);
                editModal.find("textarea[name="+item.code+"_answer_edit]").val((oldData.language[item.code] == undefined) ? '' : oldData.language[item.code].answer);
            });
            editModal.find("input[name=image]").attr("data-preview-name",oldData.image);
            fileHolderPreviewReInit("#faq-edit input[name=image]");
            openModalBySelector("#faq-edit");

        });

        $(".view-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));
            var viewModal = $("#faq-veiw-modal");
            viewModal.find(".view").text(oldData.language[default_language].answer);
            openModalBySelector("#faq-veiw-modal");
        });

        $(".delete-modal-button").click(function(){
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute =  "{{ setRoute('admin.setup.sections.section.item.delete',$slug) }}";
            var target = oldData.id;

            var message     = `{{ __('Are you sure to') }} <strong>{{ __('Delete') }}</strong> {{ __('item') }}?`;

            openDeleteModal(actionRoute,target,message);
        });
    </script>
@endpush
