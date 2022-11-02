@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teams</h1>
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
                        <h3 class="card-title">Edit Teams</h3>
                        <a href="{{url('admin/teams')}}" class="btn-green back-button">List</a>
                        <a href="{{url('admin/teams/create')}}" class="btn-green back-button mx-2">Create</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/teams/'.$team->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Full Name <span style="color:red ">*</span> </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="team_name" value="{{$team->team_name}}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Designation <span style="color:red ">*</span> </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="designation" value="{{$team->designation}}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address  </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="address" value="{{$team->address}}" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email <span style="color:red ">*</span> </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="email" value="{{$team->email}}" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile No  </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="mobile_no" value="{{$team->mobile_no}}" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($team->image != null)
                                    <span>
                                        <a href="{{url($team->image)}}" target="_blank">
                                            <img src="{{url($team->image)}}" alt="" style="width: 100px;">
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            




                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status <span style="color:red ">*</span> </label>
                                    <select name="status" class="form-control" id="type" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}"{{($team->status == $in) ? 'selected' : '' }}>{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="value_section">

                                </div>
                            </div>

                        </div>
                        <div class="form-group row create-button">
                            <div class="col-sm-10 col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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

