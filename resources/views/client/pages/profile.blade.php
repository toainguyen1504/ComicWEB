@extends('client.master')
@push('css')
    <style>
        button.profile__logout {
            border-color: violet;
        }

        .profile__logout a {
            color: violet;
        }
    </style>
@endpush
@section('content_client')
    <!-- details -->

    <!-- page title -->
    <section class="section section--first section--bg" data-bg="viewAssets/img/section/details.jpg"
        style="background: url('viewAssets/img/section/details.jpg') center center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">SIÊU PHẨM TRUYỆN</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item">
                                @if ($data['role'] == 'user')
                                    <a href="{{ route('userIndex', ['id' => $data['user']->id]) }}">Trang chủ
                                    </a>
                                @else
                                    <a href="{{ route('index') }}">Trang chủ
                                    </a>
                                @endif
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--active">Hồ sơ cá nhân</li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <!-- content -->
    <div class="content content--profile">
        <!-- profile -->
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="profile__content">
                            <!-- content tabs nav -->
                            <ul class="nav nav-tabs content__tabs content__tabs--profile" id="content__tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                        aria-controls="tab-1" aria-selected="true">Thông tin</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab"
                                        aria-controls="tab-3" aria-selected="false">Thay đổi thông tin</a>
                                </li>
                            </ul>
                            <!-- end content tabs nav -->

                            <!-- content mobile tabs nav -->
                            <div class="content__mobile-tabs content__mobile-tabs--profile" id="content__mobile-tabs">
                                <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="button" value="Profile">
                                    <span></span>
                                </div>

                                <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                                href="#tab-1" role="tab" aria-controls="tab-1"
                                                aria-selected="true">Thông
                                                tin</a></li>

                                        <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab"
                                                href="#tab-3" role="tab" aria-controls="tab-3"
                                                aria-selected="false">Thay đổi thông tin</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end content mobile tabs nav -->

                            <button class="profile__logout" type="button">
                                <a href="{{ route('signout') }}"> Đăng xuất</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end profile -->

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row row--grid">

                        <!-- stats -->
                        <div class="col-12">
                            <div class="stats">
                                <span>Chào mừng bạn đến với TRANG QUẢN LÝ TÀI KHOẢN</span>
                                {{-- <p><a href="#">1 678</a></p> --}}
                                <i class="icon ion-ios-book"></i>
                            </div>
                        </div>
                        <!-- end stats -->

                        <div class="col-12">
                            <form action="#" class="form form--profile">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <h4 class="form__title">CHI TIẾT HỒ SƠ</h4>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <h4 class="form__title">Tên người dùng: <span> {{ $data['user']->name }}</span>  </h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <h4 class="form__title">Email: <span> {{ $data['user']->email }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- dashbox -->
                        {{-- <div class="col-12 col-xl-6">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3><i class="icon ion-ios-film"></i> Movies for you</h3>

                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#"><i
                                                class="icon ion-ios-refresh"></i></a>
                                        <a class="dashbox__more" href="catalog.html">View All</a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                            <tr>
                                                <th>TITLE</th>
                                                <th>CATEGORY</th>
                                                <th>RATING</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another
                                                            Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 9.2</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Benched</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">Movie</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 9.1</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Whitney</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Series</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 9.0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting 2</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Series</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 8.9</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">TV Series</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 8.9</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        <!-- end dashbox -->

                        <!-- dashbox -->
                        {{-- <div class="col-12 col-xl-6">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3><i class="icon ion-ios-star-half"></i> Latest reviews</h3>

                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#"><i
                                                class="icon ion-ios-refresh"></i></a>
                                        <a class="dashbox__more" href="#">View All</a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                            <tr>
                                                <th>ITEM</th>
                                                <th>AUTHOR</th>
                                                <th>RATING</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another
                                                            Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">John Doe</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 7.2</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Benched</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">John Doe</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 6.3</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Whitney</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">John Doe</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 8.4</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">Blindspotting</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">John Doe</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 9.0</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><a href="#">I Dream in Another
                                                            Language</a></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text">John Doe</div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text main__table-text--rate"><i
                                                            class="icon ion-ios-star"></i> 7.7</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        <!-- end dashbox -->
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                    <div class="row">
                        <!-- details form -->
                        <div class="col-12 col-lg-6">
                            <form action="#" class="form form--profile">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <h4 class="form__title">CHI TIẾT HỒ SƠ</h4>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <label class="form__label" for="username">Tên người dùng</label>
                                            <input id="username" type="text" name="username" class="form__input"
                                                placeholder="User 123">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <label class="form__label" for="email">Email</label>
                                            <input id="email" type="text" name="email" class="form__input"
                                                placeholder="email@email.com">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="form__btn" type="button">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end details form -->

                        <!-- password form -->
                        <div class="col-12 col-lg-6">
                            <form action="#" class="form form--profile">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <h4 class="form__title">THAY ĐỔI MẬT KHẨU</h4>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <label class="form__label" for="oldpass">Mật khẩu cũ</label>
                                            <input id="oldpass" type="password" name="oldpass" class="form__input">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <label class="form__label" for="newpass">Mật khẩu mới</label>
                                            <input id="newpass" type="password" name="newpass" class="form__input">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <label class="form__label" for="confirmpass">Xác nhận mật khẩu</label>
                                            <input id="confirmpass" type="password" name="confirmpass"
                                                class="form__input">
                                        </div>
                                    </div>

                                    {{-- <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="form__group">
                                            <label class="form__label" for="select">Select</label>
                                            <select name="select" id="select" class="form__select">
                                                <option value="0">Option</option>
                                                <option value="1">Option 2</option>
                                                <option value="2">Option 3</option>
                                                <option value="3">Option 4</option>
                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="col-12">
                                        <button class="form__btn" type="button">Đồng ý</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end password form -->
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </div>
    <!-- end content -->
@endsection
