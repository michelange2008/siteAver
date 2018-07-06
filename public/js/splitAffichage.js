$(function(){
	$("#titre").on("click", function(){
		$(this).next('div').toggleClass('ailleurs');
		$(this).children().toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
	})
})