   <?php
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   } else {
      $user_id = '';
   }
   include 'components/add_cart.php';
   include 'components/add_wishlist.php';
   ?>

   <!DOCTYPE html>
   <html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ice Cream Delights - Home Page</title>

      <link rel="stylesheet" type="text/css" href="css/user_style.css">
       <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

      <!-- Boxicons CDN link -->
      <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
   </head>
   <body>

   <?php include 'components/user_header.php'; ?>
   <!-- home section starts -->
   <section class="home" id ="home">
      <div class="swiper home-slide">
         <div class="swiper-wrapper wrapper">
            <div class="swiper-slide slide">
               <div class="content">
                  <span>welcome to the</span>
                  <h3>Classic Ice <br><span>Cream Parlor</span></h3>
                     <p>Delight in our selection of premium ice cream, perfectly complemented by fresh berries.</p>
                     <a href="" class="btn">Order Now</a>
               </div>
               <div class="image">
                  <img src="./image/home-img-1.png" alt="">
               </div>
            </div>

           <div class="swiper-slide slide">
      <div class="content">
         <span>welcome to the</span>
         <h3>Classic Ice <br><span>Cream Parlor</span></h3>
         <p>Savor our artisanal ice cream scoops served on fresh, crispy homemade waffle cones.</p>
         <a href="#" class="btn">Order Now</a>
      </div>

      <div class="image">
         <img src="./image/home-img-2.png" alt="">
      </div>
   </div>

   <div class="swiper-slide slide">
      <div class="content">
         <span>welcome to the</span>
         <h3>Classic Ice <br><span>Cream Parlor</span></h3>
         <p>Delight in our selection of premium ice cream, perfectly complemented by fresh berries.</p>
         <a href="#" class="btn">Order Now</a>
      </div>

      <div class="image">
         <img src="./image/home-img-3.png" alt="">
      </div>
   </div>
      </div>
      <div class="swiper-pagination"></div>
      </div>
   </section>

   <!-- service section starts -->
<div class="service">
   <div class="box-container">

      <!-- service item box -->
      <div class="box">
         <div class="icon">
            <div class="icon-box">
               <img src="image/services.png" class="img1">
               <img src="image/services (1).png" class="img2">
            </div>
         </div>

         <div class="detail">
            <h4>delivery</h4>
            <span>100% secure</span>
         </div>
      </div>
      <div class="box">
   <div class="icon">
      <div class="icon-box">
         <img src="image/services (2).png" class="img1">
         <img src="image/services (3).png" class="img2">
      </div>
   </div>

   <div class="detail">
      <h4>payment</h4>
      <span>100% secure</span>
   </div>
</div>

<div class="box">
   <div class="icon">
      <div class="icon-box">
         <img src="image/services (5).png" class="img1">
         <img src="image/services (6).png" class="img2">
      </div>
   </div>

   <div class="detail">
      <h4>support</h4>
      <span>24*7 hours</span>
   </div>
</div>

<div class="box">
 <div class="icon">
      <div class="icon-box">
         <img src="image/services (7).png" class="img1">
         <img src="image/services (8).png" class="img2">
      </div>
   </div>
<div class="detail">
            <h4>gift service</h4>
            <span>support gift service</span>
         </div>
      </div>

       <div class="box">
       <div class="icon">
      <div class="icon-box">
         <img src="image/services.png" class="img1">
         <img src="image/services (6).png" class="img2">
      </div>
   </div>
   <div class="detail">
            <h4>returns</h4>
            <span>24*7 free return</span>
         </div>
      </div>

   <div class="box">
       <div class="icon">
      <div class="icon-box">
         <img src="image/services.png" class="img1">
         <img src="image/services (6).png" class="img2">
      </div>
   </div>
   <div class="detail">
            <h4>returns</h4>
            <span>24*7 free return</span>
         </div>
      </div>
   </div>
