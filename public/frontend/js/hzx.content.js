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
            timerhzx(intDiff);
        }
    });
});
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
            hzxajax(20,xingweis);
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
                    hzxajax(20,xingweis);
                }else{
                    hzxajax(20,xingweis);
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
                    hzxajax(20,xingweis);
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
                hzxajax(20,'ALL');
            }else{
                $('.fx').removeClass('active');
                $('.fxa').removeClass('active');
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                $('tfoot .scycsjp').text('');
                $('.jnycd').remove();
                $('.hmsjp').removeClass('displaynone');
                var shuju = $(this).data('fx');
                hzxajax(20,shuju);
            }
        })
    })
})


//预测区清楚
$(document).ready(function(){
    $('.ycqcg').on('click',function(){
        var spans = $('.yuce td').find('span');
        spans.each(function(){
            if($(this).hasClass('yctexth')){
                $(this).removeClass('yctexth');
                $(this).text('');
            }
            if($(this).hasClass('yctextz')){
                $(this).removeClass('yctextz');
                $(this).text('');
            }
            if($(this).hasClass('yctextx')){
                $(this).removeClass('yctextx');
                $(this).text('');
            }
        });
    });
})

$(document).ready(function(){
    $('.ycqcgsas').on('click',function(){
        $('.qichusd').find('span').text('');
    })
})


/********************** 胆码/号码组页面显示/隐藏 **********************/
$(document).ready(function(){
    $('.annius').on('click',function(){
        if($('#cebiao').hasClass('active')){
            $('#cebiao').slideUp("fast");
            $('#cebiao').removeClass('active');
        }else{
            $('#cebiao').slideDown("fast");
            $('#cebiao').addClass('active');
        }

    });
})

/**********************横竖斜页面胆码/号码组**********************/

