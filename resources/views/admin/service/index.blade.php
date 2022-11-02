@extends('admin.layouts.app')
@section('content')
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Services</h3>
                                <div class="card-tools">
                                    <a class="btn btn-green" href="{{url('admin/services/create')}}" role="button">Create</a>
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
                                                <input type="search" name="name" class="form-control ds-input" placeholder="name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" onchange="filterList()">
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
                                        <th style = "width: 10px">S.N.</th>
                                        <th class="text-center">Service Name</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Icon</th>
                                        <th class="text-center">Seo Title</th>
                                        <th class="text-center">Order By</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td class="text-center">{{$service->name}}</td>
                                            <td class="text-center">{{$service->slug}}</td>
                                            <td class="text-center">
                                                <a href="{{url($service->icon ?? '')}}" target="_blank">
                                                    <img src="{{url($service->icon ?? '')}}" alt="" style="width: 100px;">

                                                </a>
                                            </td>
                                            <td class="text-center">{{$service->seo_title}}</td>
                                            <td class="text-center">{{$service->order_by}}</td>
                                        
                                            <td class="text-center">{{config('custom.status')[$service->status]}}</td>
                                            
                                            <!-- <td class="text-center">
                                                <a class="btn btn-primary btn-sm" href="{{url('admin/services/'.$service->id.'/sections')}}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    Sections
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{url('admin/services/'.$service->id.'/edit')}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                            </td> -->
                                            <td class="d-flex justify-content-center action-icons">
                                                <a href="{{url('admin/services/'.$service->id.'/sections')}}" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="sections">
                                                    <i class="fa-solid fa-rectangle-list"></i>
                                                </a>
                                                <a href="{{url('admin/services/'.$service->id.'/edit')}}" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-default" style="margin-top: 10px;">
                                    {!! $services->links() !!}
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script>
        const exampleEl = document.getElementById('example')
        const tooltip = new bootstrap.Tooltip(exampleEl, options)
    </script>
@endsection
