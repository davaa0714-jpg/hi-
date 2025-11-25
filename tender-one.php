<?php
include("app/db/db.php");

if (isset($_GET['id'])) {
    $tender = selectOne('tender', ['id' => $_GET['id']]);
}
$requirements = explode(";", $tender['requirement']);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/standard.css">
    <link rel="stylesheet" href="assets/aboutus.css">
    <link rel="stylesheet" href="assets/tender.css">
    <link rel="stylesheet" href="/JSTable-master/dist/jstable.css" />
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
            <h2>Тендерийн урилга</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="tender">
        <div class="container">
            <div class="subcontainer">
                <div class="tender" id="example">
                    <div class="tender-one">        
                        <h3><?php echo $tender['type']; ?></h3>
                        <span class="date"><?php echo $tender['date']; ?></span>
                        <div class="content-container">
                            <ol>
                                <li><span>Хотын стандарт, хяналтын газар</span> нь <span>"<?php echo $tender['title']; ?>”</span> <?php echo $tender['class']; ?> боловсруулах зорилгоор зөвлөх үйлчилгээний гэрээ байгуулах гэж байгаа тул зөвлөхийн үйлчилгээ үзүүлэх хүсэлтэй этгээдийг мэдүүлгээ ирүүлэхийг урьж байна.</li>
                                <li><?php echo $tender['brief']; ?></li>
                                <li>Мэдүүлгээ ирүүлж буй зөвлөх нь Төрийн болон орон нутгийн өмчийн хөрөнгөөр 
                                    бараа, ажил , үйлчилгээ худалдан авах тухай хуулийн 14-16 дугаар зүйлд заасан 
                                    шалгуур үзүүлэлт, шаардлагыг хангаж буйг нотлох баримтын хамт ирүүлнэ.


                            
                                </li>
                                <li>
                                    Сонирхсон этгээд нэмэлт мэдээллийг <span><?php echo $tender['start']; ?></span> хооронд авч болох бөгөөд мэдүүлгээ Худалдан авах ажиллагааны цахим систем (<a href="https://www.tender.gov.mn/mn/index/">www.tender.gov.mn</a>) хаягаар <span><?php echo $tender['end']; ?></span> дотор ирүүлнэ үү.
                                </li>
                            </ol>
                            <br>
                            <p>Монгол Улс, Улаанбаатар хот, Хан-Уул дүүрэг, 4-р хороо, Арцатын ам,<br> 
                                Наадамчдын зам 1200, Нийслэлийн нутгийн захиргааны төв цогцолбор, 5 давхар,<br> 
                                503 тоот өрөө, Утас: 70118040</p>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/llxx-lord-xxll/html-item-pagination/lib/hip.js"></script>

</body>
</html>