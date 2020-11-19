<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');

?>


    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                </ul>
            </div>
        </div>
    </nav>
    <div  class="card rounded">
    <div id="contain" class="container img-fluid">
        
  <div class="row">
    <div class="col-sm">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets7.lottiefiles.com/packages/lf20_JzIbhM.json"  background="rgba(0, 0, 0, 0)"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
     
    </div>
    <div class="col-sm">
     <div class="card rounded">
    
    <h5 class="card-header info-color white-text text-center py-4 mt-2">
    <strong>Sign in</strong>
  </h5>
  <div class="card-body px-lg-5 pt-0">
       <img class="rounded mx-auto d-block m-2 img-fluid" src="<?php echo base_url(); ?>public/assets/img/au.png">
        <form class="text-center" style="color: #757575;" action="<?php base_url();?>Welcome/login" method="post">
        <div class="md-form">
        <input class="form-control" type="email" id="Email" name="email" required="" placeholder="Email address" autofocus="">
</div>
<div class="md-form">
        <input class="form-control" type="password" id="Password" name="password" required="" placeholder="Password">
</div>
            <button
            class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="login" type="submit">Login </button>
        </form>
        <a class="forgot-password" href="#" id="fpas">Forgot Password?</a>
        <span class="text-danger wrap-text"><?php echo form_error("email");?></span>

        <span class="text-danger wrap-text"><?php echo form_error("password");?></span>
    </div>
</div>
    </div>
    
  </div>
      </div>
</div>


  <script>
      var el = document.getElementById('fpas');
el.onclick = showFoo;


function showFoo() {
  alert('Please Contact Admin.');
  return false;
}
  </script>
    
    
    
    
    
    
    
  
<?php  include('Footer.php')?>
</body>


</html>