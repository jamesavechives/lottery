//开奖号码分析，对号，豹子号，等不同号码返回2111 或32 或 311等
function jianghao(array){
	var count = 1;  
    var yuansu= new Array();
    var sum = new Array(); 
	for(var i = 0; i < array.length; i++){   
		for(var j=i+1;j<array.length;j++){  
		    if(array[i] == array[j]){  
		        count++;
		        array.splice(j, 1);  
		        j--;   
		    }  
		}  
		yuansu[i] = array[i];
		sum[i] = count;
		count =1; 
	}  
    var str = '';   
	for(var i = 0; i < yuansu.length; i++){   
		str+=sum[i];  
	}  
	return str;  
}

//纵向用到
function zongxian(i){
		var cbs = [];
		$('.zong'+i).each(function(key,value){
			$(this).addClass('zongkk'+key);
			if($(this).find("span").text() == String(i)){
				cbs.push(key)
			}
		});
		var cbss =  arrangezx(cbs);
		return cbss;
}

// 去重复 
Array.prototype.unique2 = function(){
	this.sort(); //先排序
	var res = [this[0]];
	for(var i = 1; i < this.length; i++){
		if(this[i] !== res[res.length - 1]){
			res.push(this[i]);
		}
	}
	return res;
}

// 号码出现次数
function cishu(array,num){
	//console.log(array);
	var num_cishu = 0;
	for(var m= 0; m<array.length; m++){
		//console.log(array[m]);
		if(num == array[m]){
			num_cishu++;
		}
	}
	//console.log(num_cishu);
	return num_cishu;
}

//重复的号码
function chongfu(array){
	var sange = 0;
	var sige = 1;
	var wuge = 2;

	for(var i=0; i<array.length; i++){
		if(array[i] == array[i+1]){
			nu++;
		}
	}
	return nu;

	//console.log(nu);
}
function arrangetj(source) {
	//source.sort();
	var t;
	var ta;
	var r = [];
	source.forEach(function(v) {
		if (t === v) {
			ta.push(t);
			t++;
			return;
		}
		ta = [v];
		t = v + 1;
		r.push(ta);
	});
	var cd = [];
	for(var i =0; i<r.length; i++){
		cd.push(r[i].length);
	}
	var zdz = Math.max.apply(null, cd);
	//console.log(zdz);
	return zdz;
}


//判断是否为连续数列
function arrange(source) {
	source.sort();
	var t;
	var ta;
	var r = [];
	source.forEach(function(v) {
		if (t === v) {
			ta.push(t);
			t++;
			return;
		}
		ta = [v];
		t = v + 1;
		r.push(ta);
	});

	var newr = [];
	for(var i=0; i<r.length; i++){
		newr[i] = r[i].length;
	}
	newra = Math.max.apply(null, newr);
	for(var j=0; j<r.length; j++){
		if(r[j].length == newra && newra>=3){
			var pipei = r[j];
		}
	}
	//console.log(pipei);
	return pipei;
}

//纵向连续数列
function arrangezx(source) {
	//source.sort();
	var t;
	var ta;
	var r = [];
	var pipei = [];
	source.forEach(function(v) {
		if (t === v) {
			ta.push(t);
			t++;
			return;
		}
		ta = [v];
		t = v + 1;
		r.push(ta);
	});
	for(var j=0; j<r.length; j++){
		if(r[j].length >= 3 ){
			var nni =r[j];
			for(var ko=0; ko<nni.length; ko++){
				pipei.push(nni[ko]);
			}
		}
	}
	//console.log(r);
	return pipei;
}

//斜向连续数列
function arrangexx(source) {
	//source.sort();
	var t;
	var ta;
	var r = [];
	source.forEach(function(v) {
		if (t === v) {
			ta.push(t);
			t++;
			return;
		}
		ta = [v];
		t = v+ 1;
		r.push(ta);
	});

	var newr = [];
	for(var i=0; i<r.length; i++){
		newr[i] = r[i].length;
	}
	newra = Math.max.apply(null, newr);
	for(var j=0; j<r.length; j++){
		if(r[j].length == newra && newra>=3){
			var pipei = r[j];
		}
	}
	//console.log(pipei);
	return pipei;
}

//斜向排除次数判断
function xiexiang(i){
	var cbs = [];
	$('.xie'+i).each(function(key,value){
		$(this).addClass('xieas'+key);
		if($(this).text() == String(i) || $(this).text() == String(i)+'2' || $(this).text() == String(i)+'3' || $(this).text() == String(i)+'4' || $(this).text() == String(i)+'5'){
			cbs.push(key)
		}
	});
	return cbs;
}

//前断倒计时
function timer(intDiff){
   var daojs = window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#day_show').html(day);
    $('#hour_show').html('<s id="h"></s>'+hour);
    $('#minute_show').html('<s></s>'+minute);
    $('#second_show').html('<s></s>'+second);
    intDiff--;
    if(intDiff == -1){
    	clearInterval(daojs);
    	var fxarr = [];
		$('.fx').each(function(){
			if($(this).hasClass('active')){
				fxarr.push($(this).data('fx'));
			}
		});
		var ksfx;
		$('.kx').each(function(){
			if($(this).hasClass('active')){
				ksfx = $(this).data('fx');
			}
		});
		var weiarr;
		if(typeof(ksfx) == "undefined" && fxarr.length==0){
			weiarr = 'ALL';
		}else if(typeof(ksfx) == "undefined" && fxarr.length !=0){
			weiarr = fxarr;
		}else{
			weiarr = ksfx;
		}
		sjpajax(20,weiarr);
		tjcount(weiarr);
		tjpjyl(weiarr);
		tjzdyl(weiarr);
		tjzdlc(weiarr);
    	$.ajax({
			type: "GET",
			url: "/zst/xqtime/",
			dataType: "json",
			success: function(data){
				var data = eval(data);
				var lefttime = data.lefttime;
				var intDiff = parseInt(lefttime);
				timer(intDiff);
			}
		});
    }
    }, 1000);
}

