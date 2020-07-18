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
    <strong>Select Department To Get Details</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="">
                <div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select Department</h4>
    <select class="browser-default custom-select custom-select-md" name="dep" id="dep" value="<?php echo set_select('dep'); ?>">
        <option value="" disabled>Select Department</option>
        <option value="all">Select All</option>
        <?php 

foreach($user as $row)
{ 
  echo '<option value="'.$row->ID.'">'.$row->Department.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('dep');?></span>
  </div>
</div>
</div>
</form>
<table class="table table-hover" id="tab" name="tab">
</table>
</div>
</div>
</div>

<?php include('Footer.php'); ?>
    <script>

  $(document).ready(function(){
    $('#dep').change(function(){
      var u=$('#dep').val();
      $.ajax({
        url:"https://filetracking.velomia.tech//User/get_sdep",
        method:"POST",
        data:{dep:u},
        success:function(data)
        {
          $('#tab').html(data);
        }
      });
    });
});
    </script>
</body>
</html>