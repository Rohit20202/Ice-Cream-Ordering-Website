   <?php
   include '../components/connect.php';

   if(isset($_COOKIE['seller_id'])) {
      $seller_id = $_COOKIE['seller_id'];
   } else {
      $seller_id = '';
      header('Location: login.php');
      exit();
   }

   // add product to the database
   if (isset($_POST['publish'])) {

      $id = unique_id();
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
      $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
      $stock = filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
      $status = 'active';

      $image = $_FILES['image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../uploaded_files/'.$image;

      $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
   $select_image->execute([$image, $seller_id]);

   if(isset($image)) {
      if($select_image->rowCount() > 0) {
         $warning_msg[] = 'image name repeated';
      } elseif ($image_size > 2000000) {
         $warning_msg[] = 'image size is too large';
      } else {
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   } else {
      $image = '';
   }

   if($select_image->rowCount() > 0 && $image != '') {
      $warning_msg[] = 'please rename your image';
   } else {
      $insert_product = $conn->prepare(
         "INSERT INTO `products` (id, seller_id, name, price, image, stock, product_details, status)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
      );
      $insert_product->execute([$id, $seller_id, $name, $price, $image, $stock, $description, $status]);
      $success_msg[] = 'product added successfully!';
    }
   }
   //Add product to database as draft
   if (isset($_POST['draft'])) {

      $id = unique_id();
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
      $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
      $stock = filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
      $status = 'deactive';

      $image = $_FILES['image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../uploaded_files/'.$image;

      $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
   $select_image->execute([$image, $seller_id]);

   if(isset($image)) {
      if($select_image->rowCount() > 0) {
         $warning_msg[] = 'image name repeated';
      } elseif ($image_size > 2000000) {
         $warning_msg[] = 'image size is too large';
      } else {
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   } else {
      $image = '';
   }

   if($select_image->rowCount() > 0 && $image != '') {
      $warning_msg[] = 'please rename your image';
   } else {
      $insert_product = $conn->prepare(
         "INSERT INTO `products` (id, seller_id, name, price, image, stock, product_details, status)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
      );
      $insert_product->execute([$id, $seller_id, $name, $price, $image, $stock, $description, $status]);
      $success_msg[] = 'product saved as draft successfully!';
    }
   }
   ?>

   <!DOCTYPE html>
   <html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ice Cream Delights - Add Products</title>

      <link rel="stylesheet" type="text/css" href="../css/admin_style.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

      <!-- Boxicons CDN link -->
      <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
   </head>
      <body>
   <div class="main-container">
      <?php include '../components/admin_header.php'; ?>
      <section class="post-editor">
         <div class="heading">
            <h1>add product</h1>
            <img src="../image/separator-img.png">
         </div>
         <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data" class="register">
               <div class="input-field">
                  <p>product name <span>*</span></p>
                  <input type="text" name="name" maxlength="100" placeholder="add product name" required class="box">
               </div>
               <div class="input-field">
                  <p>product price <span>"</span></p>
                  <input type="number" name="price" maxlength="100" placeholder="add product price" required class="box">
               </div>
               <div class="input-field">
                  <p>product detail <span>"</span></p>
                  <textarea name="description" required maxlength="1000" placeholder="add product description" class="box"></textarea>
               </div>
               <div class="input-field">
                  <p>product stock <span>"</span></p>
                  <input type="number" name="stock" required maxlength="10" min="0" max= "9999999999" placeholder="add product stock" class="box">
               </div>
               <div class="input-field">
                  <p>product image <span>"</span></p>
                 <input type="file" name="image" accept="image/*" required class="box">
               </div>
               <div class="flex-btn">
                  <input type="submit" name="publish" value="add product" class="btn"> 
                  <input type="submit" name="draft" value="save as draft" class="btn"> 
               </div>
            </form>
         </div>
      </section>
   </div>
   <?php include '../components/alert.php'; ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <!-- custom js link -->
   <script src="../js/adminscript.js"></script>
   </body>
   </html>
