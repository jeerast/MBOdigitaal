<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require __DOCUMENTROOT__ . '/views/templates/head.php'; error_reporting(E_ERROR | E_PARSE); ?>
</head>

<body>
    <?php require __DOCUMENTROOT__ . '/views/templates/menu/' . $Token["data"]["roleName"] .'.php'; error_reporting(E_ERROR | E_PARSE); ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto">
        <h2 class="text-2xl font-bold dark:text-black">Levels - Student</h2>
        <div class="w-full">
            <div class="flex border-b border-gray-300 mb-8">
                <?php
                $i = 0;
                foreach ($Subjects as $Subject) {
                    ?>
                    <button id="button<?php echo $i; ?>"
                        class="w-1/2 py-4 text-center font-medium text-gray-700 bg-gray-100 focus:outline-none active:bg-gray-200"
                        onclick="openTab(event, '<?php echo $i++; ?>')"><?php echo $Subject["name"]; ?></button>
                    <?php
                }
                ?>
            </div>
            <?php
            $i = 0;
            foreach ($Subjects as $Subject) {
                ?>
                <div id="tab<?php echo $i++; ?>" class="tabcontent hidden">
                    <?php require 'tab.inc.php' ?>
                </div>
                <?php
            }
            ?>
        </div>
       <!--  -->
        <!-- <h1 class="m-2 text-2xl leading-none text-gray-900 w-fit">Results</h1>
        <table class="table-auto w-full border-collapse border border-gray-400 mb-4 mt-4">
            <thead>
                <tr>
                    <th class="border bg-gray-300 border-gray-300 px-4 py-2">Your results</th>
                </tr>
            </thead>
            <tbody>
                <tr class="h-64">
                    <td class="border border-gray-300 px-4 py-2">
                    <textarea class="h-64 w-full" id="meow" name="meow" style="resize: vertical; overflow: auto;">I am level 3 because I am very good at stuff</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex flex-row float-right mb-4 items-center">
            <p class="mr-8">upload files:</p>
            <form class="flex flex-row items-center" action="file-upload.php" method="post" enctype="multipart/form-data">
            <input name="userfile[]" type="file" />
            <input class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 border-4 text-lg text-white py-1 px-6 rounded" type="submit" value="Save" />
            </form>
        </div>
        <table class="table-auto w-full border-collapse border border-gray-400 mb-4 mt-4">
            <thead>
                <tr>
                    <th class="border bg-gray-300 border-gray-300 px-4 py-2">Reply</th>
                </tr>
            </thead>
            <tbody>
                <tr class="h-64">
                    <td class="border border-gray-300 px-4 py-2">
                    <textarea class="h-64 w-full" id="meow" name="meow" style="resize: vertical; overflow: auto;">You are indeed very good at stuff</textarea>
                </td>
                </tr>
            </tbody>
        </table> -->
        <!--  -->
        <!-- <?php print_r($Results); ?>  -->

        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.add("hidden");
                }
                tablinks = document.getElementsByTagName("button");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("bg-gray-200");
                }
                document.getElementById("tab" + tabName).classList.remove("hidden");
                document.getElementById("button" + tabName).classList.add("bg-gray-200");

            }
            function openResult(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("result");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.add("hidden");
                }
                document.getElementById("result0" + tabName).classList.remove("hidden");
                document.getElementById("result1" + tabName).classList.remove("hidden");
            }
            window.addEventListener('load', (event) => { document.getElementById("tab0").classList.remove("hidden"); document.getElementById("button0").classList.add("bg-gray-200"); });
        </script>
        <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>
    </div>

</body>
</html>