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
    $status = ($_GET["checkedStatus"]);
    
 
    
    if($status === "Available"){
    $sql = <<<SQL
        UPDATE realMovie
        SET checkedStatus = "Not Available"
        WHERE name = '$name'
SQL;
}else{
     $sql = <<<SQL
        UPDATE realMovie
        SET checkedStatus = "Available"
        WHERE name = '$name'
SQL;
}

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

?>
<html>
    <a href = "\home.php">Go Home</a>
</html>