function timerstatarr(intDiff){
    var daojs = window.setInterval(function(){
        var day=0,
            hour=0,
            minute=0,
            second=0;//时间默认值
        if(intDiff > 0){
            day = Math.floor(intDiff / (60 * 60 * 24));
            hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
            minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
            second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
        }
        if (minute <= 9) minute = '0' + minute;
        if (second <= 9) second = '0' + second;
        $('#day_show').html(day);
        $('#hour_show').html('<s id="h"></s>'+hour);
        $('#minute_show').html('<s></s>'+minute);
        $('#second_show').html('<s></s>'+second);
        intDiff--;
        if(intDiff == -1){
            clearInterval(daojs);
            var fxarr = [];
            $('.fx').each(function(){
                if($(this).hasClass('active')){
                    fxarr.push($(this).data('fx'));
                }
            });
            var ksfx;
            $('.kx').each(function(){
                if($(this).hasClass('active')){
                    ksfx = $(this).data('fx');
                }
            });
            var weiarr;
            if(typeof(ksfx) == "undefined" && fxarr.length==0){
                weiarr = 'ALL';
            }else if(typeof(ksfx) == "undefined" && fxarr.length !=0){
                weiarr = fxarr;
            }else{
                weiarr = ksfx;
            }
            statarrajax(20,weiarr);
            $.ajax({
                type: "GET",
                url: "/zst/xqtime/",
                dataType: "json",
                success: function(data){
                    var data = eval(data);
                    var lefttime = data.lefttime;
                    var intDiff = parseInt(lefttime);
                    timerstatarr(intDiff);
                    //statarrajax(20,weiarr);
                }
            });
        }
    }, 1000);
}
function timerlivearr(intDiff){
	var daojs = window.setInterval(function(){
		var day=0,
			hour=0,
			minute=0,
			second=0;//时间默认值
		if(intDiff > 0){
			day = Math.floor(intDiff / (60 * 60 * 24));
			hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
			minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
			second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
		}
		if (minute <= 9) minute = '0' + minute;
		if (second <= 9) second = '0' + second;
		$('#day_show').html(day);
		$('#hour_show').html('<s id="h"></s>'+hour);
		$('#minute_show').html('<s></s>'+minute);
		$('#second_show').html('<s></s>'+second);
		intDiff--;
		if(intDiff == -1){
			clearInterval(daojs);
			var fxarr = [];
			$('.fx').each(function(){
				if($(this).hasClass('active')){
					fxarr.push($(this).data('fx'));
				}
			});
			var ksfx;
			$('.kx').each(function(){
				if($(this).hasClass('active')){
					ksfx = $(this).data('fx');
				}
			});
			var weiarr;
			if(typeof(ksfx) == "undefined" && fxarr.length==0){
				weiarr = 'ALL';
			}else if(typeof(ksfx) == "undefined" && fxarr.length !=0){
				weiarr = fxarr;
			}else{
				weiarr = ksfx;
			}
			livearrajax(20,weiarr);
			$.ajax({
				type: "GET",
				url: "/zst/xqtime/",
				dataType: "json",
				success: function(data){
					var data = eval(data);
					var lefttime = data.lefttime;
					var intDiff = parseInt(lefttime);
					timerlivearr(intDiff);
					//statarrajax(20,weiarr);
				}
			});
		}
	}, 1000);
}
function timerhzx(intDiff){
   var daojs = window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值        
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#day_show').html(day);
    $('#hour_show').html('<s id="h"></s>'+hour);
    $('#minute_show').html('<s></s>'+minute);
    $('#second_show').html('<s></s>'+second);
    intDiff--;
    if(intDiff == -1){
    	clearInterval(daojs);
    	var fxarr = [];
		$('.fx').each(function(){
			if($(this).hasClass('active')){
				fxarr.push($(this).data('fx'));
			}
		});
		var ksfx;
		$('.kx').each(function(){
			if($(this).hasClass('active')){
				ksfx = $(this).data('fx');
			}
		});
		var weiarr;
		if(typeof(ksfx) == "undefined" && fxarr.length==0){
			weiarr = 'ALL';
		}else if(typeof(ksfx) == "undefined" && fxarr.length !=0){
			weiarr = fxarr;
		}else{
			weiarr = ksfx;
		}
		hzxajax(20,weiarr);
    	$.ajax({
			type: "GET",
			url: "/zst/xqtime/",
			dataType: "json",
			success: function(data){
				var data = eval(data);
				var lefttime = data.lefttime;
				var intDiff = parseInt(lefttime);
				timerhzx(intDiff);         
			}
		});
    }
    }, 1000);
}

//获取路由参数 no-ajax 
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]); return null; //返回参数值
}

//返回星位置
function xingwei(array){
	for(var lj=0; lj<weiar.length; lj++){
			if(weiar[lj] == '1'){
				arr_xing.push(Number(cp['WAN']));
				jhnu += cp['WAN'];
			}
			if(weiar[lj] == '2'){
				arr_xing.push(Number(cp['QIAN']));
				jhnu += cp['QIAN'];
			}
			if(weiar[lj] == '3'){
				arr_xing.push(Number(cp['BAI']));
				jhnu += cp['BAI'];
			}
			if(weiar[lj] == '4'){
				arr_xing.push(Number(cp['SHI']));
				jhnu += cp['SHI'];
			}
			if(weiar[lj] == '5'){
				arr_xing.push(Number(cp['GE']));
				jhnu += cp['GE'];
			}
			if(weiar[lj] == 'qs'){
				arr_xing_kx = [];
				arr_xing_kx.push(Number(cp['WAN']));
				arr_xing_kx.push(Number(cp['QIAN']));
				arr_xing_kx.push(Number(cp['BAI']));
				jhnu_kx = '';
				jhnu_kx = cp['WAN']+cp['QIAN']+cp['BAI'];
			}
			if(weiar[lj] == 'zs'){
				arr_xing_kx.push(Number(cp['QIAN']));
				arr_xing_kx.push(Number(cp['BAI']));
				arr_xing_kx.push(Number(cp['SHI']));
				jhnu_kx = '';
				jhnu_kx = cp['QIAN']+cp['BAI']+cp['SHI'];
			}
			if(weiar[lj] == 'hs'){
				arr_xing_kx.push(Number(cp['BAI']));
				arr_xing_kx.push(Number(cp['SHI']));
				arr_xing_kx.push(Number(cp['GE']));
				jhnu_kx = '';
				jhnu_kx = cp['BAI']+cp['SHI']+cp['GE'];
			}
			if(weiar[lj] == 'qe'){
				arr_xing_kx.push(Number(cp['WAN']));
				arr_xing_kx.push(Number(cp['QIAN']));
				jhnu_kx = '';
				jhnu_kx = cp['WAN']+cp['QIAN'];
			}
			if(weiar[lj] == 'he'){
				arr_xing_kx.push(Number(cp['SHI']));
				arr_xing_kx.push(Number(cp['GE']));
				jhnu_kx = '';
				jhnu_kx = cp['SHI']+cp['GE'];
			}
		}
}
//最大遗漏

