@extends('layouts.masterEng')
@section('Symphony of Evolution', 'Contact Us')

@section('content')

<div class="row">
  <div class="text-center col-xs-12">
    <h2>Contact the Writer</h2>
        <p>You may use this form to contact the author of this book directly.</p>
        <p>The contents of your message will be kept private and confidential between you and the author.</p>
  </div>
</div>  

<div class="row">
  <div class="col-sm-6 col-xs-12">
<!--     <form id="main-contact-form" name="contact-form" method="post" action="/contact/sendMail">
 -->    


 
   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif

    <form id="contactForm" name="contactForm" method="post" action="{{url('/contact/sendMail')}}"  enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="lang" value="en">
      <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" requiredd="required" value="{{ old('name') }}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Your Email Address" requiredd="required" value="{{ old('email') }}">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id='subject' class="form-control" placeholder="Message Subject" requiredd="required"  value="{{ old('subject') }}">
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea name="message" id='message' class="form-control" rows="4" placeholder="Your Message" requiredd="required">{{ old('message') }}</textarea>
      </div>     

      <div class="form-group">
        <label for="file">File Attachment (Only JPG, JPEG, PNG, PDF - Max Size 4MB):</label>
        <input type="file" class="form-control" name="file"  value="{{ old('file') }}">
      </div>                   
      <div class="form-group">
        <button id="btnSendMails" type="submit" class="btn-submit">Send</button>
      </div>
    </form>   


  </div>
  <div class="col-sm-6 col-xs-12">
    <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
<!--                 <p>Please contact us for more information if you have any questions or inquiries.</p>
-->    <ul class="address">
        <li><i class="fa fa-map-marker"></i> P.O. Box 15875-5754, Tehran, Iran</li>
        <li><i class="fa fa-envelope"></i> <a href="mailto:info@symphonyofevolution.com"> info@symphonyofevolution.com</a></li>
        <li><i class="fa fa-globe"></i> <a href="/eng">www.symphonyofevolution.com</a></li>
      </ul>
    </div>                            
  </div>
</div>


@endsection