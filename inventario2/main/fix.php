<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }
    if($_POST['name'] != null && $_POST['value'] != null && $_POST['precio'] != null){
        $sql = "UPDATE product SET proname = '" . trim($_POST['name']) . "' ,amount = '" . trim($_POST['value']) . "',precio = '" . trim($_POST['precio']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('Proceso completado exitósamente')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
        else{
            echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>
