    <?php
        class Bangunan_model extends CI_Model
        {
            public function getBangunanById($id){
                return $this->db
                ->where ('id_tangible', $id)
                ->get ('post_tangible')
                ->result_array ();
            }

            public function getAllObjek()
            {
              return $this->db
              ->select("id_post_tangible,nama_post_tangible,id_tangible,logo_post_tangible,kode_post_tangible,alamat_post_tangible,jenis_post_tangible,detail_post_tangible,sejarah_post_tangible,no_regnas_post_tangible")
              ->get('post_tangible')
              ->result_array();
            }
    
            public function getObjek($keyword = null)
            {
                return $this->db
                ->select ("id_post_tangible,nama_post_tangible,id_tangible,logo_post_tangible,kode_post_tangible,alamat_post_tangible,jenis_post_tangible,detail_post_tangible,sejarah_post_tangible,no_regnas_post_tangible")
                ->where('nama_post_tangible', $keyword)
                ->order_by('id_post_tangible','desc')
                ->get('post_tangible')
                ->result_array();
            }
            
            public function countObjek($keyword=null)
            {
                return $this->db->like('nama_post_tangible',$keyword)
                ->from('post_tangible')
                ->count_all_results();
            }
    
            public function countAllObjek()
            {
                return $this->db
                ->get('post_tangible')
                ->num_rows();
            }

            public function tambahbangunan() 
            {   
                    $config['upload_path']      = './logo/bangunan/';
                    $config['allowed_types']    = 'jpg|png|gif';
                    $config['overwrite']        = true;
                    $config['max_size']         = 2048; // 2mb
                    
                $this->load->library('upload', $config); // load konfigurasi uploadnya
                    
                if($this->upload->do_upload('logo_post_tangible'))
                    {
                    $fileData = $this->upload->data();    
                    // jika berhasil :
                    $data = array(
                    'nama_post_tangible' => $this->input->post('nama_post_tangible'),
                    'detail_post_tangible' => $this->input->post('detail_post_tangible'),
                    'alamat_post_tangible' => $this->input->post('alamat_post_tangible'),
                    'sejarah_post_tangible' => $this->input->post('sejarah_post_tangible'),
                    'no_regnas_post_tangible' => $this->input->post('no_regnas_post_tangible'),
                    'jenis_post_tangible' => $this->input->post('jenis_post_tangible'),
                    'kode_post_tangible' => $this->input->post('kode_post_tangible'),
                    'id_tangible' => $this->input->post('id_tangible'),
                    'logo_post_tangible' => $fileData['file_name']   
                    );
                    $this->db->insert('post_tangible', $data);
                    }
                    else 
                    {
                    // jika gagal :
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    }	  
                    //  return "default.jpg"; 
            }

            public function getBangunanByIdUpdate ($id)
            {
            return $this->db
                ->where ('id_post_tangible', $id)
                ->get ('post_tangible')
                ->result_object();
            }

            public function updateBangunan($id)
            {
                $config['upload_path']      = './logo/bangunan/';
                $config['allowed_types']    = 'jpg|png|gif';
                $config['overwrite']        = true;
                $config['max_size']         = 2048; // 2mb
                
            $this->load->library('upload', $config);
                if($this->upload->do_upload('logo_post_tangible'))
                {
                $fileData = $this->upload->data(); 
                $data = array(
                    'id_post_tangible' => $this->input->post('id_post_tangible'),
                    'nama_post_tangible' => $this->input->post('nama_post_tangible'),
                    'detail_post_tangible' => $this->input->post('detail_post_tangible'),
                    'alamat_post_tangible' => $this->input->post('alamat_post_tangible'),
                    'sejarah_post_tangible' => $this->input->post('sejarah_post_tangible'),
                    'no_regnas_post_tangible' => $this->input->post('no_regnas_post_tangible'),
                    'jenis_post_tangible' => $this->input->post('jenis_post_tangible'),
                    'kode_post_tangible' => $this->input->post('kode_post_tangible'),
                    'logo_post_tangible' => $fileData['file_name']  
                );
                $this->db
                ->where('id_post_tangible',$id)
                ->update('post_tangible',$data);
                }
                    else 
                    {
                    // jika gagal :
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    }	  
    //              return "default.jpg"; 
            }

            public function hapusObjek ($id)
            {
            $this->db
            ->where ('id_post_tangible',$id)
            ->delete('post_tangible');
            }

            public function getBangunanPostById($id)
            {
                return $this->db
                ->where('id_post_tangible', $id)
                ->get('post_tangible')
                ->result_array();
            }
        
        }