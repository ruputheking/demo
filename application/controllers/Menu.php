<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Menu_model');
        $this->load->model('Catagory_model');
    }

    public function index()
    {
        $this->load->view('menu_lists');
    }

    public function create()
    {
        $data['catagories'] = $this->Catagory_model->catagories();
        $this->load->view('admin/menus/menu-create', $data);
    }

    public function store()
    {
        if ($this->input->post()) {
            $data['catagory_id'] = $this->input->post('catagory_id');
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $response = $this->Menu_model->store($data);
            if ($response == true) {
                echo 1;
            }
        }
    }

    public function show($id)
    {
        $data = array();
        $data['menu'] = $this->Menu_model->show($id);
        return $this->load->view('admin/menus/menu-show', $data);
    }

    public function edit($id)
    {
        $data = array();
        $data['menu'] = $this->Menu_model->show($id);
        $data['catagories'] = $this->Catagory_model->catagories();
        return $this->load->view('admin/menus/menu-edit', $data);
    }

    public function update()
    {
        if ($this->input->post()) {
            $data['id'] = $this->input->post('menu_id');
            $data['catagory_id'] = $this->input->post('catagory_id');
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');

            $response = $this->Menu_model->update($data);
            if ($response == true) {
                echo 0;
            }
        }
    }

    public function delete($id)
    {
        $response = $this->Menu_model->destroy($id);
        if ($response == true) {
            echo 1;
        }
    }

    public function menus()
    {
        $data = array();
        $data['menus'] = $this->Menu_model->menus();

        return $this->load->view('admin/menus/menu-index', $data);
    }
}
