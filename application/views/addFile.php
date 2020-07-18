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
    <strong>Add A File .</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" id="form" action="http://localhost/fms/File/addFile" enctype="multipart/form-data">
                <div class="row">

                <?php echo @$error; ?> 
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="text" id="title" name="title" value="<?php echo set_value('title'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="title">File Title</label>
                <span class="text-danger wrap-text"><?php echo form_error('title');?></span>

            </div>
  </div>
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="text" id="desc" name="desc" value="<?php echo set_value('desc'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="desc">File Description</label>
                <span class="text-danger wrap-text"><?php echo form_error('desc');?></span>

            </div>
  </div>
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="file" id="ufile" name="ufile" value="<?php echo set_value('ufile'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <span class="text-danger wrap-text"><?php echo form_error('ufile');?></span>

            </div>
  </div>


<div id="spdf" name="spdf">
</div>


<button name="upload" id="upload" class="btn btn-outline-primary m-4">Add File</button>
</div>
</div>
</form>
</div>
</div>
</div>
<?php  include('Footer.php');?>

    <script type="text/javascript">
    $(document).ready(function(){
 
        $('#ufile').change(function(e){
            var file_data = $('#ufile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('ufile', file_data);
                 $.ajax({
                     url:'http://localhost/fms/File/upload',
                     type:"post",
                     data: form_data,
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){

                          $('#spdf').html(data);
                   }
                 });
            });
         
 
    });
     
</script>
</body>
</html>