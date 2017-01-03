@extends('frontend.layouts.master')
@section('title'){{ $article->name }}@endsection
@section('meta_description'){{ $article->desc }}@endsection
@section('witch-css-need')
    <link rel="stylesheet" href="{{asset('frontend/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/lte/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/lte/css/skins/_all-skins.min.css')}}">
@endsection

@section('content')
    @include('frontend.includes.atl_header')
        <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <h1>
                    {{ $article->name }}
                    <small>相关文章</small>
                </h1>
            </section>
            <section class="content">
                @foreach($article->article as $wenzhang)
                    <a href="/article/info/{{ $wenzhang->id }}">
                        <div class="callout callout-danger">
                            <h4>{{ $wenzhang->title }}</h4>
                            <p>{{ $wenzhang->desc }}</p>
                        </div>
                    </a>
                @endforeach
            </section>
        </div>
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