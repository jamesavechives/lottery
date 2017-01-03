$(document).ready(function(){
	$('.dropdown-toggle').on('click',function(){
		if($(this).siblings('.dropdown-menu').hasClass('yjdkl')){
			$(this).siblings('.dropdown-menu').removeClass('yjdkl');
		}else{
			$('.dropdown-menu').removeClass('yjdkl');
			$(this).siblings('.dropdown-menu').addClass('yjdkl');
		}
	});
	$('.guanbi').on('click',function(){
		$('.dropdown-menu').removeClass('yjdkl');
	});
});

/********************20期30期期数***********************/
$(document).ready(function(){
	$('.btn-scs').each(function(){
		$(this).on('click',function(){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
			}else{
				$(this).addClass('active');
				$(this).siblings().removeClass('active');
				var qishu = $(this).data('qishus');
				var weifg = 'ALL';
				hzxajax(qishu,weifg);
				sjpajax(qishu,weifg);
			}
		});
	})
})

$(document).ready(function(){
	$('.qichuzx').click(function(){
		window.location.reload();
	});
})
//显示或隐藏遗漏
$(document).ready(function(){
	$('#yiloushow').click(function(){
		var statu = $(".yilou").css("display");
		if(statu == 'none'){
			$(".yilou").css("display",'block');
			$(".ptspan").css("display",'block');
			$('#yiloushow').text('隐藏遗漏');
		}else{
			$(".yilou").css("display",'none');
			$(".ptspan").css("display",'none');
			$('#yiloushow').text('显示遗漏');
		}
	});
})


//预测区显示隐藏号码
$(document).ready(function(){
	$('.ycsj').click(function(){
		var shuju = $(this).data("yuce");
		if($(this).find('span').text() == ''){
			if($(this).hasClass('heng')){
				$(this).find('span').text(shuju).addClass('yctexth');
			}else if($(this).hasClass('zong')){
				$(this).find('span').text(shuju).addClass('yctextz');
			}else if($(this).hasClass('xie')){
				$(this).find('span').text(shuju).addClass('yctextx');
			}
			
		}else{
			if($(this).hasClass('heng')){
				$(this).find('span').text('').removeClass('yctexth');
			}else if($(this).hasClass('zong')){
				$(this).find('span').text('').removeClass('yctextz');
			}else if($(this).hasClass('xie')){
				$(this).find('span').text('').removeClass('yctextx');
			}
			
		}
		
	})
})
//选择彩种特效
$(document).ready(function(){
	$('.lot-btn').mouseover(function(){
		$('.lot-pop').slideDown(200);
	});
	$('.lot-btn').mouseleave(function(){
		$('.lot-pop').slideUp(100);
	});
})
$(document).ready(function(){
	$('.biaozhu').each(function(){
		if($(this).is(':checked') == true){
			if($(this).val() == 'yl'){
				$(".yilou").addClass('yiloua');
				$(".yiloua").removeClass('yilou');
				$(".ptspan").addClass('ptspana');
				$(".ptspana").removeClass('ptspan');
			}
			if($(this).val() == 'ylfc'){
				$(".yilou").css("display",'block');
				$(".yilou").each(function(){
					$(this).addClass('ylbs');
					$(this).parent().addClass('fcbg');
				});
			}

			if($(this).val() == 'fq'){
				$('.gongtr').find('.fqtds').addClass('fqtdsa');
				$('.gongtr').find('.fqtdsa').removeClass('fqtds');
				
			}

			if($(this).val() == 'fd'){
				$('.fduan').find('td').removeClass('tdbck');
				$('.fduan').find('td').addClass('tdbcka');
			}
		}else{
			if($(this).val() == 'yl'){
				$(".yiloua").addClass('yilou');
				$(".yilou").removeClass('yiloua');
			}
			if($(this).val() == 'ylfc'){
				$(".yilou").css("display",'none');
				$(".yilou").each(function(){
					$(this).removeClass('ylbs');
					$(this).parent().removeClass('fcbg');
				});
			}
			if($(this).val() == 'fq'){
				$('.gongtr').find('.fqtdsa').addClass('fqtds');
				$('.gongtr').find('.fqtds').removeClass('fqtdsa');
			}
			if($(this).val() == 'fd'){
				$('.fduan').find('td').removeClass('tdbcka');
				$('.fduan').find('td').addClass('tdbck');
			}
		}
	});
})

