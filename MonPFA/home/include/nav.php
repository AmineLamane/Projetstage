<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <!-- <a class="navbar-brand" href="#">GESTION DES PFA</a> -->
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <?php if(!isset($_SESSION["professeur_mail"])) {?>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">GESTION DES PFA <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <?php }
      else{
        ?>
            <li class="nav-item active">
                <a class="nav-link" href="Profile.php">Profile <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>

            <?php } ?>

        </ul>

    </div>
</nav>