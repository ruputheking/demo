<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveApplications extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    date_default_timezone_set('Asia/Kathmandu');
    $this->load->database();
    $this->load->model('LeaveApplication_model');
  }

  public function index()
  {
      $this->load->view('frontend/leave_applications/application-index');
  }

  public function create()
  {
      $this->load->view('frontend/leave_applications/application-create');
  }

  public function store()
  {
      $userId = 1;
      $created_at = date('Y-m-d h:i:s');
      if ($this->input->post()) {
          $data['user_id'] = $userId;
          $data['title'] = $this->input->post('subject');
          $data['from_date'] = $this->input->post('from_date');
          $data['to_date'] = $this->input->post('to_date');
          $data['description'] = $this->input->post('description');
          $data['created_at'] = $created_at;
          $data['updated_at'] = $created_at;

          $response = $this->LeaveApplication_model->store($data);
          if ($response == true) {
              echo 3;
          }else {
              echo 2;
          }
      }
  }

  public function list()
  {
      $userId = 1;
      $data = $this->LeaveApplication_model->lists($userId);
      return $this->load->view('frontend/leave_applications/modal/application-index', $data);

  }

  public function show($id)
  {
      $data = $this->LeaveApplication_model->show($id);
      return $this->load->view('frontend/leave_applications/application-show', $data);
  }

  public function edit($id)
  {
      $data = $this->LeaveApplication_model->show($id);
      return $this->load->view('frontend/leave_applications/application-edit', $data);
  }

  public function update($id)
  {
      $created_at = date('Y-m-d h:i:s');
      if ($this->input->post()) {
          $data['id'] = $id;
          $data['title'] = $this->input->post('subject');
          $data['from_date'] = $this->input->post('from_date');
          $data['to_date'] = $this->input->post('to_date');
          $data['description'] = $this->input->post('description');
          $data['status'] = 0;
          $data['updated_at'] = $created_at;

          $response = $this->LeaveApplication_model->update($data);
          if ($response == true) {
              echo 4;
          }
      }
  }

  public function cancel($id)
  {
      $response = $this->LeaveApplication_model->cancel($id);
      if ($response == true) {
          echo 2;
      }
  }

}
