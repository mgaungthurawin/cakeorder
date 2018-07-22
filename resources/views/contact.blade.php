
@extends('layouts.app')

@section('content')

    @include('layouts.head')

    <div class="contentforlayout">
      <!-- Title Page -->
		<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image:url(//cdn.shopify.com/s/files/1/2672/5778/t/2/assets/contact_top.jpg?11913792801428458729);" >
		  <h2 class="l-text2 t-center">
		    contact
		  </h2>
		</section>
		<!-- content page -->
		<section class="bgwhite p-t-66 p-b-60">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-6 p-b-30">
		        <div class="p-r-20 p-r-0-lg">
		          <div class="contact-map size21">


		          	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.3267679988917!2d96.12946621505837!3d16.810137788426918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb481bf84321%3A0xe00fc78253552ce8!2sUnnamed+Road%2C+Yangon!5e0!3m2!1sen!2smm!4v1532076280438" width="100%" height="503" frameborder="0" style="border:0" allowfullscreen></iframe>
		            
		          </div>
		        </div>
		      </div>
		      	<div class="col-md-6 p-b-30 leave-comment">
		      		@include('flash::message')

		        	<form method="post" action="/send" id="contact_form" accept-charset="UTF-8" class="contact-form">
		        		{{csrf_field()}}
		        	<input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />
			        <h4 class="m-text26 p-b-36 p-t-15">Send us your message</h4>
			        <div class="bo4 of-hidden size15 m-b-20">
			          	<input type="text" id="contactFormName" name="contact[name]" class="sizefull s-text7 p-l-22 p-r-22" placeholder="Name" value="" />
			        </div>
			        <div class="bo4 of-hidden size15 m-b-20">
			          	<input type="text" id="contactFormEmail" name="contact[email]" class="sizefull s-text7 p-l-22 p-r-22" placeholder="Email" autocorrect="off" autocapitalize="off" value="" />
			        </div>
			        <div class="bo4 of-hidden size15 m-b-20">
			          	<input type="text" id="contactFormPhone" name="contact[phone]" class="sizefull s-text7 p-l-22 p-r-22" placeholder="Phone" value="" />
			        </div>
			        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" id="contactFormMessage" name="contact[body]" placeholder="Message"></textarea>
			        <div class="w-size25">
			          	<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
			            	Send
			          	</button>
			        </div>
			        </form>  
		      		</div>
		    	</div>
		  	</div>
		</section>

@include('layouts.footer')
@endsection



