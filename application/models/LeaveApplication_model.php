<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveApplication_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    date_default_timezone_set('Asia/Kathmandu');
  }

  public function show($id)
  {
      $data['application'] = $this->db->select('*, leave_applications.id as id, leave_applications.created_at as created_at, leave_applications.updated_at as updated_at, leave_applications.title as title, leave_types.title as leave_title')
                                ->from('leave_applications')
                                ->join('users', 'users.id = leave_applications.user_id')
                                ->join('leave_types', 'leave_types.id = leave_applications.leave_type')
                                ->where('leave_applications.id', $id)
                                ->get()
                                ->result_array();

      return $data;
  }

  public function store($data)
  {
      $userId = $data['user_id'];
      $leaveType = $data['leave_type'];
      $type = $this->db->select('*')
                        ->from('leave_types')
                        ->where('leave_types.id', $data['leave_type'])
                        ->get()->result_array();

      if ($type[0]['per_type'] == 'Week') {
          $weekly = $this->db->query("SELECT * FROM leave_applications WHERE from_date >= DATE(NOW()) - INTERVAL 6 DAY AND status = 1 AND user_id = $userId AND leave_type = $leaveType");
          
          if (count($weekly->result_array()) < $type[0]['vacation']) {
              $insert = $this->db->insert('leave_applications', $data);
              if ($insert) {
                  return true;
              }
          }else {
              return false;
          }
      }
      elseif ($type[0]['per_type'] == 'Month') {
          $date = date('m');
          $month = $this->db->select('*')
                            ->from('leave_applications')
                            ->where('user_id', $data['user_id'])
                            ->where('leave_type', $data['leave_type'])
                            ->where('status', 1)
                            ->where('MONTH(leave_applications.from_date)', $date)
                            ->get()->result_array();

          if (count($month) < $type[0]['vacation']) {
              if (count($month) < $type[0]['vacation']) {
                  $insert = $this->db->insert('leave_applications', $data);
                  if ($insert) {
                      return true;
                  }
              }else {
                  return false;
              }
          }
      }
      elseif ($type[0]['per_type'] == 'Year') {
          $year = date('Y');
          $applications = $this->db->select('*')
                    ->from('leave_applications')
                    ->where('user_id', $data['user_id'])
                    ->where('leave_type', $data['leave_type'])
                    ->where('status', 1)
                    ->where('YEAR(leave_applications.from_date)', $year)
                    ->get()
                    ->result_array();

          if (count($applications) < $type[0]['vacation']) {
              $insert = $this->db->insert('leave_applications', $data);
              if ($insert) {
                  return true;
              }
          }else {
              return false;
          }
      }else {
          return false;
      }
  }

  public function update($data)
  {
      $update = $this->db->where('id', $data['id'])
                        ->update('leave_applications', $data);

      if ($update) {
          return true;
      }
  }

  public function status($data)
  {
      $update = $this->db->where('id', $data['id'])
                        ->update('leave_applications', $data);

      if ($update) {
          return true;
      }
  }

  public function cancel($id)
  {
      $cancel = $this->db->set('status', 3)
                        ->where('id', $id)
                        ->update('leave_applications');
      if ($cancel) {
          return true;
      }
  }

  public function lists($userId = '')
  {
      if ($userId != '') {
          $data['applications'] = $this->db->select('*, leave_applications.id as id, leave_applications.title as title, leave_applications.created_at as created_at, leave_applications.updated_at as updated_at, leave_types.title as leave_title')
                                        ->from('leave_applications')
                                        ->join('leave_types', 'leave_types.id = leave_applications.leave_type')
                                        ->where('leave_applications.user_id', $userId)
                                        ->order_by('leave_applications.id', 'desc')
                                        ->get()
                                        ->result_array();
      }else {
          $data['applications'] = $this->db->select('*, leave_applications.id as id, leave_applications.title as title, leave_applications.created_at as created_at, leave_applications.updated_at as updated_at, leave_types.title as leave_title')
                                        ->from('leave_applications')
                                        ->join('leave_types', 'leave_types.id = leave_applications.leave_type')
                                        ->join('users', 'users.id = leave_applications.user_id')
                                        ->order_by('leave_applications.id', 'desc')
                                        ->get()
                                        ->result_array();
      }

      return $data;
  }

}
