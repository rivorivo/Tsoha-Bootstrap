 <?php
 class UserController extends BaseController{


 	public static function login(){
      View::make('login.html');
    }
    public static function handle_login(){
    	$params = $_POST;

    	   $user = Kokkaaja::authenticate($params['username'], $params['password']);

    if(!$user){
      View::make('kokkaaja/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['kokkaaja'] = $kokkaaja->id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $kokkaaja->username . '!'));
    }
  }
}