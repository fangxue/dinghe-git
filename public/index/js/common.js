// JavaScript Document
$(function() {
    $(".lang").hover(function() {
        $(this).find("ul").show();
    }, function() {
        $(this).find("ul").hide();
    });
    $(".shangb").hover(function() {
        $(this).stop().animate({
            bottom:0
        }, 300);
    }, function() {
        $(this).stop().animate({
            bottom:"-115px"
        }, 300);
    });
    //合作伙伴滚动
    $("#scroll").scrollView();
    $("#scroll1").scrollView({
        displayNum:7
    });
    $("#scroll2").scrollView({
        displayNum:3
    });
    $("#focus").autoslide({
        effect:"x"
    });
    $(".nav li a").click(function() {
        var linkid = $(this).attr("name");
        var scroll_offset = $("#" + linkid).offset();
        //得到pos这个div层的offset，包含两个值，top和left
        $("body,html").animate({
            scrollTop:scroll_offset.top
        }, 400);
    });
    //tab
    function tabs(tabTit, on, tabCon) {
        $(tabCon).each(function() {
            $(this).children().eq(0).show();
        });
        $(tabTit).each(function() {
            $(this).children().eq(0).addClass(on);
        });
        $(tabTit).children().click(function() {
            //鼠标“hover”的效果
            $(this).addClass(on).siblings().removeClass(on);
            var index = $(tabTit).children().index(this);
            $(tabCon).children().eq(index).show().siblings().hide();
        });
    }
    tabs(".case-nav", "active", ".case-tab");
    tabs(".contact-nav", "active", ".contact-tab");
	
	$(".product-nav li").hover(function() {
        $(this).find('.product-con').toggleClass('active').slideToggle();
    });
	$('.lianxi').click(function(){
		$('.contact-nav li').last().addClass('active').siblings().removeClass('active');
		$('.contact-con').last().show().siblings().hide();
		})
	
	//$(".product-nav li").hover(function() {
//        $(this).find('.product-con').stop().animate({
//            
//        }, 300);
//    }, function() {
//        $(this).stop().animate({
//            bottom:"-115px"
//        }, 300);
//    });
});