@extends('admin.master')
@section('module', 'Comic')
@section('action', 'Create')


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
                    <form action="{{ route('admin.comic.store') }}" method="post" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row row--form">

                            <div class="col-12 col-md-5 form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            <label for="form__img-upload">Upload cover (270 x 400)</label>
                                            {{-- {{ old('image') }} --}}
                                            <input id="form__img-upload" name="image" value="" type="file"
                                                accept=".png, .jpg, .jpeg">
                                            <img id="form__img" src="{{ asset('uploads/') }}/1669207181-avt.jpg"
                                                alt="Errol image!">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 form__content">
                                <div class="row row--form">

                                    <div class="col-12">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form__input" placeholder="Name">
                                    </div>

                                    <div class="col-12">
                                        <textarea id="text" name="description" class="form__textarea" placeholder="Description">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="text" name="author" value="{{ old('author') }}" class="form__input"
                                            placeholder="Author">
                                    </div>

                                    {{-- <div class="col-12 col-sm-6 col-lg-3"> 
                                        <input type="text" name="category_id" class="form__input" placeholder="Category">
                                    </div> --}}
                                    {{-- 
									<div class="col-12 col-sm-6 col-lg-3">
										<input type="text" class="form__input" placeholder="Total chapter">
									</div> --}}

                                    <div class="col-12 col-lg-6">
                                        <select name="category_id" class="js-example-basic-multiple" id="genre">
                                            {{-- multiple="multiple" --}}
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
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
