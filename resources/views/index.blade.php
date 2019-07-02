<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>اپلیکیشن هوشمند کار پاره وقت</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--   <link href="css/animate.min.css" rel="stylesheet">  -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link href="css/lightbox.css" rel="stylesheet">
   <link href="css/main.css" rel="stylesheet">
<!--   <link id="css-preset" href="css/presets/preset2.css" rel="stylesheet"> -->
  <link href="css/responsive.css" rel="stylesheet">
  <link rel='stylesheet' href={{asset('css/bootstrap-rtl.min.css')}}>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/iranian-sans" type="text/css"/>

  <style type="text/css">
    
    body{
         font-family: 'IranianSansRegular'; 
   font-weight: normal; 
   font-style: normal;
    }

     body, html, .container-fluid {
         height: 100%;
    }

/*
    a:link.employer, a:visited.employer{
      background: linear-gradient(#a283d9, #605dd3);
      color: white !important;
    }

    a:link.jobSeeker, a:visited.jobSeeker{
      background: linear-gradient(#FB5656, #FEBF53);
      color: white !important;
    }

    a:hover.jobSeeker{
      color: #a283d9 !important;
    }

    a:hover.employer{
      color: #FB5656 !important;
    }*/

    .btn{
      color: white;
          border-radius: 0 !important;

    }

    .top{
/*      border-bottom: solid 1px;
*/    }



     .option{
      display: block;
      line-height: 300px;
      text-align: center;
      text-decoration: none !important;
      margin-top: 50px;
      font-size: 50px;
    }


    .imgCenter {
        margin: 0 auto;
    }

    /* XS Portrait */
    @media (max-width: 479px) {
      
      .option{
        margin-top: 25px;
      }

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

  <div class="container-fluid">

      <div class="row h-50 bottom">
        <a href="/employer" class="option bottom btns btn-lg btn-block employer"><img class="img-responsive imgCenter" src="images/employer.png" alt=""></a>
      </div>

      <div class="row h-50 top">
        <a href="/jobSeeker" class="option top btns  btn-lg btn-block jobSeeker"><img class="img-responsive imgCenter" src="images/jobSeeker.png" alt=""></a>
      </div>

	</div><!--container-->
  
  <div class="container-fluid">
    <div class="row" id="downloadLinks">
      <div class="col-xs-4 col-md-4 center-block">
          <a href="/sibApp"><img class="img-responsive center-block" src="images/sibApp.png" alt="" height="50" width="200"></a>
      </div>

      <div class="col-xs-4 col-md-4 center-block">
        <a href="/googlePlay"><img class="img-responsive center-block"" src="images/googlePlay.png" alt="" height="50" width="200"></a>
      </div>

      <div class="col-xs-4 center-block">
        <a href="/cafeBazaar"><img class="img-responsive center-block" src="images/cafeBazaar.png" alt="" height="50" width="200"></a>
      </div>
    </div>
  </div>

</body>
</html>