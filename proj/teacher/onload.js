
function shuterClose(type) {

	if (type == "showmsg") {
		var height = $(document).height()/2 - 50;
	} else {
		var height = $(document).height()/2 + 24;
	}
			// console.log(height);
	$(".onLoad").css({display: "none"});
	$(".navbar").css({height: height});
	$(".header").css({height: height});
	$(".msg").css("display", "none");
	return true;
}

function shuterOpen(type) {
		height = 100;


	setTimeout(function(){


		$(".navbar").css({height: height});
		if(type == "hide") {
			$(".header").css({height: 0});
		} else {
			$(".header").css({height: height});
		}
		
		$(".onLoad").css({display: "block"});
		$(".msg").css("display", "block");


	}, 600);

	return true;
		
}
