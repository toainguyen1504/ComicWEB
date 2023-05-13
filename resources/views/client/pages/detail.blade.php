<?php
function PostingTime(string $date)
{
    $second = 1;
    $minute = $second * 60;
    $hour = $minute * 60;
    $day = $hour * 24;
    $month = $day * 30;
    $year = $month * 12;

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $date = '2022/10/14 19:31:10';
    $from = strtotime($date);
    $now = time();

    // Số giây từ date tới nay
    $distance = $now - $from;

    if ($distance > $second && $distance < $minute) {
        echo floor($distance / $second) . ' giây trước';
    } elseif ($distance > $minute && $distance < $hour) {
        echo floor($distance / $minute) . ' phút trước';
    } elseif ($distance > $hour && $distance < $day) {
        echo floor($distance / $hour) . ' tiếng trước';
    } elseif ($distance > $day && $distance < $month) {
        echo floor($distance / $day) . ' ngày trước';
    } elseif ($distance > $month && $distance < $year) {
        echo floor($distance / $month) . ' tháng trước';
    } else {
        echo floor($distance / $year) . ' năm trước';
    }
}
?>
@extends('client.master')
{{-- @section('module', 'Dashboard')
@section('action', 'Manage') --}}
@push('css')
    <style>
        .card__title a {
            color: aqua;
        }

        .info-item a {
            color: rgb(216, 216, 216);
            font-style: italic;
        }
    </style>
@endpush
@section('content_client')
    <!-- details -->
    <section class="section section--details section--bg" data-bg="viewAssets/img/section/details.jpg"
        style="background: url('viewAssets/img/section/details.jpg') center center / cover no-repeat;">
        <!-- details content -->
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="main__title">
                        <h2>
                            <a id="home" href="{{ route('index') }}"> Trang chủ </a>
                            <a class="module" href="#"> /
                                {{ $data['comic']->name }} </a>
                            {{-- <span>  </span> --}}
                        </h2>
                    </div>
                </div>

                <div class="overview-story col-12">
                    <div class="form__cover">
                        <div class="row row--form">
                            <div class="col-4 col-md-3 col-sm-3">
                                <div class="form__img">
                                    <img src="{{ asset('uploads/covers') }}/{{ $data['comic']->image }}" alt="image">
                                </div>
                            </div>

                            <div class="content text-white col-8 col-md-8 col-sm-9">
                                <div class="card__content">
                                    <h1 class="title">{{ $data['comic']->name }}</h1>
                                    <div class="text">
                                        <p class="info-item">Trạng thái: Đang cập nhật</p>
                                        <p class="info-item">Đang dịch: Chapter
                                            {{ $data['comic']->chapter_total }}
                                        </p>
                                        <p class="info-item">Tác giả: {{ $data['comic']->author }} </p>
                                        <p class="info-item">Thể loại:
                                            {{ empty($data['category_comic']) ? '' : $data['category_comic']->name }} </p>

                                    </div>

                                </div>

                                <div class="row text">
                                    <div class="col-12 col-md-4 col-sm-3 button__customize begin">
                                        <a href="{{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $data['chapter_begin']->chapter_slug]) }}"
                                            class="read__btn"><i class="icon ion-ios-book"></i> Bắt đầu đọc
                                        </a>

                                    </div>
                                    {{-- <div class="col-12 col-md-4 col-sm-3 button__customize continue">
                                        <a href="#" class="read__btn"><i class="fa-solid fa-book-tanakh"></i> Đọc tiếp
                                        </a>
                                    </div> --}}
                                    {{-- {{ route('chapter', ['id' => $data['chapter_begin']->id]) }} --}}
                                    {{-- {{ route('chapter', ['id' => $data['new_chapter']->id]) }} --}}
                                    <div class="col-12 col-md-4 col-sm-3 button__customize new">
                                        {{-- {{ route('chapter', ['chapter_slug' => $data['new_chapter']->chapter_slug]) }} --}}
                                        <a href="{{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $data['chapter_end']->chapter_slug]) }}"
                                            class="read__btn"><i class="fa-solid fa-plane-departure"></i> Đọc
                                            chapter mới
                                        </a>
                                    </div>

                                    <p id="description">
                                        Mô tả:&nbsp;
                                        {{ $data['comic']->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="list-chapters" class="list-chapters text-white mt-5">
                <div class="header-section"><i class="fa-solid fa-list"></i> Danh sách chapters</div>
                <div class="box-list">
                    @foreach ( $data['chapter_data_list'] as $item)
                        <div class="chapter-item row">
                            <div class="col-9 col-md-8 col-sm-3">
                                <a href="{{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $item->chapter_slug]) }}"
                                    title="{{ $item->chapter_name }}">
                                    {{ $item->chapter_name }}
                                </a>
                                {{-- {{ $data['comic']->name}} --}}
                            </div>
                            <div class="col-3 col-md-4 col-sm-9 text-hour">
                                {{ PostingTime($item->created_at) }}
                                {{-- {{ $item->created_at ? Posting_time($item->created_at) : '' }} --}}
                            </div>
                        </div>
                    @endforeach
                    {{-- @endif --}}

                </div>
            </div>

        </div>
        <!-- end details content -->
    </section>
    <!-- end details -->

    <!-- content -->
    <section class="content">

        <div class="container">
            <div class="row">
                <!-- sidebar -->
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="row row--grid">
                        <!-- section title -->
                        <div class="col-12">
                            <h2 class="section__title section__title--sidebar">Có thể bạn sẽ thích...</h2>
                        </div>
                        <!-- end section title -->

                        @foreach ($data['comics'] as $item)
                            <!-- card -->
                            <div class="col-6 col-sm-4 col-lg-6">
                                <div class="card">
                                    <div class="card__cover">
                                        <img src="{{ asset('uploads/covers') }}/{{ $item->image }}" alt="Errol image!">
                                        <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card__play">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        {{-- <span class="card__rate card__rate--green">8.4</span> --}}
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a
                                                href="{{ route('detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                        </h3>
                                        <p class="info-item">
                                            @foreach ($data['categories'] as $cate)
                                                @if ($item->category_id == $cate->id)
                                                    <a href="#">{{ $cate->name }}</a>
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        @endforeach
                    </div>
                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
    <!-- end content -->
@endsection
