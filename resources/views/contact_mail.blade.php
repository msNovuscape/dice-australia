
<style>
		.main-column{
			display:flex;
			width:100%;
		}
		.column-one{
			width:50%;
		}
	</style>


    <h1>Enquiry From Contact Form</h1>
    <br />
    <div class="main-column" style = "display:block; width:100%;">
      <div class="column-one" style = "display:block; width:100%;">
        <h3>Please, find out the contact details</h3>
        <b>Full Name:</b> {{ $full_name }}<br /><br />
        <b>Email:</b> {{ $email }}<br /><br />
        <b>Phone:</b> {{$phone}}<br /><br />
        @if(isset($service))
        <b>Service:</b> {{ $service }}<br /><br />
        @endif
        <b>Message:</b> {{ $contact_message }}<br /><br />
 
      </div>
    </div>

