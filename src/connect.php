<?php
        $servername = "oniddb.cws.oregonstate.edu";
    $username = "kruegest-db";
    $password = "FjPg4gghz9FXQqS7";
    $database = "kruegest-db";
    $dbport = 3306;


    $db = new mysqli($servername, $username, $password, $database, $dbport);

    $sql = "CREATE DATABASE myDB";
    if ($db->query($sql) === TRUE){ 
        echo "Database created successfully";
    }
    


// sql to create table
$sql = "CREATE TABLE realMovie (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    Name VARCHAR(255) NOT NULL,
    Category VARCHAR(255) NOT NULL,
    Length INTEGER(50) NOT NULL,
    CheckedStatus BOOLEAN TRUE
)";

if ($db->query($sql) === TRUE) {
    echo "Table Movie created successfully";
} 

?>