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

		<div class="col-md-10 col-md-offset-1" style="margin-top:30px;">

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('navs.dashboard') }}</div>

				<div class="panel-body">
					<div role="tabpanel">

                      <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.my_information') }}</a>
                            </li>
                            @if (count($wish))
                             <div class="text-right">
                                  {!! $wish[0]['content'] !!}
                             </div>
                            @endif
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <table class="table table-striped table-hover table-bordered dashboard-table">
                                    <tr>
                                        <th>真实姓名</th>
                                        <td>{!! $user->truename !!}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('validation.attributes.name') }}</th>
                                        <td>{!! $user->name !!}</td>
                                    </tr>
                                    <tr>
                                        <th>金币</th>
                                        <td>{!! $user->gold !!} 枚</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('validation.attributes.email') }}</th>
                                        <td>{!! $user->email !!}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('validation.attributes.created_at') }}</th>
                                        <td>{!! $user->created_at !!} ({!! $user->created_at->diffForHumans() !!})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('validation.attributes.actions') }}</th>
                                        <td>
                                            {{--<a href="{!!route('frontend.profile.edit')!!}" class="btn btn-primary btn-xs">{{ trans('labels.edit_information') }}</a>--}}
                                            @if (access()->user()->canChangePassword())
                                                <a href="{!!url('auth/password/change')!!}" class="btn btn-warning btn-xs">{{ trans('navs.change_password') }}</a>
                                            @endif
                                            @permission('view-backend')
                                                <a href="{!!route('admin.dashboard')!!}" class="btn btn-info btn-xs">进入后台</a>
                                            @endauth
                                        </td>
                                    </tr>
                                </table>
                        </div><!--tab panel profile-->

                      </div><!--tab content-->

                    </div><!--tab panel-->

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