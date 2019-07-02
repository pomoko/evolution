<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>اپلیکیشن هوشمند کار پاره وقت</title>
  <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
  <link href={{asset('css/animate.min.css')}} rel="stylesheet"> 
  <link href={{asset('css/font-awesome.min.css')}} rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href={{asset('css/presets/employer.css')}} rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
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

<body>
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
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
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

<!--
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
-->

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider-->
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
            <li class="scroll active"><a href="#home">⇧</a></li>
            <li class="scroll"><a href="#services">خدمات</a></li> 
            <li class="scroll"><a href="#team">روند کارکرد</a></li>  
            <li class="scroll"><a href="#about-us">درباره ما</a></li>     
            <li class="scroll"><a href="#pricing">قیمت گذاری</a></li>
<!--             <li class="scroll"><a href="#portfolio">برخی از کارفرمایان</a></li>  -->
<!--             <li class="scroll"><a href="#blog">Blog</a></li> -->
            <li class="scroll"><a href="#footer">تماس با ما</a></li> 
            <li><a href="/jobSeeker">کارجو هستم</a> 
            <li class="scroll"><a href="#"  data-toggle="modal" data-target="#messageModal">نظرات و انتقادات</a></li>  
            <li><a href="/privacy">قوانین و مقررات</a>     
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>خدمات سامانه کارجیب</h2>
            <p>کارجیب خدمات زیر را به کارفرمایان گرامی ارائه میدهد</p>
          </div>
        </div> 
      </div>

      <div class="row">
        <div class="col-sm-12">
            <!-- <source src="vids/jobSeeker.mp4" type="video/mp4"> -->
          <div id="15336103901250538"><script type="text/JavaScript" src="https://www.aparat.com/embed/qtAzs?data[rnddiv]=15336103901250538&data[responsive]=yes"></script></div><!--             Your browser does not support HTML5 video. -->
        </div><!--col-->
      </div><!--row-->
      <hr/>





      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-map-marker-alt"></i>
            </div>
            <div class="service-info">
              <h3>ثبت کسب و کار</h3>
              <p>مکان یا امکان کاری خود را بر حسب صنف کاری به راحتی در سامانه ثبت کنید</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms">
            <div class="service-icon">
              <i class="fa fa-list-ul"></i>
            </div>
            <div class="service-info">
              <h3>ثبت نیازمندی ها</h3>
              <p>برای کار مکان کاری ثبت شده نیازمندی های خود را بر حسب موقعیت شغلی ثبت نمایید</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-bell"></i>
            </div>
            <div class="service-info">
              <h3>اطلاع رسانی فوری</h3>
              <p>در زمانی که آگهی کاری شما باب میل کارجویی قرار گیرد سامانه شما را از انتخاب وی آگاه میسازد</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <div class="service-icon">
              <i class="fa fa-address-book"></i>
            </div>
            <div class="service-info">
              <h3>بررسی رزومه ها</h3>
              <p>رزومه متقاضیان را برای بررسی تجربیات کاری و واجد شرایط بودن آنان مطالعه نمایید</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
            <div class="service-icon">
              <i class="fa fa-hand-point-up"></i>
            </div>
            <div class="service-info">
              <h3>انتخاب به سبک نوین</h3>
              <p>رزومه متقاضیانی که با انگشت به راست میکشد انتخاب شده و آنهایی که به چپ میکشد رد میشوند</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms">
            <div class="service-icon">
              <i class="fa fa-handshake"></i>
            </div>
            <div class="service-info">
              <h3>تماس با کارجو</h3>
              <p>سامانه متقاضیان انتخاب شده را آگاه نموده و اجازه تماس با شما را برای ایشان برقرار مینماید</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#services-->

    <section id="team">
    <div class="container">
      <div class="row">
        <div class=" text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>روند کارکرد کارجیب</h2>
          <p>روند کاری سامانه برای کارفرمایان به شرح زیر است</p>
        </div>
      </div>
      <div class="team-members">
        <div class="row">
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="member-image">
                <img class="img-responsive" src="images/screenShots/employer/create.png" alt="">
              </div>
              <div class="member-info">
                <h3>ثبت آگهی</h3>
                <h4>سمت شغلی, جنسیت, سن, میزان تجربه,</h4>
                <h4>دستمزد, میزان کار, و ساعت تماس</h4>
              </div>
