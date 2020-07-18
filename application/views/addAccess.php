<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>

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
    <strong>Assign Access To Users</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="https://filetracking.velomia.tech//User/aAccess">
<div class="row">
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select From Department</h4>
    <select class="browser-default custom-select custom-select-md" name="dep" id="dep" value="<?php echo set_select('dep'); ?>">
        <option value="" disabled>Select  Department</option>
        <?php 

foreach($dep as $row)
{ 
  echo '<option value="'.$row->Department.'">'.$row->Department.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('dep');?></span>
  </div>
</div>
</div>
<div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select From Role</h4>
    <select class="browser-default custom-select custom-select-md" name="role" id="role" value="<?php echo set_select('role'); ?>">
        <option value="" disabled>Select Role</option>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('role');?></span>
  </div>
</div>
</div>


<div class="row">
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select To Department</h4>
    <select class="browser-default custom-select custom-select-md" name="tdep" id="tdep" value="<?php echo set_select('tdep'); ?>">
        <option value="" disabled>Select Department</option>
        <?php 

foreach($dep as $row)
{ 
  echo '<option value="'.$row->Department.'">'.$row->Department.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('tdep');?></span>
  </div>
</div>
</div>
<div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select To Role</h4>
    <select class="browser-default custom-select custom-select-md" name="trole" id="trole" value="<?php echo set_select('trole'); ?>">
        <option value="" disabled>Select Role</option>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('trole');?></span>
  </div>
  <button type="submit" class="btn btn-outline-primary m-4">Procced</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php include('Footer.php'); ?>
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


    $('#tdep').change(function(){
      var u=$('#tdep').val();
      $.ajax({
        url:"https://filetracking.velomia.tech//User/get_addrole",
        method:"POST",
        data:{dep:u},
        success:function(data)
        {
          $('#trole').html(data);
        }
      });
    });
    
  });
</script>

</body>
</html>