<?php
class TreeModel extends CI_Model {
    public function get_all_trees()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM trees t JOIN plants p ON t.plants_plantID = p.plantID JOIN zones z ON t.zones_zoneID = z.zoneID");
            return $query->result();
    }



}