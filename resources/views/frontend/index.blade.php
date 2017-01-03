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
    <section class="content-header">
        <div class="col-md-12 text-center index-header" style="margin:50px 0px 100px 0px;">
            <h1> <small> 国内最专业的彩票分析网站</small> </h1>
            <h6>诚挚的欢迎喜欢研究彩票的你！</h6>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class='col-md-10'>
                <div class="col-md-4">
                    <div class="feature text-center">
                        <i class="ion ion-ios-checkmark-outline" style="font-size:8em;"></i>
                        <h6>多年的经验积累</h6>
                        <p>我们有多年彩票研究经验，为彩民提供时时彩、大乐透、七星彩、足彩、11选5、31选7等彩种的综合类信息.​ ​ </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature text-center">
                        <i class="ion ion-ios-gear-outline" style="font-size:8em;"></i>
                        <h6>专业的分析方法</h6>
                        <p>针对不同类型的彩票种类，我们提供有专门针对性的，分析全面的，选购方法。全、准、精、保证真实有效，以及时效.</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="feature">
                        <i class="ion ion-ios-checkmark-outline" style="font-size:8em;"></i>
                        <h6>一目了然地分析结果</h6>
                        <p>专业的服务，过硬的团队，丰富的内容。清晰的结构，稳定的服务系统。专业的走势图表，保证您一目了然.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </section>
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