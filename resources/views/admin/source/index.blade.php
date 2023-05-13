@extends('admin.master')
@section('module', 'Chapter')
@section('module-2', 'Source')
@section('action', 'Manage')
@push('css')
    <style>
        .chapter_name {
            color: rgb(25, 190, 255);
            text-transform: uppercase;
            font-size: 20px;
            margin-bottom: 20px
        }
    </style>
@endpush
@section('content')
    <?php
    
    // function CatChuoi(string $str)
    // {
    //     $str = mb_substr($str, 0, 20);
    //     $pos = mb_strrpos($str, ' ');
    //     $result = mb_substr($str, 0, $pos);
    //     return "$result...";
    // }
    
    // function checkCategory(integer $a, integer $b)
    // {
    //     if ($a == $b) {
    //         return $result;
    //     }
    //     return $result;
    // }
    //
    ?>


    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">    
                    <div class="main__title">
                        <h2>
                            <a id="home" href="{{ route('admin.dashboard.index') }}"> Home </a>
                            <a class="module" href="{{ route('admin.chapter.index', ['id' => $chapter->comic_id]) }}"> /
                                @yield('module') </a>

                            <a class="module" href="{{ route('admin.chapter.index', ['id' => $chapter->comic_id]) }}"> / @yield('module-2') </a>
                            <span> / @yield('action') </span>
                        </h2>
                        <a href="{{ route('admin.source.create', ['id' => $chapter->id]) }}" class="main__title-add">Add
                            @yield('module-2')</a>

                        <div class="main__title-wrap">
                            <!-- search -->
                            <form action="" class="main__title-form">
                                <input type="search" name="key" placeholder="Find source..." />
                                <button type="submit">
                                    <i class="icon ion-ios-search"></i>
                                </button>
                            </form>
                            <!-- end search -->
                        </div>
                    </div>
                </div>
                <!-- end main title -->
                <div class="col-12">    
                    <div class="chapter_name">
                        {{ $chapter->chapter_name }}
                    </div>
                </div>
                <!-- users -->
                <div class="col-12">
                    <div class="main__table-wrap">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>IMAGE</th>
                                    <th>CHAPTER_ID</th>
                                    <th>CRAETED DATE</th>
                                    <th id="action">ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($source as $item)
                                    <tr>
                                        <td>
                                            <div class="main__table-text">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-img">
                                                <img src="{{ asset('uploads/chapters') }}/{{ $item->image }}"
                                                    alt="errol">
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text"><a href="#">
                                                    {{-- @foreach ($category as $cate)
                                                        {{ $item->category_id == $cate->id ? $cate->name : '' }}
                                                    @endforeach --}}
                                                    {{ $chapter->id }}
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text">
                                                {{ date('d/m/Y h:i:s', strtotime($item->created_at)) }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-btns">
                                                <a href="{{ route('admin.source.edit', ['id' => $item->id]) }}"
                                                    class="main__table-btn main__table-btn--edit">
                                                    <i class="icon ion-ios-create"></i> <span> Edit</span>
                                                </a>

                                                <a href="#modal-delete-{{ $item->id }}"
                                                    class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i> <span> Delete</span>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!-- modal delete -->
                                    {{-- -{{ $item->id }} --}}
                                    <div id="modal-delete-{{ $item->id }}" class="zoom-anim-dialog mfp-hide modal">
                                        {{-- <h6 class="modal__title">Delete source {{ $item->name }}</h6> --}}
                                        <p class="modal__text">Are you sure to permanently delete this source?</p>
                                        <div class="modal__btns">
                                            <a class="modal__btn modal__btn--apply"
                                            href="{{ route('admin.source.delete', ['id' => $item->id]) }}">
                                            <button type="button"> Delete </button>
                                        </a>
                                            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
                                        </div>
                                    </div>
                                    <!-- end modal delete -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end users -->
                <!-- paginator -->
                <div class="paginators">
                    {{ $source->appends(request()->all()) }}
                </div>
                <!-- end paginator -->
            </div>
        </div>
    </main>
    <!-- end main content -->

    <!-- modal status -->
    <div id="modal-status" class="zoom-anim-dialog mfp-hide modal">
        <h6 class="modal__title">Status change</h6>

        <p class="modal__text">Are you sure about immediately change status?</p>

        <div class="modal__btns">
            <button class="modal__btn modal__btn--apply" type="button">Apply</button>
            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
        </div>
    </div>
    <!-- end modal status -->

@endsection


{{-- @push('jshand')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
@endpush --}}
