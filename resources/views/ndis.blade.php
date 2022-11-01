@extends('layout.app')
@section('title')
    <title>NDIS</title>
@endsection
@section('content')
    <section class="ndis-top-section">
        <h2>Information from a Registered NDIS Provider for the National Disability Insurance Scheme</h2>
        <p>Australians with disabilities may get the health and support services they need thanks to the NDIS and its providers.</p>
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
                    <h4>The National Disability Insurance Scheme: What Is It?</h4>
                    <p>Australians with disabilities can now access additional support services under the National Disability Insurance Scheme (NDIS). The NDIS gives customers a choice and control over their experience, in contrast to earlier programs that were standardized and offered few individually tailored services. You can select your NDIS provider and develop a person-centered plan for the services and assistance you require under the new system.
                        <br><br>
                        The NDIS was introduced in 2013 and will be implemented until 2020. It presently provides around $22 billion for an estimated 500,000 Australians who qualify. The new system offers choice and individualization, which improves support for those who require it.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="ndis-run-section"> 
        <div class="row">
            <div class="col-md-6">
                <div class="ndis-scheme-content">
                    <h4>The National Disability Insurance Scheme: What Is It?</h4>
                    <p>Australians with disabilities can now access additional support services under the National Disability Insurance Scheme (NDIS). The NDIS gives customers a choice and control over their experience, in contrast to earlier programs that were standardized and offered few individually tailored services. You can select your NDIS provider and develop a person-centered plan for the services and assistance you require under the new system.
                        <br><br>
                        The NDIS was introduced in 2013 and will be implemented until 2020. It presently provides around $22 billion for an estimated 500,000 Australians who qualify. The new system offers choice and individualization, which improves support for those who require it.</p>
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
                    <h4>Who Qualifies for NDIS Financing?</h4>
                    <p>Australians with disabilities can now access additional support services under the National Disability Insurance Scheme (NDIS). The NDIS gives customers a choice and control over their experience, in contrast to earlier programs that were standardized and offered few individually tailored services. You can select your NDIS provider and develop a person-centered plan for the services and assistance you require under the new system.
                        <br><br>
                        The NDIS was introduced in 2013 and will be implemented until 2020. It presently provides around $22 billion for an estimated 500,000 Australians who qualify. The new system offers choice and individualization, which improves support for those who require it.</p>
                </div>
            </div>
        </div>
    </section>
@endsection