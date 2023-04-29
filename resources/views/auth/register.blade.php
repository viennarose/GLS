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


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                                                                            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                                                                            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                                                            <![endif]-->
    </head>

    <body>

        <!-- Add pull-to-refresh indicator -->
        <div id="ptr-element"></div>
        
        <div class="container" style="position:relative; top: -50px;">
            <div class="wrapper">

                <p
                    style="font-size: 20px; text-align: center; font-weight: 500; color:rgb(77, 77, 77); position:relative; top:10px;">
                    Register an Account</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row" style="margin-bottom: 20px;">
                        <i class="fas fa-user"></i>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red; font-weight:normal; font-size: 12px;">{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Email Address" value="{{ old('email') }}" required
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red; font-weight:normal; font-size: 12px;">{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red; font-weight:normal; font-size: 12px;">{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="Confirm Password" required autocomplete="new-password">
                    </div>

                    <label for="show-password-checkbox"
                        style="display: flex; align-items: center; font-weight: 400; font-size: 13px; color:#716e6e;">
                        <input type="checkbox" id="show-password-checkbox" style="margin-right: 5px;">
                        Show password
                    </label>

                    <div class="row button" style="margin-top: 20px;">
                        <input type="submit" value="Register">
                    </div>
                    <div class="login-link">Already have an account? <a href="/login">Login</a></div>
                </form>
            </div>
        </div>
    </body>

    </html>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #e1e1e1;
            overflow: hidden;
        }

        ::selection {
            background: rgba(26, 188, 156, 0.3);
        }

        .container {
            max-width: 440px;
            padding: 0 20px;
            margin: 100px auto;
        }

        .wrapper {
            width: 100%;
            background: #fff;
            border-radius: 5px;
            align-items: center;
            box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
        }

        .wrapper form {
            padding: 30px 25px 25px 25px;
        }

        .wrapper form .row {
            height: 45px;
            margin-bottom: 15px;
            position: relative;
        }

        .wrapper form .row input {
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 60px;
            border-radius: 5px;
            border: 1px solid lightgrey;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        form .row input:focus {
            border-color: #273094;
            box-shadow: inset 0px 0px 2px 2px rgba(26, 188, 156, 0.25);
        }

        form .row input::placeholder {
            color: #999;
        }

        .wrapper form .row i {
            position: absolute;
            width: 47px;
            height: 100%;
            color: #fff;
            font-size: 18px;
            background: #273094;
            border: 1px solid #273094;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .wrapper form .button input {
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            padding-left: 0px;
            background: #273094;
            border: none;
            cursor: pointer;
        }

        form .button input:hover {
            background: #716e6e;
        }

        .wrapper form .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }

        .wrapper form .login-link a {
            color: #273094;
            text-decoration: none;
        }

        form .login-link a:hover {
            text-decoration: underline;
        }

        #ptr-element {
            text-align: center;
            font-size: 16px;
            color: #273094;
            padding: 10px;
            margin-top: -20px;
        }
    </style>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('show-password-checkbox');

        showPasswordCheckbox.addEventListener('change', () => {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        var ptr = PullToRefresh.init({
            mainElement: 'body',
            onRefresh: function() {
                location.reload();
            }
        });
    </script>
@endsection
