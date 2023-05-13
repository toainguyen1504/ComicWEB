@extends('admin.master')
@section('module', 'User')
@section('action', 'Manage')

@section('content')

    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        @include('admin.blocks.user.title')

                        <div class="main__title-wrap">
                            <!-- search -->
                            <form action="" class="main__title-form">
                                <input type="search" name="key" placeholder="Find user..." />
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
                                    <th>STT</th>
                                    <th>BASIC INFO</th>
                                    <th>USERNAME</th>
                                    <th>LEVEL</th>
                                    <th>STATUS</th>
                                    <th>CRAETED DATE</th>
                                    <th id="action">ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>
                                            <div class="main__table-text">{{ $loop->iteration }}</div>
                                        </td>
                                        <td>
                                            <div class="main__user">
                                                <div class="main__avatar">
                                                    <img src="{{ asset('adminAssets/img/user.svg') }}" alt="">
                                                </div>
                                                <div class="main__meta">
                                                    <h3>{{ $item->name }}</h3>
                                                    <span>{{ $item->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">{{ $item->name }}</div>
                                        </td>

                                        <td>
                                            <div class="main__table-text main__table-text--green">
                                                {{ $item->level == 0 ? 'Admin' : 'User' }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text main__table-text--green">
                                                {{ $item->status == 0 ? 'Approved' : 'Disapproved' }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">
                                                {{ date('d/m/Y h:i:s', strtotime($item->created_at)) }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-btns">
                                                <a href="#modal-status-{{ $item->id }}"
                                                    class="main__table-btn main__table-btn--banned open-modal">
                                                    <i class="icon ion-ios-lock"></i>
                                                </a>
                                                <a href="{{ route('admin.user.edit', ['id' => $item->id]) }}"
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
                                    <!-- modal status -->
                                    <div id="modal-status-{{ $item->id }}" class="zoom-anim-dialog mfp-hide modal">
                                        <h6 class="modal__title">Status change</h6>

                                        <p class="modal__text">Are you sure about immediately change status?</p>

                                        <div class="modal__btns">
                                            @if ($item->status == 0)
                                                <a href="{{ route('admin.user.lock', ['id' => $item->id]) }}"
                                                    class="modal__btn modal__btn--apply">
                                                    <span> Apply</span>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.user.unlock', ['id' => $item->id]) }}"
                                                    class="modal__btn modal__btn--apply">
                                                    <span> Apply</span>
                                                </a>
                                            @endif


                                            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
                                        </div>
                                    </div>
                                    <!-- end modal status -->
                                    <!-- modal delete -->
                                    <div id="modal-delete-{{ $item->id }}" class="zoom-anim-dialog mfp-hide modal">
                                        <h6 class="modal__title">User delete</h6>

                                        <p class="modal__text">Are you sure to permanently delete this user?</p>

                                        <div class="modal__btns">
                                            <a class="modal__btn modal__btn--apply"
                                                href="{{ route('admin.user.delete', ['id' => $item->id]) }}">
                                                Delete
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
                    {{ $user->appends(request()->all()) }}
                </div>
                <!-- end paginator -->

            </div>
        </div>
    </main>
    <!-- end main content -->

@endsection
