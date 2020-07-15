<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
      }

	public function index()
	{
		$data['query'] = $this->db->get('mahasiswa');
		$data['title'] = "Data Mahasiswa";
		$this->load->view('layout/header',$data);
		$this->load->view('view_mahasiswa');
		$this->load->view('layout/footer');
	}
	
	public function tambah()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'required|max_length[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('ttl', 'TTL', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Tambah Mahasiswa";
			$this->load->view('layout/header',$data);
			$this->load->view('view_tambah');
			$this->load->view('layout/footer');
		} else {
			$data = array(
				'nim' => (int)$this->input->post('nim'),
				'nama_lengkap' => $this->input->post('nama'),
				'kota' => $this->input->post('kota'),
				'ttl' => $this->input->post('ttl')
			);
			$this->db->insert('mahasiswa',$data);
			redirect(base_url());
		}
	}

	public function ubah($nim)
	{
		$this->db->where('nim', $nim);
		$data['query'] = $this->db->get('mahasiswa')->row();
		$data['title'] = "Ubah Mahasiswa";
		$this->load->view('layout/header',$data);
		$this->load->view('view_ubah');
		$this->load->view('layout/footer');
	}

	public function update()
	{
		
		$this->form_validation->set_rules('nim', 'NIM', 'required|max_length[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('ttl', 'TTL', 'required');

		if ($this->form_validation->run() == TRUE) {
			$nim = $this->input->post('nim');
			$data = array(
				'nama_lengkap' => $this->input->post('nama'),
				'kota' => $this->input->post('kota'),
				'ttl' => $this->input->post('ttl')
			);
			$this->db->where('nim', $nim);
			$this->db->update('mahasiswa',$data);
			redirect(base_url());
		} else {
			redirect(base_url());
		}
		
	}
	public function hapus($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
		redirect(base_url());
	}
}
