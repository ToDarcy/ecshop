function bannerSwiper() {
    var e = new Swiper("#banner-container", {
        autoplay: 5e3,
        speed: 1e3,
        loop: !0,
        preloadImages: !1,
        pagination: "#banner-pagination",
        paginationClickable: !0,
        wrapperClass: "banner-wrapper",
        slideClass: "banner-slide",
        slideActiveClass: "banner-active",
        slideVisibleClass: "banner-visible",
        autoplayDisableOnInteraction: !1,
        onImagesReady: function() {
            $("#banner-control").show()
        }
    });
    $("#banner-prev").click(function() {
        e.swipePrev()
    }), $("#banner-next").click(function() {
        e.swipeNext()
    })
}

 $(function() {
    setInterval(e, 1e3),
    function() {
        var e = $("#hot-articles-tab");
        e.find("li").on("click", function() {
            $(this).addClass("current").siblings().removeClass("current"), $("#hot-articles-content").find("ul").eq($(this).index()).show().siblings().hide()
        }), e.find("li:first").click()
    }(), $(".chosen-aside").find("li").hover(function() {
        $(this).addClass("current").siblings().removeClass("current")
    })
}), addLoadEvent(bannerSwiper);