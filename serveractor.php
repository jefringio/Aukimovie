<?php

include "config.php";
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $name=$_POST["f"];
    if($_REQUEST['req']=='gen'){
        $sql = "INSERT INTO genretable (genrename)
        VALUES ('$name')";
                
    }
    else{
        $sql = "INSERT INTO actortable (actorname)
        VALUES ('$name')";
    }
    $conn->query($sql);
   
    $conn->close();
    header('Location: movie.php');
}
?>
