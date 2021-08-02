<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$bagcontent = $this->cart->contents();
$bagcount =0;
if(is_array($bagcontent)){
  foreach($bagcontent as $x=>$y)  {
    $bagcount += intval($y['qty']);  
      
  }
    
}

if($bagcount == 0){
  $bagcount ="";  
    
}
?>
<style type="text/css">
#suggesstion-box #country-list li {
    text-decoration: none;
    list-style: none;
    color: white;
    text-align: left;
    padding: 0.5rem;
    background-color: rgba(0,0,0,0.9);
    left: 0;
    transition: 0.5s;
}
#suggesstion-box #country-list li:hover {
    background-color: rgba(0,0,0,0.7);  
}
#suggesstion-box{
  position: absolute;
  width: 100%;
  z-index: 999;
  margin-top: 6.5vh;
  margin-left: -2.5rem;
  overflow-y: scroll;
  height: 80vh;
}

  #asak{display:none;}.changelittle{z-index: 10;}
  @media only screen and (max-width: 767px){
#asak {display: block;}
</style>
<!-- header section Starts here -->
<header class="section-header">
<div style="max-width: 1600px;width:100%; text-align: center;margin: 0 auto;padding: 0;padding-top:4vh;background-color:#00964f;"></div>
<section class="header-main border-bottom">
	<div class="container-fluid">
		<div class="row align-items-start" style="justify-content: space-around;">
			<div class="changelittle col-2">
				<a href="<?=base_url('public/User_authonication/check_authonicate');?>" class="brand-wrap">
					<img class="logo" src="<?=base_url('assets/images/logo/logo1.jpg');?>">
				</a> <!-- brand-wrap.// -->
			</div>
						<div class="col-lg-10 col-md-10 col-sm-12" style="text-align: right;">
				<div class="widgets-wrap float-md-right" style="position: relative;z-index: 1;">
					<div class="widget-header">
           
						<a href="tel:9715440055" class="widget-view" style="text-decoration: none;">
							<div class="icon-area">
								<i class="fas fa-headset" aria-hidden="true" style="transform: rotateY(180deg);"></i>
							</div>
							<small class="text"> Call Us </small>
						</a>
					</div>
	
					<div class="widget-header" onclick="gotobag();">
						<a href="#" class="widget-view" style="text-decoration: none;">
							<div class="icon-area">
							      <span id="bagcount" style='color: rgb(255, 255, 255);border-radius: 50%;font-size: 0.8rem;display: block;position: absolute;padding: 0.1vw 1.8vw;font-weight: 900;right: -6px;'><?php if(isset($bagcount)) echo $bagcount; ?></span>
								<i class="fas fa-briefcase"></i>
							</div>
							<small class="text"> My Bag </small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> 
			<div id="forex" class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
				<form action="#" class="search-header">
					<div class="input-group w-100">
					  <div class="input-icons inputnew"> 
               
            </div>
					    <input type="text" id="search" name="search" class="form-control rounded text-center" placeholder="Search Your Products here" onfocus="this.placeholder=''" onblur="this.placeholder='Search Your Products here'">
              <div id="suggesstion-box"></div>

					    <div class="input-group-append">
					    
					    </div>
				    </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
<!-- col.// -->
		</div> <!-- row.// -->
	</div> 
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav5" aria-expanded="false" aria-label="Toggle navigation" style="background-color: rgba(0,151,80,1)!important;position: absolute;margin-top: -103px;border: none!important;outline: none;z-index: 666;">
 <div id="flee"></div>
<div id="flee"></div>
<div id="flee"></div>

      </button>
	<!-- container.// -->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0,151,80,1)!important;padding-top: 0;">

  <div class="container" style="position: relative;">
    
      <div class="collapse navbar-collapse" id="main_nav5">
        <ul class="navbar-nav">
          <li class="nav-item dropdown has-megamenu">
            <a class="nav-link font-weight-bold" style="color:white;" href="<?=base_url("public/Myaccount");?>">MY ACCOUNT</a></li>
             <li class="nav-item dropdown has-megamenu">
             <a class="nav-link font-weight-bold" style="color:white;" href="tel:9715440055">CALL US</a></li>
              <li class="nav-item dropdown has-megamenu">
             <a class="nav-link" href="#" style="color:black;">EXCHANGE / RETURN POLICY </a></li>
            <li id="asak" class="nav-item dropdown has-megamenu">
             <a class="nav-link" style="font-size: 0.8rem;color:yellow;">
             NO EXCHANGE, NO REFUND, NO RETURN FOR GOODS ONCE DELIVERED. PLEASE PURCHASES YOUR PRODUCTS CAREFULLY.</a></li>
 <!--            <div class="dropdown-menu megamenu" role="menu">
              <div class="row">
                <div class="col-md-3 col-6">
                  <div class="col-megamenu">
                    <h6 class="title">Title Menu One</h6>
                    <ul class="list-unstyled">
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                    </ul>
                  </div>  
                </div>                
                <div class="col-md-3 col-6">
                  <div class="col-megamenu">
                    <h6 class="title">Title Menu Two</h6>
                    <ul class="list-unstyled">
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                    </ul>
                  </div>  
                </div>
                                <div class="col-md-3 col-6">
                  <div class="col-megamenu">
                    <h6 class="title">Title Menu Three</h6>
                    <ul class="list-unstyled">
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                    </ul>
                  </div> 
                </div>    
                <div class="col-md-3 col-6">
                  <div class="col-megamenu">
                    <h6 class="title">Title Menu Four</h6>
                    <ul class="list-unstyled">
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                      <li><a href="#">Submenu item</a></li>
                    </ul>
                  </div>  
                </div>
              </div>
            </div> 
          </li>
             
          <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
          <!-- <li class="nav-item dropdown"> 
            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> More </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
              <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
            </ul>
          </li> -->
        </ul>
      </div> <!-- navbar-collapse.// -->
  </div> <!-- container //end -->

</nav>
</section> <!-- header-main .// -->

</header>