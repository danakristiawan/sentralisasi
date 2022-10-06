<?php

defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . '/html2pdf/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

class Pdf extends Html2Pdf
{
  public function __construct()
  {
    parent::__construct();
  }
}
