<!DOCTYPE html>
<html lang="en">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <a href="#">
                <div class="logo">
            </a>
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
                    <h3>Login to account</h3>
                    <p>Welcome Back !</p>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="btn-close btn-close-xs" data-bs-dismiss="alert"
                                aria-label="Close" style="padding: 0.5rem; margin: auto; display: block;"></button>

                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span><br>
                            @endforeach
                            @if (session('closeButton'))
                                <button type="button" class="btn-close btn-close-xs" data-bs-dismiss="alert"
                                    aria-label="Close" style="padding: 0.5rem; margin: auto; display: block;"></button>
                            @endif
                        </div>
                    @endif

                    <form class="user" method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" aria-describedby="emailHelp"
                                placeholder="Enter Email Address..." name="email" id="email" required
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" placeholder="Password"
                                name="password" id="password" required>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12 offset-md-0">
                                <div class="g-recaptcha" data-sitekey="6Lfr6nUpAAAAADFWPYh3aQXrVVRYSj2_gyWIsg1l"
                                    style="align-items : center;"></div>
                            </div>


                        </div>



                        <div class="form-button">
                            <button id="submit" type="submit"
                                class="btn btn-primary btn-user btn-block">Login</button>

                            <a href="/forgot">Forget password?</a>
                        </div>

                        <div class="page-links">
                            <a href="/regist">Register new account</a>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('templateLogin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/popper.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('templateLogin/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>
