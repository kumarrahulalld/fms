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
<div class="card rounded mx-auto d-block m-4">

            <!-- Card -->
           

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>File Created By Me</strong>
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
        <option value="">Select File Title</option>
        <?php 
print_r($sfile);
foreach($sfile as $row)
{ 
  echo '<option value="'.$row->file_id.'">'.$row->file_id.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('sfiles');?></span>
  </div>
  <button name="view" id="view" class="btn btn-outline-primary m-4">View File Details</button>
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
  //  e.preventDefault();
  $('#view').click(function(e){
    e.preventDefault();
    var u=$('#sfiles').val();
    $.ajax({
      url:"https://172.1696.251//File/get_addedFiles",
      method:"POST",
      data:{sfiles:u},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  });
  //return false;
  $('#track').click(function(e){
    e.preventDefault();
    var u=$('#sfiles').val();
    $.ajax({
      url:"https://172.1696.251//File/get_trackFile",
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