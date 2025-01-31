
<div class="flex items-center justify-between">
<h1 class="m-2 text-2xl leading-none text-gray-900 w-fit"><?php echo $Subject["name"] ?></h1>
</div>
<table class="table-auto w-full border-collapse mb-4 mt-4">
    <thead>
        <tr>
            <th class="rounded-l-lg text-white bg-blue-600 px-4 py-2">Level</th>
            <th class="text-white bg-blue-600 px-4 py-2">Omschrijving</th>
            <th class="text-white bg-blue-600 px-4 py-2">Behaald</th>
            <th class="rounded-r-lg text-white bg-blue-600 px-4 py-2">Result</th>
        </tr>
    </thead>
    <tbody>
    <?php
    
        $num = 1;
        foreach ($Levels as $Level){   
            if ($Level["subject"] === $Subject["name"]){


                ?>
                <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                <td class=" text-black px-4 py-2 w-1">
                    <div class="flex items-center justify-center">
                        <?php echo $num++ ?>
                    </div>
                </td>
                <td class="px-4 py-2">
                    <?php 
                        echo $Level["description"];
                    ?>
                </td>
                <td class="px-4 py-2 w-3">
                    <div class="flex items-center justify-center">
                        <input disabled type="checkbox"
                        <?php
                            foreach ($Results as $Result){
                                echo $Result;
                                if ($Result == $Level["subject"]){
                                    echo "Checked";
                                }
                            };
                        ?>>
                    </div>
                </td>
                <td class="px-0 py-0 hover:bg-gray-100 w-3">
                <button
                    class="w-1/2 text-center font-medium text-gray-700 focus:outline-none w-full"
                    onclick="openResult(event, '<?php echo $Level['id'] ;?>')">EDIT</button>
                </td>
                </tr>
   
                <?php
                };
            }
        ?>
    </tbody>
</table>