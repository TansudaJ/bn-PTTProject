<?php
class PlantpathModel extends CI_Model {
    public function get_all_plantpaths()
    {
            $query = $this->db->query("SELECT * FROM plantpath");
            return $query->result();
    }
}