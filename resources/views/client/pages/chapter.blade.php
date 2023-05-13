@extends('client.master')
@push('bootstrap')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endpush
@push('css')
    <style>
        h2 {
            margin: 20px 0;
        }

        .header {
            position: static;
        }



        .image-chapter {
            display: block;
            text-align: center;
        }

        .image-chapter img,
        .image-cover img {
            max-width: 100%;
            width: 780px;
            object-fit: cover;
        }

        .navbar {
            padding: 15px 140px;
            background: #212529;
        }

        .navbar a {
            color: #fff;
        }

        .navbar a:hover {
            color: #ff2a66;
        }

        .tym {
            text-align: end;
        }

        .tym i {
            margin-right: 5px;
        }

        .choose_chapter .col-2 {
            text-align: center;
        }



        .choose_chapter .chapter {
            text-align: center;
            padding: 5px 0;
            background: #fff;
        }

        .choose_chapter .chapter a {
            color: #000;
            padding: 0px 100px;
        }

        .choose_chapter a i {
            font-size: 30px;
            padding: 2px;
            /* css */
        }



        /* List chapter when click */
        .chapter {
            position: relative;
        }

        .chapter button {
            width: 100%;
        }

        .chapter ul {
            position: absolute;
            bottom: 110%;
            left: 0;
            background-color: #ffffff;
            /* padding: 10px; */
            border-radius: 5px;
            display: none;
            width: 100%;
        }

        .chapter ul li {
            /* margin-bottom: 5px; */
            padding: 3px 0px;
        }

        .chapter ul li:hover {
            background-color: #76bde9;
            cursor: pointer;
        }

        .chapter #list {
            width: 100%;
            height: 400px;
            overflow-y: auto;
            white-space: nowrap;
        }

        .chapter #btn {
            color: rgb(0, 93, 93);
            font-weight: 700;
            font-style: italic;
            padding: 0px 100px;
        }

        .chapter #list::-webkit-scrollbar {
            width: 10px;
        }

        .chapter #list::-webkit-scrollbar-track {
            background-color: #f2f2f2;
            border-radius: 10px;
        }

        .chapter #list::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 10px;
        }

        .chapter #list::-webkit-scrollbar-thumb:hover {
            background-color: #b3b3b3;
        }
    </style>
@endpush
@section('content_client')
    <!-- details -->

    <div class="container closeList">

        <div class="row">
            <div class="col-12 col-md-8">
                <div class="main__title">
                    <h2>
                        <a id="home" href="{{ route('index') }}"> Home </a>
                        <a class="module" href="{{ route('detail', ['slug' => $data['comic']->slug]) }}"> /
                            {{ $data['comic']->name }} </a>
                        <span> / {{ $data['chapter_name'] }} </span>
                    </h2>
                </div>
            </div>
        </div>


        <div class="row">
            {{-- <div class="image-chapter image-cover rol-12">
                <img src="{{ asset('uploads/covers') }}/{{ $data['comic']->image }}" alt="Errol Image!">
            </div> --}}

            <div class="image-chapter rol-12">
                @foreach ($data['images'] as $item)
                    <img src="{{ asset('uploads/chapters') }}/{{ $item->image }}" alt="Errol Image!">
                @endforeach
            </div>
        </div>

    </div>
    <!-- end details content -->

    <nav class="navbar fixed-bottom">
        <div class="container-fluid row">
            <div class="col-4 home-list"> <a class="navbar-brand" href="{{ route('index') }}">Trang chủ</a>
                <a class="navbar-brand" href="{{ route('detail', ['slug' => $data['comic']->slug]) }}"><i
                        class="fa-solid fa-list"></i> Danh sách chapters</a>
            </div>
            <div class="col-4 choose_chapter">
                <div class="row">
                    <div class="col-2">
                        {{-- {{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $data['chapter_prev']]) }} --}}
                        <a href="{{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $data['chapter_prev']]) }}">
                            <i class="fa-solid fa-square-caret-left"></i></i>
                        </a>
                    </div>

                    <div class="col-8 chapter">
                        <button id="btn">
                            {{ $data['chapter_name'] }}
                            {{-- <a href="#"> {{ $data['chapter_name'] }} </a> --}}
                        </button>
                        <ul id="list">
                            {{-- <span class="closeList">&times;</span> --}}
                            @foreach ($data['chapter'] as $chapter)
                                <li>
                                    <a
                                        href="{{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $chapter->chapter_slug]) }}">
                                        {{ $chapter->chapter_name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                    </div>

                    <div class="col-2">
                        <a href="{{ route('chapter', ['co' => $data['comic']->slug, 'chap' => $data['chapter_next']]) }}">

                            <i class="fa-solid fa-square-caret-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4 tym">
                <a class="navbar-brand" href="#">
                    <i class="fa-solid fa-heart"></i>Theo dõi
                </a>
            </div>
        </div>
    </nav>
@endsection


@push('js')
    <script type="text/javascript">
        var btn = document.getElementById("btn");
        var list = document.getElementById("list");
        var closeBtn = document.getElementsByClassName("closeList")[0];

        btn.addEventListener("click", () => {
            if (list.style.display === "none") {
                list.style.display = "block";
            } else {
                list.style.display = "none";
            }
        });

        // Khi người dùng nhấp vào nút đóng hoặc bất kỳ đâu trên màn hình, đóng modal
        // window.onclick = function(event) {
        //     if (event.target == list) {
        //         list.style.display = "none";
        //     }
        // }

        closeBtn.onclick = function() {
            list.style.display = "none";
        }
    </script>
@endpush
