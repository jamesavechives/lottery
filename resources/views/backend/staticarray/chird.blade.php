@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management') . ' | ' . trans('menus.create_article'))
@section('uedit-scripts-need')
        <!-- 如果有需要在此处加JS的话，加在这里，继承了ueditneed -->
@stop
@section('page-header')
    <h1>
        子分区值设置
        <small>子分区</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => ['admin.staticarray.change', 'id'=>$arr->xu], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    {!! Form::hidden('par', $arr->par) !!}
    {!! Form::hidden('val', $arr->val) !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">修改值</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', '子分区名称：', ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::text('name', $arr->name, ['class' => 'form-control', 'placeholder' => trans('strings.article.name')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('info', '子分区的包含的值：', ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::textarea('info', $arr->info, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="javascript:history.go(-1)" class="btn btn-danger btn-xs">返回</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop
