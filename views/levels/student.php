<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require __DOCUMENTROOT__ . '/views/templates/head.php'; error_reporting(E_ERROR | E_PARSE); ?>
</head>

<body>
    <?php require __DOCUMENTROOT__ . '/views/templates/menu/' . $Token["data"]["roleName"] .'.php'; error_reporting(E_ERROR | E_PARSE); ?>
    <?php print_r($test) ?>
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
        <!-- CHANGE TO FORM -->
        <?php
            foreach ($Results as $Result){
                ?>
                    <form action="">
                        <div class="hidden absolute center inset-0 p-16 bg-black bg-opacity-30	" id="RESULT_<?php echo $Result["educationId"];?>">
                        <h1 class="m-2 text-2xl leading-none text-gray-900 w-fit">Results</h1>
                        <table class="table-auto w-full border-collapse border border-gray-400 mb-4 mt-4">
                        <tbody>
                            <th class="border bg-gray-300 border-gray-300 px-4 py-2">Docent</th>
                            <tr>
                                <td class="border border-gray-300">
                                    <div class="w-full h-full bg-white" rows="8" cols="50"><?php echo $Result["docent"];?></div>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <th class="border bg-gray-300 border-gray-300 px-4 py-2">Student</th>
                            <tr>
                                <td class="border border-gray-300">
                                    <textarea name="DeliverableStudent" id="DeliverableStudent" class="w-full h-full" rows="8" cols="50"><?php echo $Result["student"];?></textarea>
                                </td>
                            </tr>
                        </tbody>
                        <input type="hidden" name="educationId" id="educationId" value="<?php echo $Result["educationId"];?>"/>
                        </table>
                        <div class="flex items-center py-2">
                            <button
                                class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 border-4 text-lg text-white py-1 px-6 rounded mr-8"
                                type="submit">
                                SAVE
                            </button>
                            <button type="button" onclick="closeResult(event, '<?php echo $Result['educationId'] ;?>')"
                                class="flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 border-4 text-lg text-white py-1 px-6 rounded">
                                CANCEL
                            </button>
                        </div>
                        </div>
                    </form>

                <?php
            }
            
        ?>

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
                tabcontent = document.getElementsByClassName("RESULT_");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.add("hidden");
                }
                document.getElementById("RESULT_" + tabName).classList.remove("hidden");
            }            
            function closeResult(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("RESULT_");
                // for (i = 0; i < tabcontent.length; i++) {
                //     tabcontent[i].classList.add("hidden");
                // }
                document.getElementById("RESULT_" + tabName).classList.add("hidden");
            }
            window.addEventListener('load', (event) => { document.getElementById("tab0").classList.remove("hidden"); document.getElementById("button0").classList.add("bg-gray-200"); });
        </script>
        <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>
    </div>

</body>
</html>