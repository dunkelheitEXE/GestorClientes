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
        <legend class="mb-3">Search client</legend>
        <div class="mb-3">
            <input type="text" name="search" id="search" class="form-control" autocomplete="off" style="width: 50%;">
        </div>
        <div class="d-flex">
            <button class="btn btn-primary mx-2" onclick="searchClients()">Search</button>
            <a href="index.php?action=create" class="btn btn-success mx-2">Create new client</a>
        </div>
    </div>

    <table id="searchBox" class="table table-striped" style="width: 90%; margin: 15px auto;">

    </table>

    <h1 class="mx-5 mb-3">All Clients</h1>
    <table class="table table-striped" style="width: 90%; margin: 15px auto;">
        <tr>
            <th>Id</th>
            <th>Client Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($clients as $client): ?>
            <tr>
                <td><?= $client['client_id'] ?></td>
                <td><?= $client['name'] ?></td>
                <td><?= $client['address'] ?></td>
                <td><?= $client['phone'] ?></td>
                <td><?= $client['email'] ?></td>
                <td><a href="index.php?action=edit&id=<?= $client['client_id'] ?>" class="btn btn-warning"><b>Edit</b></a></td>
                <td><a href="index.php?action=delete&id=<?= $client['client_id'] ?>" class="btn btn-danger"><b>Delete</b></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="../public/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function searchClients() {
            const query = document.getElementById("search").value;
            const resultsTable = document.getElementById("searchBox");

            fetch(`index.php?action=search&query=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => {
                resultsTable.innerHTML = data;
            })
            .catch(error => {
                console.log("error: " + error);
            })
        }
    </script>
</body>
</html>