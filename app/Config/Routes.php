<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ======================
// ROUTE UTAMA
// ======================
// Mengarahkan halaman utama ke Home Controller
$routes->get('/', 'Home::index');


// ======================
// ROUTE HALAMAN STATIS
// ======================
// Pastikan Controller "Page" memiliki method about, contact, dan faqs
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');


// ======================
// ROUTE LOGIN & LOGOUT (USER)
// ======================
// Memisahkan GET untuk tampil form dan POST untuk proses login agar lebih aman
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');


// ======================
// ROUTE ADMIN (DENGAN FILTER AUTH)
// ======================
/** * Grup ini diproteksi oleh Filter 'auth'. 
 * Jika belum login, user akan ditendang kembali ke halaman login.
 */
$routes->group('admin', ['filter' => 'auth'], function($routes) {

    // List artikel di dashboard admin
    $routes->get('artikel', 'Artikel::admin_index');

    // Tambah artikel (Tampil form & Proses Simpan)
    $routes->get('artikel/add', 'Artikel::add');
    $routes->post('artikel/add', 'Artikel::add');

    // Edit artikel berdasarkan ID (Tampil form & Proses Update)
    $routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');
    $routes->post('artikel/edit/(:num)', 'Artikel::edit/$1');

    // Hapus artikel berdasarkan ID
    $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');

});


// ======================
// ROUTE ARTIKEL (PUBLIK)
// ======================
// Daftar artikel untuk pengunjung umum
$routes->get('artikel', 'Artikel::index');

// Detail artikel berdasarkan slug (misal: artikel/belajar-codeigniter-4)
$routes->get('artikel/(:segment)', 'Artikel::view/$1');