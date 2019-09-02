<?php
                    include_once "config.php";
    if($_SERVER["REQUEST_METHOD"]== "GET"){
                $sql = "SELECT * FROM list";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo '<table class="table">
                    <thead>
                        <tr>
                            <th> Thumbnail</th>
                            <th> Movie name </th>
                            <th> Year </th>
                            <th> Actor</th>
                            <th> Genre</th>
                            <th> Rating</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>';

                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        echo '<tr id="main">';
                        echo    "<td> <img src=\"". $row["thumbnail"]. "\" width=\"30px\" height=\"50px\"></img> </td>";
                        echo    '<td> '.$row["moviename"].'  </td>';
                        echo    '<td class="'.$id.'" id="year" > '.$row["movieyear"].'  </td>';
                        // echo    '<td class="'.$id.'" id="actorname" > '.$row["actorname"].'  </td>';
                        echo    '<td class="'.$id.'" id="actorname" >';
                        
                        $sql1 = "SELECT actorname FROM actortable WHERE mid= '$id'";

                        if ($result1 = $conn->query($sql1)) {
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_array()) {
                                    echo $row1['actorname'];
                                    echo "<br>";
                                }

                                // Free result set
                                // $result1->free();
                            }
                        }
                        echo "</span>";

                        //echo "<input type='number' value='$year' min='1600' max='2019' class='editorbox' id='$yearedit'>";

                        // echo "<select name='actor[]' class='editorbox' id='$actoredit' multiple required>";

                        while ($rows = $result1->fetch_assoc()) {

                            $actor = $rows['actorname'];
                            echo "<option value='$actor'>$actor</option>";
                        }



                        echo "</select>";

                        echo "</td>";
                                        

                        // echo    '<td class="'.$id.'" id="genrename" > '.$row["genre"].'  </td>';
                        echo    '<td class="'.$id.'" id="genrename" >';
                        $sql2 = "SELECT genrename FROM genretable WHERE mid= '$id'";

                        if ($result2 = $conn->query($sql2)) {
                            if ($result2->num_rows > 0) {
                                while ($row1 = $result1->fetch_array()) {
                                    echo $row1['genrename'];
                                    echo "<br>";
                                }

                                // Free result set
                                // $result2->free();
                            }
                        }
                        

                        //echo "<input type='number' value='$year' min='1600' max='2019' class='editorbox' id='$yearedit'>";

                        // echo "<select name='actor[]' class='editorbox' id='$actoredit' multiple required>";

                        while ($rows = $result2->fetch_assoc()) {

                            $actor = $rows['genrename'];
                            echo "<option value='$actor'>$actor</option>";
                        }



                        echo "</select>";

                        echo "</td>";

                        echo    '<td class="'.$id.'" id="rating" > '.$row["rating"].'  </td>';
                        echo    '<td > 
                                    <button type="button" id ="editbtn" onclick= "editrecord('.$id.',this) "> submit</button>
                                    <button type="button" id ="editbtn" onclick="ready('.$id.')"> Edit</button>
                                    <button type="button" onclick ="deleteRecord(' .$id. ') "> Delete</button>';
                        echo    '</td>';
                        echo '</tr>'; 
                    }
                }
                else {
                    echo "0 results";
                    }
                $conn->close();
            echo '   </tbody>
            </table>';
    }
?>