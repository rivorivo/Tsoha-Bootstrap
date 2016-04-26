<?php

Class Rakategoria extends BaseModel{
	public $id, $name;

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name');
	}

	public static function getId($name){		
		$query = DB::connection()->prepare('SELECT * FROM rakategoriat WHERE name = :name LIMIT 1');
	$query->execute(array('name' => $name));
		$row = $query->fetch();
		if($row){
			$id = $row['id'];
			return $id;
		}else{
		return null;
	}
	}
	
	public static function getName($id){

	$query = DB::connection()->prepare('SELECT * FROM rakategoriat WHERE id = :id LIMIT 1');
	$query->execute(array('id' => $id));
		$row = $query->fetch();
		if($row){
			$name = $row['name'];
			return $name;
		}else{
		return null;
		}
	}

	public static function all(){
		
		$query = DB::connection()->prepare('SELECT * FROM rakategoriat ORDER BY name ASC');
		$query->execute();
		$rows = $query->fetchAll();
		$raakaaineet = array();

	foreach ($rows as $row) {
		$rakategoriat[]= array(
				'id'=>$row['id'],
				'name'=>$row['name']
				);
		}
		return $rakategoriat;
	} 
}