<!--Start the session to hold all of that data for that user.-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Directory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/contactcard.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/FacultyDirectory.css">
    <script src="FacultyDirectory.js"></script>
</head>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="main.php" class="w3-bar-item w3-button">Home</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <?php /*Hold the first name of the user to display when they are logged in.*/
            if(isset($_SESSION['id-s'])){
                $fname = $_SESSION['firstname-s'];
                echo '
                <div class="w3-right w3-hide-small">
                <span href="#" class="w3-bar-item ">Hi '.$fname.'! </span>
                <a href="FacultyDirectory.php" class="w3-bar-item w3-button"><b>Directory</b></a>
                <a href="Events.php" class="w3-bar-item w3-button">Events</a>
                <a href="./includes/logout.php" class="w3-bar-item w3-button">Logout</a>
                </div>
            ';
            }else{ /*Else display the navigation bar as if they are not logged in.*/
                echo '
                <div class="w3-right w3-hide-small">
                <a href="FacultyDirectory.php" class="w3-bar-item w3-button"><b>Directory</b></a>
                <a href="Events.php" class="w3-bar-item w3-button">Events</a>
                <a href="SignIn.php" class="w3-bar-item w3-button">Sign in</a>
                </div>
            ';
            }
            ?>
        </div>
    </div>
