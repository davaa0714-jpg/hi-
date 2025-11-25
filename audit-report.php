<?php
include("app/db/db.php");

$audit23 = selectOne('auditrep', ['year' =>"2023"]);
$audit22 = selectOne('auditrep', ['year' =>"2022"]);
$audit21 = selectOne('auditrep', ['year' =>"2021"]);
$audit20 = selectOne('auditrep', ['year' =>"2020"]);
$audit19 = selectOne('auditrep', ['year' =>"2019"]);

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
    <link rel="stylesheet" href="assets/audit-report.css">
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
            <h2>Санхүүгийн тайлан</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="auditreport">
        <div class="container">
            <div class="filter-container">
                <div class="filter-item 2023" data-filter="audit23"><span>2023</span></div>
                <div class="filter-item 2022" data-filter="audit22"><span>2022</span></div>
                <div class="filter-item 2021" data-filter="audit21"><span>2021</span></div>
                <div class="filter-item 2020" data-filter="audit20"><span>2020</span></div>
                <div class="filter-item 2019" data-filter="audit19"><span>2019</span></div>
            </div>
            <br>
            <div class="subcontainer">  
                <div class="audit23 audit-wrapper">
                    <div class="audit-pdf">        
                        <iframe id="pdf" src="include/auditreport/<?php echo $audit23['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>  
                    </div>           
                </div>
                <div class="audit22 audit-wrapper">
                    <div class="audit-pdf">        
                        <iframe id="pdf" src="include/auditreport/<?php echo $audit22['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>           
                </div>
                <div class="audit21 audit-wrapper">
                    <div class="audit-pdf">        
                        <iframe id="pdf" src="include/auditreport/<?php echo $audit21['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>                
                </div>
                <div class="audit20 audit-wrapper">
                    <div class="audit-pdf">        
                        <iframe id="pdf" src="include/auditreport/<?php echo $audit20['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                    </div>                
                </div>
                <div class="audit19 audit-wrapper">
                    <div class="audit-pdf">        
                        <iframe id="pdf" src="include/auditreport/<?php echo $audit19['path']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
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
    <script src="assets/audit-report.js"></script>

</body>
</html>