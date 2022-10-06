<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satker extends CI_Controller
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
    $data['satker'] = $this->db->get('landing_ref_eselon3')->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('satker/index', $data);
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
    $query = "SELECT a.*,b.nama,b.nm_bank,c.nama AS dok FROM data_perubahan a LEFT JOIN ref_pegawai b ON a.nip=b.nip LEFT JOIN ref_dokumen c ON a.dok_id=c.id WHERE a.kdsatker='$kdsatker' AND a.bulan='$bln' AND a.tahun='$thn' ORDER BY a.kdgapok DESC, a.nip ASC";
    $data['perubahan'] = $this->db->query($query)->result_array();

    // view
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('satker/detail', $data);
    $this->load->view('template/footer');
  }
}
