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

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


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

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address">
                            <div class="form-button full-width">
                                <button id="submit" type="submit" class="btn btn-primary btn-user btn-block">Send
                                    Reset
                                    Link</button>
                            </div>
                            {{-- <div class="page-links">
                                <a href="/login">Login to account</a>
                            </div> --}}

                            <div class="page-links">
                                <a href="/login">Login to account</a>
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
