<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dok_lembur extends CI_Controller
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
    $this->load->view('dok_lembur/index', $data);
    $this->load->view('template/footer');
  }
}
