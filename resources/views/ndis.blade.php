@extends('layout.app')
@section('title')
    <title>NDIS</title>
    <meta name="description" content="DICE is an accredited NDIS providers of disability support, offering outstanding, dependable, and customized NDIS care assistance for all our valued clients."/>
    <meta name="og:title" content="NDIS"/>
@endsection
@section('content')
    <section class="ndis-top-section">
        <h2>National Disability Insurance Scheme (NDIS) – Everything You Need to Know</h2>
        <p>DICE is an accredited NDIS providers of disability support, offering outstanding, dependable, and customized NDIS care assistance for all our valued clients.</p>
    </section>
    <section class="ndis-scheme-section"> 
        <div class="row">
            <div class="col-md-6">
                <div class="ndis-scheme-img">
                    <img src="{{url('frontend/images/ndis-logo.png')}}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-6">
                <div class="ndis-scheme-content">
                    <h4>What is the NDIS?</h4>
                    <p>Depending on their particular needs, the NDIS offers funding to qualified individuals. NDIS financing has the potential to alter the game for Australians who live with a disability by enabling access to programs that will help them build their skills and lead richer, more independent lives. 4.4 million Australians, or one in six of us, have a disability, according to figures from the federal government. Living with a disability can be costly in addition to the difficulties it might provide on a daily basis. The National Disability Insurance Scheme (NDIS) can be quite helpful in this situation.
                        <br><br>
                        The National Disability Insurance Scheme is a nationwide program that gives funding directly to people with disabilities. Created to assist individuals with disabilities in obtaining the assistance they need to develop their skills; NDIS aims to increase their independence over time. Each NDIS member has a personal plan that details their objectives and the financial support they have acquired. Participants in the NDIS spend their funds on services and supports that will aid them in achieving their objectives. Everyone has varied objectives, like obtaining and maintaining a job, establishing friends, or taking part in a nearby community engagement, and the NDIS helps them achieve these. Participants in the NDIS also have control over the help they get, when they receive it, and from whom.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-run-section"> 
        <div class="row">
            <div class="col-md-6">
                <div class="ndis-scheme-content">
                    <h4>How does the NDIS Operate?</h4>
                    <p>Based on an individual situation, the NDIS can assist with financial assistance for functions such as daily personal care, transportation and mobility (such as wheelchairs), access to employment and school, housework, home and vehicle adaptations, and therapy support. Wheelchairs, speech pathology visits, and services for delivering nutritious meals are just a few examples of the things that the NDIS may pay for. The NDIS plan may finance one of three categories of NDIS "support budgets". First is the "core supports" budget that covers consumables (regular things like continence aids), inexpensive mobility aids like walking sticks, assistance with daily tasks like housecleaning and yard work, social and community involvement, and transportation. 
                        <br><br>
                        Second is the "capacity building" budget that covers assisting participants reach their goals in areas like employment, health, education, relationships, and living arrangements. Finally, third is the "capital support" budget that is used to pay for home improvements like installing a hand rail in the bathroom or a ramp into the house, as well as for assistive technologies like wheelchairs or vehicle adaptations.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ndis-run-img">
                    <img src="{{url('frontend/images/thinking.png')}}" alt="" class="w-100">
                </div>
            </div>
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
                        The NDIS website states that there is no predetermined amount of cash you will get from the program. Participants instead create an NDIS plan based on their unique requirements and circumstances, in which they can ask for funding for "fair" and "essential" assistance and services. A member of the NDIA will then examine and approve this.</p>
                </div>
            </div>
        </div>
    </section>
@endsection