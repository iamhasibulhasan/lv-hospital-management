<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach($all_data as $data)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img src="{{asset('/')}}media/doctors/{{$data->photo}}" alt="">
                            <div class="meta">
                                <a target="_blank" href="https://www.facebook.com/iamtheridu/"><span class="mai-logo-facebook-f"></span></a>
                                <a target="_blank" href="https://www.instagram.com/iamtheridu/"><span class="mai-logo-instagram"></span></a>
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
</div>
