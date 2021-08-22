<?php
        class Objek_model extends CI_Model
        {
            public function getObjekById($id){
                return $this->db
                ->where ('id_tangible', $id)
                ->order_by('nama_post_tangible','asc')
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
            
            public function getObjeks($id_tangible, $limit, $offset){
            
                return $this->db->query(
                    "SELECT * 
                        FROM 
                            post_tangible
                        WHERE 
                            id_tangible = $id_tangible
                        ORDER BY
                            nama_post_tangible ASC
                        LIMIT 
                            $limit
                        OFFSET 
                            $offset"
                )->result_array();
    
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

            public function tambahobjek() 
            {   
                // KURANG ERROR VALIDATION
                // USER TIDAK MENGETAHUI APAKAH DATA SUDAH MASUK ATAU BELUM
                // LALU JIKA TIDAK MASUK, ERRORNYA APA?
                $config['upload_path']      = './logo/objek/';
                $config['allowed_types']    = 'jpg|png|gif';
                $config['overwrite']        = true;
                $config['max_size']         = 2048; // 2mb
                    
                $this->load->library('upload', $config); // load konfigurasi uploadnya

                if($this->upload->do_upload('logo_post_tangible')) {
                    $fileData = $this->upload->data();    
                    // jika berhasil :
                    $data = [
                        'nama_post_tangible'        => $this->input->post('nama_post_tangible'),
                        'detail_post_tangible'      => $this->input->post('detail_post_tangible'),
                        'alamat_post_tangible'      => $this->input->post('alamat_post_tangible'),
                        'sejarah_post_tangible'     => $this->input->post('sejarah_post_tangible'),
                        'no_regnas_post_tangible'   => $this->input->post('no_regnas_post_tangible'),
                        'jenis_post_tangible'       => $this->input->post('jenis_post_tangible'),
                        'kode_post_tangible'        => $this->input->post('kode_post_tangible'),
                        'id_tangible'               => $this->input->post('id_tangible'),
                        'id_provinsi'               => $this->input->post('id_provinsi'),
                        'logo_post_tangible'        => $fileData['file_name']   
                    ];

                    $insert = $this->db->insert('post_tangible', $data);
                    return $insert;
                } else {
                    // jika gagal :
                    return $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
                //  return "default.jpg"; 
            }

            public function getObjekByIdUpdate ($id)
            {
            return $this->db
                ->where ('id_post_tangible', $id)
                ->get ('post_tangible')
                ->result_object();
            }

            public function updateObjek($id)
            {
                $config['upload_path']      = './logo/objek/';
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

            public function getObjekPostById($id)
            {
                return $this->db
                ->where('id_post_tangible', $id)
                ->get('post_tangible')
                ->result_array();
            }


            public function getObjekByProvinsi($id_prov, $query) {
                return $this->db->query("
                SELECT 
                -- PROVINSI
                    provinsi.id_provinsi,
                
                -- DAERAH
                    daerah.id_daerah,
                    daerah.id_provinsi,
                
                -- TIPE
                    tipe.id_tipe,
                    tipe.id_daerah,
                
                -- TANGIBLE
                    tangible.id_tangible,
                    tangible.id_tipe,
                
                -- POST TANGIBLE ATAU OBJEK
                    post_tangible.*
                FROM
                    provinsi 
                        INNER JOIN daerah
                                ON provinsi.id_provinsi = daerah.id_provinsi
                        INNER JOIN tipe
                                ON daerah.id_daerah = tipe.id_daerah
                        INNER JOIN tangible
                                ON tipe.id_tipe = tangible.id_tipe
                        INNER JOIN post_tangible
                                ON tangible.id_tangible = post_tangible.id_tangible
                WHERE
                    provinsi.id_provinsi = $id_prov 
                    AND 
                    post_tangible.nama_post_tangible LIKE '%$query%'
                ")->result_array();
            }
        
        }