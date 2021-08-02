<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">.form-control{border-radius: 15px;padding: 0rem;padding-left: 0.8rem;}.form-group{margin-top:0.5rem;margin-bottom:0.5rem;}
</style>
<div style="position: absolute;margin: 0 auto;width: 100%;z-index: -800;"><img src ="<?=base_url('assets\images\BG.png');?>" width="100%;"></div>
<div class="signin" style="background-color:#30925b; ">
   
	<div class="center pt-5" style="width: 85%; margin-top: 0;">
    <h3>YOUR ACCOUNT</h3>

	<form id="vform" method="post">

  <div class="form-group">
  	
    <input type="text" class="form-control" placeholder="&nbsp;&nbsp;&nbsp;Name*" id="name" name="name" required>
  </div>
  <div class="row justify-content-between" style="width: 100%;margin: 0 auto;">
    <div class="col-3 modify tera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome(this)">Male</div>
    <div class="col-3 modify tera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome(this)">Female</div>
    <div class="col-3 modify tera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome(this)">Transgender</div>
    <div class="col-3 modify tera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome(this)">Corporate</div>
    <input type ="hidden" id="gendertype" name="gendertype" value=''>
  </div>

  <div class="form-group text-white font-weight-bold text-left"><label for="exampleInputEmail1">Address Type</label>
 <div class="row justify-content-between" style="width: 100%;margin: 0 auto;">
    <div class="col-4 modify text-center mera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome1(this)">Home</div>
    <div class="col-4 modify text-center mera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome1(this)">Office</div>
    <div class="col-4 modify text-center mera" style="font-size:3vw; padding: 4px 3px; max-width: 24%;" onclick="SelectSome1(this)">Other</div>
    <input type ="hidden" id="addreestype" name="addreestype" value=''>
    <input type ="hidden" id="formid" name="formid" value="<?php if(isset($formid)) echo $formid; ?>">

   
  </div>
  </div>
  <div class="form-group">

    <input type="text" class="form-control" style="margin-top: 0.2rem;" placeholder="&nbsp;&nbsp;&nbsp;City*" id="city" name="city" required>
    <input type="text" class="form-control" style="margin-top: 0.2rem;" placeholder="&nbsp;&nbsp;&nbsp;Pincode*" id="pincode" name="pincode" required>
    <input type="text" class="form-control" style="margin-top: 0.2rem;" placeholder="&nbsp;&nbsp;&nbsp;Address 1*" id="address1" name="address1" required>
    <input type="text" class="form-control" style="margin-top: 0.2rem;" placeholder="&nbsp;&nbsp;&nbsp;Address 2" id="address2" name="address2">
    <input type="text" class="form-control" style="margin-top: 0.2rem;" placeholder="&nbsp;&nbsp;&nbsp;Special Direction" name="specialdirection" id="city">
    <input type="text" class="form-control" style="margin-top: 0.2rem;" placeholder="&nbsp;&nbsp;&nbsp;GST Number" id="gst" name="gst">

  
  </div>
     <div class="form-group"> 
    <input type="email" class="form-control" placeholder="&nbsp;&nbsp;&nbsp;Email" id="email" name="email">
  </div>

  <button id="submit" type="submit" class="btn btn-primary modify">Submit</button>
   <div class="small text-white text-center"><a href="<?=base_url("public/Home");?>" style="color:white;">Skip for Now</a></div>
</form>

</div>
</div>
<script type="text/javascript">
  function SelectSome(attr){
var Data = attr.innerHTML;
if($(".tera").hasClass('purelyselected')){
$(".tera").removeClass('purelyselected');
}
attr.classList.add('purelyselected');
$("#gendertype").val(Data);

  }
</script>
<script type="text/javascript">
  function SelectSome1(attr){
var Data = attr.innerHTML;
if($(".mera").hasClass('purelyselected')){
$(".mera").removeClass('purelyselected');
}
$("#addreestype").val(Data);
attr.classList.add('purelyselected');

  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
        $("#submit").click(function(event){
          event.preventDefault();
          $("#submit").prop('disabled',true);
 
            $.ajax({
                      method:"POST",
                      url:"<?=base_url("public/Signup/signupform");?>",
                      data:data,
                      contentType: false,
                      cache: false,
                      processData:false,
                      dataType:"json",
                      data:data,
                      success:function(response){
                                               
                                                   $.each(response,function(key,value){

                                                     if(key == 'success'){

                                                      alert(value);
                                                      location.href = "<?=base_url('public/User_authonication/check_authonicate');?>";
                                                     }else if(value !== ""){
                                                           erroralert += value + "\n";

                                                     }

                                                   });

                                                   if(erroralert!==""){
                                                    alert(erroralert);
                                                    $("#submit").prop('disabled',false);
                                                   }
                                                  



          
                        
                      }


            });


          }else{
            alert("Form Reference Linked Id Not Set,");
            location.href = "<?=base_url('public/User_authonication/check_authonicate');?>";
          }




});
</script>
