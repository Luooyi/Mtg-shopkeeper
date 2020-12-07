<?php
    function OpenCon()
     {
     $dbhost = "127.0.0.1";
     $dbuser = "root";
     $dbpass = "";
     $db = "MTG_Shopkeeper";
     $port=3306;
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db,$port);

     if($conn->connect_errno) {
            echo  "<script type=\"text/javascript\">alert(\"No se pudo establecer conexión con el servidor de chat. Error 4060 \");</script>";
    }
    else{
        return $conn;
    }

     
     }

    function CloseCon($conn)
     {
     $conn -> close();
     }

    

    ?>
