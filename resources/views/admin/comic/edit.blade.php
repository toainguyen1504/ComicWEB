@extends('admin.master')
@section('module', 'Comic')
@section('action', 'Edit')
{{-- @push('css')
    <style>
        .customize-card,
        .form__img label {
            color: rgb(202, 224, 0);
        }

        .customize-card .form__img img {
            max-width: 270px;
            width: 100%;
            object-fit: cover;
        }
    </style>
@endpush --}}

@section('content')

    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        @include('admin.blocks.comic.title')
                    </div>
                </div>
                <!-- end main title -->

                <!-- form -->
                <div class="col-12">
                    <form action="{{ route('admin.comic.update', ['id' => $comic->id]) }}" method="post" class="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row--form">

                            <div class="col-12 col-md-5 customize-card form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            <label for="form__img-upload">Upload cover (270 x 400)</label>
                                            <input id="form__img-upload" name="image" type="file"
                                                accept=".png, .jpg, .jpeg">
                                            <img id="form__img" src="{{ asset('uploads/covers') }}/{{ $comic->image }}"
                                                alt="Errrol image!">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 form__content">
                                <div class="row row--form">

                                    <div class="col-12">
                                        <input type="text" name="name" class="form__input" value="{{ $comic->name }}"
                                            placeholder="Name"> 
                                    </div>
 
                                    <div class="col-12">
                                        <textarea id="text" name="description" class="form__textarea" placeholder="Description">{{ $comic->description }}</textarea>
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="text" name="author" class="form__input"
                                            value="{{ $comic->author }}" placeholder="Author">
                                    </div>
 
                                    <div class="col-12 col-lg-6">
                                        <select name="category_id" class="js-example-basic-multiple" id="genre">
                                            {{-- multiple="multiple" --}}
                                            <option  value="{{ $comic->category_id }}" selected>
                                                @foreach ($category as $cate)
                                                    {{ $comic->category_id == $cate->id ? $cate->name : '' }}
                                                @endforeach 
                                            </option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- 
									<div class="col-12 col-sm-6 col-lg-3">
										<input type="text" class="form__input" placeholder="Total chapter">
									</div> --}}

                                    {{-- <div class="col-12 col-lg-6">
										<select class="js-example-basic-multiple" id="country" multiple="multiple">
											<option value="Afghanistan">Afghanistan</option>
											<option value="Åland Islands">Åland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option> 
										</select>
									</div> --}}

                                    {{-- <div class="col-12 col-lg-6">
										<select class="js-example-basic-multiple" id="genre" multiple="multiple">
											<option value="Action">Xuyen khong</option>
											<option value="Animation">Huyen Huyen</option>
											<option value="Comedy">Tu Tien</option>
											<option value="Crime">Ngon Tinh</option>
											<option value="Drama">Drama</option>
										</select>
									</div> --}}

                                    {{-- <div class="col-12">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload">Upload photos</label>
											<input data-name="#gallery1" id="form__gallery-upload" name="gallery" class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg" multiple>
										</div>
									</div> --}}
                                </div>
                            </div>

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

                                    <div class="col-12">
                                        <button type="submit" class="form__btn">Submit</button>
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
