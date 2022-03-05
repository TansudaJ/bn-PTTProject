<?php
class ZoneModel extends CI_Model {
    public function get_all_zone()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM `zone`;");
            return $query->result();
    }



}