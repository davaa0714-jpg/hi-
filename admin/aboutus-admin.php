<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('../app/db/users.php'); // create(), update(), selectAll(), selectOne(), delete() г.м функцуудтай байх

// ========================
//  ABOUT US UPDATE
// ========================
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_about'])){
    $id = $_POST['id'] ?? null;
    if($id){
        $data = [
            'intro' => $_POST['intro'],
            'vision' => $_POST['vision'],
            'mission' => $_POST['mission'],
            'core_values' => $_POST['core_values'],
            'functions' => $_POST['functions'],
            'strategy' => $_POST['strategy'] ?? '',
            'priority' => $_POST['priority'] ?? ''
        ];

        $affected = update('aboutus', $id, $data);
        $_SESSION['message'] = $affected > 0 ? "Амжилттай шинэчлэгдлээ." : "Өөрчлөлт хийгдээгүй.";
    }
    header("Location: aboutus-admin.php");
    exit();
}

// ========================
//      HISTORY ADD
// ========================
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_history'])){
    $data = [
        'event_date' => $_POST['h_date'],
        'title' => $_POST['h_title'],
        'description' => $_POST['h_desc']
    ];

    create('about_history', $data);

    $_SESSION['message'] = "Түүх амжилттай нэмэгдлээ!";
    header("Location: aboutus-admin.php");
    exit();
}

// ========================
//  DEPARTMENT ADD / UPDATE
// ========================
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_department'])){
    $dept_id = $_POST['dept_id'] ?? null;
    $data = [
        'name' => $_POST['dept_name'],
        'description' => $_POST['dept_desc']
    ];

    if(!empty($dept_id)){
        // ID байгаа бол update
        $affected = update('about_department', $dept_id, $data);
        $_SESSION['message'] = $affected > 0 ? "Хэлтэс амжилттай засагдлаа." : "Өөрчлөлт хийгдээгүй.";
    } else {
        // ID байхгүй бол create → нэмэх
        create('about_department', $data);
        $_SESSION['message'] = "Хэлтэс амжилттай нэмэгдлээ!";
    }

    header("Location: aboutus-admin.php");
    exit();
}

// ========================
//  DEPARTMENT DELETE
// ========================
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_department'])){
    $dept_id = $_POST['dept_id'] ?? null;
    if($dept_id){
        $deleted = delete('department', $dept_id);
        $_SESSION['message'] = $deleted > 0 ? "Хэлтэс амжилттай устлаа." : "Устгах явцад алдаа гарлаа.";
    }
    header("Location: aboutus-admin.php");
    exit();
}

