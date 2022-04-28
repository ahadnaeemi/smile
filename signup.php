<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sign-up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni&display=swap" rel="stylesheet">

    <title>SignUp Page</title>
</head>

<body>

    <div id="triangle"></div>
    <div class="login-box" id="signup-div">
        <h2>Register yourself...</h2>
        <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' name="signupform" method="post">
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
            <div id="NGO-signup" class="hide">
                <div class="user-box">
                    <input type="text" id="NGO_name" name="ngo_name">
                    <label>NGO Name</label>
                </div>
                <div class="user-box">
                    <input type="text" id="NGO_r_num" name="r_num">
                    <label>Registeration Number</label>
                </div>
            </div>
            <div id="HOTEL-signup" class="hide">
                <div class="user-box">
                    <input type="text" id="hotel_name" name="hotel_name">
                    <label>Hotel Name</label>
                </div>
                <div class="user-box">
                    <input type="text" id="hotel_l_num" name="hotel_l_num">
                    <label>License Number</label>
                </div>
            </div>
            <div id="single">
                <div class="user-box">
                    <input type="text" id="single_UN" name="single" required>
                    <label>Name</label>
                </div>

            </div>
            <div class="user-box">
                <input type="text" id="email" name="email" required>
                <label>E-mail</label>
            </div>
            <div class="user-box">
                <input type="number" id="phone" name="phone" required>
                <label>Phone</label>
            </div>
            <div class="user-box">
                <input type="password" id="pass" name="pass" required>
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="password" id="con_pass" name="cpass" required>
                <label>Confirm Password</label>
            </div>
            <div class="user-box">
                <input type="text" id="address" name="address" required>
                <label>Address</label>
            </div>
            <!-- <div class="user-box">
                <label for="image">Photo:</label>
                <input type="file" id="image" name="image" required> -->
            <!-- <label>Photo :</label> -->
            <!-- </div> -->

            <!-- <span id="message"></span> -->

            <input id="btn" type="submit" value="Submit" onclick="verifyPassword();">
            <a href="login.php" class="direction">Already Registered -> Go to Login.</a>
        </form>
        <?php
        include './includes/connectDb.php';
        if (isset($_POST['email'])) {
            $NGO_name = $_POST['ngo_name'];
            $r_num = $_POST['r_num'];
            $hotel_name = $_POST['hotel_name'];
            $hotel_l_num = $_POST['hotel_l_num'];
            $single = $_POST['single'];                       // single refers single owner throught the project
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            //check wheather email already exist or not
            $email_exist = "SELECT * FROM auth_email WHERE email='$email'";
            $email_exist_result = mysqli_query($conn, $email_exist);
            // echo $email_exist_result;
            $email_exist_row = mysqli_num_rows($email_exist_result);

            //checking id password is match  or not
            if (!($pass == $cpass)) {

                echo '<div class="alert alert-danger my-2" role="alert">
            <strong>Password doesnt match</strong>
            </div>';
            } else {

                //to check if user exists or not
                if ($email_exist_row > 0) {
                    echo '<div class="alert alert-danger" role="alert">
                            <strong>Email already registered</strong>
                        </div>';
                } else {
                    //for NGO registration
                    if ($_POST['user'] == 'NGO') {
                        echo "NGO";
                        // echo " success";
                        $user = $_POST['user'];
                        $auth_email = "INSERT INTO `auth_email` ( `email`, `org_type`) VALUES ('$email', '$user');";
                        $auth_result = mysqli_query($conn, $auth_email);
                        $id = mysqli_insert_id($conn);
                        echo $id;
                        if ($auth_result) {
                            $NGO_reg = "INSERT INTO `ngo` (`id`, `ngo_name`, `ngo_registeration`, `ngo_address`, `ngo_email`, `ngo_password`, `ngo_number`) VALUES ('$id','$NGO_name', '$r_num', '$address', '$email', '$pass', '$phone')";
                            $result = mysqli_query($conn, $NGO_reg);
                            if ($result) {
                                header("location:login.php");
                            } else {
                                echo mysqli_error($conn);
                                echo "somthing went Wrong";
                            }
                        } else {
                            echo "bhai kya kar raha hai tu";
                        }
                    }

                    //for hotels registration
                    elseif ($_POST['user'] == 'hotel') {
                        // echo "success";
                        $user = $_POST['user'];
                        $auth_email = "INSERT INTO `auth_email` ( `email`, `org_type`) VALUES ('$email', '$user');";
                        $auth_result = mysqli_query($conn, $auth_email);
                        $id = mysqli_insert_id($conn);
                        echo $id;

                        if ($auth_result) {

                            $hotel_reg = "INSERT INTO `hotel` ( `id`,`hotel_name`, `hotel_license`, `hotel_address`, `hotel_email`, `hotel_password`, `hotel_number`) VALUES ('$id','$hotel_name', '$hotel_l_num', '$address', '$email', '$pass', '$phone');";
                            $result = mysqli_query($conn, $hotel_reg);
                            if ($result) {
                                echo "success";
                                header("location:login.php");
                            } else {
                                echo "somthing went wrong";
                            }
                        } else {
                            echo "bhai kya kar raha hai tu";
                        }
                    }

                    //for singles
                    else {
                        $user = $_POST['user'];
                        $auth_email = "INSERT INTO `auth_email` ( `email`, `org_type`) VALUES ('$email', '$user');";
                        $auth_result = mysqli_query($conn, $auth_email);
                        $id = mysqli_insert_id($conn);
                        // echo $id;

                        if ($auth_result) {
                            echo $id;
                            $single_reg = "INSERT INTO `singleowner` (`id`,`name`, `adhar`, `address`, `email`, `password`, `number`) VALUES ('$id','$single', '00', '$address', '$email', '$pass', '$phone')";
                            $result = mysqli_query($conn, $single_reg);
                            if ($result) {
                                echo "success";
                                header("location:login.php");
                            } else {
                                echo mysqli_error($conn);
                            }
                        } else {
                            echo "bhai kya kar raha hai tu";
                        }

                        echo "single";
                    }
                }
            }
        }
        ?>

    </div>


