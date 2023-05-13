@extends('admin.master')
@section('module','Category')
@section('action','Manage')

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="row row--grid">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
					@include('admin.blocks.category.title')
					<div class="main__title-wrap">
						<!-- search -->
						<form action="" class="main__title-form" >
							<input type="search" name="key" placeholder="Find category..." />
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
									<th>NO.</th>
									<th>NAME</th>
									<th>CRAETED DATE</th>
									<th id="action">ACTIONS</th>
								</tr>
							</thead>

							<tbody>
								@foreach ($category as $item)
								<tr>
									<td>
										<div class="main__table-text">{{ $loop->iteration }}</div>
									</td>
									<td>
										<div class="main__table-text"><a href="#">{{ $item->name }}</a></div>
									</td>
									<td>
										<div class="main__table-text">{{ date( "d/m/Y h:i:s",strtotime($item->created_at) ) }}</div>
									</td>
									
									<td>
										<div class="main__table-btns">
											<a href="{{ route('admin.category.edit', ['id' => $item->id]) }}" class="main__table-btn main__table-btn--edit">
												<i class="icon ion-ios-create"></i> <span> Edit</span> 
											</a>
											<a href="#modal-delete-{{ $item->id}}" class="main__table-btn main__table-btn--delete open-modal">
												<i class="icon ion-ios-trash"></i> <span> Delete</span> 
											</a>
										</div>
									</td>
								</tr>

								<!-- modal delete -->
								<div id="modal-delete-{{ $item->id}}" class="zoom-anim-dialog mfp-hide modal">
									<h6 class="modal__title">Item delete</h6>
				
									<p class="modal__text">Are you sure to permanently delete this item?</p>
				
									<div class="modal__btns">
										<a class="modal__btn modal__btn--apply" href="{{ route('admin.category.delete', ['id' => $item->id]) }}">
											<button type="button"> Delete </button> 
										</a>
										<button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
									</div>
								</div>
								<!-- end modal delete -->
								@endforeach
							</tbody>
						</table>

						<!-- paginator -->
						<div class="paginators"> 
								{{$category->appends(request()->all() )}}
						</div>
						<!-- end paginator -->
						
					</div>
				</div>
				<!-- end users -->

				<!-- paginator -->
				{{-- <div class="col-12">
					<div class="paginator-wrap">
						<span>Total</span>
						<ul class="paginator">
							<li class="paginator__item paginator__item--prev">
								<a href="#"><i class="icon ion-ios-arrow-back"></i></a>
							</li>
							<li class="paginator__item paginator__item--active"><a href="#">1</a></li>
							<li class="paginator__item"><a href="#">2</a></li>
							<li class="paginator__item"><a href="#">3</a></li>
							<li class="paginator__item"><a href="#">4</a></li>
							<li class="paginator__item paginator__item--next">
								<a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
							</li>
						</ul>
					</div>
				</div> --}}
				<!-- end paginator -->



        </div>
    </div>
</main>

@endsection