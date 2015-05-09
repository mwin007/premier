<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_login extends  CI_Model{

    /**Checks the admin login data
     * @param $uname - inserted username
     * @param $pass - inserted password
     * @return bool
     */
      function admin_validate($uname,$pass){

          $sql = "SELECT * FROM admins WHERE name = ? AND password = ? AND privilege = 3";
          $query=$this->db->query($sql, array($uname, make_hash($pass)));

          if( $query->num_rows()>0){

              $this->session->set_userdata('is_login',1);
               return true;
          }
          return false;

      }

}
