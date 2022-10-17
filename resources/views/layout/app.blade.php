<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="{{url('frontend/images/favicon.png')}}">

    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- google fonts link -->
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- slick slider link -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"/>

    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}"/>
    <!-- fontawesome link -->
    @yield('title')
</head>
<body>
<!-- Top section -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container-fluid d-flex justify-content-center justify-content-md-between">
        <div class="contact-info">
            <div>
                <img src="{{url('frontend/icons/phone-call.svg')}}" class="img-fluid"/>
                <span><a href="tel: 1300 050 051" class="text-decoration-none text-white ">1300 050 051</a></span></i>
            </div>

            <div>
                <img src=" {{url('frontend/icons/email.svg')}}" class="img-fluid"/>
                <span><a href="mailto: contact@dice.org.au" class="text-decoration-none text-white">contact@dice.org.au</a></span></i>
            </div>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> -->
            <a href="https://www.facebook.com/profile.php?id=100069618114233" target="_blank" class="facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/explore/tags/taxmateaustralia/" target="_blank" class="instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.instagram.com/explore/tags/taxmateaustralia/" target="_blank" class="linkdin"><i class="fa-brands fa-linkedin"></i></a>
            <a>Help</a>
            <!-- Button trigger modal -->
            <a type="button" class="quick-enq-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Quick enquiry
            </a>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Quick Enquiry</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-detail">
                            <form onsubmit="return validateform()" method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="app-fname" name="full_name" placeholder="Patient full name" value="" onkeyup="validatefullname()">
                                        <span class="error-msg" id="app-fname-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="app-phonenumber" placeholder="Phone" name="phone" value="" onkeyup="validatephone()">
                                        <span class="error-msg" id="app-phone-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" id="app-getemail" placeholder="Email" name="email" value="" onkeyup="validateemail()">
                                        <span class="error-msg" id="app-email-error"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" class="form-control" id="app-date" placeholder="Choose the date" aria-label="Date" value="" name="date" onkeyup="validateDate()">
                                        <span class="error-msg" id="app-date-error"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <textarea type="text" class="form-control" id="getmessage" placeholder="Explain your problem" name="app-message" value="" onkeyup="validatemessage()"></textarea>
                                        <span class="app-error-msg" id="message-error"></span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="modal-close-btn" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="modal-submit-btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
        </div>
    </div>
</section>
<!-- Top section -->
<!-- Header section -->
<header class="header">
    <a class="navbar-brand" href="/">
        <img src="" class="img-fluid"  alt="">
    </a>
    <ul class="nav nav-inner navbar-list" id="navigation-links">
        <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Our services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href=""></a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/events-blogs">NDIS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">Make a Referal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">Contact us </a>
        </li>
    </ul>
    <div class="mobile-navbar-btn">
        <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
        <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
    </div>
</header>

{{-- content section --}}
    @yield('content')
{{--  content section --}}
<!-- footer section -->
<section class='footer'>
    <div class='row footer-top'>
        <div class='col-md-12 text-center'>
            <img src='{{url("frontend/images/white-logo.png")}}' class="img-fluid">
        </div>
    </div>
    <div class="row footer-details">
        <div class="col-md-4">
            <div class="foot-location">
                <img src="{{url('frontend/icons/location.svg')}}"/>
                <span>Suite 614, 343, Little Collins Street, Melbourne, VIC 3000</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="foot-location">
                <img src="{{url('frontend/icons/phone.svg')}}"/>
                <a href="tel: 1300 050 051">1300 050 051</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="foot-location">
                <img src="{{url('frontend/icons/email.svg')}}"/>
                <a href="mailto: contact@dice.org.au">contact@dice.org.au</a>
            </div>
        </div>
    </div>
    <div class="booton-section">
        <div class="bootom-nav">
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="/about">About us</a></li>
                <li><a href="/service">Services</a></li>
                <li><a href="/referal">Make a Referal</a></li>
                <li><a href="/contact">Contact us</a></li>
            </ul>
        </div>
        <div class="bottom-footer">
            <p>ABN : 97654871011</p>
            <p>NDIS : 4050102564</p>
            <p>DICE © 2022. All Rights Reserved.</p>
            <p><a href='/disclaimer'>Disclaimer</a>  |  <a href='/privacy'>Privacy Policy</a></p>
            <p>Designed & Developed By: <a href="www.extratechs.com.au">Extratech</a></p>
        </div>
    </div>
</section>
<!-- footer section end-->
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Bootstrap link -->

<!-- jquery link -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<!-- jquery link -->

<!-- fontawesome link -->
<script src="https://kit.fontawesome.com/794cc97646.js" crossorigin="anonymous"></script>

<!-- ionicons link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- slick slider link -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- hamburger link -->
<script type="text/javascript" src="{{url('frontend/js/index.js')}}"></script>
@yield('script')
</body>
</html>
