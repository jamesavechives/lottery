function creathtml(data){
	//清空之前数据
	$("#data-tab .gongtr").remove();
	$("#data-tab .fduan").remove();
	$(".syy").unbind("click");
	$(".xyy").unbind("click");
	$(".zmy").unbind("click"); 
	//var weiar = [];
	var prevpage = data.prev_page_url;
	var nextpage = data.next_page_url;
	var cpdata = data.data;
	var weiar = data.wei;
	//console.log('ssss',weiar);
	//weiar.sort();
	var fjys = $('#data-tab');
	//横向数据
	var heng_num=[];	var zong_num=[];	var xie_num=[];
	var fqtd = "<td class='fqtds'></td>";
	$.each(cpdata,function(key,cp){
		//全部位
		if(weiar == 'ALL'){
			var arr_xing = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var jhnu = cp['WAN']+cp['QIAN']+cp['BAI']+cp['SHI']+cp['GE'];
		}
		//自由位
		if($.isArray(weiar)){
			var arr_xing = [];
			var jhnu ='';
			weiar.sort();
			for(var xvxh = 0; xvxh<weiar.length; xvxh++){
				if(weiar[xvxh] == '1'){
					arr_xing.push(Number(cp['WAN']));
					jhnu += cp['WAN'];
				}
				if(weiar[xvxh] == '2'){
					arr_xing.push(Number(cp['QIAN']));
					jhnu += cp['QIAN'];
				}
				if(weiar[xvxh] == '3'){
					arr_xing.push(Number(cp['BAI']));
					jhnu += cp['BAI'];
				}
				if(weiar[xvxh] == '4'){
					arr_xing.push(Number(cp['SHI']));
					jhnu += cp['SHI'];
				}
				if(weiar[xvxh] == '5'){
					arr_xing.push(Number(cp['GE']));
					jhnu += cp['GE'];
				}
			}
		}

		//快速选择
                if(weiar == 'QSI'){
			var arr_xing = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI'])];
			var jhnu = cp['WAN']+cp['QIAN']+cp['BAI']+cp['SHI'];
		}
                if(weiar == 'HSI'){
			var arr_xing = [Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var jhnu = cp['QIAN']+cp['BAI']+cp['SHI']+cp['GE'];
		}
		if(weiar == 'QS'){
			var arr_xing = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI'])];
			var jhnu = cp['WAN']+cp['QIAN']+cp['BAI'];
		}
		if(weiar == 'ZS'){
			var arr_xing = [Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI'])];
			var jhnu = cp['QIAN']+cp['BAI']+cp['SHI'];
		}
		if(weiar == 'HS'){
			var arr_xing = [Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var jhnu = cp['BAI']+cp['SHI']+cp['GE'];
		}
		if(weiar == 'QE'){
			var arr_xing = [Number(cp['WAN']),Number(cp['QIAN'])];
			var jhnu = cp['WAN']+cp['QIAN'];
		}
		if(weiar == 'HE'){
			var arr_xing = [Number(cp['SHI']),Number(cp['GE'])];
			var jhnu = cp['SHI']+cp['GE']
		}
		var arr_xings = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
		var jhys = 'jhys'+jianghao(arr_xings);
		var html ="<tr id="+'tr_'+key+" class='gongtr zhshi' data-ssx ="+key+">"
				 +"<td class='hui tdbg_1 qihao'>"+cp['QIHAO']+"</td>"
				 +"<td class='fqtds'></td>"
				 +"<td class='hui kjhaos " +jhys+"'>"+jhnu+"</td>"
				 +"<td class='fqtds'></td>"
				 +"</tr>";
		fjys.append(html);
		//横向
		for(var i=0; i<10; i++){
			if(!heng_num[i]){heng_num[i]=1;}
			var tds = '';
			if($.inArray(i, arr_xing)==-1){
				tds = "<td class='heng text-center hxqs'>"+'<p class="yilou">'+heng_num[i]+'</p>'+"</td>";
				heng_num[i]+=1;
			}else{
				var cishubiao = "";
				if(cishu(arr_xing,i) == 1){
					cishubiao = "";
				}else{
					cishubiao = "<p class='basecs'>"+ cishu(arr_xing,i) +"</p>";
				}
				tds = "<td class='heng hxqs'><span class="+'basejh'+i+">"+ i +"</span>"+cishubiao+"</td>";
				heng_num[i]=1;	
			}
			$('#tr_'+key).append(tds);
		}
		$('#tr_'+key).append(fqtd);
		var qcsz =arr_xing.unique2();
			if(arrange(qcsz)){
				var pipei = arrange(qcsz);
				for(var p=0; p<pipei.length; p++){
					$('#tr_'+key+' .'+'basejh'+pipei[p]).css('background','#CC0000');
				}
			}

		//纵向
		for(i=0;i<10;i++){
			if(!zong_num[i]){zong_num[i]=1;}
			var tds = '';
			if($.inArray(i, arr_xing)==-1){
				tds = "<td class='zxqs "+'zong'+i+" '>"+'<p class="yilou">'+zong_num[i]+'</p>'+"</td>";
				zong_num[i]+=1;
			}else{
				//声明次
				var cishubiao = "";
				if(cishu(arr_xing,i) == 1){
					cishubiao = "";
				}else{
					cishubiao = "<p class='basecsz'>"+ cishu(arr_xing,i) +"</p>";
				}
				tds = "<td class='zxqs "+'zong'+i+" '><span class="+'basejhz'+i+">"+ i +"</span>"+cishubiao+"</td>";
				zong_num[i]=1;
			}
			$('#tr_'+key).append(tds);				
		}
		$('#tr_'+key).append(fqtd);

		//斜向表格
		for(i=0;i<10;i++){
			if(!xie_num[i]){xie_num[i]=1;}
			var tds = '';
			if($.inArray(i, arr_xing)==-1){
				tds = "<td class='xxsa "+'xie'+i+"'>"+'<p class="yilou">'+xie_num[i]+'</p>'+"</td>";
				xie_num[i]+=1;
			}else{
				//声明次
				var cishubiao = "";
				if(cishu(arr_xing,i) == 1){
					cishubiao = "";
				}else{
					cishubiao = "<p class='basecsx'>"+ cishu(arr_xing,i) +"</p>";
				}
				tds = "<td class='xxsa "+'xie'+i+"'><span class="+'basejhx'+i+">"+ i +"</span>"+cishubiao+"</td>";
				xie_num[i]=1;
			}
			$('#tr_'+key).append(tds);
		}


		if(((key+1)%6) == 0){
			var fenduan = "<tr class='fduan'> <td class='tdbck'></td></tr>";
			$('#data-tab').append(fenduan);
		}
	});



	//纵向效果
	for(var ww=0; ww<10; ww++){
		if(zongxian(ww)){
		var zx = zongxian(ww);
		for(var nn=0; nn<zx.length; nn++){
			var aa = $('.zongkk'+zx[nn]);
			aa.each(function(key,value){
				if($(this).hasClass("zong"+ww)){
					$(this).find("span").css('background','#1389EB');
					$(this).find("span").addClass('tjlc');
				}
			})
		}}
	}

	//斜向效果
	xiexiang(0);
	xiexiang(1);
	xiexiang(2);
	xiexiang(3);
	xiexiang(4);
	xiexiang(5);
	xiexiang(6);
	xiexiang(7);
	xiexiang(8);
	xiexiang(9);
	for(var azx=0; azx<10; azx++){
		var xiexiangs = xiexiang(azx);
		//console.log(xiexiangs);
		for(var se=0; se<xiexiangs.length; se++){
			var qianjin = $('.xieas'+xiexiangs[se]);
			var xiearr = new Array();
			qianjin.each(function(key,value){
				if($(this).hasClass("xie"+azx)){
					for(var jj=0; jj<10; jj++){
					    var ii = $('.xie'+(azx+jj));
					    ii.each(function(key,value){
							if($(this).hasClass("xieas"+(xiexiangs[se]+jj))){
								$(this).addClass('kks'+se);
								if($(this).find('span').text() != ''){
								    $(this).find('span').addClass('wri'+se+'zw'+azx);
								    xiearr.push(Number($(this).find('span').text()));
								}
							}
						})
					}
				}
			})
			//console.log(xiearr);
			if(arrangexx(xiearr)){
				var nihaom = arrangexx(xiearr);
				var spanxie = $('.wri'+se+'zw'+azx);
				spanxie.each(function(key,value){
					for(var nnvz=0; nnvz<nihaom.length; nnvz++){
						if($(this).text() === String(nihaom[nnvz])){
							$(this).css('background','#008721');
						}
					}	
				})
			}
		}
	}

	for(var azxy=0; azxy<10; azxy++){
		var xiexiangsy = xiexiang(azxy);
		//console.log(xiexiangs);
		for(var sey=0; sey<xiexiangsy.length; sey++){
			var qianjiny = $('.xieas'+xiexiangsy[sey]);
			var xiearryy = new Array();
			qianjiny.each(function(key,value){
			if($(this).hasClass("xie"+azxy)){
				for(var jjy=0; jjy<10; jjy++){
					var iiy = $('.xie'+(azxy+jjy));
					iiy.each(function(key,value){
					if($(this).hasClass("xieas"+(xiexiangsy[sey]-jjy))){
						$(this).addClass('kksy'+sey);
						if($(this).find('span').text() != ''){
							$(this).find('span').addClass('wriy'+sey+'zw'+azxy);
							xiearryy.push(Number($(this).find('span').text()));
						}
					}
				})
			}
		}
	})
	//console.log(xiearr);
	if(arrangexx(xiearryy)){
		var nihaomy = arrangexx(xiearryy);
		var spanxiey = $('.wriy'+sey+'zw'+azxy);
		spanxiey.each(function(key,value){
			for(var nnvzy=0; nnvzy<nihaomy.length; nnvzy++){
				if($(this).text() === String(nihaomy[nnvzy])){
					$(this).css('background','#008721');
				}
			}	
		})
	}
	}}
//分页
	$(document).ready(function(){
		$('.syy').click(function(){
			var weigh = 'ALL';
			$.ajax({
				type: "GET",
				data: {name: 'cqssc',qishu:20, wei:weigh},
				url: prevpage,
				dataType: "json",
				success: function(data){
					creathtml(data);							            
				}
			});
		}); 
		//$('.xyy').attr('href',nextpage); 
		$('.xyy').click(function(){
			var weigh = 'ALL';
			$.ajax({
				type: "GET",
				data: {name: 'cqssc',qishu:20, wei:weigh},
				url: nextpage,
				dataType: "json",
				success: function(data){
					creathtml(data);							            
				}
			});
		});

		var last = nextpage.split('page=');
		//console.log(nextpage);
		//console.log(last);
		var lastpage = last[0]+'page='+data.last_page;
		//console.log(lastpage);
		$('.zmy').click(function(){
			var weigh = 'ALL';
			$.ajax({
				type: "GET",
				data: {name: 'cqssc',qishu:20, wei:weigh},
				url: last[0]+'page='+1,
				dataType: "json",
				success: function(data){
					creathtml(data);							            
				}
			});
		});
	})

	//统计
$(document).ready(function(){
	//alert('aaaa');
	$.ajax({
		type: "GET",
		url: "/zst/sjtj/",
		dataType: "json",
		success: function(data){
			var cishu = data.showtimes;
			for(var o=0; o<cishu.length; o++){
				$('.tjheng'+o).find('span').text(cishu[o]);
				$('.tjzong'+o).find('span').text(cishu[o]);
				$('.tjxie'+o).find('span').text(cishu[o]);
			}

			$('.htjpjyl0').find('span').text(data.tpj0);
			$('.htjpjyl1').find('span').text(data.tpj1);
			$('.htjpjyl2').find('span').text(data.tpj2);
			$('.htjpjyl3').find('span').text(data.tpj3);
			$('.htjpjyl4').find('span').text(data.tpj4);
			$('.htjpjyl5').find('span').text(data.tpj5);
			$('.htjpjyl6').find('span').text(data.tpj6);
			$('.htjpjyl7').find('span').text(data.tpj7);
			$('.htjpjyl8').find('span').text(data.tpj8);
			$('.htjpjyl9').find('span').text(data.tpj9);

			$('.ztjpjyl0').find('span').text(data.tpj0);
			$('.ztjpjyl1').find('span').text(data.tpj1);
			$('.ztjpjyl2').find('span').text(data.tpj2);
			$('.ztjpjyl3').find('span').text(data.tpj3);
			$('.ztjpjyl4').find('span').text(data.tpj4);
			$('.ztjpjyl5').find('span').text(data.tpj5);
			$('.ztjpjyl6').find('span').text(data.tpj6);
			$('.ztjpjyl7').find('span').text(data.tpj7);
			$('.ztjpjyl8').find('span').text(data.tpj8);
			$('.ztjpjyl9').find('span').text(data.tpj9);

			$('.xtjpjyl0').find('span').text(data.tpj0);
			$('.xtjpjyl1').find('span').text(data.tpj1);
			$('.xtjpjyl2').find('span').text(data.tpj2);
			$('.xtjpjyl3').find('span').text(data.tpj3);
			$('.xtjpjyl4').find('span').text(data.tpj4);
			$('.xtjpjyl5').find('span').text(data.tpj5);
			$('.xtjpjyl6').find('span').text(data.tpj6);
			$('.xtjpjyl7').find('span').text(data.tpj7);
			$('.xtjpjyl8').find('span').text(data.tpj8);
			$('.xtjpjyl9').find('span').text(data.tpj9);

			$('.hzdyl0').find('span').text(yilou(data.yllc0));
			$('.hzdyl1').find('span').text(yilou(data.yllc1));
			$('.hzdyl2').find('span').text(yilou(data.yllc2));
			$('.hzdyl3').find('span').text(yilou(data.yllc3));
			$('.hzdyl4').find('span').text(yilou(data.yllc4));
			$('.hzdyl5').find('span').text(yilou(data.yllc5));
			$('.hzdyl6').find('span').text(yilou(data.yllc6));
			$('.hzdyl7').find('span').text(yilou(data.yllc7));
			$('.hzdyl8').find('span').text(yilou(data.yllc8));
			$('.hzdyl9').find('span').text(yilou(data.yllc9));

			$('.zzdyl0').find('span').text(yilou(data.yllc0));
			$('.zzdyl1').find('span').text(yilou(data.yllc1));
			$('.zzdyl2').find('span').text(yilou(data.yllc2));
			$('.zzdyl3').find('span').text(yilou(data.yllc3));
			$('.zzdyl4').find('span').text(yilou(data.yllc4));
			$('.zzdyl5').find('span').text(yilou(data.yllc5));
			$('.zzdyl6').find('span').text(yilou(data.yllc6));
			$('.zzdyl7').find('span').text(yilou(data.yllc7));
			$('.zzdyl8').find('span').text(yilou(data.yllc8));
			$('.zzdyl9').find('span').text(yilou(data.yllc9));

			$('.xzdyl0').find('span').text(yilou(data.yllc0));
			$('.xzdyl1').find('span').text(yilou(data.yllc1));
			$('.xzdyl2').find('span').text(yilou(data.yllc2));
			$('.xzdyl3').find('span').text(yilou(data.yllc3));
			$('.xzdyl4').find('span').text(yilou(data.yllc4));
			$('.xzdyl5').find('span').text(yilou(data.yllc5));
			$('.xzdyl6').find('span').text(yilou(data.yllc6));
			$('.xzdyl7').find('span').text(yilou(data.yllc7));
			$('.xzdyl8').find('span').text(yilou(data.yllc8));
			$('.xzdyl9').find('span').text(yilou(data.yllc9));

			$('.hzdlc0').find('span').text(arrangetj(data.yllc0));
			$('.hzdlc1').find('span').text(arrangetj(data.yllc1));
			$('.hzdlc2').find('span').text(arrangetj(data.yllc2));
			$('.hzdlc3').find('span').text(arrangetj(data.yllc3));
			$('.hzdlc4').find('span').text(arrangetj(data.yllc4));
			$('.hzdlc5').find('span').text(arrangetj(data.yllc5));
			$('.hzdlc6').find('span').text(arrangetj(data.yllc6));
			$('.hzdlc7').find('span').text(arrangetj(data.yllc7));
			$('.hzdlc8').find('span').text(arrangetj(data.yllc8));
			$('.hzdlc9').find('span').text(arrangetj(data.yllc9));

			$('.zzdlc0').find('span').text(arrangetj(data.yllc0));
			$('.zzdlc1').find('span').text(arrangetj(data.yllc1));
			$('.zzdlc2').find('span').text(arrangetj(data.yllc2));
			$('.zzdlc3').find('span').text(arrangetj(data.yllc3));
			$('.zzdlc4').find('span').text(arrangetj(data.yllc4));
			$('.zzdlc5').find('span').text(arrangetj(data.yllc5));
			$('.zzdlc6').find('span').text(arrangetj(data.yllc6));
			$('.zzdlc7').find('span').text(arrangetj(data.yllc7));
			$('.zzdlc8').find('span').text(arrangetj(data.yllc8));
			$('.zzdlc9').find('span').text(arrangetj(data.yllc9));

			$('.xzdlc0').find('span').text(arrangetj(data.yllc0));
			$('.xzdlc1').find('span').text(arrangetj(data.yllc1));
			$('.xzdlc2').find('span').text(arrangetj(data.yllc2));
			$('.xzdlc3').find('span').text(arrangetj(data.yllc3));
			$('.xzdlc4').find('span').text(arrangetj(data.yllc4));
			$('.xzdlc5').find('span').text(arrangetj(data.yllc5));
			$('.xzdlc6').find('span').text(arrangetj(data.yllc6));
			$('.xzdlc7').find('span').text(arrangetj(data.yllc7));
			$('.xzdlc8').find('span').text(arrangetj(data.yllc8));
			$('.xzdlc9').find('span').text(arrangetj(data.yllc9));
		}
	})
})

}



