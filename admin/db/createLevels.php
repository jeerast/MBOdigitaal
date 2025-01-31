<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Auth.php';
Auth::check(["student","docent","administrator"]);
$Token = Auth::getToken();

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Educations.php';
$Subjects = Education::selectAllSubjects($Token["data"]["educationId"]);
$Levels = Education::selectAllLevels($Token["data"]["educationId"]);

foreach ($Levels as $Level) {
    Education::setupLevels($Level["id"], $Token["data"]["id"],"","","0","0");
}