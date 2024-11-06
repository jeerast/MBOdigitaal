<!DOCTYPE HTML>
<html>
    <head>
    <?php require __DOCUMENTROOT__ . '/views/templates/head.php'; error_reporting(E_ERROR | E_PARSE); ?>
    </head>
    <body>
    <?php require __DOCUMENTROOT__ . '/views/templates/menu/' . $Token["data"]["roleName"] .'.php'; error_reporting(E_ERROR | E_PARSE); ?>
        <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto">
            <div class="max-w-4xl max-h-4xl">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'radar',
  data: {
    labels: ['Realiseert Software', 'Generieke onderdelen RE', 'Generieke onderdelen NE', 'Generieke onderdelen EN', 'Generieke onderdelen LB', 'Generieke onderdelen BS', 'Gedrag', 'Werken in een ontwikkenteam'],
    datasets: [{
      label: 'Your Level',
      data: [2, 2, 3, 4, 5, 6, 7, 8],
      borderWidth: 1
    }]
  }
});
        </script>
                <?php require __DOCUMENTROOT__ . '/views/templates/footer.php' ?>

    </body>
</html>     
