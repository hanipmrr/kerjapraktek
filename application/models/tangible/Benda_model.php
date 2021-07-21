<?php
    class Bangunan_model extends CI_Model
    {
        public function getBendaById($id){
            return $this->db
            ->where ('id_tipe_tangible', $id)
            ->get ('post_tangible')
            ->result_array ();
        }

        public function getAllbangunan()
        {
            return $this->db
            ->select("id_bangunan,nama_bangunan,id_tangible")
            ->get('bangunan')
            ->result_array();
        }

    }