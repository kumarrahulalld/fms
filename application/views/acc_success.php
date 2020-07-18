<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>


<div class="card m-5">

  <!-- Card image -->
  <img class="card-img-top p-4 ml-auto mr-auto" style="width:400px;height:400px;" src=<?php echo $this->session->userdata('qcode'); ?>  alt="Card image cap">

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title text-success"><a>Congratulations !.. Account Created Successfully.</a></h4>
    <!-- Text -->
    <p class="card-text text-danger">Attention !.. Please Save or Download The Provided QR Code Given In Image And Download Google Authenticator App From Play Store And Scan That QR And Save For Future This Will Help You To Login Into This System In Future. Whenever You Are Asked For Authentication Key Open The Authenticator App And Enter The Code Showing In App. Please Don't Forgot To Save This QR Because Even Admin Can't Generate It Agin So Take Care Of It.</p>
    <!-- Button -->
    <a href=<?php echo $this->session->userdata('qcode'); ?> class="btn btn-outline-danger" download>Download QR Code</a>
    <br/>
    <h4 class="card-title text-info"><a>To Download QR Code Click On Download Button And Than Right Click & Select Save Image As Option.</a></h4>

    <a href="http://localhost/fms/Authenticator/panel" class="btn btn-outline-success" download>Go To Dashboard</a>

  </div>

</div>
<?php include('Footer.php');?>
</body>
</html>