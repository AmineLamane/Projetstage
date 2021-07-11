<?php 
include_once '../adminpages/Class_admin.php';
session_start();
if(empty($_SESSION['admin'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$admin=$_SESSION['admin'];

     
    try{
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=pfa','root','',$pdo_options);
    }
    catch(Exception $e){
        die('Erruer : '.$e->getMessage());
    }
   

    
    

if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'] ) and isset($_POST['nouv_email']) and isset($_POST['nouv_nom'] ) and isset($_POST['nouv_prenom'] ) ){
    // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
    if($_POST['ancienne_mdp'] == $_SESSION['admin']->mdp){
        $stmt = $bdd->prepare("update admin set mdp = ?,email = ?,nom = ?, prenom = ? ");
        $stmt->execute([$_POST['nouveau_mdp'],$_POST['nouv_email'],$_POST['nouv_nom'],$_POST['nouv_prenom']]);
        echo "<script>alert('Le changemement est reussit');</script>";
        $_SESSION['admin']->mdp = $_POST['nouveau_mdp'];
        $_SESSION['admin']->email = $_POST['nouv_email'];
        $_SESSION['admin']->nom = $_POST['nouv_nom'];
        $_SESSION['admin']->prenom = $_POST['nouv_prenom'];
    }
    else{
        echo "<script>alert('Mot de passe incorrecte');</script>";
    }
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>

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
                                            <h2 style="margin-left: 30%">MODIFIER VOS INFORMATIONS </h2>
                                            <form method="post" action="" id="changer_mdp">
                                                <div class="form-group">
                                                    Changer l'adresse email
                                                    <input class="form-control" type="text" name="nouv_email"
                                                        value="<?php echo  $_SESSION['admin']->email ?>">
                                                </div>
                                                <div class="form-group">
                                                    Changer le nom
                                                    <input class="form-control" type="text" name="nouv_nom"
                                                        value="<?php echo  $_SESSION['admin']->nom ?>">
                                                </div>
                                                <div class="form-group">
                                                    Changer le prenom
                                                    <input class="form-control" type="text" name="nouv_prenom"
                                                        value="<?php echo  $_SESSION['admin']->prenom ?>">
                                                </div>
                                                <div class="form-group">
                                                    Ancien mot de passe
                                                    <input class="form-control" type="password" name="ancienne_mdp">
                                                </div>


                                                <div class="form-group">
                                                    Nouveau mot de passe
                                                    <input class="form-control" type="password" name="nouveau_mdp">
                                                </div>


                                                <div class="form-group">
                                                    Confirmation de mot de passe
                                                    <input class="form-control" type="password" name="conf_nouveau_mdp">
                                                </div>

                                                <div class="form-group"></div>
                                                <input class="btn btn-success" type="submit" value="Valider">


                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nonIndexe">
                                            <br>
                                            <div class="panel panel-success">
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
<script src="JS/jquery-1.11.1.js"></script>
<script src="JS/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#changer_mdp").validate({
        rules: {
            ancienne_mdp: {
                required: true
            },
            nouveau_mdp: {
                required: true
            },
            conf_nouveau_mdp: {
                required: true,
                equalTo: "#changer_mdp input[name='nouveau_mdp']"
            }
        },
        messages: {
            conf_nouveau_mdp: {
                equalTo: "la Confirmation est incorrecte"
            }

        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the help-block class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
        }
    });
});
</script>

</html>