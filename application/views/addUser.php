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
<!-- partial:index.partial.html -->
<!-- Material form register -->
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
<div class="card m-5 p-5 col-6 mr-auto ml-auto">

    <h5 class="card-header info-color white-text text-center py-4">
  
        <strong>Register User</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="http://localhost/fms/User/Add" method="POST">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" class="form-control">
                        <label for="fname">First name</label>
                    </div>
                    <span class="text-danger wrap-text"><?php echo form_error('fname');?></span>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="lname" name="lname" value="<?php echo set_value('lname'); ?>" class="form-control">
                        <label for="lname">Last name</label>
                    </div>
                    <span class="text-danger wrap-text"><?php echo form_error('lname');?></span>

                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form">
                <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                <label for="email">E-mail</label>
                <span class="text-danger wrap-text"><?php echo form_error('email');?></span>

            </div>
            <!-- Phone number -->
            <div class="md-form">
                <input type="text" id="phone" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" aria-describedby="materialRegisterFormPhoneHelpBlock">
                <label for="phone">Phone number</label>
                <span class="text-danger wrap-text"><?php echo form_error('phone');?></span>

            </div>
            <div class="md-form">
    <select class="browser-default custom-select custom-select-md" id="dep" name="dep" value="<?php echo set_select('dep'); ?>">
        <option value="" disabled>Select Department</option>
        <?php 

            foreach($dep as $row)
            { 
              echo '<option value="'.$row->ID.'">'.$row->Department.'</option>';
            }
            ?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('dep');?></span>

            </div>
            <div class="md-form">
    <select class="browser-default custom-select custom-select-md" name="role" id="role" value="<?php echo set_select('role'); ?>">
        <option value="" disabled>Select Role</option>
        <?php 

foreach($role as $row)
{ 
  echo '<option value="'.$row->ID.'">'.$row->Role.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('role');?></span>

            </div>
            <!-- Password -->
            <div class="md-form">
                <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="password">Password</label>
                <span class="text-danger wrap-text"><?php echo form_error('password');?></span>

            </div>
            <div class="md-form">
                <input type="password" id="cpassword" name="cpassword" value="<?php echo set_value('cpassword'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="cpassword">Confirm Password</label>
                <span class="text-danger wrap-text"><?php echo form_error('cpassword');?></span>

            </div>
            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="register">REGISTER</button>

            <!-- Terms of service -->

        </form>
        <!-- Form -->
        
    </div>

</div>

<!-- Material form register -->
<script src="<?php echo base_url(); ?>public/assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/js/mdb.min.js"></script>
</body>
</html>
