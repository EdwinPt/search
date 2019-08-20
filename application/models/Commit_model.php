<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commit_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     *  Guarda datos en la tabla busqueda
     */
    public function add($palabra, $code_status, $text_status)
    {
        $data = array(
            'palabra' => $palabra,
            'code_status' => $code_status,
            'text_status' => $text_status
        );
        $this->db->insert('busquedas',$data);
    }
}