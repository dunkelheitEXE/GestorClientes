<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/Bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <style>
        form {
            width: 40%;
            margin: 20px auto;
        }

        @media screen and (max-width: 800px) {
            form {
                width: 95%;
            }
        }
    </style>
    <?php include("includes/header.php") ?>
    <form action="Devices.php?action=create" method="post">
        <legend class="text-center">Client Creator</legend>
        <div class="mb-3">
            <label for="client" class="form-label">Client's name (Company or person)</label>
            <select name="client" id="client" class="form-select">
                <option selected>Select a Client</option>
                <?php foreach($available as $client): ?>
                    <option value="<?= $client['client_id'] ?>"><?= $client['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select">
                <option selected>Select an option</option>
                <option value="pc">Personal Computer (PC)</option>
                <option value="laptop">Laptop</option>
                <option value="server">Server</option>
                <option value="tablet">Tablet</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" id="model" class="form-control" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="serial" class="form-label">Serial Number</label>
            <input type="text" name="serial" id="serial" class="form-control" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Purchase Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="mb-3 text-center">
            <input type="submit" value="Submit" name="submit" class="btn btn-success">
        </div>
    </form>
    <script src="../public/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>