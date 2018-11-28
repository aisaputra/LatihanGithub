<?php
class Dosen_m extends  CI_Model 
{
	function __construct()
	{
		parent:: __construct();
	}


function get_records ($criteria='', $order='', $limit='', $offset=0 )
{
	$this->db->select('*');

	$this->db->from('dosen');

	if ($criteria !='')
		$this->db->where($criteria);

	if ($order !='')
		$this->db->order_by($order);

	if ($limit !='')
		$this->db->limit($limit, $offset);

	$query = $this->db->get();

	return $query;
}

function insert($data)
{
	$query = $this->db->insert('dosen', $data);

	return $query;
}


function update_by_id($data,$id)
{
	$this->db->where("Nid= '$id'");

	$query = $this->db->update('dosen', $data);

	return $query;
}

function update_by_pass($data,$pass)
{
	$this->db->where("Password= '$pass'");

	$query = $this->db->update ('dosen', $data);

	return $query;
}

function delete_by_id($id)
{
	$query = $this->db->delete('dosen', "Nid = '$id'");

	return $query;
}


function opt_Dosen()
{
	$this->db->select('Nid, Nama, Fakultas');
	$this->db->from('dosen');
	$query=$this->db->get();

	foreach ($query->result() as $row) 
	{
		$rowDosen[$row->Nid]=$row->Nama." - ".$row->Fakultas;
	}
	return $rowDosen;
}
}

?>