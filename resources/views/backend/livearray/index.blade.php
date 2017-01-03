@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management') . ' | ' . trans('menus.create_article'))
@section('uedit-scripts-need')
        <!-- 如果有需要在此处加JS的话，加在这里，继承了ueditneed -->
@stop
@section('page-header')
    <h1>
        动态数组设置
        <small>动态数组</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.livearray.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">动态数组</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('protect/makeliveinfo/index/'.$num.'/cqssc') }}" class="btn btn-xs btn-info"><span>一件数据</span>
                </a>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('nums', ' 取得往期条数为： ', ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::input('nums','nums', $num, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.dashboard')}}" class="btn btn-danger btn-xs">关闭</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop
