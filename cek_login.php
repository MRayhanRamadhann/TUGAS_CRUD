<?php
    session_start();

    include "database.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE username = '$username'";
    $q = $koneksi-> query($sql);

    if($q->num_rows > 0){
        $_SESSION['username'] = $username;
        header("location:hasil_login.php");
    } else {
        header("location:index.php");
    }
?>