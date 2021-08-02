<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" class="no-ie no-js lang-en">
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="country" content="India">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="icon" href="<?=base_url().'assets/images/logo/logo3.png';?>" type="image/x-icon"/>
<title>Jane Daanee</title>

<!-- jQuery -->
<script src="<?=base_url().'assets/js/jquery-2.0.0.min.js';?>" type="text/javascript"></script>
<!-- Bootstrap4 files-->
<script src="<?=base_url().'assets/css/bootstrap.bundle.min.js';?>" type="text/javascript"></script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/js/chosen.css');?>">
  <script src="<?php echo base_url('assets/js/chosen.jquery.js');?>"></script>

<!-- Font awesome 5 -->
<link href="<?=base_url().'assets/css/fonts/fontawesome/css/all.min.css';?>" type="text/css" rel="stylesheet">
<!-- custom style -->
<link href="<?=base_url().'assets/css/ui.css';?>" rel="stylesheet" type="text/css"/>
<link href="<?=base_url().'assets/css/responsive.css';?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?=base_url('assets/css/css.php');?>"/>
<link rel="stylesheet" href="<?=base_url('assets/css/cssresponsive.css');?>"/>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
<!-- custom javascript -->
<script src="<?=base_url().'assets/js/script.js';?>" type="text/javascript"></script>
<style type="text/css">
input[type='text'],
input[type='number'],
input[type='password'],
button,
textarea {
outline: none;
box-shadow:none !important;
border:1px solid #ccc !important;
}
.widget-view:active {
    color: white;
}
.widget-view:hover {
    color: white;
}
.widget-header a:active {
    color: white;
}
.widget-header:hover {
    color: white;
}
/**:hover,
*:focus,
*:active
*:click,
 {
  outline: none!important;;
  box-shadow: none !important;
}*/
.btn{border-color: transparent!important;}
.btn-primary{border-color: transparent!important;}
	
.mainloader{
 width: 100%;
 position: fixed;
 transition: 2s;
 visibility: visible;
 z-index: 999;
 height: 100%;
 background-color: rgba(255,255,255,0.8);

}
.showmore{
    text-align: center;
    font-weight: 600;
    color: #424242;
    width: 100%!important;
    padding: 1rem 0;
    background-color: #d8d7d7;
}
.rows{
  padding-bottom: 0rem!important;
}
.newcard{
  text-align: left;
}
</style>

</head>
<body >
<!-- <div id="testimonialhulk">
	<img class="mainloader" src ="<?=base_url('assets/Page-1.jpg');?>" width="100%"/>
</div> -->
<div id="loading" class="mainloader"></div>
<div class="container-fluid" style="max-width: 1600px; text-align: center;margin: 0 auto;padding: 0;">

<script type="text/javascript">

$(document).ready(function(){

$("#loading").css("visibility","hidden");
$("#loading").css("z-index","-999");


});
$(window).on('load', function(){
  setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( "#loading" ).fadeOut(500, function() {
      // fadeOut complete. Remove the loading div
$("#loading").css("visibility","hidden");
$("#loading").css("z-index","-999");
  });  
}



</script>
<script type="text/javascript">
window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});


</script>