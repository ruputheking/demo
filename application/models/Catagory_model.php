<?php

class Catagory_model extends CI_Model {

    public function catagories()
    {
        $catagories = $this->db->from('catagories')
                            ->order_by('id', 'desc')
                            ->get()
                            ->result_array();
        return $catagories;
    }

    public function store($data)
    {
        $this->db->insert('catagories', $data);
        echo 1;
    }

    public function show($data)
    {
        $catagory = $this->db->select('id, catagory_name, created_at')
                        ->where('id', $data)
                        ->get('catagories')
                        ->result_array();

        return $catagory;
    }

    public function update($data)
    {
        $this->db->set('catagory_name', $data['catagory_name'])
                ->where('id', $data['id'])
                ->update('catagories');

        return 0;
    }

    public function destroy($data)
    {
        $this->db->where('id', $data)->delete('catagories');
        return 1;
    }
}

 ?>
