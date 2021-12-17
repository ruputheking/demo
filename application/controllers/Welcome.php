<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Catagory_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function create()
    {
        $this->load->view('admin/catagories/catagory-create');
    }

	public function store()
	{
		if ($this->input->post()) {
			$data['catagory_name'] = $this->input->post('catagory_name');
			$response = $this->Catagory_model->store($data);
			if ($response == true) {
				echo 1;
			}
		}
	}

	public function show($id)
	{
		$data = array();
		$data['catagory'] = $this->Catagory_model->show($id);
		return $this->load->view('admin/catagories/catagory-show', $data);
	}

	public function edit($id)
	{
		$data = array();
		$data['catagory'] = $this->Catagory_model->show($id);
		return $this->load->view('admin/catagories/catagory-edit', $data);
	}

	public function update()
	{
		if ($this->input->post()) {
			$data['id'] = $this->input->post('catagory_id');
			$data['catagory_name'] = $this->input->post('catagory_name');
			$response = $this->Catagory_model->update($data);
			if ($response == true) {
				echo 0;
			}
		}
	}

	public function delete($id)
	{
		$response = $this->Catagory_model->destroy($id);
		if ($response == true) {
			echo 1;
		}
	}

	public function catagories()
	{
		$data = array();
		$data['catagories'] = $this->Catagory_model->catagories();

		return $this->load->view('admin/catagories/catagory-index', $data);
	}
}
