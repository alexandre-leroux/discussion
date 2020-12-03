<nav class="navbar navbar-expand-lg navbar-light  fixed-top" id="mainNav">

    <div class="container">

    <?php  if(!isset($page_index_php)) { echo '  <a class="navbar-brand" id=\'logo_photopics\' href="../index.php">PHOTOPICS</a> ' ;} ?>
    <?php  if(isset($page_index_php)) { echo ' <a class="navbar-brand" id=\'logo_photopics\' href="index.php">PHOTOPICS</a> ' ; }?>



      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>


      <?php
             if (isset($page_index_php))//modifie les liens selon la page d'origine
             
             {?>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">

            
         
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
            <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link" href="pages/connexion.php">Connexion</a> ' ;} ?>
            <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link text-info" href="pages/profil.php">'. $_SESSION['login'].'</a> ' ; }?>
            </li>
            <li class="nav-item">
            <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link " href="pages/inscription.php">Inscription</a> ' ;} ?>
            <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link text-info" href="pages/deconnexion.php">Déconnexion</a> ' ; }?>
                <!-- <a class="nav-link" href="pages/inscription.php">Inscription</a> -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/discussion.php">Discussion</a>
            </li>
            </ul>
        </div>
        <?php
             }

             else
             {
             ?>
             <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">

            
         
                <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item">
         
                <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link" href="connexion.php">Connexion</a> ' ;} ?>
                <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link text-info" href="profil.php">'. $_SESSION['login'].'</a> ' ; }?>
            </li>
            <li class="nav-item">
            <?php  if(!isset($_SESSION['id'])) { echo '<a class="nav-link " href="inscription.php">Inscription</a> ' ;} ?>
            <?php  if(isset($_SESSION['id'])) { echo '<a class="nav-link text-info" href="deconnexion.php">Déconnexion</a> ' ; }?>
  
            </li>
            <li class="nav-item">
                <a class="nav-link" href="discussion.php">Discussion</a>
            </li>
            </ul>
        </div>
        <?php
             }
             ?>

    </div>

  </nav>