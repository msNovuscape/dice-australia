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
                        <h3 class="card-title">Create Service</h3>
                        <a href="{{url('admin/services')}}" class="back-button btn-green">List</a>

                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/service', 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="service_name">Service Name <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="service_name" name="name" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image_title">Image Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="image_title" name="image_title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image <span style="color: red">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image Alt</label>
                                    <input type="text" class="form-control" id="image_alt" name="image_alt">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_title">Description Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="description_title" name="description_title" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_description">Image Description <span style="color: red">*</span></label>
                                    <textarea class="summernote_class" name="image_description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="top_description">Top Description <span style="color: red">*</span></label>
                                    <textarea class="summernote_class" name="top_description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_description">Bottom Description <span style="color: red">*</span></label>
                                    <textarea class="summernote_class" name="bottom_description" required></textarea>
                                </div>
                            </div> -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seo_title">Seo Title <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="seo_title" id = "seo_title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="keywords">Keywords <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="keywords" id = "keywords" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea class="summernote_class" name="short_description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="summernote_class" name="seo_description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seo_description">Meta Key Word</label>
                                    <textarea class="summernote_class" name="meta_keywords"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="icon"> Icon <span style="color: red">*</span></label>
                                    <input type="file" class="form-control" id="icon" name="icon" required>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order BY <span style="color: red">*</span></label>
                                            <input type="number" class="form-control"  id="order_by" name="order_by" required>
                                        </div>
                                    </div>
                        </div>
                        </br>


                        <!-- <div class="row" id="point_dom">
                            <div class="col-md-6 rel-close" id="point_row_1">
                                <div class="dom-box">
                                    <div class="add-points card">
                                        <div class="form-group" id="point_g_1" >
                                            <label> Service Point Title <span style="color: red">*</span></label><br>
                                            <input type="text" name="point_title" id="title1"  placeholder="Title"> <br>
                                            <div id="point1" class="point1" >
                                                <label> Service Point <span style="color: red">*</span></label><br>
                                                <input type="text" class="point"  name="points[]"  placeholder="Points"> <br>
                                                <button  class="close-point" onclick="deletePoint(1)" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>

                                        </div>
                                        <button type="button"  class="add-point-btn btn btn-primary" onclick="getPoint(1)">Add Points</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

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
                '<input type="text" class="point"  name="points[]"  placeholder="points"> <br>'+
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
