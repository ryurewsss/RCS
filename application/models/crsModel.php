<?php

class crsModel extends CI_Model
{
    public function getAll($tableName, $getColName = '*', $arrayWhere = '', $order = '', $arrayJoinTable = array(), $groupby = '', $limit = '')
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
        if ($limit) {
            $this->db->limit($limit);
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

    public function add($table, $arrayData)
    {
        $this->db->insert($table, $arrayData);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update($table, $arrayWhere, $arrayData)
    {
        $this->db->where($arrayWhere);
        $this->db->update($table, $arrayData);
    }

    public function softDelete($table, $columnIdName, $rowId, $deleteStatus)
    {
        $data = array(
            $deleteStatus => 2,
        );
        $this->db->where($columnIdName, $rowId);
        $this->db->update($table, $data);
    }

    public function delete($table, $columnIdName, $rowId)
    {
        $this->db->where($columnIdName, $rowId);
        $this->db->delete($table);
    }

    public function deleteOldEmail()
    {
        $sql="DELETE FROM crs_transaction_temp WHERE create_date < (NOW() - INTERVAL 60 MINUTE)";    
        $this->db->query($sql);
    }
   

}
