<?php 

define (DB_USER, "root");
define (DB_PASSWORD, "12345678");
define (DB_DATABASE, "jqueryautoload");
define (DB_HOST, "localhost");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error());

$sql = "SELECT * FROM users 
		WHERE email LIKE '%".$_GET['q']."%'
		LIMIT 10"; 
$result = mysqli_query($mysqli,$sql) ;

$json = [];
while($row = mysqli_fetch_array($result)){
     $json[] = ['id'=>$row['id'], 'text'=>$row['email']];
}

echo json_encode($json);
?>