function yilou(array){
	var arr = [];
	for(var i=0; i<array.length; i++){
		arr.push((array[i+1]-array[i]));
	}
	arr.splice($.inArray(NaN,arr),1);
	var data = Math.max.apply(null, arr);
	return data;
}

function zxvalue(arrays){
	var val;
	if(arrays == '11111' ){
		val=120;
	}
	if(arrays == '1111' ){
		val=24;
	}
	if(arrays== '1211' || arrays== '1121' || arrays == '1112' ||arrays == '2111'){
		val=60;
	}
	if(arrays == '112' ||arrays == '211' || arrays == '121'){
		val=12;
	}
	if(arrays == '212' ||arrays == '221' || arrays == '122'){
		val=30;
	}
	if(arrays == '22'){
		val=6;
	}
	if(arrays == '131' ||arrays == '311' ||arrays == '113'){
		val=20;
	}
	if(arrays == '31' ||arrays == '13'){
		val=4;
	}
	if(arrays == '32' ||arrays == '23'){
		val=10;
	}
	if(arrays == '4'){
		val=2;
	}
	if(arrays == '41' || arrays == '14' || arrays == '5'){
		val=5;
	}
	return val;
}
function zxbian05(abc){
	if(abc == 120 || abc==24){
		return 1;
	}else if(abc == 60 || abc==12){
		return 2;
	}else if(abc == 30 || abc==6){
		return 3;
	}else if(abc == 20 || abc==4){
		return 4;
	}else if(abc == 10 || abc==2){
		return 5;
	}else if(abc == 5){
		return 6;
	}
}

function sjpdsjp(indexs,last,appends,self,other,ylmc){
	for(var i =0; i<3; i++){
		if(!ylmc[i]){ylmc[i]=1;}
		var tdshow = '';
		tdshow = "<td class=' "+self+ " sjpdsjpinfo "+ other +" sjpdsjp "+self+i +"' ></td>";
		$(''+ appends +'').append(tdshow);
	}
	if(Number(indexs) == Number(last) ){
		$(''+ appends +' .'+self+'1').append('<span class="sjpping">平</span>');
		ylmc[1] = 1;
	}else{
		$(''+ appends +' .'+self+'1').append('<span class="ptspan">'+ylmc[1]+'</span>');
		ylmc[1] += 1;
	} 
	if(Number(indexs) < Number(last)){
		$(''+ appends +' .'+self+'2').append('<span class="sjpjiang">降</span>');
		ylmc[2] = 1;
	}else{
		$(''+ appends +' .'+self+'2').append('<span class="ptspan">'+ylmc[2]+'</span>');
		ylmc[2] += 1;
	}
	if(Number(indexs) > Number(last)){
		$(''+ appends +' .'+self+'0').append('<span class="sjpsheng">升</span>');
		ylmc[0] = 1;
	}else{
		$(''+ appends +' .'+self+'0').append('<span class="ptspan">'+ylmc[0]+'</span>');
		ylmc[0] += 1;
	}
}

function onlybj(indexs,last){
	if(Number(indexs) == Number(last)){
		return 1;
	}else if(Number(indexs)>Number(last)){
		return 0;
	}else{
		return 2;
	}
}


function qm120(zxnum,qmnum,parent,parentstr,self){
	for(var i = 0; i<3; i++){
		if(!qmnum[i]){qmnum[i]=1;}
		var tdss = '';
		tdss = "<td class='qm012  "+ self +" qm012showoff heng qm012sjp "+'henga'+i+" ' ></td>";
		parent.append(tdss);
	}
		if(zxnum % 3 == 0){
			$(""+ parentstr + ' .henga0').append('<span class="qm012span">0</span>');
			$(""+ parentstr + ' .qm012sjp').attr("qm012",0);
			qmnum[0]=1;
			var qm012val = 0;
			return qm012val;
		}else{
			$(""+ parentstr + ' .henga0').append('<span class="ptspan">'+qmnum[0]+'</span>');
			qmnum[0]+=1;
		}

		if(zxnum % 3 == 1){
			$(""+ parentstr + ' .henga1').append('<span class="qm012span">1</span>');
			$(""+ parentstr + ' .qm012sjp').attr("qm012",1);
			qmnum[1]=1;
			var qm012val = 1;
			return qm012val;
		}else{
			$(""+ parentstr + ' .henga1').append('<span class="ptspan">'+qmnum[1]+'</span>');
			qmnum[1]+=1;
		}
		if(zxnum % 3 == 2){
			$(""+ parentstr + ' .henga2').append('<span class="qm012span">2</span>');
			$(""+ parentstr + ' .qm012sjp').attr("qm012",2);
			qmnum[2]=1;
			var qm012val = 2;
			return qm012val;
		}else{
			$(""+ parentstr + ' .henga2').append('<span class="ptspan">'+qmnum[2]+'</span>');
			qmnum[2]+=1;
		}
}



function test(){
	alert('aasas');
}

function abcbian(val,num){
    if(val == 1 && num == 5){
        return 'A';
    }
    if(val == 2 && num == 5){
        return 'B';
    }
    if(val == 3 && num == 5){
        return 'C';
    }
    if(val == 4 && num == 5){
        return 'D';
    }
    if(val == 5 && num == 5){
        return 'E';
    }
	if(val == 6 && num == 6){
		return 'F';
	}
}

