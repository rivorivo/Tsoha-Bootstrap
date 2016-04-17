<?php

//yleiset reitit
  $routes->get('/', function() {
    HelloWorldController::index();
  });
  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  $routes->get('/login', function(){
  	UserController::login();
  });
  $routes->post('/login', function(){
    UserController::handle_login();
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
  $routes->get('/resepti/:id/destroy', function($id){
    ReseptitController::destroy($id);
  });
  $routes->post('/resepti/:id/destroy', function($id){
    ReseptitController::destroy($id);
  });
  

