<?php  
    class Provinsi_model extends CI_Model
    {
        public function tambahProvinsi() 
        {
            $config['upload_path']      = './logo/provinsi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config); // load konfigurasi uploadnya
            
        if($this->upload->do_upload('logo_provinsi'))
            {
            $fileData = $this->upload->data();    
            // jika berhasil :
          $data = array(
          'nama_provinsi' => $this->input->post('nama_provinsi'),
          'kode_provinsi' => $this->input->post('kode_provinsi'),
          'logo_provinsi' => $fileData['file_name']
            );
        $this->db
            ->insert('provinsi', $data);
             }
        else 
            {
            // jika gagal :
            $this->session->set_flashdata('error', $this->upload->display_errors());
            }	  
//          return "default.jpg"; 
        }
    
        
        public function getAllProvinsi()
        {
          return $this->db
          ->select("id_provinsi,nama_provinsi,logo_provinsi,kode_provinsi")
          ->order_by('nama_provinsi','asc')
          ->get('provinsi')
          ->result_array();
        }
        
        // public function getAllProvinsiAsc(){
        //     return $this->db
        //     ->select("id_provinsi,nama_provinsi,logo_provinsi,kode_provinsi")
        //     ->order_by('nama_provinsi', 'ASC')
        //     ->get('provinsi')
        //     ->num_rows();
        //     $this->db->select('*');
        //     $this->db->from('provinsi');
        //     $this->db->order_by('nama_provinsi', 'asc');
        //     $query = $this->db->get();
        //     return $query->result();
        // }

        public function getProvinsis($limit, $start, $keyword=null){

            return $this->db
            ->like('nama_provinsi', $keyword)
            ->order_by('nama_provinsi','asc')
            ->get('provinsi', $limit, $start)
            ->result_array();
        }

        public function getProvinsi($keyword = null)
        {
            return $this->db
            ->select ("id_provinsi,nama_provinsi,logo_provinsi,kode_provinsi")
            ->where('nama_provinsi', $keyword)
            ->like ('nama_provinsi', $keyword)
            ->order_by('id_provinsi','desc')
            ->get('provinsi')
            ->result_array();
        }
        
        public function countProvinsi($keyword=null)
        {
            return $this->db->like('nama_provinsi',$keyword)
            ->from('provinsi')
            ->count_all_results();
        }

        public function countAllProvinsi()
        {
            return $this->db
            ->get('provinsi')
            ->num_rows();
        }


        public function getProvinsiByID($id)
        {
            return $this->db
            ->select("id_provinsi,nama_provinsi,logo_provinsi")
            ->where('id_provinsi', $id)
            ->get('provinsi')
            ->result_array();
        }

        public function updateProvinsi($id)
        {
            $config['upload_path']      = './logo/provinsi/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config);
            if($this->upload->do_upload('logo_provinsi'))
            {
            $fileData = $this->upload->data(); 
            $data = array(
                'id_provinsi' =>$this->input->post('id_provinsi'),
                'nama_provinsi' => $this->input->post('nama_provinsi'),
                'kode_provinsi' => $this->input->post('kode_provinsi'),
                'logo_provinsi' => $fileData['file_name']
            );
            $this->db
            ->where('id_provinsi',$id)
            ->update('provinsi',$data);
            }
                else 
                {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
//              return "default.jpg"; 
        }

        public function hapusProvinsi($id)
        {
          $this->db
          ->where ('id_provinsi',$id)
          ->delete('provinsi');
        }
    }
?>