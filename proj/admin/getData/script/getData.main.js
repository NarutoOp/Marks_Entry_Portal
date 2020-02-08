$(document).ready(function() {

		tabelNo=1;
		selection = ["0"];
		count=0;
		totalTables = 8;

		let request = function(opts) {
		 	return new Promise((resolve, reject) => {
		 		inPromise(resolve, reject);
		 	});
		}
		
		function inPromise(resolve, reject) {
			$.ajax({
				method: "POST",
				// url: "http://hd.is-great.org/admin/getData/back/getData.back.php",
				url: "http://localhost/proj/admin/getData/back/getData.back.php",
				data: {
					tabel: tabelNo,
					selection: selection
				}, 

				beforeSend: function() {
					$(".opts").hide();
					$(".hr").hide();
					$(".back").hide();

					$(".loading").css("display", "block");
				},

				success: function(msg) {
					$(".opts").show();
					$(".hr").show();
					$(".back").show();

					$(".loading").css("display", "none");


					var msg = JSON.parse(msg);
					var output = "";
					$.each(msg["data"], function(index, value) {
						output += "<div class='opts'>"+value+"</div>"+"<hr class='hr'>";
					});
					if(tabelNo == 1) {
						$(".back").css("visibility", "hidden")
					} else if(tabelNo != 1) {
						$(".back").css("visibility", "visible")
					}
					$(".msg").html(msg["heading"]);
					// after end logic
					if ( tabelNo > totalTables) {
						$(".change-me").html('<div class="message">  <button class="confirm cancel">Cancel</button><button class="confirm sndMail">Confirm</button> <button class="confirm archive">Archive</button></div>')
						$(".outer").css({top: "58%",overflow: "hidden" });
					}  else {
						$(".change-me").html(output);
						$(".main-content").css({marginTop: "0px", marginBottom: "0px"});
						$(".outer").css("top", "40%");
					}
					resolve("successed");
				}
			}).fail(function(errText) {
				console.log(errText);
				reject("error");
			})  
		}

			// first exec
		request($(".opts")).then(()=>{
			// tabelNo++;
		});
		$(document).on("click", ".opts", function() {
				tabelNo++;
				selection[count] = $(this).text();
				$(".li"+(count+1)).attr("value", selection[count]);

				request($(this)).then(()=> {
					$(".li"+(count+1)).addClass("active");
					count++;
			});
			
		});

		$(".back").on("click", function() {
			tabelNo--;
			request($(".opts")).then(function(para) {
				$(".li"+(count)).removeClass("active");
				count--;
			});
		});

		$(document).on("mouseenter",".active", function() {
			$(".li-msg").text($(this).attr("value"));
		});

		

});


















