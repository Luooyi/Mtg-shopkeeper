<?php include "main_headers.php";?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<?php include "main_navs.php";?>
</div>
<style>


.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>


<div class ="row" style ="  padding: 0 40px;">
<div class ="col-sm-3" >
<div class="container">
    
    <h3 style ="font-size: 1.5rem; margin: 2%"> My Friends</h2>


  <ul class="list-group">


    <?php
      if(isset($_GET['id']))
      {
        $ID = $_GET['id'];
        $cnn = OpenCon();
        $q = "CALL VER_AMIGOS('$ID')";
        $result = $cnn->query($q);
        if($result){
          while($row=$result->fetch_array())
          {

     ?> 
    <li class="list-group-item"><a href="#" onclick="verMensajes(<?php echo $row['id_amigo']; ?>,<?php echo $_SESSION['id_usuario']; ?>);"><span><img src="verimagen.php?id=<?php echo $row['id_amigo']; ?>&tipo=1"  style="width: 30px; height: 30px; border-radius: 50%; float: left;" alt=""><?php echo $row['nombre_usuario'] ?> </a></span></li>


    <?php 
          }
        }
      }
    ?>
  </ul>

</div>


</div>
<div class ="col-sm-9">
  <h3 style ="font-size: 209%; margin: 1.7%">Messages</h3>
  <hr class ="new1"> </hr>







<div id="contenedor" onload="scrollDown();" class="overflow-auto" style="max-height: 300px;">
   
</div>




<form method="POST">
  <input type="hidden" name="sender" id="envia" value="">
<input type="hidden" name="sended" id="recibe" value="">
<textarea id="subject" name="subject" maxlength="100" placeholder="Write something.." style="width:100%" required></textarea>
<div>
<button type="button" class="mybutton" onclick="enviarMensajes();" style ="float: right">Send </button>
</div>
</form>
</div>





</div>




</body>

<script>
  $(document).ready(function(){

  });

  function enviarMensajes(){
     var envia = parseInt($("#envia").val());
     var recibe = parseInt($("#recibe").val());
     var mensaje = $("#subject").val();

      var datos = {
        'op': "escribir",
        'usuario': envia,
        'amigo': recibe,
        'mensaje' :mensaje
      };

      $.ajax({
        url: 'chatsito.php',
        type: 'POST',
        data: datos,
        beforesend: function(){
           
        },
        success: function(res){
          console.log(res);
          $("#subject").val("");
            verMensajes(recibe, envia);
          
         
        }
      });
  }


function refreshMensajes(){

   var envia = parseInt($("#envia").val());
     var recibe = parseInt($("#recibe").val());
     verMensajes(recibe, envia);

}

  function scrollDown(){



        var objDiv = document.getElementById("contenedor");
        objDiv.scrollTop = objDiv.scrollHeight;
    
  }


  function verMensajes(amix, id){

      document.getElementById("contenedor").innerHTML = "";
      var usuario = parseInt(id);
      var amigo = parseInt(amix);

      $("#envia").val(usuario);
      $("#recibe").val(amigo);

      var datos = {
        'op': "leer",
        'usuario': usuario,
        'amigo': amigo
      };

      $.ajax({
        url: 'chatsito.php',
        type: 'POST',
        data: datos,
        beforesend: function(){

        },
        success: function(res){
          
          
           var content = JSON.parse(res);
           console.log(content);
           if(content.length > 0 ){
           var rayita="";

           for(var i=0; i<content.length; i++){
              if(content[i].com.id_usuario == usuario){
                  rayita+= '<div class="container darker"><img src="verimagen.php?id='+ content[i].com.id_usuario +'&tipo=1" alt="Avatar" class="right" style="width:30px;height:30px;"><p>' + content[i].com.CHAT + '</p><span class="time-left">'+content[i].com.fecha +'</span></div>';
              }
              else{
                  rayita+= '<div class="container"><img  src="verimagen.php?id='+ content[i].com.id_usuario +'&tipo=1"  alt="Avatar" style="width:30px;height:30px;"><p>' + content[i].com.CHAT + '</p><span class="time-right">'+content[i].com.fecha +'</span></div>';
              }
           }

            document.getElementById("contenedor").innerHTML = rayita;

          }
          else
          {
            console.log(res);
            document.getElementById("contenedor").innerHTML = "Sin Mensajes"
          }

        }
      });


  }

</script>

</html>