</div>
<div class="categories">
<div class="heading">
   <h1>Explore Our Categories</h1>
    <img src="image/separator-img.png">
</div>
<div class="box-container">

   <div class="box">
      <img src="image/categories1.jpg">
      <a href="menu.php" class="btn">Sundaes</a>
   </div>

   <div class="box">
      <img src="image/categories2.jpg">
      <a href="menu.php" class="btn">ice cream cones</a>
   </div>

   <div class="box">
      <img src="image/categories3.jpg">
      <a href="menu.php" class="btn">milkshakes</a>
   </div>

   <div class="box">
      <img src="image/categories4.jpg">
      <a href="menu.php" class="btn">seasonal flavors</a>
   </div>
</div>
</div>

<!-- categories section end -->

<img src="image/menu-banner.jpg" class="menu-banner">

<div class="taste">
   <div class="heading">
      <img src="image/separator-img.png">
      <h1>OUR NATURAL INGREDIENTS</h1>
   </div>

   <div class="box-container">

      <div class="box vanilla">
         <img src="image/vanilla-image.webp" alt="Vanilla">
         <div class="detail">
            <h1>Vanilla</h1>
            <p>Bourbon vanilla berries imported directly from Madagascar.</p>
         </div>
      </div>

      <div class="box chocolate">
         <img src="image/chocolate-image.webp" alt="Chocolate">
         <div class="detail">
            <h1>Chocolate</h1>
            <p>We are Valrhona partners and we use selections of Single Origin and Gran Crue.</p>
         </div>
      </div>

      <div class="box milk">
         <img src="image/milk-image.avif" alt="Milk">
         <div class="detail">
            <h1>Milk</h1>
            <p>Milk from the Fucci farm of Conselice from Jersey cows.</p>
         </div>
      </div>

   </div>
</div>
</div>

<!-- taste section ends -->
<div class="ice-container">
   <div class="overlay"></div>

   <div class="detail">
      <h1>Ice cream turns every moment <br> into something special</h1>
      <p>Discover the magic in every scoop, <br> flavors crafted to brighten your day. 
      Relish in the sweetness of cool treats, <br> made to bring smiles and joy, bite after bite.</p>
      <a href="menu.php" class="btn">shop now</a>
   </div>
</div>

<!-- container section end -->

<div class="taste2">
   <div class="t-banner">
      <div class="overlay"></div>

      <div class="detail">
         <h1>Savor the sweetness of life</h1>
         <p>Let our desserts bring a smile to your face and a spark to your day!</p>
      </div>
   </div>
   <div class="box-container">
   <div class="box">
      <div class="box-overlay"></div>
      <img src="image/type1.webp" alt="Fruit Ice Cream">

      <div class="box-details fadeIn-bottom">
         <h1>fruits ice cream</h1>
         <p>find your taste for desserts</p>
         <a href="menu.php" class="btn">explore more</a>
      </div>
   </div>
   <div class="box">
   <div class="box-overlay"></div>
   <img src="image/type2.webp" alt="Strawberry & Lingonberry">

   <div class="box-details fadeIn-bottom">
      <h1>Strawberry & Lingonberry</h1>
      <p>find your taste for desserts</p>
      <a href="menu.php" class="btn">explore more</a>
   </div>
</div>

<div class="box">
   <div class="box-overlay"></div>
   <img src="image/type3.webp" alt="Strawberry">

   <div class="box-details fadeIn-bottom">
      <h1>Strawberry Coffee Cookies Ice Cream</h1>
      <p>find your taste for desserts</p>
      <a href="menu.php" class="btn">explore more</a>
   </div>
</div>
<div class="box">
   <div class="box-overlay"></div>
   <img src="image/type4.webp" alt="Bubbies Mochi Ice Cream">

   <div class="box-details fadeIn-bottom">
      <h1>Bubbies Mochi Ice Cream</h1>
      <p>find your taste for desserts</p>
      <a href="menu.php" class="btn">explore more</a>
   </div>
