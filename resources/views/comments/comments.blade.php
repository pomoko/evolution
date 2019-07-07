@extends('layouts.master')
@section('title', 'نظرات خوانندگان')

@section('content')


  <div id="commentsPage"></div>
  <!-- Message Modal -->
  <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">درگاه خرید را  انتخاب کنید</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        {!! Form::open(array('url'=>'/comments/store', 'id'=>'commentForm')) !!}

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('name', 'نام:') !!} 
                    <span id='nameError' class="fa fa-times-circle text-danger hidden"></span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::text('نام', null, ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'نام شما', 'autocomplete'=>'off', 'required'=>'required']) !!}
              </div>
            </div><!--col-->
          </div><!--row-->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('email', 'پست الکترونیک:') !!} 
                    <span id='emailError' class="fa fa-times-circle text-danger hidden"></span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::text('نام', null, ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'sldf','autocomplete'=>'off', 'required'=>'required']) !!}
              </div>
            </div><!--col-->
          </div><!--row-->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('comment', 'نظر شما:') !!} 
                    <span id='commentError' class="fa fa-times-circle text-danger hidden"></span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::textarea('نظر شما', null, ['id'=>'comment',  'class'=>'form-control', 'cols' => 20, 'rows' =>10, 'maxlength'=>900, 'placeholder'=>'نظر شما','autocomplete'=>'off', 'style'=>'resize:none', 'required'=>'required']) !!}
              </div>
            </div><!--col-->
          </div><!--row-->

          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">               
                      {!! Form::button('ارسال', ['type'=>'submit','id'=>'btnSubmitComment', 'class'=>'btn btn-primary btn-md']) !!}
                  </div>
              </div>

          </div>


        {!! Form::close() !!}

        </div>
        <div class="modal-footer">
          <button type="button" id="btnCancelMessage" class="btn btn-secondary" data-dismiss="modal">لغو</button>
        </div>
      </div>
    </div>
  </div><!--message modal-->
  <section id="commentsSection">
    <div class="container">
      <div class="row">
        <div class="text-center col-sm-8 col-sm-offset-2">
          <h2>نظرات خوانندگان</h2>
          <hr/>

        </div>
      </div> 

      <div id="comments">
        @foreach($comments as $comment)
          <div class="row">
            <div class="col-md-12">
              <h4><strong>{{$comment->name}}</strong></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-muted">
              {{$comment->date_persian}}
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              {{$comment->comment}}
            </div>
          </div>
          <hr/>
        @endforeach
      </div><!--comments-->

    </div>
  </section><!--/#services-->



@endsection