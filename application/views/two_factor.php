<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>

   <div  class="card rounded">
    <div id="contain" class="container img-fluid">
        
  <div class="row">
    <div class="col-sm">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_IQ2Fuq.json"  background="transparent"  speed="0.5"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>
     <!--<img src="/autenticate1.png" class=" img-responsive img-fluid" alt="Cinque Terre"> -->
    </div>
    <div class="col-sm">
     <div class="card rounded p-2">
    <h5 class="card-header info-color white-text text-center py-4 mt-2">
    <strong>Authentication </strong>
  </h5>    
        <form class="text-center" style="color: #757575;" action="check" method="post">
        <div class="md-form">
            <label for="validationServer01">2FA Code</label>
        <input class="form-control is-valid  form " id="validationServer01" type="password" id="Password" name="password" placeholder=" Enter 2FA Code ">
        
      <small>
           Please select password for the ID Created in Google Authenticator App and Paste it here.
      </small>
      
</div>
            <button class="btn   btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0"  type="submit">Sign in</button>
            <br/>
            <span class="text-danger wrap-text"><?php echo form_error("password");?></span>
            <br/>
        </form>
            
        </div>
    </div>
    
  </div>
     </div>
</div>

    
 
 
 
 
 
    




        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<?php  include('Footer.php');?>
</body>

</html>