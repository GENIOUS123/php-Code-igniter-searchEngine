<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<script type="text/javascript">
  function selectsearchproduct(id,field,cat){
  var cate = atob(cat);
  if(field =="none"){


  }else{
   $("#search").val(cate);
    $("#suggesstion-box").html('');
    $("#suggesstion-box").css("display","none");
    $("#loading").css("visibility","visible");
    $("#loading").css("z-index","999");
 $.ajax({
    type: "POST",
    url: "<?=base_url("public/Searchnew/Searchnewdata");?>",
    data:{id:id,field:field},
 
    success: function(res){
      $("#porto").html('');
      $(".kanchu").html('');
         $("#newarrival").css("padding-top","4vh");
       $("#newarrival").html(res);
       $("#loading").css("visibility","hidden");
         $("#loading").css("z-index","-999");
         
    }
    });

  }



  }
			
$(document).ready(function(){
$("#search").keyup(()=>{
 $("#suggesstion-box").css("display","block");
$("#loading").css("visibility","visible");
$("#loading").css("z-index","999");
var searchval = $("#search").val();
if(searchval.length > 2){

$.ajax({
    type: "POST",
    url: "<?=base_url("public/Searchnew");?>",
    data:{keyword:searchval},
      success: function(data){
       $("#loading").css("visibility","hidden");
         $("#loading").css("z-index","-999");
         $("#suggesstion-box").html(data);

    }

  });

}

});
});


/*
  $("#search").keypress(function(event){
  	event.preventDefault();
  	 var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
 $("#loading").css("visibility","visible");
$("#loading").css("z-index","999");
var searchval = $("#search").val();

if(searchval.length >=3){



  }

  $.ajax({
    type: "POST",
    url: "<?=base_url("public/Searchnew");?>",
    data:'keyword='+$(this).val(),
 
    success: function(data){
    	 $("#loading").css("visibility","hidden");
         $("#loading").css("z-index","-999");
         $("#suggesstion-box").html(data);

    }
    });

}
    }

  
  });*/
	

</script>

<script type="text/javascript">
function loader(){
var html ='<div class="text-center milldlealign"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>';
return html;

	}

</script>
<script type="text/javascript">
	function gotohome(){

		location.href="<?php echo base_url('public/Home'); ?>";
	}
		function gotobag(){
                var path ="<?=$this->uri->segment(3);?>";
                if(path == "product_page"){
                       add_to_bag();
                        }

		location.href="<?php echo base_url('public/Product/bag'); ?>";
	}
	function placeorder(){

		if($("#tatra").val() == ""){
			alert('Address mustbe Field');
		}else{
			location.href="<?php echo base_url('public/Product/checkout'); ?>";
		}

		
	}

</script>

