<?php
include("app/db/users.php");
if(session_status() == PHP_SESSION_NONE){ session_start(); }

if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){
    header("Location: login.php"); exit;
}

// Батлах
if(isset($_GET['approve'])){
    $uid = intval($_GET['approve']);
    $admin_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("UPDATE `user` SET status='active', approved_by=?, approved_at=NOW() WHERE id=?");
$admin_id = $_SESSION['user_id']; // өөрөө админ
$stmt->bind_param("ii", $admin_id, $uid);
$stmt->execute();
}

// Админ болгох
if(isset($_GET['make_admin'])){
    $uid = intval($_GET['make_admin']);
    $admin_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("UPDATE `user` SET is_admin=1, status='active', approved_by=?, approved_at=NOW() WHERE id=?");
    $stmt->bind_param("ii", $admin_id, $uid); $stmt->execute();
}

$result = $conn->query("SELECT id, username, is_admin, status, created_at FROM `user`");
?>

<!DOCTYPE html>
<html lang="mn">
<head><meta charset="UTF-8"><title>Админ самбар</title></head>
<body>
<h2>Админ самбар</h2>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Username</th><th>Admin</th><th>Status</th><th>Үйлдэл</th></tr>
<?php while($row=$result->fetch_assoc()): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo htmlspecialchars($row['username']); ?></td>
<td><?php echo $row['is_admin']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<?php if($row['status']=='pending'): ?><a href="?approve=<?php echo $row['id']; ?>">Батлах</a><?php endif; ?>
<?php if($row['is_admin']==0): ?> | <a href="?make_admin=<?php echo $row['id']; ?>">Админ болгох</a><?php endif; ?>
</td>
</tr>
<?php endwhile; ?>
</table>
<a href="logout.php">Гарах</a>
</body>
</html>
