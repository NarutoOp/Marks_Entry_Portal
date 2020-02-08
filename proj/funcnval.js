$(document).ready(function() {
////////////////////////////////////////////////////////////////////////////////////////////////

// start

///////////////////////////////////////////Designation Button/////////////////////////////////////////////////////


			desig = "";
			$(".desig").click( function(e) {
				e.preventDefault();
				// $(this).hide();
				$(".options").slideToggle();
				$(".val button").click(function(e) {
					e.preventDefault();
					let temp = $(this).val();
					if (temp === "a Teacher" || temp ===  "an Admin") {
						$(".spanDesig").html(temp)
						$(".options").css("display", "none");
						$(".desigErr").html(" ");
						desig = $(this).val();
					} else {
						console.log("Please refresh the page");
					}
					
					})
				})
		// transfer to input
		$(".opt").click(function() {
			$("#desig").val($(this).val());
		})	
		
		

///////////////////////////////////////////////////End/////////////////////////////////////////////
///////////////////////////////////////////input-logic/////////////////////////////////////////////////////
	// sudo placeholder
		$("input").on({
			"focus":function() {
				placeholder = $(this).attr("placeholder");
				$(this).attr("placeholder", " ");
			},
			"focusout": function(){

				// placeholder and label logic
				if($(this).attr("name") == "pass") {
					$(this).attr("placeholder", "  Password");
				}
				else {
					$(this).attr("placeholder", "  E-mail");
				}
			}
		})
	
	// email width
		$("#user").on({
			focus : function() {
				$(this).css("width", "40%");
			}
		});

		
		// Error handling - empty fields

		$("#loginbtn").click(function(e) {
			let user = $("#user").val();
			let pass = $("#pass").val();
			let desig = $("#desig").val();
				if(desig !== "an Admin" && desig !== "a Teacher") {
					$(".msg").text("Fill All The Fields");
					e.preventDefault();
				} else if (user != user.match(/[a-z0-9A-Z]*/) || user === "") {
					$(".msg").text("Please Enter Valid E-mail");
					e.preventDefault();
				} else if(pass.length <= 4) {
					$(".msg").text("Password Enter Valid Password");
					e.preventDefault();
				} else {
					$(".msg").text("")
				}
		})

});