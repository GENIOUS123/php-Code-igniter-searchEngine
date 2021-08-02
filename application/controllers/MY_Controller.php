<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MY_Controller extends CI_Controller
{
	
	public function __Construct()
  {
    parent::__construct();

  }

	

}

class Public_Controller extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();

    $hidden=base64_encode(rand(8555552555252,98888888888888));
    $this->hidden = $hidden;
    $this->session->set_userdata("hiddense",$hidden);
  }
public function Create_page($page=null,$data=null){


if(!empty($page))
{

$this->load->view("public/common/head",$data);
$this->load->view("public/common/header",$data);
$this->load->view("$page",$data);
/*$this->load->view("public/common/footer",$data);*/
$this->load->view("public/common/script",$data);
}

}

public function is_login(){

if(!$this->session->userdata("unique_customer_id")){
 $taja =['auth_fail'=>'Your Session is Expired'];
$this->load->view("public/common/head",$taja);
$this->load->view("public/Home",$taja);
exit();

}else{

  return true;
}

}

public function logout(){
  
    $this->session->sess_destroy();
    redirect('Welcome');


  
}
       function sanitize($value = ''){

    $value = trim($value);
    if (get_magic_quotes_gpc()) { $value = stripslashes($value); }

    $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
    $value = strip_tags($value);
    //$value = mysqli_real_escape_string(get_mysqli(), $value);
    $value = htmlspecialchars($value);

    return $value;
}

public function create_product($product=array()){
$output=[];
$newproduct="";

if(!empty($product)){
foreach($product as $x=>$y){

$stockdetailarr = $this->stockdetail($y->productid);

if(!empty($stockdetailarr)){
$newproduct .= "<div class='raadhe' onclick=location.href='".base_url('public/Product/product_page/').htmlentities(base64_encode($y->productid))."'><div class='striketags'><div class='sriketagstext'>".$stockdetailarr['discount']."% OFF</div><img src ='".base_url('assets/images/icon/icon2/VectorSmartObject_0.png')."' width='100%;'/></div><div class='newimg'><img src ='".$stockdetailarr['profilepic']."' width='100%;'/></div><div class='newcard'><div class='striketag'><img src ='".base_url('assets/images/icon/icon2/tag.png')."' width='100%;'/></div><h5>".$y->brandname."</h5><div class='colortag'>".$y->product."</div><h5 style='color: black;line-height: 1rem;padding-top: 0.5rem;'><span>&#8377</span>".$stockdetailarr['discountrate']."<del><span style='margin-left: 1rem; color:#009750;font-size: 0.8rem;'>&#8377 ".$stockdetailarr['mrp']."</span></del></h5></div></div>";

}
}

return $newproduct;

}else{

  return false;
}


}
public function stockdetail($productid){
$this->load->model("Dataload");

$output=[];
if($productid !==""){
$sql="SELECT `product`.*,`stock`.`productid`,`stock`.`color`,`stock`.`mrp`,`stock`.`discount_percentage`,`stock`.`net_output_rate`,SUM(`stock`.`qts`) as `sumqts`,(SELECT SUM(CASE WHEN `sales`.`status` !='Cancelled' THEN `sales`.`qts` ELSE 0 END) FROM `sales` WHERE `sales`.`sale_productid` = `stock`.`productid` AND `sales`.`sale_product_color` = `stock`.`color`) as `sumsaleqts`  FROM `product` LEFT JOIN `stock` ON `stock`.`productid` = `product`.`productid`  WHERE `stock`.`productid` ='$productid'  GROUP BY `stock`.`color`";

$stockdetailarray = $this->Dataload->selectexecute($sql);

$noimage = base_url()."assets/images/no-image.png";
if(!empty($stockdetailarray)){
foreach($stockdetailarray as $x=>$y){

if($y->sumsaleqts =="null"){

  $sumsale = 0;
}else{
 $sumsale= intval($y->sumsaleqts); 
}
if($y->sumqts =="" || $y->sumqts== null){
$sumqts = 0;

}else{
  $sumqts =intval($y->sumqts);
}
$balance = $sumqts - $sumsale;
if($balance < 0){
  $balance = 0;
}
if($y->file_path && $y->file_path!==""){
$profilepicarr = explode(",",$y->file_path);

$profilepic=sisterurl()."assets/images/upload/product/".$profilepicarr[0];


}else{

  $profilepic =$noimage;
}



$output= [
             "productid"=>$y->productid,
             "discount"=>$y->discount_percentage,
             "product"=>$y->product,
             "color"=>$y->color,
             "mrp"=>$y->mrp,
             "profilepic"=>$profilepic,
             "availablestock"=>$balance,
             "brand"=>$y->brandname,
             "limit_sale"=>$y->limit_stock_sale,
             "product_description"=>$y->product_description,
             "product_keywords"=>$y->product_keywords,
             "imageset"=>$y->file_path,
             "color_category"=>$y->color_category,
             "discountrate"=>round($y->net_output_rate)

            ];

}



}

return $output;

} 
else{

  return false;
}

 }   

 public function getcolorbyid($id){

if(isset($id)){
$sql = "SELECT category,colorname FROM colorcategory WHERE sl_no = '$id'";

$data = $this->Dataload->selectexecute($sql);
if(!empty($data)){

foreach($data as $x=>$y){

$output = [
          $y->category=>$y->colorname,
          ];


return $output;

} 


}else{

  return false;
}

}else{

  return false;
}

}


}


 ?>
 