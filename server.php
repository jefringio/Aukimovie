<?php

include_once "config.php";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
            $name=$_POST["name"];   
            // echo $name;
            $img=$_POST["imageurl"];
            $genre=$_POST["genre"];
            $rating=$_POST["rating"];
            $actor=$_POST["actorname"];
            $year=$_POST["year"];
            $sql = "INSERT INTO list (thumbnail, moviename, movieyear, actorname, genre, rating)
                    VALUES ('$img','$name', '$year','$actor','$genre', $rating)";
            // $conn->query($sql);
            $conn->query($sql);
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



