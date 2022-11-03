@extends('layout.app')
@section('title')
    <title>Referral Page</title>
    <meta name="description" content="Please read the form carefully and complete all the sections..">
    <meta name="robots" content="index, follow" />
    <meta property="og:url" content="https://www.qualityallied.com.au/referral" />
    <meta property="og:image" content="https://www.qualityallied.com.au/2c6dd918dca09f627fa632ba8977c6cc.png"/>
    <meta property="og:title" content="Referral Page"/>
    <meta property="og:description" content="Please read the form carefully and complete all the sections.."/>
@endsection
@section('content')
@php
          $msg =Session::get('msg') ?? null; 
        @endphp
    <section class="referral-section">
        <div class="container-fluid">
            <div class="referral-form">
                <form class="form-row" id="referral" onsubmit="return refferalValidation()" method="post" action = "{{url('/referral')}}">
                    <div class="row">
                        <div class="referralform-top">
                            <h1>REFERRAL</h1>
                            <p>Please read the form carefully and complete all the sections.</p>
                        </div>
                    </div>
                    <div class="card p-5 mt-5">
                        <div class='card-title'>
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <h1>PARTICIPANT DETAILS</h1>
                        </div>
                        <div class='card-body'>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input-first-name">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your Full Name" id="reffullname" onkeyup="validatereffname()" name="name" value="{{old('name')}}">
                                        <span id="ref-fname-error" class="error">
                                    </span>
                                    </div>
                                </div>
                                <div class='col-md-6 gender-radio'>
                                    <label>
                                        Gender
                                    </label>
                                    <div class="gender-checkbox" onclick="validategender()">
                                        <div class="form-check">
                                            <input class="form-check-input gender" type="radio" name="gender" value="1" {{(old('gender')=='1') ? 'checked':''}} id="gender">
                                            <label class="form-check-label">
                                                Male
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input gender" type="radio" name="gender" value="2" {{(old('gender')=='2') ? 'checked':''}} id="gender"/>
                                            <label class="form-check-label">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input gender" type="radio" name="gender" value="3" {{(old('gender')=='3') ? 'checked':''}} id="gender"/>
                                            <label class="form-check-label">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    <span id="ref-gender-error" class="error"></span>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input  type="email" class="form-control" placeholder="Enter your E-mail Address" name="email" value="{{old('email')}}"  id="refemail" onkeyup="validaterefemail()"/>
                                        <span id="ref-email-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control getDate" placeholder="Select your date of birth" name="dob" value="{{old('dob')}}" id="refdob" onkeyup="validaterefdob()"/>
                                        <span id="ref-dob-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_no" placeholder="Enter your Mobile Number" id="refmobnum" value = "{{old('mobile_no')}}" onkeyup="validaterefmob()"/>
                                        <span id="ref-mobile-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Preferred Language</label>
                                        <input type="text" class="form-control" name="preferred_language" placeholder="Enter your Preferred Language" id="reflanguage" value="{{old('preferred_language')}}" onkeyup="validatereflang()"/>
                                        <span id="ref-language-error" class="error"></span>
                                    </div>
                                </div>

                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Participant have a current NDIS plan?</label>
                                        <select onchange = "show(this.value)" class="form-select form-control" aria-label="Default select example" name = "is_ndis" id ="is_ndis">
                                        <option value="0" {{(old('is_ndis') == '0') ? 'selected' : ''}}>No</option>

                                          <option value = "1" {{(old('is_ndis')=='1') ? 'selected':''}}>Yes</option>
                                        </select>
                                        <div id="language-error" class="error">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Start of NDIS Plan Block -->
                            <div class="row hideandshow" id = "ndis">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="Ndis-number">Enter your NDIS Number</label>
                                        <input type="text" class="form-control" placeholder="Enter your NDIS number" value="{{old('ndis_no')}}" name="ndis_number">
                                        <span id="fname-error" class="error">
                                    </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="expiry-date">Choose Expiry Date</label>
                                        <input type="date" class="form-control" placeholder="Choose Expiry Date" value="{{old('ndis_expiry_date')}}" name="ndis_expiry_date">
                                        <span id="fname-error" class="error">
                                    </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="ndis plan">Choose NDIS Plan</label>
                                        <select class="form-select form-control" aria-label="" name = "ndis_plan">
                                        @foreach(config('custom.ndis_plan') as $index => $value)
                                            <option value="{{$index}}" {{(old('ndis_plan')==$index) ? 'selected':''}}>{{$value}}</option>
                                        @endforeach
                                        
                                        </select>
                                        <span id="date-error" class="error">
                                    </span>
                                    </div>
                                </div>

                            </div>
                            <!-- End of NDIS Plan Block -->
                        </div>
                    </div>
                    <div class="card mt-4 p-5">
                        <div class='card-title'>
                            <div>
                                <i class="fa-solid fa-house-chimney"></i>
                            </div>
                            <h1>PARTICIPANT ADDRESS</h1>
                        </div>
                        <div class='card-body'>
                            <div class="row g-4">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Unit Number</label>
                                        <input type="text" class="form-control" placeholder="Enter your Unit Number" name='unit_number' value="{{old('unit_number')}}"  id="refunitNum" onkeyup="validaterefUnit()"/>
                                        <span id="ref-unit-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Street Number</label>
                                        <input type="text" class="form-control" placeholder="Enter your Street Number" name='street_number' value="{{old('street_number')}}"  id="refstreetNum" onkeyup="validaterefStreet()"/>
                                        <span id="ref-streetnum-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Suburb</label>
                                        <input type="text" class="form-control" placeholder="Enter your Suburb" name='suburb' value="{{old('suburb')}}"  id="refsuburb" onkeyup="validaterefSuburb()"/>
                                        <span id="ref-suburb-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>State / Province / Region </label>
                                        <input type="text" class="form-control" placeholder="Enter state" name='state_name' value="{{old('state_name')}}"  id="refstateName" onkeyup="validaterefState()"/>
                                        <span id="ref-statename-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control getDate" placeholder="Enter Postal Code" name="postalcode" value="{{old('postalcode')}}" id="refpostalcode" onkeyup="validaterefPostal()"/>
                                        <span id="ref-postalcode-error" class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4 p-5">
                        <div class='card-title'>
                            <div>
                                <i class="fa-solid fa-gear"></i>
                            </div>
                            <h1>SERVICES DETAILS</h1>
                        </div>
                        <div class='card-body'>
                            <div class="row g-4">
                                <div class='col-md-12'>
                                    <label>
                                        Services Required
                                    </label>
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
                                <div class='col-md-12'>
                                    <div class="form-group">
                                        <label for="input-last-name">Provide details related to services </label>
                                        <textarea class="form-control textarea" name="services_details" placeholder="Provide details related to services" rows="5" cols="50" id="refdetails" onkeyup="validaterefdetails()">{{old('details_services')}}</textarea>
                                        <span id="ref-detailservices-error" class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4 p-5">
                        <div class='card-title'>
                            <div>
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <h1>REFERRER DETAILS</h1>
                        </div>
                        <div class='card-body'>
                            <div class="row g-4">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="input-first-name">Full Name</label>
                                        <input type="text" class="form-control" name="referrer_full_name" value="{{old('referrer_full_name')}}" placeholder="Enter Full Name" id="refdetfname" onkeyup="validatereffullname()"/>
                                        <span id="ref-fullname-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="input-last-name">Contact number</label>
                                        <input type="text" class="form-control" name="referrer_contact_no" value="{{old('referrer_contact_no')}}" placeholder="Enter Contact Number"  id="refdetcontact" onkeyup="validaterefcontact()"/>
                                        <span id="ref-contact-error" class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='privacy-section mt-5'>
                        <div class='card p-5'>
                            <div class='card-title'>
                                <h1>Privacy Statement and Declaration</h1>
                            </div>
                            <div class='card-body'>
                                <p class='declare-text'>I declare that the information provided is, to the best of my understanding and knowledge, complete and correct. I understand that Extratech Pty. Ltd may perform random checks on the information I have provided, and I may be asked to provide evidence to verify the information in this form. I am aware that there are severe penalties for providing false or misleading information. I understand and acknowledge that there may be a need for the company to share my information with a third party, such as agencies, social medias, government bodies etc. I give my permission for the company to supply any relevant official records and my personal information when it is required for the delivery of services by Extratech Pty. Ltd.</p>
                                <div class='row'>
                                    <div class="col">
                                        <div class='form-check'>
                                            <input class="form-check-input" type="checkbox" id="refagree" name="privacy" value="1" onclick="validaterefprivacy()"/>
                                            <label class="form-check-label">
                                                I accept the Privacy Policy
                                            </label>
                                        </div>
                                        <span id="ref-privacy-error" class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row next-button'>
                            <div class='col-md-12 text-center'>
                                <button type="submit" class='next-submit'>Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    var element = document.getElementById('ndis');
     function show(value){

        if(value == '1'){
            element.classList.remove('hideandshow');
        }else{
            element.classList.add('hideandshow');
        }
    }
    if(document.getElementById('is_ndis').value == "1") {
        element.classList.remove('hideandshow');
    }
    var php_var = "<?php echo $msg; ?>";
        if(php_var.length !== 0){
              Swal.fire({
                  title: 'Submitted!!',
                  text: php_var,
                  icon: 'success'
              })
        }

    // participant detail declaration    
    var fullnameError = document.getElementById('ref-fname-error');
    var genderError = document.getElementById('ref-gender-error');
    var emailError = document.getElementById('ref-email-error');
    var dobError = document.getElementById('ref-dob-error');
    var mobError = document.getElementById('ref-mobile-error');
    var languageError = document.getElementById('ref-language-error');

    // address declaration
    var unitError = document.getElementById('ref-unit-error');
    var streetError = document.getElementById('ref-streetnum-error');
    var suburbError = document.getElementById('ref-suburb-error');
    var stateError = document.getElementById('ref-statename-error');
    var postalError = document.getElementById('ref-postalcode-error');

    var detailError = document.getElementById('ref-detailservices-error');

    // referrer details declaration
    var refnameError = document.getElementById('ref-fullname-error');
    var refcontactError = document.getElementById('ref-contact-error');

    // privacy declaration
    var privacyError = document.getElementById('ref-privacy-error');
    
    function validatereffname(){
        var fullname = document.getElementById('reffullname').value;
        if(fullname.length == 0){
            $('#reffullname').focus();
            fullnameError.innerHTML = "Full Name is required";
            return false;
        }else{
            fullnameError.innerHTML = "";
            return true;
        }
    }

    function validaterefemail(){
        var email = document.getElementById('refemail').value;
        if(email.length == 0){
            $('#refemail').focus();
            emailError.innerHTML = "Email is required";
            return false;
        }else{
            emailError.innerHTML = "";
            return true;
        }
    }

    function validategender(){
        var valid = false;
        // var gender = document.referral.gender;
        var gender = document.getElementsByClassName("gender");
        for(var i=0;i<gender.length;i++){
            if(gender[i].checked){
                console.log(gender[i].value);
                valid = true;
                break;
            }
        }

        if(valid){
            genderError.innerHTML = '';
            return true;
        }else{
            $('#gender').focus();
            genderError.innerHTML = "Please select your gender!";
            return false;
        }
    }

    function validaterefdob(){
        var dob = document.getElementById('refdob').value;
        if(dob.length == 0){
            $('#refdob').focus();
            dobError.innerHTML = "Date of Birth is required";
            return false;
        }else{
            dobError.innerHTML = "";
            return true;
        }
    }

    function validaterefmob(){
        var mob = document.getElementById('refmobnum').value;
        if(mob.length == 0){
            $('#refmobnum').focus();
            mobError.innerHTML = "Mobile Number is required";
            return false;
        }
        if(!mob.match(/^\d{10}$/)){
            mobError.innerHTML = "Please provide valid 10 digit number";
            return false;
        }
        else{
            mobError.innerHTML = "";
            return true;
        }
    }

    function validatereflang(){
        var language = document.getElementById('reflanguage').value;
        if(language.length == 0){
            $('#reflanguage').focus();
            languageError.innerHTML = "Language is required";
            return false;
        }else{
            languageError.innerHTML = "";
            return true;
        }
    }

    function validaterefUnit(){
        var unit = document.getElementById('refunitNum').value;
        if(unit.length == 0){
            $('#refunitNum').focus();
            unitError.innerHTML = "Unit is required";
            return false;
        }else{
            unitError.innerHTML = "";
            return true;
        }
    }

    function validaterefStreet(){
        var street = document.getElementById('refstreetNum').value;
        if(street.length == 0){
            $('#refstreetNum').focus();
            streetError.innerHTML = "Street Number is required";
            return false;
        }else{
            streetError.innerHTML = "";
            return true;
        }
    }

    function validaterefSuburb(){
        var suburb = document.getElementById('refsuburb').value;
        if(suburb.length == 0){
            $('#refsuburb').focus();
            suburbError.innerHTML = "Suburb is required";
            return false;
        }else{
            suburbError.innerHTML = "";
            return true;
        }
    }

    function validaterefState(){
        var state = document.getElementById('refstateName').value;
        if(state.length == 0){
            $('#refstateName').focus();
            stateError.innerHTML = "State is required";
            return false;
        }else{
            stateError.innerHTML = "";
            return true;
        }
    }

    function validaterefPostal(){
        var postal = document.getElementById('refpostalcode').value;
        if(postal.length == 0){
            $('#refpostalcode').focus();
            postalError.innerHTML = "Postal Code is required";
            return false;
        }else{
            postalError.innerHTML = "";
            return true;
        }
    }

    function validaterefdetails(){
        var details = document.getElementById('refdetails').value;
        if(details.length == 0){
            $('#refdetails').focus();
            detailError.innerHTML = "Details of Services is required";
            return false;
        }else{
            detailError.innerHTML = "";
            return true;
        }
    }

    function validatereffullname(){
        var refname = document.getElementById('refdetfname').value;
        if(refname.length == 0){
            $('#refdetfname').focus();
            refnameError.innerHTML = "Full Name is required";
            return false;
        }else{
            refnameError.innerHTML = "";
            return true;
        }
    }

    function validaterefcontact(){
        var refcontact = document.getElementById('refdetcontact').value;
        if(refcontact.length == 0){
            $('#refdetcontact').focus();
            refcontactError.innerHTML = "Contact Number is required";
            return false;
        }
        if(!refcontact.match(/^\d{10}$/)){
            refcontactError.innerHTML = "Please provide valid 10 digit number";
            return false;
        }
        else{
            refcontactError.innerHTML = "";
            return true;
        }
    }

    function validaterefprivacy(){
        var privacy = document.getElementById('refagree').checked;
        if(privacy == false){
            $('#refagree').focus();
            privacyError.innerHTML = "Please accept the privacy policy";
            return false;
        }else{
            privacyError.innerHTML = "";
            return true;
        }
    }
    
    function refferalValidation(){
        if(!validatereffname() || !validategender() || !validaterefemail() || !validaterefdob() || !validaterefmob() || !validatereflang() ||
        !validaterefUnit() || !validaterefStreet() || !validaterefSuburb() || !validaterefState() || !validaterefPostal() ||
        !validaterefdetails() || !validatereffullname() || !validaterefcontact() || !validaterefprivacy()){
            return false;
        }else{
            return true;
        }
    }
    </script>
@endsection