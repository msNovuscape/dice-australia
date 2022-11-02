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
                        <h3 class="card-title">View Teams</h3>
                        <a href="{{url('admin/teams')}}" class="back-button">back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">





                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Team Name</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="team_name" value="{{$setting->team_name}}" required disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="address" value="{{$setting->address}}" required disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="email" value="{{$setting->email}}" required disabled>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="mobile_no" value="{{$setting->mobile_no}}" required disabled>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ID No</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="id_no" value="{{$setting->id_no}}" required disabled>
                                </div>
                            </div>




                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="type" required disabled>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}"{{($setting->status == $in) ? 'selected' : '' }}>{{$val}}</option>
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

