<?php
include_once '../professeurPages/Class_prof.php';
session_start();
if(empty($_SESSION['professeur'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$prof=$_SESSION['professeur'];

try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=pfa','root','',$pdo_options);
}
catch(Exception $e){
    die('Erruer : '.$e->getMessage());
}
$stmt2 = $bdd->prepare("select * from sujet where id_sujet=? ");
$stmt2->execute([$_POST['id_sujet']]);
$row2=$stmt2->fetch();

$stmt = $bdd->prepare("select * from professeur where cin=? ");
$stmt->execute([$prof->cin]);
$row=$stmt->fetch();

if(isset($_POST['cocher'])){
    $stmt1 = $bdd->prepare("update sujet set intitule_sujet = ? , description_sujet=? where id_sujet=? ");
    if($stmt1->execute([$_POST['intitule_sujet'],$_POST['description_sujet'],$_POST['id_sujet']])){
        echo "<script>alert('Le changemement est reussit');</script>";
        header("location:http://localhost/MonPFA/professeurPages/modifier_projet.php");
        
        
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

    <title>AFFICHAGE DES PROJETS PFA</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
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
    body {

        background-image: url("img/q.png");

    }
    </style>
</head>obligatoire-->
</head>

<body>

    <div class="wrapper">
        <!--    alia_gauche-->
        <!--    alia_gauche-->
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
                                            <<h1 style="margin-left: 30%">MODIFIER PROJET</h1>
                                            <form method="post" action="">
                                                <div class="form-group">intitule sujet<input class="form-control"
                                                        type="text" name="intitule_sujet"
                                                        value="<?php echo $row2['intitule_sujet'];?>" /></div>
                                                <div class="form-group">description sujet <input class="form-control"
                                                        type="text" name="description_sujet"
                                                        value="<?php echo $row2['description_sujet'];?>" /> </div>

                                                <input type="hidden" name="id_sujet"
                                                    value="<?php echo $row2['id_sujet'];?>">
                                                <input class="btn btn-success" type="submit" name="cocher" value="OK" />
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
                    <h8>____ Ecole Nationale Supérieure d’Informatique et d’Analyse des Systèmes ____________________________________________________________________________________________________________________                         .</h8>         &copy; 2021
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