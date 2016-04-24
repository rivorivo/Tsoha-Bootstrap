 <?php
 class UserController extends BaseController{

public static function kirjautunut(){
    $kokkaaja_logged_in= BaseController::get_user_logged_in();
  return $kokkaaja_logged_in;
}
 	public static function login(){
      View::make('login.html');
    }
    public static function handle_login(){
    	$params = $_POST;

    	   $kokkaaja = Kokkaaja::authenticate($params['username'], $params['password']);

    if(!$kokkaaja){
      View::make('kokkaaja/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['kokkaaja'] = $kokkaaja->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $kokkaaja->username . '!'));
    }
  }
   public static function logout(){
    $_SESSION['kokkaaja'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }
  public function show($id){
     BaseController::check_logged_in();
     $kokkaaja= Kokkaaja::find($id);
     View::make('/kokkaaja/show.html', array('kokkaaja' => $kokkaaja));
  }
}