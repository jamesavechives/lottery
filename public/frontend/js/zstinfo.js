/*$(document).ready(function(){
	var trs = $('.zsttr');
	trs.each(function(key,val){
		//获取开奖日期和开奖号码数组
		var qihao = $(this).data('qihao');
		var kjhm  = $(this).data('kjhm');
		var kjhm_arr = kjhm.split(',');
		//所有td标签
		var alltd = $(this).find('td');
		var kjhm_class = jianghao(kjhm_arr);
		alltd.each(function(k,v){
			//更改开奖号码背景色
			if($(this).hasClass('kjhm')){
				$(this).addClass(kjhm_class);
			}
		});
		//console.log(heng);
	});
})
//开奖号码颜色
function jianghao(array){
	var count = 1;  
    var yuansu= new Array();
    var sum = new Array(); 
	for (var i = 0; i < array.length; i++){   
		for(var j=i+1;j<array.length;j++){  
		    if (array[i] == array[j]) {  
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
	for (var i = 0; i < yuansu.length; i++) {   
		str+=sum[i];  
	}
	return str;  
}
//console.log(k);*/