<?php

    class Bangunan extends CI_Controller
    {

        public function __construct()
        {  
            parent::__construct();
            $this->load->model('tangible/Benda_model');
            // $config['base_url']='http://34.101.75.167/kerjapraktek/tangible/benda/';
        }

        public function index($id)
        {
                $data['judul'] = 'Benda';               
                $data['bangunan'] = $this->Benda_model->getBendaById($id);
                $data['id_post_tangible'] = $id;    
                $data['id_tangible'] = $id; 

                $this->load->view('templates/header', $data);
                $this->load->view('f_tangible/benda/index', $data);
                $this->load->view('templates/footer');

        }

    }