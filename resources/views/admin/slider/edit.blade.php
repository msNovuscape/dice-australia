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
                        <a href="{{url('admin/sliders')}}" class="back-button btn-green">List</a>
                        <a href="{{url('admin/sliders/create')}}" class="back-button btn-green mx-2">Create</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/sliders/'.$setting->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="title1" value="{{$setting->title1}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="title2" value="{{$setting->title2}}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Button Name</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="button_name" value="{{$setting->button_name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="link" value="{{$setting->link}}">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control"   name="image" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image Alt</label>
                                    <input type="text" class="form-control"   name="image_alt" value="{{$setting->image_alt}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="type" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" {{($setting->status==$in) ? 'selected': ''}}>{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group" >
                                    <label>Description</label>
                                    <textarea name="description" class="summernote_class" rows="5" style="height: 658px;" >{{$setting->description}} </textarea>
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

