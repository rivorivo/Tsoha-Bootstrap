<?php

  class SiteController extends BaseController{
    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('index.html');
    }

  }
