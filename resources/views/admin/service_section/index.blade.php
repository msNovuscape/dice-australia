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
                                <h3 class="card-title">{{$service_name}} Sections Table</h3>
                                <div class="card-tools">
                                    <a class="btn btn-green" href="{{url('admin/services/'.$id.'/section/create')}}" role="button">Create Section</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('success.success')
                                @include('errors.error')
                                <form id="search" class="search-form">
                                    <div class="row">
                                        <div class="input-group input-group-sm mb-3 table-search col-md-3">
                                            <input type="search" name="name" class="form-control ds-input" placeholder="name" aria-label="Small" aria-describedby="inputGroup-sizing-sm" onchange="filterList()">
                                        </div>
                                        <div class="input-group input-group-sm mb-3 table-search col-md-3">
                                            <select name="status" class="form-control ds-input" onchange="filterList()">
                                                <option value="" disabled selected>Search By Status</option>
                                                @foreach(config('custom.status') as $in => $val)
                                                    <option value="{{$in}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style = "width: 10px">S.N.</th>
                                        <th class="text-center">Service Name</th>
                                        <th class="text-center">Section Title</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Order By</th>

                                        <!-- <th class="text-center">Image</th>
                                        <th class="text-center">Image Title</th> -->
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($service_sections as $section)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td class="text-center">{{$section->service->name}}</td>
                                            <td class="text-center">{{$section->title}}</td>
                                            <td class="text-center">
                                                @if($section->image != null)
                                                <a href="{{url($section->image)}}" target="_blank">
                                                    <img src="{{url($section->image)}}" alt="Failed to display image" style="width: 100px;">
                                                </a>
                                                @else
                                                    Image not available
                                                @endif
                                            </td>
                                            <td class="text-center">{{$section->description}}</td>
                                            <td class="text-center">{{$section->order_by}}</td>
                                        
                                            <td class="text-center">{{config('custom.status')[$section->status]}}</td>
                                            <td class="text-center d-flex">
                                                <a class="btn btn-outline-secondary btn-sm mr-2" href="{{url('admin/services/'.$id.'/section/'.$section->id.'/view')}}">
                                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                                    View
                                                </a>
                                                <a class="btn btn-outline-dark btn-sm" href="{{url('admin/services/'.$id.'/section/'.$section->id.'/edit')}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-default" style="margin-top: 10px;">
                                    {!! $service_sections->links() !!}
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
@endsection