//标注特效  显示隐藏分区，分段，遗漏，遗漏分层
$(document).ready(function(){
	$('.biaozhu').click(function(){
		if($(this).is(':checked') == true){
			if($(this).val() == 'yl'){
				$(".yilou").css('display','block');
				$(".ptspan").css('display','block');
			}
			if($(this).val() == 'ylfc'){
				$(".yilou").css("display",'block');
				$(".yilou").each(function(){
					$(this).addClass('ylbs');
					$(this).parent().addClass('fcbg');
				});
				$(".ptspan").css("display",'block');
				$(".ptspan").each(function(){
					$(this).addClass('ylbs');
					$(this).parent().addClass('fcbg');
				});
			}

			if($(this).val() == 'fq'){
				$('.gongtr').find('.fqtds').addClass('fqtdsa');
				$('.gongtr').find('.fqtdsa').removeClass('fqtds');
				
			}

			if($(this).val() == 'fd'){
				$('.fduan').find('td').removeClass('tdbck');
				$('.fduan').find('td').addClass('tdbcka');
			}
			if($(this).val() == 'fyqh'){
				$('.sjp2').addClass('sjp2fang');
				$('.sjp2fang').removeClass('sjp2');
				$('.sjp1').addClass('sjp1fang');
				$('.sjp1fang').removeClass('sjp1');
				$('.sjp3').addClass('sjp3fang');
				$('.sjp3fang').removeClass('sjp3');

				$('.sjp21').addClass('sjp21fang');
				$('.sjp21fang').removeClass('sjp21');
				$('.sjp22').addClass('sjp22fang');
				$('.sjp22fang').removeClass('sjp22');
				$('.sjp23').addClass('sjp23fang');
				$('.sjp23fang').removeClass('sjp23');
			}
		}else{
			if($(this).val() == 'yl'){
				$(".yiloua").addClass('yilou');
				$(".yilou").removeClass('yiloua');
				$(".yilou").css('display','none');
				$(".ptspana").addClass('ptspan');
				$(".ptspan").removeClass('ptspana');
				$(".ptspan").css('display','none');
			}
			if($(this).val() == 'ylfc'){
				$(".yilou").each(function(){
					$(this).removeClass('ylbs');
					$(this).parent().removeClass('fcbg');
				});
				$(".ptspan").each(function(){
					$(this).removeClass('ylbs');
					$(this).parent().removeClass('fcbg');
				});
			}
			if($(this).val() == 'fq'){
				$('.gongtr').find('.fqtdsa').addClass('fqtds');
				$('.gongtr').find('.fqtds').removeClass('fqtdsa');
			}
			if($(this).val() == 'fd'){
				$('.fduan').find('td').removeClass('tdbcka');
				$('.fduan').find('td').addClass('tdbck');
			}
			if($(this).val() == 'fyqh'){
				$('.sjp2fang').addClass('sjp2');
				$('.sjp2').removeClass('sjp2fang');
				$('.sjp1fang').addClass('sjp1');
				$('.sjp1').removeClass('sjp1fang');
				$('.sjp3fang').addClass('sjp3');
				$('.sjp3').removeClass('sjp3fang');

				$('.sjp22fang').addClass('sjp22');
				$('.sjp22').removeClass('sjp22fang');
				$('.sjp21fang').addClass('sjp21');
				$('.sjp21').removeClass('sjp21fang');
				$('.sjp23fang').addClass('sjp23');
				$('.sjp23').removeClass('sjp23fang');
			}
		}
	});
})


