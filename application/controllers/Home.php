<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
    $nip = $this->session->userdata('nip');
    $data['user'] = $this->db->query("SELECT a.*, b.name AS role, c.nama as nmsatker FROM system_user a LEFT JOIN system_role b ON a.role_id=b.id LEFT JOIN ref_eselon3 c ON a.satker_id = c.id WHERE a.nip='$nip'")->row_array();
    $data['tahun'] = $this->db->get('ref_tahun')->result_array();
    $data['bulan'] = $this->db->get('ref_bulan')->result_array();

    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('home/index', $data);
    $this->load->view('template/footer');
  }

  public function detail($bln, $thn)
  {
    // data
    if (!isset($thn)) redirect('auth/blocked');
    if (!isset($bln)) redirect('auth/blocked');
    $data['title'] = $this->judul->title();
    $kdsatker = getSatker();

    // query
    $query = "SELECT a.*,b.nama,c.nama AS dok FROM data_perubahan a LEFT JOIN ref_pegawai b ON a.nip=b.nip LEFT JOIN ref_dokumen c ON a.dok_id=c.id WHERE a.kdsatker='$kdsatker' AND a.bulan='$bln' AND a.tahun='$thn' ORDER BY a.kdgapok DESC, a.nip ASC";
    $data['perubahan'] = $this->db->query($query)->result_array();

    // form
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('home/detail', $data);
    $this->load->view('template/footer');
  }
}
