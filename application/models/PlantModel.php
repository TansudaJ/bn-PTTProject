<?php
class PlantModel extends CI_Model {

    public function get_all_plants()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM ((vegetation v INNER JOIN zone z ON v.vegetationID=z.vegetationID)
             INNER JOIN localname l ON l.vegetationID = v.vegetationID)");
            return $query->result();
    }



}