<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add movies</h1>
    <form action="server.php" method="POST">
        <p>movie image url</p>
        <input type="text"  name="imageurl">
        <br>
        <p>movie name</p>
        <input type="text" name="name" REQUIRED>
        <br>
        <p>year</p>
        <input type="number"  min="1900" max="2019" name="year" REQUIRED>
        <br>
        <p>actor name</p>
        <?php include "config.php"; 
            $sql = "SELECT actorname FROM actortable";
            $result = $conn->query($sql);
            ?>
            <select name="actorname[]" multiple required>
            <?php
            while ($rows = $result->fetch_assoc()) {
                $actor = $rows['actorname'];
                echo "<option value='$actor'>$actor</option>";
            }
            ?>
            </select>
        <br>
        <p>genre</p>
        <?php include "config.php"; 
            $sql = "SELECT genrename FROM genretable";
            $result = $conn->query($sql);
            ?>
            <select name="genre[]" multiple required>
            <?php
            while ($rows = $result->fetch_assoc()) {
                $genre = $rows['genrename'];
                echo "<option value='$genre'>$genre</option>";
            }
            ?>
            </select>
        <br>
        <p>rating</p>
        <input type="number" min="0" max="10" name="rating" REQUIRED>
        <br>
        <br>
        <input type="submit" value="submit">
    </form>
    <br>
    <br>
    <br>
    <a href="movie.php">go back to movies</a>

</body>
</html>