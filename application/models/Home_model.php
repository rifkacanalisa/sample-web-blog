<?php

class Home_model extends CI_Model{
    public function getPicHome(){
        return $this->db
        ->order_by('nama','RANDOM')
        ->get('fandom')
        ->result_array();
    }
}

?>