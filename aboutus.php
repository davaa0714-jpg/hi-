<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('app/db/db.php');

// ========================
// About us мэдээлэл авах
// ========================
$about = selectOne('aboutus', ['id' => 1]);
if (!$about) {
    $about = [
        'intro' => 'Танилцуулга',
        'vision' => 'Алсын хараа',
        'mission' => 'Зорилго',
        'core_values' => "Ёс зүй\nМанлайлал\nХамт олон\nХариуцлага\nУр чадвар",
        'functions' => "Чиг үүрэг 1\nЧиг үүрэг 2\nЧиг үүрэг 3",
        'strategy' => 'Стратеги',
        'priority' => 'Тэргүүлэх чиглэл'
    ];
}

// ========================
// About history мэдээлэл авах
// ========================
$history = selectAll('about_history', [], 'event_date ASC');

// ========================
// About departments мэдээлэл авах
// ========================
$departments = selectAll('about_department', []);
?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бидний тухай | Хяналт шалгалтын газар</title>
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        /* ===== General ===== */
        body { font-family: Arial, sans-serif; color: #333; }
        h2 { margin-top: 30px; }

        /* ===== Filter Buttons ===== */
        .filter-container {
            margin: 20px 0;
        }
        .filter-item {
            display: inline-block;
            padding: 8px 16px;
            background: #3498db;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 8px;
            transition: background 0.2s;
        }
        .filter-item:hover { background: #2980b9; }

        /* ===== Department / History Sections ===== */
        .department-wrapper, #history-section {
            margin-top: 15px;
        }

        .department-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .department-box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            flex: 1 1 300px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .department-box:hover { transform: translateY(-5px); }

        /* ===== Values / Functions ===== */
        .values { margin-top: 40px; }
        .value-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }
        .value-box {
            background-color: #eaf2f8;
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: 500;
        }

        /* ===== Table ===== */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
<?php include("header.php"); ?>

<section class="contact-section">
    <div class="contact-bg">
        <h2>Бидний тухай</h2>
        <div class="line"><div></div></div>
        <p class="text">Хяналт шалгалтын газар</p>
    </div>
</section>

<section id="aboutus">
    <div class="intro-container">
        <div class="intro-subcontainer">
            <!-- Intro -->
            <div class="intro-content">
                <div class="intro-text">
                    <p><?php echo htmlspecialchars($about['intro']); ?></p>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="intro-content-btm">
                <div class="btm-left">
                    <span><i class="fa-solid fa-rocket"></i></span>
                    <h2>Алсын хараа</h2>
                    <p><?php echo htmlspecialchars($about['vision']); ?></p>
                </div>
                <div class="btm-right">
                    <span><i class="fa-solid fa-bullseye"></i></span>
                    <h2>Зорилго</h2>
                    <p><?php echo htmlspecialchars($about['mission']); ?></p>
                </div>
            </div>

            <!-- Core Values -->
            <div class="values">
                <div class="btm-btm">
                    <span><i class="fa-solid fa-gem"></i></span>
                    <h2>Үнэт зүйлс</h2>
                </div>
                <div class="value-wrapper">
                    <?php 
                    $values = explode("\n", $about['core_values']);
                    foreach($values as $val){
                        echo '<div class="value-box">'.htmlspecialchars($val).'</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Functions -->
            <div class="values">
                <div class="btm-btm">
                    <span><i class="fa-solid fa-compass"></i></span>
                    <h2>Чиг үүрэг</h2>
                </div>
                <div class="value-wrapper">
                    <?php 
                    $funcs = explode("\n", $about['functions']);
                    foreach($funcs as $func){
                        echo '<div class="value-box">'.htmlspecialchars($func).'</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="filter-container">
                <span class="filter-item stru">Бүтэц</span>
                <span class="filter-item time">Түүх</span>
            </div>

            <!-- Departments Section -->
            <div id="departments-section" class="department-wrapper">
                <?php foreach($departments as $dept): ?>
                <div class="department-box">
                    <h3><?php echo htmlspecialchars($dept['department_name']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($dept['description'])); ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- History Section -->
            <div id="history-section">
                <h2>Түүхийн жагсаалт</h2>
                <table class="table">
                    <tr>
                        <th>Огноо</th>
                        <th>Гарчиг</th>
                        <th>Тайлбар</th>
                    </tr>
                    <?php foreach($history as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['event_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
</section>

  <!-- footer -->
    <section id="footer">
        <div class="container">
            <div class="subcontainer">
                <footer class="footer-distr">
                    <div class="footer-left">
                        <!-- <img src="images/hot_goldoo_tsagaan.png" alt=""> -->

                        <img src="images/УБСүлд_Үндсэн хувилбар_RGB.png" alt="">
                        <div class="socials">
                            <a href="https://www.facebook.com/urbanstandart"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCugdOyzQRzgZlo_XtT--rVA/videos"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                        <p class="footer-name">2022 &copy; Хяналт шалгалтын газар</p>
                    </div>
                    <div class="footer-mid">
                        <h3>Холбоосууд</h3>
                        <ul class="box">
                            <li><a href="index">Нүүр</a></li>
                            <li><a href="aboutus">Бидний тухай</a></li>
                            <li><a href="https://shilendans.gov.mn/organization/30504">Шилэн данс</a></li>
                            <li><a href="contactus">Холбоо барих</a></li>
                        </ul>
                    </div>
                    <div class="footer-right">
                        <h3>Хаяг</h3>
                        <div>
                            <i class="fa-solid fa-location-dot"></i>
                            <p><span>Улаанбаатар Хотын Захиргааны төв цогцолбор, </span>
                            <span>Арцатын ам (17100), Наадамчдын зам 1200,</span>
                            <span>Хан-Уул дүүрэг 23-р хороо, Улаанбаатар хот</span></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-phone"></i>
                            <p>(+976) 70118040</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-envelope"></i>
                            <p>info@inspection.ub.gov.mn</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
    <!-- end of footer -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function(){
    // Эхэндээ бүгдийг харуулах
    $("#departments-section").show();
    $("#history-section").show();

    // Бүтэц toggle
    $(".filter-item.stru").click(function(){
        $("#departments-section").slideToggle();
    });

    // Түүх toggle
    $(".filter-item.time").click(function(){
        $("#history-section").slideToggle();
    });
});
</script>
</body>
</html> 