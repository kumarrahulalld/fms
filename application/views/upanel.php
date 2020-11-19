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
<!--/.Navbar -->



<div class="card rounded mx-auto d-block m-5">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <h5 class="card-header bg-warning white-text text-center py-4">
    <strong> Recieved  Files </strong> <i class="fa fa-bell" </i>

  </h5>   
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
<table class="table table-responsive-md  ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">File No.</th>
      <th scope="col">Subject Matter</th>
      <th scope="col">From</th>
    </tr>
  </thead>
  <tbody>
   
        <?php 
foreach($sfile as $row)
{ 
  echo ' <tr><td><strong>'.$row->file_id.'</strong></td>';
  echo '<td><strong>'.$row->file_title.'</strong></td>';
  echo '<td><strong>'.$row->cribe.'</strong></td>';
  echo '<td><strong>'.$row->bywhom.'</strong></td> </tr>';
}
?>
   
  </tbody>
</table>
</div>
</div>
<div class="row row-cols-1 row-cols-md-1 m-5 p-5">
  <div class="col mb-4">
    <!-- Card -->
    <!--<div class="card">-->

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top ml-auto mr-auto mt-3" style="height:200px;width:200px;" src="https://cdn.pixabay.com/photo/2016/04/15/18/05/computer-1331579_960_720.png"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body bg-light " style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Users Operations</h4>
        <!--Text-->
        <p class="card-text">You Can Create, Forward , Revert , View Files And Can Change Your Password. </p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<div class="btn-group btn-group-sm" role="group" >
        <button type="button" class="btn btn-outline-success waves-effect"><a href="https://172.1696.251//File/newfile">Create File</a></button>
        <button type="button" class="btn btn-outline-danger waves-effect ml-1"><a href="https://172.1696.251//File/addedFile">Added Files</a></button>
        
        <button type="button" class="btn btn-outline-primary waves-effect ml-1"><a href="https://172.1696.251//File/receivedFiles">Received Files</a></button>
        <button type="button" class="btn btn-outline-dark waves-effect ml-1"><a href="https://172.1696.251//File/cpass">Change Password</a></button>
  		
  		 <button type="button" class="btn btn-outline-info waves-effect ml-1"><a href="https://172.1696.251//File/genorder">Generate Order</a></button>

      </div>

    </div>
</div>
    <!-- Card -->
  </div>
</div>
<?php include('Footer.php');?>
</body>
</html>