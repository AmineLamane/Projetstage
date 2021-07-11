<?php
include_once '../adminpages/Class_admin.php';
session_start();
if(empty($_SESSION['admin'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$admin=$_SESSION['admin'];
if (isset ($_POST['valider']))
{
    
    $con=mysqli_connect("localhost","root","","pfa"); 
    $cin=$_POST['cin'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    
    if( $con->connect_error){
        
        die("connection failed".$con->connect_error);
    }
    $sql = "INSERT INTO professeur(cin,nom,prenom,email,mdp) VALUES('$cin','$nom','$prenom','$email','$password')";
    
    if($con->query($sql)==TRUE){
        
        
        echo  "<script>alert('record update ')</script>";
        
    }
    else {
        
        
        echo " <script>alert('record update error')</script>";
        
        
    }
    $con->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>la PAGE DIRECTEUR</title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" />
    <!-- style CSS     -->
    <link href="CSS/style.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="CSS/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="CSS/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="CSS/navbr.css" rel="stylesheet" />
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
                                        <div id="login">
                                            <h1>l'ajout d'un compte professeur </h1>

                                            <form method="post" action="">
                                                <div class="form-group">cin <input class="form-control" type="text"
                                                        name="cin" /></div>
                                                <div class="form-group">Nom <input class="form-control" type="text"
                                                        name="nom" /> </div>
                                                <div class="form-group">Prenom <input class="form-control" type="text"
                                                        name="prenom" /></div>
                                                <div class="form-group">Adresse email <input class="form-control"
                                                        type="text" name="email" /></div>
                                                <div class="form-group">Mot de passe <input class="form-control"
                                                        type="text" name="password" /></div>
                                                <input class="btn btn-success" type="submit" name="valider"
                                                    value="OK" />
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
                        &copy; 2021 <a href="">ENSIAS-theme</a>
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