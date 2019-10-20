@extends('layouts.masterEng')
@section('Symphony of Evolution', 'Refrences')

@section('content')

<style type="text/css">
  .contentTitle{
  }
  .contentSub{
    padding-left: 50px;
  }
  .list-group-item{
      text-transform: capitalize !important;
  }
  .pdfobject-container { height: 30rem; }

</style>
<section id="contents">
      <div class="container">
            <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                        <h2 class="text-center">References</h2>
                        <div id="tableOfContents"></div>
                        <script type="text/javascript" src={{asset("js/pdfobject.js")}}></script>
                        <script>PDFObject.embed("/pdf/en/references/References.pdf", "#tableOfContents");</script>
                  </div><!--col-->
            </div><!--row-->

      </div><!--container-->
</section>


<!--   <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
           <h2>References</h2>
           
            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/refrences/en/433.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/refrences/en/434.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/refrences/en/435.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/refrences/en/436.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/refrences/en/437.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>
            
        </div>
      </div> 

    </div>
  </section><!--/#services--> -->



@endsection