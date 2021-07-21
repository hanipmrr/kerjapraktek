<?php

class Provinsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Provinsi_model');
        
    }
    
    public function index()
    {
        $data['judul']      = 'Halaman Provinsi';  

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/kerjapraktek/provinsi/index';

        if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['daerah'] = $this->Provinsi_model->getProvinsi($data['keyword']);

            // set session
            $this->session->set_userdata('keyword',$data['keyword']);
        }

        // if(isset($_POST['submit'])){
        //     $data['keyword']    = $this->input->post('keyword');
        //     $data['provinsi']   = $this->Provinsi_model->getProvinsi($data['keyword']);

        //     // set session
        //     $this->session->set_userdata('keyword',$data['keyword']);

        // }
        // else{
        //     $data['provinsi'] = $this->Provinsi_model->getAllProvinsi();
        // }
            
        $config['total_rows']= $this->Provinsi_model->countAllProvinsi();

        //styling pagination

        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center d-flex mt-2">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        $config['per_page']=9;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['provinsi'] = $this->Provinsi_model->getProvinsis($config['per_page'],$data['start']);

        
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