@extends('frontend.layouts.master')
@section('witch-css-need')
<link rel="stylesheet" href="{{asset('frontend/css/style_other.css')}}">
@endsection
@section('witch-js-need')
<script src="{{asset('frontend/js/ajaxstatarr.js')}}"></script>
<script src="{{asset('frontend/js/myapp.js')}}"></script>
<script src="{{asset('frontend/js/statarr.content.js')}}"></script>
<script async="" src="{{asset('frontend/js/FileSaver.min.js')}}"></script>
@endsection
@section('header')
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
@endsection
@section('content')
<div class="content-wrapper clear">
    <div class="site">
        <strong>您当前的位置：</strong>
        <a href="/">彩票网</a> &gt;
        <a href="/zst/cqssc/20">走势图表</a> &gt;老时时彩
    </div>
    <div class="wrap">
        <div class="chart-hd">
            <div class="logo">
                <img src="{{asset('frontend/images/cqssc.png')}}" /> 老时时彩
            </div>
            <div class="lot">
                <span class="lot-btn">切换彩种</span>
                <div class="lot-pop" style="display:none">
                    <dl>
                        <dt>
                            <span class="icon-1"></span>时时彩：
                        </dt>
                        <dd>
                            <ul>
                                <li>
                                    <a href="/zst/cqssc/20" target="_blank">重庆</a>
                                    <a href="/zst/tjssc/20" target="_blank">天津</a>
                                </li>
                                <li>
                                    <a href="/zst/xjssc/20" target="_blank">新疆</a>
                                    <a href="/zst/p5/20" target="_blank">P 5</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
            <ul class="chart-tag">
                <li class="cur"><span><a href="#">基本走势</a></span></li>
            </ul>
            <div class="xsycq sjppage">
                <strong>显示/隐藏：</strong>
                <label>
                    <input type="checkbox" name="allcheck"  value="qb" class=" quanxuansjp active" />
                    &nbsp;全选&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" value="ycqh" class="biaozhusjp active" />
                    &nbsp;期号&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="sjp" class="biaozhusjp active" />
                    &nbsp;升降平&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="jl"  class="biaozhusjp active" />
                    &nbsp;距离&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="jl2"  class="biaozhusjp active" />
                    &nbsp;距离的距离&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="jl3"  class="biaozhusjp active" />
                    &nbsp;距离的距离的距离&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="jl4"  class="biaozhusjp active" />
                    &nbsp;距离的距离的距离的距离&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="lye" class="biaozhusjp active" />
                    &nbsp;012&nbsp;
                </label>
                <label>
                    <input type="checkbox" name="show_on_off" checked="checked" value="dx" class="biaozhusjp active" />
                    &nbsp;大小&nbsp;
                </label>
            </div>
        </div>

        <div class="chart-nav2" lot="255401" ct="x5zh">
            <ul>
                <li class="fenxi">
                    <span><strong>分析方式:</strong></span>
                    <button type="button" data-fx='ALL' class='fxa fxbt active'>全部</button>
                    <button type="button" data-fx='1' class="fx fxbt sjpfxa active">万</button>
                    <button type="button" data-fx='2' class="fx fxbt sjpfxa active">千</button>
                    <button type="button" data-fx='3' class="fx fxbt sjpfxa active">百</button>
                    <button type="button" data-fx='4' class="fx fxbt sjpfxa active">十</button>
                    <button type="button" data-fx='5' class="fx fxbt sjpfxa active">个</button>
                </li>
                <li class="ksfx">
                    <span><strong>快选:</strong></span>
                    <button type="button" data-fx='QS' class="kx fxbt">前四</button>
                    <button type="button" data-fx='HS' class="kx fxbt">后四</button>
                </li>
            </ul>
        </div>

        <div class="chart-sc">
            <ul class="qishude">
                <li><strong>显示：</strong></li>
                <li class="btn-scs sanshi active " data-qishus='20'>20期</li>
                <li class="btn-scs sanshi" data-qishus='30'>30期</li>
                <li class="btn-scs sanshi" data-qishus='50'>50期</li>
                <li class="btn-scs sanshi" data-qishus='100'>100期</li>
            </ul>
            <strong>标注：</strong>
            <label><input type="checkbox" name="options" checked="checked" value="yl" class="biaozhu active" />&nbsp;遗漏数据&nbsp;</label>
            <label><input type="checkbox" name="options" value="ylfc" class="biaozhu ylfc" />&nbsp;遗漏分层&nbsp;</label>
            <label><input type="checkbox" name="options" value="fq"  class="biaozhu fq" />&nbsp;分区线&nbsp;</label>
            <label><input type="checkbox" name="options" value="fd" class="biaozhu fd" />&nbsp;分段线&nbsp;</label>
            <label><input type="checkbox" name="options" value="fyqh" class="biaozhu fyqh" />&nbsp;方形样式&nbsp;</label>
        </div>

        <div class="zst_all">
            <table id="zuxuan120">
                <thead>
                    <tr class="gongtrstat">
                        <th rowspan="2" class="qihao yxqycss"><div class="qihao_div">期号</div></th>
                        <td rowspan="2" class="fqtds"></td>
                        <th rowspan="2" class="kjhaos"><div class="kjhaos_div">开奖号</div></th>
                        <td rowspan="2" class="fqtds"></td>
                        <th colspan="5"  id="about120"><div class="about120stat_div">数组</div></th>
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="3" class="zxdsjpshowoff"><div class="sjp0">升降平 <span class="sjpjlshow"><img src="{{asset('frontend/images/xia.png')}}" alt="" id="imgshow"></span></div></th>
                        <th colspan="3" class="zxdsjpshowoff"><div class="sjp0">升降平</div></th>
                        <!-- <th colspan="6" class="nimeide">升降平的距离</th>
                        <th colspan="3" class="nimeide">升降平</th>
                        <th colspan="3" class="nimeide">升降平</th> -->
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="5" class="jlshowoff wojian1"><div class="jls0">距离</div></th>
                        <th colspan="3" class="jlshowoff"><div class="sjp0">升降平 <span class="sjpjlshow jlsjpjlshow"><img src="{{asset('frontend/images/xia.png')}}" alt="" id="imgshow2"></span></div></th>
                        <th colspan="3" class="jlshowoff"><div class="sjp0">升降平</div></th>
                        <!-- <th colspan="6" class="nimeide2">距离升降平的距离</th>
                        <th colspan="3" class="nimeide2">升降平</th>
                        <th colspan="3" class="nimeide2">升降平</th> -->
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="5" class="jl2showoff wojian2"><div class="jls1">距离的距离</div></th>
                        <th colspan="3" class="jl2showoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="jl2showoff"><div class="sjp0">升降平</div></th>
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="5" class="jl3showoff wojian3"><div class="jls2">距离三</div></th>
                        <th colspan="3" class="jl3showoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3"  class="jl3showoff"><div class="sjp0">升降平</div></th>
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="5"  class="jl4showoff wojian4"><div class="jls3">距离四</div></th>
                        <th colspan="3" class="jl4showoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="jl4showoff"><div class="sjp0">升降平</div></th>
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="3" class="qm012showoff"><div class="qm012s0">012</div></th>
                        <th colspan="3" class="qm012showoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="qm012showoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="qm012showoff"><div class="qm012s0">012的距离</div></th>
                        <th colspan="3" class="qm012showoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="qm012showoff"><div class="sjp0">升降平</div></th>
                        <td class='fqtds'><div class='xian'></div></td>
                        <th colspan="3" class="dxshowoff"><div class="dxs0">大中小</div></th>
                        <th colspan="3" class="dxshowoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="dxshowoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="dxshowoff"><div class="dxs0">大中小距离</div></th>
                        <th colspan="3" class="dxshowoff"><div class="sjp0">升降平</div></th>
                        <th colspan="3" class="dxshowoff"><div class="sjp0">升降平</div></th>
                    </tr>
                    <tr class="gongtrstat">
                        <td class="zx120 " id="astat">A</td>
                        <td class="zx120 " id="bstat">B</td>
                        <td class="zx120 " id="cstat">C</td>
                        <td class="zx120 " id="dstat">D</td>
                        <td class="zx120 " id="estat">E</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--升降屏-->
                        <td class="sjpinfo zxdsjpshowoff">升</td>
                        <td class="sjpinfo zxdsjpshowoff">平</td>
                        <td class="sjpinfo zxdsjpshowoff">降</td>
                        <td class="sjpinfo zxdsjpshowoff">升</td>
                        <td class="sjpinfo zxdsjpshowoff">平</td>
                        <td class="sjpinfo zxdsjpshowoff">降</td>
                        <!-- <td class="jlinfo nimeide">0</td>
                        <td class="jlinfo nimeide">1</td>
                        <td class="jlinfo nimeide">2</td>
                        <td class="jlinfo nimeide">3</td>
                        <td class="jlinfo nimeide">4</td>
                        <td class="jlinfo nimeide">5</td>
                        <td class="sjpinfo nimeide">升</td>
                        <td class="sjpinfo nimeide">平</td>
                        <td class="sjpinfo nimeide">降</td>
                        <td class="sjpinfo nimeide">升</td>
                        <td class="sjpinfo nimeide">平</td>
                        <td class="sjpinfo nimeide">降</td> -->
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--距离-->
                        <td class="jlinfo jlshowoff">0</td>
                        <td class="jlinfo jlshowoff">1</td>
                        <td class="jlinfo jlshowoff">2</td>
                        <td class="jlinfo jlshowoff">3</td>
                        <td class="jlinfo qudiaos jlshowoff">4</td>
                        <td class="sjpinfo jlshowoff">升</td>
                        <td class="sjpinfo jlshowoff">平</td>
                        <td class="sjpinfo jlshowoff">降</td>
                        <td class="sjpinfo jlshowoff">升</td>
                        <td class="sjpinfo jlshowoff">平</td>
                        <td class="sjpinfo jlshowoff">降</td>
                        <!-- <td class="jlinfo nimeide2">0</td>
                        <td class="jlinfo nimeide2">1</td>
                        <td class="jlinfo nimeide2">2</td>
                        <td class="jlinfo nimeide2">3</td>
                        <td class="jlinfo nimeide2">4</td>
                        <td class="jlinfo nimeide2">5</td>
                        <td class="sjpinfo nimeide2">升</td>
                        <td class="sjpinfo nimeide2">平</td>
                        <td class="sjpinfo nimeide2">降</td>
                        <td class="sjpinfo nimeide2">升</td>
                        <td class="sjpinfo nimeide2">平</td>
                        <td class="sjpinfo nimeide2">降</td> -->
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--距离的距离-->
                        <td class="jlinfo jlshowoff">0</td>
                        <td class="jlinfo jlshowoff">1</td>
                        <td class="jlinfo jlshowoff">2</td>
                        <td class="jlinfo jlshowoff">3</td>
                        <td class="jlinfo qudiaos jlshowoff">4</td>
                        <td class="sjpinfo jl2showoff">升</td>
                        <td class="sjpinfo jl2showoff">平</td>
                        <td class="sjpinfo jl2showoff">降</td>
                        <td class="sjpinfo jl2showoff">升</td>
                        <td class="sjpinfo jl2showoff">平</td>
                        <td class="sjpinfo jl2showoff">降</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--距离的距离的距离-->
                        <td class="jlinfo jlshowoff">0</td>
                        <td class="jlinfo jlshowoff">1</td>
                        <td class="jlinfo jlshowoff">2</td>
                        <td class="jlinfo jlshowoff">3</td>
                        <td class="jlinfo qudiaos jlshowoff">4</td>
                        <td class="sjpinfo jl3showoff">升</td>
                        <td class="sjpinfo jl3showoff">平</td>
                        <td class="sjpinfo jl3showoff">降</td>
                        <td class="sjpinfo jl3showoff">升</td>
                        <td class="sjpinfo jl3showoff">平</td>
                        <td class="sjpinfo jl3showoff">降</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--距离的距离的距离的距离-->
                        <td class="jlinfo jlshowoff">0</td>
                        <td class="jlinfo jlshowoff">1</td>
                        <td class="jlinfo jlshowoff">2</td>
                        <td class="jlinfo jlshowoff">3</td>
                        <td class="jlinfo qudiaos jlshowoff">4</td>
                        <td class="sjpinfo jl4showoff">升</td>
                        <td class="sjpinfo jl4showoff">平</td>
                        <td class="sjpinfo jl4showoff">降</td>
                        <td class="sjpinfo jl4showoff">升</td>
                        <td class="sjpinfo jl4showoff">平</td>
                        <td class="sjpinfo jl4showoff">降</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--012-->
                        <td class="jlinfo  qm012showoff">0</td>
                        <td class="jlinfo  qm012showoff">1</td>
                        <td class="jlinfo  qm012showoff">2</td>
                        <td class="sjpinfo qm012showoff">升</td>
                        <td class="sjpinfo qm012showoff">平</td>
                        <td class="sjpinfo qm012showoff">降</td>
                        <td class="sjpinfo qm012showoff">升</td>
                        <td class="sjpinfo qm012showoff">平</td>
                        <td class="sjpinfo qm012showoff">降</td>
                        <td class="jlinfo  qm012showoff">0</td>
                        <td class="jlinfo  qm012showoff">1</td>
                        <td class="jlinfo  qm012showoff">2</td>
                        <td class="sjpinfo qm012showoff">升</td>
                        <td class="sjpinfo qm012showoff">平</td>
                        <td class="sjpinfo qm012showoff">降</td>
                        <td class="sjpinfo qm012showoff">升</td>
                        <td class="sjpinfo qm012showoff">平</td>
                        <td class="sjpinfo qm012showoff">降</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <!--大小-->
                        <td class="jlinfo dxshowoff">小</td>
                        <td class="jlinfo dxshowoff">中</td>
                        <td class="jlinfo dxshowoff">大</td>
                        <td class="sjpinfo dxshowoff">升</td>
                        <td class="sjpinfo dxshowoff">平</td>
                        <td class="sjpinfo dxshowoff">降</td>
                        <td class="sjpinfo dxshowoff">升</td>
                        <td class="sjpinfo dxshowoff">平</td>
                        <td class="sjpinfo dxshowoff">降</td>
                        <td class="sjpinfo dxshowoff">0</td>
                        <td class="sjpinfo dxshowoff">1</td>
                        <td class="sjpinfo dxshowoff">2</td>
                        <td class="sjpinfo dxshowoff">升</td>
                        <td class="sjpinfo dxshowoff">平</td>
                        <td class="sjpinfo dxshowoff">降</td>
                        <td class="sjpinfo dxshowoff">升</td>
                        <td class="sjpinfo dxshowoff">平</td>
                        <td class="sjpinfo dxshowoff">降</td>
                    </tr>
                </thead>
                <tbody id="data-tab-statarr" class="">
                </tbody>
                <tfoot>
                    <tr class="yuce gongtr yuceone">
                        <td rowspan="3" id="yc" class="qihao yxqycss">预测区<span class="ershi qichuzx">清除</span></td>
                        <td rowspan="3" class="fqtds"></td>
                        <td class="yckjh kjhaos" >预测号</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td data-yuce ='1' class="scycsjp bs120"></td>
                        <td data-yuce ='2' class="scycsjp bs60"></td>
                        <td data-yuce ='3' class="scycsjp bs30"></td>
                        <td data-yuce ='4' class="scycsjp bs20"></td>
                        <td data-yuce ='5' class="scycsjp qudiaos bs10"></td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff qudiaos hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                    </tr>
                    <tr class="yuce gongtr yucetwo">
                        <td class="yckjh kjhaos" >预测号</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td data-yuce ='1' class="scycsjp bs120"></td>
                        <td data-yuce ='2' class="scycsjp bs60"></td>
                        <td data-yuce ='3' class="scycsjp bs30"></td>
                        <td data-yuce ='4' class="scycsjp bs20"></td>
                        <td data-yuce ='5' class="scycsjp qudiaos bs5"></td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff qudiaos hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                    </tr>
                    <tr class="yuce gongtr yucethree">
                        <td class="yckjh kjhaos" >预测号</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td data-yuce ='1' class="scycsjp bs120"></td>
                        <td data-yuce ='2' class="scycsjp bs60"></td>
                        <td data-yuce ='3' class="scycsjp bs30"></td>
                        <td data-yuce ='4' class="scycsjp bs20"></td>
                        <td data-yuce ='5' class="scycsjp qudiaos bs5"></td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='zxdsjpshowoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff qudiaos hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='jlshowoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>
                        <td class='jl2showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>
                        <td class='jl3showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd qudiaos'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>
                        <td class='jl4showoff hmsjp qichusd'> </td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='qm012showoff hmsjp qichusd'> </td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                        <td class='dxshowoff hmsjp qichusd'> </td>
                    </tr>

                    <tr class="tingji gongtr statarr-tjf">
                        <td rowspan="4" id="yc" class="qihao yxqycss">统计区</td>
                        <td rowspan="4" class="fqtds"></td>
                        <td class="yckjh kjhaos">出现次数</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_zx'></td>
                        <td  class='heng count_zx'></td>
                        <td  class='heng count_zx'></td>
                        <td  class='heng count_zx'></td>
                        <td  class='heng count_zx'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='zong count_sjp'></td>
                        <td  class='zong count_sjp'></td>
                        <td  class='zong count_sjp'></td>
                        <td  class='sjpdsjpinfo count_sjp2'></td>
                        <td  class='sjpdsjpinfo count_sjp2'></td>
                        <td  class='sjpdsjpinfo count_sjp2'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_jl'><span></span></td>
                        <td  class='heng count_jl'><span></span></td>
                        <td  class='heng count_jl'><span></span></td>
                        <td  class='heng count_jl'><span></span></td>
                        <td  class='heng count_jl'><span></span></td>

                        <td  class='zong count_jlsjp'><span></span></td>
                        <td  class='zong count_jlsjp'><span></span></td>
                        <td  class='zong count_jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_jl2'><span></span></td>
                        <td  class='heng count_jl2'><span></span></td>
                        <td  class='heng count_jl2'><span></span></td>
                        <td  class='heng count_jl2'><span></span></td>
                        <td  class='heng count_jl2'><span></span></td>

                        <td  class='zong count_jl2sjp'><span></span></td>
                        <td  class='zong count_jl2sjp'><span></span></td>
                        <td  class='zong count_jl2sjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl2sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_jl3'><span></span></td>
                        <td  class='heng count_jl3'><span></span></td>
                        <td  class='heng count_jl3'><span></span></td>
                        <td  class='heng count_jl3'><span></span></td>
                        <td  class='heng count_jl3'><span></span></td>

                        <td  class='zong count_jl3sjp'><span></span></td>
                        <td  class='zong count_jl3sjp'><span></span></td>
                        <td  class='zong count_jl3sjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl3sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_jl4'><span></span></td>
                        <td  class='heng count_jl4'><span></span></td>
                        <td  class='heng count_jl4'><span></span></td>
                        <td  class='heng count_jl4'><span></span></td>
                        <td  class='heng count_jl4'><span></span></td>

                        <td  class='zong count_jl4sjp'><span></span></td>
                        <td  class='zong count_jl4sjp'><span></span></td>
                        <td  class='zong count_jl4sjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_jl4sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_qm012'><span></span></td>
                        <td  class='heng count_qm012'><span></span></td>
                        <td  class='heng count_qm012'><span></span></td>

                        <td  class='zong count_qm012sjp'><span></span></td>
                        <td  class='zong count_qm012sjp'><span></span></td>
                        <td  class='zong count_qm012sjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_qm012sjp2'><span></span></td>

                        <td  class='heng count_qm012jl'><span></span></td>
                        <td  class='heng count_qm012jl'><span></span></td>
                        <td  class='heng count_qm012jl'><span></span></td>

                        <td  class='zong count_qm012jlsjp'><span></span></td>
                        <td  class='zong count_qm012jlsjp'><span></span></td>
                        <td  class='zong count_qm012jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_qm012jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng count_dx'><span></span></td>
                        <td  class='heng count_dx'><span></span></td>
                        <td  class='heng count_dx'><span></span></td>


                        <td  class='zong count_dxsjp'><span></span></td>
                        <td  class='zong count_dxsjp'><span></span></td>
                        <td  class='zong count_dxsjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_dxsjp2'><span></span></td>


                        <td  class='heng count_dxjl'><span></span></td>
                        <td  class='heng count_dxjl'><span></span></td>
                        <td  class='heng count_dxjl'><span></span></td>

                        <td  class='zong count_dxjlsjp'><span></span></td>
                        <td  class='zong count_dxjlsjp'><span></span></td>
                        <td  class='zong count_dxjlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo count_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo count_dxjlsjp2'><span></span></td>
                    </tr>
                    <tr class="tongji gongtr statarr-tjf">
                        <td class="yckjh kjhaos">平均遗漏</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_zx'></td>
                        <td  class='heng pjyl_zx'></td>
                        <td  class='heng pjyl_zx'></td>
                        <td  class='heng pjyl_zx'></td>
                        <td  class='heng pjyl_zx'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='zong pjyl_sjp'></td>
                        <td  class='zong pjyl_sjp'></td>
                        <td  class='zong pjyl_sjp'></td>
                        <td  class='sjpdsjpinfo pjyl_sjp2'></td>
                        <td  class='sjpdsjpinfo pjyl_sjp2'></td>
                        <td  class='sjpdsjpinfo pjyl_sjp2'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_jl'><span></span></td>
                        <td  class='heng pjyl_jl'><span></span></td>
                        <td  class='heng pjyl_jl'><span></span></td>
                        <td  class='heng pjyl_jl'><span></span></td>
                        <td  class='heng pjyl_jl'><span></span></td>

                        <td  class='zong pjyl_jlsjp'><span></span></td>
                        <td  class='zong pjyl_jlsjp'><span></span></td>
                        <td  class='zong pjyl_jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_jl2'><span></span></td>
                        <td  class='heng pjyl_jl2'><span></span></td>
                        <td  class='heng pjyl_jl2'><span></span></td>
                        <td  class='heng pjyl_jl2'><span></span></td>
                        <td  class='heng pjyl_jl2'><span></span></td>

                        <td  class='zong pjyl_jl2sjp'><span></span></td>
                        <td  class='zong pjyl_jl2sjp'><span></span></td>
                        <td  class='zong pjyl_jl2sjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl2sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_jl3'><span></span></td>
                        <td  class='heng pjyl_jl3'><span></span></td>
                        <td  class='heng pjyl_jl3'><span></span></td>
                        <td  class='heng pjyl_jl3'><span></span></td>
                        <td  class='heng pjyl_jl3'><span></span></td>

                        <td  class='zong pjyl_jl3sjp'><span></span></td>
                        <td  class='zong pjyl_jl3sjp'><span></span></td>
                        <td  class='zong pjyl_jl3sjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl3sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_jl4'><span></span></td>
                        <td  class='heng pjyl_jl4'><span></span></td>
                        <td  class='heng pjyl_jl4'><span></span></td>
                        <td  class='heng pjyl_jl4'><span></span></td>
                        <td  class='heng pjyl_jl4'><span></span></td>

                        <td  class='zong pjyl_jl4sjp'><span></span></td>
                        <td  class='zong pjyl_jl4sjp'><span></span></td>
                        <td  class='zong pjyl_jl4sjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_jl4sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_qm012'><span></span></td>
                        <td  class='heng pjyl_qm012'><span></span></td>
                        <td  class='heng pjyl_qm012'><span></span></td>

                        <td  class='zong pjyl_qm012sjp'><span></span></td>
                        <td  class='zong pjyl_qm012sjp'><span></span></td>
                        <td  class='zong pjyl_qm012sjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_qm012sjp2'><span></span></td>

                        <td  class='heng pjyl_qm012jl'><span></span></td>
                        <td  class='heng pjyl_qm012jl'><span></span></td>
                        <td  class='heng pjyl_qm012jl'><span></span></td>

                        <td  class='zong pjyl_qm012jlsjp'><span></span></td>
                        <td  class='zong pjyl_qm012jlsjp'><span></span></td>
                        <td  class='zong pjyl_qm012jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_qm012jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng pjyl_dx'><span></span></td>
                        <td  class='heng pjyl_dx'><span></span></td>
                        <td  class='heng pjyl_dx'><span></span></td>


                        <td  class='zong pjyl_dxsjp'><span></span></td>
                        <td  class='zong pjyl_dxsjp'><span></span></td>
                        <td  class='zong pjyl_dxsjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_dxsjp2'><span></span></td>


                        <td  class='heng pjyl_dxjl'><span></span></td>
                        <td  class='heng pjyl_dxjl'><span></span></td>
                        <td  class='heng pjyl_dxjl'><span></span></td>


                        <td  class='zong pjyl_dxjlsjp'><span></span></td>
                        <td  class='zong pjyl_dxjlsjp'><span></span></td>
                        <td  class='zong pjyl_dxjlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo pjyl_dxjlsjp2'><span></span></td>
                    </tr>
                    <tr class="tongji gongtr statarr-tjf">
                        <td class="yckjh kjhaos">最大遗漏</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_zx'></td>
                        <td  class='heng zdyl_zx'></td>
                        <td  class='heng zdyl_zx'></td>
                        <td  class='heng zdyl_zx'></td>
                        <td  class='heng zdyl_zx'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='zong zdyl_sjp'></td>
                        <td  class='zong zdyl_sjp'></td>
                        <td  class='zong zdyl_sjp'></td>
                        <td  class='sjpdsjpinfo zdyl_sjp2'></td>
                        <td  class='sjpdsjpinfo zdyl_sjp2'></td>
                        <td  class='sjpdsjpinfo zdyl_sjp2'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_jl'><span></span></td>
                        <td  class='heng zdyl_jl'><span></span></td>
                        <td  class='heng zdyl_jl'><span></span></td>
                        <td  class='heng zdyl_jl'><span></span></td>
                        <td  class='heng zdyl_jl'><span></span></td>


                        <td  class='zong zdyl_jlsjp'><span></span></td>
                        <td  class='zong zdyl_jlsjp'><span></span></td>
                        <td  class='zong zdyl_jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_jl2'><span></span></td>
                        <td  class='heng zdyl_jl2'><span></span></td>
                        <td  class='heng zdyl_jl2'><span></span></td>
                        <td  class='heng zdyl_jl2'><span></span></td>
                        <td  class='heng zdyl_jl2'><span></span></td>


                        <td  class='zong zdyl_jl2sjp'><span></span></td>
                        <td  class='zong zdyl_jl2sjp'><span></span></td>
                        <td  class='zong zdyl_jl2sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl2sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_jl3'><span></span></td>
                        <td  class='heng zdyl_jl3'><span></span></td>
                        <td  class='heng zdyl_jl3'><span></span></td>
                        <td  class='heng zdyl_jl3'><span></span></td>
                        <td  class='heng zdyl_jl3'><span></span></td>

                        <td  class='zong zdyl_jl3sjp'><span></span></td>
                        <td  class='zong zdyl_jl3sjp'><span></span></td>
                        <td  class='zong zdyl_jl3sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl3sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_jl4'><span></span></td>
                        <td  class='heng zdyl_jl4'><span></span></td>
                        <td  class='heng zdyl_jl4'><span></span></td>
                        <td  class='heng zdyl_jl4'><span></span></td>
                        <td  class='heng zdyl_jl4'><span></span></td>

                        <td  class='zong zdyl_jl4sjp'><span></span></td>
                        <td  class='zong zdyl_jl4sjp'><span></span></td>
                        <td  class='zong zdyl_jl4sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_jl4sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_qm012'><span></span></td>
                        <td  class='heng zdyl_qm012'><span></span></td>
                        <td  class='heng zdyl_qm012'><span></span></td>

                        <td  class='zong zdyl_qm012sjp'><span></span></td>
                        <td  class='zong zdyl_qm012sjp'><span></span></td>
                        <td  class='zong zdyl_qm012sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_qm012sjp2'><span></span></td>

                        <td  class='heng zdyl_qm012jl'><span></span></td>
                        <td  class='heng zdyl_qm012jl'><span></span></td>
                        <td  class='heng zdyl_qm012jl'><span></span></td>

                        <td  class='zong zdyl_qm012jlsjp'><span></span></td>
                        <td  class='zong zdyl_qm012jlsjp'><span></span></td>
                        <td  class='zong zdyl_qm012jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_qm012jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdyl_dx'><span></span></td>
                        <td  class='heng zdyl_dx'><span></span></td>
                        <td  class='heng zdyl_dx'><span></span></td>

                        <td  class='zong zdyl_dxsjp'><span></span></td>
                        <td  class='zong zdyl_dxsjp'><span></span></td>
                        <td  class='zong zdyl_dxsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_dxsjp2'><span></span></td>

                        <td  class='heng zdyl_dxjl'><span></span></td>
                        <td  class='heng zdyl_dxjl'><span></span></td>
                        <td  class='heng zdyl_dxjl'><span></span></td>

                        <td  class='zong zdyl_dxjlsjp'><span></span></td>
                        <td  class='zong zdyl_dxjlsjp'><span></span></td>
                        <td  class='zong zdyl_dxjlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdyl_dxjlsjp2'><span></span></td>
                    </tr>
                    <tr class="tongji gongtr statarr-tjf">
                        <td class="yckjh kjhaos">最大连出</td>
                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_zx'></td>
                        <td  class='heng zdlc_zx'></td>
                        <td  class='heng zdlc_zx'></td>
                        <td  class='heng zdlc_zx'></td>
                        <td  class='heng zdlc_zx'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='zong zdlc_sjp'></td>
                        <td  class='zong zdlc_sjp'></td>
                        <td  class='zong zdlc_sjp'></td>
                        <td  class='sjpdsjpinfo zdlc_sjp2'></td>
                        <td  class='sjpdsjpinfo zdlc_sjp2'></td>
                        <td  class='sjpdsjpinfo zdlc_sjp2'></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_jl'><span></span></td>
                        <td  class='heng zdlc_jl'><span></span></td>
                        <td  class='heng zdlc_jl'><span></span></td>
                        <td  class='heng zdlc_jl'><span></span></td>
                        <td  class='heng zdlc_jl'><span></span></td>

                        <td  class='zong zdlc_jlsjp'><span></span></td>
                        <td  class='zong zdlc_jlsjp'><span></span></td>
                        <td  class='zong zdlc_jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_jl2'><span></span></td>
                        <td  class='heng zdlc_jl2'><span></span></td>
                        <td  class='heng zdlc_jl2'><span></span></td>
                        <td  class='heng zdlc_jl2'><span></span></td>
                        <td  class='heng zdlc_jl2'><span></span></td>

                        <td  class='zong zdlc_jl2sjp'><span></span></td>
                        <td  class='zong zdlc_jl2sjp'><span></span></td>
                        <td  class='zong zdlc_jl2sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl2sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl2sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_jl3'><span></span></td>
                        <td  class='heng zdlc_jl3'><span></span></td>
                        <td  class='heng zdlc_jl3'><span></span></td>
                        <td  class='heng zdlc_jl3'><span></span></td>
                        <td  class='heng zdlc_jl3'><span></span></td>

                        <td  class='zong zdlc_jl3sjp'><span></span></td>
                        <td  class='zong zdlc_jl3sjp'><span></span></td>
                        <td  class='zong zdlc_jl3sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl3sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl3sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_jl4'><span></span></td>
                        <td  class='heng zdlc_jl4'><span></span></td>
                        <td  class='heng zdlc_jl4'><span></span></td>
                        <td  class='heng zdlc_jl4'><span></span></td>
                        <td  class='heng zdlc_jl4'><span></span></td>

                        <td  class='zong zdlc_jl4sjp'><span></span></td>
                        <td  class='zong zdlc_jl4sjp'><span></span></td>
                        <td  class='zong zdlc_jl4sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl4sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_jl4sjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_qm012'><span></span></td>
                        <td  class='heng zdlc_qm012'><span></span></td>
                        <td  class='heng zdlc_qm012'><span></span></td>

                        <td  class='zong zdlc_qm012sjp'><span></span></td>
                        <td  class='zong zdlc_qm012sjp'><span></span></td>
                        <td  class='zong zdlc_qm012sjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_qm012sjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_qm012sjp2'><span></span></td>

                        <td  class='heng zdlc_qm012jl'><span></span></td>
                        <td  class='heng zdlc_qm012jl'><span></span></td>
                        <td  class='heng zdlc_qm012jl'><span></span></td>

                        <td  class='zong zdlc_qm012jlsjp'><span></span></td>
                        <td  class='zong zdlc_qm012jlsjp'><span></span></td>
                        <td  class='zong zdlc_qm012jlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_qm012jlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_qm012jlsjp2'><span></span></td>

                        <td class='fqtds'><div class='xian'></div></td>
                        <td  class='heng zdlc_dx'><span></span></td>
                        <td  class='heng zdlc_dx'><span></span></td>
                        <td  class='heng zdlc_dx'><span></span></td>

                        <td  class='zong zdlc_dxsjp'><span></span></td>
                        <td  class='zong zdlc_dxsjp'><span></span></td>
                        <td  class='zong zdlc_dxsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_dxsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_dxsjp2'><span></span></td>

                        <td  class='heng zdlc_dxjl'><span></span></td>
                        <td  class='heng zdlc_dxjl'><span></span></td>
                        <td  class='heng zdlc_dxjl'><span></span></td>

                        <td  class='zong zdlc_dxjlsjp'><span></span></td>
                        <td  class='zong zdlc_dxjlsjp'><span></span></td>
                        <td  class='zong zdlc_dxjlsjp'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_dxjlsjp2'><span></span></td>
                        <td  class='sjpdsjpinfo zdlc_dxjlsjp2'><span></span></td>
                    </tr>
                </tfoot>
            </table>

            <table id="data-tab-statarr-sjp2">
                <thead>
                    <tr>
                        <th colspan="18" class="sjpjlinfosa" style="height:25px;"> 升降平距离信息 </th>
                    </tr>
                    <tr>
                        <th colspan="3" class="sjpjlinfosa">距离</th>
                        <th colspan="3" class="sjpjlinfosa">升降平</th>
                        <th colspan="3" class="sjpjlinfosa">升降平</th>
                        <th colspan="3" class="sjpjlinfosa">距离的距离</th>
                        <th colspan="3" class="sjpjlinfosa">升降平</th>
                        <th colspan="3" class="sjpjlinfosa">升降平</th>
                    </tr>
                </thead>
            </table>

            <table id="data-tab-statarr-sjp3">
                <thead>
                    <tr>
                        <th colspan="18" class="jlsjpjlinfosa" style="height:25px;"> 距离升降平距离信息 </th>
                    </tr>
                    <tr>
                        <th colspan="3" class="jlsjpjlinfosa">距离</th>
                        <th colspan="3" class="jlsjpjlinfosa">升降平</th>
                        <th colspan="3" class="jlsjpjlinfosa">升降平</th>
                        <th colspan="3" class="jlsjpjlinfosa">距离的距离</th>
                        <th colspan="3" class="jlsjpjlinfosa">升降平</th>
                        <th colspan="3" class="jlsjpjlinfosa">升降平</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="dh">
            <ul>
                <li>
                    距下期：<span id="minute_show">0</span> 分  <span id="second_show">0</span> 秒
                </li>
                <li ><a href="javascript:void(0)" class="syysjp">上一页</a></li>
                <li><a href="javascript:void(0)" class="xyysjp">下一页</a></li>
                <li><a href="javascript:void(0)" class="zmysjp">最新页</a></li>
            </ul>
        </div>
        <div style="clear:both;"></div>
        <div class='zx120tj'>
            <div class="ma">
                <div class="maxia">
                    <ul class="u2" style="padding-top:0px;">
                        <li> 
                            <input type="checkbox" class="zx120quanxuan" name='zx24quxuan' value = "all"  />&nbsp;全选
                        </li>
                        <li> 
                            <input type="checkbox" class="zx120yssj" name='zx24yssj' value = "0"  />&nbsp;A
                        </li>
                        <li> 
                            <input type="checkbox" class="zx120yssj" name='zx24yssj' value = "1"  />&nbsp;B
                        </li>
                        <li> 
                            <input type="checkbox" class="zx120yssj" name='zx24yssj' value = "2"  />&nbsp;C 
                        </li>
                        <li> 
                            <input type="checkbox" class="zx120yssj" name='zx24yssj' value = "3"  />&nbsp;D
                        </li>
                        <li> 
                            <input type="checkbox" class="zx120yssj" name='zx24yssj' value = "4"  />&nbsp;E
                        </li>
                    </ul>
                    <div style="clear:both;"></div>
                    <div class="copynum">
                        <a href="javascript:void(0)" class="btn-sc ershi" id="fuzhi">复制</a>
                        <a href="javascript:void(0)" class="btn-sc sanshi" id="qingchu">清除</a>
                        <a href="javascript:void(0)" class="btn-sc wushi" id="fasonginfo">发送</a>
                    </div>
                </div>
                <div class="zx120tjdatadiv">
                    <textarea id="zx120tjdata" name='zx120tjdata'></textarea>
                </div>

                <div id="zx120countShuzu" style="text-align:center;color:#f00;font-size:14px;"></div>
            </div>
        </div>
        <div class="tbIntro">
            <ul class="tbIntrotop">
                <li class="tbico">图表介绍</li>
                <li class="butt">
                    <div id="tb_switch" class="hide">展开</div>
                </li>
            </ul>
            <div style="display:none;" id="intro" class="intro">
                <ul>
                    <li><font class="red">图表说明：</font></li>
                    <li>福彩3D开奖走势图反映开奖号码的整体走势，包括分位走势和0-9分布走势，福彩3D开奖号码在20点33分左右更新。</li>
                    <li><font class="red">参数说明：</font></li>
                    <li>和值：开奖号码各个位置相累加的和。</li>
                    <li>大小：5-9为大，0-4为小。</li>
                    <li>奇偶：能被2整除为偶数，反之为奇数。</li>
                </ul>
            </div>
        </div>
        @endsection
        @section('footer')<footer class="main-footer">
            <div class="container">
                <strong>Copyright &copy; 2015-2016 <a href="/">彩票网</a>.</strong> All rights
                reserved.
            </div>
        </footer>
        @stop