<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $hashed_pass = sha1($pass);

    //prepare the sql statement to check matching credentials
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password=?");
    $select_user->execute([$email, $hashed_pass]);

    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('Location: home.php');
        exit();
    } else {
        $warning_msg[] = 'Incorrect email or password';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ice Cream Delights - User Login Page</title>
<link rel="stylesheet" type="text/css" href="css/user_style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<!-- Boxicons CDN link -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>
<div class="banner">
    <div class="detail">
        <h1>register</h1>
        <p>Please log in to access your account and enjoy all teh features <br> our site has to offer. If you don't have an account yet, feel free to sign up!</p>
        <span>
            <a href="home.php">home</a>
            <i class="bx bx-right-arrow-alt"></i>login
        </span>
    </div>
</div>

<div class="form-container">
<form action="" method="post" enctype="multipart/form-data" class="login">
    <h2>Login Now</h2>
    <div class="input-field">
        <p>Your Email <span>*</span></p>
        <input type="text" name="email" placeholder="Enter your email" maxlength="50" required class="box">
    </div>
    <div class="input-field">
    <p>Your Password <span>*</span></p>
    <input type="password" name="pass" placeholder="Enter your password" maxlength="50" required class="box">
</div>

    <p class="link">Do not have an account? <a href="register.php">register now</a></p>

<input type="submit" name="submit" value="login now" class="btn">
</form>
</div>

<?php include 'components/footer.php'; ?>

<!-- custom js link -->
<script src="js/user_script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/alerts.php'; ?>

</body>
</html>