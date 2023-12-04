<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
// Auth Controller 
$routes->get('/sign-up', 'Auth::signUp');
$routes->get('/sign-in', 'Auth::signIn');
$routes->post('/login', 'Auth::login');
$routes->post('/create', 'Auth::create');
$routes->get('/logout', 'Auth::logout');



// Home Controller

// Reclamation Controller
$routes->get('/reclame', 'ReclamationController::index', ['filter' => 'auth']);
$routes->post('/reclame/create', 'ReclamationController::create', ['filter' => 'auth']);

$routes->put('/reclame/update/(:num)', 'ReclamationController::update/$1');
$routes->get('/reclame/edit/(:num)', 'ReclamationController::edit/$1');
$routes->get('/reclame/delete/(:num)', 'ReclamationController::delete/$1');

// Send Mail (Decline | Accept)
$routes->get('/send/decline/(:num)', 'MailController::decline/$1');
$routes->get('/send/accept/(:num)', 'MailController::accept/$1');

// List Reclamation Controller
$routes->get('/list-reclame', 'ReclamationController::listreclamation', ['filter' => 'auth']);

#################### RestFul API Resource #########################endregion

$routes->get('/API/listReclamations', 'RestReclamation::index');
