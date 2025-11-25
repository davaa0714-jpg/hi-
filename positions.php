<?php
include("app/db/db.php");

$positions23 = selectAll('position' . " WHERE year=2023 ORDER BY id DESC");
$positions22 = selectAll('position' . " WHERE year=2022 ORDER BY id DESC");
$positions21 = selectAll('position21' . " ORDER BY id DESC");

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
    <link rel="stylesheet" href="assets/positions.css">
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
            <!-- <h3>Get in Touch with Us</h3> -->
            <h2>Нээлттэй ажлын байр</h2>
            <div class="line">
                <div></div>
                <!-- <div></div>
            <div></div> -->
            </div>
            <p class="text">Хяналт шалгалтын газар</p>
        </div>
    </section>

    <section id="position">
        <div class="container">
            <div class="filter-container">
                <div class="filter-item 2025" data-filter="position25"><span>2025</span></div>
                <div class="filter-item 2024" data-filter="position24"><span>2024</span></div>
                <div class="filter-item 2023" data-filter="position23"><span>2023</span></div>
                <div class="filter-item 2022" data-filter="position22"><span>2022</span></div>
            </div>
            <br>
            <div class="subcontainer">
                <div class="position25">
                    <div class="pos-intro">
                        <div>
                            <h3>Төрийн жинхэнэ албан тушаалын сул орон тооны мэдээлэл, сонгон шалгаруулалтын захиалга</h3>
                            <span>2025-03-11</span>
                            <p><b>Ажилд томилогдох нөхцөл, шалгуур:</b></p>
                            <ol>

                                <li>Төрийн албаны ерөнхий шалгалт өгч тэнцсэн иргэд Төрийн албаны зөвлөлийн албан ёсны цахим хуудас <a href="https://exam.csc.gov.mn/">www.csc.gov.mn</a> -д ажлын байрны сонгон шалгаруулалтын <b>зар байршсаны дараа</b> шалгалтад бүртгүүлэн товлогдсон хугацаанд шалгалтыг өгнө.</li>
                            </ol>
                            <br>
                            <div class="pos-pdf">
                                <iframe id="pdf" src="include/position/Zar 2025.03.11.pdf#view=FitH&navpanes=0&toolbar=0"></iframe>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="position24">
                    <div class="pos-intro">
                        <div>
                            <h3>Төрийн жинхэнэ албан тушаалын сул орон тооны мэдээлэл, сонгон шалгаруулалтын захиалга</h3>
                            <span>2024-02-16</span>
                            <p><b>Ажилд томилогдох нөхцөл, шалгуур:</b></p>
                            <ol>

                                <li>Төрийн албаны ерөнхий шалгалт өгч тэнцсэн иргэд Төрийн албаны зөвлөлийн албан ёсны цахим хуудас <a href="https://exam.csc.gov.mn/">www.csc.gov.mn</a> -д ажлын байрны сонгон шалгаруулалтын <b>зар байршсаны дараа</b> шалгалтад бүртгүүлэн товлогдсон хугацаанд шалгалтыг өгнө.</li>
                            </ol>
                            <br>
                            <div class="pos-pdf">
                                <iframe id="pdf" src="include/position/ХСХГ-ын Сул орон тооны захиалга 2024.02.15 сайтад.pdf#view=FitH&navpanes=0&toolbar=0"></iframe>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="position23">
                    <div class="pos-intro">
                        <div>
                            <h3>Хотын стандарт, хяналтын газрын сул орон тооны мэдээлэл</h3>
                            <span>2023-08-30</span>
                            <p><b>Ажилд томилогдох нөхцөл, шалгуур:</b></p>
                            <ol>
                                <li>Төрийн албаны зөвлөлийн 2023 оны 25 дугаар тогтоолын дагуу Төрийн өөр байгууллага, нэгж хооронд шилжин ажиллахыг хүссэн Төрийн холбогдох бусад байгууллагад ажиллаж байгаа Төрийн жинхэнэ албан хаагчдыг Төрийн албаны тухай хуулийн дагуу шилжүүлэн авч ажиллуулна. </li>
                                <li>Төрийн албаны ерөнхий шалгалт өгч тэнцсэн нөөцөд байгаа иргэд Төрийн албаны зөвлөлийн албан ёсны цахим хуудас болох <a href="https://exam.csc.gov.mn/">www.csc.gov.mn</a> -д дараах ажлын байрны сонгон шалгаруулалтын мэдээлэл байршсаны дагуу шалгалтад бүртгүүлэн товлогдсон хугацаанд шалгалтыг өгч тэнцэн албан тушаалд томилогдоно.</li>
                            </ol>
                            <br>
                            <p><b>Ажлын байрны жагсаалт:</b></p>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>№</td>
                                        <td>Албан тушаалын нэр</td>
                                        <td>Орон тоо</td>
                                        <td>Ангилал, зэрэглэл</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Дотоод хяналт, шинжилгээний хэлтсийн дарга</td>
                                        <td>1</td>
                                        <td>ТЗ-4</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Барилгын стандарт, аюулгүй байдлын хяналтын хэлтсийн дарга</td>
                                        <td>1</td>
                                        <td>ТЗ-4</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Дэд бүтцийн стандарт, хяналтын хэлтсийн дарга</td>
                                        <td>1</td>
                                        <td>ТЗ-4</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Захиргаа, санхүүгийн хэлтсийн Хууль, эрх зүй хариуцсан мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Захиргаа, санхүүгийн хэлтсийн Хүний нөөцийн сургалт, судалгааны мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Захиргаа, санхүүгийн хэлтсийн Тайлан, мэдээ хариуцсан мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Дотоод хяналт, шинжилгээний хэлтсийн Дотоод хяналт, шалгалт хариуцсан улсын ахлах байцаагч</td>
                                        <td>2</td>
                                        <td>ТЗ-6</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Дотоод хяналт, шинжилгээний хэлтсийн Хяналт, шинжилгээ, үнэлгээний мэргэжилтэн</td>
                                        <td>2</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Барилгын стандарт, аюулгүй байдлын хяналтын хэлтсийн Барилгын техникийн хяналтын улсын байцаагч (барилга)</td>
                                        <td>3</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Барилгын стандарт, аюулгүй байдлын хяналтын хэлтсийн Барилгын техникийн хяналтын улсын байцаагч (хот байгуулалт)</td>
                                        <td>1</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Барилгын стандарт, аюулгүй байдлын хяналтын хэлтсийн Барилгын техникийн хяналтын улсын байцаагч (усан хангамж, ариутгах татуурга)</td>
                                        <td>1</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Барилгын стандарт, аюулгүй байдлын хяналтын хэлтсийн Барилгын техникийн хяналтын улсын байцаагч (барилгын материал)</td>
                                        <td>1</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Барилгын стандарт, аюулгүй байдлын хяналтын хэлтсийн Барилга байгууламжийн хяналт хариуцсан мэргэжилтэн</td>
                                        <td>3</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Дэд бүтцийн стандарт, хяналтын хэлтсийн Эрчим хүчний хяналтын улсын байцаагч</td>
                                        <td>2</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Дэд бүтцийн стандарт, хяналтын хэлтсийн Харилцаа, холбооны хяналтын улсын байцаагч</td>
                                        <td>2</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Дэд бүтцийн стандарт, хяналтын хэлтсийн Газрын тос, хийн хяналтын улсын байцаагч</td>
                                        <td>1</td>
                                        <td>ТЗ-7</td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Дэд бүтцийн стандарт, хяналтын хэлтсийн Дэд бүтцийн хяналт хариуцсан мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Барилга байгууламжийн ашиглалт, бүртгэлийн хэлтсийн Барилга байгууламж хариуцсан мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Барилга байгууламжийн ашиглалт, бүртгэлийн хэлтсийн Усан хангамж, ариутгах татуурга хариуцсан мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>Барилга байгууламжийн ашиглалт, бүртгэлийн хэлтсийн Дулаан хангамж, агаар сэлгэлт хариуцсан мэргэжилтэн</td>
                                        <td>1</td>
                                        <td>ТЗ-8</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p><b>Тавигдах болзол, шаардлага:</b></p>
                            <ul>
                                <li>Төрийн жинхэнэ албан тушаалд зохих ёсоор томилогдсон байх;</li>
                                <li>Зарлагдсан албан тушаалтай адил төрөл болон адил ангилалд ажилладаг байх;</li>
                                <li>Зарлагдсан албан тушаалын тодорхойлолтод заасан тусгай шаардлагыг хангасан байх;</li>
                            </ul>
                            <p><b>Бүрдүүлэх материал:</b></p>
                            <ul>
                                <li>Төрийн албан хаагчийн анкет;</li>
                                <li>Иргэний үнэмлэхийн хуулбар;</li>
                                <li>Боловсролын түвшинг тодорхойлсон баримт бичиг /диплом/, хэрэв гадаад улсад их, дээд сургууль төгссөн бол боловсролын баримт бичгийн баталгаат орчуулгыг хавсаргах;</li>
                                <li>Мэргэшүүлэх сургалтад хамрагдсаныг гэрчлэх баримт бичиг;</li>
                                <li>Нийгмийн даатгалын дэвтэр /Хөдөлмөрийн дэвтэр/-ийн хуулбар, цахим лавлагаа;</li>
                                <li>Албан тушаалд томилогдсон, чөлөөлөгдсөн тушаал, шийдвэрийн бүх хуулбарууд;</li>
                                <li>Төрийн жинхэнэ албаны тангараг өргөсөн “Тангаргийн хуудас” хуулбар;</li>
                                <li>Сүүлийн гурван жилийн төрийн албан хаагчийн үйл ажиллагааны үр дүн, мэргэшлийн түвшинг үнэлсэн илтгэх хуудас, төрийн жинхэнэ албан хаагчийн гүйцэтгэлийн төлөвлөгөөний үнэлгээ;</li>
                                <li>Иргэний эрүүгийн хариуцлага хүлээж байгаагүй тухай тодорхойлолт /e-mongolia/.</li>
                            </ul>
                            <p><b>Материал хүлээн авах хугацаа, хаяг:</b></p>
                            <ul>
                                <li>Хугацаа: <i>2023 оны 08-р сарын 30-ны өдрөөс 09 сарын 06-ны өдрийн 12:00 цаг хүртэл;</i></li>
                                <li>Хүлээн авах хаяг: <u>urbanstandardofcity@gmail.com </u>цахим шуудангаар ирүүлэх;</li>
                                <li>Холбоо барих утас: 70118040-1119, Хүний нөөцийн ахлах мэргэжилтэн 9099-6669</li>
                            </ul>
                            <p>Ирүүлсэн материалтай танилцан бид эргэн холбогдож хариуг өгөх болно. </p>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <br>
                        <div class="alt-intro">
                            <h3>Хотын стандарт, хяналтын газрын Төрийн захиргааны албан тушаалд шилжүүлэх, сэлгэн авах ажлын байрны жагсаалт</h3>
                            <span>2023-06-06</span>
                            <p>Төрийн албаны зөвлөлийн 2023 оны 25 дугаар тогтоолын дагуу Төрийн өөр байгууллага, нэгж хооронд шилжин ажиллахыг хүссэн төрийн холбогдох бусад байгууллагад ажиллаж байгаа Төрийн жинхэнэ албан хаагчдыг дараах албан тушаалд холбогдох материалаа цахим шуудангаар ирүүлэхийг урьж байна. </p>
                            <p><b>Тавигдах болзол, шаардлага:</b></p>
                            <ul>
                                <li>Төрийн жинхэнэ албан тушаалд зохих ёсоор томилогдсон байх;</li>
                                <li>Зарлагдсан албан тушаалтай адил төрөл болон адил ангилалд ажилладаг байх;</li>
                                <li>Зарлагдсан албан тушаалын тодорхойлолтод заасан тусгай шаардлагыг хангасан байх;</li>
                            </ul>
                            <p><b>Бүрдүүлэх материал:</b></p>
                            <ul>
                                <li>Төрийн албан хаагчийн анкет;</li>
                                <li>Иргэний үнэмлэхийн хуулбар;</li>
                                <li>Боловсролын түвшинг тодорхойлсон баримт бичиг /диплом/, хэрэв гадаад улсад их, дээд сургууль төгссөн бол боловсролын баримт бичгийн баталгаат орчуулгыг хавсаргах;</li>
                                <li>Мэргэшүүлэх сургалтад хамрагдсаныг гэрчлэх баримт бичиг;</li>
                                <li>Нийгмийн даатгалын дэвтэр /Хөдөлмөрийн дэвтэр/-ийн хуулбар, цахим лавлагаа;</li>
                                <li>Албан тушаалд томилогдсон, чөлөөлөгдсөн тушаал, шийдвэрийн бүх хуулбарууд;</li>
                                <li>Төрийн жинхэнэ албаны тангараг өргөсөн “Тангаргийн хуудас” хуулбар;</li>
                                <li>Сүүлийн гурван жилийн төрийн албан хаагчийн үйл ажиллагааны үр дүн, мэргэшлийн түвшинг үнэлсэн илтгэх хуудас, төрийн жинхэнэ албан хаагчийн гүйцэтгэлийн төлөвлөгөөний үнэлгээ;</li>
                                <li>Иргэний эрүүгийн хариуцлага хүлээж байгаагүй тухай тодорхойлолт /e-mongolia/.</li>
                            </ul>
                            <p><b>Материал хүлээн авах хугацаа, хаяг:</b></p>
                            <ul>
                                <li>Хугацаа: <i>2023 оны 06-р сарын 06-ний өдрөөс 06 сарын 12-ны өдрийн 15:00 цаг хүртэл;</i></li>
                                <li>Хүлээн авах хаяг: urbanstandardofcity@gmail.com цахим шуудангаар ирүүлэх;</li>
                                <li>Холбоо барих утас: 70118040-1119.</li>
                            </ul>
                            <div class="pos-pdf">
                                <iframe id="pdf" src="include/position/Хавсралт 2023.06.06.pdf#view=FitH&navpanes=0&toolbar=0"></iframe>
                            </div>
                        </div>

                        <br>
                        <br>
                        <hr>
                        <br>
                        <?php foreach ($positions23 as $pos23): ?>
                            <h3>Хотын стандарт, хяналтын газрын сул орон тооны мэдээлэл</h3>
                            <span><?php echo $pos23['date']; ?></span>
                            <br>
                            <br>
                            <div class="pos-pdf">
                                <iframe id="pdf" src="<?php echo $pos23['pdf']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <br>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="position22">
                    <div class="pos-intro">
                        <?php foreach ($positions22 as $pos22): ?>
                            <h3>Хотын стандарт, хяналтын газрын сул орон тооны мэдээлэл</h3>
                            <span><?php echo $pos22['date']; ?></span>
                            <p>Дараах сул орон тооны сонгон шалгаруулалтад оролцохыг хүссэн иргэд Төрийн албаны зөвлөлийн албан ёсны цахим хуудас болох <a href="https://csc.gov.mn">www.csc.gov.mn</a> сайтад байршсаны дараа тухайн албан тушаалын сул орон тооны дэлгэрэнгүй мэдээлэлтэй танилцан шалгалтад цахимаар бүртгүүлэн сонгон шалгаруулалтад оролцохыг хүсье. </p>
                            <br>
                            <div class="pos-pdf">
                                <iframe id="pdf" src="<?php echo $pos22['pdf']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <br>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="position21">
                    <div class="pos-intro">
                        <?php foreach ($positions21 as $pos21): ?>
                            <h3>Хотын стандарт, хяналтын газрын сул орон тооны мэдээлэл</h3>
                            <span><?php echo $pos21['date']; ?></span>
                            <p>Дараах сул орон тооны сонгон шалгаруулалтад оролцохыг хүссэн иргэд Төрийн албаны зөвлөлийн албан ёсны цахим хуудас болох <a href="https://csc.gov.mn">www.csc.gov.mn</a> сайтад байршсаны дараа тухайн албан тушаалын сул орон тооны дэлгэрэнгүй мэдээлэлтэй танилцан шалгалтад цахимаар бүртгүүлэн сонгон шалгаруулалтад оролцохыг хүсье. </p>
                            <br>
                            <div class="pos-pdf">
                                <iframe id="pdf" src="<?php echo $pos21['pdf']; ?>#view=FitH&navpanes=0&toolbar=0" frameborder="0"></iframe>
                            </div>
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
    <script src="assets/script.js"></script>
    <script src="assets/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>
    <script src="assets/pager.js"></script>
    <script src="assets/position.js"></script>

</body>

</html>