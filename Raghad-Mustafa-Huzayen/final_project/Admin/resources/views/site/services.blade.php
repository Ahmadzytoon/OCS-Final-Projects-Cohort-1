@extends('site.layout.master')

@section('content')
<div class="site-section" id="services-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8 section-heading">
                <span class="subheading">Our Services</span>
                <h2 class="heading mb-3">Dodgeball Services</h2>
                <p>From weekly games to private bookings, we offer a complete dodgeball experience for everyone.</p>
            </div>
        </div>
        
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 mb-4 col-md-6">
                <div class="ftco-feature-1 h-100">
                    <span class="icon flaticon">
                        <i class="{{ $service->icon_class }}"></i>
                    </span>
                    <div class="ftco-feature-1-text">
                        <h2>{{ $service->title }}</h2>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection