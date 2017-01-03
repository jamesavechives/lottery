@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management') . ' | ' . trans('menus.create_article'))
@section('uedit-scripts-need')
        <!-- 如果有需要在此处加JS的话，加在这里，继承了ueditneed -->
@stop
@section('page-header')
    <h1>
        {{ trans('menus.article_management') }}
        <small>{{ trans('menus.create_article') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.staticarray.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.create_article') }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                    {!! Form::label('title', ' 分区名称： ', ['class' => 'col-lg-12 text-left']) !!}
                    <div class="col-lg-12">
                        {!! Form::input('title','title', null, ['class' => 'form-control']) !!}
                    </div>
            </div>
            <div class="form-group">
                {!! Form::label('zone_nums', ' 子分区个数： ', ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::selectRange('zone_nums', 1 , 5 , 1, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('begin_nums', ' 起始值： ', ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::selectRange('begin_nums', 0 , 1 , 0, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('desc', ' 分区简介： ', ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::textarea('desc', '请在这里输入分区简介！', ['class' => 'form-control']) !!}
                </div>
            </div>

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.staticarray.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop
