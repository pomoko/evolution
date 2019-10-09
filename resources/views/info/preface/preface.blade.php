@extends('layouts.master')
@section('سمفونی پیدایش', 'پیشگفتار')

@section('content')

  <section id="preface">
    <div class="container">
      <div class="row">
        <div class="text-center col-sm-8 col-sm-offset-2">

            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/preface/fa/preface1.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/preface/fa/preface2.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/preface/fa/preface3.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <img src={{asset("img/preface/fa/preface4.jpg")}} class="img-responsive center-block img-rounded" alt="Responsive image">
              </div>
            </div>
        </div>
      </div> 
    </div>
  </section><!--/#services-->



@endsection