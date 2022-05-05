<?php
class PathmainModel extends CI_Model {
    //แสดง
    public function get_all_pathmains()
    {
            $query = $this->db->query("SELECT * FROM ((medicinalproperties m INNER JOIN vegetation v ON m.vegetation_vegetationID=v.vegetationID) 
            INNER JOIN plantpath p ON m.plantspath_pathID=p.pathID)");
            return $query->result();
    }

    //pList
    public function get_all_plantpaths()
    {
            $query = $this->db->query("SELECT * FROM plantpath");
            return $query->result();
    }
    //vList
    public function get_all_vegetations()
    {
            $query = $this->db->query("SELECT * FROM vegetation");
            return $query->result();
    }
    //getidinfo
    public function get_pathmain_byID($id)
    {
            $query = $this->db->query("SELECT * FROM ((medicinalproperties m INNER JOIN vegetation v ON m.vegetation_vegetationID=v.vegetationID) 
            INNER JOIN plantpath p ON m.plantspath_pathID=p.pathID)
            WHERE m.medicinalpropertiesID = '".$id."'" );
            return $query->result();
    }
    //เพิ่ม
    public function insert_pathmain($data)
    {
        $sql = $this->db->insert('medicinalproperties', $data);

        $plantspath_pathID = $this->db->insert_id();

        $data_img["plantspath_pathID "] = $plantspath_pathID ; //อิงตาราง
        $sql2 = $this->db->insert('imagevegetation',$data_img);

       if( $sql && $sql2> 0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }
    }
}