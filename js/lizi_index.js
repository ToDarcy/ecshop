$(function(){
	/*首页幻灯片效果 start*/
$(".fullSlide").hover(function(){
    $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
},
function(){
    $(this).find(".prev,.next").fadeOut()
});
$(".fullSlide").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    effect: "fold",
    autoPlay: true,
    autoPage: true,
    trigger: "click",
    startFun: function(i) {
        var curLi = jQuery(".fullSlide .bd li").eq(i);
        if ( !! curLi.attr("src")) {
            curLi.css("background-image", curLi.attr("src")).removeAttr("src")
        }
    }
});
	/*首页幻灯片效果 end*/
	
	/*首页幻灯片效果 start*/
	$(".buy60s_main").slide({mainCell:"#buy60s_silde",nextCell:".buy60s_next",prevCell:".buy60s_prve",autoPage:true,effect:"left",vis:1,easing:"easeOutCirc"});
	/*首页幻灯片效果 end*/
	
	/*倒计时广告位鼠标移入效果 start*/
	$("#brand_temai li").on("mouseenter",function(){
		$(this).animate(1000,function(){
			$(this).addClass("ishover");
		})
	}).on("mouseleave",function(){
		$(this).animate(1000,function(){
			$(this).removeClass("ishover");
		})
	})
	/*倒计时广告位鼠标移入效果 end*/
			// 大图右侧banner鼠标移上左移动
		$('.top3-wrap a').hover(
			function() {
				$(this).animate({
					left: '-5px'
				}, 300);
			},
			function() {
				$(this).animate({
					left: '0'
				}, 300);
			}
		);

	// 漫画选花放大
		$('.comic-choose img').hover(
			function() {
				$(this).animate({
					width: '270px',
					height: '216px',
					margin: '-10px 0 0 -8px'
				}, 100);
			},
			function() {
				$(this).animate({
					width: '250px',
					height: '200px',
					margin: '0'
				}, 100);
			}
		);
	// 漫画选花放大

	/*今日推荐商品鼠标移入效果 start*/
	$("#temai_list li").on("mouseenter",function(){
		$(this).animate(1000,function(){
			$(this).addClass("hover");
		})
	}).on("mouseleave",function(){
		$(this).animate(1000,function(){
			$(this).removeClass("hover");
		})
	})
	/*今日推荐商品鼠标移入效果 end*/
	
	/*首页倒计时广告 start*/
	setInterval(function(){
      $(".timer").each(function(){
        var obj = $(this);
        var endTime = new Date(parseInt(obj.attr('value')) * 1000);
		var show_day =  obj.attr('showday');
        var nowTime = new Date();
        var nMS=endTime.getTime() - nowTime.getTime() + 28800000;
        var myD=Math.floor(nMS/(1000 * 60 * 60 * 24));
		var myH_show=Math.floor(nMS/(1000*60*60) % 24);
        var myH=Math.floor(nMS/(1000*60*60));
        var myM=Math.floor(nMS/(1000*60)) % 60;
        var myS=Math.floor(nMS/1000) % 60;
        var myMS=Math.floor(nMS/100) % 10;
		var a = myH+myM+myS+myMS;
        if(a>0){
			if(show_day == 'show')
			{
				var str = '剩余'+myD+'天'+myH_show+'时'+myM+'分'+myS+'秒';
			}
			else
			{
				var str = '剩余'+myH+'时'+myM+'分'+myS+'秒';
			}
        }else{
			var str = "已结束！";	
		}
		obj.html(str);
      });
    }, 100);
	/*首页倒计时广告 end*/	
})