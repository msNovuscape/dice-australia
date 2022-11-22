@extends('layout.app')
@section('title')
    <title>DICE</title>
    <meta name="description" content="At DICE, we work hard to create a comprehensive program that is tailored to your unique needs and requirements. We recognize that results alone are not nearly as essential as pleasant outcomes. Our ultimate goal thus, is for our participants to experience success; this is our passion. We don't just have one program that works for everyone; instead, we will take the time to get to know you and your family's requirements."/>
    <meta name="og:title" content="DICE"/>
    <meta name="og:image" content="{{url($sliders->first()->image)}}"/>
@endsection
@section('content')
    <!-- Slider -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            @foreach($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}" aria-current="{{$loop->first ? 'true' : ''}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <img src="{{url($slider->image ?? 'frontend/images/banner-two.png')}}" class="d-block w-100" alt="...">
                <div class="slider-content">
                    <h3>{{$slider->title1}}</h3>
                    <h2>{{$slider->title2}}</h2>
                    <p>{!!strip_tags($slider->description)!!}</p>
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
                    <p>We are registered NDIS Service provider for people with disability.</p>
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
                    <p>The NDIS offers financial assistance to eligible individuals with disabilities so they can spend more time with their loved ones, be more independent, have access to volunteering opportunities in their community and new skills, all of which improves their quality of life. We are a recognized NDIS Service Provider, assisting you or a loved one in requesting and acquiring optimum services for new or ongoing plans.</p>
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
                @php
                $class = '' ;
                @endphp
                    @if($loop->iteration == 2 || $loop->iteration == 4 || $loop->iteration == 6 || $loop->iteration == 8 )
                        @php $class = '-second'; @endphp
                    @endif
                    @if($loop->iteration == 3 || $loop->iteration == 9)
                    @php $class = '-third'; @endphp
                    @endif
                    @if($loop->iteration == 5)
                    @php $class = '-fixth'; @endphp
                @endif
                <a href="/service/{{$service->slug}}" class="service-card{{$class}}">
                    <div>
                        <div class="service-head mb-4">
                            <div class="service-icon">
                                <img src="{{url($service->icon ?? 'frontend/icons/support-coordination.svg')}}" alt="" class="w-100">
                            </div>
                            <h1>{{$service->name}}</h1>
                        </div>
                        <div class="service-card-desc">
                            <p>{!!strip_tags($service->short_description)!!}</p>
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
                    <div class="point-block">
                        <h4>In order to support your wellness, DICE focuses on:</h4>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <ul>
                                    <li><i class="fa-solid fa-circle-check"></i>Encouragement</li>
                                    <li><i class="fa-solid fa-circle-check"></i>Capability Enhancement</li>
                                    <li><i class="fa-solid fa-circle-check"></i>Cooperation</li>
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <ul>
                                    <li><i class="fa-solid fa-circle-check"></i>Inclusiveness</li>
                                    <li><i class="fa-solid fa-circle-check"></i>Diversity</li>
                                    <li><i class="fa-solid fa-circle-check"></i>Personalized Services</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/about')}}">View More</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="about-image">
                    <!-- <img src="{{url($about_us->first()->image ?? '')}}" class="w-100" alt="about-image"/> -->
                    <img src="{{url($about_us1->image ?? 'images/about_us1/About-image.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- about section -->
    <!-- pricing section -->
    @if(($ndis_pricing) !== null)
    <section class="pricing-section">
        <div class="row">
            <div class="col-md-5">
                <div class="pricing-image">
                    <img src="{{url($ndis_pricing->image)}}" alt="" class="img-fluid"/>
                </div>
            </div>
            <div class="col-md-7">
                <div class="pricing-detail">
                    <h2>{{$ndis_pricing->title}}</h2>
                    <h5>{{$ndis_pricing->sub_title}}</h5>
                    <p>{!!strip_tags($ndis_pricing->description)!!}
                    <br><br> {!!strip_tags($ndis_pricing->sub_description)!!}</p>
                    <a target = "_blank" href="{{$ndis_pricing->link}}">{{$ndis_pricing->button}}</a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- pricing section -->
    <!-- customer section -->
    <!-- <section class="customer-section">
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
                
            </div>
        </div>
    </section> -->
    <!-- customer section -->
    
    <!-- subscription section -->
    <section class="subscription-section">
        <div class="row">
            <div class="col-md-7">
                <img src="{{url('frontend/images/Laptop.svg')}}" class="img-fluid"/>
            </div>
            <div class="col-md-5">
                <div class="subscription-desc">
                    <h1>Join DICE Family</h1>
                    <p>We're committed to your privacy. DICE uses the information you provide to us to contact you about our relevant content, products, and services.</p>
                    <form id="subs_form">
                        <div class="">
                            <input type="text" class="dice-from" id="subs-fname" name="" placeholder="FullName" onkeyup="subsFname()">
                            <span id="subs-fname-error" class="error-msg"></span>
                        </div>
                        <div class="">
                            <input type="email" class="dice-from" id="subs-email" name="" placeholder="Email address" onkeyup="subsEmail()">
                            <span id="subs-email-error" class="error-msg"></span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="subscribe-btn">Subscribe</button>
                            <div class="modal fade" id="subsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content footer-content">
                                        <div class="modal-header submit-header-modal">
                                            <img src="{{url('frontend/icons/success.svg')}}"/>
                                        </div>
                                        <div class="modal-body" style="background: #FFFFFF">
                                            <h2 style="color: #3A3A3A; font-weight: 700; font-size: 24px; line-height: 2rem">Success!</h2>
                                            <p id = "success"></p>
                                        </div>
                                        <div class="modal-footer submit-footer-modal">
                                            <a type="button" class="submit-close-btn" href="/">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- acknowledgement section -->

    <!-- acknowledgement section -->
    <section class="acknowledgement-section">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="img-block">
                    <img src="{{url('frontend/images/flag.png')}}" class="img-fluid"/ alt="">
                </div>
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


        var subsfnamError = document.getElementById('subs-fname-error');
        var subsEmailError = document.getElementById('subs-email-error');

        function subsFname() {
            if (document.getElementById('subs-fname').value.length == 0) {
                $('#subs-fname').focus();
                subsfnamError.innerHTML = 'Please enter your Full Name !!';
                return false;
            } else {
                subsfnamError.innerHTML = '';
                return true;
            }
        }
        function subsEmail() {
            if (document.getElementById('subs-email').value.length == 0) {
                $('#subs-email').focus();
                subsEmailError.innerHTML = 'Please enter your email !!';
                return false;
            } else {
                subsEmailError.innerHTML = '';
                return true;
            }
        }

        $('#subs_form').on('submit', function (e) {
            e.preventDefault();
            if (!subsFname() || !subsEmail()) {
                return false;
            } else {
                var email = document.getElementById('subs-email');
                var name = document.getElementById('subs-fname');

            $.ajax({

            url: "/subscribe",
            type:"POST",
            data:{
              email:email.value,
              name:name.value
            },

            success:function(response){

                if (response) {

                    // alert(response.success);
                //   $('#success-message').text(response.success);
                    $('#success').text(response.success);  
                    $('#subsModal').modal('show');

                  email.value = '';
                  name.value = '';
              //   $("#contactForm")[0].reset();
              }
            },
            error: function(response) {

            }

            });
            }
        });
    </script>

@endsection

