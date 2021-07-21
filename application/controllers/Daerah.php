<?php

class Daerah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daerah_model');
    }
    
    public function index($id_prov, $hal=null)
    {
        // $config['base_url'] = 'http://localhost/kerjapraktek/daerah/index';


        $data['judul']      = 'Halaman Daerah';
        $data['daerah']     = $this->Daerah_model->getDaerahById($id_prov);
        $data['id_prov']    = $id_prov; 
        // echo "<pre>";
        // var_dump($data["daerah"]);
        // echo "</pre>";
        // die;
        $this->load->library('pagination');

        $data["data_perhalaman"]= 9;
        $data["halaman"]        = isset($hal) ? $hal : 1;
        $data["halaman_awal"]   = $data["halaman"] > 1 ? $data["data_perhalaman"]*$data["halaman"]-$data["data_perhalaman"] : 0;
        
        $data["sebelumnya"]     = $data["halaman"] - 1;
        $data["berikutnya"]     = $data["halaman"] + 1;

        $data['jumlah_data']    = count($this->Daerah_model->getDaerahById($id_prov));
        $data["total_halaman"]  = ceil($data["jumlah_data"]/$data["data_perhalaman"]);

        // TODOS: BINGUNG DI LIMIT DAN OFFSET PSQL
        // NOTE : KALAU PAGINATION SUKSES BERARTI LIMIT OFFSET BENAR
        $data['daerah']         = $this->Daerah_model->getDaerahs($id_prov, $data['data_perhalaman'], $data['halaman_awal']);
        


        if(isset($_POST['submit'])){
            $data['keyword'] = $this->input->post('keyword');
            $data['daerah'] = $this->Daerah_model->getDaerah($data['keyword']);

            // set session
            $this->session->set_userdata('keyword',$data['keyword']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('daerah/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah($id)
    {
    
        if(isset($_SESSION['username'])){
        $data['judul'] = "Tambah Daerah";
        $data['post'] =$id;
        $data['id']=$id;
        $this->load->view('templates/header', $data);
        $this->load->view('daerah/tambah',$data);
        $this->load->view('templates/footer');
    }else {
        redirect('auth');
        }
    }
        
    public function prosesTambahDaerah($id)
    {
        $this->Daerah_model->tambahDaerah();
        redirect (base_url()."daerah/index/". $id);
    }

    public function hapus ($id, $id_daerah)
    {
    $this->Daerah_model->hapusDaerah($id);
    // echo "sukses menghapus";
    redirect (base_url()."daerah/index/". $id_daerah);
    }

    public function updateDaerah($id)
    {
        $data['judul'] = "Update Daerah";
        $data['post'] = $this->Daerah_model->getDaerahByIdUpdate($id);
        $data['id_daerah']=$id;   
        // $data['id_daerah']=$id;

        $this->load->view('templates/header',$data);
        $this->load->view('daerah/update',$data);
        $this->load->view('templates/footer');

    }

    public function prosesUpdateDaerah($id_daerah, $id_prov)
    {
        $this->Daerah_model->updateDaerah($id_daerah);
       redirect(base_url() . "daerah/index/". $id_prov);
    //    echo "sukses update";
    }
   
}