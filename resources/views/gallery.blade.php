@extends('layout.app')
@section('title')
    <title>Gallery</title>
    <meta name="description" content="Please read the form carefully and complete all the sections..">
    <meta name="robots" content="index, follow" />
    <meta property="og:url" content="https://www.qualityallied.com.au/referral" />
    <meta property="og:image" content="https://www.qualityallied.com.au/2c6dd918dca09f627fa632ba8977c6cc.png"/>
    <meta property="og:title" content="Referral Page"/>
    <meta property="og:description" content="Please read the form carefully and complete all the sections.."/>
@endsection
@section('content')
    <section class="gallery-section">
        <div class="gallery-header">
            <h2>A Peek at the Treasured Times We Spent with the People in Our Care</h2>
            <p>A picture speaks a thousand words. Here are some wonderful interactions and beautiful moments we shared with the NDIS participants who selected us as their service providers.</p>    
        </div>
        <div class="gallery-slider">
            @foreach($gallery as $gal)
            <div class="gallery-image">
                <img src="{{url($gal->image ?? '')}}" alt="" class="img-fluid">
            </div>
            @endforeach
            <!-- <div class="gallery-image">
                <img src="{{url('frontend/images/gallery-one.png')}}" alt="" class="img-fluid">
            </div>
            <div class="gallery-image">
                <img src="{{url('frontend/images/gallery-one.png')}}" alt="" class="img-fluid">
            </div>
            <div class="gallery-image">
                <img src="{{url('frontend/images/gallery-one.png')}}" alt="" class="img-fluid">
            </div>
            <div class="gallery-image">
                <img src="{{url('frontend/images/gallery-one.png')}}" alt="" class="img-fluid">
            </div> -->
        </div>
    </section>
@endsection
@section('script')
    <script>
        var $slider = $('.gallery-slider');
        $slider.slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        arrows: true,
        responsive: [
            {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
            },
            {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
            }
        ]
        });
    </script>
@endsection