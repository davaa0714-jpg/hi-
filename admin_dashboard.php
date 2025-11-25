<?php
// ← users.php замыг зөв болгоорой!
include(__DIR__ . "/../app/db/users.php");

session_start();

// Админ эсэхийг шалгах
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Админ мэдээлэл авах
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT username, display_name, created_at FROM `user` WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<title>Админ Dashboard</title>
</head>
<body>

<h2>Сайн байна уу, <?php echo htmlspecialchars($row['username']); ?> (Админ)!</h2>
<p>Бүртгүүлсэн огноо: <?php echo $row['created_at']; ?></p>

<!-- Админ үйлдлүүд -->
<a href="manage_users.php">Хэрэглэгчдийг удирдах</a><br>
<a href="logout.php">Гарах</a>

</body>
</html>
