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
        $hal = null
    ) {

        // if($this->input->post('logo_post_tangible')) {
        //     $this->form_validation->set_rules('logo_post_tangible', '', 'callback_file_check');

        //     $this->form_validation->set_rules('kode_post_tangible', 'Kode Post Tangible', 'required');
        //     $this->form_validation->set_rules('nama_post_tangible', 'Nama Post Tangible', 'required');
        //     $this->form_validation->set_rules('logo_post_tangible', 'Logo Post Tangible', 'required');

        // }
        if ($this->form_validation->run() == FALSE) {
            $data['judul']          = 'Objek';

            $data['id_prov']        = $id_prov;
            $data['id_daerah']      = $id_daerah;
            $data['id_tipe']        = $id_tipe;
            $data['id_tangible']    = $id_tangible;
            $data['objek']          = $this->Objek_model->getObjekById($id_tangible);


            $data["data_perhalaman"] = 3;
            $data["halaman"]        = isset($hal) ? $hal : 1;
            $data["halaman_awal"]   = $data["halaman"] > 1 ? $data["data_perhalaman"] * $data["halaman"] - $data["data_perhalaman"] : 0;

            $data["sebelumnya"]     = $data["halaman"] - 1;
            $data["berikutnya"]     = $data["halaman"] + 1;

            $data['jumlah_data']    = count($this->Objek_model->getObjekById($id_tangible));
            $data["total_halaman"]  = ceil($data["jumlah_data"] / $data["data_perhalaman"]);

            // TODOS: BINGUNG DI LIMIT DAN OFFSET PSQL
            // NOTE : KALAU PAGINATION SUKSES BERARTI LIMIT OFFSET BENAR
            $data['objek']         = $this->Objek_model->getObjeks($id_tangible, $data['data_perhalaman'], $data['halaman_awal']);

            // echo "<pre>";
            // var_dump($data["objek"]);
            // echo "</pre>";
            // die;

            $this->load->view('templates/header', $data);
            $this->load->view('objek/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('formsuccess');
        }
    }

    // public function file_check($str) {
    //     $config['upload_path']      = './logo/objek/';
    //     $config['allowed_types']    = 'jpg|png|gif';
    //     $config['overwrite']        = true;
    //     $config['max_size']         = 2048; // 2mb
    //     $allowed_mime_type_arr = array('image/jpg','image/png','image/jpeg','image/png');
    //     $mime = get_mime_by_extension($_FILES['logo_post_tangible']['name']);
    //     if(isset($_FILES['logo_post_tangible']['name']) && $_FILES['logo_post_tangible']['name']!=""){
    //         if(in_array($mime, $allowed_mime_type_arr)){
    //             return true;
    //         }else{
    //             $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
    //             return false;
    //         }
    //     }else{
    //         $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
    //         return false;
    //     }
    // }


    public function tambah(
        $id_prov,
        $id_daerah,
        $id_tipe,
        $id_tangible
    ) {
        if (isset($_SESSION['username'])) {
            $data['judul']          = "Tambah Objek";

            $data['id_prov']        = $id_prov;
            $data['id_daerah']      = $id_daerah;
            $data['id_tipe']        = $id_tipe;
            $data['id_tangible']    = $id_tangible;

            $this->load->view('templates/header', $data);
            $this->load->view('objek/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function prosesTambahObjek(
        $id_prov,
        $id_daerah,
        $id_tipe,
        $id_tangible
    ) {
        $this->Objek_model->tambahobjek();
        redirect(base_url() . 'objek/index/' . $id_prov . '/' . $id_daerah . '/' . $id_tipe . '/' . $id_tangible);
    }

    public function hapus(
        $id_prov,
        $id_daerah,
        $id_tipe,
        $id_tangible,
        $id_post_tangible
    ) {
        $this->Objek_model->hapusObjek($id_post_tangible);
        redirect(base_url() . 'objek/index/' . $id_prov . '/' . $id_daerah . '/' . $id_tipe . '/' . $id_tangible);
    }

    public function updateObjek(
        $id_prov,
        $id_daerah,
        $id_tipe,
        $id_tangible,
        $id_post_tangible
    ) {
        $data['judul']              = "Update Objek";

        $data['id_prov']            = $id_prov;
        $data['id_daerah']          = $id_daerah;
        $data['id_tipe']            = $id_tipe;
        $data['id_tangible']        = $id_tangible;
        $data['id_post_tangible']   = $id_post_tangible;

        $data['post']               = $this->Objek_model->getObjekByIdUpdate($id_post_tangible);

        $this->load->view('templates/header', $data);
        $this->load->view('objek/update', $data);
        $this->load->view('templates/footer');
    }

    public function prosesUpdateobjek(
        $id_prov,
        $id_daerah,
        $id_tipe,
        $id_tangible,
        $id_post_tangible
    ) {
        $this->Objek_model->updateObjek($id_post_tangible);
        redirect(base_url() . 'objek/index/' . $id_prov . '/' . $id_daerah . '/' . $id_tipe . '/' . $id_tangible);
    }

    // DETAIL POST 
    public function post(
        $id_prov,
        $id_daerah,
        $id_tipe,
        $id_tangible,
        $id_post_tangible
    ) {
        $data['judul']              = "Post";

        $data['id_prov']            = $id_prov;
        $data['id_daerah']          = $id_daerah;
        $data['id_tipe']            = $id_tipe;
        $data['id_tangible']        = $id_tangible;
        $data['id_post_tangible']   = $id_post_tangible;

        $data['post']               = $this->Objek_model->getObjekPostById($id_post_tangible);

        $this->load->view('templates/header', $data);
        $this->load->view('objek/post', $data);
        $this->load->view('templates/footer');
    }


    // CARI OBJEK 
    // BERDASARKAN PROVINSI
    public function cariObjek()
    {
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