<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/recipes', function(){
  	HelloWorldController::recipe_list();
  });
  $routes->get('/login', function(){
  	HelloWorldController::login();
  });
  $routes->get('/recipes/1', function(){
  	HelloWorldController::recipe_show();
  });
  $routes->get('/recipes/2', function(){
  	HelloWorldController::edit_recipe();
  });
  $routes->get('/home', function(){
  	HelloWorldController::home();
  });