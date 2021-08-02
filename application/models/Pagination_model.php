<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagination_model extends CI_Model{
function __construct()
{
    parent::__construct();
}


public function fetch_all_like($table,$limit,$offset,$where=null,$condition=null,$sort=null){
	$query="";

	if(!is_null($where)  && !is_null($condition)){
      $this->db->like($where,$condition);
      $this->db->limit($limit, $offset);
	}
	else{
	$query = $this->db->limit($limit, $offset);
	}

	if(!is_null($sort) ){

    $query = $this->db->order_by($sort);
	}
	$query = $this->db->get($table);

	return $query->result();
}

public function fetch_all_equal($table,$limit,$offset,$where=null,$condition=null,$sort=null){
	$query="";
	if(!$offset){
		$offset=0;
	            }
	            
	if(!is_null($where)  && !is_null($condition)){
    $query = $this->db->query("SELECT * FROM $table WHERE $where $condition LIMIT $offset,$limit");
	}
	else{
	$query = $this->db->limit($limit, $offset);
	}
		if(!is_null($sort) ){
			$query = $this->db->order_by($sort,"asc");
	}
   $query = $this->db->get($table);

	return $query->result();
}

}