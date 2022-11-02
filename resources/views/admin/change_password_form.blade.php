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
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => 'admin/change_password', 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Old Password <span style="color: red">*</span></label>
                                    <input type="text" class="form-control"  id="old_password" name="old_password" required value="{{old('old_password')}}">
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>New Password <span style="color: red">*</span> </label>
                                    <input type="password" class="form-control"  id="password" name="password" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Confirm New Password <span style="color: red">*</span> </label>
                                    <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            
                            
                        </div>

                        <div class="form-group row create-button">
                            <div class="col-sm-10 col-md-12">
                                <button type="submit" class="btn btn-green">Submit</button>
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

