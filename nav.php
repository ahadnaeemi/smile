<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <div class="logo">smile</div>
            <!-- <img src="cover.png" alt="" class="logo"> -->
            <input type="checkbox" name="" id="" />
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <!-- <li><a href="avaialbleFood.php">I want food</a></li> -->
                <?php
                if (isset($_SESSION['ngo_login']) || isset($_SESSION['hotel_login']) || isset($_SESSION['single_login'])) {
                ?>
                <?php if(isset($_SESSION['ngo_login'])){?>
                    <li><a href="foodrequest.php">SmileRequest</a></li>
                    <?php }?>
                    <li><a href="hotelprofile.php">Profile</a></li>
                    <li><a href="Logout.php"> Logout</a></li>

                <?php
                } else {
                ?>
                    <li><a href="Login.php">login</a></li>
                    <li><a href="signup.php">Signin</a></li>

                <?php
                }

                ?>
            </ul>
        </div>
    </nav>

</body>

</html>