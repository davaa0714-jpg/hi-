<?php
include("../app/db/users.php");

// Анхны утгууд
$departments = [];
$contact_info = [];
$staff_by_dept = [];

// == ХЭЛТЭС НЭМЭХ ==
if (isset($_POST['add_department'])) {
    $name = trim($_POST['dept_name']);
    $order_index = intval($_POST['order_index']);
    
    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO departments (name, order_index) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("si", $name, $order_index);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Хэлтэс амжилттай нэмэгдлээ";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Алдаа гарлаа: " . $stmt->error;
                $_SESSION['message_type'] = "error";
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "SQL бэлтгэх алдаа: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
    }
}

// == АЖИЛТАН НЭМЭХ ==
if (isset($_POST['add_staff'])) {
    $department_id = intval($_POST['department_id']);
    $position = trim($_POST['position']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $order_index = intval($_POST['order_index']);
    
    if (!empty($position) && !empty($name)) {
        $stmt = $conn->prepare("INSERT INTO staff (department_id, position, name, phone, email, order_index) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("issssi", $department_id, $position, $name, $phone, $email, $order_index);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Ажилтан амжилттай нэмэгдлээ";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Алдаа гарлаа: " . $stmt->error;
                $_SESSION['message_type'] = "error";
            }
            $stmt->close();
        } else {
            $_SESSION['message'] = "SQL бэлтгэх алдаа: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
    }
}

// == ХОЛБОО БАРИХ МЭДЭЭЛЭЛ ШИНЭЧЛЭХ ==
if (isset($_POST['update_contact_info'])) {
    foreach ($_POST['contact_info'] as $id => $data) {
        $stmt = $conn->prepare("UPDATE contact_info SET label = ?, value = ?, icon_class = ?, order_index = ? WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("sssii", $data['label'], $data['value'], $data['icon_class'], $data['order_index'], $id);
            $stmt->execute();
            $stmt->close();
        }
    }
    $_SESSION['message'] = "Мэдээлэл амжилттай шинэчлэгдлээ";
    $_SESSION['message_type'] = "success";
}

// == ХЭЛТЭС УСТГАХ ==
if (isset($_GET['delete_dept'])) {
    $id = intval($_GET['delete_dept']);
    $stmt = $conn->prepare("DELETE FROM departments WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Хэлтэс амжилттай устгагдлаа";
            $_SESSION['message_type'] = "success";
        }
        $stmt->close();
    }
}

// == АЖИЛТАН УСТГАХ ==
if (isset($_GET['delete_staff'])) {
    $id = intval($_GET['delete_staff']);
    $stmt = $conn->prepare("DELETE FROM staff WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Ажилтан амжилттай устгагдлаа";
            $_SESSION['message_type'] = "success";
        }
        $stmt->close();
    }
}

