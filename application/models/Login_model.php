<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user($params) {
        $this->db->select("*");
        $this->db->from("empleado");
        $this->db->where($params);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function set_tempdata() {
        $this->session->set_tempdata('name', 'Uno de piera', 10);
        redirect("home/get_tempdata");
    }

    public function get_tempdata() {
        echo $this->session->tempdata("name");
    }

}

?>
