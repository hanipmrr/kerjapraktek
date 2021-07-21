<?php

    class Tipe extends CI_Controller
    {

        public function __construct()
        {  
            parent::__construct();
            $this->load->model('Tipe_model');
        }
        
        public function index($id_prov, $id_daerah, $id_provinsi) 
        {
            $data['judul']      = 'Tipe Benda';               
            $data['tipe']       = $this->Tipe_model->getTipeById($id_daerah);
            $data['id_prov']    = $id_prov;
            $data['id_daerah']  = $id_daerah;
            $data['id_provinsi']  = $id_provinsi;

            
            $this->load->view('templates/header', $data);
            $this->load->view('tipe/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambah($id_prov, $id_daerah, $id_provinsi)
        {
            if(isset($_SESSION['username'])){
                $data['judul']      = "Tambah Tipe";
                $data['id_prov']    = $id_prov;
                $data['id_daerah']  = $id_daerah;
                $data['id_provinsi']  = $id_provinsi;

                $this->load->view('templates/header', $data);
                $this->load->view('tipe/tambah',$data);
                $this->load->view('templates/footer');

            } else { redirect('auth'); }
        }
                
        public function prosesTambahTipe($id_prov, $id_daerah, $id_provinsi)
        {
            $this->Tipe_model->tambahtipe();
            redirect (base_url()."tipe/index/". $id_prov. '/'.$id_daerah. '/'.$id_provinsi);
        }

        public function hapus ($id_prov, $id_daerah, $id_tipe, $id_provinsi)
        {
            $this->Tipe_model->hapusTipe($id_tipe);
            redirect (base_url()."tipe/index/". $id_prov. '/'.$id_daerah. '/'.$id_provinsi);
        }

        public function updateTipe($id_prov, $id_daerah, $id_tipe,$id_provinsi)
        {
            $data['judul']      = "Update Tipe";
            $data['id_daerah']  = $id_daerah;
            $data['id_prov']    = $id_prov;
            $data['id_tipe']    = $id_tipe; 
            $data['id_provinsi']    = $id_provinsi; 


            $data['post']       = $this->Tipe_model->getTipeByIdUpdate($id_tipe);
        
            $this->load->view('templates/header',$data);
            $this->load->view('tipe/update',$data);
            $this->load->view('templates/footer');

        }

        public function prosesUpdatetipe($id_prov, $id_daerah, $id_tipe,$id_provinsi)
        {
            $this->Tipe_model->updateTipe($id_tipe);
            redirect (base_url()."tipe/index/". $id_prov. '/'.$id_daerah. '/'.$id_provinsi);
        }

}