//显示隐藏区域
$(document).ready(function(){
	$('.quanxuansjp').on('click',function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('.biaozhusjp').removeClass('active');
			$('.biaozhusjp').prop('checked',false);
			$(this).prop('checked',false);
			$(".qihao").addClass('yxqycss');
			$(".hxqs").addClass('yxqycss');
			$(".zxqs").addClass('yxqycss');
			$(".xxsa").addClass('yxqycss');
			$(".zxdsjpshowoff").addClass('yxqycss');
			$(".jlshowoff").addClass('yxqycss'); //距离
			$(".jl2showoff").addClass('yxqycss'); //距离
			$(".jl3showoff").addClass('yxqycss'); //距离
			$(".jl4showoff").addClass('yxqycss'); //距离
			$(".qm012showoff").addClass('yxqycss'); //012
			$(".dxshowoff").addClass('yxqycss'); //大小
		}else{
			$(this).addClass('active');
			$(this).prop('checked',true);
			$('.biaozhusjp').addClass('active');
			$('.biaozhusjp').prop('checked',true);
			$(".qihao").removeClass('yxqycss');
			$(".hxqs").removeClass('yxqycss');
			$(".zxqs").removeClass('yxqycss');
			$(".xxsa").removeClass('yxqycss');
			$(".zxdsjpshowoff").removeClass('yxqycss');
			$(".jlshowoff").removeClass('yxqycss'); //距离
			$(".jl2showoff").removeClass('yxqycss'); //距离的距离
			$(".jl3showoff").removeClass('yxqycss'); //距离的距离的
			$(".jl4showoff").removeClass('yxqycss'); //距离的距离的的
			$(".qm012showoff").removeClass('yxqycss'); //012
			$(".dxshowoff").removeClass('yxqycss'); //大小

		}
	});
	$('.biaozhusjp').each(function(xyk,xyv){
		$(this).on('click',function(){
			if($(this).is(':checked') == true){
				if($("input[name='show_on_off']").prop('checked') == true){
					$('.quanxuansjp').prop('checked',true);
				}
				if($(this).val() == 'ycqh'){
					$(".qihao").removeClass('yxqycss');
				}
				if($(this).val() == 'ychx'){
					$(".hxqs").removeClass('yxqycss');
				}
				if($(this).val() == 'yczx'){
					$(".zxqs").removeClass('yxqycss');
				}
				if($(this).val() == 'ycxx'){
					$(".xxsa").removeClass('yxqycss');
				}
				if($(this).val() == 'sjp'){
					$(".zxdsjpshowoff").removeClass('yxqycss');
				}
				if($(this).val() == 'jl'){
					$(".jlshowoff").removeClass('yxqycss');
				}
				if($(this).val() == 'jl2'){
					$(".jl2showoff").removeClass('yxqycss');
				}
				if($(this).val() == 'jl3'){
					$(".jl3showoff").removeClass('yxqycss');
				}
				if($(this).val() == 'jl4'){
					$(".jl4showoff").removeClass('yxqycss');
				}
				if($(this).val() == 'lye'){
					$(".qm012showoff").removeClass('yxqycss');
				}
				if($(this).val() == 'dx'){
					$(".dxshowoff").removeClass('yxqycss');
				}
			}else{
				$('.quanxuansjp').prop('checked',false);
				if($(this).val() == 'ycqh'){
					$(".qihao").addClass('yxqycss');
				}
				if($(this).val() == 'ychx'){
					$(".hxqs").addClass('yxqycss');
				}
				if($(this).val() == 'yczx'){
					$(".zxqs").addClass('yxqycss');
				}
				if($(this).val() == 'ycxx'){
					$(".xxsa").addClass('yxqycss');
				}
				if($(this).val() == 'sjp'){
					$(".zxdsjpshowoff").addClass('yxqycss');
				}
				if($(this).val() == 'jl'){
					$(".jlshowoff").addClass('yxqycss');
				}
				if($(this).val() == 'jl2'){
					$(".jl2showoff").addClass('yxqycss');
				}
				if($(this).val() == 'jl3'){
					$(".jl3showoff").addClass('yxqycss');
				}
				if($(this).val() == 'jl4'){
					$(".jl4showoff").addClass('yxqycss');
				}
				if($(this).val() == 'lye'){
					$(".qm012showoff").addClass('yxqycss');
				}
				if($(this).val() == 'dx'){
					$(".dxshowoff").addClass('yxqycss');
				}
			}

		});
	});
})

//说明
$(document).ready(function(){
	$('#tb_switch').on('click',function(){
		if($('#intro').hasClass('open')){
			$('#intro').removeClass('open');
			$('#intro').css('display','none');
		}else{
			$('#intro').addClass('open');
			$('#intro').css('display','block');
		}
	});
});