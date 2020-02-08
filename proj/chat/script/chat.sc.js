$(document).ready(() => {
	let chatisclose = true;
// open and close pannel
	$(".open-close").on("click", function() {
		if (chatisclose) {
			$(this).html("<");
			$(".chat").css("left", "0px");
			$(this).css("left", "350px");
			chatisclose=false;
		} else {
			$(this).html(">");
			$(".chat").css("left", "-350px");
			$(this).css("left", "0px");
			chatisclose=true;
		}
	});

// search input style 
	$(".search").focus(function () {
		$(".search-lbl").css({
			fontSize: "16px",
			top: "-61px",
			left: "-47px",
			padding: "0 5px"
		});
		$(this).css({border: "1px solid white"})
	})


// show faculty on keydown ////////////////////////////////////////////////////////////////////////////////////////////
	$(".search").on("keyup", function() {
			$.ajax({
				method: "POST",
				url: "http://localhost/proj/chat/back/chat.facultysearch.back.php",
				data: {
					faculty: $(".search").val()
				},

				beforeSend: function() {
					list=" ";
					$(".facs > li").remove();
				},

				success: function(msgs) {
					// $(".facs").html("<li></li>");

					msgs = JSON.parse(msgs);
					$.each(msgs, function(index, value) {
						list += "<li>"+value+"</li>";

					})
					$(".facs").html(list);
				}

			})
	})

	$(document).on('click', '.facs > li', function(){
		// console.log($(this).text())
		// userScrolls = false;

		$(".show-search").hide();
		$(".chat-main").show();
		$(".chat-main").css({ top : "0px"});
		$(".fac-name").text($(this).text());

		autoLoadChats($(".fac-name").text());

		repeat = setInterval(function() {
			autoLoadChats($(".fac-name").text());
		}, 2500)

	})

	$(".arrow").click(function() {
			$(".chat-main").css({ top : "400px"});
			$(".show-search").show();
			clearInterval(repeat);

	})

// send message with ajax

	$(".send-msg").on("submit", function(event) {
		// userScrolls = false;
		console.log( $(".msg-input").val())
		if( $(".msg-input").val() != "") {
		console.log( $(".msg-input").val())
			
			$.ajax({
				method: "POST",
				url: "http://localhost/proj/chat/back/chat.main.back.php",
				data: {
					to: $(".fac-name").text(),
					chat: $(".msg-input").val()
				},

				success: function() {
					autoLoadChats($(".fac-name").text());

				}

			})
		}

		event.preventDefault();
		$(".msg-input").val("");
	})

});
















