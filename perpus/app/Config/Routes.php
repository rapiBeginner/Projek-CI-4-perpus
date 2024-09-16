<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Buku
$routes->get('/buku', 'Buku::muncul');
$routes->get('/buku_tmbh', 'Buku::hlm_tambah');
$routes->post('/buku_edit', 'Buku::hlm_edit');
$routes->post('/tambahBuku', 'Buku::tambah');
$routes->post('/editBuku', 'Buku::perbarui');
$routes->delete('/hapusBuku/(:num)', 'Buku::hapus/$1');
//User
$routes->get('/register', 'UserController::index');
$routes->post('/register', 'UserController::register');
$routes->post('/delete_user', 'UserController::hapus');
$routes->get('/data_user', 'UserController::tampil');
$routes->post('/edit_user', 'UserController::hlm_edit');
$routes->post('/editUser', 'UserController::edit');
//Peminjaman
$routes->get('/data_pinjam','ControllerPeminjaman::index');
$routes->get('/pinjam_buku','ControllerPeminjaman::hlm_tambah');
$routes->post('/pinjam_buku','ControllerPeminjaman::pinjam');
$routes->post('/kembali_buku','ControllerPeminjaman::kembali');
$routes->post('/edit_pinjam','ControllerPeminjaman::hlm_edit');
$routes->post('/update_pinjam','ControllerPeminjaman::edit');
$routes->post('/hapus_pinjam','ControllerPeminjaman::hapus');