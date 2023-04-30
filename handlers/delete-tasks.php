<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'todoapp');

if(!$conn) {

    echo mysqli_connect_error($conn);

}

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM `tasks` WHERE `id` = '$id' ";

    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_row($result);

    if(!$row) {

        $_SESSION['error'] = "data not found!";
        
    } else {

        $sql = "DELETE FROM `tasks` WHERE `id` = '$id' ";

        $result = mysqli_query($conn, $sql);

        if($result) {

            $_SESSION['success'] = "data deleted successfully!";
            
        }

    }
    
    header('location: ../index.php');

}