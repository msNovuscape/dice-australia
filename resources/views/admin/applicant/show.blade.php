@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                       
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Applicant</h3>
                        <a href="{{url('admin/referrals')}}" class="btn btn-green back-button active" role="button" aria-pressed="true">List</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label for="service_name" style="font-weight: bold; font-size: 20px; color: #DD6227">Participant Details</label></br>
                                            <ul class="contact-info">
                                                <li class="d-flex">
                                                    <span>Full Name:</span>
                                                    <span>{{$applicants->name}}</span>
                                                </li>
 
                                                <li class="d-flex">
                                                    <span>Email:</span>
                                                    <span>{{$applicants->email}}</span>
                                                </li>

                                                <li class="d-flex">
                                                    <span>Phone:</span>
                                                    <span>{{$applicants->phone}}</span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>State:</span>
                                                    <span>{{{config('custom.states')[$state]}}</span>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label for="service_name" style="font-weight: bold; font-size: 20px; color: #DD6227">Participant Address</label></br>
                                            <ul class="contact-info">
                                                <li class="d-flex">
                                                    <span>Suburb:</span>
                                                    <span>{{$applicants->suburb}}</span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>State/Region:</span>
                                                    <span>{{$applicants->state_name}}</span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>Postal Code:</span>
                                                    <span>{{$applicants->postalcode}}</span>
                                                </li>
                                            </ul>
                                        </div>

                                        @if($applicants->is_ndis == '1')
                                        <div class="col-md-12 mt-4" >
                                            <label for="service_name" style="font-weight: bold; font-size: 20px; color: #DD6227">NDIS Details</label></br>
                                            <ul class="contact-info">
                                                <li class="d-flex">
                                                    <span>NDIS Number:</span>
                                                    <span>{{$applicants->ndis_number}}</span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>NDIS Expiry Date:</span>
                                                    <span>{{$applicants->ndis_expiry_date}}</span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>NDIS Plan:</span>
                                                    <span>{{config('custom.ndis_plan')[$applicants->ndis_plan]}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="col-md-12 mt-4">
                                            <label for="service_name" style="font-weight: bold; font-size: 20px; color: #DD6227">Service Details</label></br>
                                            <ul class="contact-info">
                                                <li class="d-flex">
                                                    <span>Sevices:</span>
                                                    <span>
                                                        @foreach($applicants->referral_services as $service)

                                                            {{App\Models\Service::find($service->service_id)->name}}<br />
                                                        @endforeach
                                                    </span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>Details: </span>
                                                    <span>{{$referral->services_details}}</span>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label for="service_name" style="font-weight: bold; font-size: 20px; color: #DD6227">Referrer Details</label></br>
                                            <ul class="contact-info">
                                                <li class="d-flex">
                                                    <span>Referrer Full Name:</span>
                                                    <span>{{$referral->referrer_full_name}}</span>
                                                </li>
                                                <li class="d-flex">
                                                    <span>Referrer Contact Number:</span>
                                                    <span>{{$referral->referrer_contact_no}}</span>
                                                </li>
                                             
                                            </ul>
                                        </div>
                                    </div>
                                </div>
   
            </div>
                </div>
            </div>
        </section>
    </div>
@endsection