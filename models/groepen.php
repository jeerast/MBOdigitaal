<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/docroot.php';
require_once __DOCUMENTROOT__ . '/config/globalvars.php';
require_once __DOCUMENTROOT__ . '/errors/default.php';
require_once __DOCUMENTROOT__ . '/database/dbconnection.php';
require_once __DOCUMENTROOT__ . '/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class groepen
{
    // insert voegt één nieuwe opleiding toe aan de tabel education.
    // Er wordt een UUIDv4 gegeneert als unieke ID.
    // Deze UUID wordt opgeslagen string (niet de snelste methode).
    public static function insert(
        $creboNumber,
        $name,
        $level,
        $description,
        $registerUntil,
        $graduateUntil
    ) {
        global $db;

        // Generate a version 4 (random) UUID
        $educationId = Uuid::uuid4();

        $sql_insert_into_education = "INSERT INTO education (id, creboNumber, name, level, description, registerUntil, graduateUntil)
        VALUES (?, ?, ?, ?, ?, ?, ?);";

        $stmt = $db->prepare($sql_insert_into_education);

        if (
            $stmt->execute([
                $educationId,
                $creboNumber,
                $name,
                $level,
                $description,
                $registerUntil == "" ? null : $registerUntil,
                $graduateUntil == "" ? null : $graduateUntil
            ])
        ) {
            return true;
        } else {
            return false;
        }
    }

    // select selecteert één opleiding op basis van een gegeven id.
    // Er wordt een associative array ($education["id"]) van de opleiding gereturneerd.
    public static function select($id)
    {
        global $db;

        $sql_select_educations_by_id = "SELECT * FROM education WHERE id=?;";

        $stmt = $db->prepare($sql_select_educations_by_id);

        if ($stmt->execute([$id])) {
            $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($educations as $education) {
                return $education;
            }
        }
    }

    // selectAll selecteert alle opleidingen geordend op creboNumber.
    // Er wordt een associative array met meerdere rijen gereturneerd.
    public static function selectAll()
    {
        global $db;
        global $users;

        $sql_selectAll_users = "SELECT groeps.klas, user.firstName, user.lastName, groepen_desc.groep_desc AS Groep FROM user INNER JOIN groeps ON user.id = groeps.user_id INNER JOIN groepen_desc ON groeps.groep = groepen_desc.id;";

        $stmt = $db->prepare($sql_selectAll_users); 

        if ($stmt->execute()) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
    }

    public static function updateCurrentLevel($levelValue ,$subjectValue, $descriptionValue)     {
        global $db;

        $sql_update_level = "UPDATE `levels` SET `description`='$descriptionValue' WHERE `subject`='$subjectValue' AND `level`='$levelValue';";
        
        

        $stmt = $db->prepare( $sql_update_level );

        if ($stmt->execute()) {
            $levelUpdated = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $levelUpdated;
        }


    }

    public static function selectCurrentLevel($levelValue ,$subjectValue,)
    {
        global $db;

        $sql_select_Current_levels = "SELECT * FROM `levels` WHERE level = '$levelValue' AND subject = '$subjectValue';";
        

        $stmt = $db->prepare( $sql_select_Current_levels);

        if ($stmt->execute()) {
            $currentLevel = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $currentLevel;
        }


    }

    // delete verwijdert een record uit de tabel education met een bepaald id.
    // De functie returneert true als dit gelukt is en false als dit niet gelukt is.
    public static function delete($id)
    {
        global $db;

        $sql_delete_education_by_id = "DELETE FROM education WHERE id=?;";
        $stmt = $db->prepare($sql_delete_education_by_id);
        if ($stmt->execute([$id])) {
            
            return true;
        } else {
            return false;
        }
    }


    
}