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
      $this->load->view('admin/leave_applications/application-index');
  }

  public function lists()
  {
      $data = $this->LeaveApplication_model->lists();
      return $this->load->view('admin/leave_applications/modal/application-index', $data);
  }

  public function show($id)
  {
      $data = $this->LeaveApplication_model->show($id);
      return $this->load->view('admin/leave_applications/application-show', $data);
  }

  public function approved($id)
  {
      if ($this->input->get('status')) {
          $data['id'] = $id;
          $data['status'] = $this->input->get('status');

          $response = $this->LeaveApplication_model->status($data);
          if ($response == true) {
              echo 3;
          }
      }
  }

  public function reject($id)
  {
      if ($this->input->get('status')) {
          $data['id'] = $id;
          $data['status'] = $this->input->get('status');

          $response = $this->LeaveApplication_model->status($data);
          if ($response == true) {
              echo 4;
          }
      }
  }

}
