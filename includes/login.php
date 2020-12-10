<?php

if(isset($_POST['login-button'])) {
    require 'config.php';

    $aggieidEmail = $_POST['aggieid-signIn'];
    $password = $_POST['password-signIn'];


    if(empty($aggieidEmail) || empty($password)){//if empty fields.
        header("Location: ../SignIn.php?error=emptyfields");
        exit();
    }else{//change based on email
        $sql = "SELECT * FROM student WHERE AggieID=? OR email=?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../SignIn.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $aggieidEmail, $aggieidEmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){//check if password matches database.
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    header("Location: ../SignIn.php?error=wrongpwd");
                    exit();
                }elseif($pwdCheck == true){//correct user and password.
                    session_start();
                    $_SESSION['id-s'] = $row['id'];
                    $_SESSION['AggieID-s'] = $row['AggieID'];
                    $_SESSION['firstname-s'] = $row['firstname'];
                    $_SESSION['typesp-s'] = $row['typesp'];
                    $_SESSION['email-s'] = $row['email'];

                    header("Location: ../main.php?login=success");
                    exit();
                }else{
                    header("Location: ../SignIn.php?error=wrongpwd");
                    exit();
                }
            }else{
                header("Location: ../SignIn.php?error=nouserfound");
                exit();
            }
        }
    }

}else{
    header("Location: ../SignIn.php?no");
    exit();
}



