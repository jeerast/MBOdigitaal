<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/templates/head.php' ;

        if (empty($_GET['variable1'])) {
            $subject="";
            $desc="";
            $levelNummer="";


        } else{
            $subject=$_GET['variable2'];
            $desc=$_GET['variable3'];
            $levelNummer=$_GET['variable1'];

  
        }
    // echo "<script>console.log('" . json_encode($levelNummer) . "');</script>";
    // echo "<script>console.log('" . json_encode($subject) . "');</script>";
    // echo "<script>console.log('" . json_encode($desc) . "');</script>";


    ?>
</head>

<body class="bg-stone-950">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/templates/topbar.php' ?>

    <div class="mt-6 mx-auto px-4 bg-stone-950">
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/templates/menu.php' ?>
        <div class="p-6 text-medium text-stone-50 rounded w-full md:w-3/5 lg:w-2/5 min-h-screen">
            <h3 class="text-lg font-bold text-stone-100 text-white mb-2">Level Bijwerken</h3>
            <p class="mb-2"></p>
            <br>
            <form method="POST" action="level.php" class="w-full">
                <input type="hidden" name="id" value="<?php echo isset($idValue) ? $idValue : "" ?>">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                            Subject
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="name" 
                            name="name" 
                            type="text"
                            value="<?php echo strval( $subject )  ;?>">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="level">
                            Level
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="level" 
                            name="level" 
                            type="Number" 
                            min="1" 
                            max="7"
                            value=<?php echo $levelNummer ;?>>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                            Description
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <textarea rows="5" cols="60" name="description"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            placeholder=""><?php echo strval($desc) ;?></textarea>
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <input
                            class="shadow bg-stone-700 hover:bg-stone-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit"
                            value="Bijwerken">
                            </input>
                        <button
                            class="shadow bg-stone-700 hover:bg-stone-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="reset"
                            onclick="window.location='/admin/levels/overview';return false;">
                            Annuleren
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>

</html>