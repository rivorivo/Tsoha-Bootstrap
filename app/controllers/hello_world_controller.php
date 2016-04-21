<?php

  class HelloWorldController extends BaseController{
    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('index.html');
    }

     public static function login(){
      View::make('login.html');
    }
     public static function home(){
      View::make('suunnitelmat/home.html');
    }
    public static function sandbox(){
    $doom = new Resepti(array(
      'name' => 'ee',
      'kuvaus' => 'tomsu',
      'kokkaaja_id' => 'rrrrr',
      'lisatty' => '12.12.2012'
      ));
      $errors = $doom->errors();

      Kint::dump($errors);
    }
  }
