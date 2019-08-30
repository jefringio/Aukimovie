<?php
include "config.php";
    if($_SERVER["REQUEST_METHOD"] =='GET'){
        $sql = "SELECT * FROM list";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Movie Name: " . $row["moviename"]. " Actorname:  " . $row["actorname"]."Year:  " . $row["movieyear"]. " Genre:  " . $row["genre"]. "Rating:  " . $row["rating"].  "<br>";
            }

        }
    }
    // else if($_SERVER["REQUEST_METHOD"] =='POST'){
    //     if($_REQUEST['req']=='a'){
    //         echo "hiii";
    //     }
    //     $name= $_POST['name'];
    //     echo '<br><h3>'.$name.'</h3>';
    // }
?>