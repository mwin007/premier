<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $data=array('title'=>'Rotem DB');

  function __construct(){
      parent::__construct();

      $this->smarty->assign('url',site_url() );

}

}


