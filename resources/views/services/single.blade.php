@extends('layout.app')
@section('title')
    <title>{{$service->seo_title}}</title>
    <meta name="description" content="{!!strip_tags($service->short_description)!!}"/>
    <meta name="og:title" content="{{$service->seo_title}}"/>
    <meta name="og:image" content="{{url($service->service_sections->first()->image ?? '')}}"/>
@endsection
@section('content')
@php $first_service = $service->service_sections()->where('status','1')->orderby('order_by','asc')->get(); @endphp
    @if($first_service->count() > 0)
        {{-- <section class="service-slider-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="service-detail-banner">
                    <h3>{{$first_service->first()->title }}</h4>
                    <h4>{{$service->name}}</h2>
                    <p>{{$first_service->first()->description}}</p>
                        <!-- <h3>Strengthen Your Abilities Through Short & Long Term Support</h3>
                        <h4>Daily Tasks/Shared Living</h4>
                        <p>A picture speaks a thousand words. Here are some wonderful interactions and beautiful moments we shared with the NDIS participants who selected us as their service providers.</p>       -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-detail-img">
                        <img src="{{url($first_service->first()->image ?? 'frontend/images/service-slider-section.png')}}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </section> --}}
        @if($first_service->count() > 0)
            @php $second_service = $first_service[0];@endphp
            <section class="service-first-content-section">
                <div class="row">
                    <div class="col-md-6">
                            <div class="service-first-img">
                                <img src="{{url($second_service->image ?? 'frontend/images/independent-living.png')}}" alt="" class="w-100">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="first-content-desc">
                            <h2>{{$second_service->title}}</h2>
                            <h5>{{$second_service->sub_title}}</h5>
                            <p>{!!strip_tags($second_service->description)!!}</p>
                            <p>{!!strip_tags($second_service->sub_description)!!}</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if($first_service->count() > 1)
        @php $third_service = $first_service[1];@endphp
            <section class="service-second-content-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="second-content-desc">
                            <h2>{{$third_service->title}}</h2>
                            <h5>{{$third_service->sub_title}}</h5>
                            
                            @if($third_service->description != '')
                                <p>{!!strip_tags($third_service->description)!!}</p>
                            @endif
                            <ul>
                            @foreach($third_service->service_section_point as $point)
                              <li>{{$point->point}} </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="service-second-img">
                                <img src="{{url($third_service->image ?? 'frontend/images/independent-living.png')}}" alt="" class="w-100">
                            </div>
                    </div>
                </div>
            </section>
        @endif
        @if($first_service->count() > 2)
        @php $fourth_service = $first_service[2];@endphp
        <section class="support-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 support-desc mb-4">
                        <h1>{{$fourth_service->title}}</h1>
                        <p>{!!strip_tags($fourth_service->description)!!}</p>
                    </div>
                </div>
                <div class="row g-4">
                @foreach($fourth_service->service_section_point as $last_point)
                    <div class="col-lg-3 col-md-6">
                        <div class="support-services">
                            <div class="support-service-card">
                                <div class="support-service-icon mb-4">
                                    <img src="{{url($last_point->icon ?? '')}}" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h1>{{$last_point->point}}</h1>
                                    <p>{!!strip_tags($last_point->point_description)!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
               @endforeach
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="support-services">
                            <div class="support-service-card">
                                <div class="support-service-icon mb-4">
                                    <img src="{{url('')}}" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h1>Maintain Health & Wellbeing</h1>
                                    <p>Assistance with hygiene and maintaining security, welfare, protection and good health.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="support-services">
                            <div class="support-service-card">
                                <div class="support-service-icon mb-4">
                                    <img src="{{url('')}}" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h1>Relationship with Peers & Family</h1>
                                    <p>Assistance with good communication with family and friends for an active social life.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="support-services">
                            <div class="support-service-card">
                                <div class="support-service-icon mb-4">
                                    <img src="{{url('')}}" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <h1>Medication Assistance</h1>
                                    <p>Help with maintaining medication for health and well-being support.</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        @if(($ndis_pricing) !== null && $service->slug === "plan-management")
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

        <section class="service-second-content-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="service-second-img">
                        <img src="{{url($third_service->image ?? 'frontend/images/independent-living.png')}}" alt="" class="w-100">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="third-content-desc">
                        <h2>{{$third_service->title}}</h2>
                        <!-- <h5>{{$third_service->sub_title}}</h5> -->
                        
                        @if($third_service->description != '')
                            <p>{!!strip_tags($third_service->description)!!}</p>
                        @endif

                        <div class="point-desc-block">
                            <h6>Coffee</h6>
                            <p>freshly-made exceptional coffee with wide variety of regular dishes and daily specials menu</p>
                        </div>

                        <div class="point-desc-block">
                            <h6>Breakfast</h6>
                            <p>Stop in for yoghurt & chia cups, fruit salad, egg & bacon rolls and croissants.</p>
                        </div>

                        <div class="point-desc-block">
                            <h6>Sandwiches, Rolls and Wraps</h6>
                            <p>Choose ready-made assorted sandwich packs to go or ‘build your own’ from extensive sandwich bar options.</p>
                        </div>

                        <div class="point-desc-block">
                            <h6>Pastries, Cakes, Slices, and Biscuits</h6>
                            <p>Freshly baked in-house to satisfy your sweet tooth.</p>
                        </div>

                        

                        <!-- <ul>
                        @foreach($third_service->service_section_point as $point)
                            <li>{{$point->point}} </li>
                        @endforeach
                        </ul> -->
                    </div>
                </div>
                
            </div>
        </section>

        @endif
    @else
        <p>Content Needs to be added</p>
    @endif 

@endsection