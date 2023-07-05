@extends('frontend.includes.app')
@section('main-content')
    <!-- this is search section -->
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
    <section>
        <div class="top-pick">
            <div class="top-pick-container container">
                <div class="top-pick-header">
                    <h3>Our Best Selling Products</h3>
                </div>
                <div id="owl-demo" class="owl-carousel owl-theme">

                    <div class="item">
                        <div class="pick-img">
                            <img src="{{ asset('frontend/img/product/product one.png') }}">
                        </div>
                        <div class="home-button">
                            <a>Shop Now</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pick-img">
                            <img src="{{ asset('frontend/img/product/product one.png') }}">
                        </div>
                        <div class="home-button">
                            <a href="#">Shop Now</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pick-img">
                            <img src="{{ asset('frontend/img/product/product one.png') }}">
                        </div>
                        <div class="home-button">
                            <a href="#">Shop Now</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pick-img">
                            <img src="{{ asset('frontend/img/product/product one.png') }}">
                        </div>
                        <div class="home-button">
                            <a href="#">Shop Now</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pick-img">
                            <img src="{{ asset('frontend/img/product/product one.png') }}">
                        </div>
                        <div class="home-button">
                            <a href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Top Pick section -->
    <section class="feature">
        <div class="feature-container container">
            <div class="feat-heading">
                <p>Our Featured products</p>
            </div>
            <div class="product-main">
                <div class="pd-grid">

                    @foreach ($products as $item)
                        <div class="pd-grid-row">
                            <div class="prod-img">
                                <a href="{{ route('product.details', $item->id) }}" class="img-det">
                                    <img class="img img-01" src="{{ asset($item->image) }}" alt="">
                                    <img class="img img-02" src="{{ asset($item->image1) }}" alt="" height="1250">
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

    <!-- Footer Section -->


    <section class="subscribe">
        <div class="sub-body">
            <div class="sub-content">
                <div class="sub-header">
                    <strong>Contact Us for More</strong>
                </div>
                <div class="sub-text">
                    <p>contact Us more information on the new products.</p>
                </div>
                <div class="sub-button">
                    <a href="#" class="signin-btn">Contact Us</a>
                </div>
            </div>
            <div class="sub-image">
                <img src="{{ asset('frontend/img/newsletter.jpg') }}" alt="">
            </div>
        </div>
    </section>

   <!-- This is Reliable Section -->
   <section class="customer">
            <div class="customer-container container">
                <div class="customer-body">
                    <div class="customer-header">
                        <h3>Our Customer Feedback</h3>
                    </div>
                    <div class="customer-logo owl-carousel owl-theme">
                        <div class="test-content">
                            <div class="test">
                                <a href="#">
                                    <div class="test-image">
                                        <img src="{{asset('frontend/img/testimonial.jpg')}}" alt="">
                                    </div>
                                    <div class="test-text">
                                        <div class="text-1">
                                            <p> Very satisfied</p>
                                        </div>
                                        <div class="text-2">
                                            <p><span>Judith Rai</span><br>Dharan-15</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="test-content">
                            <div class="test">
                                <a href="#">
                                    <div class="test-image">
                                    <img src="{{asset('frontend/img/testimonial.jpg')}}" alt="">
                                    </div>
                                    <div class="test-text">
                                        <div class="text-1">
                                            <p> Reliable </p>
                                        </div>
                                        <div class="text-2">
                                            <p><span>James Fanning</span><br>24-Streets</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Reliable Section -->
@endsection
