<!DOCTYPE html>
<html lang="nl">

<head>
<?php require __DOCUMENTROOT__ . '/views/templates/head.php'; error_reporting(E_ERROR | E_PARSE); ?>
</head>

<body>
<?php require __DOCUMENTROOT__ . '/views/templates/menu/' . $Token["data"]["roleName"] .'.php'; error_reporting(E_ERROR | E_PARSE); ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white rounded-lg dark:bg-gray-800 mx-auto">

        <h2 class="text-2xl font-bold dark:text-white">Foutmelding</h2>
        <p class="my-4 font-bold text-gray-700"><?php echo $errorMessage;?></p>
        <p class="mb-4 font-normal text-gray-700 dark:text-gray-500">Probeer het nog een keer opnieuw. Als u deze foutmelding blijft krijgen, neem dan contactop met de administrator.</p>

        <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>

    
    </div>


</body>

</html>