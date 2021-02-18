<?php

class Home_model extends CI_Model{
    public function getPicHome(){
        return $this->db->get('fandom')->result_array();
    }
}

?>