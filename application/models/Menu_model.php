<?php

/**
 * This is Menu Model Class
 */
class Menu_model extends CI_Model
{

    public function menus()
    {
        $menus = $this->db->select('*, menu_lists.id as id')
                        ->from('menu_lists')
                        ->join('catagories', 'catagories.id = menu_lists.catagory_id')
                        ->order_by('menu_lists.id', 'desc')
                        ->get()
                        ->result_array();

        return $menus;
    }

    public function store($data)
    {
        $this->db->insert('menu_lists', $data);
        return true;
    }

    public function show($data)
    {
        $menu = $this->db->select('*, menu_lists.id as id')
                        ->from('menu_lists')
                        ->join('catagories', 'catagories.id = menu_lists.catagory_id')
                        ->where('menu_lists.id', $data)
                        ->get()
                        ->result_array();

        return $menu;
    }

    public function update($data)
    {
        $menu = array(
            'title' => $data['title'],
            'catagory_id' => $data['catagory_id'],
            'description' => $data['description'],
        );

        $this->db->where('id', $data['id'])
                ->update('menu_lists', $menu);

        return true;
    }

    public function destroy($data)
    {
        $this->db->where('id', $data)->delete('menu_lists');
        return true;
    }
}


?>
