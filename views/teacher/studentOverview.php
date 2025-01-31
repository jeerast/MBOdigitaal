<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require __DOCUMENTROOT__ . '/views/templates/head.php'; error_reporting(E_ERROR | E_PARSE);
    $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
    $studenten = $Studenten ;
    $results = [];
    if (!empty($searchQuery)) {
        $results = array_filter($studenten, function ($student) use ($searchQuery) {
            return stripos($student['firstName'], $searchQuery) !== false || stripos($student['klas'], $searchQuery) !== false;
        });
    };
    ?>
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
         <div class="flex justify-center">        
            <form method="GET" action="" class="flex">
            <input type="text" name="search" placeholder="Search students..." value="<?php echo htmlspecialchars($searchQuery); ?>"
                class="w-full p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="p-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600">Search</button>
        </form>
        </div>

<div class="flex justify-center">
    <div class="w-full max-w-xl p-6 bg-white rounded-lg shadow-md">   
<?php if (!empty($searchQuery)): ?>
    <div class="mt-4 text-white">
        <h2 class="text-lg font-semibold text-black">Zoekresultaat:</h2>
        <table class="w-full mt-2 border-collapse border border-gray-300">
            <thead>
            <tr class="bg-stone-800">
                <th class="px-4 py-2 text-left">Volledig naam</th>
                <th class="px-4 py-2 text-left">Voortgang</th>
                <th class="px-4 py-2 text-left">Klas</th>
            </tr>
            </thead>
            <tbody>
                <?php if (!empty($results)): ?>
                    <?php foreach ($results as $student): ?>
                        <tr class="even:bg-stone-900 odd:bg-stone-950">
                        <td class="px-4 py-2"><a class="underline">
                            <?php echo $student["firstName"];echo(" "); echo $student["lastName"]; ?>
                        </a>
                    </td>
                    <td class="px-4 py-2"><p><progress value="<?php echo $student["voortgang"]; ?>" max="100"></progress> <?php echo $student["voortgang"]; echo("%"); ?> </p></td>
                    <td class="px-4 py-2"><?php echo $student["klas"]; ?></td>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 p-2">No results found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
</div>
</div>

        <div class="flex justify-center">
            <table class="table-auto  w-1/2 bg-gray-800 text-white">
                <thead>
                    <tr class="bg-stone-800">
                        <th class="px-4 py-2 text-left">Volledig naam</th>
                        <th class="px-4 py-2 text-left">Voortgang</th>
                        <th class="px-4 py-2 text-left">Klas</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Studenten as $Student) { 
                        ?>
                        <tr class="even:bg-stone-900 odd:bg-stone-950">
                        <td class="px-4 py-2">
                                <a class="underline" href="<?php echo $newUrl ?>" >
                                    <?php echo $Student["firstName"];echo(" "); echo $Student["lastName"]; ?>
                                </a>
                            </td>
                            <td class="px-4 py-2"><p><progress value="<?php echo $Student["voortgang"]; ?>" max="100"></progress> <?php echo $Student["voortgang"]; echo("%"); ?> </p></td>
                            <td class="px-4 py-2"><?php echo $Student["klas"]; ?></td>


                                                     
                        </tr>
                        
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>





        <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>
    

</body>
</html>