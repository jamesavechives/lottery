@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management'))

@section('page-header')
    <h1>
        静态数组设定
        <small>静态数组</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">静态数组</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('admin/staticarray/create') }}" class="btn btn-xs btn-info">
                    <i class="fa fa-plus" aria-hidden="true"></i> <span>{{ trans('crud.add') }}</span>
                </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">分区名称</th>
                        <th class="text-center">分区简介</th>
                        <th class="text-center">子分区个数</th>
                        <th class="text-center">子分区起始值</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($arrs as $arr)
                        <tr>
                            <td class="text-center">{!! $arr->title !!}</td>
                            <td class="text-center">{!! $arr->desc !!}</td>
                            <td class="text-center">{!! $arr->zone_nums !!}</td>
                            <td class="text-center">{!! $arr->begin_nums !!}</td>
                            <td class="text-center">
                                <a href="/admin/staticarray/show/{!! $arr->id !!}" class="btn btn-xs btn-primary">
                                    子分区
                                </a>
                                <a href="/protect/makeinfo/index/{!! $arr->title !!}/{!! $arr->begin_nums !!}/{!! $arr->zone_nums !!}/cqssc" class="btn btn-xs btn-danger">
                                    一键数据
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ trans('crud.article.total') }}
            </div>

            <div class="pull-right">

            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
