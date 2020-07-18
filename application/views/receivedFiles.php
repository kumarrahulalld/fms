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
    <strong>Received Files By You.</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="http://localhost/fms/File/forwardComp">
                <div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select File</h4>
    <select class="browser-default custom-select custom-select-md" name="sfiles" id="sfiles" value="<?php echo set_select('sfiles'); ?>">
        <option value="" disabled>Select File Title</option>
        <?php 
foreach($sfile as $row)
{ 
  echo '<option value="'.$row->file_id.'">'.$row->file_title.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('sfiles');?></span>
  </div>

  <div class="col-md-12">
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="text" id="desc" name="desc" value="<?php echo set_value('desc'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="desc"> Add Description</label>
                <span class="text-danger wrap-text"><?php echo form_error('desc');?></span>

            </div>
  </div>
  </div>


  <button name="view" id="frwd" class="btn btn-outline-primary m-4">Forward File</button>
  <button name="track" id="rvrt" class="btn btn-outline-primary m-4">Revert File</button>
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
  //  e.preventDefault();
  $('#frwd').click(function(e){
    e.preventDefault();
    var u=$('#sfiles').val();
    $.ajax({
      url:"http://localhost/fms/File/get_Forward",
      method:"POST",
      data:{sfiles:u},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  });
  //return false;
  $('#rvrt').click(function(e){
    e.preventDefault();
    var u=$('#desc').val();
    var v=$('#sfiles').val();
    $.ajax({
      url:"http://localhost/fms/File/get_Revert",
      method:"POST",
      dataType : "json",
      data:{desc:u,sfiles:v},
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