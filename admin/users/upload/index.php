<?php

// url: /admin/users/upload
// Dit is de controller-pagina voor het uploaden van een csv
// bestand met gebruikers. Wordt gepost vanaf /admin/users/uploadform


// Globale variablen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';

// 1. INLOGGEN CONTROLEREN
// Hier wordt gecontroleerd of de gebruiker is ingelogd en de juiste rechten
// heeft. De rollen "applicatiebeheerder" en "administrator" hebben toegang. 
require $_SERVER['DOCUMENT_ROOT'] . '/models/Auth.php';
Auth::check(["applicatiebeheerder", "administrator"]);

// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van form POST
// en of the variabelen wel bestaan.
// htmlspecialchars() wordt gebruikt om cross site scripting (xss) te voorkomen.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES['uploadCSV']) && $_FILES['uploadCSV']['error'] == 0) {

        $fileTmpPath = $_FILES['uploadCSV']['tmp_name'];
        $fileName = $_FILES['uploadCSV']['name'];
        $fileSize = $_FILES['uploadCSV']['size'];
        $fileType = $_FILES['uploadCSV']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('csv');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/admin/uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // echo "File is successfully uploaded.";
                // Process the CSV file

            } else {
                echo "There was an error moving the uploaded file.";
            }
        } else {
            echo "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
        }

        // Veldnaam secret opvangen en opslaan.
        if (isset($_POST["secret"])) {
            $secret = htmlspecialchars($_POST["secret"]);
        } else {
            $errorMessage = "Wachtwoord is niet ingevuld of ontbreekt.";
            callErrorPage($errorMessage);
        }

        // Veldnaam changeSecretAtLogon opvangen en opslaan.
        if (isset($_POST["changeSecretAtLogon"])) {
            $changeSecretAtLogon = 1;
        } else {
            $changeSecretAtLogon = 0;
        }

        // Veldnaam enabled opvangen en opslaan.
        if (isset($_POST["enabled"])) {
            $enabled = 1;
        } else {
            $enabled = 0;
        }

        // Veldnaam roleId opvangen en opslaan.
        if (isset($_POST["roleId"])) {
            $roleId = htmlspecialchars($_POST["roleId"]);
        } else {
            $errorMessage = "Id van de rol is niet ingevuld of ontbreekt.";
            callErrorPage($errorMessage);
        }

        // Veldnaam educationId opvangen en opslaan.
        if (isset($_POST["educationId"])) {
            $educationId = htmlspecialchars($_POST["educationId"]);
        } else {
            $errorMessage = "Id van de opleiding is niet ingevuld of ontbreekt.";
            callErrorPage($errorMessage);
        }

        // Veldnaam cohort opvangen en opslaan.
        if (isset($_POST["cohort"])) {
            $cohort = (int) htmlspecialchars($_POST["cohort"]);
        } else {
            $errorMessage = "Cohort is niet ingevuld of ontbreekt.";
            callErrorPage($errorMessage);
        }
    }

} else {
    $errorMessage = "De pagina is op onjuiste manier aangeroepen. Geen POST gebruikt.";
    callErrorPage($errorMessage);
}

// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren voordat een nieuwe pagina
// wordt getoond.
require $_SERVER['DOCUMENT_ROOT'] . '/models/Users.php';

if (($handle = fopen($dest_path, "r")) !== FALSE) {
    while (($studentRow = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $studentRowArray = explode(";", $studentRow[0]);

        $duoNumber = $studentRowArray[0];
        $firstName = $studentRowArray[1];
        $prefix = $studentRowArray[2];
        $lastName = $studentRowArray[3];
        $email = $studentRowArray[9];
        $phone = "";

        if (strtolower($firstName) != strtolower("roepnaam")) {
            $result = Users::insert(
                $duoNumber,
                $firstName,
                $prefix,
                $lastName,
                $secret,
                $email,
                $phone,
                $changeSecretAtLogon,
                $enabled,
                $roleId,
                $educationId,
                $cohort
            );

            // // Controleren of het gelukt is om een gebruiker toe te voegen aan de database.
            if ($result) {
                $message = "Het is gelukt om gebruikers toe te voegen.";
            } else {
                $message = "Het is niet gelukt om een nieuwe gebruiker toe te voegen.";
                callErrorPage($message);
            }
        }
    }
    fclose($handle);
}


// 4. VIEWS OPHALEN (REDIRECT)
// Er wordt hier een redirect gedaan naar het overzicht van alle gebruikers.
// Het bericht de gebruiker is toegevoegd wordt meegestuurd als variabele.
$url = "/admin/users/overview/?message=$message";
header('Location: ' . $url, true);
exit();