<?php
include("app/db/db.php");

if (isset($_GET['id'])) {
    $standard = selectOne('standard_projects', ['id' => $_GET['id']]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/standard-one.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Стандартын төсөл | Хотын стандарт, хяналтын газар</title>
</head>
<body>

    <!-- navbar -->
    <section id="header">
        <div class="header container">
            <nav class="navbar">
                <a href="index"><img src="images/hot_goldoo_tsagaan_rounded3.png" class="logo"></a>
                <ul class="nav-list">
                    <li><a href="index">НҮҮР</a></li>
                    <li><a href="aboutus">БИДНИЙ ТУХАЙ</a></li>
                    <li>
                        <a class="nav-active" href="#">ХОТЫН СТАНДАРТ
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub">
                            <li><a href="standard-introduction">Хотын стандартын танилцуулга</a></li>
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
                                    <i class="fa-solid fa-angle-down"></i>
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
                            <li><a href="survey">Сэтгэл ханамжийн судалгаа</a></li>
                            <!-- <li><a href="#">Барилга байгууламжийг ашиглалтад оруулах</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="#">ИЛ ТОД БАЙДАЛ
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="positions">Нээлттэй ажлын байр
                                    <!--<i class="fa-solid fa-angle-down"></i>-->
                                </a>
                                <!--<ul class="sub2-2">-->
                                <!--    <li><a href="positions">Сул орон тоо</a></li>-->
                                <!--    <li><a href="#">Хүний нөөцийн стратеги</a></li>-->
                                <!--</ul>-->
                            </li>
                            <li>
                                <a href="tender">Тендерийн урилга
                                    <!--<i class="fa-solid fa-angle-down"></i>-->
                                </a>
                                <!--<ul class="sub2-3">-->
                                <!--    <li><a href="#">ХАА-ны төлөвлөгөө</a></li>-->
                                <!--    <li><a href="#">ХАА-ны тайлан</a></li>-->
                                <!--    <li><a href="tender">Тендерийн урилга</a></li>-->
                                <!--</ul>-->
                            </li>
                            <li><a href="plan">Төлөвлөгөө</a></li>
                            <li>
                                <a href="#">Тайлан мэдээ
                                    <i class="fa-solid fa-angle-down"></i>
                                </a>
                                <ul class="sub2-4">
                                    <li><a href="annual-report">Жилийн үйл ажиллагааны тайлан</a></li>
                                    <li><a href="#">Бодлогын баримт бичгийн биелэлт</a></li>
                                    <li><a href="togtool-biyelelt">Тогтоол, шийдвэрийн биелэлт</a></li>
                                    <li><a href="hr-report">Хүний нөөцийн хөгжлийн тайлан</a></li>
                                    <li><a href="albanbichig">Албан бичиг, өргөдөл гомдлын шийдвэрлэлт</a></li>
                                </ul>
                            </li>
                            <li><a href="legal">Хууль, эрх зүй</a></li>
                            <li><a href="tushaal">Тушаал, шийдвэр</a></li>
                            <li><a href="https://shilendans.gov.mn/org/17388">Шилэн данс</a></li>
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
            <h2>Стандартын төсөл</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хотын стандарт, хяналтын газар</p>
        </div>
    </section>

    <section id="standard-one">
        <div class="container">
            <div class="subcontainer">            
                <div class="standard-wrapper">
                    <div class="standard-name">
                        <span><?php echo $standard['code']; ?></span><h3><?php echo $standard['name']; ?></h3>
                    </div>
                    <div class="standard-info">
                        <p><?php echo $standard['info']?></p>
                    </div>
                    <div class="standard-pdf-project">        
                        <iframe id="pdf" src="include/standard_projects/<?php echo $standard['file_path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>           
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

                        <img src="images/LOGO_Hot_white.png" alt="">
                        <div class="socials">
                            <a href="https://www.facebook.com/urbanstandart"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCugdOyzQRzgZlo_XtT--rVA/videos"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                        <p class="footer-name">2022 &copy; Хотын стандарт, хяналтын газар</p>
                    </div>
                    <div class="footer-mid">
                        <h3>Холбоосууд</h3>
                        <ul class="box">
                            <li><a href="index">Нүүр</a></li>
                            <li><a href="aboutus">Бидний тухай</a></li>
                            <li><a href="https://shilendans.gov.mn/org/17388">Шилэн данс</a></li>
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
                            <p>info@standard.ub.gov.mn</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
    <!-- end of footer -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="assets/script.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</body>
</html>