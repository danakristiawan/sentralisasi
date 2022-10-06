<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
    $data['pegawai'] = $this->db->get('data_pegawai')->result_array();
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('pegawai/index', $data);
    $this->load->view('template/footer');
  }

  public function add()
  {
    //providing data
    $data['title'] = $this->judul->title();
    // validasi
    $rules = [
      [
        'field' => 'kdanak',
        'label' => 'kdanak',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'kdsubanak',
        'label' => 'kdsubanak',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nip',
        'label' => 'nip',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nmpeg',
        'label' => 'nmpeg',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'kdgol',
        'label' => 'kdgol',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nmgol1',
        'label' => 'nmgol1',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'rekening',
        'label' => 'rekening',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'npwp',
        'label' => 'npwp',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nmrek',
        'label' => 'nmrek',
        'rules' => 'required|trim'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      //query
      $data = [
        'kdanak' => htmlspecialchars($this->input->post('kdanak', true)),
        'kdsubanak' => htmlspecialchars($this->input->post('kdsubanak', true)),
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'nmpeg' => htmlspecialchars($this->input->post('nmpeg', true)),
        'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
        'nmgol1' => htmlspecialchars($this->input->post('nmgol1', true)),
        'rekening' => htmlspecialchars($this->input->post('rekening', true)),
        'npwp' => htmlspecialchars($this->input->post('npwp', true)),
        'nmrek' => htmlspecialchars($this->input->post('nmrek', true))
      ];
      $this->db->insert('data_pegawai', $data);
      redirect('pegawai');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('pegawai/add', $data);
    $this->load->view('template/footer');
  }

  public function edit($id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');
    // data
    $data['title'] = $this->judul->title();
    $data['pegawai'] = $this->db->get_where('data_pegawai', ['id' => $id])->row_array();
    // validasi
    $rules = [
      [
        'field' => 'kdanak',
        'label' => 'kdanak',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'kdsubanak',
        'label' => 'kdsubanak',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nip',
        'label' => 'nip',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nmpeg',
        'label' => 'nmpeg',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'kdgol',
        'label' => 'kdgol',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nmgol1',
        'label' => 'nmgol1',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'rekening',
        'label' => 'rekening',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'npwp',
        'label' => 'npwp',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'nmrek',
        'label' => 'nmrek',
        'rules' => 'required|trim'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      //query
      $data = [
        'kdanak' => htmlspecialchars($this->input->post('kdanak', true)),
        'kdsubanak' => htmlspecialchars($this->input->post('kdsubanak', true)),
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'nmpeg' => htmlspecialchars($this->input->post('nmpeg', true)),
        'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
        'nmgol1' => htmlspecialchars($this->input->post('nmgol1', true)),
        'rekening' => htmlspecialchars($this->input->post('rekening', true)),
        'npwp' => htmlspecialchars($this->input->post('npwp', true)),
        'nmrek' => htmlspecialchars($this->input->post('nmrek', true))
      ];
      $this->db->update('data_pegawai', $data, ['id' => $id]);
      redirect('pegawai');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('pegawai/edit', $data);
    $this->load->view('template/footer');
  }

  public function delete($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('data_pegawai', ['id' => $id])) {
      redirect('pegawai');
    }
  }
}
