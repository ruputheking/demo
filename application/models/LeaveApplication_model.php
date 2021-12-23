<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveApplication_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function show($id)
  {
      $data['application'] = $this->db->select('*, leave_applications.id as id')
                                ->from('leave_applications')
                                ->join('users', 'users.id = leave_applications.user_id')
                                ->where('leave_applications.id', $id)
                                ->get()
                                ->result_array();

      return $data;
  }

  public function store($data)
  {
      $month = date('m');
      $user = $this->db->select('*')
                    ->from('users')
                    ->where('users.id', $data['user_id'])
                    ->get()->result_array();

      $applications = $this->db->select('*')
                ->from('leave_applications')
                ->where('user_id', $data['user_id'])
                ->where('status', 1)
                ->where('MONTH(leave_applications.created_at)', $month)
                ->get()
                ->result_array();
      if (count($applications) < $user[0]['leave_days_per_month']) {
          $insert = $this->db->insert('leave_applications', $data);
          if ($insert) {
              return true;
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
          $data['applications'] = $this->db->select('*')
                                        ->where('user_id', $userId)
                                        ->order_by('id', 'desc')
                                        ->get('leave_applications')
                                        ->result_array();
      }else {
          $data['applications'] = $this->db->select('*, leave_applications.id as id')
                                        ->from('leave_applications')
                                        ->join('users', 'users.id = leave_applications.user_id')
                                        ->order_by('leave_applications.id', 'desc')
                                        ->get()
                                        ->result_array();
      }

      return $data;
  }

}
