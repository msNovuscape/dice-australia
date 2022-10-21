@extends("layout.app")
@section('title')
    <title>Contact</title> 
    <meta name="description" content="Based in VIC, Australia, Agility HomeCare is a practitioner of disability assistance services. We provide a variety of disability assistance services with the aim to improve the lives of people with impairments, limitations, and disabilities."/>
    <meta name="og:title" content="DICE"/>
    <meta name="og:image" content="{{url('frontend/images/about-image.png')}}"/>
@endsection
@section('content')
    <section class="contactus-section" style="background-image:url({{url('frontend/images/contact-bg.png')}})">
        {{--start loader--}}<div class="loader loader-default" id="loader"></div>{{--end loader--}}
            <div class="contactus-header">
                <h1>Contact Us</h1>
                <p>Contact us today to arrange free, no-obligation care consultation<br/> for you or your loved one.</p>
            </div>
            <div class="contactus-icons">
                <div class="contactus-email">
                    <div class="contactus-icon">
                        <i class="fa-solid fa-phone fa-lg"></i>
                    </div>
                    <div>
                        <a href="tel:1300 050 051">1300 050 051</a>
                    </div>
                </div>
                <div class="contactus-email">
                    <div class="contactus-icon">
                        <i class="fa-solid fa-envelope fa-lg"></i>
                    </div>
                    <div>
                        <a href="mailto:contact@dice.org.au">contact@dice.org.au</a>
                    </div>
                </div>
                <div class="contactus-location">
                    <div class="contactus-icon">
                        <i class="fa-solid fa-location-dot fa-lg"></i>
                    </div>
                    <div>
                        <a href="https://goo.gl/maps/p6uwRWci1KUSYjtg9"  target="-_blank" rel="noreferrer">Suite 132 & 133, Level 3, 10 Park Road Hurstville NSW 2220</a>
                    </div>
                </div>
            </div>
    </section>
    <section class="contact-form-section">
        <div class="row">
            <div class="col-md-6">
                <div class="form-header">
                    <h5>WE’RE HERE FOR YOU!</h5>
                    <h2>Talk to Us</h2>
                    <p>Please fill out the form below. Our caring, capable, knowledgeable team are ready and willing to answer any questions or concerns you may have and will get back to you shortly.</p>
                </div>
                <form class="contactus-form" action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                    </div>
                    <div class="mb-3">
                        <textarea name="" class="form-control" id="" cols="50" rows="5">Message</textarea>
                    </div>
                    <div class="">
                        <button class="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="dice-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.0069668805645!2d151.1031716767623!3d-33.96666042413612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b9bd323606ad%3A0x5c7d0c8b92f91e97!2s3%20Park%20Rd%2C%20Hurstville%20NSW%202220%2C%20Australia!5e0!3m2!1sen!2snp!4v1666328677294!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection