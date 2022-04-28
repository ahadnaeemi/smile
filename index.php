<?php
include './includes/connectDb.php';

if (isset($_SESSION['ngo_login']) || isset($_SESSION['hotel_login']) || isset($_SESSION['single_login'])) {


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FoodTracker</title>
  <link rel="stylesheet" href="./css/utility.css" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni&display=swap" rel="stylesheet">
</head>

<body>
  <?php include './nav.php'; ?>
  <div id="triangle"></div>
  <?php

  if (isset($_SESSION['hotel_login']) || isset($_SESSION['single_login'])) {

  ?>
    <div id="ihavefood">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <button class=" btn-hover" name="ihavefoodbtn">I have Food</button>

      </form>
    <?php } else { ?>

      <div id="ihavefood">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
          <button class=" btn-hover" name="iwantfoodbtn">I Want Food</button>

        </form>

      <?php
    }
    // include './includes/connectDb.php';
    if (isset($_POST['ihavefoodbtn'])) {
      if (isset($_SESSION['hotel_login']) || isset($_SESSION['single_login'])) {
        header("location:food.php");
      }
    }
    if (isset($_POST['iwantfoodbtn'])) {
      header("location:foodrequest.php");
    }
      ?>

      </div>
      <div id="footer">
        <div id="foodraised">
          <div id="smileserved-container">
            <div id="weserved">
              <h3>we served</h3>
            </div>
            <div id="smileserved">8500</div>
            <div id="smiles">
              <h4>smiles</h4>
            </div>
          </div>
        </div>
        <div id="aboutus"></div>
      </div>

</body>

</html>
<?php }else {
  header("location:Login.php");
}
?>