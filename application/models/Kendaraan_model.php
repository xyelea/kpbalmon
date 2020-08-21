<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{

	public function getKendaraan()
	{
		return $this->db->get('kendaraan')->result_array();
	}
	public function hapusKendaraan($id_kendaraan)
	{
		$this->db->where('id', $id_kendaraan);
		$this->db->delete('kendaraan');
	}
}
                        
/* End of file Kendaraan.php */
