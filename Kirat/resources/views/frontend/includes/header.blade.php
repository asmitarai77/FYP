<style>
    .cart-img {
        height: 50px;
        width: 250px;
    }

    .dropdown-menu.show {
        display: block;
        width: 500px;
        margin-left: -243%;
    }

    .data {
        position: absolute;
        margin-left: 25%;
    }

    .checkout {
        text-align: start;
        justify-content: start;
    }

    .content {
        height: 50px;

    }

    .navbar {
        overflow: visible !important;
    }
</style>
<header>


    <!-- this is Navigation Bar section -->
    <section id="navbar" class="navbar header" href="javascript:void(0" onscroll="myfunction()">
        <div class="container">
            <div class="navbar-container container">
                <div class="navbar-body">
                    <div class="nav-logo">
                        <a href="home.html" class="nav-main-logo"><img src="{{ asset('frontend/img/logo.png') }}"
                                alt=""></a>
                    </div>

                    <div class="nav-content">
                        <ul class="nav-ul">
                            <li><a href="{{ route('index') }}" class="nav-text">Home</a></li>
                            <li><a href="{{ route('product') }}" class="nav-text">Products</a></li>
                            <li><a href="{{ route('about') }}" class="nav-text">About us</a></li>
                            <li><a href="{{ route('contact') }}" class="nav-text">Contact Us</a></li>
                            @if (Auth::guard('user')->user())
                                <li><a href="" class="nav-text">{{ Auth::guard('user')->user()->name }}</a></li>
                                <li><a href="{{ route('logout') }}" class="nav-text">Logout</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="nav-text">Log In</a></li>
                                <li><a href="{{ route('register') }}" class="nav-text">Register</a></li>
                            @endif
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="nav-text">Become Member</a></li>
                            <div class="dropdown">
                                <button type="button"class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i> Cart
                                    <span
                                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </button>

                                <div class="dropdown-menu datashow" aria-labelledby="dropdownMenuButton1">
                                    <div class="row total-header-section">
                                        @php $total = 0 @endphp
                                        @foreach ((array) session('cart') as $id => $details)
                                            @php
                                                // dd($details);
                                            @endphp
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                        @endforeach
                                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                        </div>
                                    </div>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <div class="content mt-1">
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img class="cart-img" src="{{ $details['photo'] }}" />
                                                    </div>
                                                    <br>
                                                    <div class="col-lg-8 col-sm-8 col-8 ">
                                                        <div class="data">
                                                            {{ $details['product_name'] }}
                                                            <br>

                                                            ${{ $details['price'] }}

                                                            Quantity:{{ $details['quantity'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">

                                        <div class="col-lg-12 col-sm-12 col-12 text-start checkout">
                                            <br>
                                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block ">View
                                                all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h5>Become a member and get 15 percent discount</h5>
                <div class="modal-body">

                    @if (Auth::guard('user')->user())
                        @php
                            $member_id = App\Models\User::where('id', Auth::guard('user')->user()->id)->first();
                            // dd($member_id);
                        @endphp
                        @if ($member_id->member_id != null)
                            Member Id: {{ $member_id->member_id }}
                        @else
                            Member Id: Not a Member Yet
                        @endif
                    @endif

                    <br>

                    @if (Auth::guard('user')->user())
                        @php
                            $member_id = App\Models\User::where('id', Auth::guard('user')->user()->id)->first();
                            // dd($member_id);
                        @endphp
                        @if ($member_id->member_id != null)
                            <button type="button" class="btn btn-primary">
                                Already a Member
                            </button>
                        @else
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">
                                Become a Member
                            </button>
                        @endif
                    @else
                        Login to Become Member
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container">
                    <form action="{{ route('member.store') }}" method="POST">
                        @csrf
                        @if (Auth::guard('user')->user())
                            <input type="hidden" class="form-control" name="user_id"
                                value="{{ Auth::guard('user')->user()->id }}" placeholder="name">
                        @endif

                        Name:
                        <input type="text" class="form-control" name="name" placeholder="name">
                        Email:
                        <input type="email" class="form-control" name="email" placeholder="email">
                        Number:
                        <input type="number" class="form-control" name="phone" placeholder="phone">
                        Address:
                        <input type="text" class="form-control" name="address" placeholder="address">
                        <br>
                        <button class="btn btn-primary" type="submit"> submit</button>
                        <br>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Navigation Bar section -->


    <!-- This is Banner Section -->
    <section class="banner">
        <div class="banner-container container">
            <div class="banner-content">
                <div class="banner-text">
                    <h1>Kirat Yakhthung Chumlung</h1>
                    <p>We sell Rai and Limbu Cultural accessories, clothes and instruments to our interested customers.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end of Banner Section -->


</header>
