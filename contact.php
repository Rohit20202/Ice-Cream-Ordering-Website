  <?php
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   } else {
      $user_id = '';
   }

   if (isset($_POST['send_message'])) {
    if ($user_id != '') {
        $id = unique_id();
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $subject = $_POST['subject'];
        $subject = filter_var($subject, FILTER_SANITIZE_STRING);
        $message = $_POST['message'];
        $message = filter_var($message, FILTER_SANITIZE_STRING);

        $verify_message = $conn->prepare("SELECT * FROM `message` WHERE user_id = ? AND name = ? AND email = ? AND subject = ? AND message = ?");
        $verify_message->execute([$user_id, $name, $email, $subject, $message]);

        if ($verify_message->rowCount() > 0) {
            $warning_msg[] = 'message already exists';
        } else {
            $insert_message = $conn->prepare("INSERT INTO `message` (id, user_id, name, email, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_message->execute([$id, $user_id, $name, $email, $subject, $message]);
            $success_msg[] = 'comment inserted successfully';
        }
} else {
    $warning_msg[] = 'Please login first';
}
        }

   ?>
   <!DOCTYPE html>
      <html>
      <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Ice cream Delights - Contact Us Page</title>

         <link rel="stylesheet" type="text/css" href="css/user_style.css">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

         <!-- Boxicons CDN link -->
      <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
      </head>
      <body>

   
      <?php include 'components/user_header.php'; ?>
   <div class="banner">
      <div class="detail">
         <h1>contact us page</h1>
         <p>Have any questions or need support? Feel free to reach out to us. <br> Our team is here to help with any inquiries or assistance you need.</p>
            <a href="home.php">home</a>
            <i class="bx bx-right-arrow-alt"></i>contact us page
         </span>
      </div>
   </div>
    <div class="services">
    <div class="heading">
        <h1>Our Services</h1>
        <p>Just a few clicks to purchase products from us, saving your time and money</p>
        <img src="image/separator-img.png">
    </div>

    <div class="box-container">
        <div class="box">
            <img src="image/0.png">
            <div>
                <h1>Free Shipping Fast</h1>
                <p>Enjoy fast and free shipping on all orders, ensuring you receive your products quickly and with no additional cost</p>
            </div>
        </div>

        <div class="box">
            <img src="image/1.png">
            <div>
                <h1>money back & guarantee</h1>
                <p>Your satisfaction is our priority. If you are not happy with your purchase, we offer a hassle-free money back guarantee</p>
            </div>
        </div>

        <div class="box">
            <img src="image/2.png">
                        <div>
                <h1>Online support 24/7</h1>
                <p>Our support team is available around the clock to assist you with questions or issues you may have.</p>
            </div>
        </div>
    </div>
</div>

<div class="form-container">
    <div class="heading">
        <h1>Drop us a Line</h1>
        <p>Just a few clicks to purchase products from us, saving your time and money</p>
        <img src="image/separator-img.png" alt="Separator Image">
    </div>

    <form action="" method="post" class="register">
        <div class="input-field">
            <label>name <sup>*</sup></label>
            <input type="text" name="name" required placeholder="Enter your name" class="box">
        </div>

        <div class="input-field">
            <label>email <sup>*</sup></label>
            <input type="email" name="email" required placeholder="Enter your email" class="box">
        </div>

        <div class="input-field">
            <label>subject <sup>*</sup></label>
            <input type="text" name="subject" required placeholder="Reason..." class="box">
        </div>

        <div class="input-field">
            <label>comment <sup>*</sup></label>
            <textarea name="message" cols="30" rows="10" required placeholder="Your Comment..." class="box"></textarea>
        </div>

        <button type="submit" name="send_message" class="btn">Send Message</button>
    </form>
</div>
<div class="address">
    <div class="heading">
        <h1>Our Contact Details</h1>
        <p>Just a few clicks to purchase products from us, saving your time and money</p>
        <img src="image/separator-img.png">
    </div>

    <div class="box-container">
        <div class="box">
            <i class="bx bxs-map-alt"></i>
            <div>
                <h4>Address</h4>
                <p>132, My Street <br> Kingston, New York 12401</p>
            </div>
        </div>

        <div class="box">
    <i class="bx bxs-phone-incoming"></i>
    <div>
        <h4>Phone Number</h4>
        <p>(+1) 331-233-0909</p>
        <p>(+1) 331-333-0909</p>
    </div>
</div>

<div class="box">
    <i class="bx bxs-envelope"></i>
    <div>
        <h4>Email</h4>
        <p>nyemma118@gmail.com</p>
        <p>nyemma118@gmail.com</p>
    </div>
</div>
</div>
</div>
        
       <!--custom js link -->
      <script src="js/user_script.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <?php include 'components/alerts.php'; ?>

   

      </body>
      </html>

