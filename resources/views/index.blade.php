@extends('layouts.main')

@section('content')
    <main>
        <!--? slider Area Start -->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center slide-bg">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Select Your New Perfect Style</h1>
                                    <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat is aute irure.</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                        <a href="/categories" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/watch.png" alt="" class=" heartbeat">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? Popular Items Start -->
        <div class="popular-items section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>Popular Items</h2>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $cart = session('cart')   
                    @endphp
                    @foreach ($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <a href="/product/{{ $product->id }}">
                                    <img src="/storage/{{ $product->image }}" alt="">
                                </a>
                                <div class="img-cap">
                                    @if (!in_array($product->id, $cart))
                                            <a href="/product/{{ $product->id }}/add">
                                                <div class="img-cap">
                                                    <span>Add to cart</span>
                                                </div>
                                            </a>
                                        @else
                                            <a href="/product/{{ $product->id }}/remove">
                                                <div class="img-cap">
                                                    <span>Remove from cart</span>
                                                </div>
                                            </a>
                                        @endif
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">{{ $product->name }}</a></h3>
                                <span>{{ $product->price }} тг</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="/categories" class="btn view-btn1">View More Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
        <!--? Watch Choice  Start-->
        <div class="watch-area section-padding30">
            <div class="container">
                <div class="row align-items-center justify-content-between padding-130">
                    <div class="col-lg-5 col-md-6">
                        <div class="watch-details mb-40">
                            <h2>Product of Choice</h2>
                            <h3>{{ $choises[0]->name }}</h2>
                            <p>{{ $choises[0]->description }}</p>
                            <a href="/product/{{ $choises[0]->id }}" class="btn">Show item</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="choice-watch-img mb-40">
                            <img src="/storage/{{ $choises[0]->image }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="choice-watch-img mb-40">
                            <img src="/storage/{{ $choises[1]->image }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="watch-details mb-40">
                            <h2>Product of Choice</h2>
                            <h3>{{ $choises[1]->name }}</h2>
                            <p>{{ $choises[1]->description }}</p>
                            <a href="/product/{{ $choises[1]->id }}" class="btn">Show item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Watch Choice  End-->
        <!--? Shop Method Start-->
        
@endsection