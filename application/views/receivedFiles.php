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
<div class="card rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header info-color white-text text-center py-4">
    <strong>Received Files By You.</strong>
  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
<?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
                <!-- Edit Form -->
                <form method="post" action="https://172.1696.251//File/forwardComp">
                <div class="row">

                  
<!-- First column -->
<div class="col-md-12">
  <div class="md-form mb-0">
      <h4 class="text-center">Select File</h4>
    <select class="browser-default custom-select custom-select-md" name="sfiles" id="sfiles" value="<?php echo set_select('sfiles'); ?>">
        <option value="">Select File Title</option>
        <?php 
foreach($sfile as $row)
{ 
  echo '<option value="'.$row->file_id.'">'.$row->file_title.' From '.$row->file_from.' </option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('sfiles');?></span>
    <div class="col-md-12">
  <div class="md-form mb-0" id="" style="background-color:lightgreen;">
      <h4 class="text-center">Add Noting</h4>
  <textarea id="desc" name="desc" class="md-textarea form-control" rows="10" style="background-color:lightgreen;"></textarea>
</div>
</div>
                <span class="text-danger wrap-text"><?php echo form_error("desc");?></span>

  </div>
  <div class="md-form mb-0">
  <div class="md-form">
                <input type="file" id="ufile" name="ufile" value="<?php echo set_value('ufile'); ?>" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <span class="text-danger wrap-text"><?php echo form_error('ufile');?></span>

            </div>
  </div>


<div id="spdf" name="spdf">
</div>
  <div id="vfile" name="vfile">
</div>



</div>
</div>
  <button name="view" id="frwd" class="btn btn-outline-primary m-4">Forward File</button>
  <button name="track" id="rvrt" class="btn btn-outline-primary m-4">Revert File</button>
                  <?php if($this->session->userdata('isa')->DEPARTMENT=="Executives") echo '<button name="approve" id="approve" class="btn btn-outline-primary m-4">Approve File</button>'; ?>
  <div id="result" name="result">
</div>
</form>

</div>
</div>
</div>
<?php include('Footer.php'); ?>
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

    <script>

$(document).ready(function(){
  //  e.preventDefault();
  $('#frwd').click(function(e){
    e.preventDefault();
    var u=$('#sfiles').val();
    $.ajax({
      url:"https://172.1696.251//File/get_Forward",
      method:"POST",
      data:{sfiles:u},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  });
  
  $('#approve').click(function(e){ e.preventDefault(); var u=$('#desc').val(); var v=$('#sfiles').val(); $.ajax({ url:"https://172.1696.251//File/approveFile", method:"POST", dataType : "json", data:{desc:u,sfiles:v}, success:function(data)
      {
    if(data=="1"){
      alert("File Approved Successfully. !");
      window.location.href="https://172.1696.251/File";
      }
					else{
					   alert("Error occured !");
					}
      } }); });
  
   $('#sfiles').change(function(e){
    e.preventDefault();
    var u=$('#sfiles').val();
    $.ajax({
      url:"https://172.1696.251//File/get_pdf",
      method:"POST",
      data:{sfiles:u},
      success:function(data)
      {
        $('#vfile').html(data);
      }
    });
  });
  //return false;
  
        $('#ufile').change(function(e){
            var file_data = $('#ufile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('ufile', file_data);
                 $.ajax({
                     url:'https://172.1696.251//File/uploadfor',
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
  
$('#rvrt').click(function(e){ e.preventDefault(); var u=$('#desc').val(); var v=$('#sfiles').val(); $.ajax({ url:"https://172.1696.251//File/get_Revert", method:"POST", dataType : "json", data:{desc:u,sfiles:v}, success:function(data)
      {
    alert(data);
      } }); });


});
</script>



</body>
</html>