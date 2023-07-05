@extends('frontend.includes.app')
@section('main-content')
    <!-- This the contact Section -->
    <section class="contact">
        <div class="contact-container container">
            <div class="contact-body">
                <div class="contact-header">
                    <p><span><a href="home.html">Home</a></span> / contact</p>
                    <div class="project-footer">
                        <strong>Contact</strong>
                    </div>
                </div>
                <div class="contact-main-body">
                    <div class="cont-body">
                        <div class="cont-content">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="contact-main-form">
                                    <div class="cont-heading">
                                        <strong>Send Message</strong>
                                    </div>
                                    <div class="contact-form">
                                        <div class="contact-address">
                                            <div class="contact-details">
                                                <label for="cont-name">Full Name</label>
                                                <input type="text" name="fullname" class="cont-name"
                                                    placeholder="Full Name" value="{{ old('fullname') }}">
                                                @error('fullname')
                                                    <div class="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="contact-details">
                                                <label for="cont-name">Your Email</label>
                                                <input type="text" name="email" class="cont-name"
                                                    placeholder="Your Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="contact-details">
                                            <label for="cont-name">Subject</label>
                                            <input type="text" name="subject" class="cont-name" placeholder="Subject"
                                                value="{{ old('subject') }}">
                                            @error('subject')
                                                <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="contact-details">
                                            <label for="cont-name">Message</label>
                                            <textarea rows="6" placeholder="Type your Message here" name="message" class="cont-name">{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="contact-submit">
                                            <button type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="contact-text">
                                <div class="cont-heading">
                                    <strong>Get in Touch</strong>
                                </div>
                                <div class="contact-text-details">
                                    <div class="cont-txt">
                                        <p>Nullam vel enim risus. Integer rhoncus hendrerit sem egestas porttitor.</p>
                                    </div>
                                    <div class="cont-text">
                                        <strong>Office Address</strong>
                                        <p> Dharan-15, Putali Line</p>
                                    </div>
                                    <div class="cont-text">
                                        <strong>Contact Number</strong>
                                        <p> +977 9817313800</p>
                                    </div>
                                    <div class="cont-text">
                                        <strong>Email Address</strong>
                                        <p> KiratYakthungchumlung@gmail.com </p>
                                    </div>
                                    <div class="cont-text">
                                        <strong>Career Info</strong>
                                        <p> If you’re interested in employment opportunities at Kirat Yakthung chumlung,
                                            please email us</p>
                                    </div>
                                    <div class="cont-email">
                                        <a href="#">KiratYakthungchumlung@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End of Contact Section -->

    <!-- map section -->
    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3565.8170742539187!2d87.2978272649646!3d26.6543387332396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef6ea070e7b18b%3A0x2959e2a3e2bf54e0!2sItahari%20International%20College!5e0!3m2!1sen!2snp!4v1677639905743!5m2!1sen!2snp"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>" width="600" height="450" style="border:0;"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"
    </section>
@endsection
