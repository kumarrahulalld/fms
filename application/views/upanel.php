<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - VELOMIA_Filemgmt1.0</title>
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!--Navbar -->
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/fms/Authenticator/panel">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!--/.Navbar -->
<div class="row row-cols-1 row-cols-md-1 m-5 p-5">
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top ml-auto mr-auto mt-3" style="height:400px;width:400px;" src="https://cdn.pixabay.com/photo/2016/04/15/18/05/computer-1331579_960_720.png"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body" style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Users Opeartions</h4>
        <!--Text-->
        <p class="card-text">You Can Send, Receive , Revert , View Files And Can Change Your Password. </p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
       
        <button type="button" class="btn btn-outline-success waves-effect"><a href="http://localhost/fms/File/newfile">Add File</a></button>
        <button type="button" class="btn btn-outline-danger waves-effect"><a href="http://localhost/fms/User/select">Received Files</a></button>
        <br/>
        <button type="button" class="btn btn-outline-info waves-effect"><a href="http://localhost/fms/User/active">Sent Files</a></button>
        <button type="button" class="btn btn-outline-primary waves-effect"><a href="http://localhost/fms/User/deactive">Reverted Files</a></button>
        <button type="button" class="btn btn-outline-secondry waves-effect"><a href="http://localhost/fms/User/deactive">Change Password</a></button>

      </div>

    </div>
    <!-- Card -->
  </div>
</div>
<script src="<?php echo base_url(); ?>public/assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/mdb.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/mdb.min.js"></script>
</body>
</html>