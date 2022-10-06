<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
    $data['bank'] = $this->db->get('ref_bank')->result_array();
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('bank/index', $data);
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
      $this->db->insert('ref_bank', $data);
      redirect('bank');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('bank/add', $data);
    $this->load->view('template/footer');
  }

  public function edit($id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');
    // data
    $data['title'] = $this->judul->title();
    $data['bank'] = $this->db->get_where('ref_bank', ['id' => $id])->row_array();
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
      $this->db->update('ref_bank', $data, ['id' => $id]);
      redirect('bank');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('bank/edit', $data);
    $this->load->view('template/footer');
  }

  public function delete($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_bank', ['id' => $id])) {
      redirect('bank');
    }
  }
}
