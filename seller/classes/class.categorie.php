<?php

Class Categorie{
  
  public static function getCategories(){
    
    $categories = array();
    
    Connexion::getInstance()->query("SELECT * FROM categorie ORDER BY name_categorie");
    while($r = Connexion::getInstance()->fetch()){
      $categories[$r['id_categorie']] = $r['name_categorie'];
    }
    
    return $categories;
    
  }
  
}

