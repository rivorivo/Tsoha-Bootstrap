<?php

//yleiset reitit
  function check_logged_in(){
    BaseController::check_logged_in();
  }

  $routes->get('/', function() {
    HelloWorldController::index();
  });
  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/home', function(){
  	HelloWorldController::home();
  });

//Reseptien reitit
  $routes->get('/reseptit', function(){
    ReseptitController::index();
  });
  $routes->post('/resepti', function(){
    ReseptitController::store();
  });
  $routes->get('/resepti/uusi', function(){
    ReseptitController::create();
  });
  $routes->get('/resepti/:id', function($id){
    ReseptitController::show($id);
  });
  $routes->get('/resepti/:id/edit', function($id){
    ReseptitController::edit($id);
  });
  $routes->post('/resepti/:id/edit', function($id){
    ReseptitController::edit($id);
  });
  $routes->post('/resepti/:id/destroy', function($id){
    ReseptitController::destroy($id);
  });
    $routes->get('/resepti', 'check_logged_in', function(){
    ReseptitController::index();
  });

$routes->get('/resepti/uusi', 'check_logged_in', function(){
  ReseptitController::create();
});

$routes->get('/resepti/:id', 'check_logged_in', function($id){
  ReseptitController::show($id);
});
//kokkaaja reitit
$routes->post('/logout', function(){
  UserController::logout();
});
$routes->get('/login', function(){
    UserController::login();
});
  $routes->post('/login', function(){
    UserController::handle_login();
});
  $routes->get('/kokkaaja/:id', function($id){
    UserController::show($id);
  });
  //raakaaineiden reitit
   $routes->get('/raakaaineet', function(){
    RaakaaineController::index();
  });
  $routes->post('/raakaaineet', function(){
    RaakaaineController::store();
  });
  $routes->get('/raakaaine/uusi', function(){
    RaakaaineController::create();
  });
  $routes->get('/raakaaine/:id', function($id){
    RaakaaineController::show($id);
  });
  $routes->get('/raakaaine/:id/edit', function($id){
    RaakaaineController::edit($id);
  });
  $routes->post('/raakaaine/:id/edit', function($id){
   RaakaaineController::edit($id);
  });
  $routes->post('/raakaaine/:id/destroy', function($id){
    RaakaaineController::destroy($id);
  });
    $routes->get('/raakaaine', 'check_logged_in', function(){
  RaakaaineController::index();
});

$routes->get('/raakaaine/uusi', 'check_logged_in', function(){
  RaakaaineController::create();
});

$routes->get('/raakaaine/:id', 'check_logged_in', function($id){
  RaakaaineController::show($id);
});