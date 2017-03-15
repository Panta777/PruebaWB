<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_menu() {
        $this->db->select("*");
        $this->db->from("menu");
        $res = $this->db->get();
        return $res->result_array();
    }

}

?>
