 <?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
   $select_profile = $conn->prepare("SELECT * FROM `users` WHERE user_id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
   $select_orders->execute([$user_id]);
   $total_orders = $select_orders->rowCount();

   $select_message = $conn->prepare("SELECT * FROM `message` WHERE user_id = ?");
   $select_message->execute([$user_id]);
   $total_orders = $select_orders->rowCount();
   ?>

   <!DOCTYPE html>
   <html>
   <head>
   	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<title>Ice Cream Delights -User Profile</title>
   	<link rel="stylesheet" type="text/css" href="css/user_style.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

      <!-- Boxicons CDN link -->
      <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
   </head>
   <body>
 
      <?php include 'components/user_header.php'; ?>
<div class="banner">
   <div class="detail">
      <h1>profile</h1>
      <p>View and manage your account informtion all in one place.<br>keep your details updated for a personalized experience.</p>
      <span>
         <a href="home.php">home</a>
         <i class="bx bx-right-arrow-alt"></i>profile
      </span>
   </div>
</div>

<section class="profile">
   <div class="heading">
      <h1>Profile Details</h1>
      <img src="image/separator-img.png">
   </div>
         <div class="details">
            <div class="user">
               <img src="uploaded_files/<?= $fetch_profile['image']; ?>">
               <h3 class="name"><?= $fetch_profile['name']; ?></h3>
               <span></span>
               <a href="update.php" class="btn">Update Profile</a>
            </div>

            <div class="box-container">
   <div class="box">
      <div class="flex">
         <i class="bx bxs-folder-minus"></i>
         <h3><?= $total_orders; ?></h3>
      </div>
      <a href="orders.php" class="btn">View Orders</a>
   </div>

   <div class="box">
      <div class="flex">
         <i class="bx bxs-chat"></i>
         <h3><?= $total_orders; ?></h3>
      </div>
      <a href="#" class="btn">View Messages</a>
   </div>
</div>
</section>

<?php include 'components/footer.php'; ?>

<!-- custom js link -->
<script src="js/user_script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/alerts.php'; ?>

</body>
</html>