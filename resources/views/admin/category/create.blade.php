@extends('admin.master')
@section('module','Category')
@section('action','Create')

@section('content')

<main class="main">
    <div class="container-fluid"> 
        <form action="{{ route('admin.category.store') }}" method="post">
            @csrf
            <div class="row row--grid">
                <!-- main title -->
                <div class="col-12">   
                    <div class="main__title">
                        @include('admin.blocks.category.title')
                    </div>
                </div>
                <!-- end main title -->

                <div class="col-12">
                    <label id="label" for="category-name">Category Name</label>
                    <input type="text" class="form__input" id="category-name" name="name" placeholder="Enter category...">
                </div>

                <div class="col-12">
                    <button type="submit" class="form__btn js_submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
</main>

@endsectionS