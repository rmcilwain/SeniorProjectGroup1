<?php
if(isset($_POST['signup-button'])){
    require 'config.php';

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $aggieid = $_POST["aggieid"];
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    $pattern1 = "/@ncat.edu$/";//"/ncat.edu/i";
    $pattern2 = "/@aggies.ncat.edu$/";//"/aggies.ncat.edu/i";

    $typesp = "";
    if(preg_match($pattern1, $email)){
        $typesp = "professor";
    }elseif(preg_match($pattern2, $email)){
        $typesp = "student";
    }

    //if any fields empty
    if(empty($firstname) || empty($lastname) || empty($aggieid) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../SignIn.php?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid."&email=".$email);
        exit();
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) ){  //if valid email
        header("Location: ../SignIn.php?error=invalidemail&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid);
        exit();
    }elseif(!(preg_match($pattern1, $email) || preg_match($pattern2, $email))){
        header("Location: ../SignIn.php?error=emailnotncat&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid);
        exit();
    }elseif(!preg_match("/^[a-zA-Z0-9]*$/", $aggieid)){//might need to change to only numbers
        header("Location: ../SignIn.php?error=invalididchar&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
        exit();
    }elseif(strlen($password) <= 6 ){
        header("Location: ../SignIn.php?error=invalidpasslen&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid);
        exit();
    }elseif(!preg_match("#[0-9]+#", $password)){
        header("Location: ../SignIn.php?error=invalidpassnonum&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid);
        exit();
    }elseif(!preg_match("#[A-Z]+#", $password)){
        header("Location: ../SignIn.php?error=invalidpassnocapi&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid);
        exit();
    }elseif($password !== $passwordRepeat){
        header("Location: ../SignIn.php?error=passwordnomatch&firstname=".$firstname."&lastname=".$lastname."&aggieid=".$aggieid."&email=".$email);
        exit();
    }else{//unique username/aggieid?
        //change depending on the email. so students, professors...

        $sql = "SELECT AggieID FROM student WHERE email=?";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)){//error when running sql
            header("Location: ../SignIn.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email );
            mysqli_stmt_execute($stmt);  //run info inside database.
            mysqli_stmt_store_result($stmt);  //stores result from database into stmt.
            $resultCheck = mysqli_stmt_num_rows($stmt);  //get num of rows.
            if($resultCheck > 0){
                header("Location: ../SignIn.php?error=usertaken&aggieid=".$aggieid);
                exit();
            }else{
                $sql = "INSERT INTO student (firstname, lastname,AggieID,email,password,typesp) VALUES(?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt, $sql)){//error when running sql
                    header("Location: ../SignIn.php?error=sqlerror");
                    exit();
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);//hash the password.

                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $aggieid, $email, $hashedPwd,$typesp);
                    mysqli_stmt_execute($stmt);  //run info inside database.
                    header("Location: ../SignIn.php?signup=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

}else{
    header("Location: ../SignIn.php");
    exit();
}