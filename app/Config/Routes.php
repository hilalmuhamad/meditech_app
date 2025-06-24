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
$routes->get('/rekam-medis', 'RekamMedis::index');
$routes->post('/rekam-medis/simpan', 'RekamMedis::simpan');

// ...existing routes...