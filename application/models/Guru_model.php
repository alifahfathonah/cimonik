<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru_model extends CI_Model
{

    public $table = 'tbl_guru';
    public $id = 'guru_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('guru_id', $q);
	$this->db->or_like('guru_nip', $q);
	$this->db->or_like('guru_nama', $q);
	$this->db->or_like('guru_jenkel', $q);
	$this->db->or_like('guru_tmp_lahir', $q);
	$this->db->or_like('guru_tgl_lahir', $q);
	$this->db->or_like('guru_mapel', $q);
	$this->db->or_like('guru_photo', $q);
	$this->db->or_like('guru_tgl_input', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('guru_id', $q);
	$this->db->or_like('guru_nip', $q);
	$this->db->or_like('guru_nama', $q);
	$this->db->or_like('guru_jenkel', $q);
	$this->db->or_like('guru_tmp_lahir', $q);
	$this->db->or_like('guru_tgl_lahir', $q);
	$this->db->or_like('guru_mapel', $q);
	$this->db->or_like('guru_photo', $q);
	$this->db->or_like('guru_tgl_input', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-03 07:12:52 */
/* http://harviacode.com */