<!--               <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div> -->
            </div>
          </div>


          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
              <div class="member-image">
                <img class="img-responsive" src="images/screenShots/employer/notification.png" alt="">
              </div>
              <div class="member-info">
                <h3>نوتیفیکیشن</h3>
                <h4>دریافت نوتیفیکیشن در زمانی که</h4>
                <h4>متقاضیان آگهی شما را انتخاب میکنند</h4>
              </div>
<!--               <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div> -->
            </div>
          </div>

          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
              <div class="member-image">
                <img class="img-responsive" src="images/screenShots/employer/resume.png" alt="">
              </div>
              <div class="member-info">
                <h3>بررسی رزومه متقاضیان</h3>
                <h4>مرور رزومه متقاضیان را برای بررسی</h4>
                <h4>تجربیات کاری و واجد شرایط بودن آنان</h4>
              </div>
<!--               <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div> -->
            </div>
          </div>

          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <div class="member-image">
                <img class="img-responsive" src="images/screenShots/employer/swipe.png" alt="">
              </div>
              <div class="member-info">
                <h3>انتخاب متقاضیان</h3>
                <h4>انتخاب متقاضیان واجد شرایط</h4>
                <h4>به شیوه نوین و آسان</h4>
              </div>
<!--               <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div> -->
            </div>
          </div>
        </div>
      </div>            
    </div>
  </section><!--/#team-->

  <section id="features" class="parallax">
    <div class="container">
      <div class="row count">
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="fa fa-user"></i>
          <h3 class="timer">{{$numUsers}}</h3>
          <p>کاربر</p>
        </div>
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
          <i class="fa fa-store"></i>
          <h3 class="timer">{{$numWorkplaces}}</h3>                    
          <p>مکان کاری</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
          <i class="fa fa-newspaper"></i>
          <h3 class="timer">{{$numJobPostings}}</h3>                    
          <p>آگهی کاری فعال</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
          <i class="fa fa-handshake"></i>                    
          <h3 class="timer">{{$numInterviews}}</h3>
          <p>درخواست مورد تایید</p>
        </div>                 
      </div>
    </div>
  </section><!--/#features-->

   <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>درباره ما</h2>
            <p>سامانه کارجیب محصولی از بخش خصوصی بوده و صرفا جهت ایجاد ارتباط بین کارجویان و کارفرمایان طراحی شده است. طراحی و توسعه این برنامه با مدیریت آقای پوریا معافی (توسعه 
 دهنده اپلیکیشن های وب / موبایل و متخصص و فارغ التحصیل رشته فنآفری اطلاعات) انجام گرفته است.</p>
              کارجیب فقط یه نرم افزار نیست. یه پله...یه پل ارتباطی هوشمند بین کارجو و کارفرما؛ برای کارهای پاره وقت یا تمام وقت. کارجیب مجموعه ای هوشمند از کارجوها و آگاهی های کاری هستش که در اون میشه به شیوه ای نوین کار و یا کارمند جدید پیدا کرد.
            این پل هوشمند ویژگی های زیادی داره که تو دو قسمت دسته بندی میشن؛</p>

            <p>دسته اول کارجو, یا همون فردی که دنبال کار میگرده؛</p>

            <p>
            - ساخت رزومه</br>
              • تو این نرم افزار میتونید به راحتی و خیلی سریع و البته با امنیت کامل یه رزومه دقیق و جامع 
                از تجربیات خودتون ثبت کنید
            </p> 

            <p>
            - فهرست بندی هوشمند مشاغل</br>
              • آگهی های کاری بر حسب صنف و موقعیت شغلی دسته بندی شدن و به راحتی با انتخاب 
                صنف مورد نظرتون تمام آگهی های جدید مربوط به مشاغل اون صنف  براتون به نمایش 
                درمیاد.
            </p>

            <p>
            - روش نوین برای مرور آگهی ها و ارسال درخواست مصاحبه </br>
              • شما میتونید به راحتی و فقط  با سوایپ کردن به راست یا چپ درخواست مصاحبه بدید 
                (سوایپ به راست) و یا آگهی رو رد کنید (سوایپ به چپ)
            </p>

            <p>
            - نوتیفیکیشن فوری</br>
              • به محض اینکه کارفرما درخواست مصاحبه شما رو قبول کنه، نرم افزار از طریق نوتیفیکیشن 
                شما رو از انتخاب کارفرما مربوطه مطلع میسازه.
            </p>

            <p>
            - بایگانی آگهی ها</br>
              • تمامی اون آگاهی هایی که شما براشون درخواست مصاحبه میفرستید (به راست سوایپ 
                میکنید) و اون درخواست هایی که براشون پذیرش مصاحبه میگیرین برای رجوع آسون داخل 
                حسابتون بایگانی میشن.
            </p>


             <p>دسته دوم برای کارفرما, یا فردی که احتیاج به  جدید دار:</p>

            <p>
            - فهرست بندی هوشمند آگهی کاری</br>
              • در این قسمت شما میتونید آگهی رو با انتخاب خصوصیات مورد نظر در همکار جدیدتون  ثبت 
                کنید. آگهی شما بر حسب موقعیت شغلی درخواست شما فهرست بندی میشه.
            </p>

            <p>
            - فیلتر هوشمند متقاضیان</br>
              • با این قابلیت شما میتونین به سیستم اجازه بدید که اگاهیتون رو فقط به اون کارجوهایی 
                نشون بده که خوصوصیاتشون رو مشخص میکنین, مانند جنسیت, تحصیلات, گروه سنی, 
                میزان تجربه و ...
            </p>

            <p>
            - نوتیفیکیشن فوری</br>
              • وقتی که آگهی شما توسط یه متقاضی  مورد استقبال قرار بگیره، کارجیب شما رو از طریق 
                نوتیفیکیشن آگاه میکنه
            </p>
             
             <p> 
            - روش نوین برای انتخاب متقاضیان</br>
              • کارجیب بهتون اجازه میده که به راحتی و با سوایپ کردن درخواست ها به راست  یا چپ,  اون 
                ها رو قبول (سوایپ به راست)  و یا رد (سوایپ به چپ) کنید.
            </p>

            <p>
            - تماس با کارجوها و بایگانی رزومه اون کارجوهایی که تاییدشون کردین</br>
              • این نرم افزار رزومه متقاضیان تایید شده توسط شما رو بایگانی میکنه. علاوه براین فقط 
                کارجویانی میتونن باهاتون تماس بگیرن که شما درخواستشون رو تایید کرده باشید.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--/#about-us
  <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>About us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="lead">User Experiances</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="95">95%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
              <p class="lead">Web Design</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="75">75%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
              <p class="lead">Programming</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="60">60%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="lead">Fun</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="85">85%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --><!--/#about-us-->

  <section id="portfolio" class="hidden">
    <div class="container">
      <div class="row">
        <div class=" text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>تعدادی از کارفرمایان گلچین</h2>
