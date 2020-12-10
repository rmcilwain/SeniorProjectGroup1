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
};