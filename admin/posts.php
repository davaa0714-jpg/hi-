<?php
$table = 'post';

$title = "";
$content = "";
$id = "";
$featured = "";
$additional = "";

if (isset($_GET['id'])) {
    $updatepost = selectOne($table, ['id' => $_GET['id']]);

    $id = $updatepost['id'];
    $title = $updatepost['title'];
    $content = $updatepost['content'];
    $featured = $updatepost['attach_path'];
    $additional = $updatepost['additional_img'];
}

if (isset($_POST['publish-btn'])) {

    unset($_POST['publish-btn']);

    // FEATURED IMAGE
    if (!empty($_FILES['attach_path']['name'])) {
        $feat_img_name = time() . '_' . $_FILES['attach_path']['name'];
        $feat_img_dest = "../include/post_images/" . $feat_img_name;

        if (move_uploaded_file($_FILES['attach_path']['tmp_name'], $feat_img_dest)) {
            $_POST['attach_path'] = $feat_img_name;
        } else {
            $errors = 'Failed to upload featured image';
        }
    }

    // ADDITIONAL IMAGES
    $total_count = count($_FILES['additional_img']['name']);
    $add_names = '';

    for ($i = 0; $i < $total_count; $i++) {
        if ($_FILES['additional_img']['name'][$i] == "") continue;

        $add_img_name = time() . '_' . $_FILES['additional_img']['name'][$i];
        $add_img_dest = "../include/post_images/" . $add_img_name;
        move_uploaded_file($_FILES['additional_img']['tmp_name'][$i], $add_img_dest);

        if ($add_names == "") {
            $add_names = $add_img_name;
        } else {
            $add_names .= ", " . $add_img_name;
        }
    }

    $_POST['additional_img'] = $add_names;

    $post_id = create($table, $_POST);
    header("location: news-admin");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="dashboard-new.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="ckeditor/sample/styles.css">
<title>Админ | Мэдээ</title>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <img src="public_html/image/hohot_goldoo_tsagaan.png" alt="Logo">

    <ul class="nav-list">
        <li><a href="dashboard">Хянах самбар</a></li>
        <li><a href="-admin">Мэдээ</a></li>
        <li><a href="projects">Төсөл</a></li>
        <li><a href="zarlaga">Зарлага</a></li>
        <li>
            <a href="#"><i class="fa-solid fa-circle-user"></i></a>
            <ul class="user-op">
                <li class="name">Админ</li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
            </ul>
        </li>
    </ul>
</div>

<!-- MAIN WRAPPER -->
<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <ul>
            <li><a href="dashboard"><i class="fa-solid fa-home"></i> Хянах самбар</a></li>

            <li class="active">
                <a href="news-admin"><i class="fa-solid fa-newspaper"></i> Мэдээ</a>
            </li>

            <li>
                <a href="projects"><i class="fa-solid fa-diagram-project"></i> Төсөл</a>
            </li>

            <li>
                <a href="zarlaga"><i class="fa-solid fa-wallet"></i> Зарлага</a>
            </li>

            <li>
                <a href="settings"><i class="fa-solid fa-gear"></i> Тохиргоо</a>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="content-wrapper">

            <h1><?php echo isset($_GET['id']) ? "Мэдээ засах" : "Мэдээ нэмэх"; ?></h1>

            <form action="" method="POST" enctype="multipart/form-data">

                <?php if (isset($_GET['id'])): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>

                <div class="input">
                    <input 
                        type="text" 
                        name="title" 
                        placeholder="Гарчиг" 
                        value="<?php echo $title; ?>" 
                        required>
                </div>

                <textarea 
                    id="editor" 
                    name="content" 
                    rows="10" 
                    placeholder="Агуулга бичих..."
                    style="width:100%; border-radius:10px; padding:15px;"><?php echo $content; ?></textarea>

                <p style="font-size:13px; color:gray;">Үндсэн зураг</p>
                <label class="custom-file-upload">
                    <input type="file" name="attach_path">
                    Зураг сонгох
                </label>

                <?php if ($featured): ?>
                    <div class="list-box wo-margin">
                        <p><span>Одоогийн:</span> <?php echo $featured; ?></p>
                    </div>
                <?php endif; ?>

                <p style="font-size:13px; color:gray; margin-top:14px;">Нэмэлт зургууд</p>
                <label class="custom-file-upload">
                    <input type="file" name="additional_img[]" multiple>
                    Нэмэлт зураг сонгох
                </label>

                <?php if ($additional): ?>
                    <div class="existing-list">
                        <p><span>Одоогийн:</span> <?php echo $additional; ?></p>
                    </div>
                <?php endif; ?>

                <button type="submit" name="publish-btn">Хадгалах</button>

            </form>

        </div>
    </div>

</div>

</body>
</html>
