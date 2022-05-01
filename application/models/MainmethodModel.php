<?php
class MainmethodModel extends CI_Model {
    //แสดง
    public function get_all_mainmethods()
    {
            $query = $this->db->query("SELECT * FROM `maintenancetype`");
            return $query->result();
    }
    //เพิ่ม
    public function insert_mainmethod($data){
        $sql = "INSERT INTO `maintenancetype`(`maintenancetypeID`, `n_maintenancetype`, `detail`, `recommend`) 
        VALUES (Null,'".$data["n_maintenancetype"]."','".$data["detail"]."','".$data["recommend"]."')";
        $query = $this->db->query($sql);

        if( $query>0){
            return (TRUE) ;
         }else {
             return (FALSE) ;
         }
    }
    //getIDinfo
    public function get_mainmethod_byID($id)
    {
            $query = $this->db->query("SELECT * FROM maintenancetype WHERE maintenancetypeID = '".$id."'" );
            return $query->result();
    }
    //getidEdit
    public function getmainmethodbyID($id)
    {
        $query = $this->db->get_where("maintenancetype",array("maintenancetypeID"=>$id));
        $data = $query->result(); 
        return $data;
     }
    //แก้ไข
     public function update($data,$id) { 
        $this->db->set($data); 
        $this->db->where("maintenancetypeID", $id); 
        $this->db->update("maintenancetype", $data); 
     }

    //ลบ
    public function delete($id) { 
        if ($this->db->delete("maintenancetype", "maintenancetypeID = ".$id)) { 
           return true; 
        } 
     }
}