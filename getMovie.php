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
                        echo '<tr>';
                        echo    "<td> <img src=\"". $row["thumbnail"]. "\" width=\"30px\" height=\"50px\"></img> </td>";
                        echo    '<td> '.$row["moviename"].'  </td>';
                        echo    '<td class="'.$id.'" > '.$row["movieyear"].'  </td>';
                        echo    '<td class="'.$id.'" > '.$row["actorname"].'  </td>';
                        echo    '<td class="'.$id.'" > '.$row["genre"].'  </td>';
                        echo    '<td class="'.$id.'" > '.$row["rating"].'  </td>';
                        echo    '<td > 
                                    <button type="button" id ="editbtn" onclick= "editrecord('.$id.') "> Edit</button>
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