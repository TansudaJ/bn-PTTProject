<?php
class EcosytemModel extends CI_Model {

    public function get_all_ecoplant()
    {       
            $query = $this->db->query("SELECT * FROM eco_plant ep INNER JOIN type t on ep.typeID=t.typeID ");
            return $query->result();
    }
    //tList
    public function get_all_types()
    {
            $query = $this->db->query("SELECT * FROM type");
            return $query->result();
    }
    
    public function insert_eco_plant($data)
    {
        $check = $this->db->insert('eco_plant', $data);
       if( $check>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }  
    }  
    
     //getidedit
     public function getecobyID($id)
     {
         $query = $this->db->get_where("eco_plant",array("eco_plantID"=>$id));
         $data = $query->result(); 
         return $data;
      }
     //แก้ไข
      public function update($data,$id) { 
         $this->db->set($data); 
         $this->db->where("eco_plantID", $id); 
         $this->db->update("eco_plant", $data); 
      }

      public function delete($id) 
      { 
          $query = $this->db->query("UPDATE eco_plant SET activeflag = 0 where eco_plantID = ".$id);
          if ($query>0) {
              return true;
          }
      }
}