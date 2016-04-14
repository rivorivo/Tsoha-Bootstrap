<?php
class Resepti extends BaseModel{
	public	$id, $name, $kuvaus, $kokkaaja_id, $lisatty;
	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_string_length');
	}

	public static function all(){
		
		$query = DB::connection()->prepare('SELECT * FROM reseptit');
		$query->execute();
		$rows = $query->fetchAll();
		$reseptit = array();

		foreach ($rows as $row) {
			$reseptit[] = new Resepti(array(
			'id' => $row['id'],
			'name' => $row['name'],
			'kuvaus' => $row['kuvaus'],
			'kokkaaja_id' => $row['kokkaaja_id'],
			'lisatty' => $row['lisatty']
			));
		}
		return $reseptit;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM reseptit WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$resepti = new Resepti(array(
			'id' => $row['id'],
			'nimi' => $row['name'],
			'kuvaus' => $row['kuvaus'],
			'kokkaaja_id' => $row['kokkaaja_id'],
			'lisatty' => $row['lisatty']
			));
		}
		return $resepti;
	}
	 public function save(){
    // Lisätään RETURNING id tietokantakyselymme loppuun, niin saamme lisätyn rivin id-sarakkeen arvon
    $query = DB::connection()->prepare('INSERT INTO Reseptit (kokkaaja_id, name, kuvaus, lisatty) VALUES (:kokkaaja_id, :name, :kuvaus, :lisatty) RETURNING id');
    // Muistathan, että olion attribuuttiin pääse syntaksilla $this->attribuutin_nimi
    $query->execute(array('kokkaaja_id' => $this->kokkaaja_id, 'name' => $this->name, 'kuvaus' => $this->kuvaus, 'lisatty' => $this->lisatty));
    // Haetaan kyselyn tuottama rivi, joka sisältää lisätyn rivin id-sarakkeen arvon
    $row = $query->fetch();
    // Asetetaan lisätyn rivin id-sarakkeen arvo oliomme id-attribuutin arvoksi
    $this->id = $row['id'];
  }
  public function validate_name(){
  	validate_string_length($this->name,3);

  //$errors = array();
  //if($this->name == '' || $this->name == null){
   // $errors[] = 'Nimi ei saa olla tyhjä!';
  //}
  //if(strlen($this->name) < 3){
    //$errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
  //}

  //return $errors;
}

}