$(function() {
	$(".purchaseRangeClicker").click(function() {
		var $this = $(this);
		var target = $this.data("target");
		
		$(".purchaseRangeClicker").removeClass("active");
		$(this).addClass("active");
		
		$(".purchasesContainer").hide();
		$("#purchases" + target + "Container").show();
	});
});