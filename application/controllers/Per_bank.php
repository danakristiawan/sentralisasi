<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Per_bank extends CI_Controller
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
    $data['thn'] = $thn;
    $data['bln'] = $bln;
    $data['tahun'] = $this->db->get('ref_tahun')->result_array();
    $data['bulan'] = $this->db->get('ref_bulan')->result_array();
    $data['title'] = $this->judul->title();

    // data
    $data['bank'] = $this->db->get('ref_bank')->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('per_bank/index', $data);
    $this->load->view('template/footer');
  }

  public function satker($kdsubanak = null, $bln = null, $thn = null)
  {
    // cek
    if (!isset($kdsubanak)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($thn)) redirect('auth/blocked');

    // data
    $data['title'] = $this->judul->title();

    // query
    $kdsubanak = str_replace('%20', ' ', $kdsubanak);
    $query = "SELECT a.*,b.nama AS nmsatker FROM view_per_satker a LEFT JOIN landing_ref_eselon3 b ON a.kdsatker=b.kode WHERE a.bulan='$bln' AND a.tahun='$thn' AND a.kdsubanak='$kdsubanak'";
    $data['satker'] = $this->db->query($query)->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('per_bank/satker', $data);
    $this->load->view('template/footer');
  }

  public function detail($kdsubanak = null, $kdsatker = null, $bln = null, $thn = null)
  {
    // cek
    if (!isset($kdsubanak)) redirect('auth/blocked');
    if (!isset($kdsatker)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($thn)) redirect('auth/blocked');

    // data
    $kdsubanak = str_replace('%20', ' ', $kdsubanak);
    $data['title'] = $this->judul->title();

    // query
    $query = "SELECT a.*,b.nmpeg,b.kdsubanak,c.nama AS dok FROM data_perubahan a LEFT JOIN data_pegawai b ON a.nip=b.nip LEFT JOIN ref_dokumen c ON a.dok_id=c.id WHERE b.kdsubanak='$kdsubanak' AND a.kdsatker='$kdsatker' AND a.bulan='$bln' AND a.tahun='$thn' ORDER BY a.kdgapok DESC, a.nip ASC";
    $data['perubahan'] = $this->db->query($query)->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('per_bank/detail', $data);
    $this->load->view('template/footer');
  }

  public function file($kdsubanak = null, $bln = null, $thn = null)
  {
    // cek
    if (!isset($kdsubanak)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($thn)) redirect('auth/blocked');

    $data = $this->db->get_where('view_detail_bank', ['kdsubanak' => $kdsubanak, 'bulan' => $bln, 'tahun' => $thn])->result_array();
    foreach ($data as $r) {
      $file = $r['file'];
      $url = base_url('assets/files/') . $file;
      $html = '<iframe src="' . $url . '" style="border:none; width: 100%; height: 100%"></iframe>';
      echo $html;
      // header('Content-Type: application/pdf');
      // header("Content-Transfer-Encoding: Binary");
      // header("Content-disposition: attachment; filename=" . $file . "");
      // readfile($url);
    }
  }
}
