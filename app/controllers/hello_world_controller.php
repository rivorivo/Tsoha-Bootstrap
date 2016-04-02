<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html')
    }

    public static function recipe_list(){
      View::make('suunnitelmat/recipe_list.html')
    }
    public static function recipe_show(){
      View::make('suunnitelmat/recipe_show.html')
    }
    public static function edit_recipe(){
      View::make('suunnitelmat/edit_recipe.html')
    }
     public static function login(){
      View::make('suunnitelmat/login.html')
    }
     public static function home(){
      View::make('suunnitelmat/home.html')
    }
  }
