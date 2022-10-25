@extends('layout.app')
@section('title')
    <title>Service Detail</title>
@endsection
@section('content')
    <section class="service-slider-section">
        <div class="row">
            <div class="col-md-6">
                <div class="service-detail-banner">
                    <h3>Strengthen Your Abilities Through Short & Long Term Support</h3>
                    <h4>Daily Tasks/Shared Living</h4>
                    <p>A picture speaks a thousand words. Here are some wonderful interactions and beautiful moments we shared with the NDIS participants who selected us as their service providers.</p>      
                </div>
            </div>
            <div class="col-md-6">
                <div class="service-detail-img">
                    <img src="{{url('frontend/images/service-slider-section.png')}}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="service-first-content-section">
        <div class="row">
            <div class="col-md-6">
                    <div class="service-first-img">
                        <img src="{{url('frontend/images/independent-living.png')}}" alt="" class="w-100">
                    </div>
            </div>
            <div class="col-md-6">
                <div class="first-content-desc">
                    <h4>Coordinating Your Own Support for Independent Living</h4>
                    <h5>Individual Skill Development for Autonomy</h5>
                    <p>We at Agility HomeCare are aware that moving into a new stage of life can be difficult for anybody, but it can be especially difficult if you are differently-abled. Our experts provide excellent NDIS guidance to our participants and help them navigate through changes in life stages. A person's life is marked by a number of transitional moments, such as entering school, moving away from home, landing their first job, or retiring from the workforce. A prepared strategy that considers individual capabilities, needs, and objectives can help you at each of these periods of life. We can guide you through life's transitions and on to accomplishing your objectives with the right preparation and networking. Our Life Stage Transition program offers both short-term and long-term assistance with an emphasis on helping you live at home, participate in the community, and organize your own support. Additionally, we also aid in strengthening your communication confidence, interpersonal skills, and interviewing abilities, including everything from assisting with your transportation to work to keeping in contact with your employer and coworkers.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="service-second-content-section">
        <div class="row">
            <div class="col-md-6">
                <div class="second-content-desc">
                    <h4>Coordinating Your Own Support for Independent Living</h4>
                    <h5>Individual Skill Development for Autonomy</h5>
                    <ul>
                        <li>Encouraging cooperation and connection</li>
                        <li>Building capacity abilities</li>
                        <li>Acquiring independent living and self-care skills</li>
                        <li>Conflict and crisis management</li>
                        <li>Creating a network of allies in the participant's shared space.</li>
                        <li>Linking assistance to other helpful community services and initiatives</li>
                        <li>Help with housing and tenancy processes</li>
                        <li>Budgeting and planning each day</li>
                        <li>Peer mentoring and assistance</li>
                        <li>Individual development of skills</li>
                        <li>Assistance with planning and decision-making</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="service-second-img">
                        <img src="{{url('frontend/images/independent-living-two.png')}}" alt="" class="w-100">
                    </div>
            </div>
        </div>
    </section>
    <section class="support-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 support-desc mb-4">
                    <h1>How We Support Your Life Transition Needs</h1>
                    <p>As part of the NDIS's assistance with life stage transition, we encourage participants to move to new places and facilitate a smooth transition by providing them with housing, social connections, financial resources, and leisure activities that will make them feel comfortable.</p>
                </div>
            </div>
            <div class="row gx-4">
                <div class="col-lg-3 col-md-6">
                    <div class="support-services">
                        <div class="support-service-card">
                            <div class="support-service-icon mb-4">
                                <img src="{{url('')}}" class="img-fluid" alt="">
                            </div>
                            <div>
                                <h1>Household Activities</h1>
                                <p>Assistance with dometic chores and daily activities of living.</p>
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
                </div>
            </div>
        </div>
</section>
@endsection