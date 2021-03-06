<!--start the session to hold any data that the user puts in using their logged in account.-->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./stylesheets/main.css">
</head>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-black w3-wide w3-padding w3-card" style="z-index: 1">
        <!--Navigation bar buttons-->
        <a href="main.php" class="w3-bar-item w3-button"><b>Home</b></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <!--Gain the users name to display through the session and put different views based on if
            they are logged in or not.-->
            <?php
            if(isset($_SESSION['id-s'])){
                $fname = $_SESSION['firstname-s'];
                echo ' <!--If a user is logged in -->
                <div class="w3-right w3-hide-small">
                <span class="w3-bar-item ">Hi '.$fname.'! </span>
                <a href="FacultyDirectory.php" class="w3-bar-item w3-button">Directory</a>
                <a href="Events.php" class="w3-bar-item w3-button">Events</a>
                <a href="./includes/logout.php" class="w3-bar-item w3-button"><b>Logout</b></a>
                </div>
            ';
            }else{/*If a user is not logged in */
                echo '
                <div class="w3-right w3-hide-small">
                <a href="FacultyDirectory.php" class="w3-bar-item w3-button">Directory</a>
                <a href="Events.php" class="w3-bar-item w3-button">Events</a>
                <a href="SignIn.php" class="w3-bar-item w3-button">Sign in</a>
                </div>
            ';
            }
            ?>
        </div>
    </div>
    <!--Container to hold the main components on home screen.-->
    <div class="w3-display-container w3-content w3-wide" style="max-width:8000px; z-index: -1;">
<!--        Buttons-->

        <div class="anchor">
            <div class="buttonContainer">
                <button type="button" class="button" onclick="clickFacultyDirectory()"> <b>Faculty Directory</b> </button>
                <button type="button" class="button button2" onclick="clickEvents()"> <b>Events</b> </button>
            </div>
            <div class="container"><!--Show the typed text-->
                <p>Find <span class="typed-text" style="z-index: -1;"></span><span class="cursor">&nbsp;</span></p>
            </div>
        </div>

       <!-- Moving circles in the background, having issues displaying when the typed text is working.-->
        <div class="area" >
            <ul class="circles" style="z-index: -1;">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div >

    </div>
</div>

</body>
<script src="main.js"></script>
</html>