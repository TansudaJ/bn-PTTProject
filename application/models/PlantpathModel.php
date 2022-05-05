<?php
class PlantpathModel extends CI_Model {
    //แสดง
    public function get_all_plantpaths()
    {
            $query = $this->db->query("SELECT * FROM plantpath order by activeFlag DESC");
            return $query->result();
    }
    //เพิ่ม
    public function insert_plantpath($data)
    {
        $sql = "INSERT INTO `plantpath`(`pathID`, `plantpathname`) 
        VALUES ( Null,'".$data["plantpathname"]."')";
        $query = $this->db->query($sql);
        
       if( $query>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }
    }
    //getid
    public function getplantpathbyID($id)
    {
        $query = $this->db->get_where("plantpath",array("pathID"=>$id));
        $data = $query->result(); 
        return $data;
     }
    //แก้ไข
     public function update($data,$id) { 
        $this->db->set($data); 
        $this->db->where("pathID", $id); 
        $this->db->update("plantpath", $data);
     }

    //ลบ
    public function delete($id) 
    { 
        $query = $this->db->query("UPDATE plantpath SET activeFlag = 0 where pathID = ".$id);
        if ($query>0) {
            return true;
        }
    }
    
}