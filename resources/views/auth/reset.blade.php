<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/iofrm-theme22.css') }}">
</head>

<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('templateLogin/images/logo-ligt.svg') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset('templateLogin/images/graphic3.svg') }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Password Reset</h3>
                        <p>To reset your password, enter the email address you use to sign in to iofrm</p>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close btn-close-xs" data-bs-dismiss="alert"
                                    aria-label="Close" style="padding: 0.5rem; margin: auto; display: block;"></button>

                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span><br>
                                @endforeach
                                @if (session('closeButton'))
                                    <button type="button" class="btn-close btn-close-xs" data-bs-dismiss="alert"
                                        aria-label="Close"
                                        style="padding: 0.5rem; margin: auto; display: block;"></button>
                                @endif
                            </div>
                        @endif

                        <form method="POST" action="{{ route('reset.password.post') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <input class="form-control" type="email" name="email" placeholder="E-mail Address"
                                required>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm New Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>


                            <div class="form-button full-width">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Reset Password
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false"
        src="{{ asset('templateLogin/../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/popper.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/main.js') }}"></script>
</body>

</html>
