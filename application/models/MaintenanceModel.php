<?php
class MaintenanceModel extends CI_Model {
    
    public function get_all_maintenance()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            
            $query = $this->db->query("SELECT * FROM (((((maintenance m INNER JOIN maintenancetype mt ON m.maintenancetype_maintenancetypeID = mt.maintenancetypeID) 
            INNER JOIN employee e ON m.employee_employeeID = e.employeeID) 
            INNER JOIN plants ON m.plantID = plants.plantID) 
            INNER JOIN vegetation v ON plants.vegetation_vegetationID = v.vegetationID)
            INNER JOIN prefix  ON prefix.PrefixID = e.PrefixID);");
            return $query->result();
    }
    //mList
    public function get_all_maintenancetype(){
        $query = $this->db->query("SELECT * FROM maintenancetype");
        return $query->result();
    }
    //vList
    public function get_all_vegetation(){
        $query = $this->db->query("SELECT * FROM vegetation");
        return $query->result();
    }
}
