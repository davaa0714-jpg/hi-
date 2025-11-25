<?php
include("app/db/db.php");

// ---------------------------
// 1) Detail (PDF) view
// ---------------------------
$performance = null;
if (isset($_GET['id'])) {
    $performance = selectOne('performance_report', ['id' => $_GET['id']]);
}

// ---------------------------
// 2) List view data (PHP 5.6 compatible)
// ---------------------------
$allRows  = selectAll('performance_report'); // бүх мөр

// Years
$allYears = array();
foreach ($allRows as $r) {
    $allYears[] = isset($r['Year']) ? (int)$r['Year'] : 0;
}
$allYears = array_filter($allYears);
$years    = array_values(array_unique($allYears));
rsort($years);

// Сонгосон он
$year = isset($_GET['year']) ? (int)$_GET['year'] : (int)(isset($years[0]) ? $years[0] : date('Y'));

// Сонгосон төрөл: half | yearend | both
$period = isset($_GET['period']) ? $_GET['period'] : 'both';
if (!in_array($period, array('half', 'yearend', 'both'), true)) {
    $period = 'both';
}

// Тухайн жилийн мөрүүд
$rows = array();
foreach ($allRows as $r) {
    $ry = isset($r['Year']) ? (int)$r['Year'] : 0;
    if ($ry === $year) {
        $rows[] = $r;
    }
}

// Хоёр багцад хуваах
$firstHalf = array();
$yearEnd   = array();
foreach ($rows as $r) {
    $isHalf = !empty($r['IsHalf']) ? (int)$r['IsHalf'] : 0;
    if ($isHalf === 1) $firstHalf[] = $r;
    else $yearEnd[] = $r;
}

$page = 'transparency';
?>
<!DOCTYPE html>
<html lang="mn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/standard.css">
    <link rel="stylesheet" href="assets/att.css?v=20250818">

    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Ил тод байдал | Хяналт шалгалтын газар</title>

    <style>
        .contact-bg form {
            margin-top: 16px;
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center
        }

        .contact-bg form label {
            font-weight: 600
        }

        .contact-bg form select {
            padding: 4px 8px;
            font-size: 14px
        }

        .performance-list .two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px
        }

        .performance-list .two-cols .att-one {
            width: 100%
        }

        @media (max-width:900px) {
            .performance-list .two-cols {
                grid-template-columns: 1fr
            }
        }
    </style>
</head>

<body>

    <?php include("header.php"); ?>

    <?php if ($performance): ?>
        <!-- DETAIL VIEW -->
        <section class="contact-section">
            <div class="contact-bg">
                <h2>Гүйцэтгэлийн тайлан</h2>
                <div class="line">
                    <div></div>
                </div>
                <p class="text">Хяналт шалгалтын газар</p>
            </div>
        </section>

        <section id="dynamic-att">
            <div class="container">
                <div class="subcontainer">
                    <div class="att-one">
                        <h3>
                            <?php echo htmlspecialchars(isset($performance['Department']) ? $performance['Department'] : '', ENT_QUOTES, 'UTF-8'); ?>
                            <span>
                                <?php
                                $pYear = isset($performance['Year']) ? $performance['Year'] : '';
                                $pHalf = !empty($performance['IsHalf']) && (int)$performance['IsHalf'] === 1 ? 'Эхний хагас жил' : 'Жилийн эцэс';
                                echo htmlspecialchars($pYear, ENT_QUOTES, 'UTF-8') . ' ' . $pHalf;
                                ?>
                            </span>
                        </h3>
                        <div class="pdf-wrapper">
                            <iframe id="pdf"
                                src="include/performance/<?php echo urlencode(isset($performance['pdf']) ? $performance['pdf'] : ''); ?>#view=FitH&navpanes=0&toolbar=0"
                                frameborder="0"></iframe>
                        </div>
                        <p style="margin-top:12px;">
                            <a href="?year=<?php echo (int)(isset($performance['Year']) ? $performance['Year'] : $year); ?>&period=<?php echo htmlspecialchars(isset($_GET['period']) ? $_GET['period'] : 'both', ENT_QUOTES, 'UTF-8'); ?>">
                                ← Жагсаалт руу буцах
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

    <?php else: ?>
        <!-- LIST VIEW -->
        <section class="contact-section">
            <div class="contact-bg">
                <h2>Гүйцэтгэлийн тайлан (жагсаалт)</h2>
                <div class="line">
                    <div></div>
                </div>
                <p class="text">Хяналт шалгалтын газар</p>

                <!-- Жил + Төрөл сонгох FORM (гарчгийн доор байрлана) -->
                <form method="get">
                    <label for="year">Он:</label>
                    <select id="year" name="year" onchange="this.form.submit()">
                        <?php
                        $yearValues = !empty($years) ? $years : array(2025, 2024);
                        foreach ($yearValues as $yOpt):
                        ?>
                            <option value="<?php echo (int)$yOpt; ?>" <?php echo ((int)$yOpt === (int)$year ? 'selected' : ''); ?>>
                                <?php echo (int)$yOpt; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label for="period">Төрөл:</label>
                    <select id="period" name="period" onchange="this.form.submit()">
                        <option value="both" <?php echo ($period === 'both'    ? 'selected' : ''); ?>>Бүгд</option>
                        <option value="half" <?php echo ($period === 'half'    ? 'selected' : ''); ?>>Эхний хагас жил</option>
                        <option value="yearend" <?php echo ($period === 'yearend' ? 'selected' : ''); ?>>Жилийн эцэс</option>
                    </select>

                    <noscript><button type="submit">Шүүх</button></noscript>
                </form>
            </div>
        </section>

        <section id="dynamic-att" class="performance-list">
            <div class="container">
                <div class="subcontainer">

                    <?php if (empty($rows)): ?>
                        <p>Сонгосон <strong><?php echo (int)$year; ?></strong> онд бүртгэл олдсонгүй.</p>

                    <?php else: ?>
                        <?php if ($period === 'half'): ?>
                            <div class="att-one">
                                <h3><?php echo (int)$year; ?> – Эхний хагас жил</h3>
                                <?php if (empty($firstHalf)): ?>
                                    <p>Мэдээлэл алга.</p>
                                <?php else: ?>
                                    <ul class="perf-list">
                                        <?php foreach ($firstHalf as $row): ?>
                                            <li>
                                                <a href="?id=<?php echo (int)$row['id']; ?>&year=<?php echo (int)$year; ?>&period=<?php echo htmlspecialchars($period, ENT_QUOTES, 'UTF-8'); ?>">
                                                    <?php echo htmlspecialchars($row['Department'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                                <span class="muted"> · PDF</span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                        <?php elseif ($period === 'yearend'): ?>
                            <div class="att-one">
                                <h3><?php echo (int)$year; ?> – Жилийн эцэс</h3>
                                <?php if (empty($yearEnd)): ?>
                                    <p>Мэдээлэл алга.</p>
                                <?php else: ?>
                                    <ul class="perf-list">
                                        <?php foreach ($yearEnd as $row): ?>
                                            <li>
                                                <a href="?id=<?php echo (int)$row['id']; ?>&year=<?php echo (int)$year; ?>&period=<?php echo htmlspecialchars($period, ENT_QUOTES, 'UTF-8'); ?>">
                                                    <?php echo htmlspecialchars($row['Department'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                                <span class="muted"> · PDF</span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                        <?php else: /* both */ ?>
                            <div class="two-cols">
                                <div class="att-one">
                                    <h3><?php echo (int)$year; ?> – Эхний хагас жил</h3>
                                    <?php if (empty($firstHalf)): ?>
                                        <p>Мэдээлэл алга.</p>
                                    <?php else: ?>
                                        <ul class="perf-list">
                                            <?php foreach ($firstHalf as $row): ?>
                                                <li>
                                                    <a href="?id=<?php echo (int)$row['id']; ?>&year=<?php echo (int)$year; ?>&period=<?php echo htmlspecialchars($period, ENT_QUOTES, 'UTF-8'); ?>">
                                                        <?php echo htmlspecialchars($row['Department'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </a>
                                                    <span class="muted"> · PDF</span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div class="att-one">
                                    <h3><?php echo (int)$year; ?> – Жилийн эцэс</h3>
                                    <?php if (empty($yearEnd)): ?>
                                        <p>Мэдээлэл алга.</p>
                                    <?php else: ?>
                                        <ul class="perf-list">
                                            <?php foreach ($yearEnd as $row): ?>
                                                <li>
                                                    <a href="?id=<?php echo (int)$row['id']; ?>&year=<?php echo (int)$year; ?>&period=<?php echo htmlspecialchars($period, ENT_QUOTES, 'UTF-8'); ?>">
                                                        <?php echo htmlspecialchars($row['Department'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </a>
                                                    <span class="muted"> · PDF</span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <section id="footer">
        <div class="container">
            <div class="subcontainer">
                <footer class="footer-distr">
                    <div class="footer-left">
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
                        <div><i class="fa-solid fa-location-dot"></i>
                            <p><span>Улаанбаатар Хотын Захиргааны төв цогцолбор, </span>
                                <span>Арцатын ам (17100), Наадамчдын зам 1200,</span>
                                <span>Хан-Уул дүүрэг 23-р хороо, Улаанбаатар хот</span>
                            </p>
                        </div>
                        <div><i class="fa-solid fa-phone"></i>
                            <p>(+976) 70118040</p>
                        </div>
                        <div><i class="fa-solid fa-envelope"></i>
                            <p>info@inspection.ub.gov.mn</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>

    <script src="assets/script.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
</body>

</html>