@extends('layouts.masterEng')
@section('Symphony of Evolution', 'Table of Contents')

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
                        <h2 class="text-center">Table of Contents</h2>
                        <div id="tableOfContents"></div>
                        <script type="text/javascript" src={{asset("js/pdfobject.js")}}></script>
                        <script>PDFObject.embed("/pdf/ContentsMain.pdf", "#tableOfContents");</script>
                  </div><!--col-->
            </div><!--row-->
            <hr/>
            <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                        <h2 class="text-center">Boxes</h2>
                        <div id="boxes"></div>
                        <script type="text/javascript" src={{asset("js/pdfobject.js")}}></script>
                        <script>PDFObject.embed("/pdf/ContentsBox.pdf", "#boxes");</script>
                  </div><!--col-->
            </div><!--row-->
      </div><!--container-->
</section>


@endsection