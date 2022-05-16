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
    public function get_all_zonereports()
    {
            $query = $this->db->query("SELECT z.*,v.n_common_TH, COUNT(p.plantID) as countp FROM ((zone z 
            LEFT JOIN plants p on z.zoneID = p.zone_zoneID )
            JOIN vegetation v on v.vegetationID = p.vegetation_vegetationID )
            GROUP BY z.zoneID;");
            return $query->result();
    }
    public function get_all_maintenancereports()
    {
            $query = $this->db->query("SELECT m.*,v.n_common_TH,mt.n_maintenancetype,p.prefix_name,e.f_name,e.l_name,z.nameTH
            FROM maintenance m JOIN maintenancetype mt on m.maintenancetype_maintenancetypeID = mt.maintenancetypeID 
            JOIN employee e ON e.employeeID=m.employee_employeeID 
            JOIN prefix p ON p.PrefixID=e.PrefixID 
            JOIN vegetation v ON v.vegetationID=m.vegetation_vegetationID 
            JOIN zone z ON z.zoneID=m.zone_zoneID 
            GROUP BY v.vegetationID;");
            return $query->result();
    }



}