<?php
class SimpleModel extends CI_Model {
    public function get_all_simples()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM trees ");
            return $query->result();
    }



}