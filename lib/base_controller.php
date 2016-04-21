<?php

  class BaseController{

    public static function get_user_logged_in(){
    // Katsotaan onko user-avain sessiossa
    if(isset($_SESSION['kokkaaja'])){
      $id = $_SESSION['kokkaaja'];
      // Pyydetään User-mallilta käyttäjä session mukaisella id:llä
      $kokkaaja = Kokkaaja::find($id);

      return $kokkaaja;
    }
    // Käyttäjä ei ole kirjautunut sisään
    return null;
  }
  

    public static function check_logged_in(){
        if(!isset($_SESSION['kokkaaja'])){
          Redirect::to('/login', array('message' => 'Kirjaudu sisään ensin!'));
        }
    }
}
  
