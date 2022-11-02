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
    <section class="referral-section">
        <div class="container-fluid">
            <div class="referral-form">
                <form class="form-row" method="post" action = "/referral">
                @csrf
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
                                        <input type="text" class="form-control" placeholder="Enter your First Name" id="fname" onkeyup="validatefname()" name="name" value="{{old('name')}}">
                                        <span id="fname-error" class="error"></span>
                                    </span>
                                    </div>
                                </div>
                                <div class='col-md-6 gender-radio'>
                                    <label>
                                        Gender
                                    </label>
                                    <div class="gender-checkbox">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="1" {{(old('gender')=='1') ? 'checked':''}} id="gender">
                                            <label class="form-check-label">
                                                Male
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="2" {{(old('gender')=='2') ? 'checked':''}} id="gender"/>
                                            <label class="form-check-label">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="3" {{(old('gender')=='3') ? 'checked':''}} id="gender"/>
                                            <label class="form-check-label">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    <div id="gender-error" class="error">

                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input  type="email" class="form-control" placeholder="Enter your E-mail Address" name="email" value="{{old('email')}}"  id="email"/>
                                        <span id="email-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control getDate" placeholder="Select your date of birth" name="dob" value="{{old('dob')}}" id="dob" />
                                        <span id="dob-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile_no" placeholder="Enter your Mobile Number" id="mobnum" value = "{{old('mobile_no')}}"/>
                                        <span id="mobile-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Preferred Language</label>
                                        <input type="text" class="form-control" name="preferred_language" placeholder="Enter your Preferred Language" id="resaddress" value="{{old('preferred_language')}}"/>
                                        <span id="language-error" class="error"></span>
                                    </div>
                                </div>

                                <div class='col-md-4'>
                                    <div class="form-group">
                                        <label>Participant have a current NDIS plan?</label>
                                        <select onchange = "show(this.value)" class="form-select form-control" aria-label="Default select example" name = "is_ndis" id ="is_ndis">
                                        <option value="0" {{(old('is_ndis') == '0') ? 'selected' : ''}}>No</option>

                                          <option value = "1" {{(old('is_ndis')=='1') ? 'selected':''}}>Yes</option>
                                        </select>
                                        <span id="ndis-plan-error" class="error"></span>
                                    </div>
                                </div>

                            </div>
                            <!-- Start of NDIS Plan Block -->
                            <div class="row hideandshow" id = "ndis">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="Ndis-number">Enter your NDIS Number</label>
                                        <input type="text" class="form-control" placeholder="Enter your NDIS number" value="{{old('ndis_no')}}" name="ndis_number">
                                        <span id="ndis-number-error" class="error"></span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="expiry-date">Choose Expiry Date</label>
                                        <input type="date" class="form-control" placeholder="Choose Expiry Date" value="{{old('ndis_expiry_date')}}" name="ndis_expiry_date">
                                        <span id="expiry-date-error" class="error"></span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="ndis plan">Choose NDIS Plan</label>
                                        <select class="form-select form-control" aria-label="" name = "ndis_plan">
                                        <option value="" selected disabled>Please Select Plan</option>
                                            <option value="index" selected>test</option>
                                        
                                        </select>
                                        <span id="ndis-plan-error" class="error"></span>
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
                                        <input type="text" class="form-control" placeholder="Enter your Unit Number" name='unit_number' value="{{old('unit_number')}}"  id="unitNum" required/>
                                        <span id="unit-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Street Number</label>
                                        <input type="text" class="form-control" placeholder="Enter your Street Number" name='street_number' value="{{old('street_number')}}"  id="streetNum" required/>
                                        <span id="streetnum-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Street Name</label>
                                        <input type="text" class="form-control getDate" placeholder="Select your date of Street Name" name="street_name" value="{{old('street_name')}}" id="passexp" required/>
                                        <span id="street-name-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Suburb</label>
                                        <input type="text" class="form-control" placeholder="Enter your Suburb" name='suburb' value="{{old('suburb')}}"  id="suburb" required/>
                                        <span id="suburb-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>State / Province / Region </label>
                                        <input type="text" class="form-control" placeholder="Enter state" name='state_name' value="{{old('state_name')}}"  id="stateName" required/>
                                        <span id="statename-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control getDate" placeholder="Enter Postal Code" name="postalcode" value="{{old('postalcode')}}" id="postalcode" required/>
                                        <div id="postalcode-error" class="error"></div>
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
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="serviceid" name = "services[]" value="service-id">
                                            <label class="form-check-label" for="serviceid">servicename</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Speech Theraphy</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">Positive Behaviour Support</label>
                                        </div>
                                    </div>
                                    <span id="service-error" class="error"></span>
                                </div>
                                <div class='col-md-12'>
                                    <div class="form-group">
                                        <label for="input-last-name">Provide details related to services </label>
                                        <textarea class="form-control textarea" name="services_details" placeholder="Provide details related to services" rows="5" cols="50">{{old('details_services')}}</textarea>
                                        <span id="detailservices-error" class="error"></span>
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
                                        <input type="text" class="form-control" name="referrer_full_name" value="{{old('referrer_full_name')}}" placeholder="Enter Full Name" id="fullname" onkeyup="validatefullname()"/>
                                        <span id="fullname-error" class="error"></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="input-last-name">Contact number</label>
                                        <input type="number" class="form-control" name="referrer_contact_no" value="{{old('referrer_contact_no')}}" placeholder="Enter Contact Number"  id="contact" onkeyup="validatecontact()"/>
                                        <span id="contact-num-error" class="error"></span>
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
                                            <input class="form-check-input" type="checkbox" id="agree" name="privacy" value="1" required  />
                                            <label class="form-check-label">
                                                I accept the Privacy Policy
                                            </label>
                                        </div>
                                        <span id="privacy-error" class="error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row next-button'>
                            <div class='col-md-12 text-center'>
                                <button class='next-submit' type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
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
    </script>
@endsection

