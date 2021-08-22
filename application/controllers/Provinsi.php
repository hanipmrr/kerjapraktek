<?php

class Provinsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Provinsi_model');
        
    }
    
    public function index($hal = null)
    {
        $data['judul']          = 'Halaman Provinsi';  
        

        $data["data_perhalaman"]= 9;
        $data["halaman"]        = isset($hal) ? $hal : 1;
        $data["halaman_awal"]   = $data["halaman"] > 1 ? $data["data_perhalaman"]*$data["halaman"]-$data["data_perhalaman"] : 0;
        
        $data["sebelumnya"]     = $data["halaman"] - 1;
        $data["berikutnya"]     = $data["halaman"] + 1;

        $data['jumlah_data']    = $this->Provinsi_model->countAllProvinsi();
        $data["total_halaman"]  = ceil($data["jumlah_data"]/$data["data_perhalaman"]);

        $data['provinsi']         = $this->Provinsi_model->getProvinsis($data['data_perhalaman'], $data['halaman_awal']);

        if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['provinsi'] = $this->Provinsi_model->getProvinsi(ucwords($data['keyword']));
            // set session
            $this->session->set_userdata('keyword',$data['keyword']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('provinsi/index', $data);
        $this->load->view('templates/footer');            
    }
    
    public function tambah()
    {
        if(isset($_SESSION['username'])){
        $data['judul'] = "Tambah Provinsi";
        $this->load->view('templates/header', $data);
        $this->load->view('provinsi/tambah');
        $this->load->view('templates/footer');

        
    }else {
        redirect('auth');
        }
    }

    public function prosesTambahProvinsi()
    {
        $this->Provinsi_model->tambahProvinsi();
        //echo "sukses menambahkan";
        redirect (base_url()."provinsi/index");

    }

    public function hapusProv ($id)
    {
        $this->Provinsi_model->hapusProvinsi($id);
        // echo "sukses menghapus";
        redirect (base_url()."provinsi/index");
    }

    public function updateProv($id)
    {
        $data['judul'] = "Update Provinsi";
        $data['post'] = $this->Provinsi_model->getProvinsiById($id);

        $this->load->view('templates/header',$data);
        $this->load->view('provinsi/update',$data);
        $this->load->view('templates/footer');

    }

    public function prosesUpdateProvinsi($id)
    {
        $this->Provinsi_model->updateProvinsi($id);
       redirect(base_url() . "provinsi/index");
       //echo "sukses update";
    }

    public function fetchProvinsi() {
        $result =  $this->Provinsi_model->getAllProvinsi();
        echo json_encode($result);
    }
   
}