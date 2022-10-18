@extends('layout.app')
@section('title')
    <title>DICE</title>
    <meta name="description" content="Welcome to Baneshwor Smile Family Dental Care(BSFDC), a leading visionary dental care center, committed to expert oral health care and treatment. With a team of specialists, we aspire to provide outstanding dental services that are easily accessible to our clients and patients."/>
    <meta name="og:title" content="BANESHWOR SMILES"/>
    <meta name="og:image" content="{{url('frontend/images/about-image.png')}}"/>
@endsection
@section('content')
    <!-- Slider -->
    
    <!-- NDIS section -->
    <section class="ndis-section">
        <div class="row">
            <div class="col-md-5">
                <div>
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
                    <h2>The National Disability Insurance Scheme (NDIS)</h2>
                    <p>The NDIS can provide all people with disability with information and connections to services in their communities such as doctors, sporting clubs, support groups, libraries and schools, as well as information about what support is provided by each state and territory government.</p>
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
                    <h1>Services Dedicated to You</h1>
                    <p>Our innovative support services enable and celebrate the achievements of theamazing people we work with.</p>
                </div>
            </div>
            <div class="services mt-4">
            <a href="/service/" class="service-card">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/support-coordination.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Support Coordination</h1>
                            <p>Our daily tasks and shared living support aims to enable ourclients to live independently & carry out their everyday tasks intheir homes and communities</p>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}"/></button>
                </a>
                <a href="/service/" class="service-card-second">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/daily-living-support.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Daily Living Support</h1>
                            <p>Our daily tasks and shared living support aims to enable ourclients to live independently & carry out their everyday tasks intheir homes and communities</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}"/></button>
                    </div>
                </a>
                <a href="/service/" class="service-card-third">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/community-partipitation.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Community Participation</h1>
                            <p>Every action we take has the participants as its focal point. We interact with clients, their families, caregivers, the disability sector, and other stakeholders for efficient community...</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}"/></button>
                    </div>
                </a>
                <a href="/service/" class="service-card-second">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/plan-management.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Plan Management</h1>
                            <p>Choosing us as your plan manager saves you hours of time and the headache of endless admin.</p>
                        </div>
                    </div>
                    <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}"/></button>
                </a>
                <a href="/service/" class="service-card-fixth">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/household-task.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Household Task</h1>
                            <p>Our qualified and professional staff at Agility HomeCare provide NDIS household tasks to aid daily lives of our clients and enable them to live more independently</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}"/></button>
                    </div>
                </a>
                <a href="/service/" class="service-card-second">
                    <div>
                        <div class="service-icon mb-4">
                            <img src="{{url('frontend/icons/respite-care.svg')}}" alt="">
                        </div>
                        <div class="service-card-desc">
                            <h1>Respite Care</h1>
                            <p>Every action we take has the participants as its focal point. We interact with clients, their families, caregivers, the disability sector, and other stakeholders for efficient community...</p>
                        </div>
                        <button class="learn-more-btn">Learn more <img src="{{url('frontend/icons/right-arrow.svg')}}"/></button>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Service section -->
    <!-- about section -->
    <section class="about-section">
        <div class="row">
            <div class="col-md-6">
                <div class="about-left">
                    <h2>Why Choose us?</h2>
                    <h5>We support people with disability of all ages and needs in their homes and community with quality services.</h5>
                    <p>DICE is a qualified NDIS disability assistance and care provider. We offer premium, dependable, and customized NDIS home care assistance for our clients, assisting them in achieving the objectives listed in their NDIS plan. These might be short-term objectives like improving daily life skills, or long-term objectives like building the physical capacity to take part in community events. Providing a range of NDIS assistance to accommodate a variety of clients, all of our services are tailored to each client's needs and delivered by certified NDIS personal care assistants and disability support professionals. We take great pride in our dependability, openness, and dedication to always providing high-quality services, and we offer a wide range of client-focused care, each tailored to precise requirements and preferences. This is the foundation of our strategy for providing support services. </p>
                    <a href="/about">View More</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-image">
                    <img src="{{url('frontend/images/about-image.png')}}" class="w-100" alt="about-image"/>
                </div>
            </div>
        </div>
    </section>
    <!-- about section -->
    <!-- pricing section -->
    <section class="pricing-section">
        <div class="row">
            <div class="col-md-6">
                <div class="pricing-image">
                    <img src="{{url('frontend/images/pricing.png')}}" class="w-100"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pricing-detail">
                    <h2>NDIS Pricing</h2>
                    <h5>NDIS pricing arrangements and price limits</h5>
                    <p>NDIS Pricing Arrangements and Price Limits (previously the NDIS Price Guide) assist participants and disability support providers to understand the way that price controls for supports and services work in the NDIS.
                        <br><br>
                    Price regulation is in place to ensure that participants receive value for money in the supports that they receive.</p>
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
                            <h3>Suman Thoker Tamang</h3>
                            <h5>Manager, Extratech Nepal</h5>
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
                            <h3>Samir Bhandari</h3>
                            <h5>Developer, Extratech Nepal</h5>
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
                </div>
            </div>
        </div>
    </section>
    <!-- customer section -->
@endsection
@section('script')

@endsection

