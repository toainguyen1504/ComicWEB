@extends('client.master')
{{-- @section('module', 'Dashboard')
@section('action', 'Manage') --}}
@push('css')
    <style>
        .text-white {
            color: #fff;
        }

        .card.card--big img {
            width: 232px;
            object-fit: cover;
        }


        .paginators {
            padding: 20px;
        }

        .paginators ul {
            display: inline-flex;
            margin: 0 500px;
        }

        .paginators .small.text-muted {
            display: none;
        }

        .paginators .page-link {
            padding: 10px 15px;
            font-size: 22px;
        }

        .paginators .page-link {
            color: #dcdcdc;
            /* background-color: #222028;
                border: 1px solid #222028; */
        }

        .paginators .page-item.active .page-link,
        .paginators .page-item.disabled .page-link {
            z-index: 3;
            color: #f9ab00;
            background-color: #222028;
            border-color: #222028;
        }

        .paginators .page-link:focus {
            color: #222028;
            box-shadow: 0 0 0 0.25rem #222028;
        }

        .paginators .page-link:hover {
            background-color: #322f39;
        }
    </style>
@endpush
@section('content_client')
    <!-- home -->
    <section class="home">
        <!-- home bg -->
        <div class="owl-carousel home__bg">
            <div class="item home__cover" data-bg="viewAssets/img/home/home__bg.jpg"></div>
            <div class="item home__cover" data-bg="viewAssets/img/home/home__bg2.jpg"></div>
            <div class="item home__cover" data-bg="viewAssets/img/home/home__bg3.jpg"></div>
            <div class="item home__cover" data-bg="viewAssets/img/home/home__bg4.jpg"></div>
            <div class="item home__cover" data-bg="viewAssets/img/home/home__bg5.jpg"></div>
        </div>
        <!-- end home bg -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="home__title">Truyện <b>mới</b> cập nhật</h1>

                    <button class="home__nav home__nav--prev" type="button">
                        <i class="icon ion-ios-arrow-round-back"></i>
                    </button>
                    <button class="home__nav home__nav--next" type="button">
                        <i class="icon ion-ios-arrow-round-forward"></i>
                    </button>
                </div>

                <div class="col-12">
                    <div class="owl-carousel home__carousel home__carousel--bg">
                        @foreach ($data['newComic'] as $item)
                            <div class="card card--big">
                                <div class="card__cover">
                                    <img src="{{ asset('uploads/covers') }}/{{ $item->image }}" alt="Errol image!">
                                    <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                        <i class="icon ion-ios-eye"></i>
                                    </a>

                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a
                                            href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                    </h3>
                                    <span class="card__category">
                                        @foreach ($data['categories'] as $cate)
                                            @if ($item->category_id == $cate->id)
                                                <a href="#">{{ $cate->name }}</a>
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">TRUYỆN SIÊU PHẨM</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">TẤT CẢ</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                    aria-selected="false">MỚI CẬP NHẬT</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                                    aria-selected="false">HOT</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
                                    aria-selected="false">ĐỀ XUẤT</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="New releases">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                            href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW
                                            COMICS</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2"
                                            role="tab" aria-controls="tab-2" aria-selected="false">MỚI CẬP NHẬT</a></li>

                                    <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab"
                                            href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">HOT</a></li>

                                    <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab"
                                            href="#tab-4" role="tab" aria-controls="tab-4"
                                            aria-selected="false">ĐỀ XUẤT</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content">

                {{-- ALL --}}
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row row--grid text-white">
                        <!-- card -->
                        @foreach ($data['comics'] as $item)
                            <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                <div class="card">
                                    <div class="card__cover">
                                        <img src="{{ asset('uploads/covers') }}/{{ $item->image }}" alt="Errol image!">
                                        <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>

                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a
                                                href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                        </h3>
                                        <span class="card__category">
                                            @foreach ($data['categories'] as $cate)
                                                @if ($item->category_id == $cate->id)
                                                    <a href="#">{{ $cate->name }}</a>
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- end card -->
                    </div>
                    <div class="paginators">
                        {{ $data['comics']->appends(request()->all()) }}
                    </div>
                </div>
                {{-- END ALL --}}

                {{-- MỚI CẬP NHẬT --}}
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row row--grid text-white">

                        <!-- card -->
                        @foreach ($data['newComic'] as $item)
                            @if ($loop->iteration < 1)
                                {{ 'Not have new comic' }}
                                <?php break; ?>  
                            @else
                                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                    <div class="card">
                                        <div class="card__cover">
                                            <img src="{{ asset('uploads/covers') }}/{{ $item->image }}"
                                                alt="Errol image!">
                                            <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                                <i class="icon ion-ios-eye"></i>
                                            </a>

                                        </div>
                                        <div class="card__content">
                                            <h3 class="card__title"><a
                                                    href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                            </h3>
                                            <span class="card__category">
                                                @foreach ($data['categories'] as $cate)
                                                    @if ($item->category_id == $cate->id)
                                                        <a href="#">{{ $cate->name }}</a>
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- end card -->

                    </div>
                 
                </div>
                {{-- END MỚI CẬP NHẬT --}}

                {{-- HOT  --}}
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                    <div class="row row--grid text-white">
                        <!-- card -->
                        @foreach ($data['hotComic'] as $item)
                            @if ($loop->iteration < 1)
                                {{ 'Not have hot comic' }}
                                <?php break; ?>
                            @elseif ($loop->iteration > 12)
                                <?php break; ?>
                            @else
                                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                    <div class="card">
                                        <div class="card__cover">
                                            <img src="{{ asset('uploads/covers') }}/{{ $item->image }}"
                                                alt="Errol image!">
                                            <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                                <i class="icon ion-ios-eye"></i>
                                            </a>

                                        </div>
                                        <div class="card__content">
                                            <h3 class="card__title"><a
                                                    href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                            </h3>
                                            <span class="card__category">
                                                @foreach ($data['categories'] as $cate)
                                                    @if ($item->category_id == $cate->id)
                                                        <a href="#">{{ $cate->name }}</a>
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- end card -->
                    </div>
           
                </div>
                {{-- END HOT --}}

                {{-- PUPULAR --}}
                <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
                    <div class="row row--grid text-white">
                        <!-- card -->
                        @foreach ($data['proposeComic'] as $item)
                            @if ($loop->iteration < 1)
                                {{ 'Not have propose comic' }}
                                <?php break; ?>
                            @else
                                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                    <div class="card">
                                        <div class="card__cover">
                                            <img src="{{ asset('uploads/covers') }}/{{ $item->image }}"
                                                alt="Errol image!">
                                            <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                                <i class="icon ion-ios-eye"></i>
                                            </a>

                                        </div>
                                        <div class="card__content">
                                            <h3 class="card__title"><a
                                                    href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                            </h3>
                                            <span class="card__category">
                                                @foreach ($data['categories'] as $cate)
                                                    @if ($item->category_id == $cate->id)
                                                        <a href="#">{{ $cate->name }}</a>
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- end card -->
                    </div>
              
                </div>
                {{-- END ĐỀ XUẤT --}}

            </div>
            <!-- end content tabs -->
        </div>
    </section>
    <!-- end content -->

    <!-- section -->
    <section class="section section--border">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <div class="section__title-wrap">
                        <h2 class="section__title">Truyện Đề Xuất</h2>

                        <div class="section__nav-wrap">
                            <a href="#" class="section__view">View All</a>

                            <button class="section__nav section__nav--prev" type="button" data-nav="#carousel1">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>

                            <button class="section__nav section__nav--next" type="button" data-nav="#carousel1">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div class="col-12">
                    <div class="owl-carousel section__carousel" id="carousel1">

                        @foreach ($data['proposeComic'] as $item)
                            <div class="card">
                                <div class="card__cover">
                                    <img src="{{ asset('uploads/covers') }}/{{ $item->image }}" alt="Errol image!">
                                    <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                        <i class="icon ion-ios-eye"></i>
                                    </a>

                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a
                                            href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                    </h3>
                                    <span class="card__category">
                                        @foreach ($data['categories'] as $cate)
                                            @if ($item->category_id == $cate->id)
                                                <a href="#">{{ $cate->name }}</a>
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- carousel -->
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
