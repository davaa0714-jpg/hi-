<?php
include("app/db/users.php");
session_start();

if(!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, display_name, created_at FROM user WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="mn">
<head><meta charset="UTF-8"><title>User Dashboard</title></head>
<body>
<h2>Тавтай морил <?php echo htmlspecialchars($row['username']); ?>!</h2>
<p>Бүртгүүлсэн огноо: <?php echo $row['created_at']; ?></p>
<a href="logout.php">Гарах</a>
</body>
</html>