</div>
<?php /*If they are indicated as a professor due to their typesp "type/student-professor", which comes from checking their email, then show professor only content.*/
if(isset($_SESSION['id-s'])){
    $typesp = $_SESSION['typesp-s'];
    $email = $_SESSION['email-s'];
    if($typesp == "professor"){
    echo '
    <div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "manwar@ncat.edu"){/*View if logged in as Dr.Anwar by checking logged in email*/
            echo '<div class="w3-bar w3-black"><!--Top buttons to see schedule, ta info, announcements-->
                <button class="w3-bar-item w3-button openButton" onclick="openSchedule()" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="openTAInfo()" >Add/View TA Info</button>
                 <button class="w3-bar-item w3-button" onclick="openTAInfo()">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="openAnnouncements()" style="background-color: #373232">Add/View Announcements</button>
            </div>
            
    <!-- Form for the schedule information      --> 
    <div class="loginPopup" style="z-index: 5; position:absolute">
      <div class="formPopup" id="popupForm">
      <div class="scheduleinfo" style="float:right; padding-left: 15vmax;position:fixed">
            <h1>Schedule</h1>
            <ul id="fullSchedule"> </ul>
            </div>
        <form action="/includes/insertSchedule.php " method="post" class="formContainer">
          <h2>Add your schedule</h2>
          <label for="title">
            <strong>Title</strong>
          </label>
          <input type="text" name="title" id="title" placeholder="Title"required>
          
          <label for="start">
            <strong>From</strong>
          </label>
          <input type="text" name="start" id="start" placeholder="9:00 am" required>
          
          <label for="end">
            <strong>To</strong>
          </label>
          <input type="text" name="end" id="end" placeholder="10:00 am"required>
          
          <button type="button" name="addbtn" id="addbtn" class="btn" onclick="addSchedule()">Add</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        
      </div>
      </div>
      
      <!--Form for TA Schedule Info-->
    <div class="loginPopup" style="z-index: 5; position:absolute">
      <div class="formPopup" id="taForm">
      <div class="scheduleinfo" style="float:right; padding-left: 15vmax;position:fixed">
            <h1>Schedule</h1>
            <ul id="fullTASchedule"> </ul>
            </div>
        <form action=" " method="post" class="formContainer">
          <h2>Add TA Information </h2>
          <label for="nameTA">
            <strong>Name</strong>
          </label>
          <input type="text" name="nameTA" id="nameTA" placeholder="Name" required>
          
          <label for="classTA">
            <strong>Class</strong>
          </label>
          <input type="text" name="classTA" id="classTA" placeholder="Comp 420" required>
          
          <label for="hoursTA">
            <strong>Hours</strong>
          </label>
          <input type="text" name="hoursTA" id="hoursTA" placeholder="10:00am - 11:00am" required>
          
          <button type="button" name="addTA" id="addTA" class="btn" onclick="addTASchedule()">Add</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        
      </div>
      
    </div>
    
    <!--Form for Announcements-->
    <div class="loginPopup" style="z-index: 5; position:absolute">
      <div class="formPopup" id="anmtForm">
      <div class="scheduleinfo" style="float:right; padding-left: 13vmax;position:fixed">
            <h1>Announcements</h1>
            <ul id="fullAnnouncements"> </ul>
            </div>
        <form action=" " method="post" class="formContainer">
          <h2>Add Announcements </h2>
          <label for="titleAnmt">
            <strong>Title</strong>
          </label>
          <input type="text" name="titleAnmt" id="titleAnmt" placeholder="Research Opportunity" required>
          
          <label for="descrAnmt">
            <strong>Description Information</strong>
          </label>
          <input type="text" name="descrAnmt" id="descrAnmt" placeholder="Description" required>
          
          <button type="button" name="addAnmt" id="addAnmt" class="btn" onclick="addAnnouncements()">Add</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        
      </div>
      </div>';
        }else{ /*Else if not Dr.Anwar then show different view.*/
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'<!--Card to display all information of Dr Anwar-->
            <img src="./images/Anwar.PNG" alt="Mohd Anwar" style="width:30%" class="center">
            <div class="container">
                <h2>Dr. Mohd Anwar</h2>
                <p class="title"> Associate Professor
                <p>Office : Cherry 304</p>
                <p>Phone : (336)285-2449</p>
                <p>Email: manwar@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >';
        if($email == "ksbryant@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
             <img src="./images/Bryant.PNG" alt="Kelvin Bryant" style="width:30%" class="center">
            <div class="container">
                <h2>Kelvin Bryant</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Cherry Hall 303</p>
                <p>Phone: (336)285-2446</p>
                <p>Email: ksbryant@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "corwith@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
             <img src="./images/ncat2.png" alt="Edward Carr" style="width:60%" class="alter">
            <div class="container">
                <h2>Edward Carr</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: McNair Hall 519</p>
                <p>Phone: (336)285-3692</p>
                <p>Email: corwith@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "icho@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/Cho.PNG" alt="Cho" style="width:30%" class="center">
            <div class="container">
                <h2>Dr. Issac Cho</h2>
                <p class="title"> Assistant Professor
                <p>Office : McNair 502</p>
                <p>Phone : (336) 285-3700</p>
                <p>Email: icho@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >';
        if($email == "edeffort@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
             <img src="./images/Effort.PNG" alt="Effort" style="width:30%" class="center">
            <div class="container">
                <h2>Edmondson Effort</h2>
                <p class="title">Technology Support Analyst</p>
                <p>Office: Cherry Hall 303</p>
                <p>Phone: (336) 285-4610</p>
                <p>Email: edeffort@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "esterlin@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/ncat2.png" alt="Albert Esterline" style="width:60%" class="alter">
            <div class="container">
                <h2>Albert Esterline</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 517</p>
                <p>Phone: (336) 285-3692</p>
                <p>Email: esterlin@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "jhernand@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/ncat2.png" alt="Mohd Anwar" style="width:60%" class="alter">
            <div class="container">
                <h2>Joaquin Hernandez</h2>
                <p class="title"> Business Service Coord - Temp</p>
                <p>Office:</p>
                <p>Phone:</p>
                <p>Email: jhernand@ncat.edu</p>


                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >';
            if($email == "skhorsandroo@ncat.edu"){
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
            }else{
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
            }echo'
            <img src="./images/Khor.PNG" alt="khor" style="width:30%" class="center">
            <div class="container">
                <h2>Sajad Khorsandroo</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Place Holder </p>
                <p>Phone: (336) 285-3697</p>
                <p>Email: skhorsandroo@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
            if($email == "jungkim@ncat.edu"){
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
            }else{
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
            }echo'
             <img src="./images/ncat2.png" alt="Kim" style="width:60%" class="alter">
            <div class="container">
                <h2>Jung Hee Kim</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 506</p>
                <p>Phone: (336)285-3695</p>
                <p>Email: jungkim@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
            if($email == "pioro@ncat.edu"){
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
            }else{
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
            }echo'
              <img src="./images/ncat2.png" alt="pioro" style="width:60%" class="alter">
            <div class="container">
                <h2>Barbara Nowaczyk-Pioro</h2>
                <p class="title"> Part-Time Instructor</p>
                <p>Office : Place Holder</p>
                <p>Phone : (336)285-2395</p>
                <p>Email: pioro@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >';
            if($email == "lqingge@ncat.edu"){
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
            }else{
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
            }echo'
             <img src="./images/ncat2.png" alt="qingge" style="width:60%" class="alter">
            <div class="container">
                <h2>Letu Qingge</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Place Holder</p>
                <p>Phone: Place Holder</p>
                <p>Email: lqingge@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
            if($email == "kroy@ncat.edu"){
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
            }else{
                echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
            }echo'
            <img src="./images/ncat2.png" alt="Roy" style="width:60%" class="alter">
            <div class="container">
                <h2>Kaushik Roy</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 505</p>
                <p>Phone:</p>
                <p>Email: kroy@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "klschnell@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
             <img src="./images/ncat2.png" alt="Schnell" style="width:60%" class="alter">
            <div class="container">
                <h2>Karen Schnell</h2>
                <p class="title"> Part-Time Instructor</p>
                <p>Office : Place Holder</p>
                <p>Phone : </p>
                <p>Email: klschnell@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >';
        if($email == "msiddula@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
             <img src="./images/ncat2.png" alt="Siddula" style="width:60%" class="alter">
            <div class="container">
                <h2>Madhuri Siddula</h2>
                <p class="title">Professor</p>
                <p>Office: Place Holder</p>
                <p>Phone: Place Holder</p>
                <p>Email: msiddula@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "rbwilkin@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
             <img src="./images/ncat2.png" alt="Wilkins" style="width:60%" class="alter">
            <div class="container">
                <h2>Raeford Wilkins</h2>
                <p class="title">BEACON Program Manager</p>
                <p>Office: McNair Hall 505</p>
                <p>Phone:</p>
                <p>Email: rbwilkin@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "rosnlloy@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/ncat2.png" alt="Williams" style="width:60%" class="alter">
            <div class="container">
                <h2>Rosemary Williams</h2>
                <p class="title"> Administrative Support Specialist</p>
                <p>Office : Computer science office</p>
                <p>Phone: (336)285-3696 </p>
                <p>Email: rosnlloy@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >';
        if($email == "jxu@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/ncat2.png" alt="Xu" style="width:60%" class="alter">
            <div class="container">
                <h2>Jinsheng Xu</h2>
                <p class="title">Associate Professor</p>
                <p>Office:McNair Hall 521</p>
                <p>Phone:(336)285-3698</p>
                <p>Email: jxu@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "cshmyu@ncat.ed"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/ncat2.png" alt="Yu" style="width:60%" class="alter">
            <div class="container">
                <h2>Huiming Yu</h2>
                <p class="title">Professor</p>
                <p>Office: McNair Hall 501</p>
                <p>Phone:(336)285-3699</p>
                <p>Email: cshmyu@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">';
        if($email == "xhyuan@ncat.edu"){
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">Add/View TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Add/View Announcements</button>
            </div>';
        }else{
            echo '
            <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button>
            </div>
            ';
        }echo'
            <img src="./images/ncat2.png" alt="Yuan" style="width:60%" class="alter">
            <div class="container">
                <h2>Xiaohong Yuan</h2>
                <p class="title">Professor/Chair</p>
                <p>Office : Place Holder</p>
                <p>Phone:(336)285-3693 </p>
                <p>Email: xhyuan@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>
            ';}
    elseif($typesp == "student"){/*If the signed in user is a student then show the student view.*/
        echo '
                <div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
        <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Schedule</button>
                <button class="w3-bar-item w3-button" onclick="">TA Info</button>
                <button class="w3-bar-item w3-button" onclick="" style="background-color: #373232">Announcements</button> 
            </div>
            
            <img src="./images/Anwar.PNG" alt="Mohd Anwar" style="width:100%">
            <div class="container">
                <h2>Dr. Mohd Anwar</h2>
                <p class="title"> Associate Professor
                <p>Office : Cherry 304</p>
                <p>Phone : (336)285-2449</p>
                <p>Email: manwar@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Bryant.PNG" alt="Kelvin Bryant" style="width:100%">
            <div class="container">
                <h2>Kelvin Bryant</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Cherry Hall 303</p>
                <p>Phone: (336)285-2446</p>
                <p>Email: ksbryant@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Edward Carr" style="width:100%">
            <div class="container">
                <h2>Edward Carr</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: McNair Hall 519</p>
                <p>Phone: (336)285-3692</p>
                <p>Email: corwith@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/Cho.PNG" alt="Cho" style="width:100%">
            <div class="container">
                <h2>Dr. Issac Cho</h2>
                <p class="title"> Assistant Professor
                <p>Office : McNair 502</p>
                <p>Phone : (336) 285-3700</p>
                <p>Email: icho@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Effort.PNG" alt="Effort" style="width:100%">
            <div class="container">
                <h2>Edmondson Effort</h2>
                <p class="title">Technology Support Analyst</p>
                <p>Office: Cherry Hall 303</p>
                <p>Phone: (336) 285-4610</p>
                <p>Email: edeffort@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Albert Esterline" style="width:100%">
            <div class="container">
                <h2>Albert Esterline</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 517</p>
                <p>Phone: (336) 285-3692</p>
                <p>Email: esterlin@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="img1.jpg" alt="Mohd Anwar" style="width:100%">
            <div class="container">
                <h2>Dr. Mohd Anwar</h2>
                <p class="title"> Business Service Coord - Temp</p>
                <p>Email: jhernand@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Khor.PNG" alt="Kelvin Bryant" style="width:100%">
            <div class="container">
                <h2>Sajad Khorsandroo</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Place Holder </p>
                <p>Phone: (336) 285-3697</p>
                <p>Email: skhorsandroo@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Kim" style="width:100%">
            <div class="container">
                <h2>Jung Hee Kim</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 506</p>
                <p>Phone: (336)285-3695</p>
                <p>Email: jungkim@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="img1.jpg" alt="Cho" style="width:100%">
            <div class="container">
                <h2>Barbara Nowaczyk-Pioro</h2>
                <p class="title"> Part-Time Instructor</p>
                <p>Office : Place Holder</p>
                <p>Phone : (336)285-2395</p>
                <p>Email: pioro@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/ncat2.png" alt="Qingge" style="width:100%">
            <div class="container">
                <h2>Letu Qingge</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Place Holder</p>
                <p>Phone: Place Holder</p>
                <p>Email: lqingge@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Roy" style="width:100%">
            <div class="container">
                <h2>Kaushik Roy</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 505</p>
                <p>Phone:</p>
                <p>Email: kroy@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Schnell" style="width:100%">
            <div class="container">
                <h2>Karen Schnell</h2>
                <p class="title"> Part-Time Instructor</p>
                <p>Office : Place Holder</p>
                <p>Phone : </p>
                <p>Email: klschnell@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/ncat2.png" alt="Siddula" style="width:100%">
            <div class="container">
                <h2>Madhuri Siddula</h2>
                <p class="title">Professor</p>
                <p>Office: Place Holder</p>
                <p>Phone: Place Holder</p>
                <p>Email: msiddula@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Wilkins" style="width:100%">
            <div class="container">
                <h2>Raeford Wilkins</h2>
                <p class="title">BEACON Program Manager</p>
                <p>Office: McNair Hall 505</p>
                <p>Phone:</p>
                <p>Email: rbwilkin@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Williams" style="width:100%">
            <div class="container">
                <h2>Rosemary Williams</h2>
                <p class="title"> Administrative Support Specialist</p>
                <p>Office : Computer science office</p>
                <p>Phone: (336)285-3696 </p>
                <p>Email: rosnlloy@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/ncat2.png" alt="Xu" style="width:100%">
            <div class="container">
                <h2>Jinsheng Xu</h2>
                <p class="title">Associate Professor</p>
                <p>Office:McNair Hall 521</p>
                <p>Phone:(336)285-3698</p>
                <p>Email: jxu@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Yu" style="width:100%">
            <div class="container">
                <h2>Huiming Yu</h2>
                <p class="title">Professor</p>
                <p>Office: McNair Hall 501</p>
                <p>Phone:(336)285-3699</p>
                <p>Email: cshmyu@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Yuan" style="width:100%">
            <div class="container">
                <h2>Xiaohong Yuan</h2>
                <p class="title">Professor/Chair</p>
                <p>Office : Place Holder</p>
                <p>Phone:(336)285-3693 </p>
                <p>Email: xhyuan@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>

            ';}
}else{ /*To display a view for guests where they can not view schedules or ta information.*/
    echo '
               <div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/Anwar.PNG" alt="Mohd Anwar" style="width:30%" class="center">
            <div class="container">
                <h2>Dr. Mohd Anwar</h2>
                <p class="title"> Associate Professor
                <p>Office : Cherry 304</p>
                <p>Phone : (336)285-2449</p>
                <p>Email: manwar@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Bryant.PNG" alt="Kelvin Bryant" style="width:30%" class="center">
            <div class="container">
                <h2>Kelvin Bryant</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Cherry Hall 303</p>
                <p>Phone: (336)285-2446</p>
                <p>Email: ksbryant@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Edward Carr" style="width:60%" class="alter">
            <div class="container">
                <h2>Edward Carr</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: McNair Hall 519</p>
                <p>Phone: (336)285-3692</p>
                <p>Email: corwith@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/Cho.PNG" alt="Cho" style="width:30%" class="center">
            <div class="container">
                <h2>Dr. Issac Cho</h2>
                <p class="title"> Assistant Professor
                <p>Office : McNair 502</p>
                <p>Phone : (336) 285-3700</p>
                <p>Email: icho@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Effort.PNG" alt="Effort" style="width:30%" class="center">
            <div class="container">
                <h2>Edmondson Effort</h2>
                <p class="title">Technology Support Analyst</p>
                <p>Office: Cherry Hall 303</p>
                <p>Phone: (336) 285-4610</p>
                <p>Email: edeffort@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Albert Esterline" style="width:60%" class="alter">
            <div class="container">
                <h2>Albert Esterline</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 517</p>
                <p>Phone: (336) 285-3692</p>
                <p>Email: esterlin@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Mohd Anwar" style="width:60%" class="alter">
            <div class="container">
                <h2>Dr. Mohd Anwar</h2>
                <p class="title"> Business Service Coord - Temp</p>
                <p>Office:</p>
                <p>Phone:</p>
                <p>Email: jhernand@ncat.edu</p>


                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Khor.PNG" alt="khor" style="width:30%" class="center">
            <div class="container">
                <h2>Sajad Khorsandroo</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Place Holder </p>
                <p>Phone: (336) 285-3697</p>
                <p>Email: skhorsandroo@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Kim" style="width:60%" class="alter">
            <div class="container">
                <h2>Jung Hee Kim</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 506</p>
                <p>Phone: (336)285-3695</p>
                <p>Email: jungkim@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="pioro" style="width:60%" class="alter">
            <div class="container">
                <h2>Barbara Nowaczyk-Pioro</h2>
                <p class="title"> Part-Time Instructor</p>
                <p>Office : Place Holder</p>
                <p>Phone : (336)285-2395</p>
                <p>Email: pioro@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/Letu.png" alt="Qingge" style="width:80%" class="alter">
            <div class="container">
                <h2>Letu Qingge</h2>
                <p class="title">Assistant Professor</p>
                <p>Office: Place Holder</p>
                <p>Phone: Place Holder</p>
                <p>Email: lqingge@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Roy" style="width:60%" class="alter">
            <div class="container">
                <h2>Kaushik Roy</h2>
                <p class="title">Associate Professor</p>
                <p>Office: McNair Hall 505</p>
                <p>Phone:</p>
                <p>Email: kroy@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Schnell" style="width:60%" class="alter">
            <div class="container">
                <h2>Karen Schnell</h2>
                <p class="title"> Part-Time Instructor</p>
                <p>Office : Place Holder</p>
                <p>Phone : </p>
                <p>Email: klschnell@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/ncat2.png" alt="Siddula" style="width:60%" class="alter">
            <div class="container">
                <h2>Madhuri Siddula</h2>
                <p class="title">Professor</p>
                <p>Office: Place Holder</p>
                <p>Phone: Place Holder</p>
                <p>Email: msiddula@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Wilkins" style="width:60%" class="alter">
            <div class="container">
                <h2>Raeford Wilkins</h2>
                <p class="title">BEACON Program Manager</p>
                <p>Office: McNair Hall 505</p>
                <p>Phone:</p>
                <p>Email: rbwilkin@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Williams" style="width:60%" class="alter">
            <div class="container">
                <h2>Rosemary Williams</h2>
                <p class="title"> Administrative Support Specialist</p>
                <p>Office : Computer science office</p>
                <p>Phone: (336)285-3696 </p>
                <p>Email: rosnlloy@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)" >
            <img src="./images/ncat2.png" alt="Xu" style="width:60%" class="alter">
            <div class="container">
                <h2>Jinsheng Xu</h2>
                <p class="title">Associate Professor</p>
                <p>Office:McNair Hall 521</p>
                <p>Phone:(336)285-3698</p>
                <p>Email: jxu@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
    
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/ncat2.png" alt="Yu" style="width:60%" class="alter">
            <div class="container">
                <h2>Huiming Yu</h2>
                <p class="title">Professor</p>
                <p>Office: McNair Hall 501</p>
                <p>Phone:(336)285-3699</p>
                <p>Email: cshmyu@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="column">
        <div class="card" style="transform: translateY(100px)">
            <img src="./images/Yuan.jpg" alt="Yuan" style="width:30%" class="center">
            <div class="container">
                <h2>Xiaohong Yuan</h2>
                <p class="title">Professor/Chair</p>
                <p>Office : Place Holder</p>
                <p>Phone:(336)285-3693 </p>
                <p>Email: xhyuan@ncat.edu</p>
                <p><button class="button">Contact</button></p>
                <p><button class="button">Office Hours <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span></label></button></p>
            </div>
        </div>
    </div>
</div>
            ';
}
?>

</body>
</html>