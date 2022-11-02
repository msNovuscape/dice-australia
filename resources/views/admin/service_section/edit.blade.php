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
                        <h3 class="card-title">Edit Service Section</h3>
                        <a href="{{url('admin/services/'.$service->id.'/sections')}}" class="back-button btn-green">List Sections</a>

                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/services/'.$service->id.'/section/'.$service_section->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($service_section->image != null)
                                    <span>
                                        <a href="{{url($service_section->image)}}" target="_blank">
                                            <img src="{{url($service_section->image)}}" alt="" style="width: 100px;">
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$service_section->title}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$service_section->sub_title}}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="summernote_class" name="description">{{$service_section->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for="sub_description">Sub Description</label>
                                    <textarea class="summernote_class" name="sub_description">{{$service_section->sub_description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Order BY <span style="color: red">*</span></label>
                                    <input type="number" class="form-control"  id="order_by" name="order_by" required value="{{$service_section->order_by}}">
                                </div>
                            </div>
                        </div>
                        </br>


                        @if($service_section->service_section_point)
                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_1" >

                                                <label for="">Service Section Points <span style="color: red">*</span></label>
                                                <br>
                                                @foreach($service_section->service_section_point as $section_point)
                                                    <div id="point_old{{$section_point->id}}" class="point1" >
                                                        <input type="text" class="point"  name="points[]" value="{{$section_point->point}}"  placeholder="points"> <br>
                                                        <label>Description</label><br>
                                                <textarea class="summernote_class"  name="point_descriptions[]">{{$section_point->point_description}}  </textarea><br>
                                                <label>Icon</label><br>
                                                @if($section_point->icon != null)
                                                <img src = "{{url($section_point->icon)}}">
                                                @endif
                                                <input type="file" class="form-control"  name="icons[]"  placeholder="Point"> <br>
                                                        <button  class="close-point" onclick="deletePointPermanently({{$section_point->id}})" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button"  class="add-point-btn btn btn-green" onclick="getPoint(1)">Add Points</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

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
                '<input type="text" class="point"  name="points[]"  placeholder="Point"> <br>'+
                '<textarea class="summernote_class"  name="point_descriptions[]"> </textarea> <br>'+
                '<input type="file" class="form-control"  name="icons[]"  placeholder="Point"> <br>'+
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