function bians(val,num){
	if(val == 1 && num == 5){
		return '120';
	}
	if(val == 2 && num == 5){
		return '60';
	}
	if(val == 3 && num == 5){
		return '30';
	}
	if(val == 4 && num == 5){
		return '20';
	}
	if(val == 5 && num == 5){
		return '10';
	}
	if(val == 6 && num == 5){
		return '5';
	}

	if(val == 1 && num == 4){
		return '24';
	}
	if(val == 2 && num == 4){
		return '12';
	}
	if(val == 3 && num == 4){
		return '6';
	}
	if(val == 4 && num == 4){
		return '4';
	}
	if(val == 5 && num == 4){
		return '2';
	}
}

function sjpbian(val){
	if(val == 1){
		return '降';
	}
	if(val == 2){
		return '平';
	}
	if(val == 3){
		return '升';
	}

	console.log('aaaaa');
}

function jlbian(val){
	if(val == 1){
		return '0';
	}
	if(val == 2){
		return '1';
	}
	if(val == 3){
		return '2';
	}
	if(val == 4){
		return '3';
	}
	if(val == 5){
		return '4';
	}
	if(val == 6){
		return '5';
	}
	if(val == 7){
		return '6';
	}
	if(val == 8){
		return '7';
	}
}

function dzxbian(val){
	if(val == 0){
		return '小';
	}
	if(val == 1){
		return '中';
	}
	if(val == 2){
		return '大';
	}
}

function hzxajax(qishu,wei){
	$.ajax({
		type: "GET",
		data: {name: 'cqssc',qishu:qishu, wei:wei},
		url: "/zst/data/",
		dataType: "json",
		success: function(data){
			creathtml(data);					            
		}
	})
}

function sjpajax(qishu,wei){
	$.ajax({
		type: "post",
		headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
		data: {name: 'cqssc',qishu:qishu, wei:wei},
		url: "/zst/zuxuaninfo?time="+new Date().getTime(),
		dataType: "json",
		success: function(data){
			creatsjphtml(data);
                        $.ajax({
				type: "post",
				headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
				url: "/ajax/makedata?time="+new Date().getTime(),
				dataType: "json",
				success: function(dataa){	
					sjpajax(qishu,wei);
				}
			});
		},
		error:function(){
			
		}
	})
}
function statarrajax(qishu,wei){
    $.ajax({
        type: "get",
        data: {name: 'cqssc',qishu:qishu, wei:wei},
        url: "/zst/statarrinfo/",
        dataType: "json",
        success: function(data){
            creatstatarrhtml(data);
            $.ajax({
                type: "get",
                url: "/protect/makeinfo/index/自定义5分区/1/5/cqssc",
                dataType: "json",
                success: function(dataa){
                    statarrajax(qishu,wei);
                }
            });
        },
        error:function(){
            
        }
    })
}

function livearrajax(qishu,wei){
	$.ajax({
		type: "get",
		data: {name: 'cqssc',qishu:qishu, wei:wei},
		url: "/zst/livearrinfo/",
		dataType: "json",
		success: function(data){
			creatlivearrhtml(data);
                        $.ajax({
				type: "get",
				url: "/protect/makeliveinfo/index/500/cqssc",
				dataType: "json",
				success: function(dataa){
					livearrajax(qishu,wei);
				}
			});
		},
		error:function(){
			
		}
	})
}

function tjcount(wei){
	$.ajax({
		type: "post",
		headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
		url: "/zst/zuxuanexptj?time="+new Date().getTime(),
		data:{wei:wei},
		dataType: "json",
		success: function(data){
			$('.count_zx').each(function(key,val){
				$(this).text(data.zx120[key+1]);
			});
		}
	})
}

function tjpjyl(wei){
	$.ajax({
		type: "post",
		headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
		url: "/zst/zuxuanexptj2?time="+new Date().getTime(),
		data:{wei:wei},
		dataType: "json",
		success: function(data){
			$('.pjyl_zx').each(function(key,val){
				$(this).text(data.zx120[key+1]);
			});
		}
	})
}

function tjzdyl(wei){
	$.ajax({
		type: "post",
		headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
		url: "/zst/zuxuanexptj3?time="+new Date().getTime(),
		data:{wei:wei},
		dataType: "json",
		success: function(data){
			$('.zdyl_zx').each(function(key,val){
				$(this).text(data.zx120[key+1]);
			});
		}
	})
}

function tjzdlc(wei){
	$.ajax({
		type: "post",
		headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
		url: "/zst/zuxuanexptj4?time="+new Date().getTime(),
		data:{wei:wei},
		dataType: "json",
		success: function(data){
			$('.zdlc_zx').each(function(key,val){
				$(this).text(data.zx120[key+1]);
			});
		}
	})	
}


/*升降平走势列表生成*/

