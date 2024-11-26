<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/docroot.php';
require_once __DOCUMENTROOT__ . '/config/globalvars.php';
require_once __DOCUMENTROOT__ . '/errors/default.php';
require_once __DOCUMENTROOT__ . '/database/dbconnection.php';
require_once __DOCUMENTROOT__ . '/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Education
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

        $sql_selectAll_educations = "SELECT * FROM education ORDER by creboNumber;";

        $stmt = $db->prepare($sql_selectAll_educations);

        if ($stmt->execute()) {
            $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $educations;
        }
        
    }

    public static function selectAllDeliverables($UserId)
        {
            global $db;
<<<<<<< Updated upstream
            $sql_selectAll_levels_from_user = "SELECT * FROM `deliverables` WHERE `id` = ?;";
            $stmt = $db->prepare($sql_selectAll_levels_from_user);
=======
            // global $education_id;

            $sql_select_educations_by_id = "SELECT education.* FROM user JOIN education ON user.educationId = education.id WHERE user.id =?;";
            $stmt = $db->prepare($sql_select_educations_by_id);
>>>>>>> Stashed changes

            
            if ($stmt->execute([$UserId])) {
                $levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($levels as $level) {
                    return $level;
                }
            }
            // return $education_id;
        }
    // gets all subjects for the selected education
    public static function selectAllSubjects($EducationId) {
        global $db;
        $sql_selectAll_subjects = "SELECT `name` FROM `subjects` WHERE `educationID` = ?;";
        $stmt = $db->prepare($sql_selectAll_subjects);

<<<<<<< Updated upstream
        if ($stmt->execute([$EducationId])) {
            $Subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Subjects;
            // put the LIKE in a var in the request so its dynamic
        $sql_selectAll_levels = "SELECT `subject` FROM `levels` WHERE `educationid` = '$EducationID' AND `level` = 1 ";
        $stmt = $db->prepare($sql_selectAll_levels);

        if ($stmt->execute()) {
            $Electives = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Electives;
>>>>>>> Stashed changes
        }    
    }

    // Get all elctive information
    public static function selectAllLevels($EducationId)
    {
        global $db;
        $sql_selectAll_levels = "SELECT * FROM `levels` WHERE `educationID` = ?;";
        $stmt = $db->prepare($sql_selectAll_levels);

<<<<<<< Updated upstream
        if ($stmt->execute([$EducationId])) {
            $Levels = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Levels;
=======
        $sql_selectAll_educations = "SELECT * FROM levels WHERE `educationid` = '$EducationID';";

        $stmt = $db->prepare($sql_selectAll_educations);

        if ($stmt->execute()) {
            $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $educations;
>>>>>>> Stashed changes
        }
    }
    // update werkt de informatie van een record van een bepaalde id bij.
    // De functie returneerd true als dit gelukt is en false als het niet
    // gelukt is.
    public static function update(
        $id,
        $creboNumber,
        $name,
        $level,
        $description,
        $registerUntil,
        $graduateUntil
    ) {
        global $db;

        $sql_update_education_by_id = "UPDATE education
        SET creboNumber=?, name=?, level=?, description=?, registerUntil=?, graduateUntil=?
        WHERE id=?";

        $stmt = $db->prepare($sql_update_education_by_id);

        if (
            $stmt->execute([
                $creboNumber,
                $name,
                $level,
                $description,
                $registerUntil == "" ? null : $registerUntil,
                $graduateUntil == "" ? null : $graduateUntil,
                $id
            ])
        ) {
            return true;
        } else {
            return false;
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