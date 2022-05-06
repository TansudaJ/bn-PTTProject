<?php
class DashboardModel extends CI_Model {
    public function get_count_vegetation()
    {
            $query = $this->db->query("SELECT COUNT(DISTINCT n_common_TH) AS count_name 
            FROM vegetation;");
            return $query->result();
    }
    
    public function get_count_plant()
    {
            $query = $this->db->query("SELECT COUNT(plantID) as count_ID
            FROM plants; ");
            return $query->result();
    }

    public function get_count_zone()
    {
            $query = $this->db->query("SELECT COUNT(zoneID) as count_ID
            FROM zone; ");
            return $query->result();
    }


}