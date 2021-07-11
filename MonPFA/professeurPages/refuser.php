<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysqli_connect("localhost","root","","pfa");
    $query1 = "UPDATE rendez_vous SET statut_rv  = 'demander' WHERE id_binome = $id";
    mysqli_query($link,$query1);
    $q = "SELECT * FROM notification where id_binome = $id";
    if(mysqli_num_rows(mysqli_query($link,$q)) == 0){
        $query2 = "INSERT into  notification (etat,id_binome) VALUES('refuser',$id)";
        mysqli_query($link,$query2);
    }else{
        $query2 = "UPDATE notification SET etat = 'refuser' WHERE id_binome = $id";
        mysqli_query($link,$query2);
    }
    
    header("location: page_prof.php");
}

?>