<?php
       $servername = "oniddb.cws.oregonstate.edu";
    $username = "kruegest-db";
    $password = "FjPg4gghz9FXQqS7";
    $database = "kruegest-db";
    $dbport = 3306;


    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 


    
$name = ($_GET["name"]);
$category = ($_GET["category"]);
$length = ($_GET["length"]);

if($name == null){
    echo "Please return and enter name";
}else{
    if(!is_Numeric($length)){
        echo "Please return and enter a number for length";
    }else{
        $sql = "INSERT INTO realMovie (Name, Category, Length, CheckedStatus)
            VALUES ('$name', '$category', '$length', 'Available' )";

            if ($db->query($sql) === TRUE) {
                echo "Movie has been inserted";
            } 
                }
}

?>

<html>
    <a href = "\home.php">Go Home</a>
</html>