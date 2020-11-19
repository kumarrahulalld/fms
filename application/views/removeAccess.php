<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>

<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="https://172.1696.251//Authenticator/panel">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="card rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>Remove Access For Users</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="https://172.1696.251//User/rAccess">
<div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select Department</h4>
    <select class="browser-default custom-select custom-select-md" name="dep" id="dep" value="<?php echo set_select('dep'); ?>">
    <option value="" >Select Department</option>
        <?php 

            foreach($user as $row)
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
      <h4 class="text-center">Select Role</h4>
    <select class="browser-default custom-select custom-select-md" name="role" id="role" value="<?php echo set_select('role'); ?>">
        <option value="" >Select Role</option>
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
        <option value="" >Select Department</option>
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
        <option value="" >Select Role</option>
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
<?php  include('Footer.php');?>
<script>

  $(document).ready(function(){
    $('#role').change(function(){
      var u=$('#role').val();
      var d=$('#dep').val();
      $.ajax({
        url:"https://172.1696.251//User/get_tdep",
        method:"POST",
        data:{role:u,dep:d},
        success:function(data)
        {
          $('#tdep').html(data);
        }
      });
    });


    $('#dep').change(function(){
      var u=$('#dep').val();
      $.ajax({
        url:"https://172.1696.251//User/get_trole",
        method:"POST",
        data:{dep:u},
        success:function(data)
        {
          $('#role').html(data);
        }
      });
    });


    $('#tdep').change(function(){
      var u=$('#role').val();
      var d=$('#dep').val();
      var t=$('#tdep').val();
      $.ajax({
        url:"https://172.1696.251//User/get_torole",
        method:"POST",
        data:{role:u,dep:d,tdep:t},
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