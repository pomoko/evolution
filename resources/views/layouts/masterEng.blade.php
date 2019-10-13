<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>سمفونی پیدایش - @yield('title')</title>
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('css/animate.min.css')}} rel="stylesheet"> 
    <link href={{asset('css/font-awesome.min.css')}} rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href={{asset("css/lightbox.css")}} rel="stylesheet">
    <link href={{asset("css/main.css")}} rel="stylesheet">
    <link id="css-preset" href={{asset('css/presets/employer.css')}} rel="stylesheet">
    <link href={{asset("css/responsive.css")}} rel="stylesheet">
<!--     <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/iranian-sans" type="text/css"/>
 -->
      
    <style type="text/css">
      @font-face {
        font-family: "irsans";
        src: url({{asset('fonts/irsans.ttf')}});
      }
      
      body{
        font-family: 'irsans'; 
        font-weight: normal; 
        font-style: normal;
      }




      .form-group input, .form-group select, .form-group textarea  {
        border: 1px solid #bdbdbd;
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
      }
    </style>


    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/favicon.ico">
  </head><!--/head-->


  <!-- Message Modal -->
  <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Method of Purchase</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              In Iran
            </a>
            <a href="#" class="list-group-item list-group-item-action">Bookstores</a>
            <a href="#" class="list-group-item list-group-item-action">Internet Shopping</a>
          </div>

          <hr/>


          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              Other Countries
            </a>
            <a href="#" class="list-group-item list-group-item-action">A</a>
            <a href="#" class="list-group-item list-group-item-action">B</a>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" id="btnCancelMessage" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div><!--message modal-->

  <!-- Price Modal -->
  <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">سفارش شما به شرح زیر است.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              خرید اعتبار برای:
            </div>
            <div id="selectedDuration" class="col-md-6 col-sm-12 text-info">
            </div>
          </div>
          <hr/>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              مبلغ قابل پرداخت:
            </div>
            <div class="col-md-6 col-sm-12 text-info">
              <span id="selectedPrice"></span> تومان
            </div>
          </div>
          <hr/>
          <form action="/action_page.php">
            <div class="form-group">
              <label for="mobile">شماره ای که با آن در سامانه همراه کارجیب ثبت نام کرده اید:</label>
              <input class="form-control" id="mobileNumber" placeholder="شماره موبایل (باید با ۰۹ آغاز شود)" maxlength="11" name="mobile" required>
            </div>

          </form>
          <hr/>
          <div class="row hidden" id="userNameRow">
            <div class="col-md-6 col-sm-12">
              نام کاربر
            </div>
            <div id="userName" class="col-md-6 col-sm-12">

            </div>
          </div>

          <div id="mobileNotRegisteredMessage" class="row hidden">
            <div class="col-sm-12 alert alert-danger" role='alert'>
                شماره وارد شده در سامانه موجود نیست. برای ثبت نام, ابتدا سامانه همراه کارجیب را درون تلفن موبایل خود نصب نمایید.  
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" id="btnCancelPayment" class="btn btn-secondary">لغو</button>
          <button type="button" id="btnVerifyMobileNumber" class="btn btn-primary">استعلام شماره موبایل</button>
          <button type="button" id="btnProceedToPayment" class="btn btn-success submitPayment hidden">ادامه به درگاه پرداخت</button>
        </div>
      </div>
    </div>
  </div><!--message modal-->


  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Message Delivered Successfully</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary submitEmail" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div><!--message success-->
  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
<!--     <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div id="carousel-sm-up" class="item active" style="background-image: url(images/slider/1.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><span>کارجیب</span></h1>
            <p class="animated fadeInRightBig">استخدام به شیوه هوشمند و نوین</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">بیشتر بدانید</a>
          </div>
        </div>
        <div id="carousel-xs"  class="item active" style="background-image: url(images/slider/1xs.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><span>کارجیب</span></h1>
            <p class="animated fadeInRightBig">استخدام به شیوه هوشمند و نوین</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">بیشتر بدانید</a>
          </div>
        </div>
      </div>


      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div>
  --> 
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle toggle-left" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden" href="/">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-left">                 
            <li class="scroll "><a href="/eng">Home</i></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Book Information<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/eng/info/bookInfo">Book Info</a></li>
                <li><a href="/eng/info/contents">Table of Contents</a></li>
                <li><a href="/eng/info/articles">Sample Articles</a></li>
                <li><a href="/eng/info/references">References</a></li>
              </ul>
            </li>
            <li class="scroll"><a href="/eng/reviews">Book Reviews</a></li>  
            <li class="scroll"><a href="/eng/comments">Readers' Comments</a></li>  
            <li class="scroll"><a href="/eng/contact">Contact Author</a></li>
            <li class="scroll"><a href="/">فارسی</a></li>
