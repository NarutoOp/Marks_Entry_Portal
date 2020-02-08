$(document).ready(() => {
	$(".eyeClose").click(function() {
		$(this).hide();
		$(".eyeOpen").show();
		$("#pass").attr("type", "text");
	})

	$(".eyeOpen").click(function() {
		$(this).hide();
		$(".eyeClose").show();
		$("#pass").attr("type", "password");

	})
})