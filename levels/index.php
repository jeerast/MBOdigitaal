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
$user_id = Auth::getIdName();

// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van een link (GET).
// Op dit moment hier niet van toepassing.


// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren om de juiste
// informatie te bewerken.

require __DOCUMENTROOT__ . '/models/Educations.php';
// $EducationID = Education::getUserEducationID($Token);
$ElectivesMenu = Education::selectAllElectives($Token["data"]["educationId"]);
$Electives = Education::selectAllInfo($Token["data"]["educationId"]);
$ElectivesResults = Education::selectAllElectivesResults($Token["data"]["id"]);
// jee
// require_once __DOCUMENTROOT__ . '/models/levels.php';

// $levels = levels::selectAll();
// $level_1 = levels::Level_1();
// $level_2 = levels::Level_2();
// $level_3 = levels::Level_3();
// $level_4 = levels::Level_4();
// $level_5 = levels::Level_5();
// $level_6 = levels::Level_6();
// $level_7 = levels::Level_7();

// require_once __DOCUMENTROOT__ . '/models/Auth.php';

// $UserRole = Auth::checkRole();



// 4. VIEWS OPHALEN
// De HTML-pagina (view) wordt hier opgehaald.
// $title is de titel van de html pagina.
$title = "Levels";
require __DOCUMENTROOT__ . '/views/levels/levels.php';