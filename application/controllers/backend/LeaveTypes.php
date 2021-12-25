<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveTypes extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    date_default_timezone_set('Asia/Kathmandu');
    $this->load->database();
    $this->load->model('LeaveType_model');
  }

  function index()
  {
      return $this->load->view('admin/leave_types/type-index');
  }

  public function create()
  {
      return $this->load->view('admin/leave_types/type-create');
  }

  public function lists()
  {
      $data =$this->LeaveType_model->lists();
      return $this->load->view('admin/leave_types/modal/type-index', $data);
  }

  public function store()
  {
      $date = date('Y-m-d h:i:s');
      $userId = 1;
      if ($this->input->post()) {
          $data['user_id'] = $userId;
          $data['title'] = $this->input->post('title');
          $data['vacation'] = $this->input->post('vacation');
          $data['per_type'] = $this->input->post('per_type');
          $data['created_at'] = $date;
          $data['updated_at'] = $date;

          $response = $this->LeaveType_model->store($data);
          if ($response == true) {
              echo 1;
          }
      }
  }

  public function show($id)
  {
      $data = $this->LeaveType_model->show($id);
      return $this->load->view('admin/leave_types/type-show', $data);
  }

  public function edit($id)
  {
      $data = $this->LeaveType_model->show($id);
      return $this->load->view('admin/leave_types/type-edit', $data);
  }

  public function update($id)
  {
      $date = date('Y-m-d h:i:s');
      if ($this->input->post()) {
          $data['id'] = $id;
          $data['title'] = $this->input->post('title');
          $data['vacation'] = $this->input->post('vacation');
          $data['per_type'] = $this->input->post('per_type');
          $data['updated_at'] = $date;

          $response = $this->LeaveType_model->update($data);
          if ($response == true) {
              echo 0;
          }
      }
  }

  public function delete($id)
  {
      $response = $this->LeaveType_model->destroy($id);

      if ($response == true) {
          echo 1;
      }
  }

}
