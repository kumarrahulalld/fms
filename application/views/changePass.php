<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>

<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                     <li class="nav-item" role="presentation"><a class="nav-link font-weight-bold" href="#"><?php echo  "Welcome - ". $this->session->userdata('isa')->NAME . "(". $this->session->userdata('isa')->DEPARTMENT ."-".$this->session->userdata('isa')->ROLE .")" ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link font-weight-bold" href="https://172.1696.251//File">Home</a></li>
                    
                    <li class="nav-item" role="presentation"><a class="nav-link font-weight-bold" href="https://172.1696.251//File/logout">Log Out</a></li>

               
                </ul>
            </div>
        </div>
    </nav>
<div class="card rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>Change Password</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="https://172.1696.251//File/chngpass">
                <div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <input type="text" id="pass" name="pass" value="<?php echo set_value('pass'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="pass">Enter New Password</label>
    <span class="text-danger wrap-text"><?php echo form_error('pass');?></span>
  </div>
  <button type="submit" class="btn btn-outline-primary m-4">Update</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php  include('Footer.php');?>
</body>
</html>