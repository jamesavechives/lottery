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
            timerstatarr(intDiff);
        }
    });
});

//页面首次加载
$(document).ready(function(){
    var xingweisa = [1,2,3,4,5];
    statarrajax(20,xingweisa);
})

$(document).ready(function(){
    $('.sjpjlshow').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                if($(this).hasClass('jlsjpjlshow')){
                    $('#data-tab-statarr-sjp3').animate({
                        top:'0px',
                        left:'0px'
                    },100);
                    $('#data-tab-statarr-sjp3').hide();
                }else{
                    $('#data-tab-statarr-sjp2').animate({
                        top:'0px',
                        left:'0px'
                    },100);
                    $('#data-tab-statarr-sjp2').hide();
                }
            }else{
                $(this).addClass('active');
                if($(this).hasClass('jlsjpjlshow')){
                    $('#data-tab-statarr-sjp3').show();
                    $('#data-tab-statarr-sjp3').animate({
                        top:'225px',
                        left:'513px'
                    },100);
                }else{
                    $('#data-tab-statarr-sjp2').show();
                    $('#data-tab-statarr-sjp2').animate({
                        top:'225px',
                        left:'250px'
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
                    var lastweizhiA = $("#data-tab-statarr tr:last .stat_arr_zx120 ")[0].firstChild.data;
                    var lastweizhi=la2ln(lastweizhiA);
                    var lastobj = '#data-tab-statarr tr:last';
                    var nowclassname = '.yuceone';
                    attrsjpinfomakes(lastweizhi,num,nowclassname,lastobj);
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
                    attrsjpinfomakes(lastweizhi,num,nowclassname,lastobj);
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
                    attrsjpinfomakes(lastweizhi,num,nowclassname,lastobj);
                }else{
                    nshob = [2,4,7,9];
                    alert('不允许输入两个！');
                }
            }
        });
    })
})

/*120/60/24/12等数据筛选*/
$(document).ready(function(){
    var zx120 = [];
    $('.zx120yssj').each(function(){
        $(this).on('click',function(){
            //console.log($(this).parent().parent().attr('class'));
            if($(this).parent().parent().attr('class') == 'u2'){
                var type = 0;
            }else{
                var type = 1;
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
            var type = 0;
        }else{
            var type = 1;
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
                zx120 = [0,1,2,3,4];
            }else{
                zx120 = [0,1,2,3,4,5];
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