<?php
class AnimalModel extends CI_Model {

    public function get_all_ecoanimal()
    {       
            $query = $this->db->query("SELECT * FROM eco_animals ea INNER JOIN type_animals ta on ea.type_animalID =ta.type_animalID ");
            return $query->result();
    }
    //tList
    public function get_all_types()
    {
            $query = $this->db->query("SELECT * FROM type_animals");
            return $query->result();
    }
    
    public function insert_eco_animal($data)
    {
        $check = $this->db->insert('eco_animals', $data);
       if( $check>0){
           return (TRUE) ;
        }else {
            return (FALSE) ;
        }  
    }  
    
     //getidedit
     public function get_ecoanimal_byID($id)
     {
         $query = $this->db->get_where("eco_animals",array("eco_animalsID"=>$id));
         $data = $query->result(); 
         return $data;
      }
     //แก้ไข
      public function update($data,$id) { 
         $this->db->set($data); 
         $this->db->where("eco_animalsID", $id); 
         $this->db->update("eco_animals", $data); 
      }

      public function delete($id) 
      { 
          $query = $this->db->query("UPDATE eco_animals SET activeFlag = 0 where eco_animalsID = ".$id);
          if ($query>0) {
              return true;
          }
      }
}