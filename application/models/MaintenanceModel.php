<?php
class MaintenanceModel extends CI_Model {
    
    public function get_all_maintenance()
    {
            $query = $this->db->query("SELECT * FROM (((((maintenance m INNER JOIN maintenancetype mt ON m.maintenancetype_maintenancetypeID = mt.maintenancetypeID) 
            INNER JOIN employee e ON m.employee_employeeID = e.employeeID) 
            INNER JOIN zone z ON m.zone_zoneID = z.zoneID) 
            INNER JOIN vegetation v ON m.vegetation_vegetationID = v.vegetationID)
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
    //vList
    public function get_all_zone(){
        $query = $this->db->query("SELECT * FROM zone");
        return $query->result();
    }
    //getidinfo
    public function get_maintenance_byID($id)
    {
            $query = $this->db->query("SELECT * FROM (((((maintenance m INNER JOIN maintenancetype mt ON m.maintenancetype_maintenancetypeID = mt.maintenancetypeID) 
            INNER JOIN employee e ON m.employee_employeeID = e.employeeID) 
            INNER JOIN zone z ON m.zone_zoneID = z.zoneID) 
            INNER JOIN vegetation v ON m.vegetation_vegetationID = v.vegetationID)
            INNER JOIN prefix  ON prefix.PrefixID = e.PrefixID)
            WHERE m.maintenanceID = '".$id."'" );
            return $query->result();
    }
    public function insert_maintenance($data)
    {
        $sql = $this->db->insert('maintenance', $data);

       if( $sql> 0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }
    }
     //getidEdit
     public function getmaintenancebyID($id)
     {
         $query = $this->db->get_where("maintenance",array("maintenanceID"=>$id));
         $data = $query->result(); 
         return $data;
      }
     //แก้ไข
      public function update($data,$id) { 
         $this->db->set($data); 
         $this->db->where("maintenanceID", $id); 
         $this->db->update("maintenance", $data); 
      }
 
     //ลบ
     public function delete($id) { 
 
         $query = $this->db->query("UPDATE maintenance SET activeFlags = 0 where maintenanceID = ".$id);
         if ($query>0) {
             return true;
         } 
      }
}
