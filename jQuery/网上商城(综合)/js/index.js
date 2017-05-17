$(function(){
	//大广告自动轮播
	var time;
	var idx;
	function run(){
		time = setInterval(function(){
			idx = $("#bner-box .scroll-img-box img.selected").index();
			idx = (idx+1)%5;
			$("#bner-box .scroll-img-box img").eq(idx).stop(true,true).fadeIn().siblings().fadeOut();
			$("#bner-box .scroll-img-box img").eq(idx).addClass("selected")
				.siblings().removeClass("selected");
			$("#bner-box .bner-name li").eq(idx).addClass("selected")
				.siblings().removeClass("selected");
			$("#bner-box .bner-name li span").removeClass("selected");	
			$("#bner-box .bner-name li").eq(idx).find("span").addClass("selected");
		},2000);
	}
	run();
	$("#bner-box .bner-name li").on("mousemove",function(){
		clearInterval(time);
		idx = $(this).index();
		$(this).addClass("selected").siblings().removeClass("selected");
		$("#bner-box .scroll-img-box img").eq(idx).stop(true,true).fadeIn().siblings().fadeOut();
		$("#bner-box .scroll-img-box img").eq(idx).addClass("selected")
				.siblings().removeClass("selected");
		$("#bner-box .bner-name li span").removeClass("selected");	
		$("#bner-box .bner-name li").eq(idx).find("span").addClass("selected");
		run();
	})
	//商品轮播
	$("#brand-box .brand-top ul li").on("click",function(){
		idx = $(this).index();
		$(this).children().addClass("selected");
		$(this).siblings().children().removeClass("selected");
		$("#brand-box .brand-scroll ul").animate({left:-idx*782},1000);
	});
	//图片旋转
})