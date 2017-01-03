<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container2">
            <div class="navbar-header">
                <a href="/" class="navbar-brand"><b>彩票网</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav2 navbar-nav yateng">
                    <li class="active">
                        <a href="/">首页</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">彩票走势图<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/zst/cqssc/20" target="_blank">横纵斜走勢</a></li>
                            <li><a href="/zst/cqssc/zxzs/20" target="_blank">120/60走勢</a></li>
                            <li><a href="/zst/cqssc/statarr/20/" target="_blank">静态数组走勢</a></li>
                            <li><a href="/zst/cqssc/livearr/20/" target="_blank">动态数组走勢</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">精彩文章<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/article/cat/1" target="_blank">彩票玩法</a></li>
                            <li><a href="/article/cat/3" target="_blank">彩种介绍</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav2 navbar-nav yateng">
                @if (Auth::guest())
                    <li>{!! link_to('auth/login', trans('navs.login')) !!}</li>
                    <li>{!! link_to('auth/register', trans('navs.register')) !!}</li>
                @else
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('/images/admin.jpg')}}" class="user-image">
                            <span class="hidden-xs">{{ access()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{asset('/images/admin.jpg')}}" class="img-circle">
                                <p> { 会员：{{ access()->user()->truename }} }
                                    <small>{ {{ access()->user()->email }} }</small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-6 text-center">
                                        <a href="{!!url('dashboard')!!}" class="btn btn-warning btn-xs">个人信息</a>
                                    </div>
                                    @if (access()->user()->canChangePassword())
                                    <div class="col-xs-6 text-center">
                                        <a href="{!!url('auth/password/change')!!}" class="btn btn-danger btn-xs">修改密码</a>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat guanbi">关闭</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/auth/logout" class="btn btn-default btn-flat">
                                        {{ trans('navs.logout') }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>