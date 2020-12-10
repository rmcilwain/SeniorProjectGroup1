<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./stylesheets/SignIn.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="w3-top">
    <div class="w3-bar w3-black w3-wide w3-padding w3-card" style="z-index: 1">
        <!--Navigation bar buttons-->
        <a href="main.php" class="w3-bar-item w3-button" style="text-decoration:none">Home</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="FacultyDirectory.php" class="w3-bar-item w3-button" style="text-decoration:none">Directory</a>
            <a href="Events.php" class="w3-bar-item w3-button" style="text-decoration:none">Events</a>
            <a href="SignIn.php" class="w3-bar-item w3-button" style="text-decoration:none"><b>Sign in</b></a>
        </div>
    </div>

    <div class="w3-display-container w3-content w3-wide" style="max-width:8000px; z-index: -1;">
        <div class="container" id="container">
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <div class="form-container sign-up-container">
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "emptyfields"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Fill in all fields!</p>';
                    }elseif($_GET['error'] == "invalidemail"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Invalid email format!</p>';
                    }elseif($_GET['error'] == "emailnotncat"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Invalid email, not NCAT email!</p>';
                    }elseif($_GET['error'] == "invalididchar"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">ID can only be letters or numbers!</p>';
                    }elseif($_GET['error'] == "invalidpasslen"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Password must be at least 6 characters!</p>';
                    }elseif($_GET['error'] == "invalidpassnonum"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Password must have at least 1 number!</p>';
                    }elseif($_GET['error'] == "invalidpassnocapi"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Password must have at least 1 capital letter!</p>';
                    }elseif($_GET['error'] == "passwordnomatch"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Passwords do not match!</p>';
                    }elseif($_GET['error'] == "usertaken"){
                        echo '<p class="signuperror" style="text-align: center; transform:translateY(30px)">Email already in use!</p>';
                    }
                }/*elseif($_GET['signup'] == "success"){
                    echo '<p class="signupsuccess" style="text-align: center; transform:translateY(30px)">Signup successful!</p>';
                }*/
            ?>
                <form action="includes/signup.php" method="POST" id="sign-up">
                    <h1>Create Account</h1>
                    <input type="text" name="firstname" id="firstname" placeholder="First Name" /><br>
                    <input type="text" name="lastname" id="lastname" placeholder="Last Name" /><br>
                    <input type="text" name="aggieid" id="aggieid" placeholder="AggieID" /><br>
                    <input type="text" name="email" id="email" placeholder="Email" /><br>
                    <input type="password" name="password" id="password" placeholder="Password (At least 6 characters, one number, one capital letter)" /><br>
                    <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Repeat Password" /><br>
                    <button type="submit" name="signup-button" id="signup-button" onclick="" style="color:white">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">

                <form action="includes/login.php" method="POST" id="login">
                    <h1>Sign in</h1>
                    <input type="text" name="aggieid-signIn" placeholder="Email" />
                    <input type="password" name="password-signIn" placeholder="Password" />
                    <a href="#">Forgot your password?</a>
                    <button type="submit" name="login-button" id="login-button" style="color: white">Sign In</button>
                </form>
                <form action="includes/logout.php" method="POST" id="logout">
                    <button type="submit" name="logout-button" id="logout-button" style="color: white">Logout</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello!</h1>
                        <p>Enter your personal details</p>
                        <button class="ghost" id="signUp" name="signUp" >Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
        if(isset($_SESSION['id-s'])){
            echo '<p class="fade-out" style="font-size: 20px"><b>You are logged in!</b></p>';
        }else{
            echo '<p class="fade-out" style="font-size: 20px"><b>You are logged out!</b></p>';
        }
    ?>
</div>
</body>
<script src="SignIn.js"></script>
</html>