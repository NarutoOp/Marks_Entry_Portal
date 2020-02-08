<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">
  <link rel="stylesheet" href="style/admin.style.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="style/admin.progbar.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="style/admin.endbtn.css?v=<?= time(); ?>">
  
</head>
<body>
   
  <div 
      class="navbar" 
      style="
        height: 0px;width: 0%;
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
        <a href="index.php">
        <div class="back_page">
          <img src="icons/back_page.svg" alt="">
        </div>
      </a>

        <div class="msg"></div>
      </div>

    

<h1 class="text-center text-uppercase display-4 font-weight-bold" style="background-color: #74B3CE; color: white; font-family: 'Cormorant Unicase', serif;"> College Portal </h1>
<div class="container">
  

  <div >
    <h2 style="color: #062f4f; font-family: 'Cormorant Unicase', serif;" class="font-weight-bold mb-4"> All Records </h2>
    <div id="records_content">  </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <?php
        // include './../../chat/chat.php';
        include $_SERVER['DOCUMENT_ROOT'].'/proj/chat/chat.php';
       ?>

  <script type="text/javascript">

  $(document).ready(function () {
    readRecords(); 
  });
  

  //////////////////Display Records
  function readRecords( ){
    
    var readrecords = "readrecords";
    $.ajax({
      url:"backend.php",
      type:"POST",
      data:{readrecords:readrecords},
      success:function(data,status){
        $('#records_content').html(data);
      },

    });
  }





</script>



</body>
</html>