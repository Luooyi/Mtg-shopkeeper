<?php

if(isset($_POST['opcion'])){
	if($_POST['opcion'] == "mostrar"){
		include("connection.php");
		$conn = OpenCon();

		$coments = array();

		$id = $_POST['idArt'];
		$cmd = "CALL MOSTRAR_COMENTARIO('$id');";
		$result = $conn->query($cmd);
		if($result){
			
			while($row = $result->fetch_assoc()){
				$coments[]=array('com'=>$row);
				
			}	
			$result->close();

			 echo json_encode($coments);
        	$conn->close();	
		}
		
		
		else{
				echo "null";
				$conn->close();	

		}
	}
	elseif ($_POST['opcion'] == "comentar") {
		include("connection.php");
		$conn = OpenCon();

		$articulo = $_POST['id_articulo'];
		$usuario = $_POST['usuario'];
		$comentario = $_POST['comentario'];
		$estrellas = $_POST['estrellas'];
		if($estrellas == NULL){
			$estrellas = 0;
		}

		$cmd="CALL COMENTARIO('$articulo','$usuario','$comentario', '$estrellas');";
		if($conn->query($cmd)){
			echo 'ok';
			$conn->close();

		}
		else{
			echo 'no';
			$conn->close();
		}
	}

}

?>