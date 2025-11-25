<?php
$page = 'contactus';
include('db_connection.php');

// Database-аас мэдээлэл авах
$contact_info = [];
$departments = [];
$staff_by_dept = [];

try {
    // Холбоо барих үндсэн мэдээлэл
    $contact_result = $conn->query("SELECT * FROM contact_info WHERE is_active = 1 ORDER BY order_index");
    if ($contact_result) {
        $contact_info = $contact_result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Хэлтэсүүд
    $dept_result = $conn->query("SELECT * FROM departments ORDER BY order_index, name");
    if ($dept_result) {
        $departments = $dept_result->fetch_all(MYSQLI_ASSOC);
        
        // Хэлтэс бүрийн ажилтнууд
        foreach ($departments as $dept) {
            $staff_result = $conn->query("SELECT * FROM staff WHERE department_id = {$dept['id']} AND is_active = 1 ORDER BY order_index, position");
            if ($staff_result) {
                $staff_by_dept[$dept['id']] = $staff_result->fetch_all(MYSQLI_ASSOC);
            }
        }
    }
} catch (Exception $e) {
    error_log("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/main.css">
  <link rel="stylesheet" href="assets/contact.css">
  <link rel="stylesheet" href="assets/contact_2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
  <title>Холбоо барих | Хяналт шалгалтын газар</title>
</head>

<body>
  <!-- navbar -->
  <?php include("header.php") ?>
  <!-- end of navbar -->

  <!-- content -->
  <section class="contact-section">
    <div class="contact-bg">
      <h2>Холбоо барих</h2>
      <div class="line">
        <div></div>
      </div>
      <p class="text">Хяналт шалгалтын газар</p>
    </div>

    <div class="contact-body">
      <div class="contact-info">
        <?php foreach ($contact_info as $info): ?>
          <div>
            <span><i class="<?php echo $info['icon_class']; ?>"></i></span>
            <span><?php echo htmlspecialchars($info['label']); ?></span>
            <span class="text"><?php echo nl2br(htmlspecialchars($info['value'])); ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="phone">
        <table id="phone">
          <tbody>
            <tr>
              <td>Албан тушаал</td>
              <td>Нэр</td>
              <td>Ажлын утасны дугаар</td>
            </tr>
            <?php foreach ($departments as $dept): ?>
              <tr>
                <td colspan="3" style="text-align: center; background: #f8f9fa; font-weight: bold;">
                  <?php echo htmlspecialchars($dept['name']); ?>
                </td>
              </tr>
              <?php if (isset($staff_by_dept[$dept['id']]) && !empty($staff_by_dept[$dept['id']])): ?>
                <?php foreach ($staff_by_dept[$dept['id']] as $staff): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($staff['position']); ?></td>
                    <td><?php echo htmlspecialchars($staff['name']); ?></td>
                    <td><?php echo htmlspecialchars($staff['phone'] ?: ''); ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" style="text-align: center;">Мэдээлэл байхгүй</td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

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
  </section>
  <!-- end of content -->

  <!-- footer -->
  <?php include("footer.php") ?>
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
</body>
</html>