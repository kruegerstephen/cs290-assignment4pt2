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
$category = ($_GET["category"]);
$length = ($_GET["length"]);


$sql = "INSERT INTO realMovie (Name, Category, Length, CheckedStatus)
VALUES ('$name', '$category', '$length', 'Available' )";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

?>

<html>
    <a href = "\home.php">Go Home</a>
</html>