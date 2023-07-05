@extends('frontend.includes.app')
@section('main-content')
<section class="search">
        <form action="{{ route('search') }}" method="GET">

            <div class="search-container container">

                <div class="search-wrapper">
                    @csrf
                    <div class="form-wrapper">
                        <div class="form">
                            <select name="category">

                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div class="form">
                            <select name="price">
                                <option>Price Range</option>
                                <option value="500">$ 500</option>
                                <option value="1000">$ 1000</option>
                                <option value="1500">$ 1500</option>
                                <option value="2000">$ 2000</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-wrapper">
                        <div class="select-form">
                            <button type="submit" class="select-btn">Search</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </section>
    <!-- End of Search section -->

    <!-- This is the product section -->

    <section>
        <div class="product">
            <div class="product-container container">

                <div class="product-main">
                    <div class="pd-grid">
                        @foreach ($product as $item)
                            <div class="pd-grid-row">

                                <div class="prod-img">
                                    <a href="{{ route('product.details', $item->id) }}" class="img-det">
                                        <img class="img img-01" src="{{ asset($item->image) }}" alt="">
                                        <img class="img img-02" src="{{ asset($item->image1) }}" alt=""
                                            height="1250">
                                    </a>
                                    <div class="cart">
                                        <a href="{{ route('add_to_cart', $item->id) }}" class="prod-icon">
                                            <i class="fa-regular fa-heart fa-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="prod-desc">
                                    <a href="#">{{ $item->title }}</a>
                                    <p>$. {{ $item->price }}</p>
                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>

            </div>
    </section>
    <!-- End of product section -->
@endsection
