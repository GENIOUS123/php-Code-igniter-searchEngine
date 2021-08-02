<?php 
/**
 * 
 */
class Searchnew extends Public_Controller
{
	
	public function __construct()
	{
  parent::__construct();
  $this->load->model('Dataload');
  $this->is_login();
	}

public function index(){
if(!empty($_POST["keyword"])) {
$searchcriteria = $this->sanitize($_POST["keyword"]);
$searchcriteria = trim($searchcriteria);
$searchcriteria = trim(preg_replace('/\s+/',' ', $searchcriteria));
$searchcriteria = preg_replace('/[^A-Za-z0-9\-]/', ' ', $searchcriteria);



$newarray = array_filter(array_unique(explode(" ",$searchcriteria)));

$sql = "CREATE OR REPLACE VIEW searchview AS
  SELECT sl_no, category,'mastercat' as field
  FROM category WHERE category LIKE '%".$searchcriteria."%'  UNION SELECT sl_no, category,'subcat' as field
  FROM  subcategory WHERE category LIKE '%".$searchcriteria."%' UNION SELECT sl_no, category,'subcat2' as field
  FROM  subcategory2
  WHERE category LIKE '%".$searchcriteria."%' UNION SELECT sl_no, product,'product' as field
  FROM  product
  WHERE product LIKE '%".$searchcriteria."%' UNION SELECT sl_no, productid,'productid' as field
  FROM  product
  WHERE productid LIKE '%".$searchcriteria."%' UNION SELECT sl_no, product,'product' as field
  FROM  product
  WHERE product_keywords LIKE '%".$searchcriteria."%'";

$q = $this->Dataload->selectexecutequery($sql);
if($q){
$data = $this->Dataload->selectexecute("SELECT * from searchview");	
}


if(!empty($data)){
//echo $this->create_product($data);
	echo '<ul id="country-list">';
	foreach($data as $x=>$y){

		echo '<li onClick=selectsearchproduct("'.$y->sl_no.'","'.$y->field.'","'.base64_encode($y->category).'")>'.$y->category.'<span style="margin-left:1rem;font-style: italic;font-weight:600;">('.$y->field.')</span></li>';
	}
	echo '</ul>';

}else{
	echo '<ul id="country-list"><li onClick=selectsearchproduct("0","none","none")>No Data found related to Search String</li></ul>';
}

}
}
public function Searchnewdata(){
if(isset($_POST['id']) && isset($_POST['field'])){
$tablearray = [
	            "mastercat"=>"master_cat",
	            "subcat"=>"subcat",
	            "subcat2"=>"subcat2",
	            "product"=>"product"

              ];
$field = $this->sanitize($_POST["field"]);
$id = $this->sanitize($_POST["id"]);
$data = [];
if(in_array($field , array_keys($tablearray))){

$table = $tablearray[$field];

if($table !=="product"){
$sql ="SELECT * from product left JOIN productassign ON productassign.productid = product.productid WHERE productassign.".$table." = ".$id." AND product.product_status = 'Active' GROUP BY product.productid ORDER BY product.sl_no DESC";
$data = $this->Dataload->selectexecute($sql);

}else{

$sql = "SELECT * FROM $table WHERE sl_no = $id";
$data = $this->Dataload->selectexecute($sql);

}
if(!empty($data)){

echo $this->create_product($data);
}else{
echo "No Data Found";

}

}



}
}

}


 ?>