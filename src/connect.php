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
    echo "Connected successfully (".$db->host_info.")";
    
    $sql = "CREATE DATABASE myDB";
    if ($db->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $db->error;
}


// sql to create table
$sql = "CREATE TABLE realMovie (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    Name VARCHAR(30) NOT NULL,
    Category VARCHAR(30) NOT NULL,
    Length VARCHAR(50) NOT NULL,
    CheckedStatus VARCHAR(20) NOT NULL
)";

if ($db->query($sql) === TRUE) {
    echo "Table Movie created successfully";
} else {
    echo "Error creating table: " . $db->error;
}


?>