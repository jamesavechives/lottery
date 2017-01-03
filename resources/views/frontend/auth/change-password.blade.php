@extends('frontend.layouts.master')
@section('title')
彩票网
@endsection
@section('meta_description')
专业的彩票分析网站，时时彩，大乐透等
@endsection
@section('witch-css-need')
<link rel="stylesheet" href="{{asset('frontend/bootstrap/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/ionicons/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/lte/css/AdminLTE.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/lte/css/skins/_all-skins.min.css')}}">
@endsection

@section('content')
    @include('frontend.includes.atl_header')
<div class="content-wrapper index-content">
	<div class="row">

		<div class="col-md-10 col-md-offset-1" style="margin-top:100px;">

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('labels.change_password_box_title') }}</div>

				<div class="panel-body">

                       {!! Form::open(['route' => ['password.change'], 'class' => 'form-horizontal']) !!}

                              <div class="form-group">
                                  {!! Form::label('old_password', trans('validation.attributes.old_password'), ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-md-6">
                                      {!! Form::input('password', 'old_password', null, ['class' => 'form-control']) !!}
                                  </div>
                              </div>

                              <div class="form-group">
                                  {!! Form::label('password', trans('validation.attributes.new_password'), ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-md-6">
                                      {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                                  </div>
                              </div>

                              <div class="form-group">
                                  {!! Form::label('password_confirmation', trans('validation.attributes.new_password_confirmation'), ['class' => 'col-md-4 control-label']) !!}
                                  <div class="col-md-6">
                                      {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      {!! Form::submit(trans('labels.change_password_button'), ['class' => 'btn btn-primary']) !!}
                                  </div>
                              </div>

                       {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
</div>
@endsection
@section('footer')
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>彩票网</b>
        </div>
        <strong>
            Copyright &copy; 2015-2016 <a href="/">彩票网</a>.
        </strong> All right sreserved.
    </div>
</footer>
@section('end-js-need')
{!! HTML::script('frontend/jquery/jquery.min.js') !!}
{!! HTML::script('frontend/bootstrap/bootstrap.min.js') !!}
{!! HTML::script('frontend/lte/js/app.min.js') !!}
{!! HTML::script('frontend/lte/js/demo.js') !!}
@endsection
@stop