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
                        <h3 class="card-title">View Subscription</h3>
                        <a href="{{url('admin/subscriptions')}}" class="btn btn-green back-button active" role="button" aria-pressed="true">List</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="service_name">Email:</label>
                                          {{$subscription->email}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="query_type">Status:</label>
                                          {{$subscription->status == 1 ? 'Active' : 'Deactive'}}
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="email">Subscribed at:</label>
                                          @php
                                          $newtime = strtotime($subscription->created_at);
	                                      $date_time = date('M d, Y',$newtime);@endphp
                                          {{$date_time}}
                                        </div>
                                    </div>
                                    
                                </div>
                                </br>
   

            
            {!! Form::close() !!}
            </div>
                </div>
            </div>
        </section>
    </div>
@endsection