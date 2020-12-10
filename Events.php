<!--Start the session to hold of the data for that user.-->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./stylesheets/Events.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Events</title>
</head>
<style>
    .parallax {
        /* Set a specific height */
        min-height: 500px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
</style>
<body>

<!--Background scrolling down to different sections effect.-->
<div class="parallax"></div>
<!--Section one just blank-->
<div style="height:1000px;background-color:#fdb927;font-size:36px">

</div>
<!--Section two with photo-->
<div id="section2" style="height:1000px;background-color:#fdb927;background-image: url(./images/temp1.jpg);font-size:36px">

</div>
<div><!--Section two text-->
    <p style="font-size: 70px;background-color: white; border: 5px #999999; transform:translateX(22%)"> Virtual Commencement </p>
    <p style="font-size: 30px;background-color: white; border: 5px #999999; transform:translateX(22%)"> 10:30 am <br> Further information...</p>

</div>
<!--Section three-->
<div style="height:1000px;background-color:#fdb927;font-size:36px">
</div>
</body>
</html>


<body>
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" style="z-index: 1">
        <!--Navigation bar buttons-->
        <a href="main.php" class="w3-bar-item w3-button">Home</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <?php /*Show first name of signed in user and log out at the top right.*/
            if(isset($_SESSION['id-s'])){
                $fname = $_SESSION['firstname-s'];
                echo '
                <div class="w3-right w3-hide-small">
                <a href="#" class="w3-bar-item ">Hi '.$fname.'! </a>
                <a href="FacultyDirectory.php" class="w3-bar-item w3-button">Directory</a>
                <a href="Events.php" class="w3-bar-item w3-button"><b>Events</b></a>
                <a href="./includes/logout.php" class="w3-bar-item w3-button">Logout</a>
                </div>
            ';
            }else{/*If not logged in then show regular navigation bar.*/
                echo '
                <div class="w3-right w3-hide-small">
                <a href="FacultyDirectory.php" class="w3-bar-item w3-button">Directory</a>
                <a href="Events.php" class="w3-bar-item w3-button"><b>Events</b></a>
                <a href="SignIn.php" class="w3-bar-item w3-button">Sign in</a>
                </div>
            ';
            }
            ?>
        </div>
    </div>

    <!--   Button To Show More Below-->
    <div class="center-con">

        <div class="round" onclick="document.getElementById('section2').scrollIntoView();">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!--Calendar-->
    <div class="container">
        <div class="calendar light">
            <div class="calendar_header">
                <h1 class = "header_title">Welcome</h1>
                <p class="header_copy">Events Calendar</p>
            </div>
            <div class="calendar_plan">
                <div class="cl_plan">
                    <div class="cl_title">Today</div>
                    <div class="cl_copy" id="cl_c"></div>
                    <script> /*Automatically get the date each day*/
                        n = new Date();
                        y = n.getFullYear();
                        m = n.getMonth();
                        d = n.getDate();
                        var months = ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November","December"]
                        var mydiv = document.getElementById("cl_c")
                        mydiv.innerHTML = months[m] + " " + d + " " + y;
                    </script>
                    <div class="cl_arrow" >
                        <i class="arrow right" ></i>
                    </div>
                </div>
            </div>

            <div class="calendar_events"><!--Any upcoming events-->
                <p class="ce_title">Upcoming Events</p>
                <div class="event_item">
                    <div class="ei_Dot dot_active"></div>
                    <div class="ei_Title">11:00 am</div>
                    <div class="ei_Copy">Thursday Talk</div>
                </div>
                <div class="event_item">
                    <div class="ei_Dot dot_active"></div>
                    <div class="ei_Title">12:00 pm</div>
                    <div class="ei_Copy">Virtual Career Fair</div>
                </div>
                <div class="event_item">
                    <div class="ei_Dot"></div>
                    <div class="ei_Title">4:30 pm</div>
                    <div class="ei_Copy">Virtual Tech Information Day</div>
                </div>
                <div class="event_item">
                    <div class="ei_Dot"></div>
                    <div class="ei_Title">5:30 pm</div>
                    <div class="ei_Copy">Colloquim</div>
                </div>
            </div><br>
           <!-- Bottom info section of calander-->
            <div class="ei_Dot dot_active"></div> = Active
        </div>


        <section class="main" >
            <!--        Slideshow-->
            <div class="wrapper">
                <div class="slideshows">
                    <div class="slideshow slideshow--hero">
                        <div class="slides">
                            <div class="slide slide1"></div>
                            <div class="slide slide2"></div>
                            <div class="slide slide3"></div>
                        </div>
                    </div>
                    <div class="slideshow slideshow--contrast slideshow--contrast--before">
                        <div class="slides">
                            <div class="slide slide1"></div>
                            <div class="slide slide2"></div>
                            <div class="slide slide3"></div>
                        </div>
                    </div>
                    <div class="slideshow slideshow--contrast slideshow--contrast--after">
                        <div class="slides">
                            <div class="slide slide1"></div>
                            <div class="slide slide2"></div>
                            <div class="slide slide3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script> /*Hide the show more button and slide show when scrolling down and bring back when scrolling up.*/
            $(window).scroll(function(){
                if ($(this).scrollTop()>300){
                    $(".wrapper").hide();
                    $(".center-con").hide();
                }else{
                    $(".wrapper").show(100);
                    $(".center-con").show(100);
                }
            })
        </script>
    </div>
</body>
<script src="Events.js"></script>
</html>