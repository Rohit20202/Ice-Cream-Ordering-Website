    <?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    } else {
        $user_id = '';
    }

    include 'components/add_wishlist.php';
    include 'components/add_cart.php';
    ?>
     <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ice Cream Delights - Our shop page</title>
        <link rel="stylesheet" type="text/css" href="css/user_style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <!-- Boxicons CDN link -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    </head>
    <body>

    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>product detail</h1>
            <p>Discover all the information you need about the product you are interested in. <br> Explore features, specifications, and pricing to help you make informed decision.</p>
<span>
                <a href="home.php">home</a>
                <i class="bx bx-right-arrow-alt"></i>product detail
            </span>
        </div>
    </div>

    <section class="view_page">
        <div class="heading">
            <h1>Product Detail</h1>
            <img src="image/separator-img.png">
        </div>

    <?php

if (isset($_GET['pid'])) {
   $pid = $_GET['pid'];
   $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $select_products->execute([$pid]);

   if ($select_products->rowCount() > 0) {
      while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
?>

    <form action="" method="post" class="box">
       <div class="img-box">
           <img src="uploaded_files/<?= $fetch_products['image']; ?>" class="image"> 
       </div>
        <div class="detail">
            <?php if ($fetch_products['stock'] > 9) { ?>
    <span class="stock" style="color: green;">In stock</span>
<?php } elseif ($fetch_products['stock'] == 0) { ?>
    <span class="stock" style="color: red;">Out of stock</span>
<?php } else { ?>
    <span class="stock" style="color: red;">Hurry, only <?= $fetch_products['stock']; ?> left!</span>
<?php } ?>
<p class="price"><?= $fetch_products['price']; ?></p>
<div class="name"><?= $fetch_products['name']; ?></div>
<p class="product-detail"><?= $fetch_products['product_details']; ?></p>
<input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">

<div class="button">
   <input type="number" name="qty" value="1" min="1" max="99" class="quantity">
<button type="submit" name="add_to_cart" class="btn">Add to Cart<i class="bx bx-cart"></i></button>
</div>
</div>
</form>

<?php
      }
   }
}
?>

</section>

<div class="products">
   <div class="heading">
      <h1>Similar Products</h1>
      <p>Explore a selection of products similar to your interests and find your perfect match from our curated recommendations.</p>
      <img src="image/separator-img.png">
   </div>
   <?php include 'components/shop.php'; ?>
</div>

<?php include 'components/footer.php'; ?>

<!-- custom js link -->
<script src="js/user_script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/alerts.php'; ?>

</body>
</html>