<?php
class VegetationModel extends CI_Model {
    public function get_all_vegetation()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT v.vegetationID, v.n_common_TH,z.zoneID,z.nameTH,l.localname FROM ((vegetation v INNER JOIN zone z ON v.vegetationID=z.vegetationID)
             INNER JOIN localname l ON l.vegetation_vegetationID = v.vegetationID)");
            return $query->result();
    }



}