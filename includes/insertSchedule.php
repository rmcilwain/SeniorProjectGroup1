<?php
/*session_start();*/

if(isset($_POST['addbtn'])) {
    /*require 'config.php';*/
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "gatotaca66";
$dbName     = "usersdb";

// Create database connection
$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$con) {
    die("Connection failed: " .mysqli_connect_error());
}

    $titleName = $_POST['title'];
    $startTime = $_POST['start'];
    $endTime = $_POST['end'];
    $email = $_SESSION['email-s'];

    $sql = "INSERT INTO schedules (startTime, endTime,title) VALUES($startTime, $endTime, $titleName)";
    /*$stmt = mysqli_stmt_init($con);*/
    if(mysqli_query($con, $sql)){
        echo "success";
    }else{
        echo "error";
    }
    mysqli_close($con);
    /*if(!mysqli_stmt_prepare($stmt, $sql)){//error when running sql
        header("Location: ../FacultyDirectory.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "sss", $startTime, $endTime, $email, $titleName);
        mysqli_stmt_execute($stmt);  //run info inside database.
        header("Location: ../FacultyDirectory.php?add=success");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);*/
};