@php
    $default_lang_code = language_const()::NOT_REMOVABLE;
    $system_default_lang = get_default_language_code();
    $languages_for_js_use = $languages->toJson();
@endphp
@extends('admin.layouts.master')

@push('css')
    <style>
        .fileholder {
            min-height: 374px !important;
        }

        .fileholder-files-view-wrp.accept-single-file .fileholder-single-file-view,
        .fileholder-files-view-wrp.fileholder-perview-single .fileholder-single-file-view {
            height: 330px !important;
        }
    </style>
@endpush

@section('page-title')
    @include('admin.components.page-title', ['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb', [
        'breadcrumbs' => [
            [
                'name' => __('Dashboard'),
                'url' => setRoute('admin.dashboard'),
            ],
        ],
        'active' => __('Web Journal'),
    ])
@endsection

@section('content')
    <div class="table-area mt-15">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">{{ __($page_title) }}</h5>
                <div class="table-btn-area">
                    <a href="#web-journal-add" class="btn--base modal-btn"><i class="fas fa-plus me-1"></i> {{ __('Add Web Journal') }}</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Tags') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data ?? [] as $key => $item)
                            <tr data-item="{{ json_encode($item) }}">
                                <td>
                                    <ul class="user-list">
                                        <li><img src="{{ get_image($item->image, 'web-journal') }}" alt="Campaign Image"></li>
                                    </ul>
                                </td>
                                <td>
                                    {{ $item->title->language->$system_default_lang->title ? Str::limit($item->title->language->$system_default_lang->title, 35, '...') : '' }}
                                </td>
                                <td>
                                    @isset($item->tags->language->$system_default_lang->tags)
                                        @foreach ($item->tags->language->$system_default_lang->tags as $tag)
                                            {{ $loop->index > 0 ? ',' : '' }}
                                            {{ $tag }}
                                        @endforeach
                                    @endisset
                                </td>
                                <td>
                                    @include('admin.components.form.switcher', [
                                        'name' => 'campaign_status',
                                        'value' => $item->status,
                                        'options' => [__('Enable') => 1, __('Disable') => 0],
                                        'onload' => true,
                                        'data_target' => $item->id,
                                        'permission' => 'admin.setup.sections.web-jornal.status.update',
                                    ])
                                </td>
                                <td>
                                    <a href="{{ setRoute('admin.setup.sections.web-jornal.edit', $item->id) }}" class="btn btn--base"><i
                                        class="las la-pencil-alt"></i></a>
                                    <button class="btn btn--base btn--danger delete-modal-button"><i
                                            class="las la-trash-alt"></i></button>
                                </td>
                            </tr>
                        @empty
                            @include('admin.components.alerts.empty', ['colspan' => 5])
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.components.modals.site-section.web-jornal-add')

@endsection

@push('script')
    <script>
        openModalWhenError("web-journal-add", "#web-journal-add");

        var default_language = "{{ $default_lang_code }}";
        var system_default_language = "{{ $system_default_lang }}";
        var languages = "{{ $languages_for_js_use }}";
        languages = JSON.parse(languages.replace(/&quot;/g, '"'));


        $(".delete-modal-button").click(function() {
            var oldData = JSON.parse($(this).parents("tr").attr("data-item"));

            var actionRoute = "{{ setRoute('admin.setup.sections.web-jornal.delete') }}";
            var target = oldData.id;

            var message = `{{ __('Are you sure to') }} <strong>{{ __('Delete') }}</strong> {{ __('item') }}?`;

            openDeleteModal(actionRoute, target, message);
        });

        // Switcher
        switcherAjax("{{ setRoute('admin.setup.sections.web-jornal.status.update') }}");
    </script>
@endpush
