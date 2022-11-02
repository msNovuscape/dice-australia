@extends('layout.app')
@section('title')
    <title>DICE</title>
    <meta name="description" content="At DICE, we work hard to create a comprehensive program that is tailored to your unique needs and requirements. We recognize that results alone are not nearly as essential as pleasant outcomes. Our ultimate goal thus, is for our participants to experience success; this is our passion. We don't just have one program that works for everyone; instead, we will take the time to get to know you and your family's requirements."/>
    <meta name="og:title" content="DICE"/>
    <meta name="og:image" content="{{url('frontend/images/about-image.png')}}"/>
@endsection
@section('content')
    <!-- Slider -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <img src="{{url($slider->image ?? 'frontend/images/banner-two.png')}}" class="d-block w-100" alt="...">
                <div class="slider-content">
                    <h3>{{$slider->title1}}</h3>
                    <h2>{{$slider->title1}}</h2>
                    <p>{{$slider->short_description}}</p>
                    <a href="contact">Get a Free Consultation</a>
                </div>
            </div>
            @endforeach
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Slider -->
    <!-- NDIS section -->
    <section class="ndis-section">
        <div class="row">
            <div class="col-md-5">
                <div class="ndis-left-desc">
                    <h1>Registered NDIS Provider</h1>
                    <p>We're registered NDIS Service provider for people with disability.</p>
                </div>
                <div class="ndis-love">
                    <a href="/ndis" class="ndis-view-btn">View More</a>
                    <img src="{{url('frontend/images/ndis-love.png')}}"/>
                </div>
            </div>
            <span class="col-md-1 box-border"></span>
            <div class="col-md-6">
                <div class="ndis-desc">
                    <h2>The National Insurance Disability Scheme (NDIS)</h2>
                    <p>We provide various assistance options to help you reach your objectives, whether you're searching for someone to handle all of your needs (full agency) or to assist you in handling key aspects of your care (plan management or self-management). As a certified NDIS care service provider, Disability Inclusion for Community Empowerment (DICE) will collaborate with you to comprehend your unique preferences and manage a team whose objective is to maximize your independence and provide you the opportunity to live your life howsoever you see fit.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- NDIS section -->
    <!-- Service section -->
    <section class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 service-desc mb-4">
                    <h1>Services Personalized to You</h1>
                    <p>We collaborate closely with you to ensure that you and your loved one are receiving proper care that thoroughly satisfies the objectives specified in your care plan.</p>
                </div>
            </div>
            <div class="services mt-4">
                @foreach($services as $service)
                <a href="/service/{{$service->slug}}" class="service-card{{(($loop->index == 1) || ($loop->index == 3) || ($loop->index == 5))  ? '-second' : ''}}">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url($service->icon ?? 'frontend/icons/support-coordination.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>{{$service->name}}</h1>
                            <p>{{strip_tags($service->short_description)}}</p>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}" class="learn-more-icon"/></button>
                </a>
                @endforeach
                <!-- <a href="/service/" class="service-card-second">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/daily-living-support.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Daily Living Support</h1>
                            <p>We give participants the fair and essential assistance they need to engage in regular community engagement activities.</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}" class="learn-more-icon"/></button>
                    </div>
                </a>
                <a href="/service/" class="service-card-third">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/community-partipitation.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Community Participation</h1>
                            <p>We help you achieve goals related to taking part in community, social, or recreational activities</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}" class="learn-more-icon"/></button>
                    </div>
                </a>
                <a href="/service/" class="service-card-second">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/plan-management.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Plan Management</h1>
                            <p>In order for you to live the greatest life possible, we aim to maximize the advantages of your NDIS plan, from process payments to handling finances</p>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}" class="learn-more-icon"/></button>
                </a>
                <a href="/service/" class="service-card-fixth">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/household-task.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Household Task</h1>
                            <p>We help you to keep your home in good condition with NDIS household task services, whether it's for cleaning, washing, cooking, yard work, or general maintenance.</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}" class="learn-more-icon"/></button>
                    </div>
                </a>
                <a href="/service/" class="service-card-second">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/respite-care.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Respite Care</h1>
                            <p>Disability clients and their caregivers might both benefit from a break or a change of scenery thanks to our respite care. When a regular caregiver is not available, alternate care is provided.</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}" class="learn-more-icon"/></button>
                    </div>
                </a> -->
            </div>
        </div>
    </section>
    <!-- Service section -->
    <!-- about section -->
    <section class="about-section">
        <div class="row">
            <div class="col-md-7">
                <div class="about-left">
                    <h2>Why Choose us?</h2>
                    <h5>{!!strip_tags($about_us->first()->description ?? '')!!}</h5>
                    <p>{!!strip_tags($about_us->first()->sub_description ?? '')!!}</p>
                    <a href="{{url('/about')}}">View More</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="about-image">
                    <img src="{{url($about_us->first()->image ?? '')}}" class="w-100" alt="about-image"/>
                </div>
            </div>
        </div>
    </section>
    <!-- about section -->
    <!-- pricing section -->
    <section class="pricing-section">
        <div class="row">
            <div class="col-md-5">
                <div class="pricing-image">
                    <img src="{{url('frontend/images/pricing.png')}}" class="w-100"/>
                </div>
            </div>
            <div class="col-md-7">
                <div class="pricing-detail">
                    <h2>NDIS Pricing</h2>
                    <h5>NDIS pricing arrangements and price limits</h5>
                    <p>We operate under NDIS Pricing Arrangements and Price Limits (formerly the NDIS Price Guide) to help participants better understand how pricing restrictions for supports and services operate. Price control is in place to guarantee that participants get the most for their money from the assistance they receive from us. The maximum fees that registered providers like us can bill NDIS participants for particular supports are known as pricing limitations, and we make sure that all our participants get the best services for the price they pay. We understand that when providing assistance to participants who are under the management of the NDIA or a plan, the regulations specified in the NDIS Pricing Arrangements and Price Limits must be adhered to, and we carefully follow the guidelines to provide excellent services in line with them.
                    <br><br> Price regulation is in place to ensure that participants receive value for money in the supports that they receive.</p>
                    <a href="/ndis-pricing">NDIS Price Guide</a>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing section -->
    <!-- customer section -->
    <section class="customer-section">
        <div class="row">
            <div class="col-md-12 customer-header">
                <h1>Voice of Our Happy Customers</h1>
                <p>The words from our customers always persuades us to bring more happiness to people with disability</p>
            </div>
            <div class="customer-review">
            @foreach($testimonials as $testimonial)
                <div class="customer-review-card">
                    <div class="customer-card-review">
                        <img src="{{url('frontend/icons/quoteicon.svg')}}"/>
                        <p>{{strip_tags($testimonial->review)}}</p>
                        <img src="{{url('frontend/images/starts.png')}}"/>
                    </div>
                    <div class="cutomer-details">
                        <div class="cutomer-image">
                            <img src="{{url($testimonial->image ?? 'frontend/images/starts.png')}}" class="img-fluid customer-img"/>
                        </div>
                        <div class="cutomer-detail">
                            <h3>{{$testimonial->author_name}}</h3>
                            <h5>{{$testimonial->author_designation}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach    
                <!-- <div class="customer-review-card">
                    <div class="customer-card-review">
                        <img src="{{url('frontend/icons/quoteicon.svg')}}"/>
                        <p>All of the staff at DICE are so professional and patient. I am halfway through my treatment and I cannot recommend them enough.</p>
                        <img src="{{url('frontend/images/starts.png')}}"/>
                    </div>
                    <div class="cutomer-details">
                        <div class="cutomer-image">
                            <img src="{{url('frontend/images/profile.png')}}" class="img-fluid customer-img"/>
                        </div>
                        <div class="cutomer-detail">
                            <h3>Samir Bhandari</h3>
                            <h5>Developer, Extratech Nepal</h5>
                        </div>
                    </div>
                </div>
                <div class="customer-review-card">
                    <div class="customer-card-review">
                        <img src="{{url('frontend/icons/quoteicon.svg')}}"/>
                        <p>Support, care, and patience, these are the experiences that stand out our the most. I am very satisfied with my services at DICE and am grateful for their wonderful company.</p>
                        <img src="{{url('frontend/images/starts.png')}}"/>
                    </div>
                    <div class="cutomer-details">
                        <div class="cutomer-image">
                            <img src="{{url('frontend/images/profile.png')}}" class="img-fluid customer-img"/>
                        </div>
                        <div class="cutomer-detail">
                            <h3>Saroj  Dhakal</h3>
                            <h5>Manager, Esewa</h5>
                        </div>
                    </div>
                </div>
                <div class="customer-review-card">
                    <div class="customer-card-review">
                        <img src="{{url('frontend/icons/quoteicon.svg')}}"/>
                        <p>I loved the service that I received at DICE. It was wonderful, caring member always helped me to accomplish my daily task. I highly recommend them!!</p>
                        <img src="{{url('frontend/images/starts.png')}}"/>
                    </div>
                    <div class="cutomer-details">
                        <div class="cutomer-image">
                            <img src="{{url('frontend/images/profile.png')}}" class="img-fluid customer-img"/>
                        </div>
                        <div class="cutomer-detail">
                            <h3>Saroj  Dhakal</h3>
                            <h5>Manager, Esewa</h5>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- customer section -->
    <!-- acknowledgement section -->
    <section class="acknowledgement-section">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{url('frontend/images/flag.png')}}" class="img-fluid"/>
            </div>
            <div class="col-md-12">
                <div class="acknowledgement-desc">
                    <h1>Acknowledgement of Country</h1>
                    <p>DICE recognise the rich Indigenous heritage of this country and acknowledge the Wurundjeri Willum Clan and the Gunung-Willam-Balluk people as the traditional owners of the land. We pay our respects to the people, the cultures and the elders past, present and emerging.We pay our respects to the people, the cultures and the elders past, present and emerging.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- acknowledgement section -->
    <!-- subscription section -->
    <section class="subscription-section">
        <div class="row">
            <div class="col-md-7">
                <img src="{{url('frontend/images/subscription-image.png')}}" class="img-fluid"/>
            </div>
            <div class="col-md-5">
                <div class="subscription-desc">
                    <h1>Join DICE Family</h1>
                    <p>We're committed to your privacy. DICE uses the information you provide to us to contact you about our relevant content, products, and services.</p>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="dice-from" id="fname" placeholder="FullName">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="dice-from" id="email" placeholder="Email address">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="subscribe-btn">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- acknowledgement section -->
@endsection
@section('script')
    <script>
        var $slider = $('.customer-review');
        $slider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            centerMode: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection

