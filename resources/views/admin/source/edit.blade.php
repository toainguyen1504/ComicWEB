@extends('admin.master')
@section('module', 'source')
@section('action', 'Edit')
@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

    <style>
        body h1 {
            padding-top: 50px;
            padding-bottom: 20px;
            text-align: center;
            text-transform: uppercase; 
            color: rgb(238, 172, 4);
            letter-spacing: 2px;
        }
    </style>
@endpush

@section('content')
    </head>

    <body class="mx-5">
        <h1>Update Image</h1>
        <div class="row row--form">
            <form action="{{ route('admin.source.update', ['id' => $source->id]) }}" method="post" class="form"
                enctype="multipart/form-data">
                @csrf

                <div class="col-12 col-md-5 form__cover  mx-auto">
                    <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                            <div class="form__img">
                                <label for="form__img-upload">Upload cover (270 x 400)</label>
                                <input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
                                <img id="form__img" src="{{ asset('uploads/chapters') }}/{{ $source->image }}"
                                    alt="Errrol image!">
                            </div>
                        </div>
                        <div class="col-12  ">
                            <button class="btn btn-danger px-2 col-12 py-2" type="submit">UPDATE</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>

    @endsection
