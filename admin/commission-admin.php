<?php
// session эхлүүлэх
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Login шалгах
if(!isset($_SESSION['username'])){
    header("Location: ../login");
    exit();
}

include("../app/db/users.php");
include("commission-create.php");

// --- EDIT утга авах ---
// Барилга
$edit_bb = null;
if (isset($_GET['id'])) {
    $edit_bb = selectOne('commission_bb_22', ['id' => (int)$_GET['id']]);
}

// Засвар
$edit_zs = null;
if (isset($_GET['idzs'])) {
    $edit_zs = selectOne('commission_zt_22', ['id' => (int)$_GET['idzs']]);
}

// --- DELETE логик ---
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    if (!empty($id)) delete('commission_bb_22', $id);
    header("Location: commission-admin.php");
    exit();
}

if (isset($_GET['delete_idzs'])) {
    $id = (int)$_GET['delete_idzs'];
    if (!empty($id)) delete('commission_zt_22', $id);
    header("Location: commission-admin.php");
    exit();
}

// --- PUBLISH / UPDATE BB ---
if (isset($_POST['publish-bb']) || isset($_POST['update-bb'])) {
    $id = $_POST['id'] !== '' ? (int)$_POST['id'] : null;
    $data = ['date_range' => $_POST['date_range']];

    if (!empty($_FILES['file_path']['name'])) {
        $pdf_name = time() . '_' . $_FILES['file_path']['name'];
        move_uploaded_file($_FILES['file_path']['tmp_name'], "../include/post_images/" . $pdf_name);
        $data['file_path'] = $pdf_name;
    }

    if (isset($_POST['publish-bb'])) {
        create('commission_bb_22', $data);
    } elseif (isset($_POST['update-bb']) && $id !== null) {
        update('commission_bb_22', $id, $data);
    }

    header("Location: commission-admin.php");
    exit();
}

// --- PUBLISH / UPDATE ZS ---
if (isset($_POST['publish-zs']) || isset($_POST['update-zs'])) {
    $id = $_POST['id'] !== '' ? (int)$_POST['id'] : null;
    $data = ['date_range' => $_POST['date_range']];

    if (!empty($_FILES['file_path']['name'])) {
        $pdf_name = time() . '_' . $_FILES['file_path']['name'];
        move_uploaded_file($_FILES['file_path']['tmp_name'], "../include/post_images/" . $pdf_name);
        $data['file_path'] = $pdf_name;
    }

    if (isset($_POST['publish-zs'])) {
        create('commission_zt_22', $data);
    } elseif (isset($_POST['update-zs']) && $id !== null) {
        update('commission_zt_22', $id, $data);
    }

    header("Location: commission-admin.php");
    exit();
}


// --- Хүснэгтүүд ---
$barilga = selectAll('commission_bb_22');
$zasvar = selectAll('commission_zt_22');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="ckeditor/sample/styles.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
    <title>Админ | Комиссын хуваарь</title>
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
                        <ul class="user-op">
                            <p class="name"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                        </ul>
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
            <div class="content-wrapper">
                <h1>Вебсайтад комиссын хуваарь байршуулах</h1>
                <div class="filter-container">
                    <div class="filter-item bb" data-filter="barilga"><span>Барилга байгууламж</span></div>
                    <div class="filter-item zs" data-filter="zasvar"><span>Засвар, тохижилт</span></div>
                </div>

                <!-- Барилга -->
                <div class="barilga">
                    <div class="input">
                        <form action="commission-admin.php" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $edit_bb['id'] ?? '' ?>">
                            <input name="date_range" type="text" value="<?php echo $edit_bb['date_range'] ?? '' ?>" placeholder="Огноо" required>
                            <div class="pdf-upload">
                                <label class="custom-file-upload" for="pdf-barilga">
                                    <?php echo $edit_bb['file_path'] ?? 'PDF сонгох'; ?>
                                </label>
                                <input name="file_path" id="pdf-barilga" type="file" accept=".pdf">
                            </div>
                            <button type="submit" name="publish-bb">Нийтлэх</button>
                            <button type="submit" name="update-bb">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list">
                        <div class="boxes com-list">
                            <?php foreach($barilga as $bb): ?>
                                <div class="list-box1">
                                    <p><?php echo $bb['date_range']; ?></p>
                                    <div>
                                        <a href="commission-admin.php?id=<?php echo $bb['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="commission-admin.php?delete_id=<?php echo $bb['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>

                <!-- Засвар -->
                <div class="barilga zasvar">
                    <div class="input">
                        <form action="commission-admin.php" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $edit_zs['id'] ?? '' ?>">
                            <input name="date_range" type="text" value="<?php echo $edit_zs['date_range'] ?? '' ?>" placeholder="Огноо" required>
                            <div class="pdf-upload">
                                <label class="custom-file-upload" for="pdf-zasvar">
                                    <?php echo $edit_zs['file_path'] ?? 'PDF сонгох'; ?>
                                </label>
                                <input name="file_path" id="pdf-zasvar" type="file" accept=".pdf">
                            </div>
                            <button type="submit" name="publish-zs">Нийтлэх</button>
                            <button type="submit" name="update-zs">Шинэчлэх</button>
                        </form>
                    </div>
                    <div class="existing-list-zs">
                        <div class="zasvar-boxes com-list">
                            <?php foreach($zasvar as $zs): ?>
                                <div class="list-box1">
                                    <p><?php echo $zs['date_range']; ?></p>
                                    <div>
                                        <a href="commission-admin.php?idzs=<?php echo $zs['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="commission-admin.php?delete_idzs=<?php echo $zs['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="ckeditor/build/ckeditor.js"></script>
    <script src="commission-admin.js"></script>
    <script>
        // Олон PDF input хянах
        document.querySelectorAll('.input-btn').forEach(input => {
            input.addEventListener('change', function() {
                console.log({file: input.files[0]});
            });
        });
    </script>
</body>
</html>
