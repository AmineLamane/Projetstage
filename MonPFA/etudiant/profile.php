<?php 
require 'Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
// j'ai stocker l'etudiant connecter dans un objet de type etudiant dans la session.
$etudiant = $_SESSION['etudiant'];
$bdd=fct_bdd();

if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'])){
    // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
    if($_POST['ancienne_mdp'] == $_SESSION['etudiant']->mdp){
        $stmt = $bdd->prepare("UPDATE etudiant set mdp = ? ,email = ?,nom = ?, prenom = ? where cne= ?");
        $stmt->execute([$_POST['nouveau_mdp'],$_POST['nouv_email'],$_POST['nouv_nom'],$_POST['nouv_prenom'],$etudiant->cne]);
        $_SESSION['etudiant']->mdp = $_POST['nouveau_mdp'];
        $_SESSION['etudiant']->email = $_POST['nouv_email'];
        $_SESSION['etudiant']->nom = $_POST['nouv_nom'];
        $_SESSION['etudiant']->prenom = $_POST['nouv_prenom'];
        echo "<script>alert('Le changemement est reussit');</script>";
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

    <title>Profil</title>

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
    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!--fonte obligatoire-->
    <link href="CSS/navb.css" rel="stylesheet" />
    <style>
    /* body {
    
  background-image: url("img/e.jpg") ;
    
} */
    </style>

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
                                <div class="header">
                                <h2 style="margin-left: 44%"> <kbd>PROFILE </kbd></h2>
                                    <p>MODIFIER VOS INFORMATIONS </p>
                                </div>
                                <div class="content">
                                    <div class="content table-responsive table-full-width">
                                        <form method="post" action="" id="changer_mdp">
                                            <div class="form-group">
                                                Changer l'adresse email
                                                <input class="form-control" type="text" name="nouv_email"
                                                    value="<?php echo  $_SESSION['etudiant']->email ?>">
                                            </div>
                                            <div class="form-group">
                                                Changer le nom
                                                <input class="form-control" type="text" name="nouv_nom"
                                                    value="<?php echo  $_SESSION['etudiant']->nom ?>">
                                            </div>
                                            <div class="form-group">
                                                Changer le prenom
                                                <input class="form-control" type="text" name="nouv_prenom"
                                                    value="<?php echo  $_SESSION['etudiant']->prenom ?>">
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
<script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<script src="js/jquery-1.11.1.js"></script>
<script src="js/jquery.validate.js"></script>
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
            // Add the `help-block` class to the error element
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
</script> <!-- Connexion -->

</html>