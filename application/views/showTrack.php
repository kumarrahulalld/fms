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
    <strong>Track Files Here</strong>
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
      <h4 class="text-center">Select File</h4>
    <select class="browser-default custom-select custom-select-md" name="sfiles" id="sfiles" value="<?php echo set_select('sfiles'); ?>">
        <option value="" disabled>Select File Title</option>
        <?php 
print_r($sfile);
foreach($sfile as $row)
{ 
  echo '<option value="'.$row->file_id.'">'.$row->file_title.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('sfiles');?></span>
  </div>
  <button name="track" id="track" class="btn btn-outline-primary m-4">Track Details</button>
  <div id="result" name="result">
</div>
</div>
</div>
</form>

</div>
</div>
</div>
<?php include('Footer.php'); ?>


    <script>

$(document).ready(function(){
  $('#track').click(function(e){
    e.preventDefault();
    var u=$('#sfiles').val();
    $.ajax({
      url:"https://filetracking.velomia.tech//File/get_trackFile",
      method:"POST",
      data:{sfiles:u},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  });



});
</script>



</body>
</html>