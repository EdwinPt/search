<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commits extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Commit_model');
	}

	/**
	 * Sin acceso a index de controlador
	 */
	public function index()
	{
		redirect(base_url(), 'location');
	}

	/**
	 * Obtiene lista de commits de un repositorio
	 * segun url 
	 */
	public function get_url($url="")
	{
		try{
			if($this->input->post('url') != ""){
				$url = $this->input->post('url');
				$opts = [
					'http' => [
							'method' => 'GET',
							'header' => [
									'User-Agent: PHP'
							]
					]
				];
				$json_data = stream_context_create($opts);
				$json_data = file_get_contents($url, false, $json_data);
				$result = json_decode($json_data , true);
				$data['items'] = $result;
				$this->load->view('view_commits', $data);
			}else{
				redirect(base_url(), 'location');
			}
		}catch(Exception $e){
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}		
	}

	/**
	 * Logs de busquedas de usuario
	 */
	public function add()
	{
		if($this->input->post('data') !=""){
			$palabra = $this->input->post('data');
			$code_status = $this->input->post('code_status');
			$text_status = $this->input->post('text_status');
			$this->Commit_model->add($palabra, $code_status, $text_status);
		}
	}
}