function sjpinfomakes(last,now,classname,lastcn){
	var sjpyc = []; var sjp2yc = []; var jlyc = []; var jlsjpyc = []; var jlsjp2 = [];
	var jl2yc = []; var jl2sjpyc = []; var jl2sjp2 = []; var jl3sjpyc = []; var j3sjp2 = [];
	var jl4sjp2 = []; var jl4sjpyc = [];  var jl3yc = []; var jl4yc = []; var jl3sjp2 =[];
	var qm012yc = []; var qm012sjpyc = []; var qm012sjp2= []; var qm012jlyc= []; var qm012jlsjpyc = [];
	var qm012jlsjp2 = []; var daxiao = []; var dxsjpyc = []; var daxiaosjp2 = []; var dxjlyc = [];
	var dxjlsjpyc = []; var dxjlsjp2yc = [];
	var lastnum = last;
	var nownum  = zxbian05(now);
	var nowtdobj = $(''+classname+'');
	var sjptd   = sjpinfo(nownum,lastnum,classname,'ycsjp','hao xiaoshi1',sjpyc);
	var lastsjp = $(''+ lastcn +' .sjpinfo').attr("sjp");
	sjpdsjp(sjptd,lastsjp,classname,'ycsjp2','hao2 xiaoshi1 shabi1',sjp2yc);
	var jl1 = julimake(nownum,lastnum,5,jlyc,classname,'jlone onejl jnycd xiaoshi1');
	var lastjl = $(''+ lastcn +' .onejl .jlspans').text();
	var jlsjptd = sjpinfo(jl1,lastjl,classname,'jlsjp','hao jlsjpinfo xiaoshi1',jlsjpyc);
	var lastjlsjp = $(''+ lastcn +' .jlsjpinfo').attr("sjp");
	sjpdsjp(jlsjptd,lastjlsjp,classname,'jlsjp2','hao2 xiaoshi1 shabi1',jlsjp2);

	var jl2 = julimake(jl1,lastjl,4,jl2yc,classname,'jltwo twojl jnycd xiaoshi1');
	var lastjl2 = $(''+ lastcn +' .twojl .jlspans').text();
	var jl2sjptd = sjpinfo(jl2,lastjl2,classname,'jl2sjp','haoj2 jl2sjpinfo xiaoshi1',jl2sjpyc);
	var lastjl2sjp = $(''+ lastcn +' .jl2sjpinfo').attr("sjp");
	sjpdsjp(jl2sjptd,lastjl2sjp,classname,'jl2sjp2','hao2 xiaoshi1 shabi1',jl2sjp2);

	var jl3 = julimake(jl2,lastjl2,3,jl3yc,classname,'jlthree threejl jnycd xiaoshi1');
	var lastjl3 = $(''+ lastcn +' .threejl .jlspans').text();
	var jl3sjptd = sjpinfo(jl3,lastjl3,classname,'jl3sjp','haoj3 jl3sjpinfo xiaoshi1',jl3sjpyc);
	var lastjl3sjp = $(''+ lastcn +' .jl3sjpinfo').attr("sjp");
	sjpdsjp(jl3sjptd,lastjl3sjp,classname,'jl3sjp2','hao3 xiaoshi1 shabi1',jl3sjp2);

	var jl4 = julimake(jl3,lastjl3,2,jl4yc,classname,'jlfour fourjl jnycd xiaoshi1');
	var lastjl4 = $(''+ lastcn +' .fourjl .jlspans').text();
	var jl4sjptd = sjpinfo(jl4,lastjl4,classname,'jl4sjp','haoj4 jl4sjpinfo xiaoshi1',jl4sjpyc);
	var lastjl4sjp = $(''+ lastcn +' .jl4sjpinfo').attr("sjp");
	sjpdsjp(jl4sjptd,lastjl4sjp,classname,'jl4sjp2','hao4 xiaoshi1 shabi1',jl4sjp2);

	var qm012 = qm120(nownum,qm012yc,nowtdobj,classname,'qm012 qm012yc xiaoshi1');
	var lastqm012 = $(''+ lastcn +' .qm012').attr("qm012");
	var qm012sjp = sjpinfo(qm012,lastqm012,classname,'qm012sjp','qm012s xiaoshi1',qm012sjpyc);
	var lasqm012sjp = $(''+ lastcn +' .qm012sjp').attr("sjp");
	sjpdsjp(qm012sjp,lasqm012sjp,classname,'qm012sjp2','qm012sjp2s xiaoshi1 shabi1',qm012sjp2);

	var qm012jl = julimake(qm012,lastqm012,2,qm012jlyc,classname,'qm012jl qm012jlss xiaoshi1');
	var lastqm012jl = $(''+ lastcn +' .qm012jl').attr("juli");
	var qm012jlsjp = sjpinfo(qm012jl,lastqm012jl,classname,'qm012jlsjp','qm012jls xiaoshi1',qm012jlsjpyc);
	var lastqm012jlsjp = $(''+ lastcn +' .qm012jlsjp').attr("sjp");
	sjpdsjp(qm012jlsjp,lastqm012jlsjp,classname,'qm012jlsjp2','qm012jlsjp2s xiaoshi1 shabi1',qm012jlsjp2);

	var dx = bigandsmalls(nownum,daxiao,'daxiao daxiaoyc xiaoshi1',classname,nowtdobj);
	var lastdx = $(''+ lastcn +' .daxiao').attr("daxiao");
	var dxsjp = sjpinfo(dx,lastdx,classname,'daxiaosjp','daxiaosjps xiaoshi1',dxsjpyc);
	var lastdxsjp = $(''+ lastcn +' .daxiaosjp').attr("sjp");
	sjpdsjp(dxsjp,lastdxsjp,classname,'daxiaosjp2','daxiaosjp2s xiaoshi1 shabi1',daxiaosjp2);

	var dxjl = julimake(dx,lastdx,2,dxjlyc,classname,'daxiaojl daxiaojlss xiaoshi1');
	var lastdxjl = $(''+ lastcn +' .daxiaojl').attr("juli");
	var dxjlsjp = sjpinfo(dxjl,lastdxjl,classname,'daxiaojlsjp','daxiaojls xiaoshi1',dxjlsjpyc);
	var lastdxjlsjp = $(''+ lastcn +' .daxiaojlsjp').attr("sjp");
	sjpdsjp(dxjlsjp,lastdxjlsjp,classname,'daxiaojlsjp2','daxiaojlsjp2s xiaoshi1 shabi1',dxjlsjp2yc);

}

/*静态数组升降平走势列表生成*/

