<?php 
include_once '../professeurPages/Class_prof.php';
session_start();
if(empty($_SESSION['professeur'])){
    header('location:http://localhost/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php');
}
$prof=$_SESSION['professeur'];




if (isset ($_POST['valider']))
{
    
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysqli_connect("localhost","root","","pfa");
    $hr = $_POST['heure'];
    $dt = $_POST['date_rv'];
    $dt_r = $dt.','.$hr;
    $query1 = "UPDATE rendez_vous SET statut_rv  = 'rendez_vous', date_rv = '$dt_r' WHERE id_binome = $id";
    mysqli_query($link,$query1);
    $q = "SELECT * FROM notification where id_binome = $id";
    if(mysqli_num_rows(mysqli_query($link,$q)) == 0){
        $query2 = "INSERT into  notification (etat,id_binome) VALUES('accepter',$id)";
        mysqli_query($link,$query2);
    }else{
        $query2 = "UPDATE notification SET etat  = 'accepter' WHERE id_binome = $id";
        mysqli_query($link,$query2);
    }
    //echo " <script>alert('la creation du creneau libre a reussi ')</script>";
    header("location: page_prof.php");
   }
}
       

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>la PAGE ENCADRANT</title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    !-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" />
    <!-- style CSS     -->
    <link href="CSS/style.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="CSS/light-bootstrap-dashboard.css" rel="stylesheet" />
    <link href="https://www.stagiaires.ma/assets/css/plugins/switchery/switchery.css" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="CSS/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="CSS/styleSwitch.css" rel="stylesheet" />
    <link href="CSS/navbr.css" rel="stylesheet" />
    <style>
    /* body {
    
  background-image: url("img/q.png") ;
    
} */
    </style>
</head>

<body>

    <div class="wrapper">
        <!--    alia_gauche-->

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
        <?php
                    $nomPage = basename(__FILE__);
                require 'menu.php'; 
                    ?>



        <div class="main-panel">
            <!-- body -->
            <!-- ## Start : inchengeable -->
            <?php
                $nomPage = basename(__FILE__);
                require 'nav.php'; 
                ?>
            <!-- # End.        -->


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->


                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                        <div id="login">
                                            <h1>ENTRER LA DATE DE DISPONIBILITE </h1>
                                            <form method="post" action="">
                                                <div class="form-group"> la date: <input class="form-control"
                                                        type="text" name="date_rv" /> <br></div>
                                                <div class="form-group">l'heure: <input class="form-control" type="text"
                                                        name="heure" /> <br></div>

                                                <button type="submit" name="valider"
                                                    class="btn btn-success pull-right">Valider</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nonIndexe">
                                            <br>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <i class="fa fa-group  fa-fw"></i> panel 1
                                                </div>
                                                <div class="panel-body">

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                    </nav>
                    <p class="copyright">
                        <h8>____ Ecole Nationale Supérieure d’Informatique et d’Analyse des Systèmes
                            ____________________________________________________________________________________________________________________
                            .</h8> &copy; 2021
                    </p>
                </div>
            </footer>


        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="JS/jquery.3.2.1.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="JS/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>


</body>

<!--   Core JS Files   -->
<script src="JS/jquery.3.2.1.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="JS/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>