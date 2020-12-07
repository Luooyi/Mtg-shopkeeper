<?php
session_start();
if(isset($_POST['opcion'])){

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['correo'];
	$calleUno = $_POST['calleUno'];
	$calleDos = $_POST['calleDos'];
	$codigoPostal = $_POST['codigoPostal'];
	$ciudad = $_POST['ciudad'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];

	require("connection.php");

	$conn = OpenCon();

	$command = "CALL EDITAR_USUARIO(?,?,?,?,?,?,?,?,?,?);";
	$stmt = $conn->prepare($command);
	$stmt->bind_param("issssssssi", $id, $nombre, $apellido, $correo, $calleUno, $calleDos, $pais, $estado, $ciudad, $codigoPostal);
	if($stmt->execute()){
		echo "si";
	}
	else{
		echo "no";
	}



	


}


?>