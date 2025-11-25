<?php
include("app/db/users.php");
if(session_status() == PHP_SESSION_NONE){ session_start(); }

$username = $password = $password_conf = "";
$registerError = "";
$registerSuccess = "";

if(isset($_POST['register-btn'])){
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];

    if($password !== $password_conf){
        $registerError = "⚠️ Нууц үг таарахгүй байна.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $registerError = "⚠️ Энэ нэр ашиглагдаж байна. Өөр нэр сонгоно уу.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO user (username, password, role, status) VALUES (?, ?, 'user', 'pending')");
            $stmt->bind_param("ss", $username, $hashedPassword);

            if($stmt->execute()){
                $registerSuccess = "✅ Бүртгэл амжилттай! Админ батлах хүртэл нэвтрэх боломжгүй.";
                $username = $password = $password_conf = "";
            } else {
                $registerError = "❌ Алдаа: " . $stmt->error;
            }
        }
    }
}

if(isset($_POST['exit-btn'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Шинэ хэрэглэгч бүртгүүлэх</title>
<link rel="stylesheet" href="assets/login.css">
</head>
<body>
<div class="login-box">
    <form action="" method="post">
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Нэвтрэх нэр" required>
        <input type="password" name="password" placeholder="Шинэ нууц үг" required>
        <input type="password" name="password_conf" placeholder="Нууц үг давтах" required>
        <div>
            <button type="submit" name="register-btn">Бүртгүүлэх</button>
            <button type="submit" name="exit-btn">Буцах</button>
        </div>
        <?php if(!empty($registerError)) echo "<p style='color:red;'>$registerError</p>"; ?>
        <?php if(!empty($registerSuccess)) echo "<p style='color:green;'>$registerSuccess</p>"; ?>
    </form>
</div>
</body>
</html>
