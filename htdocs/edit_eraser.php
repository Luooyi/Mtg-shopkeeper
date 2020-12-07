<?php include "main_headers.php";?>
<body>
<script>
   $(document).ready(function(){
      
  });

</script>

<?php include "main_navs.php";?>
</div>






<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

.checked {
  color: orange;
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>



</br></br>

<?php 

  if(isset($_GET['id']) && isset($_SESSION['id_usuario'])){
    $buscar = $_GET['id'];
    
    $com = "SELECT id_borrador, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM BORRADOR
WHERE id_borrador =" . $buscar ;

    $cnn = OpenCon();
    $res = $cnn->query($com);
    if($res){
     $row = $res->fetch_array();



?>
<h3 style ="padding: 20px; text-align: center;"> -Eraser- <?php echo  $row['nombre_articulo']; ?> </h3>
</div>

<div class ="container">
<form  style ="text-align: center" method="POST" action="saveArticle.php">
<div style ="text-align: left">
    <label for="fname" >Title:</label>
    <input id=fname type="text" name="nombre" value="<?php echo  $row['nombre_articulo']; ?>" placeholder="" required>
    </div>
</br>

    </br>
    <div style ="text-align: left">
    <label >Media attached:</label>
    <img class="img-thumbnail" src ="<?php echo 'data:png;base64,'. base64_encode( $row['img1']) ?>" style ="width: 150px;height: 150px; float: right"></img>
    <img class="img-thumbnail" src ="<?php echo 'data:png;base64,'. base64_encode( $row['img2']) ?>" style ="width: 150px; height: 150px; float: right"></img>
    <img class="img-thumbnail" src ="<?php echo 'data:png;base64,'. base64_encode( $row['img3']) ?>" style ="width: 150px; height: 150px; float: right"></img>
    <video class="img-thumbnail" style ="width: 150px; height: 150px; float: right" src="<?php echo  $row['video']; ?>"    controls ></video>
    <input type="hidden" name="userId" value="<?php echo $_SESSION['id_usuario'];?>">
    </div>
    </br>
    </br>
    </br>
    </br>
    <input type="hidden" id="idBorrador" name="idBorrador" value="<?php echo  $row['id_borrador']; ?>">
    <div style ="text-align: left">
    <label for="subject">Description: </label>
</div>
    <textarea id="subject" name="subject" placeholder="" style="height:200px" required><?php echo  $row['descripcion']; ?></textarea>
    <div class = "row" style ="text-align: right">
    <div class ="col-sm" > 
    </div>
<?php 

$res->close();
}
$conn->close();

}
?>

</div>
     <input  type="submit" class="mybutton btn-info" value="Publish" name="submit">

    <input  type="submit" class="mybutton" value="Save" name="save">

    <input type="submit"  class="mybutton btn-danger" value="Delete" name="delete">

  </form>
</div>


<script>
 
  
</script>


</body>




</html>
















