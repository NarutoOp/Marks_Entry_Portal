$(document).ready(() => {

///////////////////////////////////[save - edit -  show button logic]/////////////////////////////////////////////

	$(".save").click(() => {
		alert("The Data Is Been Saved");
			$(".save").hide();
			$(".edit").show();
			$(".edit").attr("id", "active");
	})
	$(document).on("click", ".btn", () => {
		if($(".save").css("display") != "none") {
			$(".save").hide();
			$(".edit").show();

		}

	})


	
})