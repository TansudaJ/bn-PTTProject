<?php
class MaintenanceModel extends CI_Model {
    
    public function get_all_maintenance()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            
            $query = $this->db->query("SELECT * FROM (((((maintenance m INNER JOIN maintenancetype mt ON m.maintenancetype_maintenancetypeID = mt.maintenancetypeID) 
            INNER JOIN employee e ON m.employee_id_employee = e.employeeID) 
            INNER JOIN plants ON m.plants_plantID = plants.plantID) 
            INNER JOIN vegetation v ON plants.vegetation_vegetationID = v.vegetationID)
            INNER JOIN prefix  ON prefix.PrefixID = e.PrefixID);");
            return $query->result();
    }
}
