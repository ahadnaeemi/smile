<?php
include './includes/connectDb.php';

if (isset($_SESSION['ngo_login']) || isset($_SESSION['hotel_login']) || isset($_SESSION['single_login'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/font.css"> -->
    <title>Login Page</title>
</head>

<body>
    <?php include './nav.php'; ?>
    <!-- <?php include './font.php'; ?> -->
    <div id="triangle"></div>
    <div class="login-box">
        <h2>Login</h2>
        <form method="post">
        <div class="user" id="user" name='user'>
                <!-- <label>You Are!!!</label></br> -->
                <input type="radio" name="user" value="NGO" id="NGO" onclick="show_NGO();">
                <input type="radio" name="user" value="hotel" id="HOTEL" onclick="show_hotel();">
                <input type="radio" name="user" value="single" id="SINGLE" onclick="show();" checked>
                <label for="NGO" class="option NGO">
                    <div class="dot"></div>
                    <span>NGO</span>
                </label>
                <label for="HOTEL" class="option HOTEL">
                    <div class="dot"></div>
                    <span>Hotel</span>
                </label>
                <label for="SINGLE" class="option SINGLE">
                    <div class="dot"></div>
                    <span>Single Owner</span>
                </label>
            </div>

            <div class="user-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <input type="submit" name="submit" value="Login" id="btn">
            <a href="signup.php" class="direction" style="font-size: .9rem;">New User -> Kindly Register</a>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];

            if ($_POST['user'] == 'NGO') {

                $ngoLogin = "Select * from ngo where ngo_name='$userName' && ngo_password='$password'";
                $queryResult = mysqli_query($conn, $ngoLogin);
                $ngoData = mysqli_fetch_assoc($queryResult);
                $result = mysqli_num_rows($queryResult);
                if ($result > 0) {
                    $_SESSION['ngo_login'] = $ngoData;
                    $_SESSION['org_type'] = "NGO";
                    $_SESSION['login'] = $ngoData;
                    header("location: index.php");
                }
            }

            if ($_POST['user'] == 'hotel') {

                $hotelLogin = "Select * from hotel where hotel_name='$userName' && hotel_password='$password'";
                $queryResult = mysqli_query($conn, $hotelLogin);
                $hotelData = mysqli_fetch_assoc($queryResult);
                $result = mysqli_num_rows($queryResult);
                if ($result > 0) {
                    $_SESSION['hotel_login'] = $hotelData;
                    $_SESSION['org_type'] = "hotel";
                    $_SESSION['login'] = $hotelData;
                    header("location: index.php");
                }
            }
            if ($_POST['user'] == 'single') {

                $singleLogin = "Select * from singleowner where name='$userName' && password='$password'";
                $queryResult = mysqli_query($conn, $singleLogin);
                $singleData = mysqli_fetch_assoc($queryResult);
                $result = mysqli_num_rows($queryResult);
                if ($result > 0) {
                    $_SESSION['single_login'] = $singleData;
                    $_SESSION['org_type'] = "single";
                    $_SESSION['login'] = $singleData;
                    header("location: index.php");
                }
            }
        }

        ?>
    </div>
</body>

</html>