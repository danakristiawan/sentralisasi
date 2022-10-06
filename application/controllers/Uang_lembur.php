<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_lembur extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('judul_model', 'judul');
  }

  public function index($thn = null)
  {
    // check id
    if (!isset($thn)) $thn = date('Y');

    // data topbar
    $data['title'] = $this->judul->title();

    // data
    $kdsatker = getSatker();
    $data['thn'] = $thn;
    $data['tahun'] = $this->db->get('ref_tahun')->result_array();
    $query = "SELECT a.*, b.bulan as nmbulan FROM data_uang_lembur a LEFT JOIN ref_bulan b ON a.bulan=b.kode WHERE a.kdsatker='$kdsatker' AND  a.tahun='$thn'";
    $data['lembur'] = $this->db->query($query)->result_array();

    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('uang_lembur/index', $data);
    $this->load->view('template/footer');
  }

  public function add($thn = null)
  {
    //check id
    if (!isset($thn)) redirect('auth/blocked');
    // data
    $data['title'] = $this->judul->title();
    $data['tahun'] = $thn;
    $kdsatker = getSatker();
    $data['bulan'] = $this->db->get('ref_bulan')->result_array();

    // validasi
    $rules = [
      [
        'field' => 'bulan',
        'label' => 'bulan',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'jumlah',
        'label' => 'Jumlah Pegawai',
        'rules' => 'required|trim|numeric'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      // upload file
      $upload_file = $_FILES['file']['name'];
      if ($upload_file) {
        $config['allowed_types'] = '*';
        $config['remove_spaces'] = TRUE;
        $config['max_size']     = '10000';
        $config['upload_path'] = './assets/files/';
        $new_name = $kdsatker . $thn . '-' . $upload_file;
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
          $file = $this->upload->data('file_name');
          $this->db->set('file', $file);
        } else {
          echo $this->upload->display_errors();
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload file gagal, sesuaikan format dan ukuran!</div>');
          redirect('uang-lembur/index/' . $thn . '');
        }
      }
      //query
      $data = [
        'kdsatker' => $kdsatker,
        'bulan' => htmlspecialchars($this->input->post('bulan', true)),
        'tahun' => $thn,
        'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
        'sts' => 0,
        'date_created' => time()
      ];
      $this->db->insert('data_uang_lembur', $data);
      redirect('uang-lembur/index/' . $thn . '');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('uang_lembur/add', $data);
    $this->load->view('template/footer');
  }


  public function delete($thn = null, $id = null)
  {
    //check id
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($id)) redirect('auth/blocked');

    //execute delete
    $data['lembur'] = $this->db->get_where('data_uang_lembur', ['id' => $id])->row_array();
    $old_name = $data['lembur']['file'];
    if ($this->db->delete('data_uang_lembur', ['id' => $id])) {
      unlink('./assets/files/' . $old_name . '');
      redirect('uang-lembur/index/' . $thn . '');
    }
  }

  public function edit($thn = null, $id = null)
  {
    //check id
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($id)) redirect('auth/blocked');
    // data
    $data['title'] = $this->judul->title();
    $data['tahun'] = $thn;
    $kdsatker = getSatker();
    $data['bulan'] = $this->db->get('ref_bulan')->result_array();
    $data['lembur'] = $this->db->get_where('data_uang_lembur', ['id' => $id])->row_array();
    $old_name = $data['lembur']['file'];

    // validasi
    $rules = [
      [
        'field' => 'bulan',
        'label' => 'bulan',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'jumlah',
        'label' => 'Jumlah Pegawai',
        'rules' => 'required|trim|numeric'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      // upload file
      $upload_file = $_FILES['file']['name'];
      if ($upload_file) {
        $config['allowed_types'] = '*';
        $config['remove_spaces'] = TRUE;
        $config['max_size']     = '10000';
        $config['upload_path'] = './assets/files/';
        $new_name = $kdsatker . $thn . '-' . $upload_file;
        $config['file_name'] = $new_name;
        unlink('./assets/files/' . $old_name . '');
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
          $file = $this->upload->data('file_name');
          $this->db->set('file', $file);
        } else {
          echo $this->upload->display_errors();
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload file gagal, sesuaikan format dan ukuran!</div>');
          redirect('uang-lembur/index/' . $thn . '');
        }
      }
      //query
      $data = [
        'kdsatker' => $kdsatker,
        'bulan' => htmlspecialchars($this->input->post('bulan', true)),
        'tahun' => $thn,
        'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
        'sts' => 0,
        'date_created' => time()
      ];
      $this->db->update('data_uang_lembur', $data, ['id' => $id]);
      redirect('uang-lembur/index/' . $thn . '');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('uang_lembur/edit', $data);
    $this->load->view('template/footer');
  }

  public function kirim($thn = null, $id = null)
  {
    //check id
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($id)) redirect('auth/blocked');

    //query
    $data = [
      'sts' => 1,
      'date_sent' => time()
    ];
    $this->db->update('data_uang_lembur', $data, ['id' => $id]);
    redirect('uang-lembur/index/' . $thn . '');
  }
}
