$(document).ready(function() {

	if($(document).width() < 420) {
		console.log("asd");
		$(".li").text("");

	}

	function succed(msg) {
		$(".shadow").css("display", "block");
		$(".message").hide();
		$(".outer").addClass("outer-animate");
	
		setTimeout(() => {
			$(".outer").add(".li-msg").add(".shadow").add(".progbar").add(".back").remove();
			shuterClose("showmsg");
			$(".msg").show();
			$(".up").css("margin-left", "-30%");
			$(".down").css("margin-right", "-30%");
			$(".endbtn").css({"display" : "block"});
			$(".msg").css({"position" : "relative", "top" : $(document).height()/2-240, "fontSize" : "36px", "transform" : "rotate(0deg)"});
			$(".msg").html(msg);

			// window.location.href = "http://hd.is-great.org/admin/index.php";
			// window.location.href = "http://localhost/proj/admin/index.php";

		}, 2000) 
	}

	function beforeSnd(msg) {
		$(".back").hide();
				$(".confirm").hide();
				$(".progbar").hide();
			
				$(".shadow").css("display", "block");
				$(".message").hide();
				$(".outer").addClass("outer-animate");
				
			
				$(".msg").html(msg)
	}


	


	$(document).on("click", ".sndMail", function() {
		// console.log(selection)
		$.ajax({
			method: "POST",
			// url: "http://hd.is-great.org/admin/back/admin.back.php",
			url: "http://localhost/proj/admin/back/admin.back.php",
			data: {
				selection: selection
			}, 

			beforeSend: function() {
				beforeSnd("Sending Mail...");
			},

			success: function(msg) {
				succed(msg);
			}
		});



	})

	// archive data

	$(document).on("click", ".archive", function() {
		$.ajax({
			method: "POST",
			url: "http://localhost/proj/admin/back/archive.php",
			data: {
				selection: selection
			},
			beforeSend: function() {
				beforeSnd("Saving Data...");
			},

			success: function(msg) {
				succed(msg);
			}
		});
	})

	$(document).on("click", ".cancel", function() {
		window.location.href = "http://localhost/proj/admin/index.php";
	})


});


















