<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>
<style>
    .indent-1 {float: left;}
    .indent-1 section {width: 50%; float: left;}
</style>

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

<div class="container">
  <div class="row">
    <div class="col">
      
    </div>
  </div>
</div>
<div class="card rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>Create a File</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" id="form" action="https://172.1696.251//File/addFile" enctype="multipart/form-data">
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
                <input type="text" id="cribe" name="cribe" value="<?php echo set_value('cribe'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="cribe">File Description</label>
                <span class="text-danger wrap-text"><?php echo form_error('cribe');?></span>

            </div>
  </div>
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="file" id="ufile" name="ufile" value="<?php echo set_value('ufile'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <span class="text-danger wrap-text"><?php echo form_error('ufile');?></span>

            </div>
  </div>

<section class="indent-1">
    
    <section>
     
     <div class="md-form mb-0" style="float:left;background-color:lightgreen;">
    <h4 class="text-center">File Noting</h4>
  <div class="md-form" style="">
   
                <textarea  style="background-color:lightgreen; width:500px;"  class="md-textarea form-control mt-1 mr-2" rows="20" cols="128" id="desc" name="desc" value="<?php echo set_value('desc'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                </textarea>
                
                <span class="text-danger wrap-text"><?php echo form_error('desc');?></span>

            </div>
  </div> 
</section>
    <section>
<div id="spdf" name="spdf" class="ml-3">
</div>
</section>

</section>


</div>
</br>
<button name="upload" id="upload" class=" btn btn-success btn-lg float-right">Add File</button>

</form>
</div>
</div>
</div>
<?php  include('Footer.php');?>
 <script>
    $(document).ready(function() {
   $('#desc').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    });
  </script>
    <script type="text/javascript">
    $(document).ready(function(){
 
        $('#ufile').change(function(e){
            var file_data = $('#ufile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('ufile', file_data);
                 $.ajax({
                     url:'https://172.1696.251//File/upload',
                     type:"post",
                     data: form_data,
                     processData:false,
                     contentType:false,
                     cache:true,
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