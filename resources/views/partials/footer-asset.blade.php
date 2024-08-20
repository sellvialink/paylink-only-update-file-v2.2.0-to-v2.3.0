<!-- jquery -->
<script src="{{ asset('public/frontend/') }}/js/jquery-3.6.0.js"></script>
<!-- bootstrap js -->
<script src="{{ asset('public/frontend/') }}/js/bootstrap.bundle.js"></script>
<!-- swipper js -->
<script src="{{ asset('public/frontend/') }}/js/swiper.js"></script>
<!-- odometer js -->
<script src="{{ asset('public/frontend/') }}/js/odometer.js"></script>
<!-- viewport js -->
<script src="{{ asset('public/frontend/') }}/js/viewport.jquery.js"></script>
<!-- nice select js -->
<script src="{{ asset('public/frontend/') }}/js/jquery.nice-select.js"></script>
<!-- smooth scroll js -->
<script src="{{ asset('public/frontend/') }}/js/smoothscroll.js"></script>
<!-- Magnific Popup -->
<script src="{{ asset('public/backend/library/popup/jquery.magnific-popup.js') }}"></script>
<!-- Select 2 JS -->
<script src="{{ asset('public/backend/js/select2.js') }}"></script>

<script>
    var fileHolderAfterLoad = {};
</script>

<script src="https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-script.js" type="module"></script>
<script type="module">
    import { fileHolderSettings } from "https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-settings.js";
    import { previewFunctions } from "https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-script.js";

    var inputFields = document.querySelector(".file-holder");
    fileHolderAfterLoad.previewReInit = function(inputFields){
        previewFunctions.previewReInit(inputFields)
    };

    fileHolderSettings.urls.uploadUrl = "{{ setRoute('fileholder.upload') }}";
    fileHolderSettings.urls.removeUrl = "{{ setRoute('fileholder.remove') }}";

</script>

<script>
    function fileHolderPreviewReInit(selector) {
        var inputField = document.querySelector(selector);
        fileHolderAfterLoad.previewReInit(inputField);
    }
</script>

<!-- main -->
<script src="{{ asset('public/frontend/') }}/js/main.js"></script>


<script>
    //************* Pop Up Modal  ***************/
    function openAlertModal(URL,target,message='{{ __("Are you sure to delete") }} ?',actionBtnText = "{{ __('Remove') }}",method = "DELETE"){
        if(URL == "" || target == "") {
            return false;
        }

        var method = `<input type="hidden" name="_method" value="${method}">`;
        openModalByContent(
            {
                content: `<div class="card modal-alert border-0">
                            <div class="card-body">
                                <form method="POST" action="${URL}">
                                    <input type="hidden" name="_token" value="${laravelCsrf()}">
                                    ${method}
                                    <div class="head mb-3">
                                        ${message}
                                        <input type="hidden" name="target" value="${target}">
                                    </div>
                                    <div class="foot d-flex align-items-center justify-content-between">
                                        <button type="button" class="modal-close btn btn--info rounded text-light">{{ __('Close') }}</button>
                                        <button type="submit" class="alert-submit-btn btn btn--danger btn-loading rounded text-light">${actionBtnText}</button>
                                    </div>
                                </form>
                            </div>
                        </div>`,
                        },

        );
    }
</script>
