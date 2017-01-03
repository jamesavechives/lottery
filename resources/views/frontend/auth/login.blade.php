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
    <div class="row" >

        <div class="col-md-8 col-md-offset-2" style="margin-top:100px;">

            <div class="panel panel-default">
                <div class="panel-heading">{{trans('labels.login_box_title')}}</div>

                <div class="panel-body">

                    {!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">
                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('name', 'name', old('name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('remember') !!} {{ trans('labels.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit(trans('labels.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}

                                {{-- {!! link_to('password/email', trans('labels.forgot_password')) !!} --}}
                                {!! link_to('#', trans('labels.forgot_password')) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}

                    <div class="row text-center">
                        {!! $socialite_links !!}
                    </div>
                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

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