@extends ('backend.layouts.master')

@section ('title', trans('menus.article_management'))

@section('page-header')
    <h1>
        {{ trans('menus.article_management') }}
        <small>{{ trans('menus.active_article') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.active_article') }}</h3>
            <div class="box-tools pull-right">
                <a href="{{ url('admin/article/create') }}" class="btn btn-xs btn-info">
                    <i class="fa fa-plus" aria-hidden="true"></i> <span>{{ trans('crud.add') }}</span>
                </a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('crud.article.id') }}</th>
                        <th>{{ trans('crud.article.name') }}</th>
                        <th>所属分类</th>
                        <th>{{ trans('crud.article.desc') }}</th>
                        <th>{{ trans('crud.article.update') }}</th>
                        <th>{{ trans('crud.article.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{!! $article->id !!}</td>
                            <td>{!! $article->title !!}</td>
                            <td>{!! $article->category->name !!}</td>
                            <td>{!! $article->desc !!}</td>
                            <td>{!! $article->updated_at !!}</td>
                            <td>
                                <a href="{{ url('admin/article/edit') }}/{!! $article->id !!}" class="btn btn-xs btn-primary">
                                    {{ trans('crud.edit') }}
                                </a>
                                <a href="{{ url('admin/article/delet') }}/{!! $article->id !!}" class="btn btn-xs btn-danger">
                                    {{ trans('crud.delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ trans('crud.article.total') }} {!! $articles->total() !!}
            </div>

            <div class="pull-right">
                {!! $articles->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