<!--           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p> -->
        </div>
      </div> 
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/1.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/2.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="500ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/3.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/4.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="700ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/5.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="800ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/6.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="900ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/7.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="1000ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/8.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
<!--                   <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div><!-- /#portfolio-single-wrap -->
  </section><!--/#portfolio-->


  <section>
    <div class="container">
      <div class="pricing-table">
        <div class="row">
          <div class="col-sm-12">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h2 class="hidden">کارجو</h2>
              <div class="price">
                خدمات پنل کارفرما<span></span>                          
              </div>
              <ul>
                <li>ثبت آگهی</li>
                <li>دریافت نوتیفیکیشن متقاضیان</li>
                <li>بررسی تجربیات کاری متقاضیان</li>
                <li>رد یا تائید متقاضیان بر حسب واجد شرایط بودن</li>
                <li>بایگانی متقاضیان تائیدی</li>
                <li>فهرست بندی بایگانی ها بر حسب آگهی  کاری</li>
                <li>تماس با متقاضیان مد نظر</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="row hidden">
    <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
      <h2>کاملا رایگان!</h2>
      <p>از آنجا که کارجیب سامانه ای نوپا میباشد, تا انتهای سال ۹۷ شمسی تمای خدمات به صورت رایگان و بدون هیچ گونه تعهدی ارائه داده میشود</p>
    </div>
  </div>
  <section id="payment" class="hidden">
    <div class="consstainer">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <form>
            <div class="form-group md-form form-sm form-3 pl-0">
              <label for="sel1">انتخاب مقدار شارژ</label>
              <select class="form-control mt-0 amber-border" id="sel1">
                <option>۳۰/۰۰۰ تومان (۱ روز آگاهی)</option>
                <option>۵۵/۰۰۰ تومان (۲ روز آگاهی)</option>
                <option>۷۵/۰۰۰ تومان (۳ روز آگاهی)</option>
                <option>۹۰/۰۰۰ تومان (۴ روز آگاهی)</option>
                <option>۱۰۰/۰۰۰ تومان (۵ روز آگاهی)</option>
                <option>۱۱۰/۰۰۰ تومان (یک هفته آگاهی)</option>
              </select>
            </div><!--form-group-->
            <div class="form-group md-form form-sm form-3 pl-0">
              <label for="usr">شماره ای که با آن در سامانه ثبت نام کرده اید</label>
              <input type="text" maxlength="11" class="form-control mt-0 amber-border" id="usr" placeholder="شماره موبایل (با ۰۹ آغاز شود)">
            </div>

            <button type="button" id="btnPayment" class="btn btn-success btn-lg">ادامه به درگاه پرداخت</button>

          </form>
      </div>
    </div>
  </section>



  <section id="pricing">
    <div class="container">
      <div class="pricing-table">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h3>۱ روز نمایش آگاهی</h3>
              <div class="price">
                <strike>۳۰/۰۰۰</strike><span>تومان</span> 
              <h1 class="text-danger">فعلا رایگان!</h1>                         
              </div>
              <ul class="hidden">
                <li>Free Setup</li>
                <li>10GB Storage</li>
                <li>100GB Bandwith</li>
                <li>5 Products</li>
              </ul>
              <a href="#" class="selectPrice btn btn-lg btn-primary hidden"><span class="hidden">۳۰/۰۰۰</span>انتخاب</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
              <h3>۳ روز نمایش آگاهی </h3>
              <div class="price">
                <strike>۷۵/۰۰۰</strike><span>تومان</span>                          
              </div>
              <h1 class="text-danger">فعلا رایگان!</h1>
              <ul class="hidden">
                <li>Free Setup</li>
                <li>10GB Storage</li>
                <li>100GB Bandwith</li>
                <li>5 Products</li>
              </ul>
              <a href="#" class="selectPrice btn btn-lg btn-primary hidden"><span class="hidden">۷۵/۰۰۰</span>انتخاب</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table featuredd wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <h3>۵ روز نمایش آگاهی</h3>
              <div class="price">
                <strike>۱۰۰/۰۰۰</strike><span>تومان</span> 
              <h1 class="text-danger">فعلا رایگان!</h1>                         
              </div>
              <ul class="hidden">
                <li>Free Setup</li>
                <li>10GB Storage</li>
                <li>100GB Bandwith</li>
                <li>5 Products</li>
              </ul>
              <a href="#" class="selectPrice btn btn-lg btn-primary hidden"><span class="hidden">۱۰۰/۰۰۰</span>انتخاب</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
              <h3>۷ روز نمایش آگاهی</h3>
              <div class="price">
                <strike>۱۱۰/۰۰۰</strike><span>تومان</span>  
              <h1 class="text-danger">فعلا رایگان!</h1>                        
              </div>
              <ul class="hidden">
                <li>Free Setup</li>
                <li>10GB Storage</li>
                <li>100GB Bandwith</li>
                <li>5 Products</li>
              </ul>
              <a href="#" class="selectPrice btn btn-lg btn-primary hidden"><span class="hidden">۱۱۰/۰۰۰</span>انتخاب</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row hidden">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>رایگان به مدت محدود</h2>
          <p>از آنجا که کارجیب سامانه ای نوپا میباشد, تا انتهای سال ۹۷ شمسی تمای خدمات به صورت رایگان و بدون هیچ گونه تعهدی ارائه داده میشود</p>
        </div>
      </div>
    </div>
  </section>

