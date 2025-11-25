<?php
include("app/db/db.php");

$bb22comms = selectAll('commission_bb_22' . " ORDER BY id DESC");
$zt22comms = selectAll('commission_zt_22' . " ORDER BY id DESC");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/commission.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Комиссын хуваарь | Хяналт шалгалтын газар</title>
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
            <!-- <h3>Барилга байгууламж ашиглалтад оруулах</h3> -->
            <h2>Комиссын хуваарь</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="commission">
        <div class="container">
            <div class="filter-container">
                <div class="filter-item barilga" data-filter="barilga"><span>Барилга байгууламж</span></div>
                <div class="filter-item zasvar" data-filter="zasvar"><span>Засвар, тохижилт</span></div>
            </div> 
            <div class="subcontainer">
                <div class="com-content">
                    <div class="bb data">
                        <?php foreach($bb22comms as $bb22comm): ?>
                            <a href="commission-one?id=<?php echo $bb22comm['id']; ?>">
                                <div class="com-card">
                                    <div class="week"><span><?php echo $bb22comm['date_range']; ?></span></div>
                                    <!--<div class="approved">Баталсан: <?php echo $bb22comm['date_approved']; ?></div>-->
                                </div></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="zsh data">
                        <?php foreach($zt22comms as $zt22comm): ?>
                            <a href="commission-one-zt?id=<?php echo $zt22comm['id']; ?>">
                                <div class="com-card">
                                    <div class="week"><span><?php echo $zt22comm['date_range']; ?></span></div>
                                    <!--<div class="approved">Баталсан: <?php echo $zt22comm['date_approved']; ?></div>-->
                                </div></a>
                        <?php endforeach; ?>
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
    <script src="/JSTable-master/dist/jstable.min.js"></script>
    <!-- <script src="app.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/pager.js"></script>
    <script src="assets/commission.js"></script>
</body>
</html>