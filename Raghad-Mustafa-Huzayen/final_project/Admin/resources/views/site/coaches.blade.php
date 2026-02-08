@extends('site.layout.master')

@section('content')
<div class="site-section" id="coaches-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8 section-heading">
                <span class="subheading">Meet Our Team</span>
                <h2 class="heading mb-3">Our Dodgeball Coaches</h2>
                <p>Get to know the professionals who organize and oversee all our dodgeball games.</p>
            </div>
        </div>
        
        <div class="row">
            @foreach($coaches as $coach)
            <div class="col-lg-6 mb-5">
                <div class="d-flex align-items-stretch">
                    <div class="coach-image mr-4" style="flex-shrink: 0;">
                        <img src="{{ asset('site/images/coaches/' . $coach->image) }}" 
                             alt="{{ $coach->name }}" 
                             class="img-fluid rounded"
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="coach-content">
                        <h3 class="mb-2">{{ $coach->name }}</h3>
                        <span class="d-block text-primary mb-2">{{ $coach->title }}</span>
                        
                        <div class="mb-3">
                            <span style="color: #black; font-weight: bold;">{{ $coach->experience }} Experience</span>
                            <span style="color: #black; font-weight: bold;">{{ $coach->specialty }}</span>
                        </div>
                        
                        <p>{{ $coach->bio }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection