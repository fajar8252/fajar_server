<?php 
class Hape_model extends CI_Model{
    public function getHape($id = null) {
        if($id != ''){
            return $this->db->get_where('hape', array('id' => $id))->result();
        }else{
            return $this->db->get('hape')->result();
        }
    }

    public function tambahDataHape($data){
        $this->db->insert('hape', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataHape($id){
        $this->db->where("id = $id");
        return $this->db->delete('hape');;
    }

    public function ubahDataHape($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('hape', $data);
    }
    
}