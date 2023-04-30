<?php

$conn = mysqli_connect('localhost', 'root', '');


if(!$conn) {

    echo "error " . mysqli_connect_error($conn);

}

// Create DAtabase
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";
// $sql = "DROP DATABASE todoapp";

$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);

mysqli_close($conn);

//////////////////////////////////////////

$conn = mysqli_connect('localhost', 'root', '', 'todoapp');

if(!$conn) {

    echo mysqli_connect_error($conn);

}

$sql = "CREATE TABLE IF NOT EXISTS tasks (

    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL

)";

$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);

mysqli_close($conn);







