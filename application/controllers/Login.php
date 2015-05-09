<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    public $post;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Model_login');

    }


    public function index()
    {

        $this->post=$this->input->post(null,true);

        $this->form_validation->set_rules('uname', 'User Name', 'required|min_length[3]');
        $this->form_validation->set_rules('pass', 'Password', 'required|callback_admin_validate');

        if($this->form_validation->run() == false){

            //assigning of the variables in the template
            $this->smarty->assign('form',array('open' => form_open(site_url('login/'), array('class' => "form-signin")),'close' => form_close()) );
            $this->smarty->assign('set_value',array('name' => set_value('uname') ) );
            $this->smarty->assign('validation_errors',validation_errors() );

            $this->smarty->display('login.tpl');


        }else{

            redirect('Products');

        }

    }

    public function logout(){

        $this->session->unset_userdata('is_login');;
        redirect();

    }

        function admin_validate()
    {
        $is_login=$this->Model_login->admin_validate(filter_xss($this->post['uname']),filter_xss($this->post['pass']));

        if($is_login){

            return true;
        }

        $this->form_validation->set_message('admin_validate', 'The username/password is not valid');
        return false;

    }


}