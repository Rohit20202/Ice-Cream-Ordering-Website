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

   if (isset($_POST['submit'])) {
       $select_user = $conn->prepare("SELECT * FROM `users` WHERE user_id = ? LIMIT 1");
       $select_user->execute([$user_id]);
       $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

       $prev_pass = $fetch_user['password'];
       $prev_image = $fetch_user['image'];

       $name =$_POST['name'];
       $name = filter_var($name, FILTER_SANITIZE_STRING);

       $email =$_POST['email'];
       $email = filter_var($email, FILTER_SANITIZE_STRING);

       //update name
       if (!empty($name)) {
       	$update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE user_id = ? ");
       	$update_name->execute([$name, $user_id]);
       	$success_msg[] = 'Name updated successfully';
       }

       //update email
       if (!empty($email)) {
       	$select_email = $conn->prepare("SELECT * FROM `users` WHERE user_id != ? AND email = ?");
       	$select_email->execute([$user_id, $email]);
       	if ($select_email->rowCount() > 0){
       		$warning_msg[] = 'Email already exists';
       	} else {
       	$update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE user_id = ?");
       	$update_email->execute([$email, $user_id]);
       	$success_msg[] = 'Email updated successfully';
       }
   }

   // update image
       $image = $_FILES['image']['name'];
       $image = filter_var($image, FILTER_SANITIZE_STRING);
       $ext = pathinfo($image, PATHINFO_EXTENSION);
       $rename = unique_id() . '.' . $ext;
   	$image_size = $_FILES['image']['size'];
       $image_tmp_name = $_FILES['image']['tmp_name'];
       $image_folder = 'uploaded_files/' . $rename;

       if (!empty($image)) {
       	if ($image_size > 2000000) {
       		$warning_msg[] = 'Image size is too large';
       	} else {
       		$update_email = $conn->prepare("UPDATE `users` SET image = ? WHERE user_id = ?");
       	    $update_email->execute([$rename, $user_id]);
       	    move_uploaded_file($image_tmp_name, $image_folder);

       	    if ($prev_image != '' && $prev_image != $rename){
       	    	unlink('uploaded_files/'.$prev_image);
       	    }
       	    $success_msg[] = 'Image updated successfully';
       	}
       }

       // Update password
       $empty_pass = 'da39a3ee5e6b4b0d32555fef95601890afd80709';
       $old_pass = sha1($_POST['old_pass']);
       $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);

       $new_pass = sha1($_POST['new_pass']);
       $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);

       $cpass = sha1($_POST['cpass']);
       $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

       if ($old_pass != $empty_pass) {
       if ($old_pass != $prev_pass) {
           $warning_msg[] = 'Old password not matched';
       } elseif ($new_pass != $cpass) {
           $warning_msg[] = 'Password do not match';
       } else {
           if ($new_pass != $empty_pass) {
              $update_pass = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
       	   $update_pass->execute([$cpass, $user_id]);
       	   $success_msg[] = 'Password updated successfully';
           } else {
           	$warning_msg[] = 'Please enter a new password';
           }
       }
   }
   }
   ?>

   <!DOCTYPE html>
   <html>
   <head>
   	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<title>Ice Cream Delights - Update Profile</title>
   	<link rel="stylesheet" type="text/css" href="css/user_style.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

      <!-- Boxicons CDN link -->
      <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
   </head>
   <body>
   	<?php include 'components/user_header.php'; ?>
<div class="banner">
   <div class="detail">
      <h1>update profile</h1>
      <p>keep your account information up to date. Edit your personal details to <br>ensure accurate and seamless service whenever you interact with your platform.</p>
      <span>
         <a href="home.php"></a>
         <i class="bx bx-right-arrow-alt"></i>profile
      </span>
   </div>
</div>
      

      <section class="form-container">
         <div class="heading">
            <h1>Update profile Details</h1>
            <img src="image/separator-img.png">
         </div>

         <form action="" method="post" enctype="multipart/form-data" class="register">
            <div class="img-box">
            	<img src="uploaded_files/<?= $fetch_profile['image']; ?>">
            </div>
            <div class="flex">
            	<div class="col">
            		<div class="input-field">
            			<p>Your Name <span>*</span></p>
            			<input type="text" name="name" placeholder="<?= $fetch_profile['name'];  ?>" class="box">
            		</div>
            		<div class="input-field">
      <p>Your Email <span>*</span></p>
      <input type="text" name="email" placeholder="<?= $fetch_profile['email']; ?>" class="box">
   </div>

   <div class="input-field">
      <p>Select Picture <span>*</span></p>
      <input type="file" name="image" accept="image/*" class="box">
   </div>

   <div class="col">
      <div class="input-field">
         <p>Old Password <span>*</span></p>
         <input type="password" name="old_pass" placeholder="Enter your old password" class="box">
      </div>

      <div class="input-field">
         <p>New Password <span>*</span></p>
         <input type="password" name="new_pass" placeholder="Enter your new password" class="box">
      </div>

      <div class="input-field">
         <p>Confirm Password <span>*</span></p>
         <input type="password" name="cpass" placeholder="Confirm your password" class="box">
      </div>
   </div>
    </div>
    <input type="submit" name="submit" value="update profile" class="btn">
         </form>
      </section>
   <?php include 'components/footer.php'; ?>

<!-- custom js link -->
<script src="js/user_script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/alerts.php'; ?>
   </body>
   </html>