$(function(){
	// 换肤
	$("#skin-btns span").on("click",function(){
		$(this).addClass("selected")
			.siblings().removeClass("selected");
		var indx = $(this).index();
		switch(indx){
			case 0:
				 $("#nav").css("background","#4a4a4a");
				 $("#side-bar h2").css("background","#6e6e6e");
				 break;
			case 1:
				 $("#nav").css("background","#b1d410");
				 $("#side-bar h2").css("background","#cde074");
				 break;
			case 2:
				 $("#nav").css("background","#f9af2a");
				 $("#side-bar h2").css("background","#ffcf78");
				 break;
			case 3:
				 $("#nav").css("background","#37c7d4");
				 $("#side-bar h2").css("background","#98e0e6");
				 break;
			case 4:
				 $("#nav").css("background","#e44072");
				 $("#side-bar h2").css("background","#f692b2");
				 break;
			case 5:
				 $("#nav").css("background","#8e46d8");
				 $("#side-bar h2").css("background","#d49ae1");
				 break;
		}
	})
	// 搜索框
	$("#hearder input").focus(function(){
		if($(this).val() == this.defaultValue){
			this.value = "";
			$(this).css("color","#000");
		}
	}).blur(function(){
		if($(this).val() == ""){
			this.value = this.defaultValue;
			$(this).css("color","#999999");
		}
	})
})