<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendances extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Attendances_model');
  }

  public function index($month = '')
  {
      if (!$this->input->get()) {
          $data['month'] = '';
          return $this->load->view('admin/attendances/attendance-index', $data);
      }else {
          $month = (explode("-", $this->input->get('month')));
          $data = $this->Attendances_model->reportAttendance($month);
          $data['month'] = $this->input->get('month');
          return $this->load->view('admin/attendances/attendance-index', $data);
      }
  }

  public function report($month = '')
  {
      if ($this->input->get()) {
          return $this->load->view('admin/attendances/attendance-index');
      }else {
          $month = (explode("-", $month));
          print_r($month);
          $this->Attendances_model->reportAttendance($month);
          return $this->load->view('admin/attendances/attendance-index');
      }
  }

  public function list()
  {
      $userId = 1;
      $data['attendance'] = $this->Attendances_model->attendance($userId);
      return $this->load->view('admin/attendances/attendance-list', $data);
  }

  public function checkin()
  {
      $data['user_id'] = 1;
      $data['attendance'] = 1;
      $data['type'] = 'checkin';

      $attendance = $this->Attendances_model->takeAttendance($data);
      if ($attendance == true) {
          echo 1;
      }
  }

  public function checkout()
  {
      $data['user_id'] = 1;
      $data['attendance'] = 1;
      $data['type'] = 'checkout';

      $attendance = $this->Attendances_model->takeAttendance($data);
      if ($attendance == true) {
          echo 2;
      }else {
          echo 3;
      }
  }

}
