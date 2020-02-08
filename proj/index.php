<?php
session_start();
session_regenerate_id();

if(isset($_SESSION['aid']) || isset($_SESSION['tid'])) {
	session_unset();
	session_destroy();
	header("Location: ./index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index1.style.css?v=<?php echo time();?>" >
    <link rel="stylesheet" href="style/eye.css?v=<?php echo time();?>">
	<!-- jQuery -->
	<script src="../nocdn/jq.min.js"></script>

	<title>Log In</title>
</head>
<body>
	
<!-- navbar -->
<div 
	    class="navbar" 
	    style="
		    height: 100px;
		    width: 110%;
		    background: #04359C;
		    transform: rotate(-1.5deg);
		    position: fixed;
		    top:-20px;
		    left: -10px; 
			z-index: 999;
			transition: all 0.5s;
			transition-timing-function: ease-in-out;
			box-shadow: 0px 0px 20px #04359C;
			"
		>  
			<?php
		    	if (isset($_GET['err']) &&  $_GET['err'] == "invalidLogin") {
		    		$msg = "Invalid Login Credentials";
		    	} else {
		    		$msg="";
		    	}
		    ?>


			<div class="msg"><?php echo $msg; ?></div>
		 
    </div>

    <!-- Login as admin -->
    <div class="login onLoad">

	    <div class="loginas">	
	    	<b>Login</b> as <b><span class="spanDesig"><button class="desig">--</button> </b> </span>
			<div class="options">
				<div class="admin val"><button class="opt" value="an Admin">Admin</button></div>
				<div class="teacher val"><button class="opt" value="a Teacher">Teacher</button></div>
			</div> 
		</div>	
		<br>
		<br>
			
    	<form action="back/login.back.php" name="lgnForm" method="POST" >
			<input type="text" name="desig" id="desig" hidden>
			<!-- <div class="err">sjdf</div> -->
			<!-- Email -->
    		<input type="text" name="user" id="user" placeholder="  E-mail" required><span id="mail-suf">@mitaoe.ac.in</span>
			<br>
    		<label for="user" id="userLbl">E-mail</label>
			<br>

    		<input type="password" name="pass" id="pass" placeholder="  Password" required>
    		<img class="eye eyeOpen" src="eye-solid.svg" alt="">
    		<img class="eye eyeClose" src="eye-slash-solid.svg" alt="">

    		<br>
    	

    		<label for="pass" id="passLbl">Password</label>
    	
			<br>

    		<input type="submit" name="submit" value="Log In" id="loginbtn">


    	</form>
    </div>
<!-- header -->
	 <?php
        include "navnheader/header.php";  
	?>
	
    <script src="onload.js"></script>
    
	<script>
        shuterClose();
        $(document).ready(function() {
            shuterOpen("stay");
        })
    </script>

	<script src="funcnval.js"></script>
	<script src="script/eye.js"></script>

 
</body>
</html>
























