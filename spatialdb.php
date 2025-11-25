<?php 
$page = 'services';
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <link rel="stylesheet" href="assets/basemap.css">
    <link rel="stylesheet" href="assets/MarkerCluster.css">
    <link rel="stylesheet" href="assets/MarkerCluster.Default.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Орон зайн мэдээллийн сан | Хяналт шалгалтын газар</title>
</head>
<body>

    <!-- navbar -->
    <?php 
        include("header.php")
    ?>
    <!-- end of navbar -->

    <!-- content -->
    <section class = "contact-section">
        <div class = "contact-bg">
            <!-- <h3>Get in Touch with Us</h3> -->
            <h2>Орон зайн мэдээллийн сан</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="dash-intro">
        <div class="intro-wrapper">
            <div class="subcontainer">
                <!-- <h3>Ашиглалтад орсон барилга байгууламжийн дашбоард</h3> -->
                <p>Нийслэлийн Засаг даргын 2020 оны А/1022 дугаар захирамжаар “Барилга байгууламжийг ашиглалтад оруулах комисс”-ийн бүрэлдэхүүнийг шинэчлэн баталснаар Хотын стандарт, хяналтын газар нь Барилга байгууламжийг ашиглалтад оруулах комиссын үйл ажиллагааг зохион байгуулж эхэлсэн. Үүнтэй холбогдуулан Улаанбаатар хотод шинээр ашиглалтад орж буй барилга байгууламжийн орон зайн мэдээллийн санг бүрдүүлж байгаа бөгөөд Нийтийн мэдээллийн ил тод байдлын тухай хуулийн хүрээнд олон нийтэд нээлттэйгээр түгээж байна. </p>
            </div>
            <div class="download">
                <a href="include/forDownloads/CityStandardsandControlAgency_res_com_buildings_XLSX.rar" download="CityStandardsandControlAgency_res_com_buildings_XLSX.rar"><i class="fa-solid fa-download"></i>*XLS татаж авах</a>
                <a href="include/forDownloads/CityStandardsandControlAgency_res_com_buildings_SHP.rar" download="CityStandardsandControlAgency_res_com_buildings_SHP.rar"><i class="fa-solid fa-download"></i>*SHP татаж авах</a>
            </div>
            <div class="alert">
                <p><i class="fa-solid fa-circle-exclamation"></i>Том дэлгэц ашиглавал илүү тохиромжтой</p>
            </div>
        </div>
    </section>
    <section id="map">
        <div class="container">
            <div class="subcontainer">          
                <p class="time-range">2020-08-01-ээс 2023-08-03-ны байдлаар</p>
                <div class="top-dash">
                    <div class="top-grid">
                        <h2 id="counter1">380</h2>
                        <p>Орон сууцны барилга</p>
                    </div>
                    <div class="top-grid">
                        <h2 id="counter2">409</h2>
                        <p>Олон нийтийн барилга</p>
                    </div>
                    <div class="top-grid">
                        <!-- <p>Ашиглалтад орсон барилга (сараар)</p> -->
                        <canvas id="chart1"></canvas>
                    </div>
                    <div class="top-grid">
                        <!-- <p>Ашиглалтад орсон барилга (сараар)</p> -->
                        <canvas id="chart1-alt"></canvas>
                    </div>
                </div>
                <div id='mapid' ></div>
                <div class="bottom-dash">
                    <div class="bottom-grid">
                        <p id="title" >Сүүлд ашиглалтад орсон</p>
                        <table>
                            <tr>
                                <td>хүүхэд эмэгтэйчүүд хамгаалах төвийн барилга</td>
                                <td>Сонгинохайрхан, 10-р хороо</td>
                                <td>2023-08-02</td>
                            </tr>
                            <tr>
                                <td>НОСК, 126 айлын орон сууц</td>
                                <td>Сонгинохайрхан, 6-р хороо</td>
                                <td>2023-08-02</td>
                            </tr>
                            <tr>
                                <td>НОСК, 126 айлын орон сууц - 2</td>
                                <td>Сонгинохайрхан, 6-р хороо</td>
                                <td>2022-08-02</td>
                            </tr>
                            <tr>
                                <td>Волтам Транс ХХК, 6 блок аялал жуулчлалын цогцолбор</td>
                                <td>Сүхбаатар, 15-р хороо</td>
                                <td>2023-08-01</td>
                            </tr>
                            <tr>
                                <td>Нью Тур ХХК, хүүхдийн сургалт, хөгжлийн төвийн байр</td>
                                <td>Чингэлтэй, 2-р хороо</td>
                                <td>2023-08-01</td>
                            </tr>
                            <tr>
                                <td>Батхэрэйд ХХК, 96 айлын орон сууц</td>
                                <td>Баянзүрх, 16-р хороо</td>
                                <td>2023-07-27</td>
                            </tr>
                            <tr>
                                <td>Иргэн Л.Чинбат, 13 давхар орон сууц</td>
                                <td>Хан-Уул, 16-р хороо</td>
                                <td>2023-07-27</td>
                            </tr>
                        </table>
                    </div>
                    <div class="bottom-grid">
                        <h2 id="counter3">6</h2>
                        <p>Өнгөрсөн 7 хоногт</p>
                    </div>
                    <div class="bottom-grid">
                        <h2>18</h2>
                        <p>Өнгөрсөн 30 хоногт</p>
                    </div>
                </div>
                <div class="last-dash">
                    <div class="last-grid">
                        <!-- <p>graph by year</p> -->
                        <canvas id="chart2"></canvas>
                    </div>
                    <div class="last-grid">
                        <!-- <p>graph by year</p> -->
                        <canvas id="chart3"></canvas>
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
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="include/residential_buildings_0105.geojson"></script> -->
    <!-- <script src="assets/residential_buildings_0105.js"></script> -->
    <script src="assets/residential_buildings_0807.js"></script>
    <script src="assets/commercial_buildings_0807.js"></script>
    <script src="leaflet-ajax-gh-pages/dist/leaflet.ajax.min.js"></script>
    <script src="assets/leaflet.markercluster.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="assets/map.js"></script>
    <script src="assets/dash_charts.js"></script>
    <script src="assets/dash_counter.js"></script>
    

</body>
</html>