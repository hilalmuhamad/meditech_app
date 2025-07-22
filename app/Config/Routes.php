<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ...existing routes...

$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/registrasi', 'Registrasi::index');
$routes->post('/registrasi/simpan', 'Registrasi::simpan');
$routes->get('/daftar-pasien', 'DaftarPasien::index');
$routes->get('/jadwal-konsultasi', 'JadwalKonsultasi::index');
$routes->post('/jadwal-konsultasi/simpan', 'JadwalKonsultasi::simpan');
$routes->post('/jadwal-konsultasi/booking/(:num)', 'JadwalKonsultasi::booking/$1');
$routes->get('/rekam-medis', 'RekamMedis::index');
$routes->post('/rekam-medis/simpan', 'RekamMedis::simpan');

$routes->get('profil-pasien/(:num)', 'Registrasi::profil/$1');

$routes->get('profil-pasien/edit/(:num)', 'Registrasi::edit/$1');
$routes->post('profil-pasien/update/(:num)', 'Registrasi::update/$1');
$routes->post('profil-pasien/hapus/(:num)', 'Registrasi::hapus/$1');

// ...existing routes...