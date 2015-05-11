<?php
    $servername = "oniddb.cws.oregonstate.edu";
    $username = "kruegest-db";
    $password = "FjPg4gghz9FXQqS7";
    $database = "kruegest-db";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 

?>

<htm>
    <head>
        
    </head>
    <body>
        <form action="insert.php" method="GET">
        Movie Name: <input type="text" name="name"/>
        Category: <input type="text" name="category"/>
        Length: <input type="text" name="length"/>
        <input type="submit" value="submit"/>
        </form>
        
        <form action = "delete.php">
            Delete All Records<input type = "submit" value="submit"/>
        </form>
    </body>
    
    Current DB: <br>
    </htm>

<?php
          $sql = <<<SQL
    SELECT *
    FROM `realMovie`
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}else{
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<form action = update.php method = 'GET'>";
            echo "<ul>";
            echo "<li>". "Name: " . $row["Name"]. "<br>Category: " . $row["Category"]. "<br>Length: " . $row["Length"] . "<br>Available: " . $row["CheckedStatus"]. "</div>" . "<br>";
            echo "</ul>";
            $checkedStatus = $row["CheckedStatus"];
            $name = $row['Name'];
            echo "<input type = 'hidden' name='checkedStatus' value = '$checkedStatus'>";
            echo "<input type = 'hidden' name='name' value = '$name'>";
            echo "<input type = 'submit' value = $checkedStatus>";
            echo "</form>";
            echo "<form action = delete.php method = 'GET'>";
            echo "<input type = 'hidden' name='name' value = '$name'>";
            echo "<input type = 'submit' value = 'delete'>";
            echo "</form>";
        }
    } else {
        echo "0 results";
    }
}

    ?>
    


