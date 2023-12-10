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




// Event Controller
$routes->get('/event', 'EventController::display_event');
$routes->get('/create_event_form', 'EventController::index');
$routes->post('/create_event_form', 'EventController::saveEvent');
$routes->get('deleteEvent/(:num)', 'EventController::deleteEvent/$1');
$routes->get('editEvent/(:num)', 'EventController::editEvent/$1');
$routes->put('updateEvent/(:num)', 'EventController::update/$1');



// Reclamation Controller
$routes->get('/reclame', 'ReclamationController::index', ['filter' => 'auth']);
$routes->post('/reclame/create', 'ReclamationController::create', ['filter' => 'auth']);

$routes->put('/reclame/update/(:num)', 'ReclamationController::update/$1');
$routes->get('/reclame/edit/(:num)', 'ReclamationController::edit/$1');
$routes->get('/reclame/delete/(:num)', 'ReclamationController::delete/$1');



// Send Mail (Decline | Accept)
$routes->get('/send/decline/(:num)', 'MailController::decline/$1');
$routes->post('/send/decline', 'MailController::decline_reclam');
$routes->get('/send/accept/(:num)', 'MailController::accept/$1');

$routes->get('/exportpdf', 'ExportController::exportDatapdf');
$routes->get('/export', 'ExportController::exportData');



// Export Data
// $route['export'] = 'exportController/exportData';

// profile Controller
$routes->get('/profile', 'ProfileController::index');
$routes->post('/profile/edit_info', 'ProfileController::update_info');
$routes->post('/profile/edit_password', 'ProfileController::update_password');
$routes->get('/profile/destroy', 'ProfileController::destroy');
$routes->post('/profile/upload_image', 'ProfileController::upload_image');




// List Reclamation Controller
$routes->get('/list-reclame', 'ReclamationController::listreclamation', ['filter' => 'auth']);

#################### RestFul API Resource #########################endregion

$routes->get('/API/listReclamations', 'RestReclamation::index');
