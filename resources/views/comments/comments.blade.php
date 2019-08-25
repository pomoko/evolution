<?php $isAdmin = false; ?>
@if(Auth::user())
  @if(Auth::user()->is_admin)
<?php $isAdmin = true; ?>
  @endif
@endif

@extends('layouts.master')
@section('title', 'نظرات خوانندگان')

@section('content')

  <div id="lang" class="hidden">fa</div>
  <div id="commentsPage"></div>
  <!-- Message Modal -->
  <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="addCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">لطفآ نظر خود را وارد کنید</h3>
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
                    <span id='nameErrorModal' class="fa fa-times-circle text-danger hidden"> لطفا نام خود را وارد کنید</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::text('نام', null, ['id'=>'nameModal', 'class'=>'form-control', 'placeholder'=>'نام شما', 'autocomplete'=>'off', 'required'=>'required']) !!}
              </div>
            </div><!--col-->
          </div><!--row-->
<!--           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('email', 'ایمیل:') !!} 
                    <span id='emailError' class="fa fa-times-circle text-danger hidden"> لطفا آدرس ایمیل خود را وارد کنید</span>
                    <span id='emailIncorrect' class="fa fa-times-circle text-danger hidden"> ایمیل اشتباه است</span>
                  {!! Form::text('نام', null, ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'ایمیل شما','autocomplete'=>'off', 'required'=>'required']) !!}
              </div>
            </div>
          </div> -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::label('comment', 'نظر شما:') !!} 
                    <span id='commentErrorModal' class="fa fa-times-circle text-danger hidden"> لطفا نظرات خود را وارد کنید</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::textarea('نظر شما', null, ['id'=>'commentModal',  'class'=>'form-control', 'cols' => 20, 'rows' =>10, 'maxlength'=>3000, 'placeholder'=>'نظر شما','autocomplete'=>'off', 'style'=>'resize:none', 'required'=>'required']) !!}
              </div>
            </div><!--col-->
          </div><!--row-->
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">   
                      {!! Form::button('ارسال', ['type'=>'submit','id'=>'btnSubmitCommentModal', 'class'=>'btnSubmitComment btn btn-primary btn-md']) !!}
                      <span id='errorExistsModal' class="fa fa-times-circle text-danger hidden"> لطفا زمینه های نشان داده شده را تکمیل کنید</span>            

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
      <div class="row hidden-xs">
        <div class="col-md-1">
            <span class="fa fa-user-circle fa-3x"></span>
        </div>
        <div class="col-md-11">
          {!! Form::open(array('url'=>'/comments/store', 'id'=>'commentForm')) !!}

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('name', 'نام:') !!} 
                      <span id='nameError' class="fa fa-times-circle text-danger hidden"> لطفا نام خود را وارد کنید</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
                
                    {!! Form::text('نام', null, ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'نام شما', 'autocomplete'=>'off', 'required'=>'required']) !!}
                </div>
              </div><!--col-->
            </div><!--row-->
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('email', 'ایمیل:') !!} 
                      <span id='emailError' class="fa fa-times-circle text-danger hidden"> لطفا آدرس ایمیل خود را وارد کنید</span>
                      <span id='emailIncorrect' class="fa fa-times-circle text-danger hidden"> ایمیل اشتباه است</span>
                    {!! Form::text('نام', null, ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'ایمیل شما','autocomplete'=>'off', 'required'=>'required']) !!}
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('comment', 'نظر شما:') !!} 
                      <span id='commentError' class="fa fa-times-circle text-danger hidden"> لطفا نظرات خود را وارد کنید</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
                
                    {!! Form::textarea('نظر شما', null, ['id'=>'comment',  'class'=>'form-control', 'cols' => 20, 'rows' => 2, 'maxlength'=>900, 'placeholder'=>'نظر شما','autocomplete'=>'off', 'style'=>'resize:none', 'required'=>'required']) !!}
                </div>
              </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">   
                        {!! Form::button('ارسال نظر', ['type'=>'submit','id'=>'btnSubmitComment', 'class'=>'btnSubmitComment btn btn-primary btn-md']) !!}
                        <span id='errorExists' class="fa fa-times-circle text-danger hidden"> لطفا زمینه های نشان داده شده را تکمیل کنید</span>            

                    </div>
                </div>              


            </div>


          {!! Form::close() !!}
        </div>
      </div><!--row-->
      <hr/>
      <div class="row">
        <div class="col-xs-5 col-sm-9">
          <h3>همه نظرات <span id="numComments">({{convertNumberToPersian(count($comments))}})</span></h3>
        </div>
        <div class="col-xs-7 col-sm-3 text-left">
          <form>
            <div class="form-group text-left">
              <select id="selectOrder" class="form-control">
                <option value="0">ترتیب نمایش از تازه ترین ها</option>
                <option value="1">ترتیب نمایش از قدیمی ترین ها</option>
              </select>
            </div>
          </form>
        </div>
      </div> 
      <hr/>
      <div id="comments">
        @foreach($comments as $comment)
          <div class='commentContainer'>
            <div class="row">
              <div class="col-xs-12">
                <h4><strong>{{$comment->name}}</strong></h4>
                @if($isAdmin)
                <i class='delete fa fa-trash fa-2x'></i> <i class='update fa fa-edit fa-2x'></i>
                <input type="hidden" name="id" class="commentId" value="{{$comment->id}}">
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 text-muted">
                {{$comment->date_persian}}
                
              </div>
            </div>
            <div class="commentUpdate hidden">
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <input class='form-control inputCommentUpdate' type="text" name="inputCommentUpdate" value="{{$comment->comment}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <button class="btn btn-xs btn-primary btnUpdateSubmit">update</button>
                  <button class="btn btn-xs btn-primary btnUpdateCancel">cancel</button>
                </div>
              </div>
            </div>  
            <div class="row commentTextRow">
              <div class="col-xs-12 commentText">
                {{$comment->comment}}
              </div>
            </div>
            <hr/>
          </div>
        @endforeach
      </div><!--comments-->

    </div>
  </section><!--/#services-->



@endsection