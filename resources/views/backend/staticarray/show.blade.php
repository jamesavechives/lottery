@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management'))

@section('page-header')
    <h1>
        子分区数组
        <small>子分区</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">子分区</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('admin/staticarray/index') }}" class="btn btn-xs btn-info">
                    <i class="fa fa-plus" aria-hidden="true"></i> <span> 返回父分区</span>
                </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">子分区名称</th>
                        <th class="text-center">子分区包含号码</th>
                        <th class="text-center">子分区的值</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 1; $i <= count($infos); $i++)

                        <tr>
                            <td class="text-center static-array-name" data-par="{!! $i !!}">
                                {!! $infos[$i]->name !!}
                            </td>
                            <td class="text-center static-array-info" data-par="{!! $i !!}">{!! str_limit($infos[$i]->info, $limit = 100, $end = '...') !!}</td>
                            <td class="text-center" >{!! $infos[$i]->val !!}</td>
                            <td class="text-center">
                                <a href="{!! url('admin/staticarray/chird/'.($infos[$i]->par).'/'.$i) !!}" class="btn btn-xs btn-info">
                                    修改</a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
