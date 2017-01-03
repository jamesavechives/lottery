function creatlivearrhtml(data){
    //console.log(data);
    $("#data-tab-livearr .sjp").remove();
    $("#data-tab-livearr-sjp2 .sjp").remove();
    $("#data-tab-livearr-sjp3 .sjp").remove();
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
    var fjys = $('#data-tab-livearr');
    var fjys2 = $('#data-tab-livearr-sjp2');
    var fjys3 = $('#data-tab-livearr-sjp3');
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
            $('#data-tab-livearr').append(fenduan);
        }
        var eid = cp['EID'];
        //console.log(dataexps[eid]);
        for(var i=1; i<5; i++){
            var tds = '';
            if(dataexps[eid]['one'][i] == 0){
                tds = "<td class='zx120 zx120sjp "+'heng'+i+" ' data-yuce = '"+dataexps[eid]['one'][i]+"'><span class='zx120span live_arr_zx120'>"+abcbian(i,jhnu.length)+"</span></td>";
            }else{
                tds = "<td class='zx120 zx120sjp "+'heng'+i+" ' data-yuce = '"+dataexps[eid]['one'][i]+"'><span class='ptspan'>"+dataexps[eid]['one'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
            if(i == 5){
                $('.heng5').addClass('qudiaos');
            }
        }

        $('#data-tab-livearr #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");

        //升降屏
        var bbb=0;
        for(var b=3; b>=1; b--){
            var tds = '';
            if(dataexps[eid]['sjp_arr'][b] == 0){
                bbb=b;
                break;
            }else{
                continue;
            }
        }
        for(var b=3; b>=1; b--){
            var tds = '';
            if(dataexps[eid]['sjp_arr'][b] == 0){
                tds = "<td class='sjpshow zxdsjpshowoff sjpinfo zong' sjp='"+bbb+"'><span class='sjp"+b+"'>"+sjpbian( b )+"</span></td>";
            }else{
                tds = "<td class='sjpshow zxdsjpshowoff sjpinfo zong' sjp='"+bbb+"'><span class='ptspan'>"+dataexps[eid]['sjp_arr'][b]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var ccc=0;
        for(var c=3; c>=1; c--){
            var tds = '';
            if(dataexps[eid]['sjp2_arr'][c] == 0){
                ccc=c;
                break;
            }else{
              continue;
            }
        }
        for(var c=3; c>=1; c--){
            var tds = '';
            if(dataexps[eid]['sjp2_arr'][c] == 0){
                tds = "<td class='sjpdsjpinfo zxdsjpshowoff sjpdsjp' data-sjp2='"+ccc+"'><span class='sjp2"+c+"'>"+sjpbian( c )+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo zxdsjpshowoff sjpdsjp' data-sjp2='"+ccc+"'><span class='ptspan'>"+dataexps[eid]['sjp2_arr'][c]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        $('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");

        //距离一
        var ddd=0;
        for(var d=0; d<4; d++){
            if(dataexps[eid]['jl_arr'][d] == 0){
               ddd=d;
               break;
            }else{
                continue;
            }
        }
        for(var d=0; d<4; d++){
            var tds = '';
            if(dataexps[eid]['jl_arr'][d] == 0){
                tds = "<td class='heng onejl jlyz jlshowoff "+' heng'+d+"' jl='"+ddd+"'><span class='jlspans'>"+(d)+"</span></td>";
            }else{
                tds = "<td class='juli onejl heng jlshowoff "+' heng'+d+"' jl='"+ddd+"'><span class='ptspan'>"+dataexps[eid]['jl_arr'][d]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
            if(d == 4){
                $('.heng4').addClass('qudiaos');
            }
        }

        //升降平
        var iii=0;
        for(var i=3; i>=1; i--){
            if(dataexps[eid]['jl_sjp_arr'][i] == 0){//data-yuce ='1'
                iii=i;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl_sjp_arr'][i] == 0){//data-yuce ='1'
                iii=i;
                tds = "<td class='sjpshow jlsjpinfo sjpinfo zong jlshowoff' sjp='"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='sjpshow jlsjpinfo sjpinfo zong jlshowoff' sjp='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            if(dataexps[eid]['jl_sjp2_arr'][i] == 0){//data-yuce ='1'
                iii=i;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl_sjp2_arr'][i] == 0){
                iii=i;
                tds = "<td class='sjpdsjpinfo jlsjp2info sjpdsjp jlshowoff' sjp2='"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo jlsjp2info sjpdsjp jlshowoff' sjp2='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }

        $('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");

        //距离二
        var hhh=0;
        for(var h=0; h<4; h++){
            if(dataexps[eid]['jl2_arr'][h] == 0){
                hhh=h;break;
            }else{
                continue;
            }
        }
        for(var h=0; h<4; h++){
            var tds = '';
            if(dataexps[eid]['jl2_arr'][h] == 0){
                hhh=h;
                tds = "<td class='heng twojl jlyz jl2showoff "+'erheng'+h+" ' jl2='"+hhh+"'><span class='jlspans'>"+(h)+"</span></td>";
            }else{
                tds = "<td class='juli twojl heng jl2showoff "+'erheng'+h+" ' jl2='"+hhh+"'><span class='ptspan'>"+dataexps[eid]['jl2_arr'][h]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
            if(h == 4){
                $('.erheng4').addClass('qudiaos');
            }
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            if(dataexps[eid]['jl2_sjp_arr'][i] == 0){//data-yuce ='1'
                iii=i;
            }else{
                continue;
            }
        }

        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl2_sjp_arr'][i] == 0){
                iii=i;
                tds = "<td class='sjpshow sjpinfo jl2sjpinfo zong jl2showoff' sjp='"+iii+"'><span class='sjp"+i+"' data-jl2sjp='"+dataexps[eid]['jl2_sjp_arr'][i]+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='sjpshow jl2sjpinfo sjpinfo zong jl2showoff' sjp='"+iii+"'><span class='ptspan' data-jl2sjp='"+dataexps[eid]['jl2_sjp_arr'][i]+"'>"+dataexps[eid]['jl2_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            if(dataexps[eid]['jl2_sjp2_arr'][i] == 0){//data-yuce ='1'
                iii=i;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl2_sjp2_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 zx120sjp jl2sjp2info jl2showoff ' sjp2='"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 zx120sjp jl2sjp2info jl2showoff' sjp2='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl2_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        $('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");

        //距离三
        var ppp=0;
        for(var p=0; p<4; p++){
            if(dataexps[eid]['jl3_arr'][p] == 0){
                ppp=p;break;
            }else{
                continue;
            }
        }
        for(var p=0; p<4; p++){
            var tds = '';
            if(dataexps[eid]['jl3_arr'][p] == 0){
                ppp=p;
                tds = "<td class='heng threejl jlyz jl3showoff "+'sanheng'+p+" ' jl='"+ppp+"'><span class='jlspans'>"+(p)+"</span></td>";
            }else{
                tds = "<td class='juli threejl heng jl3showoff "+'sanheng'+p+" ' jl='"+ppp+"'><span class='ptspan'>"+dataexps[eid]['jl3_arr'][p]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
            if(p == 4){
                $('.sanheng4').addClass('qudiaos');
            }
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            if(dataexps[eid]['jl3_sjp_arr'][i] == 0){
                iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl3_sjp_arr'][i] == 0){
                tds = "<td class='sjpshow jl3sjpinfo jl3sjp3info sjpinfo zong jl3showoff' sjp='"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='sjpshow jl3sjpinfo jl3sjp3info sjpinfo zong jl3showoff' sjp='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl3_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            if(dataexps[eid]['jl3_sjp2_arr'][i] == 0){
                iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl3_sjp2_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 zx120sjp jl3sjp2info jl3showoff' sjp2='"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 zx120sjp jl3sjp2info jl3showoff' sjp2='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl3_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        $('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");
        //距离四
         var ooo=0;
        for(var o=0; o<4; o++){
            var tds = '';
            if(dataexps[eid]['jl4_arr'][o] == 0){
                ooo=o;break;
            }else{
                continue;
            }
        }
        for(var o=0; o<4; o++){
            var tds = '';
            
            if(dataexps[eid]['jl4_arr'][o] == 0){
               ooo=o;
                tds = "<td class='heng fourjl jlyz jl4showoff "+'siheng'+o+" ' jl='"+ ooo +"'><span class='jlspans'>"+(o)+"</span></td>";
            }else{
                tds = "<td class='juli fourjl heng jl4showoff "+'siheng'+o+" ' jl='"+ ooo +"'><span class='ptspan'>"+dataexps[eid]['jl4_arr'][o]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);

            if(o == 4){
                $('.siheng4').addClass('qudiaos');
            }
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl4_sjp_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            
            if(dataexps[eid]['jl4_sjp_arr'][i] == 0){
                iii=i;
                tds = "<td class='sjpshow sjpinfo jl4sjpinfo zong jl4showoff' sjp='"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='sjpshow sjpinfo jl4sjpinfo zong jl4showoff' sjp='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl4_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['jl4_sjp2_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            
            if(dataexps[eid]['jl4_sjp2_arr'][i] == 0){
                tds = "<td class='zx120 jl4sjp2info zx120sjp jl4showoff ' sjp2='"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 jl4sjp2info zx120sjp jl4showoff ' sjp2='"+iii+"'><span class='ptspan'>"+dataexps[eid]['jl4_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        $('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");

        //012
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=0; i<3; i++){
            var tds = '';
            
            if(dataexps[eid]['qm_012_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 zx120sjp qm012 qm012showoff' qm012 = '"+ iii +"'><span class='zx120span'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 zx120sjp qm012 qm012showoff' qm012 = '"+ iii +"'><span class='ptspan'>"+dataexps[eid]['qm_012_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_sjp_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_sjp_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 qm012sjp qm012showoff' sjp='"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 qm012sjp qm012showoff' sjp='"+iii+"'><span class='ptspan'>"+dataexps[eid]['qm_012_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_sjp2_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            
            if(dataexps[eid]['qm_012_sjp2_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 qm012sjp2 qm012showoff' sjp2='"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 qm012sjp2 qm012showoff' sjp2='"+iii+"'><span class='ptspan'>"+dataexps[eid]['qm_012_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_jl_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['qm_012_jl_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 qm012jl qm012showoff' juli = '"+ iii +"'><span class='zx120span'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 qm012jl qm012showoff' juli = '"+ iii +"'><span class='ptspan'>"+dataexps[eid]['qm_012_jl_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_jl_sjp_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_jl_sjp_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 qm012jlsjp qm012showoff' sjp = '"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 qm012jlsjp qm012showoff' sjp = '"+iii+"'><span class='ptspan'>"+dataexps[eid]['qm_012_jl_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_jl_sjp2_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['qm_012_jl_sjp2_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 qm012jlsjp2 qm012showoff' sjp2 = '"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 qm012jlsjp2 qm012showoff' sjp2 = '"+iii+"'><span class='ptspan'>"+dataexps[eid]['qm_012_jl_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        $('#data-tab-sjp #trzx120_'+key).append("<td class='fqtds'><div class='xian'></div></td>");

        //大中小
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['dzx_arr'][i] == 0){
                iii=i;
                tds = "<td class='daxiao heng dxshowoff' daxiao = '"+iii+"'><span class='daxiaospan'>"+dzxbian(i)+"</span></td>";
            }else{
                tds = "<td class='daxiao heng dxshowoff' daxiao = '"+iii+"'><span class='ptspan'>"+dataexps[eid]['dzx_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_sjp_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_sjp_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 daxiaosjp zx120sjp dxshowoff' sjp = '"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 daxiaosjp zx120sjp dxshowoff' sjp = '"+iii+"'><span class='ptspan'>"+dataexps[eid]['dzx_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_sjp2_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_sjp2_arr'][i] == 0){
                iii=i;
                tds = "<td class='zx120 daxiaosjp2 zx120sjp dxshowoff' sjp2 = '"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 daxiaosjp2 zx120sjp dxshowoff' sjp2 = '"+iii+"'><span class='ptspan'>"+dataexps[eid]['dzx_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_jl_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['dzx_jl_arr'][i] == 0){
                tds = "<td class='zx120 daxiaojl zx120sjp dxshowoff' juli = '"+iii+"'><span class='zx120span'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 daxiaojl zx120sjp dxshowoff' juli = '"+iii+"'><span class='ptspan'>"+dataexps[eid]['dzx_jl_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_jl_sjp_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_jl_sjp_arr'][i] == 0){
                tds = "<td class='zx120 daxiaojlsjp zx120sjp dxshowoff' sjp ='"+iii+"'><span class='sjp"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='zx120 daxiaojlsjp zx120sjp dxshowoff' sjp ='"+iii+"'><span class='ptspan'>"+dataexps[eid]['dzx_jl_sjp_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }
        //大小距离升降屏
        var iii=0;
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_jl_sjp2_arr'][i] == 0){
               iii=i;break;
            }else{
                continue;
            }
        }
        for(var i=3; i>=1; i--){
            var tds = '';
            if(dataexps[eid]['dzx_jl_sjp2_arr'][i] == 0){
                tds = "<td class='sjpdsjpinfo daxiaojlsjp2 sjpdsjp dxshowoff' sjp2 ='"+iii+"'><span class='sjp2"+i+"'>"+sjpbian(i)+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo daxiaojlsjp2 sjpdsjp dxshowoff' sjp2 ='"+iii+"'><span class='ptspan '>"+dataexps[eid]['dzx_jl_sjp2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr #trzx120_'+key).append(tds);
        }

        /*llll*/
        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['sjp_jl_arr'][i] == 0){
                tds = "<td class='heng jlyz sjpjlinfos jlshowoff "+' heng'+d+"' ><span class='jlspans'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='juli heng sjpjlinfos jlshowoff "+' heng'+d+"' ><span class='ptspan'>"+dataexps[eid]['sjp_jl_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr-sjp2 #trzx120_'+key).append(tds);
        }

        for(var b=3; b>=1; b--){
            var tds = '';
            if(dataexps[eid]['sjp_jl_sjp_arr'][b] == 0){
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='sjp"+b+"'>"+sjpbian(b)+"</span></td>";
            }else{
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='ptspan'>"+dataexps[eid]['sjp_jl_sjp_arr'][b]+"</span></td>";
            }
            $('#data-tab-livearr-sjp2 #trzx120_'+key).append(tds);
        }
        for(var c=3; c>=1; c--){
            var tds = '';
            if(dataexps[eid]['sjp_jl_sjp2_arr'][c] == 0){
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='sjp2"+c+"'>"+sjpbian(c)+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='ptspan'>"+dataexps[eid]['sjp_jl_sjp2_arr'][c]+"</span></td>";
            }
            $('#data-tab-livearr-sjp2 #trzx120_'+key).append(tds);
        }

        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['sjp_jl2_arr'][i] == 0){
                tds = "<td class='heng jlyz sjpjlinfos jlshowoff "+' heng'+i+"' ><span class='jlspans'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='juli heng sjpjlinfos jlshowoff "+' heng'+i+"' ><span class='ptspan'>"+dataexps[eid]['sjp_jl2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr-sjp2 #trzx120_'+key).append(tds);
        }

        for(var b=3; b>=1; b--){
            var tds = '';
            if(dataexps[eid]['sjp_jl2_sjp_arr'][b] == 0){
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='sjp"+b+"'>"+sjpbian(b)+"</span></td>";
            }else{
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='ptspan'>"+dataexps[eid]['sjp_jl2_sjp_arr'][b]+"</span></td>";
            }
            $('#data-tab-livearr-sjp2 #trzx120_'+key).append(tds);
        }
        for(var c=3; c>=1; c--){
            var tds = '';
            if(dataexps[eid]['sjp_jl2_sjp2_arr'][c] == 0){
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='sjp2"+c+"'>"+sjpbian(c)+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='ptspan'>"+dataexps[eid]['sjp_jl2_sjp2_arr'][c]+"</span></td>";
            }
            $('#data-tab-livearr-sjp2 #trzx120_'+key).append(tds);
        }

        /*llll*/
        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['jl_sjp_jl_arr'][i] == 0){
                tds = "<td class='heng jlyz sjpjlinfos jlshowoff "+' heng'+i+"' ><span class='jlspans'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='juli heng sjpjlinfos jlshowoff "+' heng'+i+"' ><span class='ptspan'>"+dataexps[eid]['jl_sjp_jl_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr-sjp3 #trzx120_'+key).append(tds);
        }

        for(var b=3; b>=1; b--){
            var tds = '';
            if(dataexps[eid]['jl_sjp_jl_sjp_arr'][b] == 0){
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='sjp"+b+"'>"+sjpbian(b)+"</span></td>";
            }else{
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='ptspan'>"+dataexps[eid]['jl_sjp_jl_sjp_arr'][b]+"</span></td>";
            }
            $('#data-tab-livearr-sjp3 #trzx120_'+key).append(tds);
        }
        for(var c=3; c>=1; c--){
            var tds = '';
            if(dataexps[eid]['jl_sjp_jl_sjp2_arr'][c] == 0){
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='sjp2"+c+"'>"+sjpbian(c)+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='ptspan'>"+dataexps[eid]['jl_sjp_jl_sjp2_arr'][c]+"</span></td>";
            }
            $('#data-tab-livearr-sjp3 #trzx120_'+key).append(tds);
        }

        for(var i=0; i<3; i++){
            var tds = '';
            if(dataexps[eid]['jl_sjp_jl2_arr'][i] == 0){
                tds = "<td class='heng jlyz sjpjlinfos jlshowoff "+' heng'+i+"' ><span class='jlspans'>"+(i)+"</span></td>";
            }else{
                tds = "<td class='juli heng sjpjlinfos jlshowoff "+' heng'+i+"' ><span class='ptspan'>"+dataexps[eid]['jl_sjp_jl2_arr'][i]+"</span></td>";
            }
            $('#data-tab-livearr-sjp3 #trzx120_'+key).append(tds);
        }

        for(var b=3; b>=1; b--){
            var tds = '';
            if(dataexps[eid]['jl_sjp_jl2_sjp_arr'][b] == 0){
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='sjp"+b+"'>"+sjpbian(b)+"</span></td>";
            }else{
                tds = "<td class='sjpshow sjpinfo sjpjlinfos zong'><span class='ptspan'>"+dataexps[eid]['jl_sjp_jl2_sjp_arr'][b]+"</span></td>";
            }
            $('#data-tab-livearr-sjp3 #trzx120_'+key).append(tds);
        }
        for(var c=3; c>=1; c--){
            var tds = '';
            if(dataexps[eid]['jl_sjp_jl2_sjp2_arr'][c] == 0){
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='sjp2"+c+"'>"+sjpbian(c)+"</span></td>";
            }else{
                tds = "<td class='sjpdsjpinfo sjpjlinfos sjpdsjp' ><span class='ptspan'>"+dataexps[eid]['jl_sjp_jl2_sjp2_arr'][c]+"</span></td>";
            }
            $('#data-tab-livearr-sjp3 #trzx120_'+key).append(tds);
        }
        if (jhnu.length == 4) {
            $('tfoot .bs120').data('showval', '24');
            $('tfoot .bs60').data('showval', '12');
            $('tfoot .bs30').data('showval', '6');
            $('tfoot .bs20').data('showval', '4');
            $('tfoot .bs10').data('showval', '2');
            $('.qudiaos').addClass('noshow');
        } else {
            $('tfoot .bs120').data('showval', '120');
            $('tfoot .bs60').data('showval', '60');
            $('tfoot .bs30').data('showval', '30');
            $('tfoot .bs20').data('showval', '20');
            $('tfoot .bs10').data('showval', '10');
            $('tfoot .bs5').data('showval', '5');
        }

    })
    var lasteid = cpdata['19']['EID'];
    $('.livearr-tjf .count_zx').each(function(key,val){
        $(this).text(dataexps[lasteid]['one-count'][key+1]);
    });
    $('.livearr-tjf .count_sjp').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp-count'][key+1]);
    });
    $('.livearr-tjf .count_sjp2').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp2-count'][key+1]);
    });
    $('.livearr-tjf .count_jl').each(function(key,val){
        $(this).text(dataexps[lasteid]['jl-count'][key]);
    });

    $('.livearr-tjf .pjyl_zx').each(function(key,val){
        $(this).text(dataexps[lasteid]['one-pj-miss'][key+1]);
    });
    $('.livearr-tjf .pjyl_sjp').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp-pj-miss'][key+1]);
    });
    $('.livearr-tjf .pjyl_sjp2').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp2-pj-miss'][key+1]);
    });
    $('.livearr-tjf .pjyl_jl').each(function(key,val){
        $(this).text(dataexps[lasteid]['jl-pj-miss'][key]);
    });

    //最大
    $('.livearr-tjf .zdyl_zx').each(function(key,val){
        $(this).text(dataexps[lasteid]['one-max'][key+1]);
    });
    $('.livearr-tjf .zdyl_sjp').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp-max'][key+1]);
    });
    $('.livearr-tjf .zdyl_sjp2').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp2-max'][key+1]);
    });
    $('.livearr-tjf .zdyl_jl').each(function(key,val){
        $(this).text(dataexps[lasteid]['jl-max'][key]);
    });

    //最大
    $('.livearr-tjf .zdlc_zx').each(function(key,val){
        $(this).text(dataexps[lasteid]['one-max-lc'][key+1]);
    });
    $('.livearr-tjf .zdlc_sjp').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp-max-lc'][key+1]);
    });
    $('.livearr-tjf .zdlc_sjp2').each(function(key,val){
        $(this).text(dataexps[lasteid]['sjp2-max-lc'][key+1]);
    });
    $('.livearr-tjf .zdlc_jl').each(function(key,val){
        $(this).text(dataexps[lasteid]['jl-max-lc'][key]);
    });

    $(document).ready(function(){
        $('.syysjp').click(function(){
            var weigh = 'ALL';
            $.ajax({
                type: "get",
                headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
                data: {name: 'cqssc',qishu:20, wei:weigh},
                url: prevpage,
                dataType: "json",
                success: function(data){
                    creatlivearrhtml(data);
                }
            });
        });
        $('.xyysjp').click(function(){
            var weigh = 'ALL';
            $.ajax({
                type: "get",
                headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
                data: {name: 'cqssc',qishu:20, wei:weigh},
                url: nextpage,
                dataType: "json",
                success: function(data){
                    creatlivearrhtml(data);
                }
            });
        });
        $('.zmysjp').click(function(){
            var weigh = 'ALL';
            $.ajax({
                type: "get",
                headers : {'X-CSRF-TOKEN':$('meta[name=_token]').attr('content')},
                data: {name: 'cqssc',qishu:20, wei:weigh},
                url: "/zst/zuxuaninfo?time="+new Date().getTime(),
                dataType: "json",
                success: function(data){
                    creatlivearrhtml(data);
                }
            });
        });
    })
}