<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User_authonication extends Public_Controller
{

public function index(){
$this->load->view('public/common/head');
$this->load->view('public/signin');


}
public function setcookieehash($name,$data){
$this->load->helper('cookie');
$newdata = password_hash($data, PASSWORD_DEFAULT);
$setaut = set_cookie($name,$newdata,'2592000');
return $newdata;


}
public function setcookieebase($name,$data){
$this->load->helper('cookie');
$newdata = base64_encode($data);
$setaut = set_cookie($name,$newdata,'2592000');
return $newdata;

}
public function getcookiee($data){
$this->load->helper('cookie');

return get_cookie($data);

}

public function check_authonicate(){
$this->load->library('cart');
$this->load->model('Dataload');
$this->load->model("admin/User_authonication_model");
$logindata = base64_decode($this->getcookiee("userdata"));
$password = $this->getcookiee("userauthonicate");


$data = $this->User_authonication_model->check_for_login($logindata,$password);

if($data == false){

$this->authonication();


}else{
$asd = array("name"=>$data->name,"username" => $data->mobile_no,"unique_customer_id"=>$data->unique_customer_id);
$this->session->set_userdata($asd);
$this->session->set_userdata($asd);
$sql = "SELECT * from banner WHERE status = 'Activated'";

$datal = $this->Dataload->selectexecute($sql);
$output['output']=$datal;

return $this->Create_page('public/Home',$output);

//return $this->Create_page('public/Home');
	
}

}


public function authonication(){


$this->load->library('form_validation');
$this->form_validation->set_rules("cdetails","Mobile Number","required|callback_validateMobile|trim");
$this->form_validation->set_rules("otp","OTP","required|trim");


if($this->form_validation->run() == TRUE){

if($this->checkOTP() == false){

$this->load->view('public/common/head');
$this->load->view('public/signin');

}

else{

$this->load->model("admin/User_authonication_model");

$user = $this->input->post('cdetails');



$password = $this->getcookiee("userauthonicate");
$data = $this->User_authonication_model->check_for_userdata($user);

if($data == false){

$formid = $this->check($user);

if($formid){
$out['formid'] = $formid;

$this->load->view('public/common/head');
$this->load->view('public/address',$out);

}else{

$taja =['auth_fail'=>'User Id Or Password Incorrect'];
$this->load->view('public/common/head');
$this->load->view('public/signin',$taja);

}


/*$taja =['auth_fail'=>'User Id Or Password Incorrect'];
$this->load->view('public/common/head');
$this->load->view('public/signin',$taja);*/
}
else{
$password = $this->setcookieehash("userauthonicate",$data->unique_customer_id);
$id = $this->setcookieebase("userdata",$user);

$dssdsd = $this->Dataload->update_data("customers",["password"=>$password,"updated_on"=>date('Y-m-d h:i:s')],"mobile_no = '$user'" );


$asd = array("name"=>$data->name,"username" => $data->mobile_no,"unique_customer_id"=>$data->unique_customer_id);
$this->session->set_userdata($asd);

$sql = "SELECT * from banner WHERE status = 'Activated'";

$datal = $this->Dataload->selectexecute($sql);
$output['output']=$datal;

return $this->Create_page('public/Home',$output);

//return $this->Create_page('public/Home');
 

}


}


}
else{

$this->load->view('public/common/head');
$this->load->view('public/signin');

}

}
public function validateMobile($input){
/*$input = "852760382";*/
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

if(!preg_match('/^[0-9]{10}+$/', $input)){

$this->form_validation->set_message(__FUNCTION__, 'This is not a valid Mobile Number');
return false;

}else{
	 return true;
}



}
public function checkOTP($id=null,$verify=null){

if(is_null($id) || is_null($verify) ){

$otp = $this->input->post('otp');
$verifyotp =$this->input->post('verifyotp'); 
if(password_verify($otp, $verifyotp)){
/*$data['message']="OTP Verified Successfuly";
$data['success']= true;*/
return true;
}else{
  /*  $data['success'] = false;
  $data['message'] ="Verify Mobile Number First using OTP ";*/
  return false;
}
//echo json_encode($data);

}else{

$otp = $id;
$verifyotp =$verify; 
if(password_verify($otp, $verifyotp)){
return true;
}else{
    return false;
}


}


}
public function createOTP(){

 $data['message']  = "OTP WILL ENTER AUTOMATICALLY IN 3 SECONDS";
 $data['otp'] = password_hash("654321", PASSWORD_DEFAULT);

echo json_encode($data);
}
//signup code 


public function check($mobile){



if($this->isDuplicatemobile($mobile)){

  if(strlen($mobile) == 10 && is_numeric($mobile)){
  $this->load->model('Dataload');
  $id =intval("3333".rand(1111111,9999999));
  $password=password_hash($id, PASSWORD_DEFAULT);
  $mobile = $this->sanitize($mobile);

  $data = [
            "unique_customer_id"=>$id,
            "password"=>$password,
            "mobile_no"=>$mobile,
            "updated_on"=>date("Y-m-d h:i:s"),
            "is_active"=>"1"

          ];
  if($this->Dataload->insertdata("customers",$data)){
$password = $this->setcookieehash("userauthonicate",$id);
$id = $this->setcookieebase("userdata",$mobile);
  
    return rawurlencode($id);
  }

  }else{
    return false;
  }


}


}

public function isDuplicatemobile($input){
$this->load->library('form_validation');
$this->load->model('Dataload');
 if($this->Dataload->extract_data("customers",['mobile_no'=>'= "'.$input.'"'])){

$this->form_validation->set_message('isDuplicatemobile','This %s Number is already registered in our record');
   return false;


 }

 else{

 	return true;
 }



}

public function gotoaddresspane(){
$user = base64_decode($this->getcookiee("userdata"));
$formid = $this->isDuplicatemobile($user);
if(!$formid){
$out['formid'] = urlencode(base64_encode($user));

$this->load->view('public/common/head');
$this->load->view('public/address',$out);

}


}




}


 ?>