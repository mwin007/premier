<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller
{

    public $post;
    public $get;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Model_products');

    }


    public function index()
    {
        //if user not autorized -> back to login page
        if(!$this->session->userdata('is_login')){
          redirect('login');
        }

        $products=$this->Model_products->showProducts();

        $this->smarty->assign('form_add',array('open' => form_open('', array('id' => "addProductForm")),'close' => form_close()) );

        $this->smarty->assign('products',$products);
        $this->smarty->display('products.tpl');

    }

    /* ---------------------- add product---------------------------------- */

    public function add_product(){

        $this->post = $this->input->post(null,true);

        $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_check_title');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|greater_than[0]');
        $this->form_validation->set_rules('qty', 'Quantity', 'trim|is_natural');


        if ($this->form_validation->run() == false) {

            $output = array('success' => false, 'message' => validation_errors());

        } else {

            $this->post = $this->input->post(null, true);

            $output = array();
          // Only title and price are required
            if (!empty($this->post['title']) and !empty($this->post['price']) ) {

                if(empty($this->post['qty'])) $this->post['qty']=0;

                //format e decimal number, stay only 2 digits after the '.'
                $this->post['price']=number_format($this->post['price'], 2, '.', ' ');

                //insert data into db
                $response = $this->Model_products->addProduct($this->post);

                if ($response){

                    $output['success'] = true;
                    $output['message'] = 'The product was added!';

                } else {

                    $output['success'] = false;
                    $output['message'] = 'The product was not added, some technical problems, try later!';
            }
          }
        }

        echo json_encode($output);

    }

    /** get array with all products data
     * @return bool
     */
    function get_products(){

        $products=$this->Model_products->showProducts();

        if($products){

            echo json_encode($products);
        }

        echo false;
    }

    /* ------------------ Edit Product --------------------- */


    public function edit_product(){

        $this->get = $this->input->get(null,true);

        $data = array(
            'title' => $this->get['title'],
            'price' => $this->get['price'],
            'qty' => $this->get['qty']
        );

        $this->form_validation->set_data($data);

        $this->form_validation->set_rules('title', 'Title', 'trim|required|callback_check_title_else');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|greater_than[0]');
        $this->form_validation->set_rules('qty', 'Quantity', 'trim|is_natural');

        if ($this->form_validation->run() == false) {

           $output = array('success' => false, 'message' => validation_errors());

        } else {

            $this->get = $this->input->get(null,true);

                //format e decimal number, stay only 2 digits after the '.'
                $this->get['price']=number_format($this->get['price'], 2, '.', ' ');

                //insert data into db
                $response = $this->Model_products->editProduct($this->get);

                if ($response){

                    $output['success'] = true;
                    $output['price'] = $this->get['price'];
                    $output['message'] = 'The product was saved!';

                } else {

                    $output['success'] = true;
                    $output['price'] = $this->get['price'];
                    $output['message'] = 'not_edited';

                }
            }


        echo json_encode($output);
    }

    /*  --------------   delete product ------------------------  */

    public function delete_product(){

        $id=$this->input->get('id',true);

        $conf=$this->Model_products->deleteProduct($id);

        if($conf){

            echo true;
        }

        echo false;
    }


    /*  --------------   secondary functions ------------------------  */

    /**
     * get the title of of requested product
     */
    function get_product_title(){

        $id=$this->input->get('id',true);

        $product_name=$this->Model_products->getProductTitle($id);

        if($product_name){

            echo $product_name;
        }

        echo false;

    }

    /**
     * get array with  data of specified product
     */
    function get_product(){

        $id=$this->input->get('id',true);

        $product=$this->Model_products->getProduct($id);

        if($product){

            echo json_encode($product);
        }

        echo false;

    }

    /** Callback that checks the if the product name already in DB
     * @param $title product title
     * @return bool
     */
    public function check_title( $title ){
        //clean xss on input and trim the string
        $title=filter_xss($title);

        $response=$this->Model_products->checkTitle($title);

        if($response){

            $this->form_validation->set_message('check_title', 'You have a product with the same name in the database, choose another product title');
            return false;
        }

        return true;
    }

    /** Callback that checks the if the product name already exist in other fields
     * @param $title product title
     * @return bool
     */
    public function check_title_else( $title ){

        $title=filter_xss($title);

        //get old product title
        $old_name=$this->Model_products->getProductTitle($this->get['id']);

        //check if new name already in db
        $response=$this->Model_products->checkTitle($title);

        //
        if($response and $response!=$old_name){

            $this->form_validation->set_message('check_title_else', 'You have a product with the same name in the database, choose another product title');

            return false;

        }
        return true;
    }


}



