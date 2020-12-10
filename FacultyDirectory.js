/*Make variables for form info.*/
var scheduleTitle = " ";
var scheduleStartTime = " ";
var scheduleEndTime = " ";
var TAName = " ";
var TAClass = " ";
var TAHours = " ";
var anmtTitle = " ";
var anmtDescr = " ";

/*Display the schedule pop up*/
function openSchedule() {
    document.getElementById("popupForm").style.display = "block";
}

/*Display the TA information pop up*/
function openTAInfo() {
    document.getElementById("taForm").style.display = "block";

}

/*Display the announcements pop up*/
function openAnnouncements() {
    document.getElementById("anmtForm").style.display = "block";

}

/*When add schedule button is clicked then make a list of the inputted information.*/
function addSchedule() {
    scheduleTitle= document.getElementById("title").value;
    scheduleStartTime = document.getElementById("start").value;
    scheduleEndTime = document.getElementById("end").value;
    var ul = document.getElementById("fullSchedule");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(scheduleStartTime + " - " + scheduleEndTime + " " + scheduleTitle))
    ul.appendChild(li);
    //$('#fullSchedule').html('<li>' + scheduleStartTime + " - " + scheduleEndTime + " " + scheduleTitle)
}

/*When add TA schedule button is clicked make a list of the inputted information.*/
function addTASchedule() {
    TAName = document.getElementById("nameTA").value;
    TAClass = document.getElementById("classTA").value;
    TAHours = document.getElementById("hoursTA").value;
    var ul = document.getElementById("fullTASchedule");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(TAName + " : " + TAClass + " - " + TAHours))
    ul.appendChild(li);
}

/*When add announcements button is clicked make a list of the inputted information.*/
function addAnnouncements() {
        anmtTitle = document.getElementById("titleAnmt").value;
        anmtDescr = document.getElementById("descrAnmt").value;
        var ul = document.getElementById("fullAnnouncements");
        var li = document.createElement("li");
        li.appendChild(document.createTextNode(anmtTitle + " : " + anmtDescr))
        ul.appendChild(li);
}

/*When the close button is clicked close each form.*/
function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("taForm").style.display = "none";
    document.getElementById("anmtForm").style.display = "none";
}