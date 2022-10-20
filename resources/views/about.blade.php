@extends('layout.app')
@section('title')
    <title>About us</title>
    <meta name="description" content="Based in VIC, Australia, Agility HomeCare is a practitioner of disability assistance services. We provide a variety of disability assistance services with the aim to improve the lives of people with impairments, limitations, and disabilities."/>
    <meta name="og:title" content="DICE"/>
    <meta name="og:image" content="{{url('frontend/images/about-image.png')}}"/>
@endsection
@section('content')
    <section class="about-page-section">
        <div class="row">
            <div class="col-md-5">
                <div class="about-page-image">
                    <img src="{{url('frontend/images/about-page-image.png')}}" alt="" class="w-100"/>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-page-desc">
                    <h5>ABOUT</h5>
                    <h2>Who We Are</h2>
                    <p>Based in VIC, Australia, Agility HomeCare is a practitioner of disability assistance services. We provide a variety of disability assistance services with the aim to improve the lives of people with impairments, limitations, and disabilities. By taking part in their local communities, we hope to make each participant's life simpler, fairer, and more engaging. Founded as a company with the express purpose of providing disability services, Agility HomeCare priorities participant and helping them open new doors, encouraging independence, and advancing in a secure and discrimination-free setting.
                        <br><br>
                        Our primary goal is providing high-quality, adaptable disability services, such as social support, respite care, housing modifications, and employment assistance. Developing into the go-to supplier of disability services, we provide both adults and children specialized care in a safe atmosphere. The complete spectrum of NDIS services offered by Agility HomeCare includes supported independent living communities, short-term housing (respite), in-home assistance, community involvement, tailored skill development based on personal goals, and supported employment, among many more.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="team-support-section">
        <div class="row">
            <div class="col-md-7">
                <div class="team-support-desc">
                    <h2>Exceptional Team and Support Workers</h2>
                    <p>Our leadership team continuously focuses on connecting the organization's mission and values with participant, children, and youth outcomes, promoting their right to live their lives as they see fit. To realize the vision of Agility HomeCare, each member of our leadership team contributes their unique experiences, traits, and talents to allow service delivery to be guided by client-focused outcomes backed by a culture of digital innovation, data and insights, and empowered decision making.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="about-team-image">
                    <img src="{{url('frontend/images/about-team-image.png')}}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="our-value-section">
        <div class="our-value-header text-center">
            <h2>Our Value Proclamation and Mission</h2>
            <p>Our employees, participants, and participants' families or guardians are the focal points of our ideals. Our core mission is to offer effective and high-quality disability services where each client is valued. We function with the focal principle of autonomy and right to own decision-making for each of our clients.</p>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/profile.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Respect</h3>
                        <p>We value the choices, viewpoints, and ideas of others.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/profile.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Honesty</h3>
                        <p>In order to uphold our promise to you, we be dependable and speak the truth.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/profile.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Privacy and Discretion</h3>
                        <p>We value the choices, viewpoints, and ideas of others.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/profile.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Growth and Improvement</h3>
                        <p>We determine areas where we can create initiatives, striving to enhance our offerings and uphold the Service Standards.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/profile.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Secure & Harmonious Environment</h3>
                        <p>We give employees and participants with a work environment that offers support, direction, and acceptance.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/profile.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Compassionate Work Ethics</h3>
                        <p>Each employee is dedicated to their profession and views the participant as a member of the family.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-regirtered">
        <div class="registered-header text-center">
            <h2>Registered NDIS Provider</h2>
            <p>Agility HomeCare is a Registered NDIS Provider, assisting you in your daily life. Our services can be tailored to your unique needs in accordance with your NDIS plan. Our comprehensive team of professionals comprise care coordinators who work closely with you to maximize the benefits of your NDIS plan. The NDIS offers qualified participants an individualized plan and funds for the services they will need to reasonably pursue their objectives. Participants who have an NDIS plan have control over the help they get and the people who give it to them, giving them the freedom to live however they like. Agility HomeCare provides you as much or as little assistance as you require when navigating the NDIS.</p>
        </div>
    </section>
@endsection