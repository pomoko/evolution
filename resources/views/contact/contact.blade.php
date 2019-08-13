@extends('layouts.master')
@section('سمفونی پیدایش', 'اطلاعات کتاب')

@section('content')

<div class="row">
  <div class="text-center col-xs-12">
    <h2>Contact Us</h2>
        <p>Please contact us for more information if you have any questions or inquiries.</p>
  </div>
</div>  

<div class="row">
  <div class="col-sm-6 col-xs-12">
<!--     <form id="main-contact-form" name="contact-form" method="post" action="/contact/sendMail">
 -->    
    <form id="contactForm" name="contactForm" method="post" action="{{url('/contact/sendMail')}}">
      {{csrf_field()}}
      <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="col-sm-6">
          <div class="form-group">
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required="required">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="subject" id='subject' class="form-control" placeholder="Subject" required="required">
      </div>
      <div class="form-group">
        <textarea name="content" id='content' class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
      </div>                        
      <div class="form-group">
        <button id="btnSendMails" type="submit" class="btn-submit">Send Now</button>
      </div>
    </form>   
  </div>
  <div class="col-sm-6 col-xs-12">
    <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
<!--                 <p>Please contact us for more information if you have any questions or inquiries.</p>
-->    <ul class="address">
        <li><i class="fa fa-map-marker"></i> Valve Industries Inc., 4 Slate Court D-2, Woodland Park, NJ, 07424 USA </li>
        <li><i class="fa fa-phone"></i> +1 973-284-0222  </li>
        <li><i class="fa fa-fax"></i> +1 973-320-8695 </li>
        <li><i class="fa fa-envelope"></i><!--  <span> Email:</span> --><a href="mailto:someone@yoursite.com"> info@valveindustries.com</a></li>
        <li><i class="fa fa-globe"></i> <a href="#">www.valveindustries.com</a></li>
      </ul>
    </div>                            
  </div>
</div>


@endsection