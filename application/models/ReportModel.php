<?php
class ReportModel extends CI_Model {
    public function get_all_vegereports()
    {
            $query = $this->db->query("SELECT v.*,t.*,COUNT(p.plantID) as countp  FROM ((vegetation v 
            LEFT JOIN plants p on v.vegetationID = p.vegetation_vegetationID) 
            INNER JOIN type t on v.typeID = t.typeID)
            GROUP BY v.vegetationID;");
            return $query->result();
    }



}