<?php 
    
    require 'Classes.php';
    session_start();
    if(empty($_SESSION['etudiant'])){
        header("location:http://localhost/MonPFA/home/login.php");
    }
    $etudiant = $_SESSION['etudiant'];
    $link = mysqli_connect("localhost","root","","pfa");
    $query1 = "SELECT id FROM binome where cne1= '$etudiant->cne' OR cne2 = '$etudiant->cne'";
    $r1 = mysqli_query($link,$query1);
    $elemt1 = mysqli_fetch_assoc($r1);
    $query2 = "SELECT * FROM rendez_vous where id_binome = '".$elemt1['id']."'";
    $r2 = mysqli_query($link,$query2);
    $elemt2 = mysqli_fetch_assoc($r2);
    if(isset($_POST['demande'])){
        
        $q1 = "UPDATE rendez_vous SET statut_rv = 'en attente' where id_binome = '".$elemt1['id']."'";
        $r1 = mysqli_query($link,$q1);
        header("location: rendez_vous.php");
    }
    


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>ENSIAS Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- style CSS     -->
    <link href="CSS/style.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link href="CSS/navb.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <!-- ## start  : inclure le menu -->
        <?php
            $nomPage = basename(__FILE__);
            require 'menu.php'; 
        ?>
        <!-- # End. -->


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

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="indexe">
                                            <br>
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <?php if($elemt2['statut_rv'] == "demander") :?>
                                                    <form action="" method="post" class="rendez-vous">

                                                        <input class="btn btn-primary" type="submit" name="demande"
                                                            value="Envoyer une demande">
                                                    </form>
                                                    <?php elseif($elemt2['statut_rv'] == "en attente"): ?>
                                                    <label> La demande a ete envoyee , il sera traite par
                                                        vote encadrant ,toute mise a jour sera envoyee via votre adresse
                                                        email </label>
                                                    <?php else: ?>
                                                    <?php
                                                        $dteStart = new DateTime($elemt2['date_rv']);
                                                        //var_dump($dteStart);
                                                        $dteEnd   = new DateTime(date('Y-m-d H:i:s'));
                                                        //var_dump($dteEnd);
                                                        $tab= explode(" ", $elemt2['date_rv']);
                                                        //echo $dteDiff->format("%H:%I:%S");
                                                        if($dteStart > $dteEnd) {
                                                            echo "<label>Votre encadrant a planifie un rendez vous le ".$tab[0]." a  ".$tab[1];

                                                        }else{
                                                            $q1 = "UPDATE rendez_vous SET statut_rv = 'demander', date_rv = '' where id_binome = '".$elemt1['id']."'";
                                                            $r1 = mysqli_query($link,$q1);
                                                            //header("location: notification.php");
                                                        }?>
                                                    <label <?php endif ?> </div>
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
<script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- <script src="js/rendez_vous.js" type="text/javascript"></script> -->

</html>