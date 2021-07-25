<?php  
    class Daerah_model extends CI_Model
    {
        public function tambahdaerah() 
        {   
                $config['upload_path']      = './logo/daerah/';
                $config['allowed_types']    = 'jpg|png|gif';
                $config['overwrite']        = true;
                $config['max_size']         = 2048; // 2mb
                
            $this->load->library('upload', $config); // load konfigurasi uploadnya
                
            if($this->upload->do_upload('logo_daerah'))
                {
                $fileData = $this->upload->data();    
                // jika berhasil :
                $data = array(
                'nama_daerah' => $this->input->post('nama_daerah'),
                'id_provinsi' => $this->input->post('id_provinsi'),
                'kode_daerah' => $this->input->post('kode_daerah'),
                'logo_daerah' => $fileData['file_name']   
                 );
                 $this->db->insert('daerah', $data);
                }
                else 
                {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
    //          return "default.jpg"; 
        }


        public function getAllDaerah()
        {
          return $this->db
          ->select("id_daerah,nama_daerah,id_provinsi,logo_daerah,kode_daerah")
          ->order_by('nama_daerah','asc')
          ->get('daerah')
          ->result_array();
        }

        public function getDaerahs($id_provinsi, $limit, $offset){
            
            return $this->db->query(
                "SELECT * 
                    FROM 
                        daerah
                    WHERE 
                        id_provinsi = $id_provinsi
                    ORDER BY
                        nama_daerah ASC
                    LIMIT 
                        $limit
                    OFFSET 
                        $offset"
            )->result_array();

        }

        public function getDaerah($id_provinsi, $keyword = null)
        {
            // return $this->db
            // ->select ("id_daerah,nama_daerah,id_provinsi,logo_daerah,kode_daerah")
            // ->like('nama_daerah', $keyword)
            // ->order_by('nama_daerah','asc')
            // ->get('daerah')
            // ->result_array();

            return $this->db->query(
                "SELECT
                    id_daerah,
                    nama_daerah,
                    id_provinsi,
                    logo_daerah,
                    kode_daerah
                FROM 
                    daerah
                WHERE 
                    id_provinsi = $id_provinsi AND
                    nama_daerah LIKE '%$keyword%'
                ORDER BY
                    nama_daerah ASC"
            )->result_array();
        }
        
        public function countDaerah($keyword=null)
        {
            return $this->db->like('nama_daerah',$keyword)
            ->from('daerah')
            ->count_all_results();
        }

        public function countAllDaerah()
        {
            return $this->db
            ->get('daerah')
            ->num_rows();
        }

        public function getDaerahById ($id)
        {
        return $this->db
            ->where ('id_provinsi', $id)
            ->order_by('nama_daerah','asc')
            ->get ('daerah')
            ->result_array ();
        }

        public function getDaerahByIdUpdate ($id)
        {
        return $this->db
            ->where ('id_daerah', $id)
            ->order_by('nama_daerah','asc')
            ->get ('daerah')
            ->result_object();
        }

        public function updateDaerah($id)
        {
            $config['upload_path']      = './logo/daerah/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = true;
            $config['max_size']         = 2048; // 2mb
            
        $this->load->library('upload', $config);
            if($this->upload->do_upload('logo_daerah'))
            {
            $fileData = $this->upload->data(); 
            $data = array(
                'id_daerah' =>$this->input->post('id_daerah'),
                'nama_daerah' => $this->input->post('nama_daerah'),
                'kode_daerah' => $this->input->post('kode_daerah'),
                // 'id_provinsi' => $this->input->post('id_provinsi'),
                'logo_daerah' => $fileData['file_name']
            );
            $this->db
            ->where('id_daerah',$id)
            ->update('daerah',$data);
            }
                else 
                {
                // jika gagal :
                $this->session->set_flashdata('error', $this->upload->display_errors());
                }	  
//              return "default.jpg"; 
        }

        public function hapusDaerah ($id)
        {
        $this->db
        ->where ('id_daerah',$id)
        ->delete('daerah');
        }

    }
