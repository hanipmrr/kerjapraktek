<?php
    class Tangible_model extends CI_Model
    {
        public function getTangibleById($id){
            return $this->db
            ->where ('id_tipe', $id)
            ->order_by('nama_tangible','asc')
            ->get ('tangible')
            ->result_array ();
        }

        public function getAlltangible()
        {
            return $this->db
            ->select("id_tangible,nama_tangible,id_tipe")
            ->get('tangible')
            ->result_array();
        }

        public function tambahtangible() 
        {   
                $config['upload_path']      = './logo/tangible/';
                $config['allowed_types']    = 'jpg|png|gif';
                $config['overwrite']        = true;
                $config['max_size']         = 2048; // 2mb
                
            $this->load->library('upload', $config); // load konfigurasi uploadnya
                
            if($this->upload->do_upload('logo_tangible')) {
                $fileData = $this->upload->data();    
                // jika berhasil :
                $data = array(
                'nama_tangible' => $this->input->post('nama_tangible'),
                'id_tipe'        => $this->input->post('id_tipe'),
                'id_provinsi'    => $this->input->post('id_provinsi'),
                'logo_tangible'  => $fileData['file_name']   
                );
                 $this->db->insert('tangible', $data);
                }
                else {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
                // return "default.jpg"; 
        }

        public function getTangibleByIdUpdate ($id)
        {
        return $this->db
            ->where ('id_tangible', $id)
            ->get ('tangible')
            ->result_object();
        }

        public function updateTangible($id)
        {
            $config['upload_path']      = './logo/tangible/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config);
            if($this->upload->do_upload('logo_tangible'))
            {
            $fileData = $this->upload->data(); 
            $data = array(
                'id_tangible' =>$this->input->post('id_tangible'),
                'nama_tangible' => $this->input->post('nama_tangible'),
                // 'id_provinsi' => $this->input->post('id_provinsi'),
                'logo_tangible' => $fileData['file_name']
            );
            $this->db
            ->where('id_tangible',$id)
            ->update('tangible',$data);
            }
                else 
                {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
//              return "default.jpg"; 
        }

        public function hapusTangible ($id)
        {
        $this->db
        ->where ('id_tangible',$id)
        ->delete('tangible');
        }
    

    }