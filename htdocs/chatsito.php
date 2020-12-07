<?php 
include("connection.php");

if(isset($_POST['op'])){

	$cn = OpenCon();


	if($_POST['op'] == "escribir"){

		$msg = $_POST['mensaje'];
		$user = $_POST['usuario'];
		$friend = $_POST['amigo'];

		$q="CALL NUEVO_MENSAJE('$friend', '$user', '$msg');";
		$result = $cn->query($q);

		if(!$result){
			echo $cn->error;
		}

		$cn->close();

	}
	elseif ($_POST['op']== "leer"){
		$user = $_POST['usuario'];
		$friend = $_POST['amigo'];
		$chat = array();

		$q="CALL VER_MENSAJES('$user', '$friend');";

		$result = $cn->query($q);

		if($result){
			while($row =$result->fetch_assoc()){
				$chat[]=array('com'=>$row);
			}
			$result->close();

			 echo json_encode($chat);
			$cn->close();
		}
		else{
			echo "null";
			$cn->close();
		}
	}
}


?>