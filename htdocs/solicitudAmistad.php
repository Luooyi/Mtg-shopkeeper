<?php

include("connection.php");

$respuesta= NULL;
if(isset($_POST['opcion'])){
	$con = OpenCon();

	if($_POST['opcion'] == "agregar"){
		$idAmigo = $_POST['idAmigo'];
		$idUsuario = $_POST['id_usuario'];

		$add = "CALL AGREGAR_AMIGO('$idUsuario','$idAmigo');";

		if($res = $con->query($add)){
			while($row=$res->fetch_array()){
				$respuesta=$row['response'];
			}

			$con->close();

			echo $respuesta;
		}
		else{
			echo "fail";
		}

		
	}
	elseif($_POST['opcion'] == "eliminar"){
		$idAmigo = $_POST['idAmigo'];
		$idUsuario = $_POST['id_usuario'];

		$add = "CALL ELIMINAR_AMIGO('$idUsuario','$idAmigo');";

		if($res = $con->query($add)){
			$con->close();

			echo "deleted";
		}
		else{
			echo "fail";
		}

	}
}

?>