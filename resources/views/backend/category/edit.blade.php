@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management') . ' | ' . trans('menus.create_article'))
@section('uedit-scripts-need')
  <!-- 如果有需要在此处加JS的话，加在这里，继承了ueditneed -->  
@stop
@section('page-header')
    <h1>
        {{ trans('menus.category_management') }}
        <small>{{ trans('menus.create_category') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['url' => 'admin/category/update/'.$category->id, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.create_category') }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', trans('validation.category.name'), ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => trans('strings.category.name')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('desc', trans('validation.category.desc'), ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::text('desc', $category->desc, ['class' => 'form-control', 'placeholder' => trans('strings.category.desc')]) !!}
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.category.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop
