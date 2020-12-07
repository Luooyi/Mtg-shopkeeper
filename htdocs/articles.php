<?php include "main_headers.php";?>
<body>
<?php include "main_navs.php";?>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


<?php 
$nombre = NULL;
$desc = NULL;
$video = NULL;
$img01 = NULL;
$img02 = NULL;
$img03 = NULL;
$by = NULL;
$idby=NULL;

  $cnn = OpenCon();
  if(isset($_GET['articulo'])){
    $q = "SELECT articulo.id_usuario, nombre_usuario, nombre_articulo, descripcion, video, img1, img2, img3 FROM articulo JOIN usuario ON articulo.id_usuario = usuario.id_usuario WHERE id_articulo=".$_GET['articulo'];
    $art = $cnn->query($q);

    if($art){
      while($datos = $art->fetch_array()){
        $nombre = $datos['nombre_articulo'];
        $desc = $datos['descripcion'];
        $video = $datos['video'];
        $img01 = $datos['img1'];
        $img02 = $datos['img2'];
        $img03 = $datos['img3'];
        $by = $datos['nombre_usuario'];
        $idby = $datos['id_usuario'];
      }
      $art->close();
    }
$cnn->close();
}
?>


</div>
</br></br>
  <h3 style = "text-align: center"><?php echo $nombre; ?></h3>
</div>

<div class ="container">
   
</br>
    <div style = "text-align: center" ><?php echo $desc; ?></div><br>
    <div style = "text-align: right; font-size: 0.7rem;" >Posted by: <b style = " font-size: 1.0rem;"><a href="profile.php?IDUser=<?php echo $idby; ?>"> <?php echo $by; ?> </a></b></div>
    </br>
 
   


    <div style ="text-align: center" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img width="720" height="480" class="d-block w-100" src="<?php echo 'data:png;base64,'. base64_encode($img01) ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img width="720" height="480" class="d-block w-100" src="<?php echo 'data:png;base64,'. base64_encode($img02) ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img width="720" height="480" class="d-block w-100" src="<?php echo 'data:png;base64,'. base64_encode($img03) ?>" alt="Third slide">
    </div>
    <div class="carousel-item">
    
      <video  width="720" height="480" src="<?php echo $video; ?>" autobuffer autoloop loop controls  ></video>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    <br>

    <div style ="text-align: left">
    <label for="subject">Comentarios</label>
</div>
<div class="row" id="comentariosArticulo">

 <input type="hidden" name="idArticle" value="<?php if(isset($_GET['articulo'])){echo $_GET['articulo'];}?>" id=artId>

</div>
<?php 
if(isset($_SESSION['open'])){
?>

<form  style ="text-align: center">
    <input type="hidden" name="idUser" value="<?php if(isset($_SESSION['id_usuario'])){echo $_SESSION['id_usuario'];}?>" id=idUser>

    <textarea id="textoComentario" name="subject" placeholder="" style="height:200px" required></textarea>
    <div class = "row" style ="text-align: right">
    <div class ="col-sm" > 
    </div>
    <div class ="col-sm">
     

        <fieldset class="rating float-right">
            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
          
            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
          
            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
            
            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
           
            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            
         </fieldset>

      
    </div>
    </div>
      <button type="button" class="mybutton" onclick="Comentar();">Submit Comment</button>

  </form>
<?php 
}
?>

</div>
</body>


<script>
  
$(document).ready(function(){
  mostrarComentarios();
});

function mostrarComentarios(){
 var idArt = parseInt($("#artId").val());

 var datos = {
  "opcion": "mostrar",
  "idArt": idArt
 };

 $.ajax({
      url: 'comentarios.php',
      type: 'POST',
      data: datos,
      beforesend: function(){

      },
      success: function(res){
          if(res!="null" ){
           var content = JSON.parse(res);
                console.log(content);
                var print = "";
                for(var i=0; i<content.length; i++){

                 print+= '<div class="col-sm-12 my-1"><div class="card"><div class="card-header" style="font-size: 0.7rem;"><span><img src="verimagen.php?id='+content[i].com.id_usuario + '&tipo=1" class="img-rounded" style="width:25px; height:25px;"></span><span class="mx-2">' + content[i].com.nombre_usuario + '</span> <span class="mx-3 rating-stars float-right"><ul class="rating-stars"><li style="width:'+ content[i].com.valoracion * 20 +'%" class="stars-active"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></li></span> <span class="float-right">' + content[i].com.fecha + '</span></div><div style="font-size: 0.7rem;" class="card-body">' + content[i].com.opinion+'</div></div></div>';
                }

                $("#comentariosArticulo").append(print);

          }
          else{
             //console.log(res);
              $("#comentariosArticulo").append('<div class="col-sm-12"><div class="card"><h4>No hay comentarios.</h4></div></div>');
          }
      }
 });

}



function Comentar(){
  var articulo = $("#artId").val();
  var id_usuario = $("#idUser").val();
  var comentario = $("#textoComentario").val();
  var valoracion = parseFloat($("input[name=rating]:checked").val());

  var datos = {
    "opcion": "comentar",
    "id_articulo" : articulo,
    "usuario": id_usuario,
    "comentario": comentario,
    "estrellas": valoracion
  };

  $.ajax({
      url: "comentarios.php",
      type: "POST",
      data: datos,
      beforesend: function(){

      },
      success: function(resp){
          if(resp == 'ok'){
            location.reload();
          }
      }
  });

}


</script>


</html>