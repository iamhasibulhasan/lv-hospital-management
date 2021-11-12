@extends('user.layouts.app')

@section('main-content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('user/assets/img/bg_image_1.jpg')}});">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Our Doctors</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div>


    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="row">
                        @foreach($all_data as $data)
                            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                                <div class="card-doctor">
                                    <div class="header">
                                        <img src="{{asset('/')}}media/doctors/{{$data->photo}}" alt="">
                                        <div class="meta">
                                            <a href="#"><span class="mai-call"></span></a>
                                            <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <p class="text-xl mb-0">{{$data->name}}</p>
                                        <span class="text-sm text-grey">{{$data->speciality}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach





                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->


    @include('user.make-appointment')
    @include('user.layouts.partials.banner')
@endsection
