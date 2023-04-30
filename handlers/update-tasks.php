<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'todoapp');

if(!$conn) {

    echo mysqli_connect_error();

}

if($_SERVER['REQUEST_METHOD'] && isset($_POST['title'])) {

    $id = $_GET['id'];

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    if($title == '' || strlen($title) < 3) {

        $_SESSION['error'] = "data not valid";
        
    }

        $sql = "SELECT * FROM `tasks` WHERE `id` = '$id' ";

        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_row($result);

        if(!$row) {

            $_SESSION['error'] = "data not found!";
        
        } else {

            $sql = "UPDATE `tasks` SET `title` = '$title' WHERE `id` = '$id'";
        
            $result = mysqli_query($conn, $sql);

            if($result){
                    
                $_SESSION['success'] = "Data Updated Successfully";
                    
            }
        
    }
    // redirection
    header('location: ../index.php');
}