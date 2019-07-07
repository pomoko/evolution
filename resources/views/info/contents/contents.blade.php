@extends('layouts.master')
@section('سمفونی پیدایش', 'فهرست')

@section('content')

  <section id="contents">
    <div class="container">
      <div class="row">
        <div class="text-center col-sm-8 col-sm-offset-2">
          <h2>فهرست</h2>
          <ul class="list-group">
            <li class="list-group-item text-right active"><strong>chapter 1</strong> <span class="badge">page#</span></li>
            <li class="list-group-item text-right">sub-chapter <span class="badge">page#</span></li> 
            <li class="list-group-item text-right">sub-chapter <span class="badge">page#</span></li> 
            <li class="list-group-item text-right active"><strong>chapter 2</strong> <span class="badge">page#</span></li>
            <li class="list-group-item text-right">sub-chapter <span class="badge">page#</span></li> 
            <li class="list-group-item text-right">sub-chapter <span class="badge">page#</span></li> 
          </ul>
        </div>
      </div> 

    </div>
  </section><!--/#services-->



@endsection