<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller
{
  public function __construct()
  {
  	parent::__construct();
   
  }
	
	 public function index()
	{
	return redirect('public/User_authonication/check_authonicate');
	
	}
}



?>