<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dataload extends CI_Model
{

	public function __Construct()

	       {

	       	parent::__construct();

	       	$this->load->database();

	       }
	
	 function insertdata($table,$ai)
	                      {
                            
                             $fields = array_keys($ai);
                             $sql = "INSERT INTO ".$table."
                                  (`".implode('`,`', $fields)."`)
                                      VALUES('".implode("','", $ai)."')";



                                      if($this->db->query($sql))

                                      {

                                      	return true;
                                      }

                                      else

                                      {

                                      	 $error['fail'] = $this->db->error();

                                      	 
                                      }
                             return $error;

	                      }
 
      function extract_data($table,$conditions=null,$sort=null,$limit=null)
      {


         if(!empty($conditions) && !is_array($conditions))

         {

            $fields="";
            $sql="SELECT * FROM `$table` WHERE ".$conditions;

         }
         elseif(is_array($conditions))

         {
            
            $sql="SELECT * FROM `$table` WHERE ";

            foreach($conditions as $a=>$b)
                    {

                      $sql.="`".$a."`"." "." ".$b." AND ";
                    }

                      $sql=rtrim($sql," AND ");
           
         }

         else

         {
            
            $fields="";
            $sql="SELECT * FROM `$table`";

         }
         
         if(!empty($sort))
         {
           
           $sql.=" ORDER BY ".$sort;

         }

          if(!empty($limit))
         {
           
           $sql.=" LIMIT ".$limit;

         }

         //]]return $sql;

         $query = $this->db->query($sql);
         
         $row = $query->result();
          return $row; 

      }

function update_data($table,$conditions,$where)
                    {

                       
                             $sql = "UPDATE ".$table."
                                  SET ";

                             if(!empty($conditions))
                             {

                              if(is_array($conditions)){
                                foreach($conditions as $a => $b)
                                {
                                   
                                   $sql .="`".$a."` = '".$b."' , "; 

                                }
                              }else{
                                $sql .=$conditions;

                              }
                                $sql=rtrim($sql, " , ");
                                $sql .=" WHERE ".$where;
                               
                             }
                               
                               
                               //return $sql;
                            $query = $this->db->query($sql);

                            if($query)
                            {

                              return $query;
                            }

                    }


function delete_data($table,$where=array())
                    {
     
                  if($this->db->delete($table, $where)){
                    return true;
                  }else{
                    return false;
                  }

                   
                    }


function num_rows($table,$conditions = null){

  if(is_null($conditions)){

        $q = $this->db->query("SELECT * FROM $table");

        return $q->num_rows();
}
elseif(is_array($conditions))
    {

      $sql = "SELECT * FROM $table Where";

                                foreach($conditions as $a => $b)
                                {
                                   
                                   $sql .="`".$a."` = '".$b."' , "; 

                                }
                                $sql =rtrim($sql, " , ");
                               

                             }

   else{

    $sql = "SELECT * FROM $table Where ".$conditions;
   }


      $q = $this->db->query($sql);
      return $q->num_rows();

    }

  
//Join Table
public function extract_data_multiple($uname,$limit=null,$offset=null){

$sql = "SELECT * FROM";

    $sql .= " "."payments "."inner join "."shipping"." ON  payments.`merchant_order_id` =  shipping.`order_id`";
    $sql .=" WHERE payments.`payer_email` = '$uname'";
    $sql .=" ORDER BY payments.`datentime` DESC";

    if(!is_null($limit)){

  $sql.=" LIMIT $limit";

}
if(!is_null($offset)){

  $sql.=" OFFSET $offset";

}

    $q = $this->db->query($sql);
    $row = $q->result();
    return $row;


}
//Search multiple data from same column
public function search_multiple($product,$head = array(),$columns,$list=array(),$limit = null,$offset = null){
$column = implode(" , ",$head);

$lists = "";
for($c=0; $c < count($list); $c++){

$lists .= "'".$list[$c]."',";

}

$lists = rtrim($lists,",");

$sql ="SELECT $column From $product WHERE $columns IN ($lists)";

if(!is_null($limit)){

  $sql.=" LIMIT $limit";

}
if(!is_null($offset)){

  $sql.=" OFFSET $offset";

}

 $q = $this->db->query($sql);
$row = $q->result();
return $row;



}
//Check for Duplicate//
public function CheckforDuplicate($table,$conditions=array()){
       
        if($this->extract_data($table,$conditions) == false){

            return  false;

        }
        else{

          return true;
        }


        }

        public function sum($table,$head=array(),$condition=null){
          $sql="SELECT ";
         for($x=0;$x < count($head);$x++){
         $sql.="SUM(`$table`.`".$head[$x]."`) as sum$head[$x],";

         }
         $sql=rtrim($sql,",");

         if(!is_null($condition)){
         $sql.=" FROM $table WHERE ";
         foreach($condition as $a=>$b){
         $sql.="$a "." $b";

         }
     }
          $q = $this->db->query($sql);
          $row = $q->result();
          return $row;

        }


        public function selectexecute($sql){

          $q=$this->db->query($sql);
          $row = $q->result();
          return $row;

        }
        public function selectexecutequery($sql){

          $q=$this->db->query($sql);
          if($q){
            return true;
          }else{
            return false;
          }

        }

         public function selectcountexecute($sql){

          $q=$this->db->query($sql);
          return $q->num_rows();
        }

        public function selectexecutestringdata($sql,$key){
          $data="";
       $q=$this->db->query($sql);
       if($q){
        $row = $q->result();
        foreach($row as $x=>$y){
          $data.=$y->$key.",";
        }
         return rtrim($data,",");

        }
        else{
          return false;
        }
}
}
 ?>