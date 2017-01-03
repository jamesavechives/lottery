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
            timer(intDiff);
        }
    });
});
//页面首次加载
$(document).ready(function(){
    var xingweis = [1,2,3,4,5];
    sjpajax(20,xingweis);
    tjcount(xingweis);
    tjpjyl(xingweis);
    tjzdyl(xingweis);
    tjzdlc(xingweis);
})
/*分析方式任意选*/

$(document).ready(function(){
    var xingweis = [1,2,3,4,5];

    //全选
    $('.fxa').on('click',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.fx').removeClass('active');
            xingweis.length == 0;
        }else{
            $(this).addClass('active');
            $('.fx').addClass('active');
            xingweis = [1,2,3,4,5];
            sjpajax(20,xingweis);
            tjcount(xingweis);
            tjpjyl(xingweis);
            tjzdyl(xingweis);
            tjzdlc(xingweis);
        }
    });
    //任意
    $('.fx').each(function(xwk,xwv){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                xingweis.splice($.inArray($(this).data('fx'),xingweis),1);
                if($(this).hasClass('sjpfxa') && xingweis.length<4){
                    alert('请保证至少为4位！');
                    window.location.reload();
                }
                $(this).removeClass('active');
                $('.fxa').removeClass('active');
                if(xingweis.length == 0){
                    window.location.reload();
                    $('.fxa').addClass('active')
                    xingweis = $('.fxa').data('fx');
                    sjpajax(20,xingweis);
                    tjcount(xingweis);
                    tjpjyl(xingweis);
                    tjzdyl(xingweis);
                    tjzdlc(xingweis);
                }else{
                    sjpajax(20,xingweis);
                    tjcount(xingweis);
                    tjpjyl(xingweis);
                    tjzdyl(xingweis);
                    tjzdlc(xingweis);
                }
            }else{
                if($('.kx').hasClass('active') == true){
                    if(confirm(" 切换到自定义选择？")){
                        window.location.reload();
                    }else{
                    }
                }else{
                    $('.fxa').removeClass('active');
                    $('.kx').removeClass('active');
                    $(this).addClass('active');
                    xingweis.push($(this).data('fx'));
                    if(xingweis.length == 5){
                        $('.fxa').addClass('active');
                    }
                    sjpajax(20,xingweis);
                    tjcount(xingweis);
                    tjpjyl(xingweis);
                    tjzdyl(xingweis);
                    tjzdlc(xingweis);
                }
            }
        })
    })
})

/*分析方式快选*/

$(document).ready(function(){
    $('.kx').each(function(kxwk,kxwv){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('.fx').addClass('active');
                $('.fxa').addClass('active');
                $('tfoot .scycsjp').text('');
                $('.jnycd').remove();
                $('.hmsjp').removeClass('displaynone');
                sjpajax(20,'ALL');
                tjcount('ALL');
                tjpjyl('ALL');
                tjzdyl('ALL');
                tjzdlc('ALL');
            }else{
                $('.fx').removeClass('active');
                $('.fxa').removeClass('active');
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                $('tfoot .scycsjp').text('');
                $('.jnycd').remove();
                $('.hmsjp').removeClass('displaynone');
                var shuju = $(this).data('fx');
                sjpajax(20,shuju);
                tjcount(shuju);
                tjpjyl(shuju);
                tjzdyl(shuju);
                tjzdlc(shuju);
            }
        })
    })
})


/******************预测区的升降平*****************/
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
                    $(this).append('<span class="zx120span">'+num+'</span>');
                    $('.yuceone .hmsjp').addClass('displaynone');
                    var lastweizhi = $("#data-tab-sjp tr:last .zx120sjp ").data("yuce");
                    var lastobj = '#data-tab-sjp tr:last';
                    var nowclassname = '.yuceone';
                    sjpinfomakes(lastweizhi,num,nowclassname,lastobj);
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
                    $(this).append('<span class="zx120span">'+num+'</span>');

                    $('.yucetwo .hmsjp').addClass('displaynone');
                    var lastweizhi = $(".yuceone .active").data("yuce");
                    var lastobj = '.yuceone';
                    var nowclassname = '.yucetwo';
                    sjpinfomakes(lastweizhi,num,nowclassname,lastobj);
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
                    $(this).append('<span class="zx120span">'+num+'</span>');

                    $('.yucethree .hmsjp').addClass('displaynone');
                    var lastweizhi = $(".yucetwo .active").data("yuce");
                    var lastobj = '.yucetwo';
                    var nowclassname = '.yucethree';
                    sjpinfomakes(lastweizhi,num,nowclassname,lastobj);
                }else{
                    nshob = [2,4,7,9];
                    alert('不允许输入两个！');
                }
            }
        });
    })
})
$(document).ready(function(){
    $('.sjpjlshow').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                if($(this).hasClass('jlsjpjlshow')){
                    $('#data-tab-sjp3').animate({
                        top:'0px',
                        left:'0px'
                    },100);
                    $('#data-tab-sjp3').hide();
                }else{
                    $('#data-tab-sjp2').animate({
                        top:'0px',
                        left:'0px'
                    },100);
                    $('#data-tab-sjp2').hide();
                }
            }else{
                $(this).addClass('active');
                if($(this).hasClass('jlsjpjlshow')){
                    $('#data-tab-sjp3').show();
                    $('#data-tab-sjp3').animate({
                        top:'220px',
                        left:'570px'
                    },100);
                }else{
                    $('#data-tab-sjp2').show();
                    $('#data-tab-sjp2').animate({
                        top:'220px',
                        left:'286px'
                    },100);
                }
            }
        })
    });
})


