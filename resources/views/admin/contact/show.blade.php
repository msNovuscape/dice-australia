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
                        <h3 class="card-title">Contact</h3>
                        <a href="{{url('admin/contacts')}}" class="btn btn-green back-button active" role="button" aria-pressed="true">List</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        <ul class="contact-info">
                            <li class="d-flex">
                                <span>Contact Person Name:</span>
                                <span>{{$contact->fullname}}</span>
                            </li>
                            <li class="d-flex">
                                <span>Service Type:</span>
                                <span>
                                    @if($contact->service()->count() > 0)
                                        Enquiry|{{$contact->service->name}}
                                    @else
                                        Contact
                                    @endif
                                </span>
                            </li>
                            <li class="d-flex">
                                <span>Email:</span>
                                <span>{{$contact->email}}</span>
                            </li>
                            <li class="d-flex">
                                <span>Phone:</span>
                                <span>{{$contact->phone}}</span>
                            </li>
                            <li class="d-flex">
                                <span>Message:</span>
                                <span>{{$contact->message}} </span>
                            </li>
                        </ul>

            {!! Form::close() !!}
            </div>
                </div>
            </div>
        </section>
    </div>
@endsection