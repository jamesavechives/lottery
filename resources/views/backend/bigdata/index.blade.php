@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management'))

@section('page-header')
    <h1>
        设置大底数
        <small>大底数</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">大底数信息</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-lg-10 text-center">大底数</th>
                        <th class="col-lg-2 text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>五位大底数</td>
                            <td class="text-center">
                                <a href="{{ url('admin/bigdata/edit') }}/5" class="btn btn-xs btn-primary">一键生成</a>
                            </td>
                        </tr>
                        <tr>
                            <td>四位大底数</td>
                            <td class="text-center">
                                <a href="{{ url('admin/bigdata/edit') }}/4" class="btn btn-xs btn-primary">一键生成</a>
                            </td>
                        </tr>
                        <tr>
                            <td>三位大底数</td>
                            <td class="text-center">
                                <a href="{{ url('admin/bigdata/edit') }}/3" class="btn btn-xs btn-primary">一键生成</a>
                            </td>
                        </tr>
                        <tr>
                            <td>两位大底数</td>
                            <td class="text-center">
                                <a href="{{ url('admin/bigdata/edit') }}/2" class="btn btn-xs btn-primary">一键生成</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
