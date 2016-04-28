<?php

Class Ainekset extends BaseModel {
	public $resepti_id, $raakaaine_id;

	public static function getReseptit($raakaaine_id){
		$query = DB::connection()->prepare('SELECT * FROM ainekset WHERE raakaaine_id = :raakaaine_id');
		$query->execute();
		$rows = $query->fetchAll();
		$reseptit = array();
		if($rows){
		foreach ($rows as $row) {
			$reseptit[]= array(
					'raakaaine_id'=>$row['raakaaine_id'],
					'resepti_id'=>$row['resepti_id']
		);
		return $reseptit;
		}
		}
	}

	public static function getRaakaaineet($resepti_id){
		$query = DB::connection()->prepare('SELECT * FROM ainekset WHERE resepti_id=:resepti_id');
		$query->execute(array('resepti_id'=>$resepti_id));
		$rows = $query->fetchAll();
		$raakaaineet = array();

			foreach ($rows as $row) {
				$raakaaineet= New Ainekset(array(
						'raakaaine_id'=>$row['raakaaine_id'],
						'resepti_id'=>$row['resepti_id']
				));
			}
			return $raakaaineet;
		}

		

		public function save(){
			$query = DB::connection()->prepare('INSERT INTO Ainekset(raakaaine_id, resepti_id) VALUES (:raakaaine_id, :resepti_id)');

			$query = execute(array('raakaaine_id' => $this->raakaaine_id,'resepti_id' => $this->resepti_id));


		}
	
}