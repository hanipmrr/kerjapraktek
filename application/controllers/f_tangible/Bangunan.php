<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Bangunan extends CI_Controller
    {

        public function __construct()
        {  
            parent::__construct();
            $this->load->model('tangible/Bangunan_model');
            $this->load->helper('text');
            // $config['base_url']='http://34.101.75.167/kerjapraktek/tangible/bangunan/';
        }

        public function index($id)
        {
                // var_dump($id);die;
                $data['judul'] = 'Objek';               
                $data['bangunan'] = $this->Bangunan_model->getBangunanById($id);
                // $data['id_post_tangible'] = $id;    
                $data['id_tangible'] = $id; 

                $this->load->view('templates/header', $data);
                $this->load->view('f_tangible/bangunan/index', $data);
                $this->load->view('templates/footer');

        }

        
        public function tambah($id)
        {
            if(isset($_SESSION['username'])){
            $data['judul'] = "Tambah Objek";
            $data['post'] =$id;
            $data['id']=$id;
            $this->load->view('templates/header', $data);
            $this->load->view('f_tangible/bangunan/tambah',$data);
            $this->load->view('templates/footer');
        }else {
            redirect('auth');
            }
        
        }
            
        public function prosesTambahBangunan($id)
        {
            $this->Bangunan_model->tambahbangunan();
            redirect (base_url()."f_tangible/bangunan/index/". $id);
        }

        public function hapus ($id, $id_post_tangible)
        {
        $this->Bangunan_model->hapusObjek($id);
        // echo "sukses menghapus";
        redirect (base_url()."f_tangible/bangunan/index/". $id_post_tangible);
        }

        public function updateBangunan($id)
        {
            $data['judul'] = "Update Objek";
            $data['post'] = $this->Bangunan_model->getBangunanByIdUpdate($id);
            $data['id_post_tangible']=$id;   
           
            $this->load->view('templates/header');
            $this->load->view('f_tangible/bangunan/update',$data);
            $this->load->view('templates/footer');
    
        }

    public function prosesUpdatebangunan($id_post_tangible, $id_tangible)
    {
        $this->Bangunan_model->updateBangunan($id_post_tangible);
       redirect(base_url() . "f_tangible/bangunan/post/". $id_post_tangible);
     // echo "sukses update";
    }

    public function post($id_tangible,$id_post_tangible)
    {
        $data['judul'] = "Post";
        $data['post'] = $this->Bangunan_model->getBangunanPostById($id_post_tangible);
        $data['id_post_tangible'] = $id_post_tangible;    
        $data['id_tangible'] = $id_tangible; 

        $this->load->view('templates/header', $data);
        $this->load->view('f_tangible/bangunan/post', $data);
        $this->load->view('templates/footer');
    }


    }