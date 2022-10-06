<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perubahan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('judul_model', 'judul');
  }

  public function index($thn = null, $bln = null)
  {
    // check id
    if (!isset($thn)) $thn = date('Y');
    if (!isset($bln)) $bln = date('m');

    // data topbar
    $data['title'] = $this->judul->title();

    // data
    $kdsatker = getSatker();
    $data['thn'] = $thn;
    $data['bln'] = $bln;
    $data['tahun'] = $this->db->get('ref_tahun')->result_array();
    $data['bulan'] = $this->db->get('ref_bulan')->result_array();
    $query = "SELECT a.*,b.nmpeg AS nama,c.nama AS dok FROM data_perubahan a LEFT JOIN data_pegawai b ON a.nip=b.nip LEFT JOIN ref_dokumen c ON a.dok_id=c.id WHERE a.kdsatker='$kdsatker' AND a.bulan='$bln' AND a.tahun='$thn' ORDER BY a.kdgapok DESC, a.nip ASC";
    $data['perubahan'] = $this->db->query($query)->result_array();
    $data['kode'] = $this->db->get_where('data_register', ['kdsatker' => $kdsatker, 'bulan' => $bln, 'tahun' => $thn])->row_array();

    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('perubahan/index', $data);
    $this->load->view('template/footer');
  }

  public function add_pegawai($thn = null, $bln = null)
  {
    // cek thn
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');

    // data topbar
    $data['title'] = $this->judul->title();

    // load data
    $data['tahun'] = $thn;
    $data['bulan'] = $bln;
    $data['kdsatker'] = getSatker();
    $data['pegawai'] = [];

    // load pegawai
    if ($this->input->post('keyword')) {
      $keyword = htmlspecialchars($this->input->post('keyword', true));
      $this->db->select('nip,nmpeg AS nama');
      $this->db->from('data_pegawai');
      $this->db->like('nmpeg', $keyword);
      $this->db->or_like('nip', $keyword);
      $query = $this->db->get();
      $data['pegawai'] = $query->result_array();
    }

    //open form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('perubahan/add_pegawai', $data);
    $this->load->view('template/footer');
  }

  public function addnip()
  {
    $tahun = $this->input->post('tahun');
    $bulan = $this->input->post('bulan');
    $kdsatker = $this->input->post('kdsatker');
    $nip = $this->input->post('nip');

    $data = [
      'tahun' => $tahun,
      'bulan' => $bulan,
      'kdsatker' => $kdsatker,
      'nip' => $nip
    ];

    $this->db->insert('data_perubahan', $data);
  }

  public function delete($thn = null, $bln = null, $id = null)
  {
    //check id
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($id)) redirect('auth/blocked');

    //execute delete
    if ($this->db->delete('data_perubahan', ['id' => $id])) {
      redirect('perubahan/index/' . $thn . '/' . $bln . '');
    }
  }

  public function edit($thn = null, $bln = null, $id = null)
  {
    //check id
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($id)) redirect('auth/blocked');
    // data
    $data['title'] = $this->judul->title();
    $data['tahun'] = $thn;
    $data['bulan'] = $bln;
    $kdsatker = getSatker();
    $data['dokumen'] = $this->db->get('ref_dokumen')->result_array();
    $data['perubahan'] = $this->db->query("SELECT a.*, b.nmpeg AS nama FROM data_perubahan a LEFT JOIN data_pegawai b ON a.nip=b.nip WHERE a.id='$id'")->row_array();
    $nip = $data['perubahan']['nip'];
    $old_name = $data['perubahan']['file'];

    // validasi
    $rules = [
      [
        'field' => 'no',
        'label' => 'Nomor',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'tgl',
        'label' => 'Tanggal',
        'rules' => 'required|trim'
      ],
      [
        'field' => 'uraian',
        'label' => 'Uraian',
        'rules' => 'required|trim|max_length[255]'
      ],
      // [
      //   'field' => 'kdgapok',
      //   'label' => 'Kode Gaji Pokok',
      //   'rules' => 'required|trim|exact_length[4]'
      // ],
      [
        'field' => 'tmt',
        'label' => 'TMT',
        'rules' => 'required|trim'
      ]
    ];
    $validation = $this->form_validation->set_rules($rules);
    if ($validation->run()) {
      // upload file
      $upload_file = $_FILES['file']['name'];
      if ($upload_file) {
        $config['allowed_types'] = 'pdf';
        $config['remove_spaces'] = TRUE;
        $config['max_size']     = '10000';
        $config['upload_path'] = './assets/files/';
        $new_name = $kdsatker . $bln . $thn . $nip . '-' . $upload_file;
        $config['file_name'] = $new_name;
        unlink('./assets/files/' . $old_name . '');
        $this->load->library('upload', $config);


        if ($this->upload->do_upload('file')) {
          $file = $this->upload->data('file_name');
          $this->db->set('file', $file);
        } else {
          echo $this->upload->display_errors();
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload file gagal, sesuaikan format dan ukuran!</div>');
          redirect('perubahan/index/' . $thn . '/' . $bln . '');
        }
      }
      //query
      $data = [
        'dok_id' => htmlspecialchars($this->input->post('dok_id', true)),
        'no' => htmlspecialchars($this->input->post('no', true)),
        'tgl' => strtotime(htmlspecialchars($this->input->post('tgl', true))),
        'uraian' => htmlspecialchars($this->input->post('uraian', true)),
        // 'kdgapok' => htmlspecialchars($this->input->post('kdgapok', true)),
        'tmt' => strtotime(htmlspecialchars($this->input->post('tmt', true))),
        'date_created' => time()
      ];
      $this->db->update('data_perubahan', $data, ['id' => $id]);
      redirect('perubahan/index/' . $thn . '/' . $bln . '');
    }
    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('perubahan/edit', $data);
    $this->load->view('template/footer');
  }

  public function kirim($thn = null, $bln = null)
  {
    // cek thn
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');

    // query
    $kdsatker = getSatker();
    $jml = $this->db->query("SELECT kdsatker,bulan,tahun,COUNT(nip) AS jumlah FROM data_perubahan WHERE kdsatker='$kdsatker' AND bulan='$bln' AND tahun='$thn' GROUP BY kdsatker,bulan,tahun")->row_array();
    if (!$jml) {
      $jumlah = 0;
    } else {
      $jumlah = $jml['jumlah'];
    }
    $data = [
      'sts' => '1'
    ];
    $register = [
      'kdsatker' => $kdsatker,
      'bulan' => $bln,
      'tahun' => $thn,
      'jumlah' => $jumlah,
      'date_created' => time()
    ];
    $where = [
      'bulan' => $bln,
      'tahun' => $thn,
      'kdsatker' => $kdsatker
    ];
    $this->db->update('data_perubahan', $data, $where);
    $this->db->insert('data_register', $register);
    redirect('perubahan/index/' . $thn . '/' . $bln . '');
  }

  public function cetak($thn = null, $bln = null)
  {
    // cek thn
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');

    // query
    $kdsatker = getSatker();
    $data['profil'] = $this->db->get_where('gaji_ref_profil', ['kdsatker' => $kdsatker])->row_array();
    $query = "SELECT a.*,b.nmpeg AS nama,c.nama AS dok FROM data_perubahan a LEFT JOIN data_pegawai b ON a.nip=b.nip LEFT JOIN ref_dokumen c ON a.dok_id=c.id WHERE a.kdsatker='$kdsatker' AND a.bulan='$bln' AND a.tahun='$thn' ORDER BY a.kdgapok DESC, a.nip ASC";
    $data['perubahan'] = $this->db->query($query)->result_array();
    $data['bulan'] = $this->db->get_where('ref_bulan', ['kode' => $bln])->row_array();
    $data['tahun'] = $thn;

    //cetak
    ob_start();
    $this->load->view('laporan/header', $data);
    $this->load->view('laporan/rincian', $data);
    $html = ob_get_clean();
    $html2pdf = new Pdf('P', 'A4', 'en', false, 'UTF-8', array(20, 10, 20, 10));
    $html2pdf->pdf->SetTitle('Register Perubahan');
    $html2pdf->writeHTML($html);
    $html2pdf->output('Register Perubahan.pdf');
  }
}
