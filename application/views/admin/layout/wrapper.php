<?php 
// PROTEKSI HALAMAN ADMIN DENGAN FUNGSI CEK LOGIN DI SIMPLE LOGIN
$this->simple_login->cek_login();

// Gabung semua bagian layout jadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');