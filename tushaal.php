<?php
include("app/db/db.php");

$tushaal = selectAll('tushaal', ['year' => !'2023']);
$tushaal23 = selectAll('tushaal', ['year' => '2023']);
$shiidver = selectAll('shiidver', ['year' => !'2023']);
$shiidver23 = selectAll('shiidver', ['year' => '2023']);

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
    <link rel="stylesheet" href="assets/tushaal.css">
    <link rel="stylesheet" href="assets/standard.css">
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
    <section class = "contact-section">
        <div class = "contact-bg">
            <!-- <h3>Get in Touch with Us</h3> -->
            <h2>Тушаал, шийдвэр</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="tushaal">
        <div class="container">
            <div class="filter-container year">
                <div class="filter-item year-item 2023" data-filter="tushaal23"><span>2023</span></div>
                <div class="filter-item year-item 2022" data-filter="tushaal22"><span>2022</span></div>
            </div>
            <div class="tushaal23">
                <div class="filter-container">
                    <div class="filter-item a-tushaal23 23-item" data-filter="tushaal-filter23"><span>Газрын даргын тушаал</span></div>
                    <div class="filter-item shiidver23 23-item" data-filter="shiidver-filter23"><span>Дээд газрын шийдвэр</span></div>
                </div>
                <br>
                <div class="subcontainer">            
                    <div id="a-tushaal23" class="tushaalshiidver tush">
                        <table id="table3">
                            <tbody>
                                <?php foreach($tushaal23 as $tush23): ?>
                                    <tr>
                                        <td><span><?php echo $tush23['number']; ?></span><span><?php echo $tush23['date']?></span><?php echo $tush23['title']; ?></td>
                                        <td><a href="tushaal-one?id=<?php echo $tush23['id']; ?>">үзэх <i class="fa-solid fa-arrow-right-long"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>          
                    </div>
                    <div id="shiidver23" class="tushaalshiidver shiid">
                        <table id="mytable2">
                            <tbody>
                                <?php foreach($shiidver23 as $shiid23): ?>
                                    <tr>
                                        <td><span><?php echo $shiid23['type']; ?></span><span><?php echo $shiid23['date']?></span><?php echo $shiid23['title']; ?></td>
                                        <td><a href="shiidver-one?id=<?php echo $shiid23['id']; ?>">үзэх <i class="fa-solid fa-arrow-right-long"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>                  
                    </div>
                </div>
            </div>
            <div class="tushaal22">
                <div class="filter-container">
                    <div class="filter-item a-tushaal22 22-item" data-filter="tushaal-filter22"><span>Газрын даргын тушаал</span></div>
                    <div class="filter-item shiidver22 22-item" data-filter="shiidver-filter22"><span>Дээд газрын шийдвэр</span></div>
                </div>
                <br>
                <div class="subcontainer">            
                    <div id="a-tushaal22" class="tushaalshiidver tush">
                        <table id="table4">
                            <tbody>
                                <?php foreach($tushaal as $tush): ?>
                                    <tr>
                                        <td><span><?php echo $tush['number']; ?></span><span><?php echo $tush['date']?></span><?php echo $tush['title']; ?></td>
                                        <td><a href="tushaal-one?id=<?php echo $tush['id']; ?>">үзэх <i class="fa-solid fa-arrow-right-long"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>          
                    </div>
                    <div id="shiidver22" class="tushaalshiidver shiid">
                        <table id="table5">
                            <tbody>
                                <?php foreach($shiidver as $shiid): ?>
                                    <tr>
                                        <td><span><?php echo $shiid['type']; ?></span><span><?php echo $shiid['date']?></span><?php echo $shiid['title']; ?></td>
                                        <td><a href="shiidver-one?id=<?php echo $shiid['id']; ?>">үзэх <i class="fa-solid fa-arrow-right-long"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>                  
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
    

    <script src="assets/script.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
    <script src="assets/tushaal.js"></script>

</body>
</html>