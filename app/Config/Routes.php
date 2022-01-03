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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');
 //sehingga class library dapat menggunakan method di API
// $routes->group('/library', function ($routes) {
//     $routes->resource("libraryController");
// });
//front search
$routes->post('/sifalibsearch', 'LibraryController::search');
//detail search
$routes->get('/publication-detail/(:any)', 'LibraryController::show/$1');
//signin admin
$routes->get('/signin', 'SigninController::index');
//dashboard admin
$routes->get('/dashboard', 'AdminController::index',['filter' => 'authGuard']);
//search data admin
$routes->post('/search', 'AdminController::search',['filter' => 'authGuard']);
//add new publication view admin
$routes->get('/post-publications', 'AdminController::post_publications_view',['filter' => 'authGuard']);
//add new publications to db admin
$routes->post('/post-publications', 'AdminController::post_publications',['filter' => 'authGuard']);
//detail/view edit publications admin
$routes->get('/detail-publication/(:any)', 'AdminController::edit_publication_view/$1',['filter' => 'authGuard']);
//update data publications to db admin
$routes->post('/update-publication/(:any)', 'AdminController::update_publication/$1',['filter' => 'authGuard']);
//delete data publications from db admin
$routes->get('/delete-publication/(:any)', 'AdminController::delete_publication/$1',['filter' => 'authGuard']);
//Showing PDF
$routes->get('/my-pdf/(:any)', 'AdminController::pdf_view/$1');
//delete subject from db admin
$routes->get('/delete-subject/(:any)', 'AdminController::delete_subject/$1',['filter' => 'authGuard']);
//add new subject view admin
$routes->get('/post-subject', 'AdminController::post_subject_view',['filter' => 'authGuard']);
//add new subject to db
$routes->post('/post-subject', 'AdminController::post_subject',['filter' => 'authGuard']);
//logout from admin dashboard admin
$routes->get('/logout', 'SigninController::logout');
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
