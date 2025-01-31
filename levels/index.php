<?php

// url: /keuzedelen
// Dit is de controller-pagina voor het generen van een overzicht van alle
// challenges die met het onderwerp keuzedelen te maken heeft.

// Globale variabelen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER["DOCUMENT_ROOT"] . '/docroot.php';
require_once __DOCUMENTROOT__ . '/config/globalvars.php';
require_once __DOCUMENTROOT__ . '/errors/default.php';

// 1. INLOGGEN CONTROLEREN
// Hier wordt gecontroleerd of de gebruiker is ingelogd en de juiste rechten
// heeft. De rollen "student" en "student" hebben toegang.
// Voor nu geven we nog iedereen toegang.

require_once __DOCUMENTROOT__ . '/models/Auth.php';
Auth::check(["student","docent","administrator"]);

// 
// GET / POST VARS
$Token = Auth::getToken();

// add connection
$conn = mysqli_connect("localhost", "root", "", "mbogodigital");
  
if (isset($_REQUEST['DeliverableStudent'])){
    // Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
// post request from form
$EduMessage = $_REQUEST['DeliverableStudent'];
$EduId = $_REQUEST['educationId'];
$Tkn = $Token["data"]["id"];

// add an if to see if a user is logged in + if it matches the id of the user that is trying to post
$sql = "UPDATE deliverables SET student='$EduMessage' WHERE educationId='$EduId';";

// send var to DB
if(mysqli_query($conn, $sql)){
    // success
} else{
    // failed
}
}


// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van een link (GET).
// Op dit moment hier niet van toepassing.


// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren om de juiste
// informatie te bewerken.

require __DOCUMENTROOT__ . '/models/Educations.php';
$Subjects = Education::selectAllSubjects($Token["data"]["educationId"]);
$Levels = Education::selectAllLevels($Token["data"]["educationId"]);
$Results = Education::selectAllResultsFromUser($Token["data"]["id"]);

// $test = Education::test($Token["data"]["id"],$Token["data"]["educationId"]);


// Close connection
mysqli_close($conn);
// mysqli_query($conn, $sql);

// 4. VIEWS OPHALEN
// De HTML-pagina (view) wordt hier opgehaald.
// $title is de titel van de html pagina.
$title = "Levels || " . $title;
require __DOCUMENTROOT__ . '/views/levels/student.php';