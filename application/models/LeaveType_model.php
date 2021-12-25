<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveType_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function show($id)
  {
      $data['type'] = $this->db->select('*, leave_types.id as id')
                            ->from('leave_types')
                            ->join('users', 'users.id = leave_types.user_id')
                            ->where('leave_types.id', $id)
                            ->order_by('leave_types.id', 'desc')
                            ->get()->result_array();

      return $data;
  }

  public function store($data)
  {
      $insert = $this->db->insert('leave_types', $data);
      if ($insert) {
          return true;
      }
  }

  public function update($data)
  {
      $update = $this->db->where('id', $data['id'])
                        ->update('leave_types', $data);

      if ($update) {
          return true;
      }
  }

  public function destroy($id)
  {
      $delete = $this->db->where('id', $id)->delete('leave_types');
      if ($delete) {
          return true;
      }
  }

  public function lists()
  {
      $data['types'] = $this->db->select('*')
                            ->from('leave_types')
                            ->order_by('id', 'desc')
                            ->get()->result_array();

      return $data;
  }

}
