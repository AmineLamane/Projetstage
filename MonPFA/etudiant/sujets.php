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
}

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Classer les sujets</title>

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
                                        <div class="panel panel-default">
                                        <h2 style="margin-left: 36%"> <kbd>CLASSER LES SUJETS</kbd></h2>
                                            <div class="panel-heading">
                                                <i class="pe-7s-next-2"></i> Glisser pour classer les sujets
                                            </div>
                                            <div class="panel-body">
                                                <form action="" method="post" id="classement">
                                                    <div class="table-responsive ">
                                                        <?php
                                                            $link = mysqli_connect("localhost","root","","pfa");
                                                            $query = "SELECT * FROM binome WHERE cne1 = '".$etudiant->cne."' OR cne1 = '".$etudiant->cne_binome."'";
                                                            $r = mysqli_query($link,$query);
                                                            $numM = mysqli_num_rows($r);
                                                            if($numM != 0){
                                                                $elemt = mysqli_fetch_assoc($r);
                                                                if($elemt['classement_sujet'] != ''){
                                                                    $arr = explode(',',$elemt['classement_sujet']);
                                                                    for($i=1;$i<=count($arr);$i++)
                                                                    {
                                                                        $q2 = "UPDATE sujet SET display_order = ".$i." WHERE id_sujet = ".$arr[$i-1];
                                                                        mysqli_query($link,$q2);
                                                                    }
                                                                }
                                                        }
                                                            $q = "SELECT * FROM sujet ORDER BY display_order ASC";
                                                            $result = mysqli_query($link,$q);
                                                            if(mysqli_num_rows($result)>0)
                                                            {
                                                                ?>
                                                        <table class="table table-hover table-bordered">
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                            </tr>
                                                            <tbody class="sortable">

                                                                <?php
                                                                    while($row=mysqli_fetch_object($result))
                                                                    {
                                                                        ?>
                                                                <tr id="<?php echo $row->id_sujet;?>">
                                                                    <td><?php echo $row->intitule_sujet;?></td>
                                                                    <td><?php echo $row->description_sujet;?></td>
                                                                </tr>
                                                                <?php
                                                                    }
                                                                    ?>
                                                            </tbody>
                                                        </table>
                                                        <?php
                                                            }
                                                            ?>
                                                        <script type="text/javascript">
                                                        $(function() {
                                                            $('.sortable').sortable({
                                                                stop: function() {
                                                                    var ids = '';
                                                                    $('.sortable tr').each(
                                                                        function() {
                                                                            id = $(this).attr(
                                                                                'id');
                                                                            if (ids == '') {
                                                                                ids = id;
                                                                            } else {
                                                                                ids = ids +
                                                                                    ',' + id;
                                                                            }
                                                                        })
                                                                    $.ajax({
                                                                        url: 'save_order.php',
                                                                        data: 'ids=' + ids,
                                                                        type: 'post',
                                                                        success: function() {
                                                                            alert(
                                                                                'ORDRE BIEN ENREGITRE !'
                                                                                );
                                                                        }
                                                                    })
                                                                }
                                                            });
                                                        });
                                                        </script>
                                                    </div>
                                                </form>
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

<!-- Core JS Files   -->
<!-- <script src="js/jquery.3.2.1.min.js" type="text/javascript"></script> -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose  -->
<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- <script src="js/jquery-1.11.1.js"></script>
    <script src="js/jquery.validate.js"></script>    -->

</html>