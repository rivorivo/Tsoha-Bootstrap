<?php
class ReseptitController extends BaseController{
	public static function index(){
	$reseptit = Resepti::all();
	View::make('resepti/index.html', array('reseptit' => $reseptit));
	}
	public static function create(){
		View::make('resepti/uusi.html');
	}

	public static function show($id){
		View::make('resepti/show.html');
	}

  public static function store(){
 
    $params = $_POST;

    $resepti = new Resepti(array(
    
      'kokkaaja_id' => $params['kokkaaja_id'],
      'name' => $params['name'],
      'kuvaus' => $params['kuvaus'],
      'lisatty' => $params['lisatty']
    ));

    $resepti->save();
   	//  Redirect::to('/reseptit');
    Redirect::to('/resepti/' . $resepti->id, array('message' => 'Resepti on lisätty!'));
  }
}