<!--             <li class="scroll"><a href="#portfolio">برخی از کارفرمایان</a></li>  -->
<!--             <li class="scroll"><a href="#blog">Blog</a></li> -->

          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <!--sticky social icons-->
    <div class="social-icons-container-en">
      <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
      <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
      <a href="https://www.instagram.com/symphonyofevolutionbook/?hl=en" class="instagram"><i class="fa fa-instagram"></i></a> 
    </div>
    
        <div class="container">
            @yield('content')
        </div>
  </body>


  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="/"><img class="img-responsive" src="images/logo.png" alt=""></a>
        </div>
      </div>
      <div class="container text-center hidden">
        <div class="footer-logo">
                <ul class="address">
<!--                   <li><i class="fa fa-map-marker"></i> <span> آدرس:</span>خیابان جمهوری, نرسیده به بهارستان, خیابان ملت, پلاک ۱۰, زنگ ۳</li>
 -->
<!--                   <li><i class="fa fa-map-marker"></i> <span> آدرس:</span>ولی  عصر, خیابان کاج آبادی, پلاک ۷۲, زنگ ۱,  کد پستی ۱۹۶۶۹۱۳۶۶۱</li>
                  <li><i class="fa fa-phone"></i> <span> تلفن:</span> ۹۴۸۶ ۲۲۰۵ ۲۱ ۹۸+</li>
                  <li><i class="fa fa-envelope"></i> <span>ایمیل: </span>info@karjib.com</li> -->
                </ul>
        </div>
      </div>
    </div>
<!--     <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <img id='jxlzesgtnbqewlaoapfuoeukoeuk' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1024588&p=rfthobpduiwkaodsdshwmcsimcsi", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=1024588&p=nbpdlymaodrfshwlujynaqgwaqgw'/>
          <img src="https://trustseal.enamad.ir/logo.aspx?id=111454&amp;p=yJnt0FvuyzdVLuzQ" alt="" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=111454&amp;p=yJnt0FvuyzdVLuzQ&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" style="cursor:pointer" id="yJnt0FvuyzdVLuzQ">
          <img src="images/ecunion.png" alt="" onclick="window.open('https://ecunion.ir/verify/karjib.com?token=35352085c640cb744c15', 'Popup','toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30')" style="cursor:pointer">
        </div>
      </div>
    </div> -->
    <div class="footer-bottom">

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p class="pull-left"></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="stickyBtns" class="container-fluid">
    <div id='addCommentBtn' class="row hidden">

      <div class="col-xs-12 col-md-4 col-md-offset-4 text-center visible-xs-block">
        <button type="button" class="btn btn-lg btn-block btn-success" data-toggle="modal" data-target="#addCommentModal">Write Your Comments</button>

      </div>

    </div>
    <div class="row">

      <div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
        <button type="button" class="btn btn-lg btn-block btn-warning" data-toggle="modal" data-target="#buyModal">Buy Now</button>

      </div>

    </div>
  </div>


  <script type="text/javascript" src={{asset("js/jquery.js")}}></script>
  <script type="text/javascript" src={{asset("js/bootstrap.min.js")}}></script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src={{asset("js/jquery.inview.min.js")}}></script>
  <script type="text/javascript" src={{asset("js/wow.min.js")}}></script>
  <script type="text/javascript" src={{asset("js/mousescroll.js")}}></script>
  <script type="text/javascript" src={{asset("js/smoothscroll.js")}}></script>
  <script type="text/javascript" src={{asset("js/jquery.countTo.js")}}></script>
  <script type="text/javascript" src={{asset("js/lightbox.min.js")}}></script>
  <script type="text/javascript" src={{asset("js/main.js")}}></script>
  <script type="text/javascript" src={{asset("js/ajax.js")}}></script>
  <script type="text/javascript" src={{asset("js/helper.js")}}></script>
<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.js" integrity="sha256-vZy89JbbMLTO6cMnTZgZKvZ+h4EFdvPFupTQGyiVYZg=" crossorigin="anonymous"></script>
 -->  

  <script type="text/javascript">
    if($('#commentsPage').length){
      $("#addCommentBtn").removeClass("hidden");
    }
  </script>
</body>
</html>