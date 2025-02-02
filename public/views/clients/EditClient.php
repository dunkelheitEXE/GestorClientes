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
    <form action="index.php?action=update&id=<?= $_GET['id'] ?>" method="post">
        <legend class="text-center">Client Creator</legend>
        <div class="mb-3">
            <label for="name" class="form-label">Client's name (Company or person)</label>
            <input type="text" name="name" id="name" value="<?= $client['name'] ?>" class="form-control" autocomplete="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Physical address</label>
            <input type="text" name="address" id="address" value="<?= $client['address'] ?>" class="form-control" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone number</label>
            <input type="text" name="phone" id="phone" value="<?= $client['phone'] ?>" class="form-control" maxlength="10" required pattern="{10,10}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="<?= $client['email'] ?>" class="form-control" autocomplete="email" required>
        </div>
        <div class="mb-3 text-center">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </div>
    </form>
    <script src="../public/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>