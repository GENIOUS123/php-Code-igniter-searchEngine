<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
.showmore{text-align: center;
    font-weight: 600;
}
.rows {
    padding-bottom: 0rem!important;
}
#bannersection{padding-top:9.3rem;}
</style>
<!-- banner section -->
<div id="porto">
<section class="section-intro padding-y-sm" id="bannersection">
<div class="container" style="padding-left: 6px;padding-right: 6px;">

<?php
$sliderone ="";
$urlone="";
	 if(isset($output)){
foreach($output as $x=>$y){
if($y->url !==""){
$url = base64_decode($y->url);
$url = parse_url($url, PHP_URL_PATH);
$url = base_url($url);


}else{
$url ="#";
}

if($y->sl_no == 1){

$sliderone .="<div class='carousel-item active'><a href ='".$url."'><img class='d-block w-100 img-fluid rounded' src='".sisterurl()."assets/images/banners/".base64_decode($y->image)."' alt ='".$y->alttext."' /></a></div>";
$urlone.="<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>";


}else{

$sliderone .="<div class='carousel-item'><a href ='".$url."'><img class='d-block w-100 img-fluid rounded' src='".sisterurl()."assets/images/banners/".base64_decode($y->image)."' alt ='".$y->alttext."' /></a></div>";

$urlone.="<li data-target='#carouselExampleIndicators' data-slide-to='".$y->sl_no."'></li>";

}


}}else{
 
 echo "Slider not from Container";
}
?>
<!-- <div class="carousel-item active"><img class="d-block w-100 img-fluid rounded" src="<?=base_url('assets/images/banners/layer4.png');?>"></div><div class="carousel-item"><img class="d-block w-100 img-fluid rounded" src="<?=base_url('assets/images/banners/layer4.png');?>"></div><div class="carousel-item"><img class="d-block w-100 img-fluid rounded" src="<?=base_url('assets/images/banners/layer4.png');?>"></div> -->

<div class="intro-banner-wrap">
	<div id="carouselExampleIndicators" class="carousel slide pointer-event" data-ride="carousel" data-interval="false"><ul class="carousel-indicators"><?=$urlone;?></ul> <div class="carousel-inner"><?=$sliderone;?></div> <!-- container //  --></div>
	<!-- <img src="<?=base_url('assets/images/banners/layer4.png');?>" class="img-fluid rounded"> -->
</div>


</div> <!-- container //  -->
</section>
<!--category section-->
<section class="container section-intro padding-y-sm">
	<div class="category">
		
<div class="sectioncategory" onclick="showcategory()"></div>


</div>


	</div>
	
</section>
</div>
<section class="newarrival">
	
<div class="arrivalheader">
<div class="kanchu"><img src="<?=base_url('assets/images/banners/categoryicon/VectorSmartObject2co.png');?>" width="100%;"/> </div>
<div class="padding container"></div>
</div>
<div class="container">
	
<div id="newarrival" class="rows">
<!-- <div class="raadhe">
<div class="striketags">
	<div class="sriketagstext">50% OFF</div>
<img src ="<?=base_url('assets/images/icon/icon2/VectorSmartObject_0.png');?>" width='100%;'/>
</div>

<div class="newimg">
<img src ="<?=base_url('assets/images/banners/newarrival/Layer4.png');?>" width='100%;'/>
</div>
<div class="newcard">
		<div class="striketag">
<img src ="<?=base_url('assets/images/icon/icon2/tag.png');?>" width='100%;'/>
</div>
	<h5>REYNOLDS</h5>
	<div class="colortag">Teddy Bear Soft Toy</div>
	<h5 style="color: black;line-height: 1.2rem;"><span>&#8377</span>799<del><span style="margin-left: 1rem; color:#495057;">&#8377 1499</span></del></h5>

</div>
</div> -->
</div>
</section>


<script type="text/javascript">

$(document).ready(function(){
$(".category").html(loader());
$(".sectioncategory").html(loader());
$.ajax({
	    method:"POST",
	    dataType:"json",
	    data:{limit:12},
	    url:"<?=base_url("public/Home/load");?>",
	    success:function(respond){
	    	$(".sectioncategory").html("");
	    	$(".category").html(respond.mcimage);
           /*autocolor();*/
           $("#newarrival").html(respond.newproduct);
	    }



});


});

function showcategory(id){

location.href="<?=base_url('public/category/Mastercategory/index/');?>" + atob(id);

}

</script>
<script type="text/javascript">


function ShowMore(){

var limit = 12;
var offset = $(".raadhe").length;
$("#loading").css("visibility","visible");
$("#loading").css("z-index","999");

$.ajax({
	    method:"POST",
	    dataType:"json",
	    data:{limit:limit,offset:offset},
	    url:"<?=base_url("public/Home/loadmore");?>",
	    success:function(respond){
	    	$("#loading").css("visibility","hidden");
            $("#loading").css("z-index","-999");
            $(".showmore").remove();
           $("#newarrival").append(respond.newproduct);
	    }



});



}

$('.carousel').carousel({
  interval: 5000
})
</script>