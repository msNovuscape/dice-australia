<style>
		.main-column{
			display:flex;
			width:100%;
		}
		.column-one{
			width:50%;
		}
		.column-two{
			width: 50%;
		}
		.column-three{
			width:50%;
		}
		.radio-list{
			list-style-type: none!important;
		}
		.radio-list li{
			list-style: none!important;
		}
		.radio-list li input{
			margin-right: 10px;
		}
		.column-four{
			width:100%
		}
		.form-table{
			width:100%
		}
		@media print{
			.main-column{
				display:block;
				width:100%;
			}
			
			.column-one{
				width:50%;
			}
			.column-two{
				width: 100%;
			}
			.column-three{
				width:100%;
			}
			.radio-list{
				list-style-type: none!important;
			}
			.radio-list li{
				list-style: none!important;
			}
			.radio-list li input{
				margin-right: 10px;
			}
			.column-four{
				width:100%
			}
			.form-table{
				width:100%
			}
		}
	</style>

    <h1>Referral Notice</h1>
    <br />
    <div class="main-column" style = "display:block; width:100%;">
      <div class="column-one" style = "display:block; width:100%;">
        <h3>PARTICIPANT DETAILS</h3>

        <b>Name:</b> {{ $name }}<br /><br />
        <b>Gender:</b> @if($gender == '1') Male @elseif($gender == '2') Female @else Other @endif <br /><br />
        <b>DOB:</b> {{ $dob }}<br /><br />
        <b>Email:</b> {{ $email }}<br /><br />
		<b>Mobile:</b> {{ $mobile_no }}<br /><br />
      </div>
      <div class="column-two" style = "display:block; width:100%;">
	  
        <h3>PARTICIPANT ADDRESS</h3>

        <b>Suburb:</b> {{ $suburb }}<br /><br />
        <b>State:</b> {{ $state }}<br /><br />
		<b>Street:</b> {{ $street_number }}<br /><br />
        <b>Post Code:</b> {{ $post_code }}<br /><br /><br />


	  @if($is_ndis == '1')

	  <div class="column-one" style = "display:block; width:100%;">
        <h3>NDIS DETAILS</h3>
        <b>NDIS Number:</b>{{$ndis_number}}<br /><br />
        <b>NDIS Expiry Date:</b>{{$ndis_expiry_date}}<br /><br />
        <b>NDIS Plan:</b> {{ config('custom.ndis_plan')[$ndis_plan] }}<br /><br />
      </div>
	  @endif
	  @if($services != null)
    <div class="column-one" style = "display:block; width:100%;">
      <h3>SERVICE DETAILS</h3>
      <b>Services:</b><br/>
      @foreach($services as $service)
      {{App\Models\Service::find($service)->name}}<br />
      @endforeach
	  @if($services_details != null)
      <b>Details:</b> {{$services_details}}<br /><br />
	  @endif
    </div>
	@endif

   <!-- @if($is_ndis == '1')-->

   <!-- <div class="column-two" style = "display:block; width:100%;">-->
   <!--   <h3>Enquirer Details</h3>-->
   <!--   <b>Fullname:</b> {{$referrer_full_name}}<br /><br />-->
   <!--   <b>Enquirer Contact:</b> {{$referrer_contact_no}}<br /><br />-->
	  <!--<b>Enquirer Email:</b> {{$email}}<br /><br />-->
   <!-- </div>-->
   <!-- </div>-->

   <!--     </div>-->
   <!-- @endif-->
    <!--@if($services != null)-->
    <!--    <div class="column-one" style = "display:block; width:100%;">-->
    <!--        <h3>SERVICE DETAILS</h3>-->
    <!--        <b>Services:</b><br/>-->
    <!--        @foreach($services as $service)-->
    <!--            {{App\Models\Service::find($service)->name}}<br />-->
    <!--        @endforeach-->
    <!--        @if($services_details != null)-->
    <!--            <b>Details:</b> {{$services_details}}<br /><br />-->
    <!--        @endif-->
    <!--    </div>-->
    <!--@endif-->


    <div class="column-two" style = "display:block; width:100%;">
        <h3>Referrer Details</h3>
        <b>Fullname:</b> {{$referrer_full_name}}<br /><br />
        <b>Contact:</b> {{$referrer_contact_no}}<br /><br />
    </div>
</div>
