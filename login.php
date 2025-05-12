<?php

include("app/db/users.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/login.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Нэвтрэх</title>
</head>
<body>

    <div class="login-box">
        <img src="images/hot_goldoo_tsagaan_rounded.png" alt="">
        <form action="login" method="post">
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Нэвтрэх нэр" required>
            <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Нууц үг" required>
            <div>
                <button type="submit" name="login-btn">Нэвтрэх</button>
                <?php if (!empty($loginError)): ?>
                    <p><?php echo $loginError; ?></p>
                <?php endif; ?>
            </div>
        </form>
    </div>   

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>
</html>