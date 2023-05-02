@extends('auth.layouts')

@section('content')
    <!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }}</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
            integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
            crossorigin="anonymous" />

        <!-- AdminLTE -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
            integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
            crossorigin="anonymous" />

        <!-- iCheck -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
            integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
            crossorigin="anonymous" />

        <!-- Include pull-to-refresh.js library -->
        <script src="https://cdn.jsdelivr.net/npm/pulltorefreshjs@0.1.15/dist/pulltorefresh.min.js"></script>

    </head>

    <body>

        <!-- Add pull-to-refresh indicator -->
        <div id="ptr-element"></div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><span class="fas fa-exclamation-triangle"></span>
                            {{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                        <div class="mr-2 mb-2 d-flex justify-content-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <style>
        body {
            background-color: #565656;
            overflow: hidden;
            background-image: url("/img/Plaridel.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #ptr-element {
            text-align: center;
            font-size: 16px;
            color: #273094;
            padding: 10px;
            margin-top: -20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-header {
            color: red;
        }
    </style>

    <script>
        var ptr = PullToRefresh.init({
            mainElement: 'body',
            onRefresh: function() {
                location.reload();
            }
        });
    </script>
@endsection
