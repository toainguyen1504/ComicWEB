@extends('admin.master')
@section('module', 'Comic')
@section('module-2', 'Chapter')
@section('action', 'Create')

@push('css')
    <style>
        .cutomize__color-input.form__input {
            color: rgb(111, 111, 111);
        }

        .cutomize__btn-submit.form__btn {
            margin: 0 auto;
            width: 30%;
            margin-top: 40px;
        }

        .cutomize__width.form__btn {
            /* margin: 0 auto; */
            width: 100%
        }

        .form__img img {
            /* display: flex; */
            background-color: #222028;
            object-fit: cover;
            max-width: 100%;
            width: 270px;
            /* height: 600px; */
        }

        .row .comic-name {
            color: aqua;
            text-transform: uppercase;
            /* position: relative;
                            z-index: 10000000; */
        }
    </style>
@endpush

@section('content')

    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>
                            <a id="home" href="{{ route('admin.dashboard.index') }}"> Home </a>
                            <a id="module" href="{{ route('admin.chapter.create', ['id' => $comic->id]) }}"> /
                                @yield('module') </a>
                            <a id="module" href="{{ route('admin.chapter.index', ['id' => $comic->id]) }}"> /
                                @yield('module-2') </a>
                            <span> / @yield('action') </span>
                        </h2>
                    </div>
                </div>
                <!-- end main title -->

                <!-- form -->
                <div class="col-12">
                    <form action="{{ route('admin.chapter.store', ['id' => $comic->id]) }}" method="post" class="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row--form">

                            <div class="col-12 col-md-5 form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            <div class="form__img">
                                                <img src="{{ asset('uploads/covers') }}/{{ $comic->image }}" alt="image">
                                            </div>
                                        </div>

                                        <div class="comic-name text-center">Comic - {{ $comic->name }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 form__content text-white">
                                <div class="row row--form">

                                    <div class="col-12">
                                        <label for="name">Chapter Name</label>
                                        <input id="name" type="text" name="chapter_name" class="form__input"
                                            placeholder="Chapter name">
                                    </div>

                                    <div class="col-12">
                                        <label for="comic_id">Comic ID</label>
                                        <input id="comic_id" type="text" name="comic_id"
                                            class="cutomize__color-input form__input" value="{{ $comic->id }} "
                                            placeholder="Comic ID" disabled>
                                    </div>

                                    {{-- <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="user_id">User ID</label>
                                        <input id="user_id" type="text" name="user_id" class="form__input"
                                            value="" placeholder="User ID">
                                    </div> --}}

                                    <div class="col-12">
                                        {{-- <label for="source_id">Source Chapter_id</label>
                                        <input id="source_id" type="text" name="chapter_id" class="form__input"
                                            value="" placeholder="Source ID"> --}}
                                        {{-- <button type="submit" class="cutomize__width form__btn">Add Source for
                                            Chapter</button> --}}

                                    </div>

                                    <div class="row row--form">
                                        <div class="col-12">
                                            <button type="submit" class="cutomize__btn-submit form__btn">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- <div class="col-12">
								<ul class="form__radio">
									<li>
										<span>Comic Status:</span>
									</li>
									<li>
										<input id="type1" type="radio" name="type" checked="">
										<label for="type1">Visible</label>
									</li>
									<li>
										<input id="type2" type="radio" name="type">
										<label for="type2">Hidden</label>
									</li>
								</ul>
							</div> --}}

                            <div class="col-12">
                                <div class="row row--form">
                                    {{-- <div class="col-12">
										<div class="form__video">
											<label id="movie1" for="form__video-upload">Upload video</label>
											<input data-name="#movie1" id="form__video-upload" name="movie" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
										</div>
									</div>

									<div class="col-12">
										<input type="text" class="form__input" placeholder="Or add a link">
									</div> --}}
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </main>
    <!-- end main content -->

@endsection
