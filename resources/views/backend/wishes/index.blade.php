@extends ('backend.layouts.master')

@section ('title', trans('menus.wishes_management'))

@section('page-header')
    <h1>
        {{ trans('menus.wishes_management') }}
        <small>{{ trans('menus.active_wishes') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.active_wishes') }}</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('admin/wishes/create') }}" class="btn btn-xs btn-info">
                    <i class="fa fa-plus" aria-hidden="true"></i> <span>{{ trans('crud.add') }}</span>
                </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('crud.wishes.id') }}</th>
                        <th>{{ trans('crud.wishes.name') }}</th>
                        <th>{{ trans('crud.wishes.content') }}</th>
                        <th>{{ trans('crud.wishes.begin') }}</th>
                        <th>{{ trans('crud.wishes.end') }}</th>
                        <th>{{ trans('crud.wishes.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($wishes as $wish)
                        <tr>
                            <td>{!! $wish->id !!}</td>
                            <td>{!! $wish->name !!}</td>
                            <td>{!! $wish->content !!}</td>
                            <td>{!! $wish->begin !!}</td>
                            <td>{!! $wish->end !!}</td>
                            <td>
                                <a href="{{ url('admin/wishes/edit') }}/{!! $wish->id !!}" class="btn btn-xs btn-primary">
                                    {{ trans('crud.edit') }}
                                </a>
                                <a href="{{ url('admin/wishes/delet') }}/{!! $wish->id !!}" class="btn btn-xs btn-danger">
                                    {{ trans('crud.delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ trans('crud.wishes.total') }} {!! $wishes->total() !!}
            </div>

            <div class="pull-right">
                {!! $wishes->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
