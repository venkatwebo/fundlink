<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Common_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getTableData($select = NULL, $table = NULL, $join = array(),  $where = array(), $where_in = array(), $like = array(), $group = array(), $order = array(), $limit = array())
    {
        if ($select != NULL) {
            $this->db->select($select);
        }

        if ($table != NULL) {
            $this->db->from($table);
        }

        if (!empty($where)) {
            foreach ($where as $key => $filters) {
                if (is_array($filters) && !empty($filters)) {
                    if ($key == "or_where") {
                        $this->db->or_where($filters);
                    } else {
                        $this->db->where($filters);
                    }
                } else {
                    $this->db->where($key, $filters);
                }
            }
        }

        if (!empty($where_in)) {
            foreach ($where_in as $key => $filters) {
                if (is_array($filters) && !empty($filters)) {
                    foreach ($filters as $in => $f) {
                        if (is_array($f)) {
                            if ($key == "or_where_in") {
                                $this->db->or_where_in($in, $f);
                            } elseif ($key == "or_where_not_in") {
                                $this->db->or_where_not_in($in, $f);
                            } elseif ($key == "where_in") {
                                $this->db->where_in($in, $f);
                            }
                        }
                    }
                }
            }
        }

        if (!empty($like)) {
            foreach ($like as $key => $l) {
                if (is_array($l) && !empty($l)) {
                    foreach ($l as $lindex => $lvalue) {
                        if ($key == "like") {
                            $this->db->like($lindex, $lvalue);
                        } elseif ($key == "or_like") {
                            $this->db->or_like($lindex, $lvalue);
                        } elseif ($key == "not_like") {
                            $this->db->not_like($lindex, $lvalue);
                        } elseif ($key == "or_not_like") {
                            $this->db->or_not_like($lindex, $lvalue);
                        }
                    }
                }
            }
        }

        if (!empty($limit)) {
            if (is_array($limit)) {
                foreach ($limit as $limitval => $offset) {
                    $this->db->limit($limitval, $offset);
                }
            }
        }

        if (!empty($group)) {
            $this->db->group_by($group);
        }

        if (!empty($order)) {
            foreach ($order as $key => $value) {
                if (is_array($value)) {
                    foreach ($order as $orderby => $orderval) {
                        $this->db->order_by($orderby, $orderval);
                    }
                } else {
                    $this->db->order_by($key, $value);
                }
            }
        }

        if (!empty($join)) {
            foreach ($join as $key => $value) {
                if (is_array($value)) {
                    $jn = "inner";
                    foreach ($value as $key1 => $value1) {
                        if ($key1 == "left" && $value1 == TRUE)
                            $jn = "left";
                        else
                            $this->db->join($key1, $value1, $jn);
                    }
                } else {
                    $this->db->join($key, $value);
                }
            }
        }

        $result = $this->db->get();

        return $result;
    }

    public function insertTableData($table = NULL,  $data = array())
    {
        $this->db->trans_start();

        $this->db
            ->insert($table, $data);
        $last_id = $this->db->insert_id();

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = FALSE; //Unable to insert $table
        } else {
            if ($this->db->affected_rows() > 0) {
                $response = $last_id; //Table inserted successfully
            } else {
                $response = $last_id; //No changes done.
            }
        }

        return $response;
    }

    public function insertBatchTableData($table = NULL,  $data = array())
    {
        $this->db->trans_start();

        $this->db
            ->insert_batch($table, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = FALSE; //Unable to insert $table
        } else {
            if ($this->db->affected_rows() > 0) {
                $response = TRUE; //Table inserted successfully
            } else {
                $response = TRUE; //No changes done.
            }
        }

        return $response;
    }

    public function updateTableData($table = NULL, $where = array(), $data = array())
    {
        $this->db->trans_start();

        $this->db
            ->where($where)
            ->update($table, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = FALSE; //Unable to update $table
        } else {
            if ($this->db->affected_rows() > 0) {
                $response = TRUE; //Table updated successfully
            } else {
                $response = TRUE; //No changes done.
            }
        }

        return $response;
    }

    public function deleteTableData($table = NULL, $where = array())
    {
        $this->db->trans_start();

        $this->db
            ->where($where)
            ->delete($table);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = FALSE; //Unable to delete $table row
        } else {
            if ($this->db->affected_rows() > 0) {
                $response = TRUE; //Table deleted successfully
            } else {
                $response = TRUE; //No changes done.
            }
        }

        return $response;
    }

    public function manualQuery($sql)
    {
        $result = $this->db->query($sql);

        return $result;
    }

    public function test()
    {
        return "working";
    }
}
                        
/* End of file common.php */
