<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Model_Products extends CI_Model
{



    /**Get all products from db
     * @return bool|null
     */
    public function ShowProducts()
    {

        $products = null;

        $query = $this->db->get('products');

        if ($query->num_rows() > 0) {

            $products = $query->result_array();

            return $products;
        }

        return false;

    }

    /**adds new product in DB
     * @param $product array with all inserted product data
     * @return bool
     */
    public function addProduct($product)
    {
        $sql="INSERT INTO  products VALUES ('',?,?,?)";
        $this->db->query($sql, array($product['title'], $product['price'],$product['qty']));

        if($this->db->affected_rows()>0){

            return true;

        }

        return false;
    }

    /**
     * @param $product - array with all product data
     * @return bool
     */
    public function editProduct($product)
    {
        $sql="UPDATE products
              SET title=?,price=?,qty=?
              WHERE id=?;";

        $this->db->query($sql, array($product['title'],$product['price'],$product['qty'],$product['id']));

        if($this->db->affected_rows()>0){

            return true;

        }

        return false;
    }

    /** get specific product data
     * @param $id - product id
     * @return bool - false or array of requested product data
     */
    public function getProduct($id){

        $sql="SELECT * FROM products WHERE id=?";
        $query=$this->db->query($sql,$id);

        if ($query->num_rows() > 0) {

            $product = $query->result_array();

            return $product;
        }

        return false;

    }

    /**
     * @param $id - id of the product
     * @return bool or title of the requested product
     */
    public function getProductTitle($id){

        $sql="SELECT title FROM products WHERE id=? LIMIT 1";
        $query=$this->db->query($sql,$id);

        if ($query->num_rows() > 0) {

            $product = $query->row_array();

            return $product['title'];
        }

        return false;

    }

    /**
     * @param $id - id of the product
     * @return bool
     */
    public function deleteProduct($id)
    {
        $sql="DELETE FROM products WHERE id=?";
        $this->db->query($sql,$id);

        if($this->db->affected_rows()>0){

            return true;

        }

        return false;

    }

    /**
     * @param $title product name
     * @return bool
     */
    public function checkTitle($title){

        $sql="SELECT title FROM products WHERE title=?";
        $this->db->query($sql,$title);

        if($this->db->affected_rows()>0){

               return $title;
        }

        return false;
    }

    /**
     * @param $title product name
     * @return bool
     */
    public function checkTitleElse($title){

        $sql="SELECT title FROM products WHERE title=?";
        $this->db->query($sql,$title);

        if($this->db->affected_rows()>0){

            return $title;
        }

        return false;
    }



}
