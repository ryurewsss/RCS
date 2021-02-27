<?php

class ieModel extends CI_Model
{
    public function getAll($tableName, $getColName = '*', $arrayWhere = '', $order = '', $arrayJoinTable = array(), $groupby = '')
    {
        if ($getColName) {
            $this->db->select($getColName);
        }
        if ($arrayWhere) {
            $this->db->where($arrayWhere);
        }
        if ($order) {
            $this->db->order_by($order);
        }
        if ($groupby) {
            $this->db->group_by($groupby);
        }
        if ($arrayJoinTable) {
            foreach ($arrayJoinTable as $key => $value) {
                $this->db->join($key, $value, 'LEFT');
            }
        }
        $query = $this->db->get($tableName);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
}
