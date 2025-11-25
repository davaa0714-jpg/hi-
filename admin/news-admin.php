<?php
include("../app/db/users.php");


// == МЭДЭЭ УСТГАХ ==
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    if (!empty($id)) {
        delete('post', $id);
    }
    header("Location: news-admin.php");
    exit;
}

// == МЭДЭЭ ШИНЭЧЛЭХ ==
if (isset($_POST['update-btn'])) {
    $post_id = $_POST['id'];
    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ];

    // === ҮНДСЭН ЗУРАГ ===
    if (!empty($_FILES['attach_path']['name'])) {
        $upload_dir = "../include/post_images/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $new_filename = time() . '_' . basename($_FILES['attach_path']['name']);
        $target_path = $upload_dir . $new_filename;
        if (move_uploaded_file($_FILES['attach_path']['tmp_name'], $target_path)) {
            $data['attach_path'] = $new_filename;
        } else {
            error_log("UPLOAD ERROR: attach_path failed to move. tmp: " . ($_FILES['attach_path']['tmp_name'] ?? 'n/a'));
            $_SESSION['message'] = "Үндсэн зураг сервер рүү хадгалагдсангүй. (attach_path)";
        }
    }

    // === НЭМЭЛТ ЗУРАГ ===
    if (!empty($_FILES['additional_img']['name'][0])) {
        $upload_dir = "../include/post_images/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $new_filenames = [];
        foreach ($_FILES['additional_img']['name'] as $key => $filename) {
            $new_filename = time() . '_' . basename($filename);
            $target_path = $upload_dir . $new_filename;
            if (move_uploaded_file($_FILES['additional_img']['tmp_name'][$key], $target_path)) {
                $new_filenames[] = $new_filename;
            } else {
                error_log("UPLOAD ERROR: additional_img index {$key} failed to move. tmp: " . ($_FILES['additional_img']['tmp_name'][$key] ?? 'n/a'));
            }
        }
        if (!empty($new_filenames)) {
            $data['additional_img'] = json_encode($new_filenames);
        }
    }

    // === PDF ОРУУЛАХ ===
    if (!empty($_FILES['file_path']['name'])) {
        $upload_dir = "../include/post_files/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // Файлын өргөтгөл шалгах
        $file_extension = strtolower(pathinfo($_FILES['file_path']['name'], PATHINFO_EXTENSION));
        
        if ($file_extension === 'pdf') {
            $pdf_name = time() . '_' . basename($_FILES['file_path']['name']);
            $target_path = $upload_dir . $pdf_name;

            if ($_FILES['file_path']['error'] === UPLOAD_ERR_OK) {
                if (move_uploaded_file($_FILES['file_path']['tmp_name'], $target_path)) {
                    $data['file_path'] = $pdf_name;
                } else {
                    error_log("UPLOAD ERROR: file_path failed to move. tmp: " . ($_FILES['file_path']['tmp_name'] ?? 'n/a'));
                    $_SESSION['message'] = "PDF файл сервер рүү хадгалагдсангүй.";
                }
            } else {
                error_log("UPLOAD ERROR: file_path upload error code: " . $_FILES['file_path']['error']);
                $_SESSION['message'] = "PDF файлыг илгээхэд алдаа гарлаа.";
            }
        } else {
            $_SESSION['message'] = "Зөвхөн PDF файл оруулах боломжтой.";
        }
    }

    // === UPDATE буюу DB рүү бичих ===
    $affected = update('post', $post_id, $data);

    // Хэрэглэгч руу мэдэгдэл өгөх
    if ($affected > 0) {
        $_SESSION['message'] = "Амжилттай шинэчлэгдлээ.";
    } else {
        $_SESSION['message'] = "Шинэчлэлт амжилттай боловч өөрчлөлт олдсонгүй.";
    }

    header("Location: news-admin.php");
    exit();
}

// == ЗӨВШӨӨРӨЛ ШАЛГАХ ==
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: no_access.php");
    exit();
}

