<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('dashboard/images/LogoMonster.png') }}">
    <title>PDM - Pemutahiran Data Mandiri</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/custom.css') }}">
</head>

<body>
    <div id="header-holder">
        <div class="cloud-bg"></div>
        <nav id="nav" class="navbar navbar-full" style="margin-bottom: 0px;">
            <div class="container" style="margin-top: 0; padding-top: 0;">
                <div class="container container-nav">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button aria-expanded="false" type="button" class="navbar-toggle collapsed"
                                    data-toggle="collapse" data-target="#bs">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div style="height: 1px;" role="main" aria-expanded="false"
                                class="navbar-collapse collapse navbar-collapse-centered" id="bs">
                                <ul class="nav navbar-nav navbar-nav-centered">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Services</a>
                                    </li>
                                    <li class="nav-item d-flex justify-content-center">
                                        <a class="nav-link" href="/login" style="color: yellow;">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="top-content" class="container-fluid" style="margin-top: 0px; padding-top: 5px;">
            <div class="container" style="margin-top: 0; padding-top: 0;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-slider">
                            <div class="slide">
                                <div class="row rtl-row">
                                    <div class="col-sm-5">
                                        <div class="img-holder">
                                            <img src="{{ asset('dashboard/images/reim1.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="b-text">PDM<br>Pemutahiran Data Mandiri </div>
                                        <a href="/login" class="hbtn hbtn-primary hbtn-lg">Login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="row rtl-row">
                                    <div class="col-sm-5">
                                        <div class="img-holder">
                                            <img src="{{ asset('dashboard/images/slide-img1.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="b-text">Reimbursement Medical</div>
                                        <div class="m-text">Ajukan Klaim<span class="bold"> Reimbursement Medis</span>
                                        </div>
                                        <a href="/login" class="hbtn hbtn-primary hbtn-lg">Create now !</a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="row rtl-row">
                                    <div class="col-sm-5">
                                        <div class="img-holder">
                                            <img src="{{ asset('dashboard/images/slide-img2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="b-text">Reimbursement Perjalanan Bisnis</div>
                                        <div class="m-text">Ajukan Klaim<span class="bold"> Reimbursement Perjalanan
                                                Bisnis</span>
                                        </div>
                                        <a href="/login" class="hbtn hbtn-primary hbtn-lg">Create now !</a>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="row rtl-row">
                                    <div class="col-sm-5">
                                        <div class="img-holder">
                                            <img src="{{ asset('dashboard/images/slide-img3.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="b-text">Reimbursement Penunjang Kantor</div>
                                        <div class="m-text">Ajukan Klaim<span class="bold"> Reimbursement
                                                Penunjang Kantor</span>
                                        </div>
                                        <a href="/login" class="hbtn hbtn-primary hbtn-lg">Create now !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/slick.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/main.js') }}"></script>
</body>


</html>
