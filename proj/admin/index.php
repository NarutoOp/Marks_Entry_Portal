<?php

session_start();
session_regenerate_id();
if (isset($_SESSION['aid'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>

	<link rel="stylesheet" href="style/admin.style.css?v=<?= time(); ?>">
	<link rel="stylesheet" href="style/admin.progbar.css?v=<?= time(); ?>">
	<link rel="stylesheet" href="style/admin.endbtn.css?v=<?= time(); ?>">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> -->
	<script src="../../nocdn/jq.min.js"></script>

</head>
<body>

	   <div 
	    class="navbar" 
	    style="
		    height: 100px;width: 110%;
		    background: #04359C;
		    transform: rotate(-1.5deg);
		    position: fixed;
		    top:-20px;
		    left: -10px; 
			z-index: 999;
			transition: all 0.3s;
			transition-timing-function: ease-in-out;
			box-shadow: 0px 0px 20px #04359C
		    ">  
		    <a href="BigPicture/index.php">
				<div class="back_page">
					<img src="icons/back_page.svg" alt="">
				</div>
			</a>

				<div class="msg"></div>
    </div>


	<div class="onLoad">
			<div class="li-msg"></div>
			<div class="progbar">
				<ul class="ul">
					<li class="li1 li">Program</li>
					<li class="li2 li">Department</li>
					<li class="li3 li">Exam</li>
					<li class="li4 li">Subject<br>Id</li>
					<li class="li5 li">Block<br>Id</li>
					<li class="li6 li">role</li>
					<li class="li7 li">exam<br>type</li>
					<li class="li8 li">Faculty</li>

				</ul>
			</div>
			

			<div class="outer">
				<div class="main-content change-me" id="change-me" style="overflow: scroll;"> 
					<div class="loading">
					</div>
				</div>
			</div>
			<div class="shadow" style="display: none"></div>

				<div class="back"></div>
		<!-- chat -->
			<?php
				// include './../../chat/chat.php';
				include $_SERVER['DOCUMENT_ROOT'].'/proj/chat/chat.php';
			 ?>
	</div>
			
		<div class="endbtn">
			<ul>
				<li> <button class="endbtn1">Home Page</button></li>
				<li><button class="endbtn2">Main Page</button></li>
			</ul>
		</div>

	<?php 
		include "./../navnheader/header.php";
	?>	

	<script src="./../onload.js"></script>
	

	<script>

		shuterClose();
		$(document).ready(function() {
			shuterOpen("hide");

			$(".progbar").css({top: $(document).height()/4 - 40});

		})
	</script>

	<script src="./script/admin.script.js"></script>
	<script src="./script/admin.progbar.msg.js"></script>
	<script src="./getData/script/getData.main.js"></script>
	<script src="./script/admin.endbtn.js"></script>
		
</body>
</html>
<?php
}else {
	echo '<h1 style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);text-transform: capitalize;font-size: 30px">You are not logged in !!!<br>Please click <a href="./../index.php" style="text-decoration: none;color: blue">here</a> to Login</h1>';
 }
?>

























