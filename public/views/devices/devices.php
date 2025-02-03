<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/Bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php include("includes/header.php"); ?>

    <div class="m-5">
        <legend class="mb-3">Search device</legend>
        <div class="mb-3">
            <input type="text" name="search" id="search" class="form-control" autocomplete="off" style="width: 50%;">
        </div>
        <button class="btn btn-primary" onclick="searchDevice()">Search</button>
    </div>

    <table id="searchBox" class="table table-striped" style="width: 90%; margin: 15px auto;">

    </table>

    <h1 class="mx-5 mb-3">All devices</h1>
    <table class="table table-striped" style="width: 90%; margin: 15px auto;">
        <tr>
            <th>Id</th>
            <th>Client</th>
            <th>Type</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Serial number</th>
            <th>Purchase Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($devices as $device): ?>
            <tr>
                <td><?= $device['device_id'] ?></td>
                <td><?= $device['client_id'] ?></td>
                <td><?= $device['type'] ?></td>
                <td><?= $device['brand'] ?></td>
                <td><?= $device['model'] ?></td>
                <td><?= $device['serial_number'] ?></td>
                <td><?= $device['purchase_date'] ?></td>
                <td><a href="Devices.php?action=update&id=<?= $device['device_id'] ?>" class="btn btn-warning"><b>Edit</b></a></td>
                <td><a href="Devices.php?action=delete&id=<?= $device['device_id'] ?>" class="btn btn-danger"><b>Delete</b></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div id="grafico" class="grafico"></div>
    <script src="../public/Bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- HIGHCHARTS -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let datos = <?php echo json_encode($types); ?>;
        console.log(datos);
        let alldata = [];
        datos.forEach(element => {
            let di = {
                name: element['type'],
                y: parseInt(element['amount'])
            }
            alldata.push(di);
        });

        Highcharts.chart('grafico', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Types of Devices Registered'
        },
        tooltip: {
            valueSuffix: '.'
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: [{
                    enabled: true,
                    distance: 20
                }, {
                    enabled: true,
                    distance: -40,
                    format: '{point.percentage:.1f}%',
                    style: {
                        fontSize: '1.2em',
                        textOutline: 'none',
                        opacity: 0.7
                    },
                    filter: {
                        operator: '>',
                        property: 'percentage',
                        value: 10
                    }
                }]
            }
        },
        series: [
            {
                name: 'amount',
                colorByPoint: true,
                data: alldata
            }
        ]
    });
    </script>
</body>
</html>