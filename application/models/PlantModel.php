<?php
class PlantModel extends CI_Model {
    public function get_all_plants()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM plants ");
            return $query->result();
    }



}