function attrsjpinfomakes(last,now,classname,lastcn){
	var sjpyc = []; var sjp2yc = []; var jlyc = []; var jlsjpyc = []; var jlsjp2 = [];
	var jl2yc = []; var jl2sjpyc = []; var jl2sjp2 = []; var jl3sjpyc = []; var j3sjp2 = [];
	var jl4sjp2 = []; var jl4sjpyc = [];  var jl3yc = []; var jl4yc = []; var jl3sjp2 =[];
	var qm012yc = []; var qm012sjpyc = []; var qm012sjp2= []; var qm012jlyc= []; var qm012jlsjpyc = [];
	var qm012jlsjp2 = []; var daxiao = []; var dxsjpyc = []; var daxiaosjp2 = []; var dxjlyc = [];
	var dxjlsjpyc = []; var dxjlsjp2yc = [];
	var lastnum = last;
	var nownum  = zxbian05(now);
	var nowtdobj = $(''+classname+'');
	var sjptd   = sjpinfo(nownum,lastnum,classname,'ycsjp','hao xiaoshi1',sjpyc);
	var lastsjp = $(''+ lastcn +' .sjpinfo').attr("sjp");
        //升降平的升降平
	sjpdsjp(sjptd,lastsjp,classname,'ycsjp2','hao2 xiaoshi1 shabi1',sjp2yc);
	var jl1 = julimake(nownum,lastnum,4,jlyc,classname,'jlone onejl jnycd xiaoshi1');
	var lastjl = $(''+ lastcn +' .onejl .jlspans').text();
	var jlsjptd = sjpinfo(jl1,lastjl,classname,'jlsjp','hao jlsjpinfo xiaoshi1',jlsjpyc);
	var lastjlsjp = $(''+ lastcn +' .jlsjpinfo').attr("sjp");
	sjpdsjp(jlsjptd,lastjlsjp,classname,'jlsjp2','hao2 xiaoshi1 shabi1',jlsjp2);
        
	var jl2 = julimake(jl1,lastjl,4,jl2yc,classname,'jltwo twojl jnycd xiaoshi1');
	var lastjl2 = $(''+ lastcn +' .twojl .jlspans').text();
	var jl2sjptd = sjpinfo(jl2,lastjl2,classname,'jl2sjp','haoj2 jl2sjpinfo xiaoshi1',jl2sjpyc);
	var lastjl2sjp = $(''+ lastcn +' .jl2sjpinfo').attr("sjp");
	sjpdsjp(jl2sjptd,lastjl2sjp,classname,'jl2sjp2','hao2 xiaoshi1 shabi1',jl2sjp2);

	var jl3 = julimake(jl2,lastjl2,4,jl3yc,classname,'jlthree threejl jnycd xiaoshi1');
	var lastjl3 = $(''+ lastcn +' .threejl .jlspans').text();
	var jl3sjptd = sjpinfo(jl3,lastjl3,classname,'jl3sjp','haoj3 jl3sjpinfo xiaoshi1',jl3sjpyc);
	var lastjl3sjp = $(''+ lastcn +' .jl3sjpinfo').attr("sjp");
	sjpdsjp(jl3sjptd,lastjl3sjp,classname,'jl3sjp2','hao3 xiaoshi1 shabi1',jl3sjp2);

	var jl4 = julimake(jl3,lastjl3,4,jl4yc,classname,'jlfour fourjl jnycd xiaoshi1');
	var lastjl4 = $(''+ lastcn +' .fourjl .jlspans').text();
	var jl4sjptd = sjpinfo(jl4,lastjl4,classname,'jl4sjp','haoj4 jl4sjpinfo xiaoshi1',jl4sjpyc);
	var lastjl4sjp = $(''+ lastcn +' .jl4sjpinfo').attr("sjp");
	sjpdsjp(jl4sjptd,lastjl4sjp,classname,'jl4sjp2','hao4 xiaoshi1 shabi1',jl4sjp2);

	var qm012 = qm120(nownum,qm012yc,nowtdobj,classname,'qm012 qm012yc xiaoshi1');
	var lastqm012 = $(''+ lastcn +' .qm012').attr("qm012");
	var qm012sjp = sjpinfo(qm012,lastqm012,classname,'qm012sjp','qm012s xiaoshi1',qm012sjpyc);
	var lasqm012sjp = $(''+ lastcn +' .qm012sjp').attr("sjp");
	sjpdsjp(qm012sjp,lasqm012sjp,classname,'qm012sjp2','qm012sjp2s xiaoshi1 shabi1',qm012sjp2);

	var qm012jl = julimake(qm012,lastqm012,2,qm012jlyc,classname,'qm012jl qm012jlss xiaoshi1');
	var lastqm012jl = $(''+ lastcn +' .qm012jl').attr("juli");
	var qm012jlsjp = sjpinfo(qm012jl,lastqm012jl,classname,'qm012jlsjp','qm012jls xiaoshi1',qm012jlsjpyc);
	var lastqm012jlsjp = $(''+ lastcn +' .qm012jlsjp').attr("sjp");
	sjpdsjp(qm012jlsjp,lastqm012jlsjp,classname,'qm012jlsjp2','qm012jlsjp2s xiaoshi1 shabi1',qm012jlsjp2);

	var dx = bigandsmalls(nownum,daxiao,'daxiao daxiaoyc xiaoshi1',classname,nowtdobj);
	var lastdx = $(''+ lastcn +' .daxiao').attr("daxiao");
	var dxsjp = sjpinfo(dx,lastdx,classname,'daxiaosjp','daxiaosjps xiaoshi1',dxsjpyc);
	var lastdxsjp = $(''+ lastcn +' .daxiaosjp').attr("sjp");
	sjpdsjp(dxsjp,lastdxsjp,classname,'daxiaosjp2','daxiaosjp2s xiaoshi1 shabi1',daxiaosjp2);

	var dxjl = julimake(dx,lastdx,2,dxjlyc,classname,'daxiaojl daxiaojlss xiaoshi1');
	var lastdxjl = $(''+ lastcn +' .daxiaojl').attr("juli");
	var dxjlsjp = sjpinfo(dxjl,lastdxjl,classname,'daxiaojlsjp','daxiaojls xiaoshi1',dxjlsjpyc);
	var lastdxjlsjp = $(''+ lastcn +' .daxiaojlsjp').attr("sjp");
	sjpdsjp(dxjlsjp,lastdxjlsjp,classname,'daxiaojlsjp2','daxiaojlsjp2s xiaoshi1 shabi1',dxjlsjp2yc);

}

/*动态数组升降平走势列表生成*/

