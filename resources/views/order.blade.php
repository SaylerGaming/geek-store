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
                                <h2>Order number {{ $cart->id }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!-- Latest Products Start -->
        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>                                                      
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                {{-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">NewestArrivals</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Price high to low</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Most populer </a> --}}
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <h2>Status: <span>{{ $cart->status }}</span></h2>
                    <h3 style="margin-bottom: 35px">Total price: {{ $cart->price }} тг</h3>
                    @foreach ($orders as $order)
                        @php
                            $product = $order->product
                        @endphp
                        <div class="d-flex justify-content-between">
                            <img style="width:100px" src="/storage/{{ $product->image }}">
                            <p>{{ $product->name }}</p>
                            <p>{{ $product->price }} тг</p>
                        </div>
                    @endforeach

                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
        <!--? Shop Method Start-->
        
@endsection