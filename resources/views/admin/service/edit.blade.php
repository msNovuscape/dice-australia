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
                        <h3 class="card-title">Edit Service</h3>
                        <a href="{{url('admin/services')}}" class="back-button btn-green">List</a>
                        <a href="{{url('admin/services/create')}}" class="back-button btn-green mx-2">Create</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/services/'.$service->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="service_name">Service Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="service_name" name="name" value="{{$service->name}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seo_title">Seo Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="seo_title" id = "seo_title" required value="{{$service->seo_title}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="keywords">Keywords <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="keywords" id = "keywords" value="{{$service->keywords}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="summernote_class" name="short_description">{{$service->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seo_description">Seo Description </label>
                                    <textarea class="summernote_class" name="seo_description">{{$service->seo_description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seo_description">Meta Key Word</label>
                                    <textarea class="summernote_class" name="meta_keywords">{{$service->meta_keywords}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="icon"> Icon <span style="color: red">*</span></label>
                                    <input type="file" class="form-control" id="icon" name="icon">
                                    @if($service->icon != null)
                                    <span>
                                        <a href="{{url($service->icon)}}" target="_blank">
                                            <img src="{{url($service->icon)}}" alt="" style="width: 100px;">
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status <span style="color: red">*</span></label>
                                    <select name="status" class="form-control" id="type" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" @if($service->status == $in) selected @endif>{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Order BY <span style="color: red">*</span></label>
                                    <input type="number" class="form-control"  id="order_by" name="order_by" required value="{{$service->order_by}}">
                                </div>
                            </div>
                        </div>
                        </br>


                        <!-- @if($service->service_point)
                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_1" >
                                                <label> Service Title <span style="color: red">*</span></label>
                                                <br>
                                                <input type="text" name="point_title" id="title1" value="{{$service->point_title}}" placeholder="title"> <br>

                                                <label for="">Service Points <span style="color: red">*</span></label>
                                                <br>
                                                @foreach($service->service_point as $service_point)
                                                    <div id="point_old{{$service_point->id}}" class="point1" >
                                                        <input type="text" class="point"  name="points[]" value="{{$service_point->point}}"  placeholder="points"> <br>

                                                        <button  class="close-point" onclick="deletePointPermanently({{$service_point->id}})" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button"  class="add-point-btn btn btn-primary" onclick="getPoint(1)">Add Points</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif -->

                        <div class="form-group row create-button">
                            <div class="col-sm-10 col-md-12">
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
        $(function () {
            // Summernote
            $('.summernote_class').summernote()

        })
        var point_count = 1;
        function getPoint(count){
            point_count = point_count +1;
            var html = '<div id="point'+point_count+'" class="point1">'+
                '<input type="text" class="point"  name="points[]"  placeholder="Points"> <br>'+
                '<button type="button" class="close-point" onclick="deletePoint('+point_count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</div>';
            $('#point_g_1').append(html);
        }
        function deletePoint(count){
            if($('.point').length > 1){
                $('#point'+count).remove();
            }
        }

        function deletePointPermanently(id){
            if($('.point').length > 1){
                if (confirm("Are you sure Delete?")) {
                    $.ajax({
                        /* the route pointing to the post function */
                        type: 'GET',
                        url: Laravel.url +"/admin/service_point/"+id,
                        dataType: 'json',
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,
                        /* remind that 'data' is the response of the AjaxController */

                        success: function (data) {
                            debugger;
                            $('#point_old'+data.service_point_id).remove();
                        },
                        error: function(error) {

                        }
                    });
                }
                return false;
            }
        }
    </script>
@endsection
