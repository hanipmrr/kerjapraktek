<?php
    class Tipe_model extends CI_Model
    {
        public function getTipeById($id){
            return $this->db
            ->where ('id_daerah', $id)
            ->order_by('nama_tipe','asc')
            ->get ('tipe')
            ->result_array ();
        }

        public function getAlltipe()
        {
            return $this->db
            ->select("id_tipe,nama_tipe,id_daerah")
            ->get('tipe')
            ->result_array();
        }

        public function tambahtipe() 
        {   
                $config['upload_path']      = './logo/tipe/';
                $config['allowed_types']    = 'jpg|png|gif';
                $config['overwrite']        = true;
                $config['max_size']         = 2048; // 2mb
                
            $this->load->library('upload', $config); // load konfigurasi uploadnya
                
            if($this->upload->do_upload('logo_tipe'))
                {
                $fileData = $this->upload->data();    
                // jika berhasil :
                $data = array(
                'nama_tipe' => $this->input->post('nama_tipe'),
                'id_daerah' => $this->input->post('id_daerah'),
                'id_provinsi' => $this->input->post('id_provinsi'),
                'logo_tipe' => $fileData['file_name']   
                 );
                 $this->db->insert('tipe', $data);
                }
                else 
                {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
    //          return "default.jpg"; 
        }

        public function getTipeByIdUpdate ($id)
        {
        return $this->db
            ->where ('id_tipe', $id)
            ->get ('tipe')
            ->result_object();
        }

        public function updateTipe($id)
        {
            $config['upload_path']      = './logo/tipe/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config);
            if($this->upload->do_upload('logo_tipe'))
            {
            $fileData = $this->upload->data(); 
            $data = array(
                'id_tipe' =>$this->input->post('id_tipe'),
                'nama_tipe' => $this->input->post('nama_tipe'),
                // 'id_provinsi' => $this->input->post('id_provinsi'),
                'logo_tipe' => $fileData['file_name']
            );
            $this->db
            ->where('id_tipe',$id)
            ->update('tipe',$data);
            }
                else 
                {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
//              return "default.jpg"; 
        }

        public function hapusTipe ($id)
        {
        $this->db
        ->where ('id_tipe',$id)
        ->delete('tipe');
        }
    

    }





