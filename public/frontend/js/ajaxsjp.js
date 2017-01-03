function creatsjphtml(data){
	$("#data-tab-sjp .sjp").remove();
	$("#data-tab-sjp2 .sjp").remove();
	$("#data-tab-sjp3 .sjp").remove();
	$('#zuxuan120 .fduan').remove();
	$('.fq').prop('checked',false);
	$('.ylfc').prop('checked',false);
	$('.fd').prop('checked',false);
	$('.gongtr').find('.fqtdsa').addClass('fqtds');
	$('.gongtr').find('.fqtds').removeClass('fqtdsa');
	$('.fduan').find('td').removeClass('tdbcka');
	$('.fduan').find('td').addClass('tdbck');
	$(".syysjp").unbind("click");
	$(".xyysjp").unbind("click");
	$(".zmysjp").unbind("click"); 
	var prevpage = data.prev_page_url;
	var nextpage = data.next_page_url;
	var cpdata = data.data;
	var weiar = data.wei;
	var dataexps = data.exps;
	var fjys = $('#data-tab-sjp');
	var fjys2 = $('#data-tab-sjp2');
	var fjys3 = $('#data-tab-sjp3');
	$.each(cpdata,function(key,cp){
		if(weiar == 'ALL'){
			var arr_xing = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var arr_xings = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var jhnu = cp['WAN']+cp['QIAN']+cp['BAI']+cp['SHI']+cp['GE'];
			
		}
		//自由位
		if($.isArray(weiar)){
			var arr_xing = [];
			var arr_xings = [];
			var jhnu ='';
			weiar.sort();
			for(var xvxh = 0; xvxh<weiar.length; xvxh++){
				if(weiar[xvxh] == '1'){
					arr_xing.push(Number(cp['WAN']));
					arr_xings.push(Number(cp['WAN']));
					jhnu += cp['WAN'];
				}
				if(weiar[xvxh] == '2'){
					arr_xing.push(Number(cp['QIAN']));
					arr_xings.push(Number(cp['QIAN']));
					jhnu += cp['QIAN'];
				}
				if(weiar[xvxh] == '3'){
					arr_xing.push(Number(cp['BAI']));
					arr_xings.push(Number(cp['BAI']));
					jhnu += cp['BAI'];
				}
				if(weiar[xvxh] == '4'){
					arr_xing.push(Number(cp['SHI']));
					arr_xings.push(Number(cp['SHI']));
					jhnu += cp['SHI'];
				}
				if(weiar[xvxh] == '5'){
					arr_xing.push(Number(cp['GE']));
					arr_xings.push(Number(cp['GE']));
					jhnu += cp['GE'];
				}
			}
		}

		//快速选择
		if(weiar == 'QS'){
			var arr_xings = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI'])];
			var arr_xing = [Number(cp['WAN']),Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI'])];
			var jhnu = cp['WAN']+cp['QIAN']+cp['BAI']+cp['SHI'];
		}
		if(weiar == 'HS'){
			var arr_xings = [Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var arr_xing = [Number(cp['QIAN']),Number(cp['BAI']),Number(cp['SHI']),Number(cp['GE'])];
			var jhnu = cp['QIAN']+cp['BAI']+cp['SHI']+cp['GE'];
		}
		var jhys = 'jhys'+jianghao(arr_xings);
		var html ="<tr id="+'trzx120_'+key+" class='sjp gongtr zhshi' data-ssx ="+key+">"
				 +"<td class='hui tdbg_1 qihao yxqycss'>"+cp['QIHAO']+"</td>"
				 +"<td class='fqtds'><div class='xian'></div></td>"
				 +"<td class='hui kjhaos " +jhys+"'>"+jhnu+"</td>"
				 +"<td class='fqtds'><div class='xian'></div></td>"
				 +"</tr>";
		fjys.append(html);

		var html2 = "<tr id="+'trzx120_'+key+" class='sjp gongtr zhshi' data-ssx ="+key+">"+"</tr>";
		fjys2.append(html2);
		var html3 = "<tr id="+'trzx120_'+key+" class='sjp gongtr zhshi' data-ssx ="+key+">"+"</tr>";
		fjys3.append(html3);
		if(((key+1)%6) == 0){
			var fenduan = "<tr class='fduan'> <td class='tdbck' colspan='100'></td></tr>";
			$('#data-tab-sjp').append(fenduan);
		}
		var eid = cp['EID'];
		//console.log(dataexps[eid]);
		for(var i=1; i<7; i++){
			var tds = '';
			if(dataexps[eid]['one'][i] == 0){
				tds = "<td class='zx120 zx120sjp "+'heng'+i+" ' data-yuce = '"+dataexps[eid]['zuxuan_val']+"'><span class='zx120span'>"+bians(dataexps[eid]['zuxuan_val'],jhnu.length)+"</span></td>";
			}else{
				tds = "<td class='zx120 zx120sjp "+'heng'+i+" ' data-yuce = '"+dataexps[eid]['zuxuan_val']+"'><span class='ptspan'>"+dataexps[eid]['one'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
			if(i == 6){
				$('.heng6').addClass('qudiaos');
			}
		}

		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
		//升降屏
		for(var b=3; b>=1; b--){
			var tds = '';
			if(dataexps[eid]['sjp'] == b){
				tds = "<td class='sjpshow zxdsjpshowoff sjpinfo zong' sjp='"+dataexps[eid]['sjp']+"'><span class='sjp"+b+"'>"+sjpbian(dataexps[eid]['sjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow zxdsjpshowoff sjpinfo zong' sjp='"+dataexps[eid]['sjp']+"'><span class='ptspan'>"+dataexps[eid]['sjpyl'][b]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		for(var c=3; c>=1; c--){
			var tds = '';
			if(dataexps[eid]['sjp2'] == c){
				tds = "<td class='sjpdsjpinfo zxdsjpshowoff sjpdsjp' data-sjp2='"+dataexps[eid]['sjp2']+"'><span class='sjp2"+c+"'>"+sjpbian(dataexps[eid]['sjp2'])+"</span></td>";
			}else{
				tds = "<td class='sjpdsjpinfo zxdsjpshowoff sjpdsjp' data-sjp2='"+dataexps[eid]['sjp2']+"'><span class='ptspan'>"+dataexps[eid]['sjpyl2'][c]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
		//距离一 
		for(var d=1; d<7; d++){
			var tds = '';
			if(dataexps[eid]['jlyl'][d] == 0){
				tds = "<td class='heng onejl jlyz jlshowoff "+' heng'+d+"' jl='"+dataexps[eid]['jl']+"'><span class='jlspans'>"+(d-1)+"</span></td>";
			}else{
				tds = "<td class='juli onejl heng jlshowoff "+' heng'+d+"' jl='"+dataexps[eid]['jl']+"'><span class='ptspan'>"+dataexps[eid]['jlyl'][d]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
			if(d == 6){
				$('.heng6').addClass('qudiaos');
			}
		}
		//圣经平
		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jlsjp'] == i){//data-yuce ='1'
				tds = "<td class='sjpshow jlsjpinfo sjpinfo zong jlshowoff' sjp='"+dataexps[eid]['jlsjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['jlsjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow jlsjpinfo sjpinfo zong jlshowoff' sjp='"+dataexps[eid]['jlsjp']+"'><span class='ptspan'>"+dataexps[eid]['jlsjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jlsjp2'] == i){
				tds = "<td class='sjpdsjpinfo jlsjp2info sjpdsjp jlshowoff' sjp2='"+dataexps[eid]['jlsjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['jlsjp2'])+"</span></td>";
			}else{
				tds = "<td class='sjpdsjpinfo jlsjp2info sjpdsjp jlshowoff' sjp2='"+dataexps[eid]['jlsjp2']+"'><span class='ptspan'>"+dataexps[eid]['jlsjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
		//距离二
		for(var h=1; h<6; h++){
			var tds = '';
			if(dataexps[eid]['jl2yl'][h] == 0){
				tds = "<td class='heng twojl jlyz jl2showoff "+'erheng'+h+" ' jl2='"+dataexps[eid]['jl2']+"'><span class='jlspans'>"+(h-1)+"</span></td>";
			}else{
				tds = "<td class='juli twojl heng jl2showoff "+'erheng'+h+" ' jl2='"+dataexps[eid]['jl2']+"'><span class='ptspan'>"+dataexps[eid]['jl2yl'][h]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
			if(h == 5){
				$('.erheng5').addClass('qudiaos');
			}
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jl2sjp'] == i){
				tds = "<td class='sjpshow sjpinfo jl2sjpinfo zong jl2showoff' sjp='"+dataexps[eid]['jl2sjp']+"'><span class='sjp"+i+"' data-jl2sjp='"+dataexps[eid]['jl2sjp']+"'>"+sjpbian(dataexps[eid]['jl2sjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow jl2sjpinfo sjpinfo zong jl2showoff' sjp='"+dataexps[eid]['jl2sjp']+"'><span class='ptspan' data-jl2sjp='"+dataexps[eid]['jl2sjp']+"'>"+dataexps[eid]['jl2sjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jl2sjp2'] == i){
				tds = "<td class='zx120 zx120sjp jl2sjp2info jl2showoff ' sjp2='"+dataexps[eid]['jl2sjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['jl2sjp2'])+"</span></td>";
			}else{
				tds = "<td class='zx120 zx120sjp jl2sjp2info jl2showoff' sjp2='"+dataexps[eid]['jl2sjp2']+"'><span class='ptspan'>"+dataexps[eid]['jl2sjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
		//距离三
		for(var p=1; p<5; p++){
			var tds = '';
			if(dataexps[eid]['jl3yl'][p] == 0){
				tds = "<td class='heng threejl jlyz jl3showoff "+'sanheng'+p+" ' jl='"+dataexps[eid]['jl3']+"'><span class='jlspans'>"+(p-1)+"</span></td>";
			}else{
				tds = "<td class='juli threejl heng jl3showoff "+'sanheng'+p+" ' jl='"+dataexps[eid]['jl3']+"'><span class='ptspan'>"+dataexps[eid]['jl3yl'][p]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
			if(p == 4){
				$('.sanheng4').addClass('qudiaos');
			}
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jl3sjp'] == i){
				tds = "<td class='sjpshow jl3sjpinfo jl3sjp3info sjpinfo zong jl3showoff' sjp='"+dataexps[eid]['jl3sjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['jl3sjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow jl3sjpinfo jl3sjp3info sjpinfo zong jl3showoff' sjp='"+dataexps[eid]['jl3sjp']+"'><span class='ptspan'>"+dataexps[eid]['jl3sjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jl3sjp2'] == i){
				tds = "<td class='zx120 zx120sjp jl3sjp2info jl3showoff' sjp2='"+dataexps[eid]['jl3sjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['jl3sjp2'])+"</span></td>";
			}else{
				tds = "<td class='zx120 zx120sjp jl3sjp2info jl3showoff' sjp2='"+dataexps[eid]['jl3sjp2']+"'><span class='ptspan'>"+dataexps[eid]['jl3sjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
		//距离四
		for(var o=1; o<4; o++){
			var tds = '';
			if(dataexps[eid]['jl4yl'][o] == 0){
				tds = "<td class='heng fourjl jlyz jl4showoff "+'siheng'+o+" ' jl='"+dataexps[eid]['jl4']+"'><span class='jlspans'>"+(o-1)+"</span></td>";
			}else{
				tds = "<td class='juli fourjl heng jl4showoff "+'siheng'+o+" ' jl='"+dataexps[eid]['jl4']+"'><span class='ptspan'>"+dataexps[eid]['jl4yl'][o]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);

			if(o == 3){
				$('.siheng3').addClass('qudiaos');
			}
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jl4sjp'] == i){
				tds = "<td class='sjpshow sjpinfo jl4sjpinfo zong jl4showoff' sjp='"+dataexps[eid]['jl4sjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['jl4sjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow sjpinfo jl4sjpinfo zong jl4showoff' sjp='"+dataexps[eid]['jl4sjp']+"'><span class='ptspan'>"+dataexps[eid]['jl4sjpyl'] [i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['jl4sjp2'] == i){
				tds = "<td class='zx120 jl4sjp2info zx120sjp jl4showoff ' sjp2='"+dataexps[eid]['jl4sjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['jl4sjp2'] )+"</span></td>";
			}else{
				tds = "<td class='zx120 jl4sjp2info zx120sjp jl4showoff ' sjp2='"+dataexps[eid]['jl4sjp2']+"'><span class='ptspan'>"+dataexps[eid]['jl4sjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>"); 
		//012
		for(var i=1; i<4; i++){
			var tds = '';
			if(dataexps[eid]['qm012yl'][i] == 0){
				tds = "<td class='zx120 zx120sjp qm012 qm012showoff' qm012 = '"+ dataexps[eid]['qm012'] +"'><span class='zx120span'>"+(i-1)+"</span></td>";
			}else{
				tds = "<td class='zx120 zx120sjp qm012 qm012showoff' qm012 = '"+ dataexps[eid]['qm012'] +"'><span class='ptspan'>"+dataexps[eid]['qm012yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['qm012sjp'] == i){
				tds = "<td class='zx120 qm012sjp qm012showoff' sjp='"+dataexps[eid]['qm012sjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['qm012sjp'])+"</span></td>";
			}else{
				tds = "<td class='zx120 qm012sjp qm012showoff' sjp='"+dataexps[eid]['qm012sjp']+"'><span class='ptspan'>"+dataexps[eid]['qm012sjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['qm012sjp2'] == i){
				tds = "<td class='zx120 qm012sjp2 qm012showoff' sjp2='"+dataexps[eid]['qm012sjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['qm012sjp2'])+"</span></td>";
			}else{
				tds = "<td class='zx120 qm012sjp2 qm012showoff' sjp2='"+dataexps[eid]['qm012sjp2']+"'><span class='ptspan'>"+dataexps[eid]['qm012sjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}  

		for(var i=1; i<4; i++){
			var tds = '';
			if(dataexps[eid]['qm012jlyl'][i] == 0){
				tds = "<td class='zx120 qm012jl qm012showoff' juli = '"+dataexps[eid]['qm012jl']+"'><span class='zx120span'>"+(i-1)+"</span></td>";
			}else{
				tds = "<td class='zx120 qm012jl qm012showoff' juli = '"+dataexps[eid]['qm012jl']+"'><span class='ptspan'>"+dataexps[eid]['qm012jlyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['qm012jlsjp'] == i){
				tds = "<td class='zx120 qm012jlsjp qm012showoff' sjp = '"+dataexps[eid]['qm012jlsjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['qm012jlsjp'])+"</span></td>";
			}else{
				tds = "<td class='zx120 qm012jlsjp qm012showoff' sjp = '"+dataexps[eid]['qm012jlsjp']+"'><span class='ptspan'>"+dataexps[eid]['qm012jlsjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['qm012jlsjp2'] == i){
				tds = "<td class='zx120 qm012jlsjp2 qm012showoff' sjp2 = '"+dataexps[eid]['qm012jlsjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['qm012jlsjp2'])+"</span></td>";
			}else{
				tds = "<td class='zx120 qm012jlsjp2 qm012showoff' sjp2 = '"+dataexps[eid]['qm012jlsjp2']+"'><span class='ptspan'>"+dataexps[eid]['qm012jlsjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		$('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
		//大中小
		for(var i=1; i<4; i++){
			var tds = '';
			if(dataexps[eid]['dxyl'][i] == 0){
				tds = "<td class='daxiao heng dxshowoff' daxiao = '"+dataexps[eid]['dx']+"'><span class='daxiaospan'>"+dzxbian(dataexps[eid]['dx'])+"</span></td>";
			}else{
				tds = "<td class='daxiao heng dxshowoff' daxiao = '"+dataexps[eid]['dx']+"'><span class='ptspan'>"+dataexps[eid]['dxyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['dxsjp'] == i){
				tds = "<td class='zx120 daxiaosjp zx120sjp dxshowoff' sjp = '"+dataexps[eid]['dxsjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['dxsjp'])+"</span></td>";
			}else{
				tds = "<td class='zx120 daxiaosjp zx120sjp dxshowoff' sjp = '"+dataexps[eid]['dxsjp']+"'><span class='ptspan'>"+dataexps[eid]['dxsjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['dxsjp2'] == i){
				tds = "<td class='zx120 daxiaosjp2 zx120sjp dxshowoff' sjp2 = '"+dataexps[eid]['dxsjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['dxsjp2'])+"</span></td>";
			}else{
				tds = "<td class='zx120 daxiaosjp2 zx120sjp dxshowoff' sjp2 = '"+dataexps[eid]['dxsjp2']+"'><span class='ptspan'>"+dataexps[eid]['dxsjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}  

		for(var i=1; i<4; i++){
			var tds = '';
			if(dataexps[eid]['dxjlyl'][i] == 0){
				tds = "<td class='zx120 daxiaojl zx120sjp dxshowoff' juli = '"+dataexps[eid]['dxjl']+"'><span class='zx120span'>"+(i-1)+"</span></td>";
			}else{
				tds = "<td class='zx120 daxiaojl zx120sjp dxshowoff' juli = '"+dataexps[eid]['dxjl']+"'><span class='ptspan'>"+dataexps[eid]['dxjlyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}

		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['dxjlsjp'] == i){
				tds = "<td class='zx120 daxiaojlsjp zx120sjp dxshowoff' sjp ='"+dataexps[eid]['dxjlsjp']+"'><span class='sjp"+i+"'>"+sjpbian(dataexps[eid]['dxjlsjp'])+"</span></td>";
			}else{
				tds = "<td class='zx120 daxiaojlsjp zx120sjp dxshowoff' sjp ='"+dataexps[eid]['dxjlsjp']+"'><span class='ptspan'>"+dataexps[eid]['dxjlsjpyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}
		//大小距离升降屏
		for(var i=3; i>=1; i--){
			var tds = '';
			if(dataexps[eid]['dxjlsjp2'] == i){
				tds = "<td class='sjpdsjpinfo daxiaojlsjp2 sjpdsjp dxshowoff' sjp2 ='"+dataexps[eid]['dxjlsjp2']+"'><span class='sjp2"+i+"'>"+sjpbian(dataexps[eid]['dxjlsjp2'])+"</span></td>";
			}else{
				tds = "<td class='sjpdsjpinfo daxiaojlsjp2 sjpdsjp dxshowoff' sjp2 ='"+dataexps[eid]['dxjlsjp2']+"'><span class='ptspan '>"+dataexps[eid]['dxjlsjp2yl'][i]+"</span></td>";
			}
			$('#data-tab-sjp #trzx120_'+key).append(tds);
		}



		///////////////////////////////////////////////
		for(var i=1; i<4; i++){
			var tds = '';
			if(dataexps[eid]['sjpjlyl'][i] == 0){
				tds = "<td class='heng jlyz sjpjlinfos jlshowoff "+' heng'+d+"' ><span class='jlspans'>"+(i-1)+"</span></td>";
			}else{
				tds = "<td class='juli heng sjpjlinfos jlshowoff "+' heng'+d+"' ><span class='ptspan'>"+dataexps[eid]['sjpjlyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp2 #trzx120_'+key).append(tds);
		}

		for(var b=3; b>=1; b--){
			var tds = '';
			if(dataexps[eid]['sjpjlsjp'] == b){
				tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='sjp"+b+"'>"+sjpbian(dataexps[eid]['sjpjlsjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='ptspan'>"+dataexps[eid]['sjpjlsjpyl'][b]+"</span></td>";
			}
			$('#data-tab-sjp2 #trzx120_'+key).append(tds);
		}
		for(var c=3; c>=1; c--){
			var tds = '';
			if(dataexps[eid]['sjpjlsjp2'] == c){
				tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='sjp2"+c+"'>"+sjpbian(dataexps[eid]['sjpjlsjp2'])+"</span></td>";
			}else{
				tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='ptspan'>"+dataexps[eid]['sjpjlsjp2yl'][c]+"</span></td>";
			}
			$('#data-tab-sjp2 #trzx120_'+key).append(tds);
		}

		
		/////////////////////////////////////////////////////////
		for(var i=1; i<4; i++){
			var tds = '';
			if(dataexps[eid]['jlsjpjlyl'][i] == 0){
				tds = "<td class='heng jlyz jlsjpjlinfos jlshowoff "+' heng'+d+"' ><span class='jlspans'>"+(i-1)+"</span></td>";
			}else{
				tds = "<td class='juli heng jlsjpjlinfos jlshowoff "+' heng'+d+"' ><span class='ptspan'>"+dataexps[eid]['jlsjpjlyl'][i]+"</span></td>";
			}
			$('#data-tab-sjp3 #trzx120_'+key).append(tds);
		}

		for(var b=3; b>=1; b--){
			var tds = '';
			if(dataexps[eid]['jlsjpjlsjp'] == b){
				tds = "<td class='sjpshow sjpinfo jlsjpjlinfos zong'><span class='sjp"+b+"'>"+sjpbian(dataexps[eid]['jlsjpjlsjp'])+"</span></td>";
			}else{
				tds = "<td class='sjpshow sjpinfo jlsjpjlinfos zong'><span class='ptspan'>"+dataexps[eid]['jlsjpjlsjpyl'][b]+"</span></td>";
			}
			$('#data-tab-sjp3 #trzx120_'+key).append(tds);
		}
		for(var c=3; c>=1; c--){
			var tds = '';
			if(dataexps[eid]['jlsjpjlsjp2'] == c){
				tds = "<td class='sjpdsjpinfo jlsjpjlinfos sjpdsjp' ><span class='sjp2"+c+"'>"+sjpbian(dataexps[eid]['jlsjpjlsjp2'])+"</span></td>";
			}else{
				tds = "<td class='sjpdsjpinfo jlsjpjlinfos sjpdsjp' ><span class='ptspan'>"+dataexps[eid]['jlsjpjlsjp2yl'][c]+"</span></td>";
			}
			$('#data-tab-sjp3 #trzx120_'+key).append(tds);
		}

		if(jhnu.length == 4){
			$('#about120').attr("colspan",'5');
			$('.wojian1').attr("colspan",'5');
			$('.wojian2').attr("colspan",'4');
			$('.wojian3').attr("colspan",'3');
			$('.wojian4').attr("colspan",'2');
			$('tfoot .bs120').data('showval','24');
			$('tfoot .bs60').data('showval','12');
			$('tfoot .bs30').data('showval','6');
			$('tfoot .bs20').data('showval','4');
			$('tfoot .bs10').data('showval','2');
			$('.qudiaos').addClass('noshow');
			$('#n120').text('24');
			$('#n60').text('12');
			$('#n30').text('6');
			$('#n20').text('4');
			$('#n10').text('2');			
			$('.u2').css('display','none');
			$('.u23').css('display','block');
		}else{
			$('tfoot .bs120').data('showval','120');
			$('tfoot .bs60').data('showval','60');
			$('tfoot .bs30').data('showval','30');
			$('tfoot .bs20').data('showval','20');
			$('tfoot .bs10').data('showval','10');
			$('tfoot .bs5').data('showval','5');
			$('#n120').text('120');
			$('#n60').text('60');
			$('#n30').text('30');
			$('#n20').text('20');
			$('#n10').text('10');
			$('#n5').text('5');	
			$('#about120').attr("colspan",'6');
			$('.wojian1').attr("colspan",'6');
			$('.wojian2').attr("colspan",'5');
			$('.wojian3').attr("colspan",'4');
			$('.wojian4').attr("colspan",'3');
			$('.qudiaos').removeClass('noshow');
			$('.u2').css('display','block');
			$('.u23').css('display','none');
		}
	})

$(document).ready(function(){
		$('.syysjp').click(function(){
			var weigh = 'ALL';
			$.ajax({
				type: "post",
				headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
				data: {name: 'cqssc',qishu:20, wei:weigh},
				url: prevpage,
				dataType: "json",
				success: function(data){
					creatsjphtml(data);							            
				}
			});
		}); 
		$('.xyysjp').click(function(){
			var weigh = 'ALL';
			$.ajax({
				type: "post",
				headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
				data: {name: 'cqssc',qishu:20, wei:weigh},
				url: nextpage,
				dataType: "json",
				success: function(data){
					creatsjphtml(data);							            
				}
			});
		});
		$('.zmysjp').click(function(){
			var weigh = 'ALL';
			$.ajax({
				type: "post",
				headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
				data: {name: 'cqssc',qishu:20, wei:weigh},
				url: "/zst/zuxuaninfo?time="+new Date().getTime(),
				dataType: "json",
				success: function(data){
					creatsjphtml(data);							            
				}
			});
		});
	})
}