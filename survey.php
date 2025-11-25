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
    <link rel="stylesheet" href="assets/survey.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Сэтгэл ханамжийн судалгаа | Хяналт шалгалтын газар</title>
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
            <h2>Сэтгэл ханамжийн судалгаа</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="survey">
        <div class="container">
            <div class="subcontainer">  
                <div class="para">
                    <p>Иргэд, олон нийтэд үзүүлж буй үйлчилгээний чанар, хүртээмжийг тодорхойлох, сайжруулах зорилгоор энэхүү судалгааг авч байна.</p> 
                </div>
                <div class="link">
                    <a href="https://forms.gle/AXyAstBrCz27W8DM8">Судалгаа өгөх</a>
                </div>
                <div class="form">
                    <!--<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdtxCZn4HJUDuj9uwA49_jq8Nx9RV2pj8zMG0KgY3b_obf6Ig/viewform?embedded=true" width="840" height="3730" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>-->
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdH7An1ShtGd6VCokWEQonmfxYCBVKeUHrN82FbJYIAN1mnTQ/viewform?embedded=true" width="640" height="2075" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
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
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="assets/flipbook.js"></script>
   
    

</body>
</html>