</body>

<script>
    function show_NGO() {
        document.getElementById('NGO-signup').style.display = 'block';
        document.getElementById('HOTEL-signup').style.display = 'none';
        document.querySelector('#single').style.display = 'none';
        document.getElementById('NGO_name').required = true;
        document.getElementById('NGO_r_num').required = true;
        document.getElementById('hotel_name').required = false;
        document.getElementById('hotel_l_num').required = false;
        document.getElementById('single_UN').required = false;

    }

    function show_hotel() {
        document.getElementById('NGO-signup').style.display = 'none';
        document.getElementById('HOTEL-signup').style.display = 'block';
        document.querySelector('#single').style.display = 'none';
        document.getElementById('NGO_name').required = false;
        document.getElementById('NGO_r_num').required = false;
        document.getElementById('hotel_name').required = true;
        document.getElementById('hotel_l_num').required = true;
        document.getElementById('single_UN').required = false;

    }

    function show() {
        document.getElementById('NGO-signup').style.display = 'none';
        document.getElementById('HOTEL-signup').style.display = 'none';
        document.querySelector('#single').style.display = 'block';
        document.getElementById('NGO_name').required = false;
        document.getElementById('NGO_r_num').required = true;
        document.getElementById('hotel_name').required = false;
        document.getElementById('hotel_l_num').required = false;
        document.getElementById('single_UN').required = true;
    }

    var NGO_name = getElementById('NGO_name');
    var NGO_r_num = getElementById('NGO_r_num');
    var hotel_name = getElementById('hotel_name');
    var hotel_l_num = getElementById('hotel_l_num');
    var single_un = getElementById('single_UN');
    var email = getElementById('email');
    var phone = getElementById('phone');
    var pass = getElementById('pass');
    var con_pass = getElementById('con_pass');
    var address = getElementById('address');

    function verifyPassword() {
        var pass = document.getElementById("pass").value;
        //check empty password field  
        if (pass == "") {
            document.getElementById("message").set = "**Fill the password please!";
            return false;
        }

        //minimum password length validation  
        if (pass.length < 8) {
            document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";
            return false;
        }

        //maximum length of password validation  
        //   if(pw.length > 15) {  
        //      document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
        //      return false;  
        //   } else {  
        //      alert("Password is correct");  
        //   }  
    }
</script>

</html>