<!--   <section id="twitter" class="parallax">
    <div>
      <a class="twitter-left-control" href="#twitter-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="twitter-right-control" href="#twitter-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div class="twitter-icon text-center">
              <i class="fa fa-twitter"></i>
              <h4>Themeum</h4>
            </div>
            <div id="twitter-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <p>Introducing Shortcode generator for Helix V2 based templates <a href="#"><span>#helixframework #joomla</span> http://bit.ly/1qlgwav</a></p>
                </div>
                <div class="item">
                  <p>Introducing Shortcode generator for Helix V2 based templates <a href="#"><span>#helixframework #joomla</span> http://bit.ly/1qlgwav</a></p>
                </div>
                <div class="item">                                
                  <p>Introducing Shortcode generator for Helix V2 based templates <a href="#"><span>#helixframework #joomla</span> http://bit.ly/1qlgwav</a></p>
                </div>
              </div>                        
            </div>                    
          </div>
        </div>
      </div>
    </div>
  </section> --><!--/#twitter-->

<!--   <section id="blog">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Blog Posts</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>
      <div class="blog-posts">
        <div class="row">
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="images/blog/1.jpg" alt=""></a> 
              <div class="post-meta">
                <span><i class="fa fa-comments-o"></i> 3 Comments</span>
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
              <div class="post-icon">
                <i class="fa fa-pencil"></i>
              </div>
            </div>
            <div class="entry-header">
              <h3><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h3>
              <span class="date">June 26, 2014</span>
              <span class="cetagory">in <strong>Photography</strong></span>
            </div>
            <div class="entry-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="post-thumb">
              <div id="post-carousel"  class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#post-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#post-carousel" data-slide-to="1"></li>
                  <li data-target="#post-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <a href="#"><img class="img-responsive" src="images/blog/2.jpg" alt=""></a>
                  </div>
                  <div class="item">
                    <a href="#"><img class="img-responsive" src="images/blog/1.jpg" alt=""></a>
                  </div>
                  <div class="item">
                    <a href="#"><img class="img-responsive" src="images/blog/3.jpg" alt=""></a>
                  </div>
                </div>                               
                <a class="blog-left-control" href="#post-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="blog-right-control" href="#post-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
              </div>                            
              <div class="post-meta">
                <span><i class="fa fa-comments-o"></i> 3 Comments</span>
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
              <div class="post-icon">
                <i class="fa fa-picture-o"></i>
              </div>
            </div>
            <div class="entry-header">
              <h3><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h3>
              <span class="date">June 26, 2014</span>
              <span class="cetagory">in <strong>Photography</strong></span>
            </div>
            <div class="entry-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
          </div> 
          <div class="col-sm-12 col-md-offset-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="images/blog/3.jpg" alt=""></a>
              <div class="post-meta">
                <span><i class="fa fa-comments-o"></i> 3 Comments</span>
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
              <div class="post-icon">
                <i class="fa fa-video-camera"></i>
              </div>
            </div>
            <div class="entry-header">
              <h3><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h3>
              <span class="date">June 26, 2014</span>
              <span class="cetagory">in <strong>Photography</strong></span>
            </div>
            <div class="entry-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
          </div>                    
        </div>
        <div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a href="#" class="btn-loadmore"><i class="fa fa-repeat"></i> Load More</a>
        </div>                
      </div>
    </div>
  </section> --><!--/#blog-->

  <section id="contact" class="hidden">
    <div id="google-map" class="wow fadeIn hidden" data-latitude="35.778386" data-longitude="51.417643" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>تماس با ما</h2>
            <p></p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="/sendMail">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control senderName" placeholder="نام و نام خانوادگی" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control senderEmail" placeholder="آدرس ایمیل شما" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control emailSubject" placeholder="موضوع" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control emailMessage" rows="4" placeholder="پیام خود را وارد نمایید" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit sendMail">ارسال</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p></p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> آدرس:</span> تهران, بلوار آفریقا, خیابان ناهید غربی, پلاک ۶۳</li>
                  <li><i class="fa fa-phone"></i> <span> تلفن:</span> ۹۴۸۶ ۲۲۰۵ ۲۱ ۹۸+</li>
                  <li><i class="fa fa-envelope"></i> <span> ایمیل:</span><a href="mailto:info@karjib.com"> info@karjib.com</a></li>
       <!--            <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li> -->
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="/"><img class="img-responsive" src="images/logo.png" alt=""></a>
        </div>
      </div>
      <div class="container text-center">
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
            <p class="pull-left">{{$persianYear}} کارجیب &copy;</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="container-fluid">
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


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src={{asset("js/ajax.js")}}></script>
  <script type="text/javascript" src="js/helper.js"></script>


</body>
</html>