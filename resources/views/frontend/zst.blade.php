@extends('frontend.layouts.master')
@section('witch-css-need')
    <link rel="stylesheet" href="{{asset('frontend/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ssc.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
@endsection
@section('witch-js-need')
	<script src="{{asset('frontend/js/ajaxinfo.js')}}"></script>
	<script src="{{asset('frontend/js/myapp.js')}}"></script>
	<script src="{{asset('frontend/js/hzx.content.js')}}"></script>
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
                                <li><a href="/zst/cqssc/zxzs/20" target="_blank">012走勢</a></li>
                                <li><a href="/zst/cqssc/statarr/20/" target="_blank">静态数组走勢</a></li>
                                <li><a href="/zst/cqssc/zxzs/20" target="_blank">动态数组走勢</a></li>
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
    	<div class="xsycq">
    		<strong>显示/隐藏：</strong>
    		<label>
	    		<input type="checkbox" name="allcheck" checked="checked" value="xzqb" class="biaozhu quanxuansjp" />
	    		&nbsp;全选&nbsp;
	    	</label>
	    	<label>
	    		<input type="checkbox" name="show_on_off" checked="checked" value="ycqh" class="biaozhusjp" />
	    		&nbsp;期号&nbsp;
	    	</label>
	    	<label>
	    		<input type="checkbox" name="show_on_off" checked="checked" value="ychx" class="biaozhusjp" />
	    		&nbsp;横向&nbsp;
	    	</label>
	    	<label>
	    		<input type="checkbox" name="show_on_off" checked="checked" value="yczx"  class="biaozhusjp" />
	    		&nbsp;纵向&nbsp;
	    	</label>
	    	<label>
	    		<input type="checkbox" name="show_on_off" checked="checked" value="ycxx" class="biaozhusjp" />
	    		&nbsp;斜向&nbsp;
	    	</label>
    	</div>
   	</div>

   	<div class="chart-nav2" lot="255401" ct="x5zh">
	    <ul>
	     	<li class="fenxi">
		      	<span><strong>分析方式:</strong></span>
		      	<button type="button" data-fx='ALL' class='fxa fxbt active'>全部</button>
		      	<button type="button" data-fx='1' class="fx fxbt active">万</button>
		      	<button type="button" data-fx='2' class="fx fxbt active">千</button>
		      	<button type="button" data-fx='3' class="fx fxbt active">百</button>
		      	<button type="button" data-fx='4' class="fx fxbt active">十</button>
		      	<button type="button" data-fx='5' class="fx fxbt active">个</button>
	     	</li>
	     	<li class="ksfx">
		      	<span><strong>快选:</strong></span>
                <button type="button" data-fx='QSI' class="kx fxbt">前四</button>
                <button type="button" data-fx='HSI' class="kx fxbt">后四</button>
		      	<button type="button" data-fx='QS' class="kx fxbt">前三</button>
		      	<button type="button" data-fx='ZS' class="kx fxbt">中三</button>
		      	<button type="button" data-fx='HS' class="kx fxbt">后三</button>
		      	<button type="button" data-fx='QE' class="kx fxbt">前二</button>
		      	<button type="button" data-fx='HE' class="kx fxbt">后二</button>
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
    	<label><input type="checkbox" name="options" value="ylfc" class="biaozhu" />&nbsp;遗漏分层&nbsp;</label>
    	<label><input type="checkbox" name="options" value="fq"  class="biaozhu" />&nbsp;分区线&nbsp;</label>
    	<label><input type="checkbox" name="options" value="fd" class="biaozhu" />&nbsp;分段线&nbsp;</label>
   </div>

   <div class="chart-tab nonum" id="chart-tab">
    	<table width="auto" class="chart-table">
     		<thead class="x5zh">
      			<tr class="gongtr">
       				<th rowspan="2" class="w80 qihao">期号</th>
       				<td rowspan="2" class="fqtds"></td>
		       		<th rowspan="2" class="w40 kjhaos" style="width:52px;">开奖号</th>
		       		<td rowspan="2" class="fqtds"></td>
		       		<th colspan="10" class="noth hxqs">横向</th>
		       		<td class="fqtds"></td>
		       		<th colspan="10" class="noth zxqs">纵向</th>
		       		<td class="fqtds"></td>
		       		<th colspan="10" class="noth xxsa">斜向</th>
      			</tr>
      			<tr class="gongtr">
		       		<td class=" w2_1 hxqs" width="">0</td>
		       		<td class=" w2_1 hxqs" width="">1</td>
		       		<td class=" w2_1 hxqs" width="">2</td>
		       		<td class=" w2_1 hxqs" width="">3</td>
		       		<td class=" w2_1 hxqs" width="">4</td>
		       		<td class=" w2_1 hxqs" width="">5</td>
		       		<td class=" w2_1 hxqs" width="">6</td>
		       		<td class=" w2_1 hxqs" width="">7</td>
		       		<td class=" w2_1 hxqs" width="">8</td>
		       		<td class=" w2_1 hxqs" width="">9</td>
		       		<td class="fqtds"></td>
		       		<td class=" w2_1 zxqs" width="">0</td>
		       		<td class=" w2_1 zxqs" width="">1</td>
		       		<td class=" w2_1 zxqs" width="">2</td>
		       		<td class=" w2_1 zxqs" width="">3</td>
		       		<td class=" w2_1 zxqs" width="">4</td>
		       		<td class=" w2_1 zxqs" width="">5</td>
		       		<td class=" w2_1 zxqs" width="">6</td>
		       		<td class=" w2_1 zxqs" width="">7</td>
		       		<td class=" w2_1 zxqs" width="">8</td>
		       		<td class=" w2_1 zxqs" width="">9</td>
		       		<td class="fqtds"></td>
		       		<td class=" w2_1 xxsa" width="">0</td>
		       		<td class=" w2_1 xxsa" width="">1</td>
		       		<td class=" w2_1 xxsa" width="">2</td>
		       		<td class=" w2_1 xxsa" width="">3</td>
		       		<td class=" w2_1 xxsa" width="">4</td>
		       		<td class=" w2_1 xxsa" width="">5</td>
		       		<td class=" w2_1 xxsa" width="">6</td>
		       		<td class=" w2_1 xxsa" width="">7</td>
		       		<td class=" w2_1 xxsa" width="">8</td>
		       		<td class=" w2_1 xxsa" width="">9</td>
		    	</tr>
     		</thead>
    		<tbody id="data-tab" class="zx5zh">
    		</tbody>
    		<tfoot>
    			<tr class="yuce gongtr">
				<td rowspan="3" id="yc" class="qihao">预测区<span class="ershi ycqcg">清除</span>
				</td>
				<td rowspan="3" class="fqtds"></td>
				<td class="yckjh kjhaos" >预测号</td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='1' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='2' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='3' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='4' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='5' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='6' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='7' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='8' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='9' class='heng ycsj hxqs'><span></span></td>

				<td class="fqtds"></td>
				<td data-yuce ='0' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='1' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='2' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='3' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='4' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='5' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='6' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='7' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='8' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='9' class='zong ycsj zxqs'><span></span></td>

				<td class="fqtds"></td>
				<td data-yuce ='0' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='1' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='2' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='3' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='4' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='5' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='6' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='7' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='8' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='9' class='xie ycsj xxsa'><span></span></td>
			</tr>
			<tr class="yuce gongtr">
				<td class="yckjh kjhaos">预测号</td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='1' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='2' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='3' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='4' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='5' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='6' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='7' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='8' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='9' class='heng ycsj hxqs'><span></span></td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='1' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='2' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='3' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='4' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='5' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='6' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='7' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='8' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='9' class='zong ycsj zxqs'><span></span></td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='1' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='2' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='3' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='4' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='5' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='6' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='7' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='8' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='9' class='xie ycsj xxsa'><span></span></td>
			</tr>
			<tr class="yuce gongtr">
				<td class="yckjh kjhaos">预测号</td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='1' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='2' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='3' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='4' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='5' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='6' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='7' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='8' class='heng ycsj hxqs'><span></span></td>
				<td data-yuce ='9' class='heng ycsj hxqs'><span></span></td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='1' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='2' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='3' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='4' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='5' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='6' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='7' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='8' class='zong ycsj zxqs'><span></span></td>
				<td data-yuce ='9' class='zong ycsj zxqs'><span></span></td>
				<td class="fqtds"></td>
				<td data-yuce ='0' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='1' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='2' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='3' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='4' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='5' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='6' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='7' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='8' class='xie ycsj xxsa'><span></span></td>
				<td data-yuce ='9' class='xie ycsj xxsa'><span></span></td>
			</tr>

			<tr class="tingji gongtr">
				<td rowspan="4" id="yc" class="qihao">统计区</td>
				<td rowspan="4" class="fqtds"></td>
				<td class="yckjh kjhaos">出现次数</td>
				<td class="fqtds"></td>
				<td  class='heng hxqs tjheng0' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng1' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng2' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng3' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng4' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng5' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng6' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng7' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng8' id="tjzt"><span></span></td>
				<td  class='heng hxqs tjheng9' id="tjzt"><span></span></td>

				<td class="fqtds"></td>
				<td  class='zong zxqs tjzong0' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong1' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong2' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong3' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong4' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong5' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong6' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong7' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong8' id="tjzt"><span></span></td>
				<td  class='zong zxqs tjzong9' id="tjzt"><span></span></td>

				<td class="fqtds"></td>
				<td  class='xie xxsa tjxie0' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie1' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie2' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie3' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie4' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie5' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie6' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie7' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie8' id="tjzt"><span></span></td>
				<td  class='xie xxsa tjxie9' id="tjzt"><span></span></td>
			</tr>
			<tr class="tongji gongtr">
				<td class="yckjh kjhaos">平均遗漏</td>
				<td  class="fqtds"></td>
				<td  class='heng hxqs htjpjyl0' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl1' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl2' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl3' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl4' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl5' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl6' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl7' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl8' id="tjzt"><span></span></td>
				<td  class='heng hxqs htjpjyl9' id="tjzt"><span></span></td>
				<td  class="fqtds"></td>
				<td  class='zong zxqs ztjpjyl0' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl1' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl2' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl3' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl4' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl5' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl6' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl7' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl8' id="tjzt"><span></span></td>
				<td  class='zong zxqs ztjpjyl9' id="tjzt"><span></span></td>
				<td  class="fqtds"></td>
				<td  class='xie xxsa xtjpjyl0' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl1' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl2' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl3' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl4' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl5' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl6' id="tjzt" ><span></span></td>
				<td  class='xie xxsa  xtjpjyl7' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl8' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xtjpjyl9' id="tjzt" ><span></span></td>
			</tr>
			<tr class="tongji gongtr">
				<td class="yckjh kjhaos">最大遗漏</td>
				<td  class="fqtds"></td>
				<td  class='heng hxqs hzdyl0' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl1' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl2' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl3' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl4' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl5' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl6' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl7' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl8' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdyl9' id="tjzt" ><span></span></td>
				<td  class="fqtds"></td>
				<td  class='zong zxqs zzdyl0' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl1' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl2' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl3' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl4' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl5' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl6' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl7' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl8' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdyl9' id="tjzt" ><span></span></td>
				<td  class="fqtds"></td>
				<td  class='xie xxsa xzdyl0' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl1' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl2' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl3' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl4' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl5' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl6' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl7' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl8' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdyl9' id="tjzt" ><span></span></td>
			</tr>
			<tr class="tongji gongtr">
				<td class="yckjh kjhaos">最大连出</td>
				<td  class="fqtds"></td>
				<td  class='heng hxqs hzdlc0' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc1' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc2' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc3' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc4' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc5' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc6' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc7' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc8' id="tjzt" ><span></span></td>
				<td  class='heng hxqs hzdlc9' id="tjzt" ><span></span></td>
				<td  class="fqtds"></td>
				<td  class='zong zxqs zzdlc0' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc1' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc2' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc3' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc4' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc5' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc6' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc7' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc8' id="tjzt" ><span></span></td>
				<td  class='zong zxqs zzdlc9' id="tjzt" ><span></span></td>
				<td  class="fqtds"></td>
				<td  class='xie xxsa xzdlc0' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc1' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc2' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc3' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc4' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc5' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc6' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc7' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc8' id="tjzt" ><span></span></td>
				<td  class='xie xxsa xzdlc9' id="tjzt" ><span></span></td>
			</tr>
    		</tfoot>
  		</table>
    
	
    <div class="dh">
		<ul>
			<li>
				距下期：<span id="minute_show">0</span> 分  <span id="second_show">0</span> 秒
			</li>
			<li ><a href="javascript:void(0)" class="syy">上一页</a></li>
			<li><a href="javascript:void(0)" class="xyy">下一页</a></li>
			<li><a href="javascript:void(0)" class="zmy">最新页</a></li>
		</ul>
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
</div>
@include('frontend.includes.sidebar')
@stop