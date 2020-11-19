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
    <strong>Select File To Generate Order</strong>
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
      <h4 class="text-center">Select File Here</h4>
    <select class="browser-default custom-select custom-select-md" name="dep" id="dep" value="<?php echo set_select('dep'); ?>">
        <option value="">Select File</option>
        <?php 

foreach($user as $row)
{ 
  echo '<option value="'.$row->file_id.'">'.$row->file_id.'</option>';
}
?>
    </select>
    <span class="text-danger wrap-text"><?php echo form_error('dep');?></span>
  </div>
</div>
</div>
</form>
<div id="tab" name="tab">  
</div>
                    <button type="button" class="btn btn-info" onclick="myFunction()">
      <span class="glyphicon glyphicon-print"></span> Print Documents
    </button>
</div>
</div>
</div>

<?php include('Footer.php'); ?>
<script>
function myFunction() {
  var pages = document.getElementsByTagName("EMBED");
var oWindow=new Array();
function PrintAll(){
    for (var i = 0; i < pages.length; i++) {
        oWindow[i].print();
        oWindow[i].close();

    }
}
    function OpenAll() {
    for (var i = 0; i < pages.length; i++) {
        oWindow[i] = window.open(pages[i].src);
    }
    setTimeout("PrintAll()", 5000);
    }
    OpenAll();
  
  var divContents = document.getElementById("note").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body > <h1>---------Notings----- <br>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 

}
</script>
    <script>

  $(document).ready(function(){
    $('#dep').change(function(){
      var u=$('#dep').val();
      $.ajax({
        url:"https://172.1696.251//File/get_order",
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