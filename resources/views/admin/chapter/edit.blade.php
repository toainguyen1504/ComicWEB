@extends('admin.master')
@section('module', 'Comic')
@section('module-2', 'Chapter')
@section('action', 'Edit')

@push('css')
    <style>
        .cutomize__color-input.form__input {
            color: rgb(111, 111, 111);
        } 

        .cutomize__btn-submit.form__btn {
            margin: 0 auto;
            margin-top: 40px;
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
                            <a id="module" href="{{ route('admin.comic.index', ['id' => $chapter->comic_id]) }}"> /
                                @yield('module') </a>
                            <a id="module" href="{{ route('admin.chapter.index', ['id' => $chapter->comic_id]) }}"> /
                                @yield('module-2') </a>
                            <span> / @yield('action') </span>
                            <span> / {{ $chapter->chapter_name }} </span>
                        </h2>
                    </div>
                </div>
                <!-- end main title -->

                <!-- form -->
                <div class="col-12">
                    <form action="{{ route('admin.chapter.update', ['id' => $chapter->id]) }}" method="post" class="form"
                        enctype="multipart/form-data">
                        @csrf 
                        <div class="row row--form">

                            <div class="col-12 col-md-5 customize-card form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            {{-- <label for="form__img-upload">Upload cover (270 x 400)</label>
											<input id="form__img-upload" type="file" name="image[]" multiple accept=".png, .jpg, .jpeg"> --}}
                                            <img id="form__img" src="{{ asset('uploads/covers') }}/{{ $chapter->image }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 form__content text-white">
                                <div class="row row--form">

                                    <div class="col-12">
                                        <label for="name">Chapter Name</label>
                                        <input id="name" type="text" name="chapter_name" class="form__input"
                                            placeholder="Chapter name" value="{{ $chapter->chapter_name }}">
                                    </div>

                                    {{-- <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="total">Total Chapter</label>
                                        <input id="total" type="text" name="total" class="form__input"
                                            value="{{ $chapter->total }}" placeholder="Total Chapter">
                                    </div> --}}
 
                                    {{-- <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="point_rate">Point Rate</label>
                                        <input id="point_rate" type="text" name="point_rate" class="form__input"
                                            placeholder="Point Rate" value="{{ $chapter->point_rate }}">
                                    </div> --}}

                                    <div class="col-12
                                            col-sm-6 col-lg-3">
                                        <label for="comic_id">Comic ID</label>
                                        <input id="comic_id" type="text" name="comic_id"
                                            class="cutomize__color-input form__input" value="{{ $chapter->comic_id }}"
                                            placeholder="Comic ID" disabled>
                                    </div>

                                    {{-- <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="user_id">User ID</label>
                                        <input id="user_id" type="text" name="user_id" class="form__input"
                                            value="{{ $chapter->user_id }}" placeholder="User ID">
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label for="source_id">Source ID</label>
                                        <input id="source_id" type="text" name="source_id" class="form__input"
                                            value="{{ $chapter->source_id }}" placeholder="Source ID">
                                    </div> --}}

                                    <div class="row row--form">
                                        <div class="col-12">
                                            <button type="submit" class="cutomize__btn-submit form__btn">Submit</button>
                                        </div>
                                    </div>

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
