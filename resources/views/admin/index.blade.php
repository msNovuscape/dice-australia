@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Agility Homecare Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$service-> count()}}</h3>
                                <p>Service</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$settings-> count()}}</h3>
                                <p>Total Number of Referral</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                            <a href="referrals" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$contact -> count()}}</h3>
                                <p>Total Number of Contact</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-address-book"></i>
                            </div>
                            <a href="contacts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$subscription -> count()}}</h3>
                                <p>Number of Subscription</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-hand-pointer"></i>
                            </div>
                            <a href="subscriptions" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex flex-column">
                                                <h3 class="card-title">Contacts</h3>
                                                <div class="card-tools">
                                                    {{--                                        <a class="btn btn-green" href="{{url('admin/projects/create')}}" role="button">Create</a>--}}
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                @include('success.success')
                                                @include('errors.error')

                                                <form id="search" class="search-form">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-sm mb-3 table-search w-100">
                                                                <input type="search"  name="name" class="form-control ds-input" placeholder="Name / Query Type" aria-label="Small" aria-describedby="inputGroup-sizing-sm" onchange="filterList()">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-sm mb-3 table-search w-100">
                                                                <select name="status" class="form-control ds-input" onchange="filterList()">
                                                                    <option value="" disabled selected>Search By Status</option>
                                                                    @foreach(config('custom.status') as $in => $val)
                                                                        <option value="{{$in}}">{{$val}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">S.N.</th>
                                                        <th class="text-center">Service</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Message</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($contacts as $contact)
                                                        <tr>
                                                            <th scope="row">{{$loop->iteration}}</th>
                                                            @if($contact->service()->count() > 0)
                                                                <td class="text-center">Enquiry|{{$contact->service->name}}</td>
                                                            @else
                                                                <td class="text-center">Contact</td>
                                                            @endif
                                                            <td class="text-center">{{$contact->fullname}}</td>
                                                            <td class="text-center">{{$contact->email}}</td>
                                                            <td class="text-center">{{$contact->message}}</td>

                                                            <!-- <td class="text-center">
                                                <a class="btn btn-primary btn-sm" href="{{url('admin/contacts/'.$contact->id.'/view')}}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>



                                            </td> -->

                                                            <td class="d-flex justify-content-center action-icons">
                                                                <a href="{{url('admin/contacts/'.$contact->id.'/view')}}" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="view">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                <div class="pagination-default" style="margin-top: 10px;">
                                                    {!! $contacts->links() !!}
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card -->

                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                        </section>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
