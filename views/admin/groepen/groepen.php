<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/templates/head.php';

            ?>
</head>

<body class="bg-stone-950">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/templates/topbar.php' ?>

    <div class="mt-6 mx-auto px-4 bg-stone-950">
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/templates/menu.php' ?>
        <div class="p-6 text-medium text-stone-50 rounded w-full min-h-screen">
            <h3 class="text-lg font-bold text-stone-100 text-white mb-2">Groepen</h3>
            <p class="mb-2 text-red-400">
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
            </p>
            <!-- KORDA KAMBIE BOTTON PA EDIT LEVEL SEEMS LIKE ACTION=ONCLICK -->
             <div class="flex space-x-4">
            <form method="POST" action="<?php echo $newUrl ?>">
                <button
                    class="mt-6 shadow bg-stone-700 hover:bg-stone-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                    Groepen Beheren
                </button>
            </form>
            </div>
            <br>
            <table class="table-auto w-full bg-gray-800 text-white">
                <thead>
                    <tr class="bg-stone-800">
                        <th class="px-4 py-2 text-left">Klas</th>
                        <th class="px-4 py-2 text-left">Naam</th>
                        <th class="px-4 py-2 text-left">Achternaam</th>
                        <th class="px-4 py-2 text-left">Groep</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        ?>
                        <tr class="even:bg-stone-900 odd:bg-stone-950">
                            <td class="px-4 py-2"><?php echo $user["klas"]; ?></td>
                            <td class="px-4 py-2"><?php echo $user["firstName"]; ?></td>
                            <td class="px-4 py-2"><?php echo $user["lastName"]; ?></td>
                            <td class="px-4 py-2"><?php echo $user["Groep"] ; ?></td>
                           
                        </tr>
                        
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>