function livesjpinfomakes(last,now,classname,lastcn){
	var sjpyc = []; var sjp2yc = []; var jlyc = []; var jlsjpyc = []; var jlsjp2 = [];
	var jl2yc = []; var jl2sjpyc = []; var jl2sjp2 = []; var jl3sjpyc = []; var j3sjp2 = [];
	var jl4sjp2 = []; var jl4sjpyc = [];  var jl3yc = []; var jl4yc = []; var jl3sjp2 =[];
	var qm012yc = []; var qm012sjpyc = []; var qm012sjp2= []; var qm012jlyc= []; var qm012jlsjpyc = [];
	var qm012jlsjp2 = []; var daxiao = []; var dxsjpyc = []; var daxiaosjp2 = []; var dxjlyc = [];
	var dxjlsjpyc = []; var dxjlsjp2yc = [];
	var lastnum = last;
	var nownum  = zxbian05(now);
	var nowtdobj = $(''+classname+'');
	var sjptd   = sjpinfo(nownum,lastnum,classname,'ycsjp','hao xiaoshi1',sjpyc);
	var lastsjp = $(''+ lastcn +' .sjpinfo').attr("sjp");
        //升降平的升降平
	sjpdsjp(sjptd,lastsjp,classname,'ycsjp2','hao2 xiaoshi1 shabi1',sjp2yc);
	var jl1 = julimake(nownum,lastnum,3,jlyc,classname,'jlone onejl jnycd xiaoshi1');
	var lastjl = $(''+ lastcn +' .onejl .jlspans').text();
	var jlsjptd = sjpinfo(jl1,lastjl,classname,'jlsjp','hao jlsjpinfo xiaoshi1',jlsjpyc);
	var lastjlsjp = $(''+ lastcn +' .jlsjpinfo').attr("sjp");
	sjpdsjp(jlsjptd,lastjlsjp,classname,'jlsjp2','hao2 xiaoshi1 shabi1',jlsjp2);
        
	var jl2 = julimake(jl1,lastjl,3,jl2yc,classname,'jltwo twojl jnycd xiaoshi1');
	var lastjl2 = $(''+ lastcn +' .twojl .jlspans').text();
	var jl2sjptd = sjpinfo(jl2,lastjl2,classname,'jl2sjp','haoj2 jl2sjpinfo xiaoshi1',jl2sjpyc);
	var lastjl2sjp = $(''+ lastcn +' .jl2sjpinfo').attr("sjp");
	sjpdsjp(jl2sjptd,lastjl2sjp,classname,'jl2sjp2','hao2 xiaoshi1 shabi1',jl2sjp2);

	var jl3 = julimake(jl2,lastjl2,3,jl3yc,classname,'jlthree threejl jnycd xiaoshi1');
	var lastjl3 = $(''+ lastcn +' .threejl .jlspans').text();
	var jl3sjptd = sjpinfo(jl3,lastjl3,classname,'jl3sjp','haoj3 jl3sjpinfo xiaoshi1',jl3sjpyc);
	var lastjl3sjp = $(''+ lastcn +' .jl3sjpinfo').attr("sjp");
	sjpdsjp(jl3sjptd,lastjl3sjp,classname,'jl3sjp2','hao3 xiaoshi1 shabi1',jl3sjp2);

	var jl4 = julimake(jl3,lastjl3,3,jl4yc,classname,'jlfour fourjl jnycd xiaoshi1');
	var lastjl4 = $(''+ lastcn +' .fourjl .jlspans').text();
	var jl4sjptd = sjpinfo(jl4,lastjl4,classname,'jl4sjp','haoj4 jl4sjpinfo xiaoshi1',jl4sjpyc);
	var lastjl4sjp = $(''+ lastcn +' .jl4sjpinfo').attr("sjp");
	sjpdsjp(jl4sjptd,lastjl4sjp,classname,'jl4sjp2','hao4 xiaoshi1 shabi1',jl4sjp2);

	var qm012 = qm120(nownum,qm012yc,nowtdobj,classname,'qm012 qm012yc xiaoshi1');
	var lastqm012 = $(''+ lastcn +' .qm012').attr("qm012");
	var qm012sjp = sjpinfo(qm012,lastqm012,classname,'qm012sjp','qm012s xiaoshi1',qm012sjpyc);
	var lasqm012sjp = $(''+ lastcn +' .qm012sjp').attr("sjp");
	sjpdsjp(qm012sjp,lasqm012sjp,classname,'qm012sjp2','qm012sjp2s xiaoshi1 shabi1',qm012sjp2);

	var qm012jl = julimake(qm012,lastqm012,2,qm012jlyc,classname,'qm012jl qm012jlss xiaoshi1');
	var lastqm012jl = $(''+ lastcn +' .qm012jl').attr("juli");
	var qm012jlsjp = sjpinfo(qm012jl,lastqm012jl,classname,'qm012jlsjp','qm012jls xiaoshi1',qm012jlsjpyc);
	var lastqm012jlsjp = $(''+ lastcn +' .qm012jlsjp').attr("sjp");
	sjpdsjp(qm012jlsjp,lastqm012jlsjp,classname,'qm012jlsjp2','qm012jlsjp2s xiaoshi1 shabi1',qm012jlsjp2);

	var dx = bigandsmalls(nownum,daxiao,'daxiao daxiaoyc xiaoshi1',classname,nowtdobj);
	var lastdx = $(''+ lastcn +' .daxiao').attr("daxiao");
	var dxsjp = sjpinfo(dx,lastdx,classname,'daxiaosjp','daxiaosjps xiaoshi1',dxsjpyc);
	var lastdxsjp = $(''+ lastcn +' .daxiaosjp').attr("sjp");
	sjpdsjp(dxsjp,lastdxsjp,classname,'daxiaosjp2','daxiaosjp2s xiaoshi1 shabi1',daxiaosjp2);

	var dxjl = julimake(dx,lastdx,2,dxjlyc,classname,'daxiaojl daxiaojlss xiaoshi1');
	var lastdxjl = $(''+ lastcn +' .daxiaojl').attr("juli");
	var dxjlsjp = sjpinfo(dxjl,lastdxjl,classname,'daxiaojlsjp','daxiaojls xiaoshi1',dxjlsjpyc);
	var lastdxjlsjp = $(''+ lastcn +' .daxiaojlsjp').attr("sjp");
	sjpdsjp(dxjlsjp,lastdxjlsjp,classname,'daxiaojlsjp2','daxiaojlsjp2s xiaoshi1 shabi1',dxjlsjp2yc);

}


