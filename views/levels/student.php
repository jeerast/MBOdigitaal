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
            window.addEventListener('load', (event) => { document.getElementById("tab0").classList.remove("hidden"); document.getElementById("button0").classList.add("bg-gray-200"); });
        </script>
        <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>
    </div>

</body>
</html>