      <div class="contact-form">
        <form action="contactform" method="post" id="form">
          <div>
            <input type="text" name="name" class="form-control" placeholder="Нэр" required>
            <input type="text" name="subject" class="form-control" placeholder="Гарчиг" required>
          </div>
          <div>
            <input type="email" name="mail" class="form-control" placeholder="И-мэйл хаяг" required>
            <input type="text" name="phone" class="form-control" placeholder="Утасны дугаар" required>
          </div>
          <textarea rows="5" name="message" placeholder="Санал хүсэлт" class="form-control" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Илгээх" onclick="successalert()">
        </form>

        <div>
          <img src="images/contact-png1.png" alt="">
        </div>
      </div>
    </div>

    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2676.3605273113653!2d106.83230931581456!3d47.87134667764446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d96958644cc472f%3A0x7250ea0d533006e6!2z0KXQvtGC0YvQvSDRgdGC0LDQvdC00LDRgNGCLCDRhdGP0L3QsNC70YLRi9C9INCz0LDQt9Cw0YA!5e0!3m2!1sen!2smn!4v1651460908842!5m2!1sen!2smn" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- <div class = "contact-footer">
        <h3>Follow Us</h3>
        <div class = "social-links">
          <a href = "#" class = "fab fa-facebook-f"></a>
          <a href = "#" class = "fab fa-twitter"></a>
          <a href = "#" class = "fab fa-instagram"></a>
          <a href = "#" class = "fab fa-linkedin"></a>
          <a href = "#" class = "fab fa-youtube"></a>
        </div>
      </div> -->
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
  <script>
    var form = document.getElementById('form');

    function successalert() {
      if (form.checkValidity()) {
        alert("Амжилттай илгээсэн");
      }
    }
  </script>