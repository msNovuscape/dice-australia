@extends('layout.app')
@section('title')
    <title>Working at DICE</title>
@endsection
@section('content')
@php
          $msg =Session::get('msg') ?? null; 
        @endphp
    <section class="working-dice-section"> 
        <div class="row">
            <div class="col-md-6">
                <div class="working-dice-content">
                    <h2>Become a Part of Our Family and Help Us Change Lives.</h2>
                    <h5>If you are interested in supporting people with disabilities, there are several ways to do so.</h5>
                    <p>DICE is looking for individuals who love life and are passionate about helping others. We value diversity and offer very flexible schedules. At DICE, we respect, embrace, and support our carers.
                        <br><br>
                        We offer jobs for both professionals with experience and the beginning of their careers – with us you always get rewarding roles and competitive pay. Apply today and join our team!
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="working-dice-img">
                    <img src="{{url('frontend/images/ndis.png')}}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="working-dice-form">
        <form class="form-row" id="dice-working" name = "register-form" enctype="multipart/form-data" method = "post" action = "{{route('career')}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="register-desc  text-center">
                        <h2>Register your interest</h2>
                        <p>Fill in your details below and we will respond to your enquiry within one business day.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your Full Name" id="regfullname" onkeyup="validateRegFname()" name="name" value="{{old('name')}}">
                        <span id="reg-fname-error" class="error">
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter your Phone Number" id="regphone" onkeyup="validateRegPhone()" name="phone" value="{{old('phone')}}">
                        <span id="reg-phone-error" class="error">
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">Email</label>
                        <input type="text" class="form-control" placeholder="Enter your Email" id="regemail" onkeyup="validateRegEmail()" name="email" value="{{old('email')}}">
                        <span id="reg-email-error" class="error">
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input-first-name">State</label>
                        <select class="form-select form-control" aria-label="Default select example" onclick="validateRegState()" id="regState" name = "state">
                            <option hidden="" value="">Select state</option>
                            @foreach(config('custom.states') as $in => $val)
                                <option value="{{$in}}" {{(old('state')==$in) ? 'selected':''}}>{{$val}}</option>
                            @endforeach
                        </select>
                        <div id="reg-state-error" class="error"></div>
                    </span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="dice-interest-areas">
                        <h4>Areas of Interest</h4>
                        <div class="servicedetail-checkbox">
                            @foreach($services as $service)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input regServices" type="checkbox" id="{{$service->id}}" name = "services[]" onclick="validateRegServices()" value="{{$service->id}}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{$service->id}}"  id="regServices">{{$service->name}}</label>
                                </div>
                            @endforeach
                        
                        </div>
                        <span id="reg-services-error" class="error"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>Anything Else to Share?</h4>
                    <div class="form-group">
                        <textarea class="form-control textarea" name="message" placeholder="Is there anyhting you need to share with us?" rows="5" cols="50" id="reginquiry" onkeyup="validateRegEnquiry()">{{old('message')}}</textarea>
                        <span id="reg-inquiry-error" class="error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Upload your CV</h4>
                    <div class="dice-inp-file">
                        <div class="form-group">
                            <input type="file" name="file" onclick="validateRegCV()" id="regCV" multiple>
                            <br><span id="reg-cv-error" class="error"></span>
                        </div>
                        <div>
                            <p>Max. File size: 50 MB</p>
                        </div>
                    </div>
                    <p>You can upload your current CV and we will contact you with any new opportunities.</p>
                </div>
                <div class="col-md-6">
                    <div class="gender-checkbox">
                        <div class="form-check">
                            <input class="form-check-input gender" type="radio" name="is_in_mailing_list" value="1" {{(old('is_in_mailing_list')=='1') ? 'checked':''}} id="is_in_mailing_list">
                            <label class="form-check-label">
                                Join our mailing list to receive further updates and local job opportunities.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                        <button type="submit" onclick = "validateRegisterForm()"  class="next-submit">SEND NOW</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>


var php_var = "<?php echo $msg; ?>";
        if(php_var.length !== 0){
              Swal.fire({
                  title: 'Submitted!!',
                  text: php_var,
                  icon: 'success'
              })
        }


        var fullnameError = document.getElementById('reg-fname-error');
        var phoneError = document.getElementById('reg-phone-error');
        var emailError = document.getElementById('reg-email-error');
        var stateError = document.getElementById('reg-state-error');
        var servicesError = document.getElementById('reg-services-error');
        var inquiryError = document.getElementById('reg-inquiry-error');
        var cvError = document.getElementById('reg-cv-error');

        function validateRegFname(){
            var regfname = document.getElementById('regfullname').value;
            if(regfname.length == 0){
                $('#regfullname').focus();
                fullnameError.innerHTML = "Full name is required !";
                return false;
            }else{
                fullnameError.innerHTML = "";
                return true;
            }
        }

        function validateRegPhone(){
            var regphone = document.getElementById('regphone').value;
            if(regphone.length == 0){
                $('#regphone').focus();
                phoneError.innerHTML = "Phone number is required !";
                return false;
            }
            if(!regphone.match(/^\d{10}$/)){
                phoneError.innerHTML = "Please provide valid 10 digit number";
                return false;
            }
            else{
                phoneError.innerHTML = "";
                return true;
            }
        }

        function validateRegEmail(){
            var regemail = document.getElementById('regemail').value;
            if(regemail.length == 0){
                $('#regemail').focus();
                emailError.innerHTML = "Email address is required !";
                return false;
            }
            if(!regemail.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$/)){
                emailError.innerHTML = "Please provide valid email address";
                return false;
            }
            else{
                emailError.innerHTML = '';
                return true;
            }
        }

        function validateRegState(){
            var regstate = document.getElementById('regState').value;
            if(regstate.length == 0){
                $('#regState').focus();
                stateError.innerHTML = "State field is required !";
                return false;
            }
            else{
                stateError.innerHTML = "";
                return true;
            }
        }

        function validateRegServices(){
            var valid = false;
            // var gender = document.referral.gender;
            var regservices = document.getElementsByClassName("regServices");
            for(var i=0;i<regservices.length;i++){
                if(regservices[i].checked){
                    console.log(regservices[i].value);
                    valid = true;
                    break;
                }
            }
            if(valid){
                servicesError.innerHTML = '';
                return true;
            }else{
                $('#regServices').focus();
                servicesError.innerHTML = "Please select your gender!";
                return false;
            }
        }
        
        function validateRegEnquiry(){
            var reginquiry = document.getElementById('reginquiry').value;
            if(reginquiry.length == 0){
                $('#reginquiry').focus();
                inquiryError.innerHTML = "Inquiry filed is required !";
                return false
            }
            else{
                inquiryError.innerHTML = "";
                return true;
            }
        }

        function validateRegCV(){
            var regCV = document.getElementById('regCV').value;
            var allowedExtensions = /(\.doc|\.docx|\.odt|\.pdf|\.tex|\.txt|\.rtf|\.wps|\.wks|\.wpd)$/i;
            if(regCV.length == 0){
                cvError.innerHTML='Cv is required !'
                return false;
            }
            if(!allowedExtensions.exec(regCV)) {
                regCV.value = '';
                cvError.innerHTML='Invalid file type'
                return false;
            }else{
                cvError.innerHTML= "";
                return true;
            }
        }

        function validateRegisterForm(){
            if(!validateRegFname() || !validateRegPhone() || !validateRegEmail() || !validateRegState() ||
            !validateRegServices() || !validateRegEnquiry() || !validateRegCV()){
                return false;
                
            }else{
                document.register-form.submit();
            }
        }
    </script>
@endsection