// == НЭВТРЭЭГҮЙ ҮЕД ==
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
}

// == МЭДЭЭ АВАХ ==
$posts = selectAll('post');

// DESC-ээр үзүүлэх
if (is_array($posts) && !empty($posts)) {
    usort($posts, function($a, $b) {
        $ida = isset($a['id']) ? (int)$a['id'] : 0;
        $idb = isset($b['id']) ? (int)$b['id'] : 0;
        return $idb <=> $ida; // DESC
    });
}
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
    <title>Админ | Мэдээ</title>
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
                <a href="news-admin" class="active"><li>Мэдээ</li></a>
                <a href="standard-admin"><li>Стандарт</li></a>
                <a href="commission-admin"><li>Комиссын хуваарь</li></a>
                <a href="contact-admin.php"><li>Холбоо барих</li></a>
                <a href="aboutus-admin"><li>Бидний тухай</li></a>
            
        </ul>
    </div>

    <div class="content">
        <div class="content-wrapper">
            <h1>Вебсайтад мэдээ нийтлэх</h1>
            <div class="columns">
                <div class="input">
                    <form action="news-admin.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
                        <input name="title" type="text" value="<?php echo isset($title) ? $title : ''; ?>" placeholder="Гарчиг" required>
                        <textarea name="content" id="editor"><?php echo isset($content) ? $content : ''; ?></textarea>
                        
                        <div class="images-upload">
                            <label class="custom-file-upload" for="featured">Үндсэн зураг сонгох</label>
                            <input name="attach_path" id="featured" class="input-btn" type="file" accept="image/*">

                            <label class="custom-file-upload" for="additional">Нэмэлт зураг сонгох</label>
                            <input name="additional_img[]" id="additional" class="input-btn" type="file" multiple accept="image/*">
                        </div>

                        <br>

                        <div class="pdf-upload">
                            <label class="custom-file-upload" for="pdf-zasvar">PDF сонгох</label>
                            <input name="file_path" id="pdf-zasvar" class="input-btn" type="file" accept=".pdf">
                            <span class="file-name" id="pdf-file-name">Файл сонгоогүй</span>
                        </div>

                        <button id="publish" type="submit" name="publish-btn">Нийтлэх</button>
                        <button id="update" type="submit" name="update-btn">Шинэчлэх</button>
                    </form>
                </div>

                <div class="existing-list">
                    <div class="boxes">
                        <?php foreach ($posts as $post): ?>
                            <div class="list-box">
                                <p><?php echo htmlspecialchars($post['title']); ?></p>
                                <div>
                                    <a href="news-admin?id=<?php echo $post['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="news-admin?delete_id=<?php echo $post['id']; ?>"><i class="fa-solid fa-trash"></i></a>
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
<script src="news-admin.js"></script>
<script>
    // Хэрэглэгчийн цэс тоглох
    $('.fa-circle-user').click(function() {
        $('.user-op').toggle();
    });

    // PDF файлын нэр харуулах
    document.getElementById('pdf-zasvar').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Файл сонгоогүй';
        document.getElementById('pdf-file-name').textContent = fileName;
    });

    // Form илгээх үед PDF шалгах
    document.querySelector('form').addEventListener('submit', function(e) {
        const pdfInput = document.getElementById('pdf-zasvar');
        const file = pdfInput.files[0];

        if (file) {
            // Файлын өргөтгөл шалгах
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension !== 'pdf') {
                e.preventDefault();
                alert('Зөвхөн PDF файл оруулах боломжтой!');
                return;
            }
        }
    });
    ClassicEditor.create(document.querySelector('#editor'), {
        placeholder: 'Агуулгыг энд бичнэ үү!'
    }).then(editor => {
        window.editor = editor;
    }).catch(error => {
        console.error(error);
    });

    $('.fa-circle-user').click(function() {
        $('.user-op').toggle();
    });
</script>
</body>
</html>