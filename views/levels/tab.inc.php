
<div class="flex items-center justify-between">
<h1 class="m-2 text-2xl leading-none text-gray-900 w-fit"><?php echo $ElectivesMenu[$i]["subject"] ?></h1>
</div>
<table class="table-auto w-full border-collapse border border-gray-400 mb-4 mt-4">
    <thead>
        <tr>
            <th class="border bg-gray-300 border-gray-300 px-4 py-2">Level</th>
            <th class="border bg-gray-300 border-gray-300 px-4 py-2">Omschrijving</th>
            <th class="border bg-gray-300 border-gray-300 px-4 py-2">Behaald</th>
            <th class="border bg-gray-300 border-gray-300 px-4 py-2">Result</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $level = 0;
        foreach ($Electives as $Elective){            
            if ($Elective["subject"] === $Selected){
                $temp = $Elective["id"];
                ?>
                <tr>
                <td class="border border-gray-300 px-4 py-2">
                    <div class="flex items-center justify-center">
                        <?php echo $level + 1 ?>
                    </div>
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <?php 
                        echo $Elective["description"];
                    ?>
                </td>
                <td class="border border-gray-300 px-4 py-2 w-3">
                    <div class="flex items-center justify-center">
                        <input type="checkbox" 
                        <?php 
                        echo ($ElectivesResults['educationId'] == $temp) ? 'checked' : ''; // print id only when id == 1
                        ?>>
                    </div>
                </td>
                <td class="border border-gray-300 px-0 py-0 hover:bg-gray-100 w-3">
                <button
                    class="w-1/2 text-center font-medium text-gray-700 focus:outline-none w-full"
                    onclick="openTab(event, '<?php echo $Elective['id'] ;?>')">Result</button>
                </td>
                </tr>
                <?php $level++;
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
