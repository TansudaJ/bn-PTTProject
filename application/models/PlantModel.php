<?php
class PlantModel extends CI_Model {

    public function get_all_plants()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users

            $query = $this->db->query("SELECT * FROM ((plants p INNER JOIN zone z ON p.zone_zoneID = z.zoneID) 
            INNER JOIN vegetation v ON p.vegetation_vegetationID = v.vegetationID);");
            return $query->result();
    }

    public function get_plant_byID($id)
    {
            $query = $this->db->query("SELECT * FROM ((plants p INNER JOIN zone z ON p.zone_zoneID = z.zoneID) 
            INNER JOIN vegetation v ON p.vegetation_vegetationID = v.vegetationID)
            WHERE p.plantID = '".$id."'" );
            return $query->result();
    }

}