<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('judul_model', 'judul');
  }

  public function index()
  {
    // data topbar
    $data['title'] = $this->judul->title();

    // data unit
    $nip = $this->session->userdata('nip');
    $this->db->select('*');
    $this->db->from('ref_eselon2');
    $data['unit'] = $this->db->get()->result_array();

    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/index', $data);
    $this->load->view('template/footer');
  }

  public function add()
  {
    // data topbar
    $data['title'] = $this->judul->title();

    // validasi
    $rules = [
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
        'nama' => htmlspecialchars($this->input->post('nama', true))
      ];
      $this->db->insert('ref_eselon2', $data);
      redirect('unit');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/add', $data);
    $this->load->view('template/footer');
  }

  public function add_2($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // validasi
    $rules = [
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
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'eselon2_id' => $id
      ];
      $this->db->insert('ref_eselon3', $data);
      redirect('unit');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/add_2', $data);
    $this->load->view('template/footer');
  }

  public function add_3($eselon2_id = null, $id = null)
  {
    // cek id
    if (!isset($eselon2_id)) redirect('auth/blocked');
    if (!isset($id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // validasi
    $rules = [
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
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'eselon2_id' => $eselon2_id,
        'eselon3_id' => $id
      ];
      $this->db->insert('ref_eselon4', $data);
      redirect('unit');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/add_3', $data);
    $this->load->view('template/footer');
  }

  public function detail($eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {
    // data topbar
    $data['title'] = $this->judul->title();

    // load data
    $data['eselon2_id'] = $eselon2_id;
    $data['eselon3_id'] = $eselon3_id;
    $data['eselon4_id'] = $eselon4_id;
    if ($eselon2_id && $eselon3_id && $eselon4_id) {
      $data['pegawai'] = $this->db->get_where('ref_pegawai', ['eselon2_id' => $eselon2_id, 'eselon3_id' => $eselon3_id, 'eselon4_id' => $eselon4_id])->result_array();
    } else if ($eselon2_id && $eselon3_id) {
      $data['pegawai'] = $this->db->get_where('ref_pegawai', ['eselon2_id' => $eselon2_id, 'eselon3_id' => $eselon3_id, 'eselon4_id' => null])->result_array();
    } else {
      $data['pegawai'] = $this->db->get_where('ref_pegawai', ['eselon2_id' => $eselon2_id, 'eselon3_id' => null, 'eselon4_id' => null])->result_array();
    }

    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/detail', $data);
    $this->load->view('template/footer');
  }

  public function detail_2($eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {
    // data topbar
    $data['title'] = $this->judul->title();

    // load data
    $data['eselon2_id'] = $eselon2_id;
    $data['eselon3_id'] = $eselon3_id;
    $data['eselon4_id'] = $eselon4_id;
    if ($eselon2_id && $eselon3_id && $eselon4_id) {
      $data['pegawai'] = $this->db->get_where('ref_pegawai', ['eselon2_id' => $eselon2_id, 'eselon3_id' => $eselon3_id, 'eselon4_id' => $eselon4_id])->result_array();
    } else if ($eselon2_id && $eselon3_id) {
      $data['pegawai'] = $this->db->get_where('ref_pegawai', ['eselon2_id' => $eselon2_id, 'eselon3_id' => $eselon3_id, 'eselon4_id' => null])->result_array();
    } else {
      $data['pegawai'] = $this->db->get_where('ref_pegawai', ['eselon2_id' => $eselon2_id, 'eselon3_id' => null, 'eselon4_id' => null])->result_array();
    }

    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/detail_2', $data);
    $this->load->view('template/footer');
  }

  public function add_pegawai($eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {

    // data topbar
    $data['title'] = $this->judul->title();

    // load data
    $data['eselon2_id'] = $eselon2_id;
    $data['eselon3_id'] = $eselon3_id;
    $data['eselon4_id'] = $eselon4_id;
    $data['pegawai'] = [];

    // load pegawai
    if ($this->input->post('keyword')) {
      $keyword = htmlspecialchars($this->input->post('keyword', true));
      $this->db->select('nip,nama');
      $this->db->from('landing_ref_pegawai');
      $this->db->like('nama', $keyword);
      $this->db->or_like('nip', $keyword);
      $query = $this->db->get();
      $data['pegawai'] = $query->result_array();
    }

    //open form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/add_pegawai', $data);
    $this->load->view('template/footer');
  }

  public function addnip()
  {
    $nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
    $eselon2_id = $this->input->post('eselon2_id');
    $eselon3_id = $this->input->post('eselon3_id');
    $eselon4_id = $this->input->post('eselon4_id');

    $data = [
      'nip' => $nip,
      'nama' => $nama,
      'eselon2_id' => $eselon2_id,
      'eselon3_id' => $eselon3_id,
      'eselon4_id' => $eselon4_id
    ];
    $this->db->insert('ref_pegawai', $data);
  }

  public function add_detail($eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {
    // cek id
    if (!isset($eselon2_id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // validasi
    $rules = [
      [
        'field' => 'nip',
        'label' => 'NIP',
        'rules' => 'required|trim|exact_length[18]'
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
        'nip' => htmlspecialchars($this->input->post('nip', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'eselon2_id' => $eselon2_id,
        'eselon3_id' => $eselon3_id,
        'eselon4_id' => $eselon4_id
      ];
      $this->db->insert('ref_pegawai', $data);
      redirect('unit/detail-2/' . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id  . '');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/detail_add', $data);
    $this->load->view('template/footer');
  }

  public function delete($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_eselon2', ['id' => $id])) {
      $this->db->delete('ref_eselon3', ['eselon2_id' => $id]);
      $this->db->delete('ref_eselon4', ['eselon2_id' => $id]);
      $this->db->delete('ref_pegawai', ['eselon2_id' => $id]);
      redirect('unit');
    }
  }

  public function delete_2($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_eselon3', ['id' => $id])) {
      $this->db->delete('ref_eselon4', ['eselon3_id' => $id]);
      $this->db->delete('ref_pegawai', ['eselon3_id' => $id]);
      redirect('unit');
    }
  }

  public function delete_3($id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_eselon4', ['id' => $id])) {
      $this->db->delete('ref_pegawai', ['eselon4_id' => $id]);
      redirect('unit');
    }
  }

  public function delete_detail($id = null, $eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_pegawai', ['id' => $id])) {
      redirect('unit/detail/' . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id  . '');
    }
  }

  public function delete_detail_2($id = null, $eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {
    // cek id
    if (!isset($id)) redirect('auth/blocked');
    // query
    if ($this->db->delete('ref_pegawai', ['id' => $id])) {
      redirect('unit/detail-2/' . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id  . '');
    }
  }

  public function edit($id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // data
    $data['unit'] = $this->db->get_where('ref_eselon2', ['id' => $id])->row_array();

    // validasi
    $rules = [
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
        'nama' => htmlspecialchars($this->input->post('nama', true))
      ];
      $this->db->update('ref_eselon2', $data, ['id' => $id]);
      redirect('unit');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/edit', $data);
    $this->load->view('template/footer');
  }

  public function edit_2($id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // data
    $data['unit'] = $this->db->get_where('ref_eselon3', ['id' => $id])->row_array();

    // validasi
    $rules = [
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
        'nama' => htmlspecialchars($this->input->post('nama', true))
      ];
      $this->db->update('ref_eselon3', $data, ['id' => $id]);
      redirect('unit');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/edit_2', $data);
    $this->load->view('template/footer');
  }

  public function edit_3($id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // data
    $data['unit'] = $this->db->get_where('ref_eselon4', ['id' => $id])->row_array();

    // validasi
    $rules = [
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
        'nama' => htmlspecialchars($this->input->post('nama', true))
      ];
      $this->db->update('ref_eselon4', $data, ['id' => $id]);
      redirect('unit');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/edit_3', $data);
    $this->load->view('template/footer');
  }

  public function edit_detail($id = null, $eselon2_id = null, $eselon3_id = null, $eselon4_id = null)
  {
    // check id
    if (!isset($id)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // data
    $data['bank'] = $this->db->get('ref_bank')->result_array();
    $data['pegawai'] = $this->db->get_where('ref_pegawai', ['id' => $id])->row_array();

    // validasi
    $rules = [
      [
        'field' => 'nm_bank',
        'label' => 'Nama Bank',
        'rules' => 'required|trim'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      //query
      $data = [
        'nm_bank' => htmlspecialchars($this->input->post('nm_bank', true))
      ];
      $this->db->update('ref_pegawai', $data, ['id' => $id]);
      redirect('unit/detail/' . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id  . '');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('unit/edit_detail', $data);
    $this->load->view('template/footer');
  }
}
