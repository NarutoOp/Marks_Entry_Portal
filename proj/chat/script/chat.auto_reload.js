function autoLoadChats(toFac) {
		// oldLen;
		// console.log("a")

		$.ajax({
			method: "POST",
			url: "http://localhost/proj/chat/back/show.chat.php",
			data: {
				to: toFac
			},

			beforeSend: function() {

				$(".chat-box").html("");

			},

			success: function (msg) {
				let msgs1 = JSON.parse(msg);
				console.log(msgs1.length);


				console.log("\\main ->> "+msgs1.length);
				console.log("\\prev ->> "+prevMsg);

					$.each(msgs1, function(index, value) {
						// console.log(value.sender)
						
						if(value.sender == toFac){
							$(".chat-box").append("<div id='other' >"+value.msg+"<span class='sentat'>"+value.sentat+"</span></div><br>")
							$(".chat-box").scrollTop($(".chat-box").prop("scrollHeight"));
						} else {
							$(".chat-box").append("<div id='me' >"+value.msg+"<span class='sentat'>"+value.sentat+"</span></div><br>")
							$(".chat-box").scrollTop($(".chat-box").prop("scrollHeight"));

						}
					})

				



				// if(!userScrolls) {
				// 	$(".chat-box").scrollTop($(".chat-box").prop("scrollHeight"));
				// }
			}

		})
}