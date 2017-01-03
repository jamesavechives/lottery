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
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">

				<div class="panel-heading">{{ trans('labels.reset_password_box_title') }}</div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					{!! Form::open(['to' => 'password/email', 'class' => 'form-horizontal', 'role' => 'form']) !!}

						<div class="form-group">
							{!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit(trans('labels.send_password_reset_link_button'), ['class' => 'btn btn-primary']) !!}
							</div>
						</div>

					{!! Form::close() !!}
				</div><!-- panel body -->
            </div><!-- panel -->
        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection