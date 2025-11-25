<?php
session_start();
include("../app/db/connect.php"); // MySQL холболт

// Нэвтэрсэн хэрэглэгчийн мэдээлэл
$user_id = $_SESSION['user_id'] ?? 0;

// POST шалгах
$success_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'] ?? '';
    $new_display_name = $_POST['display_name'] ?? '';
    $new_password = $_POST['password'] ?? '';

    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("
            UPDATE `user` 
            SET 
                username = ?, 
                display_name = ?, 
                password = ?, 
                is_admin = 1, 
                role = 'admin', 
                approved_by = ?, 
                approved_at = NOW(), 
                status = 'active'
            WHERE id = ?
        ");
        $stmt->bind_param("sssii", $new_username, $new_display_name, $hashed_password, $user_id, $user_id);
    } else {
        $stmt = $conn->prepare("
            UPDATE `user` 
            SET 
                username = ?, 
                display_name = ?, 
                is_admin = 1, 
                role = 'admin', 
                approved_by = ?, 
                approved_at = NOW(), 
                status = 'active'
            WHERE id = ?
        ");
        $stmt->bind_param("siii", $new_username, $new_display_name, $user_id, $user_id);
    }

    if ($stmt->execute()) {
        $success_msg = "Амжилттай хадгаллаа!";
        $_SESSION['username'] = $new_username;
        $_SESSION['display_name'] = $new_display_name;
    } else {
        $success_msg = "Алдаа гарлаа: " . $stmt->error;
    }
}

// Form-д харуулах утгууд
$username = $_SESSION['username'] ?? "Admin";
$display_name = $_SESSION['display_name'] ?? "Super Admin";

?>

<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Тохиргоо</title>
<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="navbar">
    <div class="nav-1">
        <img src="logo.png" alt="Logo">
    </div>
    <div class="greeting">
        <span>Сайн уу,</span>
        <p>&nbsp;<?php echo htmlspecialchars($username); ?> 👋</p>
    </div>
    <ul class="nav-list">
        <li><a href="dashboard.php">Хянах</a></li>
        <li><a href="users.php">Хэрэглэгчид</a></li>
        <li><a href="posts.php">Постууд</a></li>
        <li><a href="logout.php"><i class="fa-solid fa-circle-user"></i></a></li>
    </ul>
</div>

<div class="wrapper">
    <div class="sidebar">
        <ul>
            <li><a href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Хянах самбар</a></li>
            <li><a href="users.php"><i class="fa-solid fa-users"></i> Хэрэглэгчид</a></li>
            <li><a href="posts.php"><i class="fa-solid fa-file-lines"></i> Постууд</a></li>
            <li class="active"><a href="settings.php"><i class="fa-solid fa-gear"></i> Тохиргоо</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Гарах</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="content-wrapper">
            <h1>Хэрэглэгчийн тохиргоо</h1>

            <?php if(!empty($success_msg)): ?>
                <div style="padding:10px; background:#d4edda; color:#155724; margin-bottom:15px; border-radius:5px;">
                    <?php echo $success_msg; ?>
                </div>
            <?php endif; ?>

            <div class="dash-box" style="padding:25px; max-width:600px;">
                <form action="" method="POST">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

                    <label>Display Name</label>
                    <input type="text" name="display_name" value="<?php echo htmlspecialchars($display_name); ?>" required>

                    <label>New Password</label>
                    <input type="password" name="password" placeholder="Шинэ нууц үг">

                    <button type="submit" name="update-btn">Хадгалах</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
