<?php
class ReseptitController extends BaseController{
	
  public static function index(){
   
	$reseptit = Resepti::all();
	View::make('resepti/index.html', array('reseptit' => $reseptit));
	}
	public static function create(){
    BaseController::check_logged_in();
		View::make('resepti/uusi.html');
	}

	public static function show($id){
   
    $resepti= Resepti::find($id);
		View::make('resepti/show.html', array('resepti' => $resepti));
	}

  public static function store(){
    BaseController::check_logged_in();
    $params = $_POST;

    $attributes = array(  
      'kokkaaja_id' => $params['kokkaaja_id'],
      'name' => $params['name'],
      'kuvaus' => $params['kuvaus'],
      'lisatty' => $params['lisatty']
    );

    $resepti= new Resepti($attributes);

    $errors=$resepti->errors();

    if(count($errors)==0){
    $resepti->save();
   	//  Redirect::to('/reseptit');
    Redirect::to('/resepti/' . $resepti->id, array('message' => 'Resepti on lisätty!'));
    }else{
    View::make('resepti/uusi.html', array('errors' => $errors, 'attributes'=>$attributes));
  }
  }
  public static function edit($id){
    self::check_logged_in();
    $resepti = Resepti::find($id);
    View::make('resepti/edit.html', array('attributes' => $resepti));
  }

  // Reseptin muokkaaminen (lomakkeen käsittely)
  public static function update($id){
    self::check_logged_in();
    $params = $_POST;

    $attributes = array(
      'id' => $id,
      'kokkaaja_id' => $params['kokkaaja_id'],
      'name' => $params['name'],
      'kuvaus' => $params['kuvaus'],
      'lisatty' => $params['lisatty'],
    );

    // Alustetaan Resepti-olio käyttäjän syöttämillä tiedoilla
    $resepti = new Resepti($attributes);
    $errors = $resepti->errors();

    if(count($errors) > 0){
      View::make('resepti/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      // Kutsutaan alustetun olion update-metodia, joka päivittää reseptin tiedot tietokannassa
      $resepti->update();

      Redirect::to('/reseptit', array('message' => 'Reseptiä on muokattu onnistuneesti!'));
    }
  }

  // Reseptin poistaminen
  public static function destroy($id){
    self::check_logged_in();
    // Alustetaan Resepti-olio annetulla id:llä
    $resepti = new Resepti(array('id' => $id));
    // Kutsutaan Resepti-malliluokan metodia destroy, joka poistaa reseptin sen id:llä
    $resepti->destroy();
    // Ohjataan käyttäjä resepetien listaussivulle ilmoituksen kera
    Redirect::to('/reseptit', array('message' => 'Resepti on poistettu onnistuneesti!'));
  }
}