$(function(){
	$("#titre").on("click", function(){
		$(this).next('div').toggleClass('ailleurs');
		$("#fleche").toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
	})
})