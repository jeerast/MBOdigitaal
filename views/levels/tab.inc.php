
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
                <tr>
                <tr class="even:bg-slate-200 text-black odd:bg-slate-300 rounded-md">
                <td class=" text-black px-4 py-2">

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
                        <input type="checkbox" 
                        <?php 
                        // echo ($LevelsResults['educationId'] == $Level["id"]) ? 'checked' : ''; // print id only when id == 1
                        // echo ($ElectivesResults['educationId'] == $temp) ? 'checked' : ''; // print id only when id == 1
                        ?>>
                    </div>
                </td>
                <td class="px-0 py-0 hover:bg-gray-100 w-3">
                <button
                    class="w-1/2 text-center font-medium text-gray-700 focus:outline-none w-full"
                    onclick="openTab(event, '<?php echo $Level['id'] ;?>')">Result</button>
                </td>
                </tr>
                <?php
                };
            }
        ?>
    </tbody>
</table>
    <div class=" items-center justify-between">
        <form method="GET" action="/admin/auth/login" class="max-w-sm float-right">
            <div class="flex items-center py-2">
                <button
                    class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 border-4 text-lg text-white py-1 px-6 rounded"
                    type="submit">
                    SAVE
                </button>
            </div>
        </form>
    </div>
