<?php
class Resepti extends BaseModel{
	public	$id, $name, $kuvaus, $kokkaaja_id, $lisatty;
	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_name');
	}

	public static function all(){
		
		$query = DB::connection()->prepare('SELECT * FROM reseptit ORDER BY name ASC');
		$query->execute();
		$rows = $query->fetchAll();
		$reseptit = array();

		foreach ($rows as $row) {			
			
			$reseptit[] = array(
			'id' => $row['id'],
			'name' => $row['name'],
			'kuvaus' => $row['kuvaus'],
			'kokkaajaNimi' => Kokkaaja::getName($row['kokkaaja_id']),	
			'kokkaaja_id' => $row['kokkaaja_id'],		
			'lisatty' => $row['lisatty']
			
			);
		}

		return $reseptit;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM reseptit WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$resepti =  array(
			'id' => $row['id'],
			'name' => $row['name'],
			'kuvaus' => $row['kuvaus'],
			'kokkaajaNimi' => Kokkaaja::getName($row['kokkaaja_id']),
			'kokkaaja_id' => $row['kokkaaja_id'],	
			'lisatty' => $row['lisatty']
			);
			
		}
		return $resepti;
	}

	 public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('INSERT INTO Reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES (:kokkaaja_id, :name, :kuvaus, :lisatty) RETURNING id');

    $query->execute(array('kokkaaja_id' => $this->kokkaaja_id, 'name' => $this->name, 'kuvaus' => $this->kuvaus, 'lisatty' => $this->lisatty));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];
  }

  public function update(){

 	$query = DB::connection()->prepare('UPDATE reseptit SET kokkaaja_id=:kokkaaja_id, name=:name, kuvaus=:kuvaus, lisatty=:lisatty WHERE id = :id');

 	$query->execute(array('id'=>$this->id, 'kokkaaja_id' => $this->kokkaaja_id, 'name' => $this->name, 'kuvaus' => $this->kuvaus, 'lisatty' => $this->lisatty));
  }

  public function destroy(){
	$query = DB::connection()->prepare('DELETE FROM reseptit WHERE id = :id');
	$query->execute(array('id' => $this->id));
  }

  public function validate_name(){	
  	return $this->{'validate_string_length'}($this->name,3);
}

}