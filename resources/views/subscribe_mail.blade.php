
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
		@media print{
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



    <h1>Subscription Notice</h1>
    <br />
    <div class="main-column">
      <div class="column-one">
       
        <b>Name:</b> {{ $name }}<br /><br />
		<b>Email:</b> {{ $email }}<br /><br />
      </div>
    </div>
 

