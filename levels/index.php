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

$Token = Auth::getToken();


$conn = mysqli_connect("localhost", "root", "", "mbogodigital");
  
if (isset($_REQUEST['DeliverableStudent'])){
    // Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$first_name =  $_REQUEST['DeliverableStudent'];
$Tkn = $Token["data"]["id"];
// $sql = "UPDATE deliverables SET student = `test` WHERE userId = $Tkn";
// $sql = "UPDATE deliverables SET verified=0 WHERE userId='56c9fd91-6c99-4915-85cc-30ea9e5dd956';";
$sql = "UPDATE deliverables SET student='$first_name' WHERE userId='$Tkn';";

if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully." 
        . " Please browse your localhost php my admin" 
        . " to view the updated data</h3>"; 
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}
}


// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van een link (GET).
// Op dit moment hier niet van toepassing.


// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren om de juiste
// informatie te bewerken.

require __DOCUMENTROOT__ . '/models/Educations.php';
// $EducationID = Education::getUserEducationID($Token);
$Subjects = Education::selectAllSubjects($Token["data"]["educationId"]);
$Levels = Education::selectAllLevels($Token["data"]["educationId"]);
$Results = Education::selectAllResultsFromUser($Token["data"]["id"]);


// Close connection
mysqli_close($conn);
// mysqli_query($conn, $sql);
// fix DB for part bellow
// $ElectivesResults = Education::selectAllElectivesResults($Token["data"]["id"]);

// 4. VIEWS OPHALEN
// De HTML-pagina (view) wordt hier opgehaald.
// $title is de titel van de html pagina.
$title = "Levels || " . $title;
require __DOCUMENTROOT__ . '/views/levels/student.php';