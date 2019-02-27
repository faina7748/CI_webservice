<?php
Class Actor_Model extends CI_Model{
    // list all actor
    function listing(){
        $query = $this->db->get('actor',10,20);
        return $query->result_array();
    }

    function insert($data){
        $this->db->insert('actor', $data);
    }
}