// == МЭДЭЭЛЭЛ АВАХ ==
try {
    // Холбоо барих мэдээлэл
    $contact_result = $conn->query("SELECT * FROM contact_info ORDER BY order_index");
    if ($contact_result && $contact_result->num_rows > 0) {
        $contact_info = $contact_result->fetch_all(MYSQLI_ASSOC);
    } else {
        // Анхны өгөгдөл оруулах (хэрэв хоосон бол)
        $default_contact_info = [
            ['type' => 'phone', 'label' => 'Утас', 'value' => '+976 7011-8040', 'icon_class' => 'fas fa-mobile-alt', 'order_index' => 1],
        ];
        
        foreach ($default_contact_info as $info) {
            $stmt = $conn->prepare("INSERT INTO contact_info (type, label, value, icon_class, order_index) VALUES (?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssssi", $info['type'], $info['label'], $info['value'], $info['icon_class'], $info['order_index']);
                $stmt->execute();
                $stmt->close();
            }
        }
        
        // Дахин ачаалах
        $contact_result = $conn->query("SELECT * FROM contact_info ORDER BY order_index");
        if ($contact_result) {
            $contact_info = $contact_result->fetch_all(MYSQLI_ASSOC);
        }
    }

    // Хэлтсүүд
    $dept_result = $conn->query("SELECT * FROM departments ORDER BY order_index, name");
    if ($dept_result && $dept_result->num_rows > 0) {
        $departments = $dept_result->fetch_all(MYSQLI_ASSOC);
        
        // Хэлтэс бүрийн ажилтнуудыг авах
        foreach ($departments as $dept) {
            $staff_result = $conn->query("SELECT * FROM staff WHERE department_id = {$dept['id']} ORDER BY order_index, position");
            if ($staff_result && $staff_result->num_rows > 0) {
                $staff_by_dept[$dept['id']] = $staff_result->fetch_all(MYSQLI_ASSOC);
            } else {
                $staff_by_dept[$dept['id']] = [];
            }
        }
    } else {
        $departments = []; // Хоосон массив болгох
    }
    
} catch (Exception $e) {
    error_log("Database query error: " . $e->getMessage());
    $_SESSION['message'] = "Өгөгдлийн сангийн алдаа: " . $e->getMessage();
    $_SESSION['message_type'] = "error";
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
    <title>Админ | Холбоо барих</title>
    <style>
        .contact-admin {
            padding: 20px;
        }
        .section-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }
        .department-section {
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .staff-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .staff-table th, .staff-table td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .staff-table th {
            background: #e9ecef;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-sm { padding: 4px 8px; font-size: 12px; }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .message.success { background: #d4edda; color: #155724; }
        .message.error { background: #f8d7da; color: #721c24; }
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>
<body>

<section id="header">
    <div class="header container">
        <nav class="navbar">
            <div class="nav-1">
                <a href="index.html"><img src="../images/hot_goldoo_tsagaan_rounded.png" class="logo"></a>
            </div>
            <ul class="nav-list">
                <li>
                    <a href="#"><i class="fa-solid fa-circle-user"></i></a>
                    <?php if (isset($_SESSION['id'])): ?>
                        <ul class="user-op">
                            <p class="name"><?php echo $_SESSION['username']; ?></p>
                            <li><a href="<?php echo '../logout' ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                        </ul>
                    <?php endif ?>
                </li>
            </ul>
        </nav>
    </div>
</section>

<section class="wrapper">
    <div class="sidebar">
         <ul>
                <a href="dashboard.php"><li>Хянах самбар</li></a>
                <a href="news-admin"><li>Мэдээ</li></a>
                <a href="standard-admin"><li>Стандарт</li></a>
                <a href="commission-admin"><li>Комиссын хуваарь</li></a>
                <a href="contact-admin.php"><li>Холбоо барих</li></a>
                <a href="aboutus-admin"><li>Бидний тухай</li></a>
             
        </ul>
    </div>

    <div class="content">
        <div class="content-wrapper contact-admin">
            <h1>Холбоо барих мэдээлэл</h1>
            
            <?php if (isset($_SESSION['message'])): ?>
                <div class="message <?php echo $_SESSION['message_type'] ?? 'success'; ?>">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
                </div>
            <?php endif; ?>

            <!-- Үндсэн мэдээлэл -->
            <div class="section-card">
                <h3>Үндсэн мэдээлэл</h3>
                <form method="POST">
                    <input type="hidden" name="update_contact_info" value="1">
                    <div class="form-grid">
                        <?php if (!empty($contact_info)): ?>
                            <?php foreach ($contact_info as $info): ?>
                                <div>
                                    <label>Төрөл</label>
                                    <input type="text" name="contact_info[<?php echo $info['id']; ?>][label]" 
                                        value="<?php echo htmlspecialchars($info['label']); ?>" class="form-control" required>
                                    
                                    <label>Утга</label>
                                    <textarea name="contact_info[<?php echo $info['id']; ?>][value]" 
                                        class="form-control" rows="3" required><?php echo htmlspecialchars($info['value']); ?></textarea>
                                    
                                    <label>Icon Class</label>
                                    <input type="text" name="contact_info[<?php echo $info['id']; ?>][icon_class]" 
                                        value="<?php echo htmlspecialchars($info['icon_class']); ?>" class="form-control">
                                    
                                    <label>Эрэмбэ</label>
                                    <input type="number" name="contact_info[<?php echo $info['id']; ?>][order_index]" 
                                        value="<?php echo $info['order_index']; ?>" class="form-control">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="no-data">Холбоо барих мэдээлэл олдсонгүй</div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Шинэчлэх</button>
                </form>
            </div>

            <!-- Хэлтэс нэмэх -->
            <div class="section-card">
                <h3>Хэлтэс нэмэх</h3>
                <form method="POST">
                    <div class="form-grid">
                        <div>
                            <label>Хэлтсийн нэр</label>
                            <input type="text" name="dept_name" class="form-control" required>
                        </div>
                        <div>
                            <label>Эрэмбэ</label>
                            <input type="number" name="order_index" value="0" class="form-control">
                        </div>
                    </div>
                    <button type="submit" name="add_department" class="btn btn-success">Хэлтэс нэмэх</button>
                </form>
            </div>

            <!-- Ажилтан нэмэх -->
            <div class="section-card">
                <h3>Ажилтан нэмэх</h3>
                <form method="POST">
                    <div class="form-grid">
                        <div>
                            <label>Хэлтэс</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">- Сонгох -</option>
                                <?php if (!empty($departments)): ?>
                                    <?php foreach ($departments as $dept): ?>
                                        <option value="<?php echo $dept['id']; ?>"><?php echo htmlspecialchars($dept['name']); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div>
                            <label>Албан тушаал</label>
                            <input type="text" name="position" class="form-control" required>
                        </div>
                        <div>
                            <label>Нэр</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div>
                            <label>Утас</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        
                        <div>
                            <label>Эрэмбэ</label>
                            <input type="number" name="order_index" value="0" class="form-control">
                        </div>
                    </div>
                    <button type="submit" name="add_staff" class="btn btn-success">Ажилтан нэмэх</button>
                </form>
            </div>

<!-- Одоо байгаа хэлтэс, ажилтнууд -->
<div class="section-card">
    <h3>Хэлтэс ба ажилтнууд</h3>

    <?php if (!empty($departments)) { 
        foreach ($departments as $dept) { ?>
            <div class="department-section">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><?php echo htmlspecialchars($dept['name']); ?></h4>
                    <div>
                        <a href="?delete_dept=<?php echo $dept['id']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Энэ хэлтсийг устгахдаа итгэлтэй байна уу?')">
                           Устгах
                        </a>
                        <a href="?update_contact_info=<?php echo $dept['id']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Энэ хэлтсийг устгахдаа итгэлтэй байна уу?')">
                           Устгах
                        </a>
                    </div>
                </div>

                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>Албан тушаал</th>
                            <th>Нэр</th>
                            <th>Утас</th>
                            <th>Үйлдэл</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (isset($staff_by_dept[$dept['id']]) && !empty($staff_by_dept[$dept['id']])) { 
                            foreach ($staff_by_dept[$dept['id']] as $staff) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($staff['position']); ?></td>
                                    <td><?php echo htmlspecialchars($staff['name']); ?></td>
                                    <td><?php echo htmlspecialchars($staff['phone'] ?: '-'); ?></td>
                                    <td>
                                        <a href="?delete_staff=<?php echo $staff['id']; ?>" 
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Энэ ажилтаныг устгахдаа итгэлтэй байна уу?')">
                                           Устгах
                                        </a>
                                         <a href="?update_staff=<?php echo $staff['id']; ?>" 
                                           class="update_contact_info"
                                           onclick="return confirm('Энэ ажилтаныг шинэчлэхдээ  итгэлтэй байна уу?')">
                                           Шинэчлэх
                                        </a>
                                    </td>
                                </tr>
                        <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="5" style="text-align: center;">Ажилтан бүртгэгдээгүй байна</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    <?php } 
    } else { ?>
        <div class="no-data">Хэлтэс бүртгэгдээгүй байна</div>
    <?php } ?>
</div>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    // Хэрэглэгчийн цэс тоглох
    $('.fa-circle-user').click(function() {
        $('.user-op').toggle();
    });

    // Form submission confirmation
    $('form').on('submit', function() {
        return confirm('Өөрчлөлтийг хадгалахдаа итгэлтэй байна уу?');
    });
</script>
</body>
</html>