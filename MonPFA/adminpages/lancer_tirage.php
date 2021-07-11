<?php   
$matrice = array();
$conn = mysqli_connect('localhost','root','','PFA');
$query = "SELECT classement_sujet,id FROM binome ";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
    //var_dump(($row['classement_sujet']));
    $classement = explode(",", $row['classement_sujet']);
    array_unshift($classement,$row['id']);
    array_push($matrice, $classement);
    
}

function myUnset($list){
    for($i=1; $i<count($list) ; $i++){
        $list[$i] = -1;
    }
    return $list ;
}

function checkin($val, $list) :bool{
    for($i=0; $i<count($list) ; $i++){
        if($list[$i] == $val){
            return true;
        }
    }
    return false;
}

$liste_sujets_affectes = array();

for($j=1; $j< count($matrice[0]) ; $j++){
   
    for($i=0 ; $i< count($matrice) ; $i++){
        
        if (in_array($matrice[$i][$j] , $liste_sujets_affectes, true) or $matrice[$i][$j]==-1 or count($liste_sujets_affectes) >=count($matrice) ){
            continue;
        }
        else{
            $compteur = 0;
            $tab = array($i);
            for($k=0 ; $k<count($matrice) ; $k++){
                if( ($matrice[$i][$j] == $matrice[$k][$j]) and ($k!=$i)){
                    $compteur++;
                    array_push($tab, $k);
                }
            }

            if($compteur==0){
                //this means the row is unique and must be deleted
                if( !in_array($matrice[$i][$j], $liste_sujets_affectes) ){
                    array_push($liste_sujets_affectes, $matrice[$i][$j]);
                    $index = $matrice[$i][$j];
                    $id = $matrice[$i][0];
                    //echo $id.'|';
                    $query1 = "SELECT cin from sujet where id_sujet = '".$index."' ";
                    $result1 = mysqli_query($conn, $query1);
                    $row = mysqli_fetch_assoc($result1);
                    $cin = $row['cin'];
                    $insert = "UPDATE binome set  id_sujet= '".$index."' , cin_enc = '".$cin."' where id = '".$id."' ";
                    $result = mysqli_query($conn, $insert);
                    $matrice[$i] = myUnset($matrice[$i]);
                }
                //SQL COMMAND TO UPDATE THE SUJET
                
                
            }
            else{
                $id = array_rand($tab, 1);
                if( !in_array($matrice[$id][$j], $liste_sujets_affectes) ){
                    array_push($liste_sujets_affectes, $matrice[$id][$j]);
                    $index = $matrice[$id][$j];
                    $idBinome = $matrice[$id][0];
                    //SQL COMMAND TO UPDATE THE SUJET
                    $query1 = "SELECT cin from sujet where id_sujet = '".$index."' ";
                    $result1 = mysqli_query($conn, $query1);
                    $row = mysqli_fetch_assoc($result1);
                    $cin = $row['cin'];
                    
                    $insert = "UPDATE binome set  id_sujet= '".$index."' , cin_enc = '".$cin."' where id = '".$idBinome."' ";
                    $result = mysqli_query($conn, $insert);
                    $matrice[$id] = myUnset($matrice[$id]);
                    for($h=0 ; $h< count($tab) ; $h++){
                        if($tab[$h] != $id){
                            $nvid = array_shift($matrice[ $tab[$h] ]);
                            array_shift($matrice[ $tab[$h] ]);
                            array_unshift($matrice[ $tab[$h] ], $nvid );
                            array_push($matrice[ $tab[$h] ], -1 );
                        }
                    }
                }
                
                
            }
        }
   
        //     
    }
    
}
    $myfile = fopen("check.txt", "w") or die("Unable to open file!");
    $txt = "1";
    fwrite($myfile, $txt);
    fclose($myfile);
    header("location:afficherEtudiants.php");
    

?>