/*120/60/24/12等数据筛选*/
$(document).ready(function(){
    var zx120 = [];
    $('.zx120yssj').each(function(){
        $(this).on('click',function(){
            //console.log($(this).parent().parent().attr('class'));
            if($(this).parent().parent().attr('class') == 'u2'){
                var type = 1;
            }else{
                var type = 0;
            }
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('.zx120quanxuan').removeClass('active');
                $('.zx120quanxuan').prop('checked',false);
                zx120.splice($.inArray($(this).val(),zx120),1);
                if(zx120.length == 0){
                    $('#zx120tjdata').text('');
                    $('#zx120countShuzu').text('');
                }else{
                    $.ajax({
                        type: "GET",
                        data: {need:zx120,type:type},
                        url: "/zst/zuxuan/",
                        dataType: "json",
                        success: function(data){
                            if(data.data){
                                $('#zx120tjdata').text(data.data);
                                $('#zx120countShuzu').text('此次筛选共有'+ data.count +'条数据！');
                            }
                        }
                    })
                }
            }else{
                $(this).addClass('active');
                zx120.push($(this).val());
                if(zx120.length == 6){
                    $('.zx120quanxuan').addClass('active');
                    $('.zx120quanxuan').prop('checked',true);
                }
                $.ajax({
                    type: "GET",
                    data: {need:zx120,type:type},
                    url: "/zst/zuxuan/",
                    dataType: "json",
                    success: function(data){
                        if(data.data){
                            $('#zx120tjdata').text(data.data);
                            $('#zx120countShuzu').text('此次筛选共有'+ data.count +'条数据！');
                        }
                    }
                })
            }
        });
    });

    $('.zx120quanxuan').on('click',function(){
        if($(this).parent().parent().attr('class') == 'u2'){
            var type = 1;
        }else{
            var type = 0;
        }
        //$(this).addClass('active')
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.zx120yssj').removeClass('active')
            $('.zx120yssj').prop('checked',false);
            $('#zx120tjdata').text('');
            $('#zx120countShuzu').text('');
            zx120.length = 0;
        }else{
            $('#zx120tjdata').text('');
            $('#zx120countShuzu').text('');
            zx120.length = 0;
            $(this).addClass('active');
            $('.zx120yssj').addClass('active');
            $('.zx120yssj').prop('checked',true);
            if($(this).parent().parent().attr('class') == 'u2'){
                zx120 = [0,1,2,3,4,5];
            }else{
                zx120 = [0,1,2,3,4];
            }

            $.ajax({
                type: "GET",
                data: {need:zx120,type:type},
                url: "/zst/zuxuan/",
                dataType: "json",
                success: function(data){
                    if(data.data){
                        $('#zx120tjdata').text(data.data);
                        $('#zx120countShuzu').text('此次筛选共有'+ data.count +'条数据！');
                    }
                }
            })
        }
    });

    $('#qingchu').click(function(){
        nums = [];
        zx120 = [];
        $('.chosnum').removeClass('active');
        $('.zx120yssj').removeClass('active');
        $('.zx120quanxuan').removeClass('active');
        $('.dmfxjg').text('');
        $('#dmfxzs').text('');
        $('#mychonum').text('');
        $('#zx120tjdata').text('');
        $('#zx120countShuzu').text('');
        $('.zx120quanxuan').prop('checked',false);

        $("input[name='numcount']").prop("checked",false);
        $("input[name='zx120yssj']").prop("checked",false);
        $("input[name='zx24yssj']").prop("checked",false);
        $("input[name='zx24quxuan']").prop("checked",false);
    });
    
    //发送
    $('#fasonginfo').on('click', function () {
        if ($('#zx120tjdata').val().length == 0) {
            alert('没有数据!');
        } else {
            var text = $('#zx120tjdata').val();
            var filename = "fasonginformation"
            var blob = new Blob([text], {
                type: "text/plain;charset=utf-8"
            });
            saveAs(blob, filename + ".txt");
            alert('发送成功!');
        }
    });
    
})



