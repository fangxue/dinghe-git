//初始化
;(function($) {
    $(function() {
		if( !!window.ActiveXObject && !window.XMLHttpRequest){
			  return;
		}
        $backToTopEle = $('.backToTop').click(function() {
            $("html,body").animate({
                    scrollTop: 0
                },
                300);
        }).hide();
       
        $(window).bind("scroll resize",
            function() {
                var st = $(document).scrollTop(),
                    winh = $(window).height();
                (st > 0) ? $backToTopEle.show() : $backToTopEle.hide();
                var wid = $(this).width();
                var backW = $('.backToTop').width();
                if (wid < 980) {
                    $('.backToTop').css("right", 0)
                } else {
                    $('.backToTop').css("right", (wid - 980) / 2 - backW - 10)
                }
            });
    })
})(jQuery);