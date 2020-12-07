<?php
session_start();
include 'connection.php';
$conn = OpenCon();

function logOut(){
	if(isset($_SESSION["id_usuario"])){
		session_destroy();
		header("Refresh:0 url=index.php");
	}
}

 if (isset($_GET['salir'])) {
    logOut();
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>	
		<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/myjavascript.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link href="css/mystyles.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/raiting.css">
	<link rel="stylesheet" type="text/css" href="css/uikit.css">
</head>