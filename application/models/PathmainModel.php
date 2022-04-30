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
    //เพิ่ม
    public function insert_pathmain($data1,$data2)
    {
        $sql1 = $this->db->insert('medicinalproperties', $data1);
        $query1 = $this->db->query($sql1);
        $sql2 = $this->db->insert('imageplant', $data2);
        $query2 = $this->db->query($sql2);

       if( $query1 && $query2 > 0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }
    }
}