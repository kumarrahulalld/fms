<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Filemanagement_Velomia1.0</title>
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="<?php echo base_url(); ?>public/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Google-Products-Accordion.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mloureiro1973-login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mloureiro1973-login-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mdb.min.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/fms">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card col-4 rounded mx-auto d-block m-5">
    <h5 class="card-header info-color white-text text-center py-4 mt-2">
    <strong>Authentication </strong>
  </h5>    
        <form class="text-center" style="color: #757575;" action="check" method="post">
        <div class="md-form">
        <input class="form-control" type="password" id="Password" name="password" placeholder="Enter Authenticator App Code">
</div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"  type="submit">Sign in</button>
            <br/>
            <span class="text-danger wrap-text"><?php echo form_error("password");?></span>
            <br/>
        </form>
            
        </div>




        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/mdb.min.js"></script>
</body>

</html>