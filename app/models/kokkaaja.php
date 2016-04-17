<?php
class Kokkaaja extends BaseModel{
public $id, $username, $password;
public function find($id){
$query = DB::connection()->prepare('SELECT * FROM kokkaajat WHERE id = :id LIMIT 1');
$query->execute(array('id' => $id));
		$row = $query->fetch();
		if($row){
			$kokkaja= new kokkaaja(array(
				'id'=>$row['id'],
				'username'=>$row['username'],
				'password'=>$row['password']
				));			
		}
		return $kokkaaja;
}
public function authenticate($username,$password){
	$query = DB::connection()->prepare('SELECT * FROM kokkaajat WHERE username= :username AND password= :password LIMIT 1');
	$query->execute(array('name' => $name, 'password' => $password));
	$row = $query->fetch();
	if($row){
		$kokkaaja = new Kokkaaja(array('id' => $row['id'],'username'=>$row['username'],'password'=>$row['password']));
		return $kokkaaja;
	}else{
	return null;
	}
}
}