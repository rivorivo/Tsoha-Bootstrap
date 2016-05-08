<?php
class RaakaaineController extends BaseController{
		
  public static function index(){
  BaseController::check_logged_in();
	$raakaaineet = Raakaaine::all();
	View::make('raakaaine/index.html', array('raakaaineet' => $raakaaineet));
	}
	public static function create(){
    BaseController::check_logged_in();
		View::make('raakaaine/uusi.html');
	}

	public static function show($id){
    BaseController::check_logged_in();
    $raakaaine= Raakaaine::find($id);
		View::make('raakaaine/show.html', array('raakaaine' => $raakaaine));
	}

  public static function store(){
    BaseController::check_logged_in();
    $params = $_POST;

   
    $attributes = array(  
		'rakategoria_id'=>Rakategoria::getId($params['rakategoria']),
		'name'=>$params['name'],
		'kilohinta'=>$params['kilohinta']
    );

   
    $raakaaine= new Raakaaine($attributes);

    $errors=$raakaaine->errors();

    if(count($errors)==0){
    $raakaaine->save();
   	//  Redirect::to('/reseptit');
    Redirect::to('/raakaaine/' . $raakaaine->id, array('message' => 'Raakaaine on lisätty!'));
    }else{
    View::make('raakaaine/uusi.html', array('errors' => $errors, 'attributes'=>$attributes));
  }
  }
  public static function edit($id){
    self::check_logged_in();
    $raakaaine = Raakaaine::find($id);
   
    View::make('raakaaine/edit.html', array('attributes' => $raakaaine));
  }

  // Reseptin muokkaaminen (lomakkeen käsittely)
  public static function update($id){
    self::check_logged_in();
    $params = $_POST;

    $attributes = array( 
    'id'=>$id, 
		'rakategoria_id'=>Rakategoria::getId($params['rakategoria']),
		'name'=>$params['name'],
		'kilohinta'=>$params['kilohinta']
    );


    $raakaaine = new Raakaaine($attributes);
    $errors = $raakaaine->errors();

    if(count($errors) > 0){
      View::make('raakaaine/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $raakaaine->update();

      Redirect::to('/raakaaineet', array('message' => 'Raakaainetta on muokattu onnistuneesti!'));
    }
  }


  public static function destroy($id){
    self::check_logged_in();
    $raakaaine = new Raakaaine(array('id' => $id));
    $raakaaine->destroy();
    Redirect::to('/raakaaineet', array('message' => 'Raakaaine on poistettu onnistuneesti!'));
  }
}
