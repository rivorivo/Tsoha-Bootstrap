<?php
class Kokkaaja extends BaseModel{
public $id, $username, $password;

public function find($id){
$query = DB::connection()->prepare('SELECT * FROM kokkaajat WHERE id = :id LIMIT 1');
$query->execute(array('id' => $id));
		$row = $query->fetch();
		if($row){
			$kokkaaja= new Kokkaaja(array(
				'id'=>$row['id'],
				'username'=>$row['username'],
				'password'=>$row['password']
				));			
		}
		return $kokkaaja;
}
public function getName($id){
	$query = DB::connection()->prepare('SELECT * FROM kokkaajat WHERE id = :id LIMIT 1');
$query->execute(array('id' => $id));
		$row = $query->fetch();
		if($row){
			$name = $row['username'];
		}
		return $name;
}

public function reseptit($id){
$query = DB::connection()->prepare('SELECT * FROM reseptit WHERE kokkaaja_id = :kokkaaja_id');
	$query->execute(array('kokkaaja_id' => $id));
	$reseptit = $query->fetchAll();
	
	return $reseptit;
}

public function authenticate($username,$password){
	$query = DB::connection()->prepare('SELECT * FROM kokkaajat WHERE username= :username AND password= :password LIMIT 1');
	$query->execute(array('username' => $username, 'password' => $password));
	$row = $query->fetch();
	if($row){
		$kokkaaja = new Kokkaaja(array('id' => $row['id'],'username'=>$row['username'],'password'=>$row['password']));
		return $kokkaaja;
	}else{
	return null;
	}
}
}