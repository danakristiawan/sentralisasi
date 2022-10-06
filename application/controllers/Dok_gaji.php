<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dok_gaji extends CI_Controller
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
    $data['satker'] = $this->db->get('ref_eselon3')->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dok_gaji/index', $data);
    $this->load->view('template/footer');
  }

  public function detail($kdsatker = null, $bln = null, $thn = null)
  {
    // cek
    if (!isset($kdsatker)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($thn)) redirect('auth/blocked');

    // data
    $data['title'] = $this->judul->title();

    // query
    $query = "SELECT a.*,b.nmpeg,b.kdsubanak,c.nama AS dok FROM data_perubahan a LEFT JOIN data_pegawai b ON a.nip=b.nip LEFT JOIN ref_dokumen c ON a.dok_id=c.id WHERE a.kdsatker='$kdsatker' AND a.bulan='$bln' AND a.tahun='$thn' ORDER BY a.kdgapok DESC, a.nip ASC";
    $data['perubahan'] = $this->db->query($query)->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('dok_gaji/detail', $data);
    $this->load->view('template/footer');
  }

  public function reset($kdsatker = null, $bln = null, $thn = null)
  {
    // cek
    if (!isset($kdsatker)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($thn)) redirect('auth/blocked');

    //query
    $where = [
      'kdsatker' => $kdsatker,
      'bulan' => $bln,
      'tahun' => $thn
    ];
    $this->db->update('data_perubahan', ['sts' => 0], $where);
    $this->db->delete('data_register', $where);
    redirect('dok-gaji/index/' . $thn . '/' . $bln . '');
  }

  public function kirim($kdsatker = null, $bln = null, $thn = null, $jml = 0)
  {
    // cek
    if (!isset($kdsatker)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    if (!isset($thn)) redirect('auth/blocked');

    //query
    $where = [
      'kdsatker' => $kdsatker,
      'bulan' => $bln,
      'tahun' => $thn
    ];
    $data = [
      'kdsatker' => $kdsatker,
      'bulan' => $bln,
      'tahun' => $thn,
      'jumlah' => $jml,
      'date_created' => time()
    ];
    $this->db->update('data_perubahan', ['sts' => 1], $where);
    $this->db->insert('data_register', $data);
    redirect('dok-gaji/index/' . $thn . '/' . $bln . '');
  }
}
