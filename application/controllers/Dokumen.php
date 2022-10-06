<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('judul_model', 'judul');
  }

  public function index()
  {
    // data
    $data['title'] = $this->judul->title();
    $data['dokumen'] = $this->db->get('ref_dokumen')->result_array();
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dokumen/index', $data);
    $this->load->view('template/footer');
  }

  public function add()
  {
    //providing data
    $data['title'] = $this->judul->title();
    // validasi
    $rules = [
      [
        'field' => 'kode',
        'label' => 'Kode',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required|trim'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      //query
      $data = [
        'kode' => htmlspecialchars($this->input->post('kode', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true))
      ];
      $this->db->insert('ref_dokumen', $data);
      redirect('dokumen');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dokumen/add', $data);
    $this->load->view('template/footer');
  }

  public function edit($id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');
    // data
    $data['title'] = $this->judul->title();
    $data['dokumen'] = $this->db->get_where('ref_dokumen', ['id' => $id])->row_array();
    // validasi
    $rules = [
      [
        'field' => 'kode',
        'label' => 'Kode',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nama',
        'label' => 'Nama',
        'rules' => 'required|trim'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      //query
      $data = [
        'kode' => htmlspecialchars($this->input->post('kode', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true))
      ];
      $this->db->update('ref_dokumen', $data, ['id' => $id]);
      redirect('dokumen');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dokumen/edit', $data);
    $this->load->view('template/footer');
  }

  public function delete($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_dokumen', ['id' => $id])) {
      redirect('dokumen');
    }
  }
}
