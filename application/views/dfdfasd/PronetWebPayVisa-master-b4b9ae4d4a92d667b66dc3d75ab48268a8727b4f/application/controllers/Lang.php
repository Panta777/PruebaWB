<?php

class Lang extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function change() {

        $language = $this->input->get('q');
        $temp = $this->input->get("lang", true);
        $this->session->set_userdata("lang", $language);
    }

}

?>