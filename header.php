<!DOCTYPE html>



<section id="header">
    <div class="header container">
        <nav class="navbar">
            <a href="index" style="display: flex; height: 75px; width: 100px; gap: 20px;">
                <img src="images/УБСүлд_Үндсэн хувилбар_RGB.png" class="logo"><img src="images/logomain.png" class="logo">


            </a>
            <ul class="nav-list">
                <li><a class="<?php if ($page == 'home') {
                                    echo 'nav-active';
                                } ?>" href="index">НҮҮР</a></li>
                <li><a class="<?php if ($page == 'aboutus') {
                                    echo 'nav-active';
                                } ?>" href="aboutus">БИДНИЙ ТУХАЙ</a></li>
                <!-- <li>
                        <a class="<?php if ($page == 'standards') {
                                        echo 'nav-active';
                                    } ?>" href="#">ХОТЫН СТАНДАРТ
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub">
                            <li><a href="standard-introduction">Хотын стандартын танилцуулга</a></li>
                            <li><a href="standards">Хотын стандарт</a></li>
                            <li><a href="standards_project">Санал авч буй стандартын төсөл</a></li>
                            <li><a href="flipbook">Цахим сэтгүүл</a></li>
                        </ul>
                    </li> -->
                <li>
                    <a class="<?php if ($page == 'services') {
                                    echo 'nav-active';
                                } ?>" href="#">ҮЙЛЧИЛГЭЭ
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="#">Барилга, байгууламжийг ашиглалтад оруулах
                                <i class="fa-solid fa-angle-down"></i>
                            </a>
                            <ul class="sub2">
                                <li><a href="https://e-mongolia.mn/service/barilga-baiguulamjiig-ashiglaltad-oruulakh-khuselt-khuleen-avakh-">Цахимаар хүсэлт гаргах</a></li>
                                <li><a href="commission">Комиссын хуваарь</a></li>
                                <li><a href="include/other/Саналын хуудас үүрэг даалгаврын биелэлт.pdf">Үүрэг даалгаврын биелэлтийн хуудас</a></li>
                                <li><a href="include/other/4- Мэд,тайлбарын маягт-.pdf">Ашиг сонирхлын мэдэгдлийн маягт</a></li>
                            </ul>
                        </li>
                        <li><a href="spatialdb">Орон зайн мэдээллийн сан</a></li>
                        <li><a href="technical-report">Барилгын техникийн дүгнэлт</a></li>
                        <li><a href="include/other/NEG HOT.pdf">Барилгын түр хашааны загвар</a></li>
                        <li><a href="survey">Сэтгэл ханамжийн судалгаа</a></li>
                        <!-- <li><a href="#">Барилга байгууламжийг ашиглалтад оруулах</a></li> -->
                    </ul>
                </li>
                <li>
                    <a class="<?php if ($page == 'transparency') {
                                    echo 'nav-active';
                                } ?>" href="#">ИЛ ТОД БАЙДАЛ
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="#">Хүний нөөцийн ил тод байдал
                            </a>
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="sub2-4">
                                <li><a href="att">Албан тушаалын тодорхойлолт</a></li>
                                <li><a href="hr-report">Хүний нөөцийн хөгжлийн тайлан</a></li>
                                <li><a href="positions">Нээлттэй ажлын байр</a> </li>
                                <!-- ЗАСАХ -->
                                <li><a href="performance-report">Төрийн жинхэнэ албан хаагчдын ажлын гүйцэтгэлийн тайлан, үнэлгээ</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Үйл ажиллагааны ил тод байдал</a>
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="sub2-4">
                                <li><a href="annual-report">Жилийн үйл ажиллагааны тайлан</a></li>
                                <li><a href="bodlogo-biyelelt">Бодлогын баримт бичгийн биелэлт</a></li>
                                <li><a href="togtool-biyelelt">Тогтоол, шийдвэрийн биелэлт</a></li>
                                <li><a href="albanbichig">Албан бичиг, өргөдөл гомдлын шийдвэрлэлт</a></li>
                                <li><a href="plan">Төлөвлөгөө</a></li>
                                <li><a href="legal">Хууль, эрх зүй</a></li>
                                <li><a href="tushaal">Тушаал, шийдвэр</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Төсөв, санхүүгийн ил тод байдал
                            </a>
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="sub2-4">
                                <li><a href="audit-report">Санхүүгийн тайлан</a></li>
                                <li><a href="tender">Тендерийн урилга</li>
                                <li><a href="https://shilendans.gov.mn/organization/30504">Шилэн данс</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Бусад мэдээллийн ил тод байдал</a>
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="sub2-4">

                                <li><a href="yoszui">Ёс зүйн дэд хороо</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li><a class="<?php if ($page == 'contactus') {
                                    echo 'nav-active';
                                } ?>" href="contactus">ХОЛБОО БАРИХ</a></li>
            </ul>
            <div class="nav-icon">
                <i class="fa-solid fa-bars"></i>
                <i class="fa-solid fa-xmark"></i>
            </div>
        </nav>
    </div>
</section>

</html>