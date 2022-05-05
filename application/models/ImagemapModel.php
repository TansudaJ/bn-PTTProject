<?php
class ImagemapModel extends CI_Model {

    public function get_all_imagemaps()
    {       
            $query = $this->db->query("SELECT * FROM imagezone i INNER JOIN zone z on i.zone_zoneID=z.zoneID ");
            return $query->result();
    }
    //zList
    public function get_all_zones()
    {       
            $query = $this->db->query("SELECT * FROM zone");
            return $query->result();
    }
    //getidinfo
    public function get_imagemap_byID($id)
    {
            $query = $this->db->query("SELECT * FROM imagezone i INNER JOIN zone z on i.zone_zoneID=z.zoneID 
            WHERE imagezoneID = '".$id."'" );
            return $query->result();
    }

    public function insert_imagemap($data)
    {
        $check = $this->db->insert('imagezone', $data);
       if( $check>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }        

    }
     //getidedit
     public function getimagemapbyID($id)
     {
         $query = $this->db->get_where("imagezone",array("imagezoneID"=>$id));
         $data = $query->result(); 
         return $data;
      }
     //แก้ไข
      public function update($data,$id) { 
         $this->db->set($data); 
         $this->db->where("imagezoneID", $id); 
         $this->db->update("imagezone", $data); 
      }
}