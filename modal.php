<?php

if (isset($_POST['id'])) {
    echo "hello";
    include './includes/connectDb.php';

    $raiserid_data = $_POST['id'];
    $org_type = $_POST['orgtype'];
    // echo $org_type;
?>
    <div class="modal-content" style="width: 100%;">
        <div class="card">
            <div class="modal-header">
                <h5 class="modal-title">
                    <?php
                    $raisedquery = "select * from foodraised";
                    $raisedResult = mysqli_query($conn, $raisedquery);
                    $raisedata = mysqli_fetch_assoc($raisedResult);
                    $raiserid = $raisedata['raiser_id'];
                    if ($org_type == 'NGO') {
                        $ngoquery = "select * from ngo where id='$raiserid_data'";
                        $ngoResult = mysqli_query($conn, $ngoquery);
                        $ngodata = mysqli_fetch_assoc($ngoResult);
                        echo $ngodata['ngo_name'];
                    } elseif ($org_type == 'single') {
                        $singlequery = "select * from singleowner where id='$raiserid_data'";
                        $singleResult = mysqli_query($conn, $singlequery);
                        $singledata = mysqli_fetch_assoc($singleResult);
                        echo $singledata['name'];
                    } elseif ($org_type == 'hotel') {
                        $hotelquery = "select * from hotel where id='$raiserid_data'";
                        $hotelResult = mysqli_query($conn, $hotelquery);
                        $hoteldata = mysqli_fetch_assoc($hotelResult);
                        echo $hoteldata['hotel_name'];
                    }

                    ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="Email">Email</label>
                <h6>
                    <?php

                    $raisedquery = "select * from foodraised";
                    $raisedResult = mysqli_query($conn, $raisedquery);
                    $raisedata = mysqli_fetch_assoc($raisedResult);
                    $raiserid = $raisedata['raiser_id'];
                    if ($org_type == 'NGO') {
                        $ngoquery = "select * from ngo where id='$raiserid_data'";
                        $ngoResult = mysqli_query($conn, $ngoquery);
                        $ngodata = mysqli_fetch_assoc($ngoResult);
                        echo $ngodata['ngo_email'];
                    } elseif ($org_type == 'single') {
                        $singlequery = "select * from singleowner where id='$raiserid_data'";
                        $singleResult = mysqli_query($conn, $singlequery);
                        $singledata = mysqli_fetch_assoc($singleResult);
                        echo $singledata['email'];
                    } elseif ($org_type == 'hotel') {
                        $hotelquery = "select * from hotel where id='$raiserid_data'";
                        $hotelResult = mysqli_query($conn, $hotelquery);
                        $hoteldata = mysqli_fetch_assoc($hotelResult);
                        echo $hoteldata['hotel_email'];
                    }
                    ?>
                </h6>
                <label for="Number">Number</label>
                <h6>
                    <?php

                    $raisedquery = "select * from foodraised";
                    $raisedResult = mysqli_query($conn, $raisedquery);
                    $raisedata = mysqli_fetch_assoc($raisedResult);
                    $raiserid = $raisedata['raiser_id'];
                    if ($org_type == 'NGO') {
                        $ngoquery = "select * from ngo where id='$raiserid_data'";
                        $ngoResult = mysqli_query($conn, $ngoquery);
                        $ngodata = mysqli_fetch_assoc($ngoResult);
                        echo $ngodata['ngo_number'];
                    } elseif ($org_type == 'single') {
                        $singlequery = "select * from singleowner where id='$raiserid_data'";
                        $singleResult = mysqli_query($conn, $singlequery);
                        $singledata = mysqli_fetch_assoc($singleResult);
                        echo $singledata['number'];
                    } elseif ($org_type == 'hotel') {
                        $hotelquery = "select * from hotel where id='$raiserid_data'";
                        $hotelResult = mysqli_query($conn, $hotelquery);
                        $hoteldata = mysqli_fetch_assoc($hotelResult);
                        echo $hoteldata['hotel_number'];
                    }
                    ?>
                </h6>
                <label for="Address">Address</label>
                <h6>
                    <?php

                    $raisedquery = "select * from foodraised";
                    $raisedResult = mysqli_query($conn, $raisedquery);
                    $raisedata = mysqli_fetch_assoc($raisedResult);
                    $raiserid = $raisedata['raiser_id'];
                    if ($org_type == 'NGO') {
                        $ngoquery = "select * from ngo where id='$raiserid_data'";
                        $ngoResult = mysqli_query($conn, $ngoquery);
                        $ngodata = mysqli_fetch_assoc($ngoResult);
                        echo $ngodata['ngo_address'];
                    } elseif ($org_type == 'single') {
                        $singlequery = "select * from singleowner where id='$raiserid_data'";
                        $singleResult = mysqli_query($conn, $singlequery);
                        $singledata = mysqli_fetch_assoc($singleResult);
                        echo $singledata['address'];
                    } elseif ($org_type == 'hotel') {
                        $hotelquery = "select * from hotel where id='$raiserid_data'";
                        $hotelResult = mysqli_query($conn, $hotelquery);
                        $hoteldata = mysqli_fetch_assoc($hotelResult);
                        echo $hoteldata['hotel_address'];
                    }
                    ?>
                </h6>
            </div>
            <!-- <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post"> -->
            <form action="/smile/modal.php" method="post">
                <!-- <input type="submit" value="submit"> -->
                <input type="number" name="id" id="" value="<?php echo $raiserid ?>" style="display: none;">
                <button type="submit" name="submit" id="accept-btn" class="btn btn-primary">Accept Request</button>
            </form>
            <!-- </form> -->
            <?php
            print_r($raisedata);

            print_r($_SESSION['login']);
            if (isset($_POST['submit'])) {

                print_r($raisedata);
                $raiserid = $raisedata['id'];
                echo $raiserid;
                $reciverid = $_SESSION['login']['id'];
                echo $reciverid;
                $foodweight = $raisedata['food_weight'];
                echo $foodweight;
                $foodtype = $raisedata['food_type'];
                echo $foodtype;
                $sql_query_reciver = "INSERT INTO `foodreciever` (`raiser_id`, `reciever_id`, `food_weight`, `food_type`) VALUES ('$raiserid', '$reciverid', '$foodweight', '$foodtype')";
                $result_reciver = mysqli_query($conn, $sql_query_reciver);
                if ($result_reciver) {
                    $raiser_delete_query = "DELETE FROM `foodraised` WHERE `foodraised`.`id` = '$raiserid'";
                    mysqli_query($conn, $raiser_delete_query);
                    header("location:foodrequest.php");
                } else {
                    echo "hello error";
                }
            } ?>
        </div>
    </div>
<?php
}
