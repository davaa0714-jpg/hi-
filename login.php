<?php
include("app/db/users.php");
if(session_status() == PHP_SESSION_NONE){
    session_set_cookie_params(['path' => '/']); // session эхлэхээс өмнө
    session_start();
}

$loginError = "";
$username = "";

if(isset($_POST['login-btn'])){
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Хэрэглэгчийг авах
    $stmt = $conn->prepare("SELECT id, password, role, status FROM `user` WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($row = $result->fetch_assoc()){
        if(password_verify($password, $row['password'])){
            
            if($row['status'] === 'active'){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $username;

                // Туршилт (display session)
                // echo '<pre>'; print_r($_SESSION); die();

                // Админ эсэхийг шалгах
                if(strtolower($row['role']) === 'admin'){
                    header("Location: news-admin.php");
                    exit;
                } else {
                    header("Location: user_dashboard.php");
                    exit;
                }
            } else if($row['status'] === 'pending'){
                $loginError = "⚠️ Таны бүртгэл батлагдаагүй байна. Админ батлах хүртэл нэвтрэх боломжгүй.";
            } else if($row['status'] === 'disabled'){
                $loginError = "⚠️ Таны бүртгэл идэвхгүй болсон байна. Админтай холбогдоно уу.";
            }

        } else {
            $loginError = "❌ Нууц үг буруу байна.";
        }
    } else {
        $loginError = "❌ Ийм хэрэглэгч олдсонгүй.";
    }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Нэвтрэх</title>
<link rel="stylesheet" href="assets/login.css">
</head>
<body>
<div class="login-box">
    <form action="" method="post">
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Нэвтрэх нэр" required>
        <input type="password" name="password" placeholder="Нууц үг" required>
        <div>
            <button type="submit" name="login-btn">Нэвтрэх</button>
            <a href="register.php" class="btn">БҮРТГҮҮЛЭХ</a>
        </div>
        <?php if(!empty($loginError)) echo "<p style='color:red;'>$loginError</p>"; ?>
    </form>
</div>
</body>
</html>
