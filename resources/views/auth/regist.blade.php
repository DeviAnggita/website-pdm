<!DOCTYPE html>
<html lang="en">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templateLogin/css/iofrm-style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/sweetalert.min.css') }}">

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
            {{-- <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register new account</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>

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

                        <form method="POST" action="{{ route('regist.submit') }}">
                            @csrf
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address"
                                required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>

                            <div class="form-group row">
                                <div class="col-md-12 offset-md-0">
                                    <div class="g-recaptcha" style="align-items : center;"
                                        data-sitekey="6LcD6jUpAAAAABBclUZj-wm1dYy7z_QrdLsClb0P"></div>
                                </div>
                            </div>

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                        <div class="page-links">
                            <a href="/login">Login to account</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register new account</h3>
                        <p>Access to the most powerful tool in the entire design and web industry.</p>

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

                        <form method="POST" action="{{ route('regist.submit') }}">
                            @csrf
                            <input class="form-control" type="text" name="NAMA_USER" placeholder="Full Name"
                                required>
                            <input class="form-control" type="text" name="USERNAME" placeholder="Username" required>
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address"
                                required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-group row">
                                <div class="col-md-12 offset-md-0">
                                    <div class="g-recaptcha" style="align-items : center;"
                                        data-sitekey="6Lfr6nUpAAAAADFWPYh3aQXrVVRYSj2_gyWIsg1l"></div>
                                    {{-- 
                                    <div class="g-recaptcha" style="align-items : center;"
                                        data-sitekey="{{ config('services.recaptcha.site_key') }}"> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                        <div class="page-links">
                            <a href="/login">Login to account</a>
                        </div>
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
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
