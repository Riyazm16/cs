<?php

class UserDetailsModel extends CI_Model {

    public function insert($tableName, $dataArray) {
        try {
            $this->db->insert($tableName, $dataArray);

            return $this->db->insert_id();
        } catch (Exception $exc) {
            return false;
        }
    }

    public function update($tableName, $dataArray, $whereArray) {
        try {
            $this->db->where($whereArray);
            $this->db->update($tableName, $dataArray);
        } catch (Exception $exc) {
            return false;
        }
    }

}

?>