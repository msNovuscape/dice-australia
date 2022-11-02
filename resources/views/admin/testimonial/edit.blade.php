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
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"> Testimonial Edit</h3>
                        <a href="{{url('admin/testimonials')}}" class="back-button btn-green">List</a>
                        <a href="{{url('admin/testimonials/create')}}" class="back-button btn-green mx-2">Create</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => 'admin/testimonials/'.$setting->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Heading <span style="color: red">*</span> </label>
                                    <input type="text" class="form-control"  id="heading" name="heading" required value="{{$setting->heading}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title <span style="color: red">*</span> </label>
                                    <input type="text" class="form-control"  id="title" name="title" required value="{{$setting->title}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control"  id="image" name="image"  value="{{$setting->image}}">
                                    <br>
                                    <span>
                                        <a href="{{url($setting->image)}}" target="_blank">
                                            <img src="{{url($setting->image)}}" alt="" style="width: 100px">
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Review <span style="color: red">*</span>  </label>
                                    <textarea class="summernote_class" name="review" required >{{$setting->review}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Author Name <span style="color: red">*</span> </label>
                                    <input type="text" class="form-control"  id="author_name" name="author_name" required value="{{$setting->author_name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Author Designation <span style="color: red">*</span> </label>
                                    <input type="text" class="form-control"  id="author_designation" name="author_designation" required value="{{$setting->author_designation}}">
                                </div>
                            </div>
                            <!-- <div class="col-md-2">
                                <div class="form-group">
                                    <label>Testimonial Type <span style="color: red">*</span> </label>
                                    <select name="testimonial_type" class="form-control" id="testimonial_type" required>
                                        <option value="" selected disabled>Please Select Course Type</option>
                                        @foreach(config('custom.testimonial_types') as $index => $value)
                                            <option value="{{$index}}" @if($setting->testimonial_type == $index) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status <span style="color: red">*</span> </label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option value="" selected disabled>Please Select Status Type</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" {{($setting->status == $in) ? 'selected':''}}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

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
    </script>
@endsection

