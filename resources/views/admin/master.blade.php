<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @stack('meta')
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('adminAssets/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('adminAssets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminAssets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/css/admin.css') }}">

    <style>
        .main__title .main__title-add {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30px;
            width: 100px;
            border-radius: 6px;
            border: 2px solid #f9ab00;
            margin-left: auto;
            font-size: 14px;
            color: rgb(222, 222, 222);
            /* text-transform: uppercase; */
        }

        .main__title .main__title-add:hover {
            color: #fff;
            background-color: rgba(249, 171, 0, 0.05);

        }

    </style>
    @stack('css')

    <!-- Favicons-->
    <link rel="icon" type="image/png" href="{{ asset('adminAssets/icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('adminAssets/icon/favicon-32x32.png') }}">

    <!-- Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>SieuPhamTruyen - @yield('module', 'Dashboard') @yield('action')</title>

</head>

<body>

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
    {{-- <header class="header">
		<div class="header__content">
			
			<a href="{{route('admin.dashboard.index')}}" class="header__logo">
				<img src="{{ asset('adminAssets/img/logo.svg') }}" alt="">
			</a>
	
			<button class="header__btn" type="button">
				<span></span> 
				<span></span>
				<span></span>
			</button> 
		</div>
	</header> --}}

    <div class="sidebar">
        <!-- sidebar logo -->
        <a href="{{ route('index') }}" class="sidebar__logo">
            <img src="{{ asset('adminAssets/img/logo.png') }}" alt="">
        </a>
        <!-- end sidebar logo -->

        <!-- sidebar user -->
        <div class="sidebar__user">
            <div class="sidebar__user-img">
                <img src="{{ asset('adminAssets/img/1669207181-avt.jpg') }}" alt="">
            </div>

            <div class="sidebar__user-title">
                <span>Admin</span>
                <p>Toai Nguyen</p>
            </div>

            <button class="sidebar__user-btn" type="button">
                <a href="{{ route('signout') }}"><i class="icon ion-ios-log-out"></i></a>
            </button>
        </div>
        <!-- end sidebar user -->

        <!-- sidebar nav -->
        <div class="sidebar__nav-wrap">
            <ul class="sidebar__nav">
                <li class="sidebar__nav-item">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="sidebar__nav-link sidebar__nav-link--active"><i class="icon ion-ios-keypad"></i>
                        <span>Dashboard</span></a>
                </li>


                <!-- collapse -->
                <li class="sidebar__nav-item">
                    <a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu1" role="button"
                        aria-expanded="false" aria-controls="collapseMenu">
                        <i class="icon ion-ios-image"></i> <span>Comic</span> <i class="icon ion-md-arrow-dropdown"></i>
                    </a>
                    <ul class="collapse sidebar__menu" id="collapseMenu1">
                        <li><a href="{{ route('admin.comic.index') }}">Manage</a></li>
                        <li><a href="{{ route('admin.comic.create') }}">Add Comic</a></li>
                        {{-- <li><a href="#">Add Chapter</a></li> --}}
                        {{-- <li><a href={{ route('admin.source.create') }}>Add Source</a></li> --}}
                    </ul>
                </li>
                <!-- end collapse -->

                <!-- collapse -->
                <li class="sidebar__nav-item">
                    <a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu2" role="button"
                        aria-expanded="false" aria-controls="collapseMenu"><i class="icon ion-ios-copy"></i>
                        <span>Category</span> <i class="icon ion-md-arrow-dropdown"></i></a>
                    <ul class="collapse sidebar__menu" id="collapseMenu2">
                        <li><a href="{{ route('admin.category.index') }}">Manage</a></li>
                        <li><a href="{{ route('admin.category.create') }}">Add Category</a></li>
                    </ul>
                </li>
                <!-- end collapse -->

                <!-- collapse -->
                <li class="sidebar__nav-item">
                    <a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu3" role="button"
                        aria-expanded="false" aria-controls="collapseMenu"><i class="icon ion-ios-contacts"></i>
                        <span>User</span> <i class="icon ion-md-arrow-dropdown"></i></a>

                    <ul class="collapse sidebar__menu" id="collapseMenu3">
                        <li><a href="{{ route('admin.user.index') }}">Manage</a></li>
                        <li><a href="{{ route('signup') }}">Add User</a></li>
                    </ul>
                </li>
                <!-- end collapse -->

                {{-- <li class="sidebar__nav-item">
                    <a href="{{ route('admin.comment.index') }}" class="sidebar__nav-link"><i
                            class="icon ion-ios-chatbubbles"></i> <span>Comments</span></a>
                </li>

                <li class="sidebar__nav-item">
                    <a href="{{ route('admin.rate.index') }}" class="sidebar__nav-link"><i
                            class="icon ion-ios-star-half"></i> <span>Rates</span></a>
                </li> --}}

                <li class="sidebar__nav-item">
                    <a href="{{ route('index') }}" class="sidebar__nav-link"><i
                            class="icon ion-ios-arrow-round-back"></i> <span>Back to SieuPhamTruyen</span></a>
                </li>
            </ul>
        </div>
        <!-- end sidebar nav -->

        <!-- sidebar copyright -->
        <div class="sidebar__copyright">© SIEUPHAMTRUYEN, 2020—2022. <br>Create by <a
                href="https://www.facebook.com/profile.php?id=100010833308435" target="_blank">Toai Nguyen</a></div>
        <!-- end sidebar copyright -->
    </div>

    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/cee51eb4a2.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function HideAlert() {
            document.getElementById("hide").style.display = "none";
        }
    </script>
    <script src="{{ asset('adminAssets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/select2.min.js') }}"></script>
    <script src="{{ asset('adminAssets/js/admin.js') }}"></script>

    @stack('jshand')


</body>

</html>
