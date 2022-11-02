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
                        <h3 class="card-title">Show Service</h3>
                        <a href="{{url('admin/services')}}" class="back-button">Back</a>

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
                                    <label for="image_title">Image Title</label>
                                    <input type="text" class="form-control" id="image_title" name="image_title" value="{{$service->image_title}}" required disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <span>
                                        <a href="{{url($service->image)}}" target="_blank">
                                            <img src="{{url($service->image)}}" alt="" style="width: 100px;">
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image Alt</label>
                                    <input type="text" class="form-control" id="image_alt" name="image_alt" value="{{$service->image_alt}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_title">Description Title</label>
                                    <input type="text" class="form-control" id="description_title" name="description_title" required value="{{$service->description_title}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_description">Image Description</label>
                                    <textarea class="summernote_class" name="image_description" required>{{$service->image_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="top_description">Top Description</label>
                                    <textarea class="summernote_class" name="top_description" required>{{$service->top_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bottom_description">Bottom Description</label>
                                    <textarea class="summernote_class" name="bottom_description" required>{{$service->bottom_description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seo_title">Seo Title</label>
                                    <input type="text" class="form-control" name="seo_title" id = "seo_title" required value="{{$service->seo_title}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" class="form-control" name="keywords" id = "keywords" value="{{$service->keywords}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control summernote_class" name="seo_description">{{$service->seo_description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seo_description">Meta Key Word</label>
                                    <textarea class="form-control summernote_class" name="meta_keywords">{{$service->meta_keywords}}</textarea>
                                </div>
                            </div>


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
                        </div>
                        </br>


                        @if($service->service_point)
                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_1" >
                                                <label> Title</label>
                                                <br>
                                                <input type="text" name="point_title" id="title1" value="{{$service->point_title}}" placeholder="title" disabled> <br>

                                                <label for="">Points</label>
                                                <br>
                                                @foreach($service->service_point as $service_point)
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
