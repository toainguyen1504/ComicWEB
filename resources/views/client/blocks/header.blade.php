<header class="cuztommize-header header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <!-- header logo -->
                    @if ($data['role'] == 'user')
                        <a href="{{ route('userIndex', ['id' => $data['user']->id]) }}" class="header__logo">
                            <img src="{{ asset('viewAssets/img/logo.png') }}" alt="">
                        </a>
                    @else
                        <a href="{{ route('index') }}" class="header__logo">
                            <img src="{{ asset('viewAssets/img/logo.png') }}" alt="">
                        </a>
                    @endif
                    <!-- end header logo -->

                    <!-- header nav -->
                    <ul class="header__nav">

                        <li class="header__nav-item">
                            @if ($data['role'] == 'user')
                                <a class="header__nav-link"
                                    href="{{ route('userIndex', ['id' => $data['user']->id]) }}">Trang chủ
                                </a>
                            @else
                                <a class="header__nav-link" href="{{ route('index') }}">Trang chủ
                                </a>
                            @endif

                        </li>
                        <li class="dropdown header__nav-item">
                            <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#"
                                role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Thể loại</a>

                            <ul class="dropdown-menu header__dropdown-menu scrollbar-dropdown"
                                aria-labelledby="dropdownMenuMore">

                                @foreach ($data['categories'] as $cate)
                                    <li><a href="#">{{ $cate->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        {{-- <li class="header__nav-item">
                            <a href="#" class="header__nav-link">Pricing plan</a>
                        </li> --}}
                        <li class="dropdown header__nav-item">
                            <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#"
                                role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu scrollbar-dropdown"
                                aria-labelledby="dropdownMenuMore">
                                <li>
                                    @if ($data['role'] == 'user')
                                        <a href="{{ route('profile', ['id' => $data['user']->id]) }}">Quản lí tài
                                            khoản</a>
                                    @endif

                                </li>
                                @if ($data['role'] == 'admin')
                                    <li>
                                        <a href="{{ route('admin.dashboard.index') }}" target="_blank">Trang Admin</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <!-- end dropdown -->
                    </ul>
                    <!-- end header nav -->

                    <!-- header auth -->
                    <div class="header__auth display_sigin search-container">
                        <form id="my-form" method="GET" action="{{ route('ajax.search') }}" class="header__search">
                            <input type="text" id="search" class="header__search-input" name="search"
                                placeholder="Tìm kiếm truyện..." value="">

                            <a id="href-search" href="{{ route('comics.search') }}">
                                <button id="btn-search" class="header__search-button" type="button">
                                    <i class="icon ion-ios-search"></i>
                                </button>
                            </a>


                            <button class="header__search-close" type="button">
                                <i class="icon ion-md-close"></i>
                            </button>

                        </form>



                        <ul class="list-group">
                            <li id="search-results"></li>
                        </ul>



                        {{-- <button class="header__search-btn" type="button">
                            <i class="icon ion-ios-search"></i>
                        </button> --}}
                        <!-- dropdown -->
                        {{-- <div class="dropdown header__lang">
                            <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN <i class="icon ion-ios-arrow-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuLang">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">Russian</a></li>
                            </ul>
                        </div> --}}
                        <!-- end dropdown -->
                        @if (isset($data['role']) && $data['role'] == 'user')
                            <a id="custom_display" href="{{ route('profile', ['id' => $data['user']->id]) }}">

                                <div class="profile__content">
                                    <div class="profile__avatar">
                                        <img src="{{ asset('viewAssets/img/user.svg') }}" alt="">
                                    </div>
                                    <div class="profile__user">
                                        <div class="profile__meta">
                                            <h3>{{ $data['user']->name }}</h3>
                                            <span>ID: {{ $data['user']->id }}</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="nav-logout" type="button">
                                    <a href="{{ route('signout') }}"><i class="icon ion-ios-log-out"></i></a>
                                </button>
                            </a>
                            {{-- @endif --}}
                        @else
                            <a id="custom_display" href="{{ route('signin') }}" class="header__sign-in">
                                <i class="icon ion-ios-log-in"></i>
                                <span>Đăng nhập</span>
                            </a>
                        @endif

                    </div>
                    <!-- end header auth -->
                    <!-- header menu btn -->
                    {{-- <button class="header__btn" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button> --}}
                    <!-- end header menu btn -->
                </div>
            </div>
        </div>
    </div>
</header>
