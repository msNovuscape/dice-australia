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
                        <h3 class="card-title">Show Section</h3>
                        <a href="{{url('admin/services/'.$service->id.'/sections/')}}" class="back-button btn-green">List Section</a>

                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="service_name">Service Name</label>
                                    <input type="text" class="form-control" id="service_name" name="name" value="{{$service->name}}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Section Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$service_section->title}}"  disabled>
                                </div>
                            </div>
                            @if($service_section->sub_title != null)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Section Sub Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$service_section->sub_title}}"  disabled>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    @if($service_section->image != null)
                                        <span>
                                            <a href="{{url($service_section->image)}}" target="_blank">
                                                <img src="{{url($service_section->image)}}" alt="" style="width: 100px;">
                                            </a>
                                        </span>
                                    @else
                                    <input type="text" class="form-control" id="image" name="image" value="Image not available" required disabled>
                                    @endif

                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Description</label>
                                    <textarea class="summernote_class" class="form-control" value="" disabled>{{$service_section->description}}</textarea>
                                </div>
                            </div>
                            @if($service_section->sub_description != null)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_title">Sub Description</label>
                                    <textarea class="summernote_class" class="form-control" id="description_title" name="description_title" required value="" disabled>{{$service_section->sub_description}}</textarea>
                                </div>
                            </div>
                            @endif



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="type" required disabled>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" @if($service->status == $in) selected @endif>{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Order BY</label>
                                    <input type="number" class="form-control"  id="order_by" name="order_by" required disabled value="{{$service->order_by}}">
                                </div>
                            </div>
                            @if($service_section->service_section_point)
                                <div class="row" id="point_dom">
                                    <div class="col-md-6 rel-close" id="point_row_1">
                                        <div class="dom-box">
                                            <div class="add-points card">
                                                <div class="form-group" id="point_g_1" >
                                                    

                                                    <label for="">Points</label>
                                                    <br>
                                                    @foreach($service_section->service_section_point as $service_point)
                                                        <div id="point_old{{$service_point->id}}" class="point1" >
                                                            <input type="text" class="point"  name="points[]" value="{{$service_point->point}}"  placeholder="points" disabled> <br>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <a href="{{url('admin/services/'.$service->id.'/section/'.$service_section->id.'/edit')}}" class="back-button">Edit Section</a>

                        </div>
                        </br>


                        
                    </div>
                </div>
                
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            // Summernote
            $('.summernote_class').summernote()

        })
    </script>
@endsection
