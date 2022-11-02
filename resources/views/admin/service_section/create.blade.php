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
                        <h3 class="card-title">Create {{$service_name}}'s section</h3>
                        <a href="{{url('admin/services/'.$id.'/sections')}}" class="back-button btn-green">List Section</a>

                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/service/'.$id.'/section', 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" class="form-control" id="sub_title" name="sub_title">
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="summernote_class" id="description" name="description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_description">Sub Description</label>
                                    <textarea class="summernote_class" name="sub_description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status <span style="color: red">*</span> </label>
                                    <select name="status" class="form-control" id="type" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}">{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order BY <span style="color: red">*</span></label>
                                            <input type="number" class="form-control"  id="order_by" name="order_by" required>
                                        </div>
                                    </div>
                        </div>
                        </br>


                        <div class="row" id="point_dom">
                            <div class="col-md-6 rel-close" id="point_row_1">
                                <div class="dom-box">
                                    <div class="add-points card">
                                        <div class="form-group" id="point_g_1" >
                                            <div id="point1" class="point1" >
                                                <label> Section Points</label><br>
                                                <input type="text" class="point"  name="points[]"  placeholder="Point"> <br>
                                                <!-- <button  class="close-point" onclick="deletePoint(1)" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button> -->
                                                <label>Description</label><br>
                                                <textarea class="summernote_class"  name="point_descriptions[]">  </textarea><br>
                                                <label>Icon</label><br>
                                                <input type="file" class="form-control"  name="icons[]"  placeholder="Point"> <br>
                                                <button  class="close-point" onclick="deletePoint(1)" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>

                                        </div>
                                        <button type="button"  class="add-point-btn btn btn-green" onclick="getPoint(1)">Add Points</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row create-button">
                            <div class="col-sm-10 col-md-12">
                                <button type="submit" class="btn btn-green">Create</button>
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
            debugger;
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

    </script>
@endsection
