<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PHOTOPICS - Inscription</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php
 include '../includes/nav-non-connecte.php';
 include '../fonctions/fonctions.php';
 ?>

  <!-- Page Header -->
  <header class="masthead vh-100" style="background-image: url('../img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Rejoingnez l'aventure !</h1>
            <span class="subheading">...et entrez dans un nouveau monde.</span>
            <img class='mt-3' src="../images/drop-down-arrow.png" alt="fleche">
          </div>
        </div>
      </div>
    </div>
  </header>


<?php

@$login = htmlspecialchars($_POST['login']);
@$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
@$confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);

if ( isset($_POST['submit']) )


      {

          if ( $login != NULL    AND      $password != NULL     AND    $confirm_password != NULL      )


            {

                connection_bdd();
                $bdd = connection_bdd();
                recherche_login_existant($bdd);
                $donnees_utilisateurs = recherche_login_existant($bdd);
              

                    if ( $donnees_utilisateurs == TRUE )

                          {
                            $login_deja_pris = 'Login déjà utilisé, veuillez en choisir un autre.';
                            $bdd = NULL;
                          }

                    elseif ($donnees_utilisateurs == NULL AND $_POST['password'] != $_POST['confirm_password'])

                          {
                            $mdp_pas_identiques = 'Les mots de passe ne sont pas identiques.';
                            $bdd = NULL;
                          }

                    elseif ($donnees_utilisateurs == NULL AND $_POST['password'] ==  $_POST['confirm_password'])

                            {

                              if ( strlen($_POST['password']) >= 8 AND strlen($_POST['password']) <= 15 AND preg_match('#[a-z]#',$_POST['password']) AND  preg_match('#[A-Z]#',$_POST['password']) AND  preg_match('#[\W_]#',$_POST['password']) AND  preg_match('#[0-9]#',$_POST['password']) ) 
                                
                                  {
                            
                                    $requete_new_user = $bdd->prepare('INSERT INTO utilisateurs(login, password) VALUES(:login, :password)');
                                    $requete_new_user->execute(array(
                                            'login' => $login,                                                                         
                                            'password' => $password,));
                                            echo 'check-2';
                                             session_start(); 
                                    $_SESSION['inscription_ok'] = 'Vous avez bien été inscrit sur le site';

                                        header('Location: connexion.php');//redirection
                                    
                                  }

                              else 
                              
                                  {
                                    $caract_mdp_non_respecte = 'le mot de passe doit contenir entre 8 et 15 caractères, avec au minimum : Une majuscule, un chiffre et un caractère spécial.';
                                    $bdd = null;
                                  }    

                            }


            }

          else

          {
            // message erreur champs manquants
              $champs_vides = 'Veuiller remplir tous les champs.';
              $bdd = null;
          }

      } 



?>






 <!-- Main Content -->
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <form name="sentMessage" id="contactForm" action="inscription.php" method="post">

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Choisissez votre login</label>
              <input name='login' type="text" class="form-control" placeholder="Choisissez votre login" id="Login" required data-validation-required-message="Veuillez saisir votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
  
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Mot de passe</label>
              <input name='password' type="password" class="form-control" placeholder="Mot de passe" id="password" required  data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Confirmer le mot de passe</label>
              <input name='confirm_password' type="password" class="form-control" placeholder="Confirmer le mot de passe" id="password" required data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <br>
          <p class=' text-center text-danger'>
              <?php  
                      if (@$caract_mdp_non_respecte != NULL) {echo $caract_mdp_non_respecte ;}

                      if (@$champs_vides != NULL) {echo $champs_vides ;}

                      if (@$mdp_pas_identiques != NULL) {echo  $mdp_pas_identiques ;}
            
                      if (@$login_deja_pris != NULL) {echo  $login_deja_pris ;}
              ?>
        </p>
          <div id="success"></div>
          <button name='submit' type="submit" class="btn btn-primary" id="sendMessageButton">C'est parti !</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Main Content -->



  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Littéralement : « peindre avec la lumière ». Le terme plus court de « photo » est très fréquemment utilisé. Dans le cas où l'on parle d'une image photographique, on emploie aussi souvent les termes « image » ou « vue », et, mais de moins en moins depuis l'avènement de la photographie numérique, « tirage » ou « agrandissement ».</p>
        <p>En français, « photographie » est attesté dès 1832 dans le Dictionnaire général de la langue française de François Raymond mais comme « description de l'histoire naturelle qui traite de la lumière »4,7. Le premier emploi connu de photographie comme « technique de représentation de la réalité et de reproduction d'images à l'aide de procédés fondés sur des réactions chimiques à la lumière et de moyens optiques » figure dans les Carnets d'Hercule Florence, à la date du 21 janvier 1834</p>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php
  include '../includes/footer.php';
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>

</html>
