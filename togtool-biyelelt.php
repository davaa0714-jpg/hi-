<?php
include("app/db/db.php");

$tog_biyelelt3 = selectOne('togtoolbiyelelt', ['season' =>"3"]);
$tog_biyelelt2 = selectOne('togtoolbiyelelt', ['season' =>"2"]);
$tog_biyelelt1 = selectOne('togtoolbiyelelt', ['season' =>"1"]);

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
    <link rel="stylesheet" href="assets/togtool-biyelelt.css">
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
            <h2>Тогтоол, шийдвэрийн биелэлт</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="togtool-biyelelt">
        <div class="container">
            <div class="filter-container">
                <div class="filter-item third" data-filter="tog-biyelelt3"><span>III улирал</span></div>
                <div class="filter-item second" data-filter="tog-biyelelt2"><span>II улирал</span></div>
                <div class="filter-item first" data-filter="tog-biyelelt1"><span>I улирал</span></div>
            </div>
            <br>
            <div class="subcontainer">            
                <div class="tog-biyelelt3 biyelelt-wrapper">
                    <div class="biyelelt-pdf">        
                        <iframe id="pdf" src="include/togtool_biyelelt/<?php echo $tog_biyelelt3['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>           
                </div>
                <div class="tog-biyelelt2 biyelelt-wrapper">
                    <div class="biyelelt-pdf">        
                        <iframe id="pdf" src="include/togtool_biyelelt/<?php echo $tog_biyelelt2['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>                
                </div>
                <div class="tog-biyelelt1 biyelelt-wrapper">
                    <div class="biyelelt-pdf">        
                        <iframe id="pdf" src="include/togtool_biyelelt/<?php echo $tog_biyelelt1['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="assets/script.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
    <script src="assets/togtool-biyelelt.js"></script>

</body>
</html>