function sjpinfo(indexs,last,appends,self,other,ylmc){
	var numre;
	for(var i =0; i<3; i++){
		if(!ylmc[i]){ylmc[i]=1;}
		var tdshow = '';
		tdshow = "<td class='"+self+" sjpshow " +other+ " sjpinfo zong "+ self+i +"' ></td>";
		$(''+ appends +'').append(tdshow);
	}
	if(Number(indexs) > Number(last)){
		$(''+ appends +' .' +self+'0').append('<span class="sjpsheng">升</span>');
		$(''+ appends +' .'+self).attr("sjp",3);
		ylmc[2] = 1;
		numre =3;
	}else{
		$(''+ appends +' .' +self+'0').append('<span class="ptspan">'+ylmc[2]+'</span>');
		ylmc[2] += 1;
	}
	if(Number(indexs) < Number(last)){
		$(''+ appends +' .' +self+'2').append('<span class="sjpjiang">降</span>');
		$(''+ appends +' .'+self).attr("sjp",1);
		ylmc[0] = 1;
		numre =1;
	}else{
		$(''+ appends +' .' +self+'2').append('<span class="ptspan">'+ylmc[0]+'</span>');
		ylmc[0] += 1;
	}
	if(Number(indexs) == Number(last) ){
		$(''+ appends +' .'+self+'1').append('<span class="sjpping">平</span>');
		$(''+ appends +' .'+self).attr("sjp",2);
		ylmc[1] = 1;
		numre =2;
	}else{
		$(''+ appends +' .'+self+'1').append('<span class="ptspan">'+ylmc[1]+'</span>');
		ylmc[1] += 1;
	}
	return  numre;
}

//生成距离TD
function julimake(now,last,datalen,ylnu,appends,self){
	var juli = Math.abs(now-last);
	if(datalen == 4){
		for(var i=0; i<5; i++){
			if(!ylnu[i]){ylnu[i]=1;}
			var jltd = '';
			if(juli == i){
				jltd = "<td class='juli "+ self +" heng jlyz' juli="+juli+"><span class='jlspans'>"+juli+"</span></td>";
				ylnu[i]=1;	
			}else{
				jltd = "<td class='juli "+ self +" heng'><span class='ptspan'>"+ylnu[i]+"</span></td>";
				ylnu[i]+=1;
			}
			$(''+ appends +'').append(jltd);
		}
		return juli;
	}else if(datalen == 5){
		for(var j=0; j<6; j++){
			if(!ylnu[j]){ylnu[j]=1;}
			var jltd = '';
			if(juli == j){
				jltd = "<td class='juli "+ self +" heng jlyz' juli="+juli+"><span class='jlspans'>"+juli+"</span></td>";
				ylnu[j]=1;	
			}else{
				jltd = "<td class='juli "+ self +" heng'><span class='ptspan'>"+ylnu[j]+"</span></td>";
				ylnu[j]+=1;
			}
			$(''+ appends +'').append(jltd);
		}
		return juli;
	}else if(datalen == 3){
		for(var j=0; j<4; j++){
			if(!ylnu[j]){ylnu[j]=1;}
			var jltd = '';
			if(juli == j){
				jltd = "<td class='juli "+ self +" heng jlyz' juli="+juli+"><span class='jlspans'>"+juli+"</span></td>";
				ylnu[j]=1;	
			}else{
				jltd = "<td class='juli "+ self +" heng'><span class='ptspan'>"+ylnu[j]+"</span></td>";
				ylnu[j]+=1;
			}
			$(''+ appends +'').append(jltd);
		}
		return juli;
	}else if(datalen == 2){
		for(var j=0; j<3; j++){
			if(!ylnu[j]){ylnu[j]=1;}
			var jltd = '';
			if(juli == j){
				jltd = "<td class='juli "+ self +" heng jlyz' juli="+juli+"><span class='jlspans'>"+juli+"</span></td>";
				ylnu[j]=1;	
			}else{
				jltd = "<td class='juli "+ self +" heng'><span class='ptspan'>"+ylnu[j]+"</span></td>";
				ylnu[j]+=1;
			}
			$(''+ appends +'').append(jltd);
		}
		return juli;
	}
}

function bigandsmalls(bigandsmall,dxnum,self,classname,parentclass){
	for(var bi = 0; bi<3; bi++){
		if(!dxnum[bi]){dxnum[bi]=1;}
		var bgsmtd = '';
		bgsmtd = "<td class='heng "+ self +" dxshowoff daxiao daxiao"+bi+"'></td>";
		parentclass.append(bgsmtd);
	}
		if(bigandsmall >= 0 && bigandsmall<1){
			$(''+classname+' .daxiao2').append('<span class="daxiaospan">小</span>');
			$(''+classname+' .daxiao').attr('daxiao',0);
			dxnum[0] = 1;
			var dxval = 0;
			return dxval; 
		}else{
			$(''+classname+' .daxiao2').append('<span class="ptspan">'+dxnum[0]+'</span>');
			dxnum[0] +=1
		} 
		if(bigandsmall >= 1 && bigandsmall<=3){
			$(''+classname+' .daxiao1').append('<span class="daxiaospan">中</span>');
			$(''+classname+' .daxiao').attr('daxiao',1);
			dxnum[1] = 1;
			var dxval = 1;
			return dxval; 
		}else{
			$(''+classname+' .daxiao1').append('<span class="ptspan">'+dxnum[1]+'</span>');
			dxnum[1] +=1
		} 
		if(bigandsmall>3){
			$(''+classname+' .daxiao0').append('<span class="daxiaospan">大</span>');
			$(''+classname+' .daxiao').attr('daxiao',2);
			dxnum[2] = 1;
			var dxval = 2;
			return dxval; 
		}else{
			$(''+classname+' .daxiao0').append('<span class="ptspan">'+dxnum[2]+'</span>');
			dxnum[2] +=1
		}
}

function onlydx(bigandsmall){
	if(bigandsmall >= 0 && bigandsmall<1){
		return 0;
	}
	if(bigandsmall >= 1 && bigandsmall<=3){
		return 1;	
	}
	if(bigandsmall>3){
		return 2;		
	}
}

//将数字类型转化为字母类型
function n2a(num){
    var numA = "X";
    if (num == 120)
        numA = "A";
    else if (num == 60)
        numA = "B";
    else if (num == 30)
        numA = "C";
    else if (num == 20)
        numA = "D";
    else if (num == 10)
        numA = "E";
    else
        numA = "X";
    return numA;
}
//将最后位置的数字转化成字母
function la2ln(lastweizhiA){
    var lastweizhi = 0;
    if (lastweizhiA == "A")
        lastweizhi = 1;
    else if (lastweizhiA == "B")
        lastweizhi = 2;
    else if (lastweizhiA == "C")
        lastweizhi = 3;
    else if (lastweizhiA == "D")
        lastweizhi = 4;
    else if (lastweizhiA == "E")
        lastweizhi = 5;
    else
        lastweizhi = 6;
    return lastweizhi;
}