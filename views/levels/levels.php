<!DOCTYPE html>
<html lang="nl">

<head>
<?php require '../views/templates/head.php' ?>
<?php  

if( isset($_POST['selectedLevel']) )
{
    $selectedLevel = $_POST['selectedLevel'];
} else {
    $selectedLevel = "0";
};?>
</head>

<body>
    <?php require '../views/templates/' . $UserRole . 'menu.php' ?>




    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto">


        <div class="w-full">
            <div class="mt-6 mx-auto px-4 rounded-md">
                <div class="p-6 text-medium text-stone-50 rounded w-full min-h-screen">
                    <h3 class="font-bold text-stone-100 dark:text-black mb-2 text-center text-5xl mb-8">Level Bepaling  </h3>
                    <div>
                        <p class="font-bold text-stone-100 dark:text-black mb-2 line-clamp-6 text-center ">Niveau Keuzes</p>

                    <div class="flex flex-row justify-center items-center ">

                            <form method="POST">

                            <input type="submit" value="1" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>
                            <input type="submit" value="2" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>
                            <input type="submit" value="3" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>
                            <input type="submit" value="4" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>
                            <input type="submit" value="5" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>
                            <input type="submit" value="6" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>
                            <input type="submit" value="7" name="selectedLevel" class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-10 h-10 m-5 active:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-neutral-400"/>

                            </form>

                        
                    </div>
                    </div>
                    <p class="mb-2 text-red-400">
                        <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
                    </p>

                    <br>
                    <table class="table-auto w-full bg-zinc-400 text-white ">
                        <thead>
                            <tr class="bg-blue-600">
                                <th class="px-4 py-2 text-left dark:text-white">Subject</th>
                                <th class="px-4 py-2 text-left dark:text-white">Level</th>
                                <th class="px-4 py-2 text-left dark:text-white">Description</th>
                                <th class="px-4 py-2 text-left dark:text-white text-center"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($selectedLevel === "1" ){
                                
                                foreach ($level_1 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }

                            } else if ($selectedLevel === "2"){
                                                                
                                foreach ($level_2 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }

                            } else if ($selectedLevel === "3"){
                                                                
                                foreach ($level_3 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }
                                
                            } else if ($selectedLevel === "4"){
                                                                
                                foreach ($level_4 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }
                                
                            } else if ($selectedLevel === "5"){
                                                                
                                foreach ($level_5 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }
                                
                            } else if ($selectedLevel === "6"){
                                                                
                                foreach ($level_6 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }
                                
                            }else if ($selectedLevel === "7"){
                                                                
                                foreach ($level_7 as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }
                                
                            } else {

                                foreach ($levels as $level) {
                                    ?>
                                    <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                                        <td class="px-4 py-2"><?php echo $level["subject"]; ?></td>
                                        <td class="px-4 py-2 "><?php echo $level["level"]; ?></td>
                                        <td class="px-4 py-2"><?php echo $level["description"]; ?></td>
                                        <td><button class="bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-full w-36 h-10 m-5">Beoordeel</button></td>
                                    </tr>
                                    <?php
                                    
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="grid content-center">
                    <button
                        class="bg-blue-950 hover:bg-green-600 text-white  font-semibold hover:text-black py-2 px-4 border border-black rounded">Submit
                        voor Level Bepaling</button>
                </div>
            </div>

        </div>
        <?php require '../views/templates/footer.php' ?>

    </div>


</body>

</html>

<!-- READ DOCENT --SELECT u.id AS student_id, u.firstName, u.lastName, l.subject, snv.bereikt FROM student_niveau_voortgang snv JOIN user u ON snv.student_id = u.id JOIN levels l ON snv.subject_id = l.id; -->

<!-- student to check subject passed --SELECT u.id AS student_id, l.subject, snv.bereikt FROM student_niveau_voortgang snv JOIN user u ON snv.student_id = u.id JOIN levels l ON snv.subject_id = l.id; -->