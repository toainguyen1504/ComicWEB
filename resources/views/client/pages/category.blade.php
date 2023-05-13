@extends('client.master')
{{-- @section('module', 'Dashboard')
@section('action', 'Manage') --}}
@section('content_client')
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Comic have category </h2>
                        <!-- end content title -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row row--grid">
                        <!-- card -->
                        @foreach ($comic as $item)
                            <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                                <div class="card">
                                    {{-- {{'uploads/covers/'. $item->image }} --}}
                                    <div class="card__cover">
                                        <img src="{{'uploads/covers/'. $item->image }}" alt="errol">
                                        <a href="{{ route('detail') }}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                        <span class="card__rate card__rate--green">7.1</span>
                                    </div>
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="{{ route('detail') }}">Ta Có Năm Đại Lão
                                                Ba Ba</a></h3>
                                        <span class="card__category">
                                            <a href="#">{{ $item->category_id }}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- end card -->
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </section>
@endsection
