<?php


class ManagerCompteRendu{
    
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    /* ## start : fonction de manipulation de la table des Classements */
    public function fct_findAll(){ /* type tableau des classment */
        $crs = array();
        $result = $this->db->query("select * from compte_rendu");
        
        foreach($result as $row){
            $crs[] = ClasseCompteRendu::construct2($row);
        }
        return $crs;
    }
    
    public function fct_findAllByUser($id_binome){ /* type ClasseSujet */
        $stmt = $this->db->prepare("select * from compte_rendu where id_binome=?");
        $stmt->execute([$id_binome]);
        return $stmt->fetchAll();
    }
    
    public function fct_insert(ClasseCompteRendu $cr){ /* type boolean */
        $stmt = $this->db->prepare("insert into compte_rendu(date_cr, fichier, id_binome, cin) values (?,?,?,?);");
        return($stmt->execute([$cr->date_cr,$cr->fichier,$cr->id_binome,$cr->cin]));
    }
    
    public function fct_update(ClasseCompteRendu $cr){ /* type boolean */
        $stmt = $this->db->prepare("update compte_rendu set fichier=? where id_binome=? and date_cr=?;");
        return $stmt->execute([$cr->fichier,$cr->id_binome,$cr->date_cr]);
    }
    /* # End.*/
    
}