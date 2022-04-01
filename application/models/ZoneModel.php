<?php
class ZoneModel extends CI_Model {
    public function get_all_zone()
    {
            $query = $this->db->query("SELECT * FROM zone;");
            return $query->result();
    }

    public function insert_zone($data)
    {
        $this->db->insert('zone', $data);    
    }

}