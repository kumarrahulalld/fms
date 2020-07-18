<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>


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

<div class="col-lg-8 mb-4 rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>Add A Role .</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="http://localhost/fms/User/addrole">
                <div class="row">

                  
<!-- First column -->
<div class="col-md-12">
<div class="md-form">
    <select class="browser-default custom-select custom-select-md" id="dep" name="dep" value="<?php echo set_select('dep'); ?>">
        <option value="" disabled>Select Department</option>
        <?php 

            foreach($user as $row)
            { 
              echo '<option value="'.$row->Department.'">'.$row->Department.'</option>';
            }
            ?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('dep');?></span>

            </div>
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="text" id="role" name="role" value="<?php echo set_value('role'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="role">Role Name</label>
                <span class="text-danger wrap-text"><?php echo form_error('role');?></span>

            </div>
  </div>
  <button type="submit" class="btn btn-outline-primary m-4">Add Role</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php  include('Footer.php');?>
</body>
</html>