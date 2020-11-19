<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>File Management System UoA</title>
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="icon" type="image/png" sizes="145x145" href="<?php echo base_url(); ?>public/assets/img/au.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="<?php echo base_url(); ?>public/assets/manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Google-Products-Accordion.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mloureiro1973-login.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mloureiro1973-login-1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/mdb.min.css">
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.9/dist/summernote.min.css" rel="stylesheet">
  <script src="http://cdn.jsdelivr.net/npm/summernote@0.8.9/dist/summernote.js" defer></script>
    <style>
        .card{
            margin:20px;
           
        }
      
      
      
      #overlay {
  background: #ffffff;
  color: #666666;
  position: fixed;
  height: 100%;
  width: 100%;
  z-index: 5000;
  top: 0;
  left: 0;
  float: left;
  text-align: center;
  padding-top: 25%;
  opacity: .80;
}

.spinner {
    margin: 0 auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid firebrick;
    border-right-color: transparent;
    border-radius: 50%;
}
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
    
    </style>
   
   <script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
  
   <!-- <script src="https://cdn.tiny.cloud/1/ogsk2kzssbjqaj3wbcyop6sq0sfm1ily9xv7yjmvok6m47gt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  
</head>

<body>
   <script>
let userAgentString =  
                navigator.userAgent; 
          
            // Detect Chrome 
            let chromeAgent =  
                userAgentString.indexOf("Chrome") > -1; 
          
            // Detect Internet Explorer 
            let IExplorerAgent =  
                userAgentString.indexOf("MSIE") > -1 ||  
                userAgentString.indexOf("rv:") > -1; 
          
            // Detect Firefox 
            let firefoxAgent =  
                userAgentString.indexOf("Firefox") > -1; 
          
            // Detect Safari 
            let safariAgent =  
                userAgentString.indexOf("Safari") > -1; 
                  
            // Discard Safari since it also matches Chrome 
            if ((chromeAgent) && (safariAgent))  
                safariAgent = false; 
          
            // Detect Opera 
            let operaAgent =  
                userAgentString.indexOf("OP") > -1; 
                  
            // Discard Chrome since it also matches Opera      
            if ((chromeAgent) && (operaAgent))  
                chromeAgent = false; 
if(chromeAgent)
{
}
else
  {
document.write('<div id="overlay" style="display:block;"><div class="spinner"></div><br/><strong>This Browser is not Supported. Please Use Chrome Browser.</strong></div>');
    $('#overlay').fadeIn().delay(2000).fadeOut();
  }
     
  </script>
  <div class="header blue">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <img   src="https://172.1696.251/admingif/lo.png" class="img-fluid mx-auto col-md-12 " style="height:100px;" alt="Unversity Logo " >
        </div>
        <div class="col-sm">
          
          <img   src="https://172.1696.251/admingif/ul.png" class="img-fluid mx-auto col-md-12 " style="height:100px;" alt="Unversity Logo " >
        </div>
      </div>
    </div>
    
   
  </div>
    

      



<?php echo $this->session->flashdata('response'); ?>


