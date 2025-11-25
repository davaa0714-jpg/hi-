<?php 
$page = 'aboutus';
require_once("app/db/db.php"); // selectAll, selectOne, create, update, delete функцүүдтэй

// About Us мэдээлэл
$about = selectOne('aboutus', ['id'=>1]);

// Байгууллагын бүтэц
$structure = selectAll('structure');

// Түүх
$timeline = selectAll('timeline');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/main.css">
<link rel="stylesheet" href="assets/contact.css">
<link rel="stylesheet" href="assets/aboutus.css">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<title><?php echo htmlspecialchars($about['title']); ?> | Хяналт шалгалтын газар</title>
</head>
<body>
<?php include("header.php"); ?>

<section class="contact-section">
    <div class="contact-bg">
        <h2><?php echo htmlspecialchars($about['title']); ?></h2>
        <div class="line"><div></div></div>
        <p class="text">Хяналт шалгалтын газар</p>
    </div>
</section>

<section id="aboutus">
    <div class="intro-container">
        <div class="intro-subcontainer">
            <div class="intro-content">
                <div class="intro-text">
                    <p><?php echo nl2br(htmlspecialchars($about['intro'])); ?></p>
                </div>
            </div>
            <br>
            <div class="intro-content-btm">
                <div class="btm-left">
                    <span><i class="fa-solid fa-rocket"></i></span>
                    <h2><span>Алсын хараа</span></h2>
                    <p><?php echo nl2br(htmlspecialchars($about['vision'])); ?></p>
                </div>
                <div class="btm-right">
                    <span><i class="fa-solid fa-bullseye"></i></span>
                    <h2><span>Зорилго</span></h2>
                    <p><?php echo nl2br(htmlspecialchars($about['mission'])); ?></p>
                </div>
            </div>

            <div class="values">
                <div class="btm-btm">
                    <span><i class="fa-solid fa-gem"></i></span>
                    <h2><span>Үнэт зүйлс</span></h2>
                </div>
                <div class="value-wrapper">
                    <?php
                    $values = explode(',', $about['values']);
                    foreach($values as $val){
                        echo '<div class="value-box"><p>'.htmlspecialchars(trim($val)).'</p></div>';
                    }
                    ?>
                </div>
            </div>

            <div class="values">
                <div class="btm-btm">
                    <span><i class="fa-solid fa-compass"></i></span>
                    <h2><span>Чиг үүрэг</span></h2>
                </div>
                <div class="value-wrapper">
                    <?php
                    $funcs = explode(',', $about['functions']);
                    foreach($funcs as $f){
                        echo '<div class="value-box"><p>'.htmlspecialchars(trim($f)).'</p></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="structure">
    <div class="container">
        <div class="filter-container">
            <span class="filter-item stru" data-filter="structure-filter">Бүтэц</span>
            <span class="filter-item time" data-filter="timeline-filter">Түүх</span>
        </div>
        <br>
        <div class="subsubcontainer">
            <div class="structure">
                <?php foreach($structure as $s): ?>
                <div class="structure-container">
                    <div class="row">
                        <div class="row-content">
                            <i class="fa-solid fa-users"></i>
                            <p><?php echo htmlspecialchars($s['branch_name']); ?></p>
                        </div>
                    </div>
                    <div class="branch-row">
                        <div class="branch-content">
                            <span><?php echo htmlspecialchars($s['branch_name']); ?></span>
                            <p><?php echo htmlspecialchars($s['description']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="timeline-container timeline-filter">
                <div class="timeline">
                    <ul>
                        <?php foreach($timeline as $t): ?>
                        <li>
                            <div class="timeline-content">
                                <h3 class="date"><?php echo date('Y оны m сарын d', strtotime($t['event_date'])); ?></h3>
                                <h1><?php echo htmlspecialchars($t['title']); ?></h1>
                                <p><?php echo htmlspecialchars($t['description']); ?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="assets/script.js"></script>
<script src="assets/aboutus.js"></script>
</body>
</html>
