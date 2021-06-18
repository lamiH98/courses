@extends('dashboard.layout.master_layout')

@section('title')
    @lang('size.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('size.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('size.create.sizes')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('size.create.add_new')</span></a></li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                @lang('size.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                                <button onclick="startFCM()"
                                    class="btn btn-danger btn-flat">Allow notification
                                </button>

                            <div class="card mt-3">
                                <div class="card-body">
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <form action="{{ route('send-notification') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Message Title</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label>Message Body</label>
                                            <textarea class="form-control" name="body"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- The core Firebase JS SDK is always required and must be listed first -->

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyAu0jnElPDP8uWBzYfjt05v7iDjkZs0iMI",
            authDomain: "ecommerce-1e019.firebaseapp.com",
            projectId: "ecommerce-1e019",
            storageBucket: "ecommerce-1e019.appspot.com",
            messagingSenderId: "221076419297",
            appId: "1:221076419297:web:3e755c31ed81d673563da0",
            measurementId: 'G-measurement-id',
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function () {
                    console.log(messaging.getToken());
                    return messaging.getToken()
                })
                .then(function (response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route("save-token") }}',
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            alert('Token stored.');
                        },
                        error: function (error) {
                            alert(error);
                        },
                    });

                }).catch(function (error) {
                    alert(error);
                });
        }

        messaging.onMessage(function (payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });

    </script>
@endsection
