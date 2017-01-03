<!doctype html>
<html class="no-js" lang="zh">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        @yield('meta')
        @yield('before-styles-end')
        {!! HTML::style(elixir('css/backend.css')) !!}
        {!! HTML::style('sum/summernote.css') !!}
        {!! HTML::style('css/backend/plugin/date/pikaday.css') !!}
        @yield('after-styles-end')
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        {!! HTML::script('js/vendor/jquery-1.11.2.min.js') !!}
    </head>
    <body class="skin-blue">
        <div class="wrapper">
          @include('backend.includes.header')
          @include('backend.includes.sidebar')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              @yield('page-header')
              {!! Breadcrumbs::renderIfExists() !!}
            </section>

            <!-- Main content -->
            <section class="content">
              @include('includes.partials.messages')
              @yield('content')
            </section><!-- /.content -->
          </div><!-- /.content-wrapper -->

          @include('backend.includes.footer')
        </div><!-- ./wrapper -->
        @yield('before-scripts-end')
        {!! HTML::script('js/vendor/bootstrap.min.js') !!}
        {!! HTML::script('js/backend/plugin/date/moment.js') !!}
        {!! HTML::script('js/backend/plugin/date/pikaday.js') !!}
        {!! HTML::script(elixir('js/backend.js')) !!}
        {!! HTML::script('sum/summernote.js') !!}
        {!! HTML::script('sum/lang/summernote-zh-CN.js') !!}
        @yield('after-scripts-end')
        <script type="text/javascript">
            $(document).ready(function(){
                var i18n = { // 本地化
                    previousMonth	: '上个月',
                    nextMonth		: '下个月',
                    months			: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
                    weekdays		: ['周日','周一','周二','周三','周四','周五','周六'],
                    weekdaysShort	: ['日','一','二','三','四','五','六']
                }
                var datepicker = new Pikaday({
                    field:		jQuery('#wish_begin')[0],
                    minDate:	new Date(),
                    maxDate:	new Date('2020-12-31'),
                    yearRange:	[2000,2020],
                    i18n: 		i18n,
                    onSelect: 	function() {
                        var date = document.createTextNode(this.getMoment().format('YYYY-MM-DD') + ' ');
                        $('#wish_begin').appendChild(date);
                    }
                });

                var datepicker = new Pikaday({
                    field:		jQuery('#wish_end')[0],
                    minDate:	new Date(),
                    maxDate:	new Date('2020-12-31'),
                    yearRange:	[2000,2020],
                    i18n: 		i18n,
                    onSelect: 	function() {
                        var date = document.createTextNode(this.getMoment().format('YYYY-MM-DD') + ' ');
                        $('#wish_end').appendChild(date);
                    }
                });

            });
        </script>
    </body>
</html>