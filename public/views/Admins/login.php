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
            height: 60vh;
            border: 1px solid white;
            border-radius: 15px;
        }

        @media screen and (max-width: 800px){
            form {
                width: 90%;
            }
        }
    </style>
    <form action="index.php?action=loginUser" method="post">
        <legend class="text-center">Welcome</legend>
        <div class="input-group mb-3">
            <span class="input-group-text">User: </span>
            <input type="text" name="user" id="user" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Password: </span>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="submit" name="submit">
    </form>
    
    <script src="../public/Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>