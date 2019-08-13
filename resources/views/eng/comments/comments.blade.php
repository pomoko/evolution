@extends('layouts.masterEng')
@section('title', 'نظرات خوانندگان')

@section('content')

  <div id="lang" class="hidden">en</div>
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
                  {!! Form::label('name', 'name:') !!} 
                    <span id='nameErrorModal' class="fa fa-times-circle text-danger hidden"> Please Enter Your Name</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::text('name', null, ['id'=>'nameModal', 'class'=>'form-control', 'placeholder'=>'Your Name', 'autocomplete'=>'off', 'required'=>'required']) !!}
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
                  {!! Form::label('comment', 'Your Comments:') !!} 
                    <span id='commentErrorModal' class="fa fa-times-circle text-danger hidden"> Please Enter Your Comments</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
              
                  {!! Form::textarea('Your Comments', null, ['id'=>'commentModal',  'class'=>'form-control', 'cols' => 20, 'rows' =>10, 'maxlength'=>900, 'placeholder'=>'Your Comments','autocomplete'=>'off', 'style'=>'resize:none', 'required'=>'required']) !!}
              </div>
            </div><!--col-->
          </div><!--row-->
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">   
                      {!! Form::button('Submit', ['type'=>'submit','id'=>'btnSubmitCommentModal', 'class'=>'btnSubmitComment btn btn-primary btn-md']) !!}
                      <span id='errorExistsModal' class="fa fa-times-circle text-danger hidden"> Please Fill Out All Fields</span>            

                  </div>
              </div>              


          </div>


        {!! Form::close() !!}

        </div>
        <div class="modal-footer">
          <button type="button" id="btnCancelMessage" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
                    {!! Form::label('name', 'Name:') !!} 
                      <span id='nameError' class="fa fa-times-circle text-danger hidden"> Please Enter Your Name</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
                
                    {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'Your Name', 'autocomplete'=>'off', 'required'=>'required']) !!}
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
                    {!! Form::label('comment', 'Your Comments:') !!} 
                      <span id='commentError' class="fa fa-times-circle text-danger hidden"> Please Enter Your Comments</span><!-- <i class="fa fa-check-circle" aria-hidden="true"></i> -->
                
                    {!! Form::textarea('Your Comments', null, ['id'=>'comment',  'class'=>'form-control', 'cols' => 20, 'rows' => 2, 'maxlength'=>900, 'placeholder'=>'Your Comments','autocomplete'=>'off', 'style'=>'resize:none', 'required'=>'required']) !!}
                </div>
              </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">   
                        {!! Form::button('Submit Comments', ['type'=>'submit','id'=>'btnSubmitComment', 'class'=>'btnSubmitComment btn btn-primary btn-md']) !!}
                        <span id='errorExists' class="fa fa-times-circle text-danger hidden"> Please Fill Out All Fields</span>            

                    </div>
                </div>              


            </div>


          {!! Form::close() !!}
        </div>
      </div><!--row-->
      <hr/>
      <div class="row">
        <div class="col-xs-6 col-sm-9">
          <h3>All Comments <span id="numComments">({{count($comments)}})</span></h3>
        </div>
        <div class="col-xs-6 col-sm-3 text-left">
          <form>
            <div class="form-group text-left">
              <select id="selectOrder" class="form-control">
                <option value="0">Sort From Newest</option>
                <option value="1">Sort From Oldest</option>
              </select>
            </div>
          </form>
        </div>
      </div> 
      <hr/>
      <div id="comments">
        @foreach($comments as $comment)
          <div class="row">
            <div class="col-md-12">
              <h4><strong>{{$comment->name}}</strong></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-muted">
              {{date("M. j, Y", strtotime($comment->created_at))}}
              
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