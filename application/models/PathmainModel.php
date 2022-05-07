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
            $query = $this->db->query("SELECT * FROM (((medicinalproperties m INNER JOIN vegetation v ON m.vegetation_vegetationID=v.vegetationID) 
            INNER JOIN plantpath p ON m.plantspath_pathID=p.pathID) 
            INNER JOIN imagevegetation im ON p.pathID=im.plantpath_pathID) 
            WHERE m.medicinalpropertiesID = '".$id."'" );
            return $query->result();
    }
    //เพิ่ม
    public function insert_pathmain($data,$data_img)
    {
        $sql = $this->db->insert('medicinalproperties', $data);
        $sql2 = $this->db->insert('imagevegetation',$data_img);

       if( $sql && $sql2> 0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }
    }

    //getidedit
    public function getpathmainbyID($id)
    {
        $query = $this->db->get_where("medicinalproperties",array("medicinalpropertiesID"=>$id));
        $data = $query->result(); 
        return $data;
     }

    //แก้ไข
     public function update($data,$id) { 
        $this->db->set($data); 
        $this->db->where("medicinalpropertiesID", $id); 
        $this->db->update("medicinalproperties", $data);
     }

     public function delete($id) 
     { 
         $query = $this->db->query("UPDATE medicinalproperties SET activeflag = 0 where medicinalpropertiesID = ".$id);
         if ($query>0) {
             return true;
         }
     }
}
