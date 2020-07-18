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
    <strong>Select User To Be Activated </strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="http://localhost/fms/User/activate">
                <div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select User</h4>
    <select class="browser-default custom-select custom-select-md" name="user" id="user" value="<?php echo set_select('user'); ?>">
        <option value="" disabled>Select User</option>
        <?php 

foreach($user as $row)
{ 
  echo '<option value="'.$row->ID.'">'.$row->NAME.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('user');?></span>
  </div>
  <button type="submit" class="btn btn-outline-primary m-4">Activate User</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include('Footer.php');?>
</body>
</html>