@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Show Career</h1>
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
                        <h3 class="card-title">Show Career</h3>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <br>
                                    <span>
                                        <a href="{{url($about_us->image)}}" target="_blank">
                                            <img src="{{url($about_us->image)}}" alt="" style="width: 100px">
                                        </a>
                                    </span>
                                </div>
                            </div>
                      

                        


                          


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Title <span style="color: red";> * </span> </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="title" value="{{$about_us->title}}" required>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group" >
                                    <label>Sub Title <span style="color: red";> * </span></label>
                                    <textarea name="sub_title" class="summernote_class" rows="5" required style="height: 658px;" >{{$about_us->sub_title}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group" >
                                    <label>Point Title <span style="color: red";> * </span> </label>
                                        <textarea name="point_title" class="summernote_class"  rows="5" required style="height: 658px;" >{{$about_us->point_title}}
                                     </textarea>
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Seo Title</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="seo_title" value="{{$about_us->seo_title}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Keyword </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="keyword" value="{{$about_us->keyword}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Seo Description</label>
                                    <textarea class="summernote_class" name="seo_description" disabled>{{$about_us->seo_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <textarea class="summernote_class" name="meta_keyword" disabled >{{$about_us->meta_keyword}}</textarea>
                                </div>
                            </div>


                            
                        </div>

                        @if($about_us->career_points)
                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_1" >
                                                <!-- <label for="">Title</label> <br> -->
                                                <!-- <input type="text" name="point_title" id="title1"  placeholder="title" value="{{$about_us->point_title}}" disabled> <br> -->
                                                <label for="">Points</label>
                                                <br>
                                                @foreach($about_us->career_points as $point)
                                                    <div id="point_old{{$point->id}}" class="point1" >
                                                        <input type="text" class="point"  name="point_old[]"  placeholder="points" value="{{$point->point}}" disabled> <br>
                                                        <input type="hidden"   name="point_old_id[]"  placeholder="points" value="{{$point->id}}"> <br>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="type" required disabled>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" {{($about_us->status ==$in) ? 'selected':''}}>{{$val}}</option>
                                        @endforeach

                                    </select>
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
        $(document).ready(function() {
            $('.summernote_class').summernote()
        })
    </script>
@endsection

