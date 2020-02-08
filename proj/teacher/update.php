<?php 

$conn = mysqli_connect( 'localhost','root',"",'mitaoe' );

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE register SET ".$field."='".$value."' WHERE id=".$editid;
mysqli_query($conn,$query);

echo 1;