// ========================
// LOAD CURRENT DATA
// ========================
$edit = selectOne('aboutus', ['id'=>1]);
$history = selectAll('about_history', []);
$departments = selectAll('department', []);
?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ | Бидний тухай</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
                .container  {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<header>
    <ul class="nav-list">
        <li>
            <a href="#"><i class="fa-solid fa-circle-user"></i></a>
            <?php if (isset($_SESSION['username'])): ?>
                <ul class="user-op">
                    <li class="name"><?php echo $_SESSION['username']; ?></li>
                    <li><a href="../logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Гарах</a></li>
                </ul>
            <?php endif ?>
        </li>
    </ul>
</header>

<div class="sidebar">
    <ul>
        <a href="dashboard.php"><li>Хянах самбар</li></a>
        <a href="news-admin"><li>Мэдээ</li></a>
        <a href="standard-admin"><li>Стандарт</li></a>
        <a href="commission-admin"><li>Комиссын хуваарь</li></a>
        <a href="contact-admin.php"><li>Холбоо барих</li></a>
        <a href="aboutus-admin" class="active"><li>Бидний тухай</li></a>
    </ul>
</div>

<div class="container">

    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert">
            <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <h2>Бидний тухай - Агуулга засварлах</h2>

    <form action="aboutus-admin.php" method="post">
        <input type="hidden" name="save_about" value="1">
        <input type="hidden" name="id" value="<?php echo $edit['id'] ?? ''; ?>">

        <div class="section"><h3>Танилцуулга</h3>
            <textarea name="intro" rows="4"><?php echo htmlspecialchars($edit['intro'] ?? ''); ?></textarea>
        </div>

        <div class="section"><h3>Алсын хараа</h3>
            <textarea name="vision" rows="3"><?php echo htmlspecialchars($edit['vision'] ?? ''); ?></textarea>
        </div>

        <div class="section"><h3>Эрхэм зорилго</h3>
            <textarea name="mission" rows="3"><?php echo htmlspecialchars($edit['mission'] ?? ''); ?></textarea>
        </div>

        <div class="section"><h3>Үнэт зүйлс</h3>
            <textarea name="core_values" rows="6"><?php echo htmlspecialchars($edit['core_values'] ?? ''); ?></textarea>
        </div>

        <div class="section"><h3>Чиг үүрэг</h3>
            <textarea name="functions" rows="5"><?php echo htmlspecialchars($edit['functions'] ?? ''); ?></textarea>
        </div>

        <div class="section"><h3>Стратеги</h3>
            <textarea name="strategy" rows="4"><?php echo htmlspecialchars($edit['strategy'] ?? ''); ?></textarea>
        </div>

        <div class="section"><h3>Тэргүүлэх чиглэл</h3>
            <textarea name="priority" rows="4"><?php echo htmlspecialchars($edit['priority'] ?? ''); ?></textarea>
        </div>

        <button type="submit" class="btn"><i class="fa-solid fa-floppy-disk"></i> Хадгалах</button>
    </form>

    <hr><br>

    <h2>Түүх нэмэх</h2>
    <form action="aboutus-admin.php" method="post" class="history-form">
        <input type="hidden" name="add_history" value="1">
        <div class="section"><h3>Он сар өдөр</h3>
            <input type="text" name="h_date" placeholder="Жишээ: 2019-05-22" required>
        </div>
        <div class="section"><h3>Гарчиг</h3>
            <input type="text" name="h_title" placeholder="Гарчиг" required>
        </div>
        <div class="section"><h3>Тайлбар</h3>
            <textarea name="h_desc" rows="4" placeholder="Түүхийн дэлгэрэнгүй"></textarea>
        </div>
        <button class="btn">+ Түүх нэмэх</button>
    </form>

    <br><hr><br>
    <h2>Түүхийн жагсаалт</h2>
    <table class="table">
        <tr>
            <th>Огноо</th>
            <th>Гарчиг</th>
            <th>Тайлбар</th>
        </tr>
        <?php foreach($history as $row): ?>
        <tr>
            <td><?php echo $row['event_date'] ?? ''; ?></td>
            <td><?php echo $row['title'] ?? ''; ?></td>
            <td><?php echo $row['description'] ?? ''; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <hr><br>

    <h2>Байгууллагын бүтэц (Хэлтэсүүд)</h2>
    <form action="aboutus-admin.php" method="post" id="dept_form">
        <input type="hidden" name="add_department" value="1" id="dept_form_mode">
        <input type="hidden" name="dept_id" value="" id="dept_id">

        <div class="section">
            <h3>Хэлтэсийн нэр</h3>
            <input type="text" name="dept_name" id="dept_name" required>
        </div>
        <div class="section">
            <h3>Тайлбар</h3>
            <textarea name="dept_desc" rows="3" id="dept_desc" required></textarea>
        </div>
        <button type="submit" class="btn" id="dept_submit_btn">+ Хэлтэс нэмэх</button>
    </form>

    <br>
    <table class="table">
        <tr>
            <th>Хэлтэс / Тасаг</th>
            <th>Тайлбар</th>
            <th>Үйлдэл</th>
        </tr>
        <?php foreach($departments as $dept): ?>
        <tr>
            <td><?php echo htmlspecialchars($dept['name']); ?></td>
            <td><?php echo htmlspecialchars($dept['description']); ?></td>
            <td>
                <!-- Засах товч -->
                <button type="button" class="btn btn-edit" 
                    onclick="editDepartment(<?php echo $dept['id']; ?>, '<?php echo addslashes($dept['name']); ?>', '<?php echo addslashes($dept['description']); ?>')">
                    Засах
                </button>
                <!-- Устгах товч -->
                <form action="aboutus-admin.php" method="post" style="display:inline;" onsubmit="return confirm('Энэ хэлтэсыг устгах уу?');">
                    <input type="hidden" name="delete_department" value="1">
                    <input type="hidden" name="dept_id" value="<?php echo $dept['id']; ?>">
                    <button type="submit" class="btn btn-danger">Устгах</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>

<script>
function editDepartment(id, name, desc){
    document.getElementById('dept_form_mode').value = 2; // Засах горим
    document.getElementById('dept_id').value = id;
    document.getElementById('dept_name').value = name;
    document.getElementById('dept_desc').value = desc;
    document.getElementById('dept_submit_btn').innerText = "💾 Засах";
}
</script>

</body>
</html>
