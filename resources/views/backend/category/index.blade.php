@extends ('backend.layouts.master')

@section ('title', trans('menus.category_management'))

@section('page-header')
    <h1>
        {{ trans('menus.category_management') }}
        <small>{{ trans('menus.active_category') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.active_category') }}</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('admin/category/create') }}" class="btn btn-xs btn-info">
                    <i class="fa fa-plus" aria-hidden="true"></i> <span>{{ trans('crud.add') }}</span>
                </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('crud.category.id') }}</th>
                        <th>{{ trans('crud.category.name') }}</th>
                        <th>{{ trans('crud.category.desc') }}</th>
                        <th>{{ trans('crud.category.update') }}</th>
                        <th>{{ trans('crud.category.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{!! $category->id !!}</td>
                            <td>{!! $category->name !!}</td>
                            <td>{!! $category->desc !!}</td>
                            <td>{!! $category->updated_at !!}</td>
                            <td>
                                <a href="{{ url('admin/category/edit') }}/{!! $category->id !!}" class="btn btn-xs btn-primary">
                                    {{ trans('crud.edit') }}
                                </a>
                                <a href="{{ url('admin/category/delet') }}/{!! $category->id !!}" class="btn btn-xs btn-danger">
                                    {{ trans('crud.delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ trans('crud.category.total') }} {!! $categories->total() !!}
            </div>

            <div class="pull-right">
                {!! $categories->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
