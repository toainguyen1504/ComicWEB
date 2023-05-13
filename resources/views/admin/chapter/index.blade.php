@extends('admin.master')
@section('module', 'Comic')
@section('module-2', 'Chapter')
@section('action', 'Manage')

<style>
    /* .chapter__table-btns {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
    } */ 

    .tbody .py-2 {
        padding: 10px;
    }

    .form__img img {
        /* display: flex; */
        background-color: #222028;
        object-fit: cover;
        max-width: 100%;
        width: 270px;
        /* height: 600px; */
    }

    #customize.main__table {
        min-width: 700px;
    }

    .row .comic-name {
        color: aqua;
        text-transform: uppercase;
    }

    .modal {
        height: 30% !important;
    }
</style>

@section('content')

    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        {{-- @include('admin.blocks.chapter.title') --}}

                        <h2>
                            <a id="home" href="{{ route('admin.dashboard.index') }}"> Home </a>
                            <a class="module" href="{{ route('admin.comic.index', ['id' => $comic->id]) }}">
                                / @yield('module') </a>
                            <a class="module" href="#"> / @yield('module-2') </a>
                            {{-- <span> / {{ $chapter->name }} </span> --}}
                            <span> / @yield('action') </span>
                        </h2>
                        <a href="{{ route('admin.chapter.create', ['id' => $comic->id]) }}" class="main__title-add">Add
                            @yield('module-2')</a>
                        <div class="main__title-wrap">
                            <!-- search -->
                            <form action="" class="main__title-form">
                                <input type="search" name="key" placeholder="Find chapter..." />
                                <button type="submit">
                                    <i class="icon ion-ios-search"></i>
                                </button>
                            </form>
                            <!-- end search -->
                        </div>
                    </div>
                </div>
                <!-- end main title -->

                <!-- form --> 
                <div class="col-12">
                    <form action="{{ route('admin.chapter.index', ['id' => $comic->id]) }}" method="" class="form" 
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row row--form">

                            <div class="col-12 col-md-5 form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            <img src="{{ asset('uploads/covers') }}/{{ $comic->image }}" alt="image">
                                        </div>
                                        <div class="comic-name text-center">Comic - {{ $comic->name }}</div>
                                    </div>
                                </div>
                            </div>

                            {{-- 
                            <div class="col-12">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <button type="submit" class="form__btn">Submit</button>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-10 col-md-8">
                                <div class="main__table-wrap">
                                    <table id="customize" class="main__table">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>NAME</th>
                                                {{-- <th>Point Rate</th> --}}
                                                <th>CREATED DATE</th>
                                                <th id="action">ACTIONS</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @if ($chapter === 0)
                                                <tr>
                                                    <td>
                                                        <div class="text-white">No Chapter</div>
                                                    </td>
                                                </tr>
                                            @else --}}
                                            @foreach ($chapter as $item)
                                                <tr>
                                                    <td>
                                                        <div class="main__table-text">{{ $loop->iteration }}</div>
                                                    </td>

                                                    <td>
                                                        <div class="main__table-text"><a
                                                                href="#">{{ $item->chapter_name }}</a></div>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="main__table-text"><a
                                                                href="#">{{ $item->point_rate }}</a></div>
                                                    </td> --}}
                                                    <td>
                                                        <div class="main__table-text">
                                                            {{ date('d/m/Y h:i:s', strtotime($item->created_at)) }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="main__table-btns">
                                                            <a href="{{ route('admin.source.index', ['id' => $item->id]) }}"
                                                                class="main__table-btn main__table-btn--view">
                                                                <i class="icon ion-ios-eye"></i><span> View</span>
                                                            </a>

                                                            <a href="{{ route('admin.chapter.edit', ['id' => $item->id]) }}"
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
                                                <div id="modal-delete-{{ $item->id }}"
                                                    class="zoom-anim-dialog mfp-hide modal cus">
                                                    <h6 class="modal__title">Delete {{ $item->chapter_name }}</h6>

                                                    <p class="modal__text">Are you sure to permanently delete this item?
                                                    </p>

                                                    <div class="modal__btns">
                                                        <a class="modal__btn modal__btn--apply"
                                                            href="{{ route('admin.chapter.delete', ['id' => $item->id]) }}">
                                                            <button type="button"> Delete </button>
                                                        </a>
                                                        <button class="modal__btn modal__btn--dismiss"
                                                            type="button">Dismiss</button>
                                                    </div>
                                                </div>
                                                <!-- end modal delete -->
                                            @endforeach
                                            {{-- @endif --}}

                                        </tbody>
                                    </table>
                                    <div class="paginators">
                                        {{-- @if ($chapter !== 0) --}}
                                        {{ $chapter->appends(request()->all()) }}
                                        {{-- @endif --}}

                                    </div>
                                </div>
                            </div>
                            <!-- paginator -->

                            <!-- end paginator -->
                        </div>
                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </main>
    <!-- end main content -->


@endsection
