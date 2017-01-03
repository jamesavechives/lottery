<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('images/admin.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.search_placeholder') }}"/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.general') }}</li>
            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{!!route('admin.dashboard')!!}">
                    <span>{{ trans('menus.dashboard') }}</span>
                </a>
            </li>
            @permission('view-access-management')
            <li class="{{ Active::pattern('admin/access/*') }}"><a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.access_management') }}</span></a></li>
            @endauth
            {{--祝福语设置--}}
            <li class="">
                <a href="{!! URL('admin/wishes/index') !!}">
                    <span>{{ trans('menus.wishes_management') }}</span>
                </a>
            </li>
            {{--文章管理--}}
            <li class="treeview">
                <a href="#">
                    <span>{{ trans('menus.article.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="">
                        <a href="{{ URL('/admin/article/index') }}">
                            {{ trans('menus.article.main') }}
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ URL('/admin/category/index') }}">
                            {{ trans('menus.article.cart') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{--走势图相关--}}
            <li class="treeview">
                <a href="#">
                    <span>{{ trans('menus.zst.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="">
                        <a href="{{ URL('/admin/staticarray/index') }}">
                            {{ trans('menus.zst.shuzu_jingtai') }}
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ URL('/admin/livearray/index') }}">
                            {{ trans('menus.zst.shuzu_dongtai') }}
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ URL('/admin/bigdata/index') }}">
                            大底数生成设置
                        </a>
                    </li>
                </ul>
            </li>
            {{--用户相关--}}
            <li class="treeview">
                <a href="#">
                    <span>用户相关</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="">
                        <a href="{{ URL('/admin/staticarray/index') }}">
                            用户操作记录
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <span>{{ trans('menus.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <!-- <li class="{{ Active::pattern('admin/log-viewer') }}">
                        <a href="{!! url('admin/log-viewer') !!}">
                            {{ trans('menus.log-viewer.dashboard') }}
                        </a>
                    </li> -->
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        <a href="{!! url('admin/log-viewer/logs') !!}">
                            {{ trans('menus.log-viewer.logs') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>