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

        .content {
            margin-top: 80px;
        }

        .content__title {
            color: rgb(31, 214, 214);
        }

        .content__title b{
            text-transform: uppercase;
        }

        .search-link {

        }
    </style>
@endpush
@section('content_client')

        <section class="content">
            <div class="content__head">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- content title -->
                            <h2 class="content__title"> <b>Kết quả tìm kiếm: </b> {{$data['key']}} </h2>
                            <!-- end content title -->

                        </div>
                    </div>
                </div>
            </div>
           
    
            <div class="container">
                <!-- content tabs -->
                <div class="tab-content">
    
                    {{-- ALL --}}
                    <div class="search-link">
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
                                            <span class="card__rate card__rate--green">8.4</span>
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
                    </div>
                    {{-- END ALL --}}

                </div>
                <!-- end content tabs -->
            </div>
        </section>
    </section>

@endsection
