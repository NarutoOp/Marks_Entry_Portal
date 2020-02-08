
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Document</title>

	<link rel="stylesheet" href="http://localhost/proj/chat/style/chat.style.css">


</head>
<body>
	
	<div class="chat">
		<div class="show-search">
			<div class="search-fac">
				<input type="text" name="search" class="search" id="search">
				<br>
				<label for="search" class="search-lbl" id="search-lbl">Search Faculty by Email</label>
			</div>
			<br><br><br>
			<div class="result">
				<ul class="facs">
				</ul>
			</div>
		</div>

		<div class="chat-main">
			
			<div class="heading">
				<span class="arrow">X</span> <span class="fac-name"></span>
			</div>
			<hr class="hd">
			<div class="chat-box">
			</div>
			<hr>
			<div class="send">
				<span class="chat-msg">
					<form class="send-msg">
						<input type="text" class="msg-input" id="input-msg" name="inputMsg" placeholder="Enter Message Here...">
					</form>
				</span>
			</div>
		</div>
	</div>

	<div class="open-close">></div>

	<script src="http://localhost/proj/chat/script/chat.sc.js"></script>
	<script src="http://localhost/proj/chat/script/chat.auto_reload.js"></script>

	
</body>
</html>