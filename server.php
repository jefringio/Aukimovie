<?php

include_once "config.php";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
              
            $id= $_POST["id"];
            // echo $name;
            
            // $genre=$_POST["genre"];
            $rating=$_POST["rating"];
            // $actor=$_POST["actorname"];
            $year=$_POST["year"];
            if($_REQUEST['req']=='edit'){
                $sql = "UPDATE list SET movieyear ='$year', rating='$rating'
                        WHERE id= '$id'";
                $conn->query($sql);
                foreach ($_POST['genre'] as $selectedgenre) {
    
                    $sql1 = "UPDATE genretable SET mid='$id', genrename='$selectedgenre' WHERE id= '$id'";
                    if($conn->query($sql1) === true){
                        echo "Records inserted successfully.";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $conn->error;
                    }
                }
                foreach ($_POST['actorname'] as $selectedactor) {
    
                    $sql2 = "UPDATE actortable SET mid='$id', actorname='$selectedactor' WHERE id= '$id'";
                    if($conn->query($sql2) === true){
                        echo "Records inserted successfully.";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $conn->error;
                    }
                }
                    
            }
            else{  
                $name=$_POST["name"];
                $img=$_POST["imageurl"];   
                $sql = "INSERT INTO list (thumbnail, moviename, movieyear, rating)
                    VALUES ('$img','$name', '$year', $rating)";

                foreach ($_POST['actorname'] as $selectedactor) {
                    
                    $sql1 = "INSERT INTO actortable (mid, actorname)
                    VALUES ('$id','$selectedactor')";
                    if($conn->query($sql2) === true){
                        echo "Records inserted successfully.";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $conn->error;
                    }
                }
                foreach ($_POST['genre'] as $selectedgenre) {
                    
                    $sql2 = "INSERT INTO genretable (mid, genrename)
                    VALUES ('$id','$selectedgenre')";
                    if($conn->query($sql2) === true){
                        echo "Records inserted successfully.";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $conn->error;
                    }
                }
            // $conn->query($sql);
            }
            // $conn->query($sql);
            $conn->close();
            header('Location: movie.php');
        }
else{
    echo "request not found <br>";
    $conn->close();
    echo"<a href=\"addmovies.php\">go to add movies</a>";
}



$conn->close();
?>



