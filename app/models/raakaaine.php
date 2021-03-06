<?php

Class Raakaaine extends BaseModel{
	public $id, $rakategoria_id, $name, $sesonkiAlku, $sesonkiLoppu, $kilohinta;

public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name');
	}

	public static function all(){
		
		$query = DB::connection()->prepare('SELECT * FROM raakaaineet ORDER BY name ASC');
		$query->execute();
		$rows = $query->fetchAll();
		$raakaaineet = array();

	foreach ($rows as $row) {
		$raakaaineet[]= array(
				'id'=>$row['id'],
				'rakategoria_id'=>$row['rakategoria_id'],
				'rakategoria'=>Rakategoria::getName($row['rakategoria_id']),
				'name'=>$row['name'],
				'kilohinta'=>$row['kilohinta']
				);
		}
		return $raakaaineet;
	}

	public function find($id){

		$query = DB::connection()->prepare('SELECT * FROM raakaaineet WHERE id = :id LIMIT 1');
		$query->execute(array('id'=>$id)); 
		$row = $query->fetch();
			
			if($row){
			$raakaaine= array(
				'id'=>$row['id'],
				'rakategora_id'=>$row['rakategoria_id'],
				'rakategoria'=>Rakategoria::getName($row['rakategoria_id']),
				'name'=>$row['name'],
				'kilohinta'=>$row['kilohinta']
				);			
		}
		return $raakaaine;
	}
	 
 public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
  			$niminen = DB::connection()->prepare('SELECT * FROM raakaaineet WHERE name = :name LIMIT 1');
		$niminen->execute(array('name' => $this->name) );
		$olemassa = $niminen->fetch();
		if($olemassa){
				Redirect::to('/raakaaineet',array('error' => 'raaka-aine on jo olemassa, uutta ei lisätty!'));
		}

    $query = DB::connection()->prepare('INSERT INTO Raakaaineet (rakategoria_id, name, kilohinta) VALUES (:rakategoria_id, :name, :kilohinta) RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('rakategoria_id'=> $this->rakategoria_id, 'name' => $this->name, 'kilohinta'=> $this->kilohinta));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];
  }

  	public function getName($id){
  		$aine=self::find($id);
  		return $aine['name'];
  	}

    public function update(){
 	$query = DB::connection()->prepare('UPDATE raakaaineet SET rakategoria_id=:rakategoria_id, name=:name, kilohinta=:kilohinta WHERE id = :id ');
 	$query->execute(array('id'=> $this->id, 'rakategoria_id' => $this->rakategoria_id, 'name' => $this->name, 'kilohinta'=> $this->kilohinta));
  }

  public function destroy(){
	$query = DB::connection()->prepare('DELETE FROM raakaaineet WHERE id = :id');
	$query->execute(array('id' => $this->id));
  }

  public function validate_name(){	
  	return $this->{'validate_string_length'}($this->name,3);
}
}