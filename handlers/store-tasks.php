<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'todoapp');

if(!$conn) {

    echo mysqli_connect_error();

}

if($_SERVER['REQUEST_METHOD'] && isset($_POST['title'])) {


    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    if($title == '' || strlen($title) < 3) {

        $_SESSION['error'] = "data not valid";
        
        header('location: ../index.php');

        // die;

    } else {



        $sql = "INSERT INTO `tasks`(`title`) VALUES ('$title')";
    
        $result = mysqli_query($conn, $sql);
    
        echo mysqli_affected_rows($conn) == 1;
    
        if(mysqli_affected_rows($conn) == 1) {
    
            $_SESSION['success'] = "Data Inserted Successfully";

        }

        // redirection
        header('location: ../index.php');

    }

}