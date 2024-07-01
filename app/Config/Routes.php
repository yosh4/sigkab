<?php

namespace Config;

$routes = Services::routes();

// Mengatur namespace default
$routes->setDefaultNamespace('App\Controllers');

// Controller default yang dipanggil pertama kali saat aplikasi dijalankan
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Routing URL untuk Controller Dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('getdata', 'Dashboard::getdata');

// Routing URL untuk Controller Kecamatan
$routes->get('kecamatan', 'Kecamatan::index');
$routes->get('tambahkecamatan', 'Kecamatan::tambah');
$routes->get('editkecamatan/(:num)', 'Kecamatan::edit/$1');
$routes->get('hapuskecamatan/(:num)', 'Kecamatan::hapus/$1');
$routes->post('simpankecamatan', 'Kecamatan::simpan');
$routes->post('updatekecamatan', 'Kecamatan::update');

// Routing URL untuk Controller desa
$routes->get('desa', 'desa::index');
$routes->get('tambahdesa', 'desa::tambah');
$routes->get('editdesa/(:num)', 'desa::edit/$1');
$routes->get('hapusdesa/(:num)', 'desa::hapus/$1');
$routes->post('simpandesa', 'desa::simpan');
$routes->post('updatedesa', 'desa::update');

// Memuat route tambahan berdasarkan lingkungan jika ada
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
?>
