@extends('admin.master')
@section('module', 'Comic')
@section('action', 'Manage')

@section('content')
    <?php
    
    function CatChuoi(string $str)
    {
        $str = mb_substr($str, 0, 10);
        $pos = mb_strrpos($str, ' ');
        $result = mb_substr($str, 0, $pos);
        return "$result...";
    }
    
    // function checkCategory(integer $a, integer $b)
    // {
    //     if ($a == $b) {
    //         return $result;
    //     }
    //     return $result;
    // }
    // ?> 


    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        @include('admin.blocks.comic.title')
                        <a href="{{ route('admin.comic.create') }}" class="main__title-add">Add @yield('module')</a>
                        <div class="main__title-wrap">
                            <!-- search -->
                            <form action="" class="main__title-form">
                                <input type="search" name="key" placeholder="Find comic..." />
                                <button type="submit">
                                    <i class="icon ion-ios-search"></i>
                                </button>
                            </form>
                            <!-- end search -->
                        </div>
                    </div>
                </div>
                <!-- end main title -->

                <!-- users -->
                <div class="col-12">
                    <div class="main__table-wrap">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>IMAGE COVER</th>
                                    <th>NAME</th>
                                    <th>CATEGORY</th>
                                    <th>AUTHOR</th>
                                    <th>DESCRIPTION</th>
                                    <th>CRAETED DATE</th>
                                    <th id="action">ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($comic as $item)
                                    <tr>
                                        <td>
                                            <div class="main__table-text">{{ $loop->iteration }}</div>
                                        </td>
 
                                        <td>
                                            <div class="main__table-img"><img
                                                    src="{{ asset('uploads/covers') }}/{{ $item->image }}" alt="errol">
                                            </div>
                                        </td>
 
                                        <td>
                                            <div class="main__table-text"><a
                                                    href="{{ route('admin.chapter.index', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text"><a href="#">
                                                    @foreach ($category as $cate)
                                                        {{ $item->category_id == $cate->id ? $cate->name : '' }}
                                                    @endforeach
                                                </a>
                                            </div> 
                                        </td>

                                        <td>
                                            <div class="main__table-text"><a href="#">{{ $item->author }}</a></div>
                                        </td>

                                        <td>
                                            <div class="main__table-text"><a href="#">
                                                    {{ mb_strlen($item->description) > 10 ? CatChuoi($item->description) : $item->description }}
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text">
                                                {{ date('d/m/Y h:i:s', strtotime($item->created_at)) }}</div>
                                        </td>

                                        <td>
                                            <div class="main__table-btns">
                                                <a href="{{ route('admin.chapter.index', ['id' => $item->id]) }}"
                                                    class="main__table-btn main__table-btn--view">
                                                    <i class="icon ion-ios-eye"></i><span> View</span>
                                                </a>

                                                <a href="{{ route('admin.comic.edit', ['id' => $item->id]) }}"
                                                    class="main__table-btn main__table-btn--edit">
                                                    <i class="icon ion-ios-create"></i> <span> Edit</span>
                                                </a>
                                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#confirm-delete">
                                                    Delete
                                                </button> --}}
                                                <!-- Button trigger modal -->

                                                <a href="#modal-delete-{{ $item->id }}"
                                                    class="main__table-btn main__table-btn--delete open-modal">
                                                    <i class="icon ion-ios-trash"></i> <span> Delete</span>
                                                </a>
                                            </div>
                                        </td>

                                        {{-- <td>
											<div class="main__table-btns">
												<a href="#modal-status" class="main__table-btn main__table-btn--banned open-modal">
													<i class="icon ion-ios-lock"></i>
												</a>
												<a href="#" class="main__table-btn main__table-btn--view">
													<i class="icon ion-ios-eye"></i>
												</a>

												<div class="main__table-btns">
													<a href="{{ route('admin.category.edit', ['id' => $item->id]) }}" class="main__table-btn main__table-btn--edit">
											 			<i class="icon ion-ios-create"></i> <span> Edit</span> 
													</a>
													<a href="#modal-delete-{{ $item->id}}" class="main__table-btn main__table-btn--delete open-modal">
														<i class="icon ion-ios-trash"></i> <span> Delete</span> 
													</a>
												</div>
											</div>
										</td> --}}
                                    </tr>
                                    {{-- <td>
											<div class="main__table-text main__table-text--green">Visible</div>
										</td> --}}

                                    <!-- modal delete -->
                                    <div id="modal-delete-{{ $item->id }}" class="zoom-anim-dialog mfp-hide modal">
                                        <h6 class="modal__title">Delete Comic {{ $item->name }}</h6>
                                        <p class="modal__text">Are you sure to permanently delete this Comic?</p>
                                        <div class="modal__btns">
                                            <a class="modal__btn modal__btn--apply"
                                                href="{{ route('admin.comic.delete', ['id' => $item->id]) }}">
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
                    {{ $comic->appends(request()->all()) }}
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
