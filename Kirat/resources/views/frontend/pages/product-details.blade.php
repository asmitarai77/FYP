@extends('frontend.includes.app')
@section('main-content')
    <section class="prod-detail">
        <div class="prod-detail-container container">

            <div class="ship">
                <p>Free Shipping over 100$</p>
            </div>

            <div class="detail">
                <div class="det-img">
                    <img src="{{ asset($product->image) }}" alt="">
                    <img src="{{ asset($product->image1) }}" alt="">
                    {{-- <img src="img/product/prod2.jpg" alt=""> --}}
                </div>
                <div class="det-desc">
                    <div class="desc">
                        <p>{{ $product->title }}</p>
                        <p>{{ $product->description }}</p>
                        <p>{{ $product->price }}</p>
                        {{-- <div class="add-cart">
                            <div class="1">
                                <input type="checkbox" name="small" id="size">
                                <label for="size">small</label>
                            </div>
                            <div class="2">
                                <input type="checkbox" name="large" id="size">
                                <label for="size">large</label>
                            </div>
                            <div class="3">
                                <input type="checkbox" name="Xl" id="size">
                                <label for="size">XL</label>
                            </div>
                            <div class="4">
                                <input type="checkbox" name="XXL" id="size">
                                <label for="size">XXL</label>
                            </div>
                        </div> --}}
                        <a class="add-cart-btn" href="{{ route('add_to_cart', $product->id) }}"
                            style="background-color: #f77737;">
                            <img src="img/product/shopping-cart.png" alt="">
                            <p>Add to cart</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
