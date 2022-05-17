<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function(){
    echo view('errors/404');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'Auth::index');
$routes->get('/demo', 'Auth::create_admin');
$routes->get('/password', 'Auth::change_password');
//$routes->get('/', 'Dashboard::index',['filter'=>'authfilter']);
$routes->get('/dashboard', 'Dashboard::index',['filter'=>'authfilter']);
$routes->get('/', 'Auth::index');
$routes->get('/mahasiswa', 'Mahasiswa::index',['filter'=>'authfilter']);
$routes->get('/mahasiswa/survei', 'Mahasiswa::survei',['filter'=>'authfilter']);
$routes->get('/mahasiswa/prodi', 'Mahasiswa::prodi',['filter'=>'authfilter']);
$routes->get('/mahasiswa/kipk', 'Mahasiswa::kipk',['filter'=>'authfilter']);
$routes->get('/mahasiswa/prodi', 'Mahasiswa::prodi',['filter'=>'authfilter']);
$routes->get('/mahasiswa/kipk_perubahan_ukt', 'Mahasiswa::kipk_perubahan_ukt',['filter'=>'authfilter']);
$routes->get('/mahasiswa/pembayaran_Mahasiswa', 'Mahasiswa::pembayaran_Mahasiswa',['filter'=>'authfilter']);
$routes->get('/mahasiswa/pembayaran', 'Mahasiswa::pembayaran',['filter'=>'authfilter']);
$routes->get('/mahasiswa/upload_dokumen', 'Mahasiswa::upload_dokumen',['filter'=>'authfilter']);
$routes->get('/mahasiswa/finalisasiData', 'Mahasiswa::finalisasiData',['filter'=>'authfilter']);




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}