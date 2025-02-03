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
            width: 30%;
            height: 60vh;
            border: 1px solid white;
            border-radius: 15px;
            margin: 55px auto;
        }

        @media screen and (max-width: 800px){
            form {
                width: 90%;
            }
        }
    </style>
    <?php include("includes/header.php"); ?>
    <form action="index.php?action=createUser" method="post" class="border p-4 d-flex justify-content-center align-items-center flex-column">
        <img src="../public/img/Logo.jpg" class="img-fluid" alt="">
        <legend class="text-center">Create new Admin</legend>
        <div class="input-group mb-3">
            <span class="input-group-text">User: </span>
            <input type="text" name="user" id="user" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Password: </span>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3 text-center">
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
        </div>
    </form>
    
    <script src="../public/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>