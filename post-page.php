<?php
include("app/db/db.php");

if (isset($_GET['id'])) {
    $post = selectOne('post', ['id' => $_GET['id']]);
}

$post_imgs = explode(", ", $post['additional_img']);

$other_posts = selectAll('post' . " ORDER BY id DESC LIMIT 8");

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
    <link rel="stylesheet" href="/JSTable-master/dist/jstable.css" />
    <link rel="stylesheet" href="assets/news.css">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>Мэдээ, мэдээлэл | Хяналт шалгалтын газар</title>
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
            <h2>Мэдээ, мэдээлэл</h2>
            <div class = "line">
            <div></div>
            <!-- <div></div>
            <div></div> -->
            </div>
            <p class = "text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="dynamic-post">
        <div class="container">
            <div class="subcontainer">
                <div class="dynamicpost">
                    <h3 class="post-title"><?php echo $post['title']; ?></h3>
                    <span><?php echo substr($post['date'],0,10); ?></span>
                    <div class="att-img">
                        <img src="include/post_images/<?php echo $post['attach_path']; ?>" alt="">
                    </div>
                    <p><?php echo $post['content']; ?></p>
                    <div class="other-img">
                        <?php foreach($post_imgs as $post_img):?>
                            <div class="img-box">
                                <img src="include/post_images/<?php echo $post_img; ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <hr>
                <div class="other-posts">
                    <!--<h3 class="op-title1">Бусад мэдээ</h3>-->
                    <?php foreach($other_posts as $other): ?>
                        <a href="post-page?id=<?php echo $other['id']; ?>">
                            <div class="other-card">
                                <img src="include/post_images/<?php echo $other['attach_path']; ?>" alt="">
                                <div class="other-post-content">
                                    <h3 class="op-title2"><?php echo $other['title']; ?></h3>
                                    <!--<p><?php echo $other['content']; ?></p> -->
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
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
    <script src="/JSTable-master/dist/jstable.min.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script type="application/javascript">
        function tableSearch(){
            let input, filter, table, tr, td, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("mytable");
            tr = table.getElementsByTagName("tr");
            

            for(let i = 0; i < tr.length; i++){
                td = tr[i].getElementsByTagName("td")[0];
                if(td) {
                    txtValue = td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }
                    else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>