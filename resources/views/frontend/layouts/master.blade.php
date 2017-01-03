<!doctype html>
<html class="no-js" lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        @yield('meta')
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        {{-- yield css --}}
        @yield('witch-css-need')
        <script src="{{asset('frontend/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('frontend/js/pic.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.zclip.min.js')}}"></script>
        <script src="{{asset('frontend/js/public.js')}}"></script>
        {{-- yield js --}}
        @yield('witch-js-need')
        <!--[if lt IE 9]>
          <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-purple-light layout-top-nav">
        <div class="wrapper">
            @yield('header')
            @include('includes.partials.messages')
            @yield('content')
            @yield('footer')
        </div>
        @yield('end-js-need')
    </body>
</html>