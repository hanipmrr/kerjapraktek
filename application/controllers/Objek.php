<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Objek extends CI_Controller
    {

        public function __construct()
        {  
            parent::__construct();
            $this->load->model('Objek_model');
            $this->load->helper('text');
        }

        public function index(
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_provinsi
        ) {
           

                $data['judul']          = 'Objek';  

                $data['id_prov']        = $id_prov;
                $data['id_daerah']      = $id_daerah;
                $data['id_tipe']        = $id_tipe;
                $data['id_tangible']    = $id_tangible;
                $data['id_provinsi']    = $id_provinsi;
                $data['objek']          = $this->Objek_model->getObjekById($id_tangible);  

                $this->load->library('pagination');

                $data["data_perhalaman"]= 3;
                $data["halaman"]        = isset($hal) ? $hal : 1;
                $data["halaman_awal"]   = $data["halaman"] > 1 ? $data["data_perhalaman"]*$data["halaman"]-$data["data_perhalaman"] : 0;
                
                $data["sebelumnya"]     = $data["halaman"] - 1;
                $data["berikutnya"]     = $data["halaman"] + 1;

                $data['jumlah_data']    = count($this->Objek_model->getObjekById($id_tangible));
                $data["total_halaman"]  = ceil($data["jumlah_data"]/$data["data_perhalaman"]);

                // TODOS: BINGUNG DI LIMIT DAN OFFSET PSQL
                // NOTE : KALAU PAGINATION SUKSES BERARTI LIMIT OFFSET BENAR
                $data['objek']         = $this->Objek_model->getObjeks($id_tangible, $data['data_perhalaman'], $data['halaman_awal']);
        

                $this->load->view('templates/header', $data);
                $this->load->view('objek/index', $data);
                $this->load->view('templates/footer');
        }


        public function tambah(
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_provinsi
        ) {
            if(isset($_SESSION['username'])){
                $data['judul']          = "Tambah Objek";

                $data['id_prov']        = $id_prov;
                $data['id_daerah']      = $id_daerah;
                $data['id_tipe']        = $id_tipe;
                $data['id_tangible']    = $id_tangible;
                $data['id_provinsi']    = $id_provinsi;

                $this->load->view('templates/header', $data);
                $this->load->view('objek/tambah',$data);
                $this->load->view('templates/footer');

            } else { redirect('auth');}
        
        }
            
        public function prosesTambahObjek(
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_provinsi
        ) {
            $this->Objek_model->tambahobjek();
            redirect (base_url().'objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_provinsi);
        }

        public function hapus (
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_post_tangible,
            $id_provinsi
        ) {
            $this->Objek_model->hapusObjek($id_post_tangible);            
            redirect (base_url().'objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_provinsi);
        }

        public function updateObjek(
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_post_tangible,
            $id_provinsi
        ) {
            $data['judul']              = "Update Objek";

            $data['id_prov']            = $id_prov;
            $data['id_daerah']          = $id_daerah;
            $data['id_tipe']            = $id_tipe;
            $data['id_tangible']        = $id_tangible;
            $data['id_post_tangible']   = $id_post_tangible;
            $data['id_provinsi']        = $id_provinsi;

            $data['post']               = $this->Objek_model->getObjekByIdUpdate($id_post_tangible);
           
            $this->load->view('templates/header',$data);
            $this->load->view('objek/update',$data);
            $this->load->view('templates/footer');
    
        }

        public function prosesUpdateobjek(
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_post_tangible,
            $id_provinsi
        ) {
            $this->Objek_model->updateObjek($id_post_tangible);
            redirect (base_url().'objek/index/'.$id_prov.'/'.$id_daerah.'/'.$id_tipe.'/'.$id_tangible.'/'.$id_provinsi);
        }

        // DETAIL POST 
        public function post(
            $id_prov, 
            $id_daerah, 
            $id_tipe,
            $id_tangible,
            $id_post_tangible,
            $id_provinsi
        ) {
            $data['judul']              = "Post";

            $data['id_prov']            = $id_prov;
            $data['id_daerah']          = $id_daerah;
            $data['id_tipe']            = $id_tipe;
            $data['id_tangible']        = $id_tangible;
            $data['id_post_tangible']   = $id_post_tangible;
            $data['id_provinsi']        = $id_provinsi;

            $data['post']               = $this->Objek_model->getObjekPostById($id_post_tangible);

            $this->load->view('templates/header', $data);
            $this->load->view('objek/post', $data);
            $this->load->view('templates/footer');
        }


        // CARI OBJEK 
        // BERDASARKAN PROVINSI
        public function cariObjek() {
            $data['judul']   = "Hasil Cari";

            $id_provinsi     = $this->input->post('jenis_post_tangible');
            $query           = $this->input->post('query');
            
            $data['objek']   = $this->Objek_model->getObjekByProvinsi($id_provinsi, $query);
            $data['query']   = $this->input->post('query');
            
            $this->load->view('templates/header', $data);
            $this->load->view('objek/hasil_cari', $data);
            $this->load->view('templates/footer');
        }
}