$(document).ready(function(){
    var type = $("input[name='numtype']:checked").val();
    var shownums = $("input[name='numcount']:checked").val();
    $('.numtype').on('click',function(){
        type = $("input[name='numtype']:checked").val();
        if(type == '2'){
            $('.mychonumsm').css('display','none');
            $('.numcount').css('display','block');
            $('.numcountra').on('click',function(){
                shownums = $("input[name='numcount']:checked").val();
            });
        }else{
            $('.numcount').css('display','none');
            $('.mychonumsm').css('display','block');
        }
    });
    var nums = [];
    $('.chosnum').each(function(){
        $(this).on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                nums.splice($.inArray($(this).data('num'),nums),1);
                dmfuzhi(nums);
            }else{
                if($(this).data('num') == ','){
                    if($('.chosnum').hasClass('active')){
                        nums.push($(this).data('num'));
                        $('.chosnum').removeClass('active');
                        if(nums.length != 0){
                            dmfuzhi(nums);
                        }
                    }
                }else{
                    nums.push($(this).data('num'));
                    $(this).addClass('active');
                    dmfuzhi(nums);
                }
            }
        });
    });
    $('#dxzxvb').on('click',function(){    //单选组选
        var lengs = 0;
        $('.fx').each(function(){
            if($(this).hasClass('active')){
                lengs += 1;
            }
        });
        $('.kx').each(function(){
            if($(this).hasClass('active')){
                lengs = 3;
            }
        });
        if($('#dmsave').hasClass('active')){
            var method = 1;
        }else if($('#dmqfan').hasClass('active')){
            var method = 2;
        }else{
            alert('请先点击保留按钮获取数据');
        }
        if(method ==1 || method == 2){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).text('转组选');
                if(type == '1'){
                    $.ajax({
                        type: "GET",
                        data: {type: type, value:nums, method:method, dadi:lengs,seachtype:1},
                        url: "/zst/danma/",
                        dataType: "json",
                        success: function(data){
                            if(data.data){
                                $('.dmfxjg').text(data.data);
                                $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                            }

                        }
                    })
                }else{
                    $.ajax({
                        type: "GET",
                        data: {type: type, value:nums, method:method, shownums:shownums, dadi:lengs, seachtype:1},
                        url: "/zst/danma/",
                        dataType: "json",
                        success: function(data){
                            if(data.data){
                                $('.dmfxjg').text(data.data);
                                $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                            }
                        }
                    })
                }
            }else{
                $(this).addClass('active');
                $(this).text('转单选');
                if(type == '1'){
                    $.ajax({
                        type: "GET",
                        data: {type: type, value:nums, method:method, dadi:lengs,seachtype:2},
                        url: "/zst/danma/",
                        dataType: "json",
                        success: function(data){
                            if(data.data){
                                $('.dmfxjg').text(data.data);
                                $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                            }

                        }
                    })
                }else{
                    $.ajax({
                        type: "GET",
                        data: {type: type, value:nums, method:method, shownums:shownums, dadi:lengs, seachtype:2},
                        url: "/zst/danma/",
                        dataType: "json",
                        success: function(data){
                            if(data.data){
                                $('.dmfxjg').text(data.data);
                                $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                            }
                        }
                    })
                }
            }

        }
    });
    $('#dmsave').on('click',function(){
        $(this).addClass('active');
        if($('#dmqfan').hasClass('active')){
            $('#dmqfan').removeClass('active');
        }
        var lengs = 0;
        $('.fx').each(function(){
            if($(this).hasClass('active')){
                lengs += 1;
            }
        });
        $('.kx').each(function(){
            if($(this).hasClass('active')){
                lengs = 3;
            }
        });
        //console.log(lengs);
        var mydmdata = $('#mychonum').text();
        if(mydmdata == ''){
            alert('您没有选取数据！');
        }else{
            if(type == '1'){
                $.ajax({
                    type: "GET",
                    data: {type: type, value:nums, method:1, dadi:lengs,seachtype:1},
                    url: "/zst/danma/",
                    dataType: "json",
                    success: function(data){
                        if(data.data){
                            $('.dmfxjg').text(data.data);
                            $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                        }

                    }
                })
            }else{
                $.ajax({
                    type: "GET",
                    data: {type: type, value:nums, method:1, shownums:shownums, dadi:lengs, seachtype:1},
                    url: "/zst/danma/",
                    dataType: "json",
                    success: function(data){
                        if(data.data){
                            $('.dmfxjg').text(data.data);
                            $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                        }
                    }
                })
            }
        }
    });

    $('#dmqfan').on('click',function(){
        $(this).addClass('active');
        if($('#dmsave').hasClass('active')){
            $('#dmsave').removeClass('active');
        }
        var lengs = 0;
        $('.fx').each(function(){
            if($(this).hasClass('active')){
                lengs += 1;
            }
        });
        $('.kx').each(function(){
            if($(this).hasClass('active')){
                lengs = 3;
            }
        });
        var mydmdata = $('#mychonum').text();
        if(mydmdata == ''){
            alert('您没有选取数据！');
        }else{
            if(type == '1'){
                $.ajax({
                    type: "GET",
                    data: {type: type, value:nums, method:2,dadi:lengs},
                    url: "/zst/danma/",
                    dataType: "json",
                    success: function(data){
                        if(data.data){
                            $('.dmfxjg').text(data.data);
                            $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                        }

                    }
                })
            }else{
                $.ajax({
                    type: "GET",
                    data: {type: type, value:nums, method:2, shownums:shownums,dadi:lengs},
                    url: "/zst/danma/",
                    dataType: "json",
                    success: function(data){
                        if(data.data){
                            $('.dmfxjg').text(data.data);
                            $('#dmfxzs').text('此次筛选共有'+ data.count +'条数据！');
                        }
                    }
                })
            }
        }
    });

    function dmfuzhi(data){
        var numsstr = '';
        for(var i = 0; i<data.length; i++){
            numsstr += data[i];
        }
        $('#mychonum').text(numsstr);
    }

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

})

/***********分析万千百十个*************/
$(document).ready(function(){
    //访问页面就进行ajax请求
    if($('.fxa').hasClass('active')){
        var xingwei = $('.fxa').data('fx');
        $.ajax({
            type: "GET",
            data: {name: 'cqssc',qishu:20, wei:xingwei},
            url: "/zst/data/",
            dataType: "json",
            success: function(data){
                creathtml(data);
            }
        })
    }

    $('.fxa').on('click',function(){
        window.location.reload();
        $('.fx').removeClass('active');
        $(this).addClass('active');
        var xingwei = $('.fxa').data('fx');
        $.ajax({
            type: "GET",
            data: {name: 'cqssc',qishu:20, wei:xingwei},
            url: "/zst/data/",
            dataType: "json",
            success: function(data){
                creathtml(data);
            }
        })
    })
})