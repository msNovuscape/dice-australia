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
                        <h3 class="card-title"> Slider Edit</h3>
                        <a href="{{url('admin/ndis_pricing')}}" class="back-button btn-green">List</a>
                        <a href="{{url('admin/ndis_pricing/create')}}" class="back-button btn-green mx-2">Create</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/ndis_pricing/'.$setting->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="title" value="{{$setting->title}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="sub_title" value="{{$setting->sub_title}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control"   name="image">
                                <span style="margin-left: 100px;">
                                                    <a href="{{url($setting->image)}}" target="_blank">
                                                        <img src="{{url($setting->image)}}" alt="" style="width: 100px;">
                                                    </a>
                                                </span>
                                </div>

                            </div>

                            <div class="col-md-12" >
                                <div class="form-group" >
                                    <label>Description</label>
                                    <textarea name="description" class="summernote_class" rows="5" style="height: 658px;" >{{$setting->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group" >
                                    <label>Sub Description</label>
                                    <textarea name="sub_description" class="summernote_class" rows="5" style="height: 658px;" >{{$setting->sub_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Button</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="button" value="{{$setting->button}}" placeholder = "Enter button name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="link" value="{{$setting->link}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="type" required>
                                    <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" @if($setting->status == $in) selected @endif>{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-green">Update</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.summernote_class').summernote()

        })

    </script>
@endsection

