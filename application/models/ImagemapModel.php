<?php
class ImagemapModel extends CI_Model {
    
    public function get_all_imagemap()
    {
            $query = $this->db->query("SELECT * FROM imagezone ");
            return $query->result();
    }
}