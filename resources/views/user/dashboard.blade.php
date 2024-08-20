@extends('user.layouts.master')

@section('content')
    <div class="body-wrapper">
        <div class="dashboard-area">
            <div class="dashboard-item-area">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">{{__('My Widget')}}</h4>
                </div>
                <div class="row mb-20-none">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M86 49c-14.44 0-26 6-26 12v38.66c0 7 11.18 12.34 26 12.34s26-5.31 26-12.34V61c0-6-11.56-12-26-12Zm22 31.5c0 3.94-9.41 8.34-22 8.34s-22-4.4-22-8.34V68.1c4.53 3.41 12.51 5.58 22 5.58s17.47-2.17 22-5.58ZM86 53c12.59 0 22 4.4 22 8.34s-9.41 8.34-22 8.34-22-4.4-22-8.34S73.41 53 86 53Zm0 55c-12.59 0-22-4.4-22-8.34v-12.4c4.53 3.41 12.51 5.58 22 5.58s17.47-2.17 22-5.58v12.4c0 3.94-9.41 8.34-22 8.34ZM59.86 35a7.77 7.77 0 0 1 6 3.08 12.24 12.24 0 0 1 2.6 6.52 2 2 0 0 0 2.2 1.78 2 2 0 0 0 1.78-2.19A16.35 16.35 0 0 0 69 35.54a11.38 11.38 0 0 0-18.19 0 17.08 17.08 0 0 0 0 20.91 20.56 20.56 0 0 0 2.1 2.26 2.06 2.06 0 0 0 1.35.52 2 2 0 0 0 1.48-.66 2 2 0 0 0-.14-2.83 15.47 15.47 0 0 1-1.69-1.82 13.08 13.08 0 0 1 0-15.84A7.78 7.78 0 0 1 59.86 35Z" fill="#000000" opacity="1" data-original="#000000" class=""></path><path d="M54 68H34.83A16.91 16.91 0 0 0 20 53.13v-14A17 17 0 0 0 34.91 24h49.46A17.69 17.69 0 0 0 100 39.88V45a2 2 0 0 0 4 0V22a2 2 0 0 0-2-2H18a2 2 0 0 0-2 2v48a2 2 0 0 0 2 2h36a2 2 0 0 0 0-4Zm46-32.16A13.67 13.67 0 0 1 88.4 24H100ZM30.87 24A12.93 12.93 0 0 1 20 35.12V24ZM20 57.17A12.86 12.86 0 0 1 30.79 68H20ZM54 80H18a2 2 0 0 0 0 4h36a2 2 0 0 0 0-4ZM54 92H18a2 2 0 0 0 0 4h36a2 2 0 0 0 0-4Z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                    </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Balance') }}</span>
                                    <h3 class="title">{{ get_amount(@$wallet->balance) }} <span>{{ @$wallet->currency->currency_code }}</span></h3>
                                </div>
                            </div>
                            <div id="spark5"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg id="fi_6283143" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m20 37a2 2 0 0 0 -2 2v17.764l-1.671 3.341a2 2 0 0 0 1.789 2.895h27.764a2 2 0 0 0 1.789-2.9l-1.671-3.336v-17.764a2 2 0 0 0 -2-2zm0 2h24v17h-24zm25.887 22h-27.769l1.5-3h24.765z"></path><path d="m33 49.828v-8.828h-2v8.828l-1.681-2.4-1.638 1.146 3.5 5a1 1 0 0 0 1.638 0l3.5-5-1.638-1.146z"></path><path d="m8.75 9.632h2v27.735h-2z" transform="matrix(.829 -.559 .559 .829 -11.468 9.461)"></path><path d="m40.382 22.5h27.735v2h-27.735z" transform="matrix(.559 -.829 .829 .559 4.444 55.355)"></path><path d="m25 29a1 1 0 0 0 -1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0 -1-1zm3 4h-2v-2h2z"></path><path d="m38 27a1 1 0 0 0 -1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0 -1-1zm3 4h-2v-2h2z"></path><path d="m37 17a1 1 0 0 0 -1-1h-4a1 1 0 0 0 -1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1zm-2 3h-2v-2h2z"></path><path d="m24 7h-4a1 1 0 0 0 -1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0 -1-1zm-1 4h-2v-2h2z"></path><path d="m60 8a1 1 0 0 0 1-1v-4a1 1 0 0 0 -1-1h-4a1 1 0 0 0 -1 1v4a1 1 0 0 0 1 1zm-3-4h2v2h-2z"></path><path d="m49 24a1 1 0 0 0 1-1v-4a1 1 0 0 0 -1-1h-4a1 1 0 0 0 -1 1v4a1 1 0 0 0 1 1zm-3-4h2v2h-2z"></path><path d="m35 1h-5a1 1 0 0 0 -1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0 -1-1zm-1 5h-3v-3h3z"></path><path d="m13 11a1 1 0 0 0 1-1v-7a1 1 0 0 0 -1-1h-7a1 1 0 0 0 -1 1v7a1 1 0 0 0 1 1zm-6-7h5v5h-5z"></path><path d="m16 18v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0 -1-1h-6a1 1 0 0 0 -1 1zm2 1h4v4h-4z"></path><path d="m49 6h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0 -1-1zm-1 6h-4v-4h4z"></path></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Collect Payment With Link') }}</span>
                                    <h3 class="title">{{ get_amount(@$collection_payment) }} <span>{{ @$wallet->currency->currency_code }}</span></h3>
                                </div>
                            </div>
                            <div id="spark1"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg id="fi_10327755" height="512" viewBox="0 0 60 60" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m39 23v-20c0-1.654-1.346-3-3-3h-6.172c-.801 0-1.555.313-2.121.879l-5.828 5.828c-.566.566-.879 1.32-.879 2.121v14.172c0 1.654 1.346 3 3 3h12c1.654 0 3-1.346 3-3zm-11-19.586v2.586c0 .552-.448 1-1 1h-2.586zm-5 19.586v-14h4c1.654 0 3-1.346 3-3v-4h6c.552 0 1 .448 1 1v20c0 .552-.448 1-1 1h-12c-.552 0-1-.448-1-1z"></path><path d="m.879 12.707c-.566.566-.879 1.32-.879 2.121v14.172c0 1.654 1.346 3 3 3h12c1.654 0 3-1.346 3-3v-20c0-1.654-1.346-3-3-3h-6.172c-.801 0-1.555.312-2.121.879zm6.121-3.293v2.586c0 .552-.448 1-1 1h-2.586zm9-.414v20c0 .552-.448 1-1 1h-12c-.552 0-1-.448-1-1v-14h4c1.654 0 3-1.346 3-3v-4h6c.552 0 1 .448 1 1z"></path><path d="m57 6h-6.172c-.801 0-1.555.312-2.121.879l-5.828 5.828c-.566.566-.879 1.32-.879 2.121v14.172c0 1.654 1.346 3 3 3h12c1.654 0 3-1.346 3-3v-20c0-1.654-1.346-3-3-3zm-8 3.414v2.586c0 .552-.448 1-1 1h-2.586zm9 19.586c0 .552-.448 1-1 1h-12c-.552 0-1-.448-1-1v-14h4c1.654 0 3-1.346 3-3v-4h6c.552 0 1 .448 1 1z"></path><path d="m31 28h-2c-1.103 0-2 .897-2 2v11h-.47c-.604 0-1.137.338-1.388.883-.249.54-.163 1.16.234 1.625l3.47 3.971c.291.333.712.523 1.153.523s.862-.19 1.153-.523l3.47-3.971s.005-.006.008-.009c.39-.456.476-1.076.227-1.616-.251-.545-.783-.883-1.388-.883h-.47v-11c0-1.103-.897-2-2-2zm-1 17.759-2.411-2.759h.411c.553 0 1-.447 1-1v-12h2v12c0 .553.447 1 1 1h.411z"></path><path d="m12.838 50.591c.255.526.774.85 1.364.85h.035l5.279-.131c.44-.015.854-.218 1.134-.559.278-.338.399-.778.33-1.208l-.829-5.208c-.094-.596-.513-1.063-1.092-1.221-.569-.158-1.188.04-1.565.497l-.407.491c-3.21-2.689-3.949-6.655-4.12-8.33-.122-1.029-.955-1.799-1.993-1.772h-2.011c-.562 0-1.102.237-1.481.651-.374.407-.562.956-.516 1.499.306 3.83 2.126 9.016 6.287 12.548l-.21.254c-.389.47-.467 1.098-.205 1.639zm-3.875-14.591 2.016-.008c.21 2.054 1.185 7.168 5.693 10.309.426.299 1.011.218 1.341-.182l.333-.402.575 3.607-3.664.09.188-.227c.175-.212.255-.485.223-.758-.033-.272-.177-.52-.397-.684-4.209-3.12-6.02-8.118-6.307-11.746z"></path><path d="m52.519 34.651c-.38-.414-.92-.651-1.481-.651h-1.992c-1.019-.021-1.889.743-2.014 1.789-.169 1.66-.908 5.624-4.118 8.313l-.404-.487c-.378-.461-.994-.659-1.568-.501-.579.157-.998.625-1.091 1.219l-.83 5.21c-.069.43.052.87.33 1.208.28.341.693.544 1.143.56l5.273.13h.035c.587 0 1.106-.323 1.361-.85.262-.541.184-1.169-.205-1.639l-.21-.254c4.161-3.532 5.98-8.718 6.286-12.542.047-.549-.141-1.098-.515-1.505zm-7.788 13.095c-.221.164-.364.411-.397.684-.032.272.048.546.223.758l.188.227-3.664-.09.575-3.607.333.402c.33.399.915.48 1.341.182 4.509-3.141 5.483-8.255 5.698-10.301l2.014-.01c-.29 3.638-2.101 8.636-6.31 11.756z"></path><path d="m11 60h38c1.103 0 2-.897 2-2v-2c0-1.103-.897-2-2-2h-38c-1.103 0-2 .897-2 2v2c0 1.103.897 2 2 2zm0-4h38l.002 2h-38.002z"></path><path d="m33 12h-6c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z"></path><path d="m33 17h-6c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z"></path><path d="m6 18c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z"></path><path d="m12 23h-6c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z"></path><path d="m54 18h-6c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z"></path><path d="m54 23h-6c-.553 0-1 .447-1 1s.447 1 1 1h6c.553 0 1-.447 1-1s-.447-1-1-1z"></path></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{__('Collect Payment With Invoice')}}</span>
                                    <h3 class="title">{{ get_amount(@$collection_invoice) }} <span>{{ @$wallet->currency->currency_code }}</span></h3>
                                </div>
                            </div>
                            <div id="spark2"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m473.688 301.998-39.021-67.584a7.999 7.999 0 0 0-4.029-3.456l-82.387-32.034a95.923 95.923 0 0 0 3.948-27.287c0-53.045-43.155-96.2-96.2-96.2s-96.2 43.155-96.2 96.2a95.917 95.917 0 0 0 3.948 27.287L81.36 230.958a7.999 7.999 0 0 0-4.029 3.456L38.31 301.998a7.998 7.998 0 0 0 4.029 11.456l33.919 13.189v110.08a8 8 0 0 0 5.102 7.456l171.739 66.777a7.992 7.992 0 0 0 5.798 0l171.739-66.777a8 8 0 0 0 5.102-7.456v-110.08l33.919-13.189a7.997 7.997 0 0 0 4.647-4.802 7.99 7.99 0 0 0-.616-6.654zM256 91.437c44.223 0 80.2 35.978 80.2 80.2s-35.978 80.2-80.2 80.2-80.2-35.978-80.2-80.2 35.977-80.2 80.2-80.2zm0 176.4c38.118 0 71.129-22.285 86.689-54.511l63.135 25.026L256 296.608l-149.825-58.256 63.135-25.026c15.56 32.226 48.571 54.511 86.69 54.511zM56.831 301.921l30.926-53.564 156.651 60.911-30.926 53.565zm35.429 30.943 121.821 47.368a8.002 8.002 0 0 0 9.827-3.456L248 335.048v156.758L92.26 431.25zm327.48 98.386L264 491.806V335.048l24.092 41.729a8.001 8.001 0 0 0 9.827 3.456l121.821-47.368zm-121.222-68.417-30.927-53.565 156.652-60.911 30.926 53.564zm-62.423-139.23c5.538 0 10.75-2.162 14.675-6.087l62.364-62.363c8.103-8.104 8.103-21.29-.001-29.396-3.925-3.925-9.145-6.087-14.696-6.087s-10.771 2.162-14.697 6.087l-45.906 45.907-12.252-15.417a20.662 20.662 0 0 0-16.26-7.843 20.839 20.839 0 0 0-12.912 4.51c-8.96 7.125-10.454 20.211-3.332 29.17l26.103 32.848a20.827 20.827 0 0 0 16.914 8.671zm-29.73-58.165a4.71 4.71 0 0 1 2.956-1.035c1.465 0 2.826.656 3.734 1.798l17.83 22.438a8.001 8.001 0 0 0 11.92.68l52.247-52.248c.903-.904 2.105-1.401 3.384-1.401s2.479.498 3.382 1.4a4.793 4.793 0 0 1 .001 6.77l-62.363 62.363a4.67 4.67 0 0 1-3.363 1.4 4.762 4.762 0 0 1-3.955-2.057 7.715 7.715 0 0 0-.296-.397l-26.239-33.02a4.77 4.77 0 0 1 .762-6.691zM248 45.969V8.5a8 8 0 1 1 16 0v37.469a8 8 0 0 1-16 0zm-80.779-12.666a8 8 0 0 1 13.857-8l18.734 32.449a8 8 0 0 1-13.857 8zm-60.483 50.942a7.998 7.998 0 0 1 10.928-2.928l32.449 18.734a8 8 0 0 1-8 13.856l-32.449-18.734a8 8 0 0 1-2.928-10.928zm-23.98 85.286a8 8 0 0 1 8-8h37.468c4.419 0 8 3.582 8 8s-3.581 8-8 8H90.758a8 8 0 0 1-8-8zM311.624 59.857l18.734-32.449a7.998 7.998 0 0 1 10.928-2.928 8 8 0 0 1 2.929 10.928L325.48 67.857a7.998 7.998 0 0 1-10.929 2.928 8 8 0 0 1-2.927-10.928zm45.228 54.769a8 8 0 0 1 2.928-10.928l32.449-18.734a8 8 0 0 1 8 13.856l-32.449 18.734a7.996 7.996 0 0 1-10.928-2.928zm22.711 51.116h37.468c4.419 0 8 3.582 8 8s-3.581 8-8 8h-37.468a8 8 0 1 1 0-16z" fill="#000000" opacity="1" data-original="#000000" class=""></path></g></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Collect Payment With Product') }}</span>
                                    <h3 class="title">{{ get_amount(@$collection_product) }} <span>{{ @$wallet->currency->currency_code }}</span></h3>
                                </div>
                            </div>
                            <div id="spark7"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg id="fi_3188054" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m111.003 163.882h70.037c4.142 0 7.5-3.357 7.5-7.5v-42.639c0-4.143-3.358-7.5-7.5-7.5h-70.037c-4.142 0-7.5 3.357-7.5 7.5v42.639c0 4.142 3.358 7.5 7.5 7.5zm7.5-42.639h55.037v27.639h-55.037z"></path><path d="m111.003 273.69h70.037c4.142 0 7.5-3.357 7.5-7.5v-42.639c0-4.143-3.358-7.5-7.5-7.5h-70.037c-4.142 0-7.5 3.357-7.5 7.5v42.639c0 4.143 3.358 7.5 7.5 7.5zm7.5-42.638h55.037v27.639h-55.037z"></path><path d="m111.003 383.5h70.037c4.142 0 7.5-3.357 7.5-7.5v-42.639c0-4.143-3.358-7.5-7.5-7.5h-70.037c-4.142 0-7.5 3.357-7.5 7.5v42.639c0 4.143 3.358 7.5 7.5 7.5zm7.5-42.639h55.037v27.639h-55.037z"></path><path d="m225.485 142.563h80.604c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-80.604c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m225.485 235.534h56.073c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-56.073c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m225.485 269.208h56.073c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-56.073c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m225.485 345.344h30.515c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-30.515c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5z"></path><path d="m404.707 320.916v-33.114c0-4.143-3.358-7.5-7.5-7.5h-34.616v-265.302c14.403-.174 27.116 10.208 27.116 25.253v212.413c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-212.413c0-22.195-18.057-40.253-40.253-40.253h-313.091c-22.197 0-40.254 18.058-40.254 40.253v431.493c0 22.196 18.058 40.254 40.254 40.254h313.091c55.022 0 99.786-44.765 99.786-99.787 0-40.707-24.504-75.792-59.533-91.297zm-15-5.249c-16.471-4.311-34.036-4.311-50.507 0v-20.365h50.507zm-111.877-300.667c-3.375 13.801-15.847 24.072-30.673 24.072h-78.499c-14.826 0-27.298-10.271-30.673-24.072zm-226.467 482c-13.925 0-25.254-11.329-25.254-25.254v-431.493c0-15.041 12.714-25.425 27.116-25.253v98.743c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-98.743h54.474c3.598 22.125 22.834 39.072 45.96 39.072h78.499c23.127 0 42.362-16.947 45.96-39.072h54.474v265.302h-15.891c-4.142 0-7.5 3.357-7.5 7.5v33.114c-19.997 8.851-36.56 24.083-47.096 43.101h-51.62c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h44.867c-3.676 10.39-5.684 21.563-5.684 33.196 0 10.176 1.535 19.999 4.379 29.255h-200.823v-289.817c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v297.316c0 4.143 3.358 7.5 7.5 7.5h214.312c8.293 16.688 21.12 30.739 36.861 40.532h-260.534zm313.091 0c-46.751 0-84.786-38.035-84.786-84.787 0-46.751 38.035-84.786 84.786-84.786s84.786 38.035 84.786 84.786c0 46.752-38.035 84.787-84.786 84.787z"></path><path d="m364.454 345.168c-22.466 0-43.331 11.172-55.812 29.884-2.299 3.446-1.368 8.104 2.078 10.401 3.444 2.299 8.103 1.367 10.401-2.077 8.285-12.421 21.329-20.543 35.833-22.646v51.483c0 5.801 6.606 9.441 11.511 6.337l23.992-15.186c3.5-2.215 4.542-6.848 2.326-10.348-2.215-3.499-6.847-4.543-10.349-2.326l-12.481 7.899v-37.874c25.156 3.648 44.545 25.347 44.545 51.497 0 28.698-23.348 52.046-52.045 52.046s-52.045-23.348-52.045-52.046c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5c0 36.969 30.077 67.046 67.045 67.046s67.045-30.077 67.045-67.046-30.075-67.044-67.044-67.044z"></path><path d="m432.224 306.855c1.181.682 2.471 1.006 3.743 1.006 2.592 0 5.113-1.345 6.502-3.751l9.863-17.083c2.071-3.587.842-8.174-2.745-10.245-3.587-2.07-8.174-.844-10.245 2.745l-9.863 17.083c-2.071 3.587-.842 8.174 2.745 10.245z"></path><path d="m463.686 320.481c1.919 0 3.839-.732 5.304-2.197l14.688-14.688c2.929-2.929 2.928-7.678 0-10.606-2.93-2.928-7.677-2.929-10.607.001l-14.688 14.688c-2.929 2.929-2.928 7.678 0 10.606 1.465 1.464 3.384 2.196 5.303 2.196z"></path><path d="m499.885 327.08c-2.071-3.588-6.657-4.814-10.245-2.745l-17.083 9.863c-3.587 2.071-4.816 6.658-2.745 10.245 1.389 2.406 3.91 3.751 6.502 3.751 1.272 0 2.562-.324 3.743-1.006l17.083-9.863c3.587-2.071 4.816-6.658 2.745-10.245z"></path></g></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Money Out') }}</span>
                                    <h3 class="title">{{ get_amount(@$money_out_balance) }} <span>{{ @$wallet->currency->currency_code }}</span></h3>
                                </div>
                            </div>
                            <div id="spark3"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512" id="fi_6384822"><g id="Layer_7" data-name="Layer 7"><path d="M12.6,31.751,1.385,27.078l-.77,1.845L8,32v9a1,1,0,0,0,1,1h5.055a13.279,13.279,0,0,0,1.823,2.293,2.408,2.408,0,0,0,3.742-.418l.193.243a2.342,2.342,0,0,0,4.082-.811,2.4,2.4,0,0,0,3.772-.518A2.346,2.346,0,0,0,30.561,42H45a1,1,0,0,0,1-1V9a1,1,0,0,0-1-1H9A1,1,0,0,0,8,9v8.339L1.543,13.161.457,14.84,16.63,25.305ZM10,40V32.834l2,.833v1.262A13.224,13.224,0,0,0,13,40Zm18.36.87-4.591-5.51-1.538,1.281,2.487,2.983,1.131,1.508a.764.764,0,0,1,.151.454.43.43,0,0,1-.707.293l-4.586-4.586-1.414,1.415,1.885,1.885.637,1.273a1.75,1.75,0,0,1,.185.783.365.365,0,0,1-.624.22l-3.6-4.493-1.562,1.249,1.678,2.1a3.822,3.822,0,0,1,.1.864.43.43,0,0,1-.707.293A11.173,11.173,0,0,1,14,34.929V33.286l4.449-7.119,3.21.357a78.207,78.207,0,0,0,8.6.476.743.743,0,0,1,.234,1.449A10.712,10.712,0,0,1,27.1,29H25a1,1,0,0,0-.895,1.448l4.715,9.428a1.711,1.711,0,0,1,.18.762A.376.376,0,0,1,28.36,40.87ZM24,10h6v8H24ZM10,18.633V10H22v9a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V10H44V40H30.925a3.66,3.66,0,0,0-.316-1.018L30.118,38H42V36H29.118l-2.5-5H27.1a12.752,12.752,0,0,0,4.029-.653A2.744,2.744,0,0,0,30.257,25a76.435,76.435,0,0,1-8.377-.463l-3.331-.37-.006-.006Z"></path><path d="M43.294,44.091l-5.057.722A2.62,2.62,0,0,0,36,47.381L29.87,46.155a7.035,7.035,0,0,0-4.491.538,2.494,2.494,0,0,0,.326,4.6l12.9,4.3a8.01,8.01,0,0,0,4.475.172l5.972-1.493a.99.99,0,0,0,.872.73l13,1L63.077,54,51,53.074V47H63V45H50a.989.989,0,0,0-.732.331A9.035,9.035,0,0,0,43.294,44.091Zm-.7,9.73a6.022,6.022,0,0,1-3.357-.129l-12.9-4.3a.494.494,0,0,1-.064-.91,5.023,5.023,0,0,1,3.205-.366l7.95,1.59A2.575,2.575,0,0,0,38.606,50H42V48H38.606a.607.607,0,0,1-.085-1.207l5.056-.722a7.076,7.076,0,0,1,4.89,1.109l.533.356V52.22Z"></path><rect x="34" y="32" width="8" height="2"></rect></g></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Total Payment Link') }}</span>
                                    <h3 class="title">{{ @$total_payment_link }}</h3>
                                </div>
                            </div>
                            <div id="spark4"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512" id="fi_6384822"><g id="Layer_7" data-name="Layer 7"><path d="M12.6,31.751,1.385,27.078l-.77,1.845L8,32v9a1,1,0,0,0,1,1h5.055a13.279,13.279,0,0,0,1.823,2.293,2.408,2.408,0,0,0,3.742-.418l.193.243a2.342,2.342,0,0,0,4.082-.811,2.4,2.4,0,0,0,3.772-.518A2.346,2.346,0,0,0,30.561,42H45a1,1,0,0,0,1-1V9a1,1,0,0,0-1-1H9A1,1,0,0,0,8,9v8.339L1.543,13.161.457,14.84,16.63,25.305ZM10,40V32.834l2,.833v1.262A13.224,13.224,0,0,0,13,40Zm18.36.87-4.591-5.51-1.538,1.281,2.487,2.983,1.131,1.508a.764.764,0,0,1,.151.454.43.43,0,0,1-.707.293l-4.586-4.586-1.414,1.415,1.885,1.885.637,1.273a1.75,1.75,0,0,1,.185.783.365.365,0,0,1-.624.22l-3.6-4.493-1.562,1.249,1.678,2.1a3.822,3.822,0,0,1,.1.864.43.43,0,0,1-.707.293A11.173,11.173,0,0,1,14,34.929V33.286l4.449-7.119,3.21.357a78.207,78.207,0,0,0,8.6.476.743.743,0,0,1,.234,1.449A10.712,10.712,0,0,1,27.1,29H25a1,1,0,0,0-.895,1.448l4.715,9.428a1.711,1.711,0,0,1,.18.762A.376.376,0,0,1,28.36,40.87ZM24,10h6v8H24ZM10,18.633V10H22v9a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V10H44V40H30.925a3.66,3.66,0,0,0-.316-1.018L30.118,38H42V36H29.118l-2.5-5H27.1a12.752,12.752,0,0,0,4.029-.653A2.744,2.744,0,0,0,30.257,25a76.435,76.435,0,0,1-8.377-.463l-3.331-.37-.006-.006Z"></path><path d="M43.294,44.091l-5.057.722A2.62,2.62,0,0,0,36,47.381L29.87,46.155a7.035,7.035,0,0,0-4.491.538,2.494,2.494,0,0,0,.326,4.6l12.9,4.3a8.01,8.01,0,0,0,4.475.172l5.972-1.493a.99.99,0,0,0,.872.73l13,1L63.077,54,51,53.074V47H63V45H50a.989.989,0,0,0-.732.331A9.035,9.035,0,0,0,43.294,44.091Zm-.7,9.73a6.022,6.022,0,0,1-3.357-.129l-12.9-4.3a.494.494,0,0,1-.064-.91,5.023,5.023,0,0,1,3.205-.366l7.95,1.59A2.575,2.575,0,0,0,38.606,50H42V48H38.606a.607.607,0,0,1-.085-1.207l5.056-.722a7.076,7.076,0,0,1,4.89,1.109l.533.356V52.22Z"></path><rect x="34" y="32" width="8" height="2"></rect></g></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Total Invoice') }}</span>
                                    <h3 class="title">{{ @$total_invoice }}</h3>
                                </div>
                            </div>
                            <div id="spark6"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512" id="fi_6384822"><g id="Layer_7" data-name="Layer 7"><path d="M12.6,31.751,1.385,27.078l-.77,1.845L8,32v9a1,1,0,0,0,1,1h5.055a13.279,13.279,0,0,0,1.823,2.293,2.408,2.408,0,0,0,3.742-.418l.193.243a2.342,2.342,0,0,0,4.082-.811,2.4,2.4,0,0,0,3.772-.518A2.346,2.346,0,0,0,30.561,42H45a1,1,0,0,0,1-1V9a1,1,0,0,0-1-1H9A1,1,0,0,0,8,9v8.339L1.543,13.161.457,14.84,16.63,25.305ZM10,40V32.834l2,.833v1.262A13.224,13.224,0,0,0,13,40Zm18.36.87-4.591-5.51-1.538,1.281,2.487,2.983,1.131,1.508a.764.764,0,0,1,.151.454.43.43,0,0,1-.707.293l-4.586-4.586-1.414,1.415,1.885,1.885.637,1.273a1.75,1.75,0,0,1,.185.783.365.365,0,0,1-.624.22l-3.6-4.493-1.562,1.249,1.678,2.1a3.822,3.822,0,0,1,.1.864.43.43,0,0,1-.707.293A11.173,11.173,0,0,1,14,34.929V33.286l4.449-7.119,3.21.357a78.207,78.207,0,0,0,8.6.476.743.743,0,0,1,.234,1.449A10.712,10.712,0,0,1,27.1,29H25a1,1,0,0,0-.895,1.448l4.715,9.428a1.711,1.711,0,0,1,.18.762A.376.376,0,0,1,28.36,40.87ZM24,10h6v8H24ZM10,18.633V10H22v9a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V10H44V40H30.925a3.66,3.66,0,0,0-.316-1.018L30.118,38H42V36H29.118l-2.5-5H27.1a12.752,12.752,0,0,0,4.029-.653A2.744,2.744,0,0,0,30.257,25a76.435,76.435,0,0,1-8.377-.463l-3.331-.37-.006-.006Z"></path><path d="M43.294,44.091l-5.057.722A2.62,2.62,0,0,0,36,47.381L29.87,46.155a7.035,7.035,0,0,0-4.491.538,2.494,2.494,0,0,0,.326,4.6l12.9,4.3a8.01,8.01,0,0,0,4.475.172l5.972-1.493a.99.99,0,0,0,.872.73l13,1L63.077,54,51,53.074V47H63V45H50a.989.989,0,0,0-.732.331A9.035,9.035,0,0,0,43.294,44.091Zm-.7,9.73a6.022,6.022,0,0,1-3.357-.129l-12.9-4.3a.494.494,0,0,1-.064-.91,5.023,5.023,0,0,1,3.205-.366l7.95,1.59A2.575,2.575,0,0,0,38.606,50H42V48H38.606a.607.607,0,0,1-.085-1.207l5.056-.722a7.076,7.076,0,0,1,4.89,1.109l.533.356V52.22Z"></path><rect x="34" y="32" width="8" height="2"></rect></g></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Total Product') }}</span>
                                    <h3 class="title">{{ @$total_product }}</h3>
                                </div>
                            </div>
                            <div id="spark8"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                        <div class="dashbord-item">
                            <div class="dashboard-inner-item">
                                <div class="dashboard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512" id="fi_6384822"><g id="Layer_7" data-name="Layer 7"><path d="M12.6,31.751,1.385,27.078l-.77,1.845L8,32v9a1,1,0,0,0,1,1h5.055a13.279,13.279,0,0,0,1.823,2.293,2.408,2.408,0,0,0,3.742-.418l.193.243a2.342,2.342,0,0,0,4.082-.811,2.4,2.4,0,0,0,3.772-.518A2.346,2.346,0,0,0,30.561,42H45a1,1,0,0,0,1-1V9a1,1,0,0,0-1-1H9A1,1,0,0,0,8,9v8.339L1.543,13.161.457,14.84,16.63,25.305ZM10,40V32.834l2,.833v1.262A13.224,13.224,0,0,0,13,40Zm18.36.87-4.591-5.51-1.538,1.281,2.487,2.983,1.131,1.508a.764.764,0,0,1,.151.454.43.43,0,0,1-.707.293l-4.586-4.586-1.414,1.415,1.885,1.885.637,1.273a1.75,1.75,0,0,1,.185.783.365.365,0,0,1-.624.22l-3.6-4.493-1.562,1.249,1.678,2.1a3.822,3.822,0,0,1,.1.864.43.43,0,0,1-.707.293A11.173,11.173,0,0,1,14,34.929V33.286l4.449-7.119,3.21.357a78.207,78.207,0,0,0,8.6.476.743.743,0,0,1,.234,1.449A10.712,10.712,0,0,1,27.1,29H25a1,1,0,0,0-.895,1.448l4.715,9.428a1.711,1.711,0,0,1,.18.762A.376.376,0,0,1,28.36,40.87ZM24,10h6v8H24ZM10,18.633V10H22v9a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V10H44V40H30.925a3.66,3.66,0,0,0-.316-1.018L30.118,38H42V36H29.118l-2.5-5H27.1a12.752,12.752,0,0,0,4.029-.653A2.744,2.744,0,0,0,30.257,25a76.435,76.435,0,0,1-8.377-.463l-3.331-.37-.006-.006Z"></path><path d="M43.294,44.091l-5.057.722A2.62,2.62,0,0,0,36,47.381L29.87,46.155a7.035,7.035,0,0,0-4.491.538,2.494,2.494,0,0,0,.326,4.6l12.9,4.3a8.01,8.01,0,0,0,4.475.172l5.972-1.493a.99.99,0,0,0,.872.73l13,1L63.077,54,51,53.074V47H63V45H50a.989.989,0,0,0-.732.331A9.035,9.035,0,0,0,43.294,44.091Zm-.7,9.73a6.022,6.022,0,0,1-3.357-.129l-12.9-4.3a.494.494,0,0,1-.064-.91,5.023,5.023,0,0,1,3.205-.366l7.95,1.59A2.575,2.575,0,0,0,38.606,50H42V48H38.606a.607.607,0,0,1-.085-1.207l5.056-.722a7.076,7.076,0,0,1,4.89,1.109l.533.356V52.22Z"></path><rect x="34" y="32" width="8" height="2"></rect></g></svg>
                                </div>
                                <div class="dashboard-content">
                                    <span class="sub-title">{{ __('Total Product Link') }}</span>
                                    <h3 class="title">{{ @$total_product_link }}</h3>
                                </div>
                            </div>
                            <div id="spark9"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chart-area mt-30">
            <div class="row mb-20-none">
                <div class="col-xl-12 mb-20">
                    <div class="dashboard-header-wrapper">
                        <h4 class="title">{{ __('Transaction Chart') }}</h4>
                    </div>
                    <div class="chart-wrapper">
                        <div class="chart-container">
                            <div id="chart1" data-chart_one_data="{{ json_encode($chart_one_data) }}"  class="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-area mt-30">
            <div class="dashboard-header-wrapper">
                <h4 class="title">{{ __('Transaction Log') }}</h4>
                <div class="dashboard-btn-wrapper">
                    <div class="dashboard-btn">
                        <a href="{{ setRoute('user.transactions.index') }}" class="btn--base active">{{ __('View all') }}</a>
                    </div>
                </div>
            </div>
            <div class="table-wrapper">
                <div class="item-wrapper">
                    @include('user.components.transaction-log', compact('transactions'))
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="{{ asset('public/frontend/') }}/js/apexcharts.js"></script>
<script>

        var chart1 = $('#chart1');
        var chart_one_data = chart1.data('chart_one_data');

    var options = {
          series: [
          {
            name: "{{__('Payment Link')}}",
            data: chart_one_data.transaction_pay_link
          },
          {
            name: "{{ __('Invoice') }}",
            data: chart_one_data.transaction_pay_invoice
          },
          {
            name: "{{ __('Product') }}",
            data: chart_one_data.transaction_pay_product
          },
          {
            name: "{{ __('Money Out') }}",
            data: chart_one_data.transaction_money_out
          }
        ],
          chart: {
          height: 350,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454', '#6C86D6'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: '{{ __("Payment Link, Invoice, Money Out") }}',
          align: 'left'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
            type: 'datetime',
            categories: chart_one_data.transaction_month
        },
        yaxis: {
          title: {
            text: 'Payment'
          },
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
</script>

<script>
    Apex.grid = {
  padding: {
    right: 0,
    left: 0
  }
}

Apex.dataLabels = {
  enabled: false
}

var randomizeArray = function (arg) {
  var array = arg.slice();
  var currentIndex = array.length, temporaryValue, randomIndex;

  while (0 !== currentIndex) {

    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

// data for the sparklines that appear below header area
var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

// the default colorPalette for this dashboard
//var colorPalette = ['#01BFD6', '#5564BE', '#F7A600', '#EDCD24', '#F74F58'];
var colorPalette = ['#00D8B6','#008FFB',  '#FEB019', '#FF4560', '#775DD0']

var spark1 = {
  chart: {
    id: 'sparkline1',
    group: 'sparklines',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Sales',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  yaxis: {
    min: 0
  },
  xaxis: {
    type: 'datetime',
  },
  colors: ['#DCE6EC'],
}

var spark2 = {
  chart: {
    id: 'sparkline2',
    group: 'sparklines2',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Expenses',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  yaxis: {
    min: 0
  },
  xaxis: {
    type: 'datetime',
  },
  colors: ['#DCE6EC'],
}

var spark3 = {
  chart: {
    id: 'sparkline3',
    group: 'sparklines3',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}

var spark4 = {
  chart: {
    id: 'sparkline4',
    group: 'sparklines4',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}

var spark5 = {
  chart: {
    id: 'sparkline5',
    group: 'sparklines5',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}

var spark6 = {
  chart: {
    id: 'sparkline6',
    group: 'sparklines6',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}
var spark7 = {
  chart: {
    id: 'sparkline7',
    group: 'sparklines7',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}
var spark8 = {
  chart: {
    id: 'sparkline8',
    group: 'sparklines8',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}
var spark9 = {
  chart: {
    id: 'sparkline9',
    group: 'sparklines9',
    type: 'area',
    height: 60,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight',
    width: 2
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2018-09-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#DCE6EC'],
}

new ApexCharts(document.querySelector("#spark1"), spark1).render();
new ApexCharts(document.querySelector("#spark2"), spark2).render();
new ApexCharts(document.querySelector("#spark3"), spark3).render();
new ApexCharts(document.querySelector("#spark4"), spark4).render();
new ApexCharts(document.querySelector("#spark5"), spark5).render();
new ApexCharts(document.querySelector("#spark6"), spark6).render();
new ApexCharts(document.querySelector("#spark7"), spark7).render();
new ApexCharts(document.querySelector("#spark8"), spark8).render();
new ApexCharts(document.querySelector("#spark9"), spark9).render();
</script>
@endpush
