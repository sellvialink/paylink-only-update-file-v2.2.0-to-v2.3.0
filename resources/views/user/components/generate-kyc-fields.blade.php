@if(isset($fields) && count($fields) > 0)
    @foreach ($kyc_fields as $item)
        @if ($item->type == "select")
            <div class="col-lg-12 form-group">
                <label for="{{ $item->name }}">{{ $item->label }}</label>
                <select name="{{ $item->name }}" id="{{ $item->name }}" class="form--control select2-auto-tokenize">
                    <option selected disabled>Choose One</option>
                    @foreach ($item->validation->options as $innerItem)
                        <option value="{{ $innerItem }}">{{ $innerItem }}</option>
                    @endforeach
                </select>
            </div>
        @elseif ($item->type == "file")
            <div class="col-lg-12 form-group">
                @include('admin.components.form.input',[
                    'label'        => $item->label,
                    'name'         => $item->name,
                    'type'         => $item->type,
                    'errorMessage' => false,
                    'value'        => old($item->name),
                ])
            </div>
        @elseif ($item->type == "text")
            <div class="col-lg-12 form-group">
                @include('admin.components.form.input',[
                    'label'     => $item->label,
                    'name'      => $item->name,
                    'type'      => $item->type,
                    'errorMessage' => false,
                    'value'     => old($item->name),
                ])
            </div>
        @elseif ($item->type == "textarea")
            <div class="col-lg-12 form-group">
                @include('admin.components.form.textarea',[
                    'label'     => $item->label,
                    'name'      => $item->name,
                    'errorMessage' => false,
                    'value'     => old($item->name),
                ])
            </div>
        @endif
    @endforeach
@endisset
