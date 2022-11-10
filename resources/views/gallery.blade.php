@extends('layout.app')
@section('title')
    <title>Gallery</title>
    <meta name="description" content="A picture speaks a thousand words. Here are some wonderful interactions and beautiful moments we shared with the NDIS participants who selected us as their service providers.">
    <meta name="robots" content="index, follow" />
    <meta property="og:image" content="{{url($gallery->first()->image)}}"/>
    <meta property="og:title" content="Gallery"/>
    <meta property="og:description" content="A picture speaks a thousand words. Here are some wonderful interactions and beautiful moments we shared with the NDIS participants who selected us as their service providers."/>
@endsection
@section('content')
    <section class="gallery-section">
        <div class="gallery-header col-sm-12 col-md-10">
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