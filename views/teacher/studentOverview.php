<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require __DOCUMENTROOT__ . '/views/templates/head.php'; error_reporting(E_ERROR | E_PARSE); ?>
</head>

<body>
    <?php require __DOCUMENTROOT__ . '/views/templates/menu/' . $Token["data"]["roleName"] .'.php'; error_reporting(E_ERROR | E_PARSE); ?>

    <!-- <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto">
        <h2 class="text-2xl font-bold dark:text-black">Levels - Student</h2>
        <div class="w-full">
            <div class="flex border-b border-gray-300 mb-8">
            </div>
        </div> -->
        <!-- CHANGE TO FORM -->
        <table class="table-auto w-full bg-gray-800 text-white">
                <thead>
                    <tr class="bg-stone-800">
                        <th class="px-4 py-2 text-left">Subject</th>
                        <th class="px-4 py-2 text-left">Level</th>
                        <th class="px-4 py-2 text-left">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Studenten as $Student) {
                        ?>
                        <tr class="even:bg-stone-900 odd:bg-stone-950">
                            <td class="px-4 py-2"><?php echo $Student["firstName"]; ?></td>
                            <td class="px-4 py-2"><?php echo $Student["lastName"]; ?></td>                         
                        </tr>
                        
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>
    </div>

</body>
</html>