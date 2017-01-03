@extends ('backend.layouts.master')

@section ('title', trans('menus.wishes_management') . ' | ' . trans('menus.create_wishes'))
@section('uedit-scripts-need')
  <!-- 如果有需要在此处加JS的话，加在这里，继承了ueditneed -->  
@stop
@section('page-header')
    <h1>
        {{ trans('menus.wishes_management') }}
        <small>{{ trans('menus.create_wishes') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['url' => 'admin/wishes/update/'.$wish->id, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.create_wishes') }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', trans('validation.wishes.name'), ['class' => 'col-lg-2 text-left']) !!}
                <div class="col-lg-10">
                    {!! Form::text('name', $wish->name, ['class' => 'form-control', 'placeholder' => trans('strings.wishes.name')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('begin', '开始日期:',['class' => 'col-lg-2 text-left']) !!}
                <div class="col-lg-10">
                {!! Form::text('begin', $wish->begin, ['class' => 'form-control','id' => 'wish_begin']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('end', '结束日期:',['class' => 'col-lg-2 text-left']) !!}
                <div class="col-lg-10">
                {!! Form::text('end', $wish->end, ['class' => 'form-control','id' => 'wish_end']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content', trans('validation.wishes.content'), ['class' => 'col-lg-12 text-left']) !!}
                <div class="col-lg-12">
                    {!! Form::textarea('content', $wish->content, ['class' => 'form-control', 'id' => 'summernote', 'placeholder' => 'Hello Summernote']) !!}
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
                            height: 100,              
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
                <a href="{{route('admin.wishes.index')}}" class="btn btn-danger btn-xs">{{ trans('strings.cancel_button') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('strings.save_button') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop
