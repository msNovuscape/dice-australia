@extends('layout.app')
@section('title')
    <title>NDIS</title>
    <meta name="description" content="DICE is an accredited NDIS providers of disability support, offering outstanding, dependable, and customized NDIS care assistance for all our valued clients."/>
    <meta name="og:title" content="NDIS"/>
@endsection
@section('content')
    <section class="ndis-top-section">
        {{-- <h2>National Disability Insurance Scheme (NDIS) – Everything You Need to Know</h2>
        <p>DICE is an accredited NDIS providers of disability support, offering outstanding, dependable, and customized NDIS care assistance for all our valued clients.</p> --}}

        <h2>Get NDIS with Confidence in 7 simple steps.</h2>
        <p>Follow these easy steps to take control of your NDIS experience.</p>
    </section>
    <section class="ndis-scheme-section"> 
        <div class="row">
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 1: Prepare yourself</h4>
                    <p>Find out how the NDIS works and what is expected of you.</p>
                    <ul>
                        <li>Check your eligibility first and apply directly on the NDIS website.</li>
                        <li>Complete our NDIS preparation checklist to help you think about your life goals in preparation for your first planning meeting.</li>
                        <li>To arrange a planning meeting, get in touch with your local area coordinator (LAC) (in person if possible).</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ndis-scheme-img">
                    <img src="{{url('frontend/images/ndis/1-min.png')}}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-run-section"> 
        <div class="row">
            <div class="col-md-5">
                <div class="ndis-run-img">
                    <img src="{{url('frontend/images/ndis/2-min.png')}}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 2: Meeting with your NDIS planning team</h4>
                    <p>Prepare for your planning meeting to ensure that the NDIS plan you get meets your goals and needs.</p>
                    <ul>
                        <li>Make sure to bring your checklist and supporting documents.</li>
                        <li>Ask a friend or family member to accompany you. Having someone else, there may help you remember something that you forgot or missed.</li>
                        <li>Make notes to reflect on the conversation from your meeting.</li>
                        <li>Clearly state your needs and goals, so your LAC knows what you want in your plan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-scheme-section"> 
        <div class="row">
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 3: Know your plan.</h4>
                    <p>When you receive your draft NDIS plan, you'll need to check the details and ensure the funds have been allocated correctly.</p>
                    <ul>
                        <li>Request for a review if it doesn’t meet your goals.</li>
                        <li>Inform your service providers after receiving your plan.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ndis-scheme-img">
                    <img src="{{url('frontend/images/ndis/3-min.png')}}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-run-section"> 
        <div class="row">
            <div class="col-md-5">
                <div class="ndis-run-img">
                    <img src="{{url('frontend/images/ndis/4-min.png')}}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 4: Manage your NDIS funds</h4>
                    <p>Throughout the period of your plan, it is your responsibility to monitor your spending and ensure that service providers are paid on time.</p>
                    <ul>
                        <li>With your plan manager, set up a service agreement that outlines the services you'll get and how they'll be provided.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-scheme-section"> 
        <div class="row">
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 5: Arrange your supports</h4>
                    <p>Choosing service providers match your needs, and the people you communicate with will motivate you to achieve your goals.</p>
                    <ul>
                        <li>If your plan includes support coordination, it’s time to pick your support coordinator.</li>
                        <li>With your service provider, set up a service agreement and confirm their costs and the support they’ll be providing.</li>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ndis-scheme-img">
                    <img src="{{url('frontend/images/ndis/5-min.png')}}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-run-section"> 
        <div class="row">
            <div class="col-md-5">
                <div class="ndis-run-img">
                    <img src="{{url('frontend/images/ndis/6-min.png')}}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 6: Monitor your plan</h4>
                    <p>Planning and arranging your support are now completed, it's time to receive your support and begin using all the advantages they bring to your life.</p>
                    <ul>
                        <li>Make sure to keep correct invoices and records of the support you received.</li>
                        <li>Keep track of your budget and spending to avoid underspending or overspending.</li>
                </div>
            </div>
        </div>
    </section>

    <section class="ndis-scheme-section"> 
        <div class="row">
            <div class="col-md-7">
                <div class="ndis-scheme-content">
                    <h4>Step 7: Annual plan review</h4>
                    <p>Your yearly plan review is an opportunity to determine whether your supports are still appropriate for you because needs and goals change over time.
                        <br>
                        We advise you to:</p>
                    <ul>
                        <li>Get ready beforehand. List the things you want to improve.</li>
                        <li>Clearly state your desired changes so that your LAC knows your intended outcomes for your new plan.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ndis-scheme-img">
                    <img src="{{url('frontend/images/ndis/7-min.png')}}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-booklets-section">
        <div class="text-center">
            <h4>NDIS booklets and factsheets</h4>
            <p>Guidance, tips and advice to help you begin your NDIS journey with confidence.</p>
            <a href="https://www.ndis.gov.au/about-us/publications/booklets-and-factsheets" target="_blank" rel="noreferrer" class="start-here">Start Here</a>
        </div>
    </section>
    <section class="ndis-finance-section">
        <div class="row">
            <div class="col-md-5">
                <div class="ndis-finance-img">
                    <img src="{{url('frontend/images/finance.png')}}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-7">
                <div class="ndis-finance-content">
                    <h4>Who can Access the NDIS?</h4>
                    <p>Australian citizens, permanent residents, and those with special category visas who reside in Australia, are aged seven to 65, have a disability brought on by a chronic condition are eligible for the NDIS. According to the NDIS eligibility requirements, you must either require supports to either minimize your future demands or enable your family to improve your abilities. You are eligible for the NDIS if you need assistance or support to carry out everyday tasks that require disability-specific assistance from another person or specialized equipment.
                        <br><br>
                        The NDIS website states that there is no predetermined amount of cash you will get from the program. Participants instead create an NDIS plan based on their unique requirements and circumstances, in which they can ask for funding for "fair" and "essential" assistance and services. A member of the NDIA will then examine and approve this.
                        <br>
                        <a href="https://www.ndis.gov.au/applying-access-ndis/am-i-eligible" target="_blank" rel="noreferrer" style="color: #e54e2e">Am I eligible?</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection