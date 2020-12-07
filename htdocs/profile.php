<?php include "main_headers.php";?>
<body>
<?php include "main_navs.php";?>
</div>


	<?php 		
$ID = $_GET['IDUser'];
$amig = $_SESSION['id_usuario'];
$fnd = FALSE;

mysqli_next_result($conn);
$query = "CALL SON_AMIGOS('$amig','$ID');";
$resulte = $conn->query($query);

if($resulte){

	$friend = $resulte->fetch_array();

if($friend['amigor'] > 0){
	$fnd=TRUE;
}

}
else{
	echo $conn->error;
}


	
					mysqli_next_result($conn);
					$query1 = "CALL DETALLES_USUARIO('$ID');";
    				$result1 = $conn->query($query1);
					while ($row = $result1->fetch_array()) {
					  ?>

<body>
	<div class="container">
		<div class="my-3 row">
			
			<div class="col-sm-4">
				<div class="card">
					<div class="card-body">
						<div id="imagen" style="text-align: center;">
							<img src="verimagen.php?id=<?php echo $_GET['IDUser'] ?>&tipo=1" class="img-thumbnail" alt="profile" style="border-radius: 50%; width:200px; height: 200px;"><br>
							<?php if(isset($_SESSION['id_usuario'])) { 
										if($_SESSION['id_usuario'] != $ID ){ 
											if($fnd == FALSE){
										?>
										<button type="button" id="btnAgregar" class="mybutton" onclick="AddFriend();"> Add Friend </button>
							<?php
											}
											else{

											?>
												<button type="button" id="btnEliminar" class="mybutton" onclick="DeleteFriend();"> Delete Friend </button>
							 

							<?php
						}
						 } 
						}
						?>	
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-8" >
				<div class="card">
					<div class="card-body">
				<div class="row md-2">
					<h3><b><?php echo $row['nombre_usuario'];?></b></h3>
				</div>
				<div class="row md-2">
					<h3><b><?php echo $row['nombre'] .' ' .$row['apellidos'] ;?></b></h3>
				</div>
				<div class="row md-2">
					<h3><b><?php echo $row['correo'];?></b></h3>
					<input type="hidden" name="idUs" id=idActual value=<?php echo $row['id_usuario']; ?>>
				</div>
				<div class="row my-3"></div>
					
	<?php } ?>	

	<input type="hidden" name="idSess" id=idSesion value=<?php echo $_SESSION['id_usuario']; ?>>
				<div class="row ">
					<div class="col-sm-12">
						<?php if(isset($_SESSION['id_usuario'])) { 
								if($_SESSION['id_usuario'] == $ID){ ?>		
						<button type="button" class="mybutton float-right" onclick="Erasers();"> My Erasers </button>
						<button type="button" class="mybutton float-right" onclick="nuevoArticulo();"> New Article</button>
						<button type="button" class="mybutton float-right" onclick="Messages();"> Messages </button>
						<button type="button" class="mybutton float-right" onclick="EditData();"> Edit My Profile</button>
							<?php } }?>	
					</div>
				</div>
			</div>
		</div>
			</div>
				
		</div>

	
	<div class="row my-5">
		<div class="col-sm-12">
  			<h3 class="h3-mtg">Friends List</h2>
  				<div class="row" id="friendsList">
  		
  	<?php
  		if(isset($ID))
  		{
  			$cnn = OpenCon();
  			$q = "CALL VER_AMIGOS('$ID')";
  			$result = $cnn->query($q);
  			if($result){
  				while($row=$result->fetch_array())
  				{

  	 ?>			
  					<div class="col-sm-3">

  						<div class="card md-1">
  							
	  						<div class="card-body" style="vertical-align: center;">
	  							<a href="profile.php?IDUser=<?php echo $row['id_amigo'];?>">
	  							<img src="verimagen.php?id=<?php echo $row['id_amigo']; ?>&tipo=1" class="float-sm-left" style="width: 40px; height: 40px; border-radius: 50%;" alt="">
	  							<span style="font-size: 0.9rem; font-weight: bold" class="float-sm-right"> <?php echo $row['nombre_usuario'] ?></span>
	  							</a> 
	  						</div>
	  						
	  					</div>
  					</div>

  					
  	<?php
  				}
  			}

  } 
  ?>			

  				</div>
		</div>

		
	</div>


	</div>	


</div>
</body>

<script>
$(document).ready({

});	

function EditData(){
	location.href="account.php?self";
}


function nuevoArticulo(){
	location.href="new_article.php";
}

function Erasers(){
	var id = $("#idActual").val();
	var hrf = "my_erasers.php?id=" + id;
	console.log(hrf);
	window.location.href=hrf;
}

function Messages(){
	var id = $("#idActual").val();
	var hrf = "friends.php?id=" + id;
	console.log(hrf);
	window.location.href=hrf;
}

function AddFriend(){
	var usuario = $("#idSesion").val();
	var amigo = $("#idActual").val();

	var datos={
		"opcion": "agregar",
		"idAmigo": amigo,
		"id_usuario": usuario
	};

	console.log(datos);

	$.ajax({
		url: 'solicitudAmistad.php',
		type: 'POST',
		data: datos,
		beforesend: function(){

		},
		success: function(res){
			if(res == 'ok'){
				alert('Ahora eres amigo de este usuario!');
				location.reload();
			}
			else if(res=='no'){
				alert('No se proceso la informacion :c. Intenta más tarde.');
			}
			else{
				alert(res);
			}
		}
	});
}

function DeleteFriend(){
	var usuario = $("#idSesion").val();
	var amigo = $("#idActual").val();

	var datos={
		"opcion": "eliminar",
		"idAmigo": amigo,
		"id_usuario": usuario
	};

	var respuesta = confirm('¿Estás seguro que quieres eliminar a esta persona de tu lista de amigos?');

	if(respuesta){
		console.log(datos);

		$.ajax({
		url: 'solicitudAmistad.php',
		type: 'POST',
		data: datos,
		beforesend: function(){

		},
		success: function(res){
			if(res == 'deleted'){
				alert('Ya no son amigos :C!');
				location.reload();
			}
			else if(res=='fail'){
				alert('No se proceso la informacion :c. Intenta más tarde.');
			}
			else{
				alert(res);
			}
		}
	});
	}
	
}


</script>


</html>