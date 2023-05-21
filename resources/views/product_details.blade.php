@extends('layouts.main')

@section('content')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $product->subcategory->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex">
                <div class="p-2">
                    <div class="popular-img">
                        <img src="/storage/{{ $product->image }}" style="width:30%">
                    </div>
                </div>
                <div class="p-2 flex-grow-1">
                <div class="single_product_text text-center">
                    <h3>{{ $product->name }}</h3>
                    <p>{{$product->description}}</p>
                    <p>{{$product->price}} тг</p>
                </div>
                </div>
            </div>
            <div class="add_to_cart mb-4 d-flex">
                @auth
                @if ($product->users->pluck('id')->contains(Auth::id()))
                    <a href="/favorite/{{ $product->id }}" class="btn btn-outline-primary mr-4">remove from favorite</a>
                @else
                    <a href="/favorite/{{ $product->id }}" class="btn btn-outline-primary mr-4">add to favorite</a>
                @endif
                @endauth
                <a href="/product/{{ $product->id }}/add" class="btn btn-outline-primary">add to cart</a>

            </div>
        </div>
        </div>
    </div>
</main>
@endsection