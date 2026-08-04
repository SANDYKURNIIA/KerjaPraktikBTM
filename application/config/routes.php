<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
... (Biarkan komentar bawaan CI3 tetap ada) ...
*/

// =========================================================
// LOGIKA PENGECEKAN SUBDOMAIN
// =========================================================
// 1. Ambil host yang diakses (misal: admin.sibatik-web.btmmagang)
$http_host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';

// 2. Pisahkan domain berdasarkan titik (.)
$subdomains = explode('.', $http_host);

// Jika formatnya subdomain (ada 3 bagian atau lebih, misal: admin . sibatik-web . btmmagang)
$subdomain = (count($subdomains) >= 3) ? $subdomains[0] : null;

// =========================================================
// PENGATURAN ROUTING BERDASARKAN SUBDOMAIN
// =========================================================

if ($subdomain === 'admin') {
    // --- ROUTE UNTUK: admin.sibatik-web.btmmagang ---
    $route['default_controller'] = 'Admin';
    
    // (Opsional) Jika ingin semua URL di belakang admin diarahkan ke fungsi dalam Controller Admin
    // Contoh: admin.sibatik-web.btmmagang/dashboard -> masuk ke function dashboard() di class Admin
    $route['(:any)'] = 'Admin/$1'; 

} else {
    // --- ROUTE UNTUK DOMAIN UTAMA (sibatik-web.btmmagang) ---
    
    // Ini adalah rute bawaan Anda yang sebelumnya:
    $route['default_controller'] = 'Home';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;

    $route['LayarPoli/(:any)']  = 'Layar_Poli/poli/$1';
}