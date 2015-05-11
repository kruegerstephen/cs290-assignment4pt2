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
    
    $Category = ($_GET["Category"]);
    echo $Category;


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
    </html>

<?php


          $sql = <<<SQL
    SELECT *
    FROM `realMovie`
SQL;

if($res = $db->query($sql)){
    if ($res->num_rows > 0) {
        // output data of each row
        while($row = $res->fetch_assoc()) {
            if($Category!==null && $Category === $row["Category"]){
                echo "from da bottom";
                echo $Category;
                echo "".$row["Category"];
                    echo "<form action = update.php method = 'GET'>";
                    echo "<ul>";
                    echo "<li>". "Name: " . $row["Name"]. "<br>Category: " . $row["Category"]. "<br>Length: " . $row["Length"] . "<br>Available: ";
                    if($row["CheckedStatus"] === 'TRUE'){
                        echo "". 'Checked IN'. "</div>" . "<br>";
                    }else{
                        echo "". 'Checked OUT'."</div>" . "<br>";
                    }
                    echo "</ul>";
                    $checkedStatus = $row["CheckedStatus"];
                    $name = $row['Name'];
                    echo "<input type = 'hidden' name='checkedStatus' value = '$checkedStatus'>";
                    echo "<input type = 'hidden' name='name' value = '$name'>";
                    echo "<input type = 'submit' value = 'Check in/out'>";
                    echo "</form>";
                    echo "<form action = delete.php method = 'GET'>";
                    echo "<input type = 'hidden' name='name' value = '$name'>";
                    echo "<input type = 'submit' value = 'delete'>";
                    echo "</form>";
            }else{
                if($Category == "all" || $Category == ""){
                    echo "<form action = update.php method = 'GET'>";
                    echo "<ul>";
                    echo "<li>". "Name: " . $row["Name"]. "<br>Category: " . $row["Category"]. "<br>Length: " . $row["Length"] . "<br>Available: " . $row["CheckedStatus"]. "</div>" . "<br>";
                    echo "</ul>";
                    $checkedStatus = $row["CheckedStatus"];
                    $name = $row['Name'];
                    echo "<input type = 'hidden' name='checkedStatus' value = '$checkedStatus'>";
                    echo "<input type = 'hidden' name='name' value = '$name'>";
                    echo "<input type = 'submit' value = 'Check in/out'>";
                    echo "</form>";
                    echo "<form action = delete.php method = 'GET'>";
                    echo "<input type = 'hidden' name='name' value = '$name'>";
                    echo "<input type = 'submit' value = 'delete'>";
                    echo "</form>";
                }
            }
            
        }
    } else {
        echo "No results";
    }
}



 $category = <<<SQL
        SELECT Category
        FROM realMovie
SQL;
echo "<form action = home.php method = 'GET'>";
    echo "<select name = 'Category'>";
if($rest = $db->query($category)){
    if ($rest->num_rows > 0) {
        while($row = $rest->fetch_assoc()) {
        $option = $row["Category"];
        echo "<option value=$option>$option</option>";
    }
    echo "<option value = 'all'>All</option>";
    echo "</select>";
    echo "<input type = 'submit' value = 'update'>";
}else{
    echo "No results";
}
}

echo "</form>";

    ?>
    


