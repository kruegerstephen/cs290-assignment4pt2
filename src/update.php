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
    
 
    
    if($status === "TRUE"){
    $sql = <<<SQL
        UPDATE realMovie
        SET checkedStatus = "FALSE"
        WHERE name = '$name'
SQL;
}else{
     $sql = <<<SQL
        UPDATE realMovie
        SET checkedStatus = "TRUE"
        WHERE name = '$name'
SQL;
}

if ($db->query($sql) === TRUE) {
    echo "Movie has been checked in/out successfully";
} 

?>
<html>
    <a href = "\home.php">Go Home</a>
</html>