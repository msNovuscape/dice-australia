@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Accomodation Update</h1>
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
                        <h3 class="card-title"> Accomodation Edit Form</h3>
                        <a href="{{url('admin/accomodations')}}" class="back-button btn-green">List</a>
                        <a href="{{url('admin/accomodations/create')}}" class="back-button btn-green mx-2">Create</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/accomodations/'.$setting->id, 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="title" value="{{$setting->title}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Images</label>
                                    <input type="file" class="form-control" name="images[]" multiple = "multiple" >
                                    <p>Please, Shift + Click to upload multiple images. We recommend only 4 images to upload.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Slider Image</label>
                                    <input type="file" class="form-control" name="slider_image" >
                                </div>
                            </div>
                            <br>
                                                <span style="margin-left: 10px;">
                                                    <a href="{{url($setting->slider_image)}}" target="_blank">
                                                        <img src="{{url($setting->slider_image)}}" alt="" style="width: 100px;">
                                                    </a>
                                                </span>
                                                <br>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value = "{{$setting->address}}"  required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value = "{{$setting->phone}}"  required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value = "{{$setting->email}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="website" value = "{{$setting->website}}">
                                </div>
                            </div>

                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_1" >
                                                <label for=""> Property Features</label> <br>
                                                <!-- <input type="text" name="point_title" id="title1"  placeholder="Title"> <br> -->
                                                @foreach($setting->accommodation_features as $point)
                                                @php
                                                $point_id = $point->id;

                                                @endphp
                                                <div id="point1" class="point1" >

                                                    <!-- <label for="">List <span style="color: red";> * </span> </label> <br> -->

                                                    <input type="text" class="point"  name="feature_name[]"  placeholder="Feature" value="{{$point->feature_name}}"> <br>
                                                    <!-- <button  class="close-point" onclick="deletePoint(1)" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button> -->
                                                    <button  class="close-point" onclick="deletePointPermanently({{$point_id}})" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                
                                                </div>
                                                @endforeach


                                            </div>
                                            <button type="button"  class="add-point-btn btn btn-primary" onclick="getPoint(1)">Add more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_2" >
                                                <label for="">Property Information</label> <br>
                                                <!-- <input type="text" name="point_title" id="title1"  placeholder="Title"> <br> -->
                                                @foreach($setting->accommodation_informations as $point)
                                                <div id="point1" class="point1" >
                                                    <!-- <label for="">List <span style="color: red";> * </span> </label> <br> -->
                                                    <input type="text" class="point"  name="information_name[]"  placeholder="Information" value = "{{$point->information_name}}"> <br>
                                                    <button  class="close-point" onclick="deleteInformationPointPermanently({{$point->id}})" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </div>
                                                @endforeach

                                            </div>
                                            <button type="button"  class="add-point-btn btn btn-primary" onclick="getInformationPoint(1)">Add more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="point_dom">
                                <div class="col-md-6 rel-close" id="point_row_1">
                                    <div class="dom-box">
                                        <div class="add-points card">
                                            <div class="form-group" id="point_g_3" >
                                                <label for="">Slider Title</label> <br>
                                                <!-- <input type="text" name="point_title" id="title1"  placeholder="Title"> <br> -->
                                                @foreach($setting->accommodation_slider_titles as $point)
                                                <div id="point1" class="point1" >
                                                    <!-- <label for="">Title <span style="color: red";> * </span> </label> <br> -->
                                                    <input type="text" class="point"  name="title_name[]"  placeholder="Enter title" value = "{{$point->title_name}}"> <br>
                                                    <button  class="close-point" onclick="deleteSliderPointPermanently({{$point->id}})" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </div>
                                                @endforeach
                                            </div>
                                            <button type="button"  class="add-point-btn btn btn-primary" onclick="getTitlePoint(1)">Add more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="type" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                        <option value="{{$in}}" {{($setting->status ==$in) ? 'selected':''}}>{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
        $(document).ready(function() {
            $('.summernote_class').summernote()

        })

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        var point_count = 1;
        function getPoint(count){
            point_count = point_count +1;
            // debugger;
            var html = '<div id="point'+point_count+'" class="point1">'+
                '<input type="text" class="point"  name="feature_name[]"  placeholder="Feature"> <br>'+
                '<button type="button" class="close-point" onclick="deletePoint('+point_count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</div>';
            $('#point_g_1').append(html);
        }

        function getInformationPoint(count){
            point_count = point_count +1;
            debugger;
            var html = '<div id="point'+point_count+'" class="point1">'+
                '<input type="text" class="point"  name="information_name[]"  placeholder="Information"> <br>'+
                '<button type="button" class="close-point" onclick="deletePoint('+point_count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</div>';
            $('#point_g_2').append(html);
        }
        function getTitlePoint(count){
            point_count = point_count +1;
            debugger;
            var html = '<div id="point'+point_count+'" class="point1">'+
                '<input type="text" class="point"  name="title_name[]"  placeholder="Enter title"> <br>'+
                '<button type="button" class="close-point" onclick="deletePoint('+point_count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</div>';
            $('#point_g_3').append(html);
        }
        function deletePoint(count){
            if($('.point').length > 1){
                $('#point'+count).remove();
            }
        }

        function deletePointPermanently(id){
          
            if($('.point').length > 1){
                if (confirm("Are you sure Delete?")) {
                    $.ajax({
                        /* the route pointing to the post function */
                        type: 'GET',
                        url: Laravel.url +"/admin/accomodations/points_remove/"+id,
                        dataType: 'json',
                        
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            alert('Succeffully deleted');
                            window.location.reload();
                            // $('#point_old'+data.point_id).remove();
                        },
                        error: function(error) {

                        }
                    });
                }
                return false;
            }
        }
        function deleteInformationPointPermanently(id){
          
          if($('.point').length > 1){
              if (confirm("Are you sure Delete?")) {
                  $.ajax({
                      /* the route pointing to the post function */
                      type: 'GET',
                      url: Laravel.url +"/admin/accomodations/information_points_remove/"+id,
                      dataType: 'json',
                      
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,
                      /* remind that 'data' is the response of the AjaxController */
                      success: function (data) {
                          alert('Succeffully deleted');
                          window.location.reload();
                          // $('#point_old'+data.point_id).remove();
                      },
                      error: function(error) {

                      }
                  });
              }
              return false;
          }
      }
      function deleteSliderPointPermanently(id){
          
          if($('.point').length > 1){
              if (confirm("Are you sure Delete?")) {
                  $.ajax({
                      /* the route pointing to the post function */
                      type: 'GET',
                      url: Laravel.url +"/admin/accomodations/slider_points_remove/"+id,
                      dataType: 'json',
                      
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,
                      /* remind that 'data' is the response of the AjaxController */
                      success: function (data) {
                          alert('Succeffully deleted');
                          window.location.reload();
                          // $('#point_old'+data.point_id).remove();
                      },
                      error: function(error) {

                      }
                  });
              }
              return false;
          }
      }

    </script>
@endsection

