/*定时器*/
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "/zst/xqtime/",
        dataType: "json",
        success: function(data){
            var data = eval(data);
            var lefttime = data.lefttime;
            var intDiff = parseInt(lefttime);
            timerlivearr(intDiff);
        }
    });
});

//页面首次加载
$(document).ready(function(){
    var xingweisa = [1,2,3,4,5];
    livearrajax(20,xingweisa);
})

$(document).ready(function(){
    $('.sjpjlshow').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                if($(this).hasClass('jlsjpjlshow')){
                    $('#data-tab-livearr-sjp3').animate({
                        top:'0px',
                        left:'0px'
                    },100);
                    $('#data-tab-livearr-sjp3').hide();
                }else{
                    $('#data-tab-livearr-sjp2').animate({
                        top:'0px',
                        left:'0px'
                    },100);
                    $('#data-tab-livearr-sjp2').hide();
                }
            }else{
                $(this).addClass('active');
                if($(this).hasClass('jlsjpjlshow')){
                    $('#data-tab-livearr-sjp3').show();
                    $('#data-tab-livearr-sjp3').animate({
                        top:'225px',
                        left:'489px'
                    },100);
                }else{
                    $('#data-tab-livearr-sjp2').show();
                    $('#data-tab-livearr-sjp2').animate({
                        top:'225px',
                        left:'246px'
                    },100);
                }
            }
        })
    });
})
 /******************预测去的升降平*****************/
$(document).ready(function(){
    var nsho = [];
    $('.yuceone .scycsjp').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).text('');
                $('.yuceone .xiaoshi1').remove();
                $('.jnycd').remove();
                $('.yuceone .hmsjp').removeClass('displaynone');
                nsho = [];
            }else{
                nsho.push('a');
                if(nsho.length == 1){
                    $(this).addClass('active');
                    var num = $(this).data("showval");
                    var numA=n2a(num);
                    $(this).append('<span class="zx120span">'+numA+'</span>');
                    $('.yuceone .hmsjp').addClass('displaynone');
                    var lastweizhiA = $("#data-tab-livearr tr:last .live_arr_zx120 ")[0].firstChild.data;
                    var lastweizhi=la2ln(lastweizhiA);
                    var lastobj = '#data-tab-livearr tr:last';
                    var nowclassname = '.yuceone';
                    livesjpinfomakes(lastweizhi,num,nowclassname,lastobj);
                }else{
                    nsho = [2,4,7,9];
                    alert('不允许输入两个！');
                }
            }
        });
    })

    var nshoa = [];
    $('.yucetwo .scycsjp').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).text('');
                $('.yucetwo .xiaoshi1').remove();
                $('.jnycd').remove();
                $('.yucetwo .hmsjp').removeClass('displaynone');
                nshoa = [];
            }else{
                nshoa.push('a');
                if(nshoa.length == 1){
                    $(this).addClass('active');
                    var num = bians($(this).data("yuce"),5);
                    var numA=n2a(num);
                    $(this).append('<span class="zx120span">'+numA+'</span>');

                    $('.yucetwo .hmsjp').addClass('displaynone');
                    var lastweizhi = $(".yuceone .active").data("yuce");
                    var lastobj = '.yuceone';
                    var nowclassname = '.yucetwo';
                    livesjpinfomakes(lastweizhi,num,nowclassname,lastobj);
                }else{
                    nshoa = [2,4,7,9];
                    alert('不允许输入两个！');
                }
            }
        });
    })

    var nshob = [];
    $('.yucethree .scycsjp').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).text('');
                $('.yucethree .xiaoshi1').remove();
                $('.jnycd').remove();
                $('.yucethree .hmsjp').removeClass('displaynone');
                nshob = [];
            }else{
                nshob.push('a');
                if(nshob.length == 1){
                    $(this).addClass('active');
                    var num = bians($(this).data("yuce"),5);
                    var numA=n2a(num);
                    $(this).append('<span class="zx120span">'+numA+'</span>');

                    $('.yucethree .hmsjp').addClass('displaynone');
                    var lastweizhi = $(".yucetwo .active").data("yuce");
                    var lastobj = '.yucetwo';
                    var nowclassname = '.yucethree';
                    livesjpinfomakes(lastweizhi,num,nowclassname,lastobj);
                }else{
                    nshob = [2,4,7,9];
                    alert('不允许输入两个！');
                }
            }
        });
    })
})