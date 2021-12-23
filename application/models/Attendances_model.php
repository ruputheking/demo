<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendances_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Kathmandu');
  }

  public function attendance($userId)
  {
      $date = date('Y-m-d');
      $attendance = $this->db->select('*, users.id as user_id, staff_attendances.id as attendance_id')
                ->from('users')
                ->join('staff_attendances', 'users.id = staff_attendances.user_id', 'left')
                ->where('staff_attendances.date', $date)
                ->where('users.id', $userId)
                ->get()->result_array();

        return $attendance;
  }

  public function checkin()
  {
      $this->db->insert('attendances', $data);
  }

  public function takeAttendance($data)
  {
      $created_at = date('Y-m-d h:i:s');
      $date = date('Y-m-d');
      $time = date('H:i');
      $temp = array();
      $temp['user_id'] = $data['user_id'];
      $temp['date'] = $date;
      $temp['attendance'] = $data['attendance'];
      $temp['checkin_time'] = $time;
      $temp['created_at'] = $created_at;
      $temp['updated_at'] = $created_at;

      $staffAtt = $this->db->select('*, users.id as user_id, staff_attendances.id as attendance_id')
                ->from('users')
                ->join('staff_attendances', 'users.id = staff_attendances.user_id', 'left')
                ->where('staff_attendances.date', $date)
                ->where('users.id', $data['user_id'])
                ->get()->result_array();

      if ($staffAtt) {
          if ($staffAtt[0]['checkout_time'] == null) {
              if ($data['type'] == 'checkout') {
                  $attendance = $this->db->set('checkout_time', $time)
                        ->set('updated_at', $created_at)
                        ->where('user_id', $data['user_id'])
                        ->where('date', $date)
                        ->where('attendance', $data['attendance'])
                        ->update('staff_attendances');
                        if ($attendance) {
                            return true;
                        }
              }
          }else {
              return false;
          }

      }else {
          $attendance = $this->db->insert('staff_attendances', $temp);
          if ($attendance) {
              return true;
          }
      }
  }

  public function reportAttendance($data)
  {
      $num_of_days =  cal_days_in_month(CAL_GREGORIAN, $data[1], $data[0]);
      $query = $this->db->select('*')
                ->from('staff_attendances')
                ->join('users', 'users.id = staff_attendances.user_id')
                ->where('MONTH(staff_attendances.date)', $data[1])
                ->where('YEAR(staff_attendances.date)', $data[0])
                ->order_by('staff_attendances.date', 'asc')
                ->get()->result_array();

      $query2 = $this->db->from('users')
                        ->order_by('id', 'asc')
                        ->get()->result_array();

      $report_data = array();
      $users = array();

      for ($i=1; $i <= $num_of_days; $i++) {
          $date = new \DateTime($data[0] . '-' . $data[1] . '-' . $i);
          $date = $date->format('Y-m-d');
          $attendance_value = array('0' => "", "1" => "P", "2" => "A", "3" => 'L', "4" => "H");
          foreach ($query as $value) {
              if ($date == $value['date']) {
                  $report_data[$value['user_id']][$date] = $value['checkin_time'] . ' - ' . $value['checkout_time'];
              }else {
                  if(! isset($report_data[$value['user_id']][$date])){
                      $report_data[$value['user_id']][$date] = $attendance_value[0];
                  }
              }
          }
      }

      foreach ($query2 as $user) {
          $users[$user['id']] = $user;
      }

      $array = array();
      $array['report_data'] = $report_data;
      $array['users'] = $users;
      $array['num_of_days'] = $num_of_days;

      return $array;
  }

}
