<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
        <title>سمفونی پیدایش - @yield('title')</title>
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('css/animate.min.css')}} rel="stylesheet"> 
    <link href={{asset('css/font-awesome.min.css')}} rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href={{asset("css/lightbox.css")}} rel="stylesheet">
    <link href={{asset("css/main.css")}} rel="stylesheet">
    <link id="css-preset" href={{asset('css/presets/employer.css')}} rel="stylesheet">
    <link href={{asset("css/responsive.css")}} rel="stylesheet">
    <link rel='stylesheet' href={{asset('css/bootstrap-rtl.min.css')}}>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/iranian-sans" type="text/css"/>

    <style type="text/css">
      
      body{
           font-family: 'IranianSansRegular'; 
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
  <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">لطفآ نظرات و انتقادات خود را با ما در میان بگذارد</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/action_page.php">
            <div class="form-group">
              <label for="email">آدرس ایمیل شما:</label>
              <input type="email" class="form-control" id="email" placeholder="ایمیل خود را وارد کنید" name="email" required>
            </div>
            <div class="form-group md-form form-sm form-3 pl-0">
              <label for="sel1">موضوع پیغام</label>
              <select class="form-control mt-0 amber-border" id="emailSubject">
                <option>گزارش خطا</option>
                <option>درخواست افزودن ویژگی جدید</option>
                <option>قیمت گذاری و پرداخت</option>
                <option>غیره</option>
              </select>
            </div><!--form-group-->
            <div class="form-group">
              <label for="pwd">متن پیغام:</label>
              <textarea id="emailBody" class="form-control" rows="3" placeholder="لطفآ متن پیغام خود را وارد نمایید"></textarea>
            </div>
  <!--           <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
              </label>
            </div> -->
          </form>
        </div>
        <div class="modal-footer">
          <span id="successMessage" class="collapse">پیغام شما ارسال گردید.</span>
          <button type="button" id="btnCancelMessage" class="btn btn-secondary" data-dismiss="modal">لغو</button>
          <button type="button" id="btnSubmitEmail" class="btn btn-primary submitEmail">ارسال</button>
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
          <h5 class="modal-title" id="exampleModalLabel">پیغام شما ارسال گردید.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary submitEmail" data-dismiss="modal">تایید</button>
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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll "><a href="/"><i class="fa fa-home"></i></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">اطلاعات کتاب<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/info/preface">مقدمه</a></li>
                <li><a href="/info/contents">فهرست</a></li>
                <li><a href="/info/articles">نمونه مقالات</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">نقدها<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="scroll"><a href="#">a</a></li>
                <li class="scroll"><a href="#">b</a></li>
                <li class="scroll"><a href="#">c</a></li>
              </ul>
            </li>            
            <li class="scroll"><a href="#team">نظرات خوانندگان</a></li>  
            <li class="scroll"><a href="#pricing">درباره نویسنده</a></li>
<!--             <li class="scroll"><a href="#portfolio">برخی از کارفرمایان</a></li>  -->
<!--             <li class="scroll"><a href="#blog">Blog</a></li> -->
            <li class="scroll"><a href="#footer">خرید کتاب</a></li> 

          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    
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
                  <li><i class="fa fa-map-marker"></i> <span> آدرس:</span>ولی  عصر, خیابان کاج آبادی, پلاک ۷۲, زنگ ۱,  کد پستی ۱۹۶۶۹۱۳۶۶۱</li>
                  <li><i class="fa fa-phone"></i> <span> تلفن:</span> ۹۴۸۶ ۲۲۰۵ ۲۱ ۹۸+</li>
                  <li><i class="fa fa-envelope"></i> <span>ایمیل: </span>info@karjib.com</li>
                </ul>
        </div>
      </div>
    </div>
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <img id='jxlzesgtnbqewlaoapfuoeukoeuk' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1024588&p=rfthobpduiwkaodsdshwmcsimcsi", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=1024588&p=nbpdlymaodrfshwlujynaqgwaqgw'/>
          <img src="https://trustseal.enamad.ir/logo.aspx?id=111454&amp;p=yJnt0FvuyzdVLuzQ" alt="" onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=111454&amp;p=yJnt0FvuyzdVLuzQ&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" style="cursor:pointer" id="yJnt0FvuyzdVLuzQ">
          <img src="images/ecunion.png" alt="" onclick="window.open('https://ecunion.ir/verify/karjib.com?token=35352085c640cb744c15', 'Popup','toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30')" style="cursor:pointer">
        </div>
      </div>
    </div>
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

  <div class="container-fluid hidden">
    <div class="row" id="downloadLinks">
      <div class="col-xs-4 col-md-4 text-center">
          <a href="/sibApp"><img class="img-responsive center-block" src="images/sibApp.png" alt="" height="50" width="200"></a>
      </div>

      <div class="col-xs-4 col-md-4 text-center">
        <a href="/googlePlay"><img class="img-responsive center-block"" src="images/googlePlay.png" alt="" height="50" width="200"></a>
      </div>

      <div class="col-xs-4 col-md-4 text-center">
        <a href="/cafeBazaar"><img class="img-responsive center-block" src="images/cafeBazaar.png" alt="" height="50" width="200"></a>
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

</body>
</html>