<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registration Form </title>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="<?php echo base_url(); ?>public/assets/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Google-Products-Accordion.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mloureiro1973-login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mloureiro1973-login-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mdb.min.css">
</head>
<body>
<!-- Button trigger modal-->


<!--Modal: modalRelatedContent-->
<!-- Card -->
<div class="card m-5">

  <!-- Card image -->
  <img class="card-img-top p-4 ml-auto mr-auto" style="width:400px;height:400px;" src=<?php echo $this->session->userdata('qcode'); ?>  alt="Card image cap">

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title text-success"><a>Congratulations !.. Account Created Successfully.</a></h4>
    <!-- Text -->
    <p class="card-text text-danger">Attention !.. Please Save or Download The Provided QR Code Given In Image And Download Google Authenticator App From Play Store And Scan That QR And Save For Future This Will Help You To Login Into This System In Future. Whenever You Are Asked For Authentication Key Open The Authenticator App And Enter The Code Showing In App. Please Don't Forgot To Save This QR Because Even Admin Can't Generate It Agin So Take Care Of It.</p>
    <!-- Button -->
    <a href=<?php echo $this->session->userdata('qcode'); ?> class="btn btn-outline-danger" download>Download QR Code</a>
    <br/>
    <h4 class="card-title text-info"><a>To Download QR Code Click On Download Button And Than Right Click & Select Save Image As Option.</a></h4>

    <a href="http://localhost/fms/Authenticator/panel" class="btn btn-outline-success" download>Go To Dashboard</a>

  </div>

</div>
<!-- Card -->
<!--Modal: modalRelatedContent-->
<script src="<?php echo base_url(); ?>public/assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/mdb.min.js"></script>
</body>
</html>