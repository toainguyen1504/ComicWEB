@section('module', 'Admin')
@section('action', 'SignUp')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('viewAssets/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('viewAssets/css/main.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('adminAssets/css/admin.css') }}"> --}}

    <style>
        .back__home {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 40px;
            width: 40px;
            border-radius: 6px;
            /* background-color: transparent; */
            color: #fff;
            /* text-transform: uppercase; */
            /* margin-left: auto; */
            border: 2px solid #f9ab00;
        }

        .back__home a {
            color: #fff;
            font-size: 20px;
        }

        .back__home:hover a {
            color: #f9ab00;
            background-color: rgba(249, 171, 0, 0.05);
        }

        .overlay {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.5);
        }

        .content {
            width: 50%;
            position: relative;
            /* background: rgb(46, 46, 46); */
            top: 50%;
            left: 50%;
            transform: translate(-38%, -50%);
            border-radius: 8px;
            z-index: 1000;
            text-align: center;
        }

        .alert.alert-danger li {
            padding: 10px 20px;
            color: rgb(255, 0, 0);
            word-wrap: break-word;
        }

        .close-danger {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 99999;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            color: rgb(0, 0, 0);
            font-size: 24px;
        }

        .close-danger:hover {
            color: rgb(94, 94, 94);
            font-size: 24px;
        }

        .alert.alert-success {
            width: 50%;
            padding: 50px 0px 130px;
            background: rgb(26, 25, 25);
            border-radius: 8px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            font-size: 20px;
            text-align: center;
            color: rgb(58, 162, 247);
            word-wrap: break-word;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
                rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
                rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }

        /* end mycss */
    </style>
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('viewAssets/icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('viewAssets/icon/favicon-32x32.png') }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>HotFlix – @yield('module') @yield('action') </title>
</head>

<body class="body">
    @if ($errors->any())

        <div id="hide" class="overlay alert-overlay js_alert-overlay">
            <div class="content">
                <div class="close-danger" onclick="HideAlert()"><i class="fa-solid fa-xmark"></i></div>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    @endif

    @if (Session::has('success'))
        <div id="hide" class="overlay alert-overlay js_alert-overlay">
            <div class="close" onclick="HideAlert()">Close</div>
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif


    <div class="sign section--bg" data-bg=""
        style="background: url('../viewAssets/img/section/details.jpg') center center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- registration form -->
                        <form action="{{ route('signup.store') }}" method="post" class="sign__form">
                            @csrf
                            <button class="back__home" type="button">
                                <a href="{{ route('index') }}"><i class="icon ion-ios-home"></i></a>
                            </button>
                            <a href="{{ route('index') }}" class="sign__logo"> 
                                <img src="{{ asset('adminAssets/img/logo.png') }}" alt="">
                            </a>

                            <div class="sign__group">
                                <input type="text" name="name" class="sign__input" value="{{ old('name') }}"
                                    placeholder="User Name">
                            </div>

                            <div class="sign__group">
                                <input type="email" name="email" class="sign__input" value="{{ old('email') }}"
                                    placeholder="Email">
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" name="password" required
                                    autocomplete="current-password" placeholder="Enter your password" />
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" name="password_confirmation" required
                                    autocomplete="current-password" placeholder="Enter your confirm password">
                            </div>

                            <button class="sign__btn" type="submit">Sign up</button>

                            <span class="sign__delimiter">or</span>

                            <span class="sign__text">Already have an account? <a href="{{ route('signin') }}">Sign
                                    in!</a></span>
                        </form>
                        <!-- registration form -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/cee51eb4a2.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function HideAlert() {
            document.getElementById("hide").style.display = "none";
        }
    </script>
    <script src="{{ asset('viewAssets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/wNumb.js') }}"></script>
    <script src="{{ asset('viewAssets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/plyr.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('viewAssets/js/main.js') }}"></script>

    {{-- <script type="text/javascript">
        function HideAlert() {
            document.getElementById("hide").style.display = "none";
        }
    </script> --}}
</body>

</html>
