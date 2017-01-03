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
    {!! Form::open(['url' => 'admin/article/update/'.$article->id, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.create_article') }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('title', trans('validation.article.name'), ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => trans('strings.article.name')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('desc', trans('validation.article.desc'), ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::text('desc', $article->desc, ['class' => 'form-control', 'placeholder' => trans('strings.article.desc')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('category_id', '分类：', ['class' => 'col-md-12 text-left']) !!}
                <div class="col-md-12">
                    {!! Form::select('category_id', $article->catall,$article->category_id   ,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content', trans('validation.article.content'), ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::textarea('content', $article->content, ['class' => 'form-control', 'id' => 'summernote', 'placeholder' => 'Hello Summernote']) !!}
                </div>
                <script>
                    $(document).ready(function() {
                      $('#summernote').summernote({
                            toolbar: [
                                //[groupname, [button list]]  
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['font', ['strikethrough']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['height', ['height']],
                            ],
                            lang: 'zh-CN',
                            height: 300,              
                            minHeight: null,           
                            maxHeight: null,            
                            focus: true                
                      });
                    });
                </script>
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.article.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop
