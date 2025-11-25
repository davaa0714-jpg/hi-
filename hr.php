<?php
include("app/db/db.php");

$positions = selectAll('position' . " ORDER BY id DESC");

$sql = "SELECT * FROM position";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$res_col = explode("\r\n", $row['res']);
$req_col = explode("\r\n", $row['req']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/standard.css">
    <link rel="stylesheet" href="assets/aboutus.css">
    <link rel="stylesheet" href="assets/hr.css">
    <link rel="stylesheet" href="/JSTable-master/dist/jstable.css" />
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Хяналт шалгалтын газар</title>
</head>
<body>

    <!-- navbar -->
    <section id="header">
        <div class="header container">
            <nav class="navbar">
                <a href="index"><img src="images/УБСүлд_Үндсэн хувилбар_RGB.png" class="logo"></a>
                <ul class="nav-list">
                    <li><a href="index">НҮҮР</a></li>
                    <li><a href="aboutus">БИДНИЙ ТУХАЙ</a></li>
                    <li>
                        <a href="#">ХОТЫН СТАНДАРТ
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Хотын стандартын танилцуулга</a></li>
                            <li><a href="standards">Стандартын баримт бичгүүд</a></li>
                            <li><a href="standards_project">Санал авч буй стандартын төсөл</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">ҮЙЛЧИЛГЭЭ
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="#">Барилга, байгууламжийг ашиглалтад оруулах
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                                <ul class="sub2">
                                    <li><a href="https://e-mongolia.mn/service/barilga-baiguulamjiig-ashiglaltad-oruulakh">Цахимаар хүсэлт гаргах</a></li>
                                    <li><a href="commission">Комиссын хуваарь</a></li>
                                    <li><a href="include/other/Саналын хуудас үүрэг даалгаврын биелэлт.pdf">Үүрэг даалгаврын биелэлтийн хуудас</a></li>
                                    <li><a href="include/other/Ashig sonirhliin zurchilgui medegdliin_mayagt.pdf">Ашиг сонирхлын мэдэгдлийн маягт</a></li>
                                </ul>
                            </li>
                            <li><a href="https://storymaps.arcgis.com/stories/afebec26c40d433d9b38ff4c9b0a0e7d">Орон зайн мэдээллийн сан</a></li>
                            <li><a href="include/other/NEG HOT.pdf">Барилгын түр хашааны загвар</a></li>
                            <!-- <li><a href="#">Барилга байгууламжийг ашиглалтад оруулах</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a class="nav-active" href="#">ИЛ ТОД БАЙДАЛ
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="#">Хүний нөөц
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                                <ul class="sub2-2">
                                    <li><a href="hr">Сул орон тоо</a></li>
                                    <li><a href="#">Хүний нөөцийн стратеги</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Худалдан авах ажиллагаа
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                                <ul class="sub2-3">
                                    <li><a href="#">ХАА-ны төлөвлөгөө</a></li>
                                    <li><a href="#">ХАА-ны тайлан</a></li>
                                    <li><a href="tender">Тендерийн урилга</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Үйл ажиллагааны тайлан</a></li>
                            <li><a href="#">Хууль, эрх зүй</a></li>
                            <li><a href="tushaal">Тушаал, шийдвэр</a></li>
                            <li><a href="https://shilendans.gov.mn/org/12924?group=0&year=2020">Шилэн данс</a></li>
                        </ul>
                    </li>
                    <li><a href="contactus">ХОЛБОО БАРИХ</a></li>
                </ul>
                <div class="nav-icon">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </nav>
        </div>
    </section>
    <!-- end of navbar -->

    <!-- content -->
    <section class = "contact-section">
        <div class = "contact-bg">
            <!-- <h3>Get in Touch with Us</h3> -->
            <h2>Нээлттэй ажлын байр</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="position">
        <div class="container">
            <div class="subcontainer">
                <div class="searchcontainer">
                    <div class="box">
                        <div class="search-box">
                            <input type="text" placeholder="Хайх" id="searchInput" onkeyup="tableSearch()">
                            <label for="" class="searchicon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="position">
                    <?php foreach($positions as $position):?>
                        <div class="position-box">
                            <a href="<?php echo $position['att_path']; ?>">
                                <h3><?php echo $position['job_title']; ?></h3>
                                <span class="date"><?php echo substr($position['date'],0,10); ?></span>
                                <div class="res">
                                    <h4 class="res-title">Ажлын чиг үүрэг</h4>
                                    <ul>
                                        <?php foreach($res_col as $res):?>
                                            <li><?php echo $res; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="req">
                                    <h4 class="res-title">Тавигдах шаардлага</h4>
                                    <ul>
                                        <?php foreach($req_col as $req):?>
                                            <li><?php echo $req; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end of content -->

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
                            <li><a href="https://shilendans.gov.mn/org/12924?group=0&year=2020">Шилэн данс</a></li>
                            <li><a href="contactus">Холбоо барих</a></li>
                        </ul>
                    </div>
                    <div class="footer-right">
                        <h3>Хаяг</h3>
                        <div>
                            <i class="fa-solid fa-location-dot"></i>
                            <p><span>Улаанбаатар хот-17100, Хан-Уул дүүрэг,</span>
                            <span>4-р хороо, Наадамчдын зам,</span>
                            <span>Улаанбаатар хотын Захиргааны байр 4, 5, 6-р давхар.</span></p>
                        </div>
                        <div>
                            <i class="fa-solid fa-phone"></i>
                            <p>(+976) 70118030, (+976) 70118040</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-envelope"></i>
                            <p>informations@standard.ub.gov.mn</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
    <!-- end of footer -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="assets/script.js"></script>
    <script src="/JSTable-master/dist/jstable.min.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
</body>
</html>