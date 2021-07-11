<?php 

include_once '../Classes/MailClasse.php';
require '../PHPMailer/vendor/autoload.php';
require 'Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
else{ 
    $etudiant = $_SESSION['etudiant'];    
    $bdd = fct_bdd();
    $stmt = $bdd->prepare("select * from etudiant where cne = ? ");
    $stmt->execute([$_SESSION['etudiant']->cne_binome]);
    $row=$stmt->fetch();

}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>ESPACE ETUDIANT</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                                        <div class="tab-pane fade in active" id="indexe">
                                            <br>
                                            <div class="panel panel-default">
                                            <h2 style="margin-left: 40%"> <kbd>MON BINOME</kbd></h2>
                                                <div class="panel-heading">
                                                
                                                    <i class="pe-7s-next-2"></i> DES INFORMATIONS SUR VOTRE BINOME
                                                </div>
                                                <div class="panel-body">
                                                    <form action="" method="post">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom </th>
                                                                        <td><?php echo $row['nom']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Prenom</th>
                                                                        <td><?php echo $row['prenom']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Cne</th>
                                                                        <td><?php echo $row['cne']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Adresse email</th>
                                                                        <td><?php echo $row['email']; ?></td>
                                                                    </tr>
                                                                </thead>

                                                            </table>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nonIndexe">
                                            <br>
                                            <div class="panel panel-default">
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