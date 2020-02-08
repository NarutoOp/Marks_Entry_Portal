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
</head>
<body>

<h1 class="text-center text-uppercase display-4 font-weight-bold" style="background-color: #74B3CE; color: white; font-family: 'Cormorant Unicase', serif;"> College Portal </h1>
<div class="container">
  
  <h2 style="background-color: #1e3928 ; color: white; font-size: 38px; font-family: 'Anton', sans-serif;" class="text-uppercase text-center"></h2>

  <div >
    <h2 style="color: #062f4f; font-family: 'Cormorant Unicase', serif;" class="font-weight-bold mb-4"> All Records </h2>
    <div id="records_content">  </div>
  </div>
  





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <script type="text/javascript">

  $(document).ready(function () {
    readRecords(); 
  });
  


  //////////////////Display Records
  function readRecords( ){
    
    var readrecords = "readrecords";
    $.ajax({
      url:"action.php",
      type:"POST",
      data:{readrecords:readrecords},
      success:function(data,status){
        $('#records_content').html(data);
      },

    });
  }



</script>

<form>
<input class=sndMail type="button" value=" Logout " onclick="window.location.href='http://localhost/proj'" />
</form>



</body>
</html>