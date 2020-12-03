<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PHOTOPICS - Connexion</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation et fonctions utilisateur -->
<?php
 include '../includes/nav-non-connecte.php';
 include '../fonctions/fonctions.php';
 ?>

  
  <!-- test du formulaire -->
<?php


@$login = htmlspecialchars($_POST['login']);
@$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ( isset($_POST['submit']))

      {
          if ($_POST['login'] != NULL AND $_POST['password'] != NULL)// test si les chammps sont remplis

              {

                // si ok, onteste si le login existe
                connection_bdd();
                $bdd = connection_bdd();
                $requete = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = :login');
                $requete->execute(array('login' => $_POST['login']));
                $données_utilisateur = $requete->fetch();
                $bdd = NULL;
              
            

                    if ( $login == @$données_utilisateur['login'] AND password_verify($_POST['password'], $données_utilisateur['password'] ) )//si oui, on teste le password
                    {
                      
                      $_SESSION['login']=$données_utilisateur['login'];
                      $_SESSION['id']=$données_utilisateur['id'];
                 
                      $connexion_reussie = 1;
                    
                    }
                    else {  $erreur_login_mdp = 'Erreur de login ou de mot de passe';}


              }

          else {$champs_manquants = 'Veuillez remplir l\'ensemble des champs';}    
          
      }



?>
  


  <!-- Page Header -->

  <header class="masthead vh-100" style="background-image: url('https://images.unsplash.com/photo-1605388862319-eaf1649edb5a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80')">
    <div class="overlay h-100"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-8 col-md-10 mx-auto h-100">
          <div class="site-heading h-100 d-flex flex-column justify-content-center">
            <h1>Connectez-vous !</h1>
            <span class="subheading">Vous avez des questions ? Nous avons les réponses.</span>
              <div> 
                  <img class='mt-3' src="../images/drop-down-arrow.png" alt="fleche">
              </div>
          </div>
        </div>
      </div>
    </div>
  </header>







<!-- ---------------------------- formulaire html ------------------------------------------- -->


  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

      <?php if ( isset($connexion_reussie))
      {?>
       <p class='text-center text-success'>Connexion reussie, vous allez être redirigé vers la page d'acueil</p>
       <meta http-equiv="refresh" content="2;url=../index.php" />
      <?php
      }
      ?>

        <form name="connexion" id='form1' action="connexion.php#form1"  method="post">
          <p class=" text-center text-primary">
          </p>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Login</label>
              <input type="text" class="form-control" placeholder="Login"  name="login"  data-validation-required-message="Veuillez saisir votre login.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
  
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password"  data-validation-required-message="Veuillez saisir votre mot de passe.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <br>
          <p class='text-center text-danger'><?php  if (isset($erreur_login_mdp)) {echo $erreur_login_mdp;} ?></p>
          <p class='text-center text-danger'><?php  if (isset($champs_manquants)) {echo $champs_manquants;} ?></p>

          <div id="success"></div>
          <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Se connecter</button>
        </form>
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

  <!-- Contact Form JavaScript -->
  <script src="../js/jqBootstrapValidation.js"></script>
  <script src="../js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>

</html>
