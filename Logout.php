<?php

include './includes/connectDb.php';

session_destroy();
session_unset();
header("location:login.php");
