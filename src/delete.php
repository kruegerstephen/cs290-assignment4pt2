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


    $name = ($_GET["name"]);
    
    if($name !==null){
            $sql = "DELETE FROM realMovie WHERE name = '$name'";
    }else{
        $sql = "DELETE FROM realMovie";
    }
    
    if ($db->query($sql) === TRUE) {
        echo "Table Deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }



?>

<html>
   <br> <a href = "\home.php">Go Home</a>
</html>