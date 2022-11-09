@extends('layout.app')
@section('title')
    <title>About us</title>
    <meta name="description" content="At DICE, we work hard to create a comprehensive program that is tailored to your unique needs and requirements. We recognize that results alone are not nearly as essential as pleasant outcomes. Our ultimate goal thus, is for our participants to experience success; this is our passion. We don't just have one program that works for everyone; instead, we will take the time to get to know you and your family's requirements."/>
    <meta name="og:title" content="DICE"/>
    <meta name="og:image" content="{{url('frontend/images/about-image.png')}}"/>
@endsection
@section('content')
    <section class="about-page-section">
        <div class="row">
            <div class="col-md-5">
                <div class="about-page-image">
                    <img src="{{url('frontend/images/who-img.png')}}" alt="" class="w-100"/>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-page-desc">
                    <h5>ABOUT</h5>
                    <h2>Who We Are</h2>
                    <p>At DICE, we understand that acquiring specialized disability support in your daily routine is helpful if you or a loved one is dealing with impairments or limitations of any kind. Thus, the NDIS Care Coordination staff at DICE always reach towards assisting your health and well in the best possible way, and giving you access to opportunities so that you may engage in jobs, schoolings, recreations, and other pursuits that you wish to be a cornerstone in. Working with differently-abled clients and their support system is a key component of what we do. Our devoted staff is here to serve you and give you access to all the disability support resources you need under one roof so you can do the things you love. We can demonstrate how to get the most of your plan's investment while connecting you to the best local resources. With us, you get personalized service from a knowledgeable and pleasant team. 
                        <br><br>
                        Furthermore, our skilled, bilingual team members are enthusiastic about the clients we assist as well as the services and initiatives we offer. DICE’s team has a wealth of knowledge in providing health and disability services in a variety of settings. We follow a person-centred paradigm where decisions are made with you in mind. We can support your efforts to develop new abilities, explore new places, meet new people, and—most importantly—do the activities you like. At DICE, we think that you should select the treatment that best fits your unique needs and approach to life. 
                        <br><br>
                        We aim to increase your freedom of choice, autonomy, and prosperity. Not only that, but we also assist you in achieving your objectives as a licensed NDIS disability services provider. Our team is led by knowledgeable employees with years of experience dealing with clients with disabilities from a wide range of cultures and circumstances. Additionally, our top management staff is also adorned with business degrees and a wealth of management and governance expertise. With this combination of abilities, we have created a dependable and efficient solution to help you achieve your goals. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="team-support-section">
        <div class="row">
            <div class="col-md-7">
                <div class="team-support-desc">
                    <h2>Exceptional Service and Caring Team </h2>
                    <p>DICE takes great effort to pair you up with employees that are a good fit for you and your requirements. We collaborate with people of all skill levels, and have the tools necessary to cater to a range of demands. Through a variety of services, we aim to provide the best support under a number of NDIS support lines as a NDIS Registered Disability Services Provider. As aforementioned, with a participant-centred approach, our team makes sure that the participant always has a say in the services they get and how their plan is implemented.
                        <br><br>
                        Moreover, we function under a holistic health paradigm, with our in-house team of medical experts consisting of nurses, physiotherapists, occupational therapists, and more, collaborating to guarantee that you receive the highest calibre of treatment. Not only that, but DICE’s experts thrive to bridge the gap between the hospital and the patient's home by fusing therapy with realistic daily life situations over a long period of time and through various phases of recovery.  We completely understand that our responsibility as an established NDIS service provider is to help you. By ensuring that the appropriate disability services are offered, we achieve this target. Your ability to live confidently in your community will be strengthened with our assistance. 
                    </p>
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
            <h2>Our Values, Mission & Goals</h2>
            <p>Our core mission and declaration of values revolves around personalized care, provided through knowledgeable staff who views you as a special individual with priceless talents. We consult you as we plan and take pride in offering high-quality customer service, working to help you realize your long-term objectives, and helping you decide on your own paths to success. </p>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/about-icons/Peronsal-care.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Personalized Care</h3>
                        <p>We respect and listen, serving tailored services within our work team and toward the clients.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/about-icons/Sincerity.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Sincerity</h3>
                        <p>We value honesty and integrity, always acting in a sincere and transparent manner and upholding morality.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/about-icons/Appreciate.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Appreciation</h3>
                        <p>We convey appreciation towards others in every engagement, whether it is with one another, the clients we serve, our stakeholders, or the larger community.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/about-icons/Resoponsibility.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Responsibility</h3>
                        <p>To aim to enable our clients to live the lifestyle of their choice, & function with utmost care.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/about-icons/Commitment.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Commitment</h3>
                        <p>We fulfil our commitments and strive to bring about good improvements in the lives of our clients.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-value-card">
                    <div class="about-value-image">
                        <img src="{{url('frontend/images/about-icons/Passion.png')}}" alt="" class="img-fluid">
                    </div>
                    <div class="about-value-card-content">
                        <h3>Passion</h3>
                        <p>Our team is made up of diligent individuals passionate about helping people.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-regirtered">
        <div class="registered-header text-center">
            <h2>Registered NDIS Provider</h2>
            <p>We are a recognized NDIS Service Provider, assisting you or a loved one in requesting and acquiring optimum services for new or ongoing plans. Our wide team of therapists and mental health experts have many years of expertise working with children and adults, people with disabilities, and the NDIS. To support you in achieving your objectives, our clinical teams collaborate and provide personalized services based on your individual needs. Based on your customized plans, we can assist you with various services, whether it be in your home or at one of our clinics. As a registered NDIS Provider, we have undergone audits as part of the registration process to ensure that we adhere to high standards for compliance, quality, and safety imposed by the NDIS safeguard commission.</p>
        </div>
    </section>
@endsection