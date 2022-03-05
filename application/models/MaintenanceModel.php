<?php
class MaintenanceModel extends CI_Model {
    
    public function get_all_maintenance()
    {
            //$query = $this->db->get('users'); // SELECT * FROM users
            
            $query = $this->db->query("SELECT m.maintenanceID, m.date, m.details, mt.maintenancetypeID ,mt.n_maintenancetype, mt.detail, mt.recommend, e.n_prefix, e.f_name, e.l_name, v.n_common_TH 
            FROM ((((maintenance m INNER JOIN maintenancetype mt ON m.maintenancetype_maintenancetypeID = mt.maintenancetypeID) 
            INNER JOIN employee e ON m.employee_id_employee = e.employeeID) 
            INNER JOIN plants ON m.plants_plantID = plants.plantID) 
            INNER JOIN vegetation v ON plants.vegetation_vegetationID = v.vegetationID);");
            return $query->result();
    }
}
