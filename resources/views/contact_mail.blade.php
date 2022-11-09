
<style>
		.main-column{
			display:flex;
			width:100%;
		}
		.column-one{
			width:50%;
		}
	</style>

    <h1>@if($check !== '') Quick Enquiry Details @else Contact Details @endif </h1>
    <br />
    <div class="main-column" style = "display:block; width:100%;">
      <div class="column-one" style = "display:block; width:100%;">
        <h3>Please, find out the @if(($check !== '')) quick enquiry @else contact @endif details</h3>
        <b>Full Name:</b> {{ $full_name }}<br /><br />
        <b>Email:</b> {{ $email }}<br /><br />
        <b>Phone:</b> {{$phone}}<br /><br />
      
        <b>Message:</b> {{ $contact_message }}<br /><br />
 
      </div>
    </div>

