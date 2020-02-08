$(document).ready(function() {
	$(document).on("mousemove", ".active", function(e) {
		$(".li-msg").css({display: "inline-block", left: e.pageX+10, top: e.pageY-60});
	});

	$(document).on("mouseleave", ".active", function() {
		$(".li-msg").css({display: "none"})

	})
})