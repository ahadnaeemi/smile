<?php
include './includes/connectDb.php';
if (isset($_SESSION['ngo_login']) || isset($_SESSION['hotel_login']) || isset($_SESSION['single_login'])) {
} else {
    header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <link rel="stylesheet" href="./css/foodrequest.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Food Request</title>
</head>

<body>
    <?php include './nav.php'; ?>
    <div id="triangle"></div>
    <?php
    // include './includes/connectDb.php';
    $sql_query = "SELECT * FROM `foodraised`";
    $result = mysqli_query($conn, $sql_query);
    if ($result) {
        while ($food_row = mysqli_fetch_assoc($result)) {
            // $sql_query_info = "SELECT * FROM `email_auth` WHERE id=$food_row[raiser_id]";  //getting data from email_auth
            // $result_info = mysqli_query($conn, $sql_query_info);
            if ($food_row['org-type'] == 'NGO') {
                $sql_query_info = "SELECT * FROM `ngo` WHERE id='" . $food_row['raiser_id'] . "'";
                $result_info = mysqli_query($conn, $sql_query_info);
                if ($result_info) {
                    $info_row = mysqli_fetch_assoc($result_info);
                    echo '<div id="request-div" class="request-div">
                    
                    <div id="description" class="description">
                    <div id="hotel">' . $info_row['ngo_name'] . '</div>
                    <div id="contact">
                    <div id="address">' . $info_row['ngo_address'] . '</div>
                    <div id="phone">' . $info_row['ngo_number'] . '</div>
                    </div>
                    <div id="food-detail">
                    <div id="foodtype">' . $food_row['food_type'] . '</div>
                    <div id="foodname">' . $food_row['food_name'] . '</div>
                    <div id="weight">' . $food_row['food_weight'] . '</div>
                    
                        </div>
            
            
            
                    </div>
                    <div id="acceptbtn-div" class="acceptbtn-div">
                        <button type="submit" id="accept-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal' . $food_row['id'] . '" onclick="show_Modal(' . $info_row['id'] . ', \'NGO\');">Accept Request</button>
                    </div>
                </div>';
                }
            }
            if ($food_row['org-type'] == 'hotel') {
                $sql_query_info = "SELECT * FROM `hotel` WHERE id='" . $food_row['raiser_id'] . "'";
                $result_info = mysqli_query($conn, $sql_query_info);
                if ($result_info) {
                    $info_row = mysqli_fetch_assoc($result_info);
                    echo '<div id="request-div" class="request-div">

                    <div id="description" class="description">
                        <div id="hotel">' . $info_row['hotel_name'] . '</div>
                        <div id="contact">
                            <div id="address">' . $info_row['hotel_address'] . '</div>
                            <div id="phone">' . $info_row['hotel_number'] . '</div>
                        </div>
                        <div id="food-detail">
                            <div id="foodtype">' . $food_row['food_type'] . '</div>
                            <div id="foodname">' . $food_row['food_name'] . '</div>
                            <div id="weight">' . $food_row['food_weight'] . '</div>
                        </div>
            
            
            
                    </div>
                    <div id="acceptbtn-div" class="acceptbtn-div">
                    <button type="submit" id="accept-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal' . $food_row['id'] . '" onclick="show_Modal(' . $info_row['id'] . ', \'hotel\');">Accept Request</button>
                    </div>
                </div>';
                }
            }

            if ($food_row['org-type'] == 'single') {
                $sql_query_info = "SELECT * FROM `singleowner` WHERE id='" . $food_row['raiser_id'] . "'";
                $result_info = mysqli_query($conn, $sql_query_info);
                if ($result_info) {
                    $info_row = mysqli_fetch_assoc($result_info);
                    echo '<div id="request-div" class="request-div">

                    <div id="description" class="description">
                        <div id="hotel">' . $info_row['name'] . '</div>
                        <div id="contact">
                            <div id="address">' . $info_row['address'] . '</div>
                            <div id="phone">' . $info_row['number'] . '</div>
                        </div>
                        <div id="food-detail">
                            <div id="foodtype">' . $food_row['food_type'] . '</div>
                            <div id="foodname">' . $food_row['food_name'] . '</div>
                            <div id="weight">' . $food_row['food_weight'] . '</div>
                            
                        </div>
            
            
            
                    </div>
                    <div id="acceptbtn-div" class="acceptbtn-div">
                    <button type="submit" id="accept-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal' . $food_row['id'] . '" onclick="show_Modal(' . $info_row['id'] . ', \'single\');">Accept Request</button>
                    </div>
                </div>';
                }
            }

    ?>

            <div class="modal fade" id="exampleModal<?= $food_row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div id="acceptmodal<?= $info_row['id'] ?>" class="modal-dialog" role="document">
                </div>
            </div>
    <?php

        }
    }



    ?>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script>
    function show_Modal(id, orgtype) {
        // alert(id);
        var foodid = id;
        var orgType = orgtype;

        document.getElementById('acceptmodal' + foodid).style.display = 'block';
        $.ajax({
            url: "./modal.php",
            data: {
                id: foodid,
                orgtype: orgType

            },
            type: 'post',
            success: (res) => {
                $("#acceptmodal" + foodid).html(res)
            }
        })
    }
</script>
<?php include './modal.php' ?>

</html>