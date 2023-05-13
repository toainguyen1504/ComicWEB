@extends('admin.master')
@section('module', 'User')
@section('action', 'Edit')

@section('content')

    @if (Session::has('success'))
        <div id="hide" class="overlay alert-overlay js_alert-overlay">
            <div class="close" onclick="HideAlert()">Close</div>
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        @include('admin.blocks.user.title')
                    </div>
                </div>
                <!-- end main title -->

                <!-- profile -->
                <div class="col-12">
                    <div class="profile__content">
                        <!-- profile user -->
                        <div class="profile__user">
                            <div class="profile__avatar">
                                <img src="{{ asset('adminAssets/img/user.svg') }}" alt="">
                            </div>
                            <!-- or red -->
                            <div class="profile__meta profile__meta--green">
                                <h3>{{ $user->name }} <span>{{ $user->status == 0 ? 'Approved' : 'Disapproved' }}</span>
                                </h3>
                                <span>User ID: {{ $user->id }}</span>
                            </div>
                        </div>
                        <!-- end profile user -->

                        <!-- profile tabs nav -->
                        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                        <!-- end profile tabs nav -->

                        <!-- profile mobile tabs nav -->
                        <div class="profile__mobile-tabs" id="profile__mobile-tabs">
                            <div class="profile__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Profile">
                                <span></span>
                            </div>

                            <div class="profile__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                            href="#tab-1" role="tab" aria-controls="tab-1"
                                            aria-selected="true">Profile</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end profile mobile tabs nav -->

                    </div>
                </div>
                <!-- end profile -->

                <!-- content tabs -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                        <div class="col-12">
                            <div class="row">
                                <!-- details form -->
                                <div class="col-12 col-lg-6">
                                    <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post"
                                        class="form form--profile">
                                        @csrf
                                        <div class="row row--form">
                                            <div class="col-12">
                                                <h4 class="form__title">Profile details</h4>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="name">Username</label>
                                                    <input id="name" type="text" name="name" class="form__input"
                                                        value="{{ $user->name }}" placeholder="{{ $user->name }}">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="email">Email</label>
                                                    <input id="email" type="email" name="email" class="form__input"
                                                        value="{{ $user->email }}" placeholder="{{ $user->email }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="form__btn" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end details form -->

                                <!-- password form -->
                                {{-- <div class="col-12 col-lg-6">
                                    <form method="post" action="{{ route('admin.user.changePassword', ['id' => $user->id]) }}"
                                        class="form form--profile">
                                        @csrf
                                        <div class="row row--form">
                                            <div class="col-12">
                                                <h4 class="form__title">Change password</h4>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="oldpass">Old Password</label>
                                                    <input id="oldpass" type="password" name="oldpass"
                                                        class="form__input"  placeholder="Enter old password">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="newpass">New Password</label>
                                                    <input id="newpass" type="password" name="password"
                                                        class="form__input" required autocomplete="current-password"
                                                        placeholder="Enter your password">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="form__group">
                                                    <label class="form__label" for="password_confirmation">Confirm New
                                                        Password</label>
                                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                                        required autocomplete="current-password"
                                                        placeholder="Enter your confirm password" class="form__input">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="form__btn" type="submit">Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                                <!-- end password form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content tabs -->
            </div>
        </div>
    </main>
    <!-- end main content -->

@endsection
