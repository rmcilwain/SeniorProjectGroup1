var scheduleTitle = " ";
var scheduleStartTime = " ";
var scheduleEndTime = " ";
var TAName = " ";
var TAClass = " ";
var TAHours = " ";
var anmtTitle = " ";
var anmtDescr = " ";

    function openSchedule() {
        document.getElementById("popupForm").style.display = "block";
    }

function openTAInfo() {
    document.getElementById("taForm").style.display = "block";

}

function openAnnouncements() {
    document.getElementById("anmtForm").style.display = "block";

}

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

function addTASchedule() {
    TAName = document.getElementById("nameTA").value;
    TAClass = document.getElementById("classTA").value;
    TAHours = document.getElementById("hoursTA").value;
    var ul = document.getElementById("fullTASchedule");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(TAName + " : " + TAClass + " - " + TAHours))
    ul.appendChild(li);
}

function addAnnouncements() {
        anmtTitle = document.getElementById("titleAnmt").value;
        anmtDescr = document.getElementById("descrAnmt").value;
        var ul = document.getElementById("fullAnnouncements");
        var li = document.createElement("li");
        li.appendChild(document.createTextNode(anmtTitle + " : " + anmtDescr))
        ul.appendChild(li);
}


function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("taForm").style.display = "none";
    document.getElementById("anmtForm").style.display = "none";
}