</div>

<div class="box">
   <div class="box-overlay"></div>
   <img src="image/type5.webp" alt="Mango Ice Cream">

   <div class="box-details fadeIn-bottom">
      <h1>Mango Ice Cream</h1>
      <p>find your taste for desserts</p>
      <a href="menu.php" class="btn">explore more</a>
   </div>
</div>

<div class="box">
   <div class="box-overlay"></div>
   <img src="image/type6.webp" alt="Chocolate Ice Cream">

   <div class="box-details fadeIn-bottom">
      <h1>Chocolate Ice Cream</h1>
      <p>find your taste for desserts</p>
      <a href="menu.php" class="btn">explore more</a>
   </div>
</div>
</div>
</div>

<!-- taste2 section end -->

<div class="flavor">
   <div class="box-container">
      <img src="image/left-banner2.jpg" alt="Promotional Banner">

      <div class="detail">
         <h1>Hot Deal! Sale Up To <span>20% off</span></h1>
         <p>Limited time only</p>
         <a href="menu.php" class="btn">shop now</a>
      </div>
   </div>
</div>

<!-- flavor section end -->

<div class="usage">
   <div class="heading">
      <h1>how it works</h1>
      <img src="image/separator-img.png" alt="Separator Image">
   </div>

   <div class="row">
      <div class="box-container">

         <div class="box">
            <img src="image/icon.avif" alt="Scoop Ice Cream icon">

            <div class="detail">
               <h3>scoop ice cream</h3>
               <p>Choose your flavor, scoop it into a cone, and prepare for a treat. Enjoy the creamy, delicious experience.</p>
            </div>
         </div>

         <div class="box">
            <img src="image/icon0.avif" alt="Scoop Ice Cream icon">

            <div class="detail">
               <h3>add toppings</h3>
               <p>Add your favorite toppings to enhance the ice cream’s flavor. Toppings make it even more irresistible and enjoyable.</p>
            </div>
         </div>
<div class="box">
   <img src="image/icon1.avif" alt="Scoop Ice Cream icon">

   <div class="detail">
      <h3>enjoy your treat</h3>
      <p>Enjoy your delicious ice cream with every sweet bite. Let the flavors melt in your mouth for satisfaction.</p>
   </div>
</div>
</div>
<img src="image/sub-banner.png" class="divider">

<div class="box-container">

   <div class="box">
      <img src="image/icon2.avif" alt="Scoop Ice Cream icon">
      <div class="detail">
         <h3>scoop ice cream</h3>
         <p>Scoop your choice of ice cream into a cone for the perfect start. A sweet treat from the beginning.</p>
      </div>
   </div>

   <div class="box">
      <img src="image/icon3.avif" alt="Scoop Ice Cream icon">
      <div class="detail">
         <h3>mix flavors</h3>
         <p>Mix different ice cream flavors to create a unique treat. Blend your favorites for a personalized dessert experience.</p>
      </div>
   </div>

   <div class="box">
      <img src="image/icon4.avif" alt="Scoop Ice Cream icon">
      <div class="detail">
         <h3>serve and savor</h3>
         <p>Serve your ice cream and savor the delightful flavors. Enjoy the perfect combination of</p>
      </div>
   </div>

</div>
      </div>
   </div>
</div>

<!-- usage section end -->

<div class="pride">
   <div class="detail">
      <h1>Experience the Best of <br> Irresistible Flavors</h1>
      <p>We offer unique ice cream varieties, crafted with care, <br> to bring you the perfect balance of taste and texture every time.</p>
      <a href="menu.php" class="btn">shop now</a>
   </div>
</div>

<!-- pride section end -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <?php include 'components/footer.php'; ?>

       <!--custom js link -->
      <script src="js/user_script.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <?php include 'components/alerts.php'; ?>

   

      </body>
      </html>