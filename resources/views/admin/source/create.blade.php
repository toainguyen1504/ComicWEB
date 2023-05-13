@extends('admin.master')
@section('module', 'Chapter')
@section('module-2', 'Source')
@section('action', 'Create')
@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

    <style>

        .customize-card.card {
            width: 30rem;
            height: 70vh;
            overflow: auto;
            color: rgb(217, 181, 0);
            background: #242424;
        }

    </style>
@endpush


@section('content')
    {{-- </head> --}}
    <!-- main title -->
    <div class="main">
        <div class="row">
            <div class="col-12">
                <div class="main__title">
                    <h2>
                        <a id="home" href="{{ route('admin.dashboard.index') }}"> Home </a>
                        <a class="module" href="{{ route('admin.chapter.index', ['id' => $chapter->comic_id]) }}"> /
                            @yield('module') </a>

                        <a class="module" href="{{ route('admin.source.index', ['id' => $chapter->id]) }}"> / @yield('module-2') </a>
                        <span> / @yield('action') </span>
                    </h2>
                    {{-- <a href="{{ route('admin.source.create', ['id' => $chapter->id]) }}" class="main__title-add">Add
                        @yield('module-2')</a> --}}

                    <div class="main__title-wrap">
                        <div class="main__title-form"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- end main title -->

    <h1 class="text-center text-white">Insert Image Chapter</h1>

    <div class="customize-card card mb-3 my-1 row text-center mx-auto">
        <form action="{{ route('admin.source.store', ['id' => $chapter->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="my-3"></div>
            {{-- @include('admin.blocks.source.newCard') --}}
            <div class="upload2 col-12"></div>

            <button id="btn__add-card" class="btn btn-info my-3" type="button">
                <i class="fa-solid fa-plus"></i>
                Click to CHOOSE Image for Chapter
            </button>

            <div class="col-12">
                <button class="btn btn-danger px-2 col-12 py-2" type="submit">UPLOAD</button>
            </div>
        </form>
    </div>

    @push('jshand')
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script> --}}
        <script src="{{ asset('jquery.js') }}"></script>

        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#btn__add-card").click(function(e) {
                    // var count = 1;
                    e.preventDefault();

                    $.ajax({
                        type: "get",
                        url: "{{ route('admin.source.newCard') }}",
                        dataType: "html",
                        success: function(data) {
                            // console.log(data)
                            $("div.upload2").append(data);
                        }
                    });
                    // count = count + 1;
                });

            });
        </script>
    @endpush

@endsection
