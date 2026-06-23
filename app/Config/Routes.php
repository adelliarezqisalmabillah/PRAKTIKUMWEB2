<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ======================
// ROUTE UTAMA
// ======================
// Mengarahkan halaman utama root ke Home Controller
$routes->get('/', 'Home::index');


// ======================
// ROUTE HALAMAN STATIS
// ======================
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');


// ======================
// ROUTE LOGIN & LOGOUT (USER)
// ======================
$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');


// ======================
// ROUTE ADMIN (DENGAN FILTER AUTH)
// ======================
/** * Grup ini diproteksi oleh Filter 'auth'. 
 * Jika belum login, user akan diarahkan kembali ke halaman login.
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
// ROUTE AJAX (PRAKTIKUM 9)
// ======================
// Route khusus untuk memproses data secara asynchronous (AJAX)
$routes->get('ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
// Menggunakan GET untuk menghapus jika di view/script lama menggunakan tautan <a> biasa, 
// atau biarkan kombinasi GET/DELETE agar aman dari segala jenis request AJAX.
$routes->get('ajax/delete/(:num)', 'AjaxController::delete/$1');
$routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1');


// ======================
// ROUTE RESTful API (PRAKTIKUM 10 & 11)
// ======================
// Otomatis mendaftarkan rute CRUD (GET, POST, PUT, DELETE) untuk Post Controller API VueJS
$routes->resource('post');


// ======================
// ROUTE ARTIKEL (PUBLIK) - Ditaruh Paling Bawah
// ======================
// Catatan: Rute berbasis (:segment) harus ditaruh di paling bawah agar tidak memblokir rute url spesifik seperti 'admin' atau 'ajax'
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:segment)', 'Artikel::view/$1');