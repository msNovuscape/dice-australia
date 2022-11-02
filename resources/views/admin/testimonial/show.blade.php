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
                        <h3 class="card-title">Testimonial View</h3>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => 'admin/testimonials/'.$setting->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" class="form-control"  id="heading" name="heading" required value="{{$setting->heading}}" disabled>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control"  id="title" name="title" required value="{{$setting->title}}" disabled>
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image</label>
                                   @if(isset($setting->image))
                                    <br>
                                    <span>
                                        <a href="{{url($setting->image)}}" target="_blank">
                                            <img src="{{url($setting->image)}}" alt="" style="width: 100px">
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Review </label>
                                    <textarea class="summernote_class" name="review" required >{{strip_tags($setting->review)}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" class="form-control"  id="author_name" name="author_name" required value="{{$setting->title}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Author Designation</label>
                                    <input type="text" class="form-control"  id="author_designation" name="author_designation" required value="{{$setting->author_designation}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status" required disabled>
                                        <option value="" selected disabled>Please Select Status Type</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" {{($setting->status==$in) ? 'selected':''}}>{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
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

