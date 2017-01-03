<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>彩票分析网</title>
    <link rel="stylesheet" href="{{asset('frontend/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ssc.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <script src="{{asset('frontend/jquery/jquery.min.js')}}"></script>
    {!! HTML::script('frontend/lte/js/app.min.js') !!}
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">
    @include('frontend.includes.header')
    @yield('content')
    @include('frontend.includes.footer')
</div>
</body>
</html>