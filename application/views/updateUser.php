<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
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
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="https://filetracking.velomia.tech//Authenticator/panel">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="col-lg-8 mb-4 rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>Update User </strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="https://filetracking.velomia.tech//User/update">
                  <!-- First row -->

                 

                  <div class="row">


                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control validate" value="<?php echo $udata[0]->EMAIL ?>" readonly>
                        <label for="email" data-error="wrong" data-success="right" class="active">Email Address</label>
                      </div>
                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="phone" name="phone" class="form-control validate" value=<?php echo $udata[0]->PHONE ?>>
                        <label for="phone" data-error="wrong" data-success="right">Phone No.</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- First row -->
                  <div class="row">
                    <!-- First column -->
                    <div class="col-md-12">
                      <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control validate" value=<?php echo $udata[0]->NAME ?>>
                        <label for="name" data-error="wrong" data-success="right">NAME</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- Second row -->
                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                    <div class="md-form">
                    <h6 class="text-center">Select Department</h6>
    <select class="browser-default custom-select custom-select-md" id="dep" name="dep" value="<?php echo set_select('dep'); ?>">
        <option value="" disabled>Select Department</option>
        <?php 

            foreach($dep as $row)
            { 
              if($row->Department==$udata[0]->DEPARTMENT)
              echo '<option selected value="'.$row->Department.'">'.$row->Department.'</option>';
              else
              echo '<option value="'.$row->Department.'">'.$row->Department.'</option>';

            }
            ?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('dep');?></span>

            </div>
                    </div>
                    <!-- Second column -->

                    <div class="col-md-6">
                    <div class="md-form">
                    <h6 class="text-center">Select Role</h6>
    <select class="browser-default custom-select custom-select-md" name="role" id="role">
        <option value="<?php echo set_select('role'); ?>"disabled>Select Role</option>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('role');?></span>

            </div>
                  </div>
                  </div>
                  <!-- Second row -->

                    <!-- First column -->


                  <!-- Fourth row -->
                  <div class="row">
                    <div class="col-md-12 text-center my-4">
                      <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Update" class="btn btn-info btn-rounded"></span>
                    </div>
                  </div>
                  <!-- Fourth row -->

                </form>
                <!-- Edit Form -->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
<?php include('Footer.php');?>
    <script>

$(document).ready(function(){
  $('#dep').change(function(){
    var u=$('#dep').val();
    $.ajax({
      url:"https://filetracking.velomia.tech//User/get_addrole",
      method:"POST",
      data:{dep:u},
      success:function(data)
      {
        $('#role').html(data);
      }
    });
  });
  
});
</script>
</body>
</html>