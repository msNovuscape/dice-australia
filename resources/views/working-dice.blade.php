@extends('layout.app')
@section('title')
    <title>Working at DICE</title>
@endsection
@section('content')
    <section class="working-dice-section"> 
        <div class="row">
            <div class="col-md-6">
                <div class="working-dice-content">
                    <p>As a Disability Support Worker, you will be providing care and assistance to people with physical and/or mental health disability.You’ll be supporting people with disability to reach their individual goals, to become more independent and to get much more out of life.   This work can be challenging – but it is also extremely rewarding – knowing you are making a real difference to someone’s life – as well as the lives of their families and the communities in which they live – each-and-every day.
                        <br><br>
                        This guide provides a short overview of some of the things you need to know if you’d like to become a Disability Support Worker.It includes information on required qualifications and checks, additional training to help you perform at your very best, how to apply for current roles, and future career path opportunities.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="working-dice-img">
                    <img src="{{url('frontend/images/who-img.png')}}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="working-dice-form">
        <form class="form-row" id="dice-working" name = "register-form" method="post" action = "">
            <div class="row">
                <div class="col-md-12">
                    <div class="register-desc  text-center">
                        <h2>Register your interest</h2>
                        <p>Fill in your details below and we will respond to your enquiry within one business day.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="input-first-name">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your Full Name" id="reffullname" onkeyup="validatereffname()" name="name" value="{{old('name')}}">
                        <span id="ref-fname-error" class="error">
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter your Phone Name" id="reffullname" onkeyup="validatereffname()" name="name" value="{{old('name')}}">
                        <span id="ref-fname-error" class="error">
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">Email</label>
                        <input type="text" class="form-control" placeholder="Enter your Full Name" id="reffullname" onkeyup="validatereffname()" name="name" value="{{old('name')}}">
                        <span id="ref-fname-error" class="error">
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">State</label>
                        <select class="form-select form-control" aria-label="Default select example" name = "test">
                            <option value="0">Test one state</option>
                            <option value = "1">Test two state</option>
                        </select>
                        <div id="language-error" class="error"></div>
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">Region</label>
                        <select class="form-select form-control" aria-label="Default select example" name = "test">
                            <option value="0">Test one region</option>
                            <option value = "1">Test two region</option>
                        </select>
                        <div id="language-error" class="error"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="dice-interest-areas">
                        <h4>Areas of Interest</h4>
                        <div class="servicedetail-checkbox">
                            @foreach($services as $service)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="{{$service->id}}" name = "services[]" value="{{$service->id}}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
                                </div>
                            @endforeach
                        
                        </div>
                        <span id="ref-gender-error" class="error"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>Anything Else to Share?</h4>
                    <div class="form-group">
                        <textarea class="form-control textarea" name="services_details" placeholder="Is there anyhting you need to share with us?" rows="5" cols="50" id="refdetails" onkeyup="validaterefdetails()">{{old('details_services')}}</textarea>
                        <span id="ref-detailservices-error" class="error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Upload your CV</h4>
                    <div class="form-group dice-inp-file">
                        <input type="file" name="file" multiple>
                        <p>Max. File size: 50 MB</p>
                    </div>
                    <p>You can upload your current CV and we will contact you with any new opportunities.</p>
                </div>
                <div class="col-md-6">
                    <div class="gender-checkbox" onclick="validategender()">
                        <div class="form-check">
                            <input class="form-check-input gender" type="radio" name="gender" value="1" {{(old('gender')=='1') ? 'checked':''}} id="gender">
                            <label class="form-check-label">
                                Join our mailing list to receive further updates and local job opportunities.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                        <button type="submit" class="next-submit">SEND NOW</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection