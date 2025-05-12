<?php
include("app/db/db.php");

$headlines = selectAll('post' . " ORDER BY id DESC LIMIT 5");
$page = 'home';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Хотын стандартын тогтолцоог хөгжүүлж хотын засаглал, бүтээн байгуулалт, бүтээгдэхүүн, үйлчилгээнд дэлхийн жишигт хүрсэн чанарыг нэвтрүүлж иргэдийн эрүүл аюулгүй орчинд амьдрах эрхийг хангах зорилго бүхий агентлаг юм.">
    <link rel="stylesheet" href="assets/main.css">
    <!--<link rel="stylesheet" href="assets/atg.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Хяналт шалгалтын газар</title>
</head>

<body>
    <!-- navbar -->
    <?php
    include("header.php")
    ?>



    <section id="name">
        <div class="container">
            <div style="display: flex;">
                <!-- <div class="subcontainer"><img src="images/УБСүлд_Үндсэн хувилбар_RGB.png" class="logo">
                    <img src="images/logomain.png" class="logo">
                </div> -->


                <div class="name">
                    <span class="sub-title">Нийслэлийн Засаг Даргын Хэрэгжүүлэгч Агентлаг</span>
                    <h1>НИЙСЛЭЛИЙН ХЯНАЛТ<span></span></h1>
                    <h1>ШАЛГАЛТЫН ГАЗАР<span></span></h1>
                </div>
            </div>

            <div class="card-wrapper">
                <a href="standards">
                    <div class="card"
                        data-hover="Үзэх">
                        <h2>52</h2>
                        <p>Хотын<br> стандарт</p>

                    </div>
                </a>
                <!-- <a href="standards_project">
                    <div class="card"
                        data-hover="Үзэх">
                        <h2>19</h2>
                        <p>Стандартын төсөл</p>
                    </div>
                </a> -->
            </div>
        </div>
    </section>
    <section id="slider">
        <div class="container">
            <div class="subcontainer">
                <div class="slider-wrapper">
                    <div class="controllers">
                        <div>
                            <h2>МЭДЭЭ, МЭДЭЭЛЭЛ</h2>
                        </div>
                        <div id="controls">
                            <button class="previous">
                                <i class="fa-solid fa-angle-left"></i>
                            </button>
                            <button class="next"><i class="fa-solid fa-angle-right"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="my-slider">
                        <?php foreach ($headlines as $headline): ?>
                            <div>
                                <div class="slide">
                                    <div class="slide-img">
                                        <img src="include/post_images/<?php echo $headline['attach_path']; ?>" alt="">
                                    </div>

                                    <div class="module fade">
                                        <span><?php echo substr($headline['date'], 0, 10); ?></span>
                                        <a href="post-page?id=<?php echo $headline['id']; ?>" class="post-content">
                                            <h3><?php echo $headline['title']; ?></h3>
                                            <p><?php echo $headline['content']; ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="readmore">
                    <a href="news">Цааш үзэх
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="subcontainer">
                <div class="services">
                    <h2>ҮЙЛЧИЛГЭЭ</h2>
                </div>
                <br>
                <div class="card-grid">
                    <a class="servicecard" href="commission">
                        <div class="card__background" style="background-image: url(images/service1.jpg)"></div>
                        <div class="card__content">
                            <!--<p class="card__category">Үйлчилгээ</p>-->
                            <h3 class="card__heading">Барилга, байгууламж ашиглалтад оруулах комиссын хуваарь</h3>
                        </div>
                    </a>
                    <a class="servicecard" href="spatialdb">
                        <div class="card__background" style="background-image: url(images/service2-2.jpg)"></div>
                        <div class="card__content">
                            <!--<p class="card__category">Үйлчилгээ</p>-->
                            <h3 class="card__heading">Орон зайн мэдээллийн сан</h3>
                        </div>
                    </a>
                    <a class="servicecard" href="include/other/NEG HOT.pdf">
                        <div class="card__background" style="background-image: url(images/service3-2.jpg)"></div>
                        <div class="card__content">
                            <!--<p class="card__category">Үйлчилгээ</p>-->
                            <h3 class="card__heading">Барилгын түр хашааны загвар</h3>
                        </div>
                        </li>
                        <a class="servicecard" href="standards">
                            <div class="card__background" style="background-image: url(images/service4.jpg)"></div>
                            <div class="card__content">
                                <!--<p class="card__category">Үйлчилгээ</p>-->
                                <h3 class="card__heading">Хотын стандартууд</h3>
                            </div>
                        </a>
                        <div>
                        </div>
                </div>
    </section>
    <section id="atg">
        <div class="container">
            <div class="subcontainer">
                <div class="atg-wrapper">
                    <div class="img-wrapper">
                        <div class="atg-logo">
                            <img src="images/logomain.png" alt="">
                        </div>
                        <div class="qr">
                            <img src="images/qr-code-sudalgaa.jpeg" alt="">
                        </div>
                    </div>
                    <div class="atg-left">
                        <h2>Төрийн үйлчилгээний сэтгэл ханамжийн судалгаа</h2>
                        <p>Энэхүү асуулгыг нийслэлийн нутгийн захиргааны байгууллагуудын үйл ажиллагаанд иргэдийн санал, хүсэлт, шүүмжлэлийг тусгах зорилготой юм. Таны хэлсэн санал, шүүмжлэлийг тус байгууллагын үйл ажиллагааг сайжруулах зорилгоор ашиглах тул иргэн та санал, асуулгад чин сэтгэлээсээ хандахыг хүсэж байна!</p>
                        <a href="https://docs.google.com/forms/d/1H78gW1VLVKHdivG5gfGj2J2SzB8b08siEYZv2NcszIo/viewform?edit_requested=true">судалгаа бөглөх</a>
                        <!-- <p>Авлигыг мэдээлэх:</p>
                        <a href="https://iaac.mn/gomdol-medeelel-uguh"><i class="fa-solid fa-comment-dots"></i>www.iaac.mn</a>
                        <a href=""><i class="fa-solid fa-phone"></i> (+976) 110</a> -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="text">
        <div class="container">
            <div class="subcontainer">
                <div class="wrapper">
                    <div class="words">
                        <span>Амьдрахад таатай</span>
                        <span>Аюулгүй</span>
                        <span>Иргэн төвтэй</span>
                        <span>Соёлтой</span>
                        <span>Амьдрахад таатай</span>
                    </div>
                    <p>Улаанбаатар хот</p>
                </div>
                <div class="goal">
                    <p>Нийслэлийн иргэдийн эрүүл аюулгүй орчинд амьдрах эрхийг хангах зорилтын хүрээнд хот байгуулалт, барилга, дэд бүтцийн салбарт хэрэгжих бүтээн байгуулалт, ашиглалт засварын ажил, үйлчилгээнд хууль тогтоомж, үндэсний болон хотын стандарт, нормыг мөрдүүлж, төрийн хяналт шалгалтын үр нөлөөтэй байдлыг сайжруулахад байгууллагын эрхэм зорилго оршино.</p>
                </div>
            </div>
        </div>
    </section>


    <?php

    include("svg.php")
    ?>
    <section id="faq">
        <div class="container">
            <div class="subcontainer">
                <div class="faq-left">
                    <h1 class="title">
                        <span>Нийслэл хотын</span>
                        <span>хөгжлийг чиглүүлэх</span>
                        <span>хотын стандартын</span>
                        <span>тогтолцоог бүрдүүлнэ.</span>
                    </h1>
                </div>
                <div class="faq-main">
                    <div class="faq-item">
                        <button class="faq-link">
                            Барилга, байгууламжийг ашиглалтад оруулах комисс ажиллуулах хүсэлт гаргахад ямар баримт бичгүүд шаардлагатай вэ?
                            <i class="fa-solid fa-plus icon"></i>
                            <!-- <i class="fa-solid fa-minus"></i> -->
                        </button>
                        <div class="answer">
                            <p>Барилга, байгууламжийг ашиглалтад оруулах хүсэлтийг дараах баримт бичгүүдтэй хавсарган ирүүлнэ. Үүнд: <br> - Комисс ажиллуулах хүсэлт. /Захиалагчаас/<br>- Захиалагчийн барилгын техникийн хяналтын нэгдсэн дүгнэлт<br>- Зураг төсөл зохиогчийн хяналтын нэгдсэн дүгнэлт<br>- Барилгын ажлын зөвшөөрлийн гэрчилгээ</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-link">
                            Ашиглалтад орж буй барилга, байгууламжийг мэдээллийн санд хэрхэн бүртгүүлэх вэ?
                            <i class="fa-solid fa-plus icon"></i>
                            <!-- <i class="fa-solid fa-minus"></i> -->
                        </button>
                        <div class="answer">
                            <p>Ашиглалтад орж буй барилга, байгууламжийн мэдээллийг комиссын хурлын шийдвэрийн дагуу "Үйлчилгээ - Орон зайн мэдээллийн сан" цэсээр дамжуулан бүртгүүлнэ. <br><a href="https://www.youtube.com/watch?v=64bWgGhlbnw">Заавар</a></p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-link">
                            Хотын стандартын баримт бичгийг хэрхэн үзэх вэ?
                            <i class="fa-solid fa-plus icon"></i>
                            <!-- <i class="fa-solid fa-minus"></i> -->
                        </button>
                        <div class="answer">
                            <p>Хотын стандартын баримт бичгүүд нь үнэ төлбөргүй бөгөөд "Хотын стандарт" цэсээр үзэж, татаж авах боломжтой. </p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-link">
                            Хотын стандартын төсөлд хэрхэн санал өгөх вэ?
                            <i class="fa-solid fa-plus icon"></i>
                            <!-- <i class="fa-solid fa-minus"></i> -->
                        </button>
                        <div class="answer">
                            <p>Хотын стандартын төсөлд иргэн, мэргэжлийн байгууллага бүр санал өгөх боломжтой бөгөөд зарлагдсан хугацаанд "Санал авч буй стандартын төсөл" цэсээр дамжуулан санал өгнө.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- video -->
    <section id="video">
        <div class="container">
            <div class="subcontainer">
                <div class="video">
                    <h2>ВИДЕО СУВАГ</h2>
                </div>
                <br>
                <div class="video-grid">
                    <div class="video-content">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3wV59xiVJw0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-content">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/DCwueMsr444" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-content">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/ccfg_GPexHk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <br>
                <div class="readmore">
                    <a href="https://www.youtube.com/channel/UCugdOyzQRzgZlo_XtT--rVA/videos">YouTube
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of video -->

    <section id="atg">
        <div class="container">
            <div class="subcontainer">
                <div class="atg-wrapper">
                    <div class="img-wrapper">
                        <div class="atg-logo">
                            <img src="images/AVLIGA_Logo.png" alt="">
                        </div>
                        <div class="qr">
                            <img src="images/qr-code.png" alt="">
                        </div>
                    </div>
                    <div class="atg-left">
                        <div class="avilga-intro">
                            <h2>Таны эрх, таны оролцоо.</h2>
                            <h2>Авлигад үгүй гэж хэлье!</h2>
                        </div>
                        <p>Авлигыг мэдээлэх:</p>
                        <a href="https://iaac.mn/gomdol-medeelel-uguh"><i class="fa-solid fa-comment-dots"></i>www.iaac.mn</a>
                        <a href=""><i class="fa-solid fa-phone"></i> (+976) 110</a>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section id="atg-2">
        <div class="container">
            <a href="https://iaac.mn/gomdol-medeelel-uguh">
                <div class="subcontainer">
                    <img src="images/ATG-3-transparent2.png" alt="">
                </div>
            </a>
        </div>
    </section>


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
    <!-- Second footer -->

    <!-- end of footer -->





    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="assets/script.js"></script>
    <script src="assets/forpoll.js"></script>
</body>

</html>