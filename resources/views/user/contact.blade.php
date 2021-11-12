@extends('user.layouts.app')

@section('main-content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('user/assets/img/bg_image_1.jpg')}});">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Contact</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->



    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Get in Touch</h1>

            <form class="contact-form mt-5">
                <div class="row mb-3">
                    <div class="col-sm-6 py-2 wow fadeInLeft">
                        <label for="fullName">Name</label>
                        <input type="text" id="fullName" class="form-control" placeholder="Full name..">
                    </div>
                    <div class="col-sm-6 py-2 wow fadeInRight">
                        <label for="emailAddress">Email</label>
                        <input type="text" id="emailAddress" class="form-control" placeholder="Email address..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" class="form-control" placeholder="Enter subject..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
            </form>
        </div>
    </div>

    <div class="maps-container wow fadeInUp">
        <div id="google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d3649.6222204295395!2d90.42824601448538!3d23.832029191571046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d23.832221099999998!2d90.430334!4m5!1s0x3755c6406f65ad8f%3A0x23a793ec64a1087b!2sKurmitola%2C%20Dhaka!3m2!1d23.8318254!2d90.4305354!5e0!3m2!1sen!2sbd!4v1636722054235!5m2!1sen!2sbd" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>


    @include('user.make-appointment')
    @include('user.layouts.partials.banner')
@endsection
