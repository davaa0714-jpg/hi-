<?php
$page = 'transparency';
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
    <link rel="stylesheet" href="assets/albanbichig.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Ил тод байдал | Хяналт шалгалтын газар</title>
</head>

<body>

    <!-- navbar -->
    <?php
    include("header.php")
    ?>

    <!-- end of navbar -->

    <!-- content -->
    <section class="contact-section">
        <div class="contact-bg">
            <h3>Албан бичиг, өргөдөл, гомдлын</h3>
            <h2>Шийдвэрлэлт</h2>
            <div class="line">
                <div></div>
                <!-- <div></div>
            <div></div> -->
            </div>
            <p class="text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="shiidverlelt">
        <div class="container">
            <div class="subcontainer">
                <h1>Өргөдөл гомдлын хагас жилийн тайлан, мэдээ (2025.01.02-2025.06.25)</h1>
                <br>
                <iframe src="include/alban bichig/хагас жил.pdf#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
            </div>
        </div>
    </section>

    <section id="shiidverlelt">
        <div class="container">
            <div class="subcontainer">
                <div class="shiidverlelt22">
                    <div class="intro">
                        <!-- <h3>Хотын стандарт, хяналтын газарт ирсэн албан бичиг, өргөдөл, гомдлын шийдвэрлэлтийн мэдээ</h3> -->
                        <span>2023-01-01-ээс 2023-09-25-ны байдлаар</span>
                        <div class="intro-boxes">
                            <div class="boxes">
                                <h2>4048</h2>
                                <p>Нийт ирсэн албан бичиг, өргөдөл, гомдол</p>
                            </div>
                            <div class="boxes">
                                <h2>3789</h2>
                                <p>Нийт шийдвэрлэсэн албан бичиг, өргөдөл, гомдол</p>
                            </div>
                            <div class="boxes">
                                <h2>259</h2>
                                <p>Судалж буй албан бичиг, өргөдөл, гомдол</p>
                            </div>
                            <div class="chart-box">
                                <canvas id="doughnut4"></canvas>
                            </div>
                            <div class="chart-box">
                                <canvas id="doughnut5"></canvas>
                            </div>
                            <div class="chart-box">
                                <canvas id="doughnut6"></canvas>
                            </div>
                        </div>
                        <div class="linegraph">
                            <canvas id="chart_line"></canvas>
                        </div>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div class="intro">
                        <!-- <h3>Хотын стандарт, хяналтын газарт ирсэн албан бичиг, өргөдөл, гомдлын шийдвэрлэлтийн мэдээ</h3> -->
                        <span>2022-01-01-ээс 2022-11-30-ны байдлаар</span>
                        <div class="intro-boxes">
                            <div class="boxes">
                                <h2>2469</h2>
                                <p>Нийт ирсэн албан бичиг, өргөдөл, гомдол</p>
                            </div>
                            <div class="boxes">
                                <h2>2399</h2>
                                <p>Нийт шийдвэрлэсэн албан бичиг, өргөдөл, гомдол</p>
                            </div>
                            <div class="boxes">
                                <h2>70</h2>
                                <p>Судалж буй албан бичиг, өргөдөл, гомдол</p>
                            </div>
                            <div class="chart-box">
                                <canvas id="doughnut"></canvas>
                            </div>
                            <div class="chart-box">
                                <canvas id="doughnut2"></canvas>
                            </div>
                            <div class="chart-box">
                                <canvas id="doughnut3"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="ab-wrapper">        
                        <div class="chart-box">
                            <canvas id="doughnut"></canvas>
                        </div>
                        <div class="chart-box">
                            <div>
                                <canvas id="barhorizontal"></canvas>
                            </div>
                        </div>
                    </div>              -->
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
                                <span>Хан-Уул дүүрэг 23-р хороо, Улаанбаатар хот</span>
                            </p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-stacked100@1.0.0"></script>
    <script src="assets/script.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
    <script src="assets/albanbichig.js"></script>

</body>

</html>