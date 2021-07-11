<?php
include_once '../adminpages/Class_admin.php';
session_start();
if(empty($_SESSION['admin'])){
    header("location:http://localhost/MonPFA/home/login.php");
}
$admin=$_SESSION['admin'];
?>

<?php
// ------------------------------------------------------------
// Connection � la Base de Donn�es
// ------------------------------------------------------------
if( !function_exists('my_pdo_connexxion') )
{
    function my_pdo_connexxion()
    {
        // ---------
        $hostname	= 'localhost'; 		// voir h�bergeur ou "localhost" en local
        $database	= 'pfa'; 	// nom de la BdD
        $username	= 'root'; 			// identifiant "root" en local
        $password	= ''; 				// mot de passe (vide en local)
        // ---------
        // connexion � la Base de Donn�es
        try {
            // chaine de connexion (DSN)
            $strConn 	= 'mysql:host='.$hostname.';dbname='.$database.';charset=utf8';	// UTF-8
            $extraParam	= array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,		// rapport d'erreurs sous forme d'exceptions
                PDO::ATTR_PERSISTENT => true, 						// Connexions persistantes
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 	// fetch mode par defaut
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"	// encodage UTF-8
            );
            // Instancie la connexion
            $pdo = new PDO($strConn, $username, $password, $extraParam);
            return $pdo;
        }
        // ---------
        catch(PDOException $e){
            $msg = 'ERREUR PDO connexion...'; die($msg);
            return false;
        }
        // ---------
    }
}
// --------------------------------
$pdo	= my_pdo_connexxion();
// --------------------------------------------------------------
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>AFFICHAGE DES PROJETS PFA</title>

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
    <?php
// --------------------------------
// La requete (exemple) : tous les "objet", class�s par "id".
$query = "SELECT * from professeur;";
  try {
	$pdo_select = $pdo->prepare($query);
	$pdo_select->execute();
	$NbreData = $pdo_select->rowCount();	// nombre d'enregistrements (lignes)
	$rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }
// --------------------------------
// affichage
if ($NbreData != 0) 
{
?>

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
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <i class="pe-7s-next-2" style="margin-left: 40%"></i> Les encadrants
                                                </div>
                                                <div class="panel-body">
                                                    <form action="modification_2.php" method="post">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">

                                                                <thead>
                                                                    <tr>

                                                                        <th>cin</th>
                                                                        <th>nom </th>
                                                                        <th>prenom</th>
                                                                        <th>cocher</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
	// pour chaque ligne (chaque enregistrement)
	foreach ( $rowAll as $row ) 
	{
		// DONNEES A AFFICHER dans chaque cellule de la ligne
?>

                                                                    <tr>

                                                                        <td><?php echo $row['cin']; ?></td>
                                                                        <td><?php echo $row['nom']; ?></td>
                                                                        <td><?php echo $row['prenom']; ?></td>
                                                                        <td><input type="radio" name="cin"
                                                                                value="<?php echo $row['cin'];?>"></td>


                                                                    </tr>

                                                                    <?php
	} // fin foreach
?>
                                                                </tbody>
                                                            </table>
                                                            <?php
} else { ?>
                                                            pas de donn�es � afficher
                                                            <?php
}
?>
                                                            <input class="btn btn-success" type="submit" name="valider"
                                                                value="OK" />
                                                    </form>

                                                </div>


                                            </div>
                                        </div>
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

</html>