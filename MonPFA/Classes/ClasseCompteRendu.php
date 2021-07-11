<?php

class ClasseCompteRendu{
    public $date_cr;
    public $fichier;
    public $cin;
    public $id_binome;
    
    public static function construct2(array $row){
        $cr = new self();
        $cr->date_cr = $row['date_cr'];
        $cr->fichier = $row['fichier'];
        $cr->cin = $row['cin'];
        $cr->id_binome = $row['id_binome'];
        return $cr;
    }
    
    public static function construct3($date_cr, $fichier, $cin, $id_binome){
        $cr = new self();
        $cr->date_cr = $date_cr;
        $cr->fichier = $fichier;
        $cr->cin = $cin;
        $cr->id_binome = $id_binome;
        return $cr;
    }
    
}