<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Header.php');
?>
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">File Management System UoA</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/fms/File">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="http://localhost/fms/User/logout">Log Out</a></li>

               
                </ul>
            </div>
        </div>
    </nav>
<!--/.Navbar -->
<div class="row row-cols-1 row-cols-md-1 m-5 p-5">
  <div class="col mb-4">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top ml-auto mr-auto mt-3" style="height:400px;width:400px;" src="https://cdn.pixabay.com/photo/2016/04/15/18/05/computer-1331579_960_720.png"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body" style="text-align:center;">

        <!--Title-->
        <h4 class="card-title">Users Opeartions</h4>
        <!--Text-->
        <p class="card-text">You Can Send, Receive , Revert , View Files And Can Change Your Password. </p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->

        <button type="button" class="btn btn-outline-success waves-effect"><a href="http://localhost/fms/File/newfile">Add File</a></button>
        <button type="button" class="btn btn-outline-danger waves-effect"><a href="http://localhost/fms/File/addedFile">Added Files</a></button>
        <br/>
        <button type="button" class="btn btn-outline-primary waves-effect"><a href="http://localhost/fms/File/receivedFiles">Received Files</a></button>
        <button type="button" class="btn btn-outline-secondry waves-effect"><a href="http://localhost/fms/File/cpass">Change Password</a></button>

      </div>

    </div>
    <!-- Card -->
  </div>
</div>
<?php include('Footer.php');?>
</body>
</html>