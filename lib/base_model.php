<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi

      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }
    public function validate_string_length($string, $length){
      $errors= array();

      if($string==''||$string=null){
        $errors[]='Merkkijono ei saa olla tyhjä..';
      }

      
      if(strlen($this->name)<$length){
        $errors[] = 'Merkkijonon tulee olla vähintään kolme merkkiä pitkä..';
      }
      return $errors;
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();
  
      $this->validators=array('validate_name');
      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
        
        $validator_errors[]=$this->{'validate_name'}();
     
        $errors =array_merge($errors, $validator_errors);

      }

      return $this->{'validate_name'}();
    }

  }
