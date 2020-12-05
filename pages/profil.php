<?php session_start();
if (!isset($_SESSION['login']) and !isset($_SESSION['id'])){header('location:../index.php');}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PHOTOPICS - Profil</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="../css/clean-blog.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
<?php
  include '../fonctions/fonctions.php';
  
//pour updater le login depuis la bdd, et que l'affichage dans la nav et le menu change
  connection_bdd();
  $bdd = connection_bdd();
  $requete = $bdd->prepare('SELECT login FROM utilisateurs WHERE id = :id');
  $requete->execute(array( 'id' => $_SESSION['id']));
  $donnees = $requete->fetchall();
  $bdd=NULL;
  $_SESSION['login'] = $donnees[0]['login'];
  include '../includes/nav-non-connecte.php';
 ?>

<?php
@$login = htmlspecialchars($_POST['login']);
@$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
@$confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
@$original_password = password_hash($_POST['original_password'], PASSWORD_DEFAULT);


        if ( isset($_POST['submit']) )//check bouton submit

              {
                    if ( $_POST['login'] != NULL)// check si login a été rentré// --------------------------------------------------------------changement login--------------------------------------------------------

                          {
                                connection_bdd();// check si loginexiste déjà
                                $bdd = connection_bdd();
                                recherche_login_existant($bdd);
                                $donnees_uilisateur = recherche_login_existant($bdd);
                                $bdd = NULL;

                                if ( @$donnees_uilisateur['login'] == NULL)// pas  de login deja existant, on passe à la suite

                                      {

                                            if ( $original_password != NULL)// on vérifie le password d'origine pour modifier le login

                                                  {
                                                        connection_bdd();
                                                        $bdd = connection_bdd();
                                                        $requete = $bdd->prepare('SELECT password FROM utilisateurs WHERE id = :id');
                                                        $requete->execute(array('id' => $_SESSION['id']));
                                                        $donnees = $requete->fetchall();
                                                        $bdd = NULL;

                                                        if (password_verify($_POST['original_password'], $donnees[0]['password']  ))// si ok, on peut updater le login
                                                                
                                                              {
                                                                connection_bdd();
                                                                $bdd = connection_bdd();
                                                                $requete = $bdd->prepare('UPDATE utilisateurs SET login=:login WHERE id=:id');
                                                                $requete->execute(array('login'=>$login, 'id'=>$_SESSION['id']));
                                                                $bdd = NULL;
                                                                $login_modifie = 'Le login a bien été modifié';
                                                                echo '<meta http-equiv="refresh" content="2;url=profil.php" />';
                                                              }


                                                        else  { $erreur_password = 'Mot de passe incorrect';}


                                                  }
                                          
                                            else  { $saisir_password = 'Veuillez entrer votre mot de passe';}
                                      }    
                          
                          
                                else {$login_deja_pris = 'Ce login est déjà utilisé, veuillez en choisir un autre';}


                          } 

                if (  $_POST['confirm_password'] And $_POST['password'] != NULL )// --------------------------------------------------------------changement password--------------------------------------------------------

                          {
                              if ( preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['password']) )

                                      {
                                              if ( $_POST['confirm_password'] == $_POST['password']  )
                                                    {
                                                      connection_bdd();
                                                      $bdd = connection_bdd();
                                                      $requete = $bdd->prepare('SELECT password FROM utilisateurs WHERE id = :id');
                                                      $requete->execute(array('id' => $_SESSION['id']));
                                                      $donnees = $requete->fetchall();
                                                      $bdd = NULL;

                                                         if (password_verify($_POST['original_password'], $donnees[0]['password']  ))

                                                                  { 
                                                                    connection_bdd();
                                                                    $bdd = connection_bdd();
                                                                    $requete = $bdd->prepare('UPDATE utilisateurs SET password=:password WHERE id=:id');
                                                                    $requete->execute(array('password'=>$password, 'id'=>$_SESSION['id']));
                                                                    $bdd = NULL;
                                                                  
                                                                   $mot_passe_change = 'Votre mot de passe a bien été mis à jour';
                                                                   echo '<meta http-equiv="refresh" content="2;url=profil.php" />';
                                                                  
                                                                  }
                                                        else { $erreur_password = 'Mot de passe incorrect'; }
                                                   
                                                    }
                              
                                              else { $mdp_pas_identiques = ' Les mots de passe ne sont pas identiques';}  
                                              
                                      }    
                              
                              else {$erreur_format_mdp = 'le mot de passe doit contenir entre 8 et 15 caractères, avec au minimum : Une majuscule, un chiffre et un caractère spécial.';}
  

                          }


            // ---------------------------------------cas de mauvaise saisi de formulaire
               if ( $_POST['confirm_password']== NULL AND $_POST['password']== NULL AND $_POST['login'] == NULL  )

                    {$tous_champs_vides = 'Vous n\'avez pas saisi le formulaire correctement';}


               if ( $_POST['confirm_password']== NULL AND $_POST['password']!= NULL )

                    {$tous_champs_vides = 'Vous n\'avez pas saisi le formulaire correctement';}


               if ( $_POST['confirm_password']!= NULL AND $_POST['password']== NULL )

                    {$tous_champs_vides = 'Vous n\'avez pas saisi le formulaire correctement';}
      

                    }



?>





  <!-- Page Header -->

  <header class="masthead vh-100 d-flex align-items-center" style="background-image: url('https://images.unsplash.com/photo-1605445449313-e89bb6d265da?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2061&q=80')">
    <div class="overlay h-100  "></div>
    <div class="container h-100   ">
      <div class="row h-100 ">
        <div class="col-lg-10 h-100 col-md-10 mx-auto w-100  d-flex align-items-center">
          <div class="post-heading  w-100 bg-dark p-3 rounded  ">
          

              <p class="text-center text-primary"><?php if(isset($login_modifie)){echo $login_modifie;}?></p>
              <p class="text-center text-primary"><?php if(isset($mot_passe_change)){echo $mot_passe_change;}?></p>
              <p class="text-center text-danger"><?php if(isset($champs_vides)){echo $champs_vides;}?></p>
              <p class="text-center text-danger"><?php if(isset($login_deja_pris)){echo $login_deja_pris;}?></p>
              <p class="text-center text-danger"><?php if(isset($mdp_pas_identiques)){echo $mdp_pas_identiques;}?></p>
              <p class="text-center text-danger"><?php if(isset($erreur_format_mdp)){echo $erreur_format_mdp;}?></p>
              <p class="text-center text-danger"><?php if(isset($tous_champs_vides)){echo $tous_champs_vides;}?></p>
              
              
              <p class='text-center'>vous êtes connecté en tant que <span class='text-primary'><?php echo $_SESSION["login"];?></span></p>


                <form class=' ' action="profil.php"  method="post" >

                  <div class="form-group mb-5 row d-flex justify-content-between">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Changer votre pseudo :</label>
                    <div class="col-sm-6">
                      <input type="text" name='login' class="form-control">
                    </div>
                  </div>

                  <div class="form-group row d-flex justify-content-between">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Changer votre mot de passe :</label>
                    <div class="col-sm-6">
                      <input type="password" name='password' class="form-control">
                    </div>
                  </div>

                   <div class="form-group mb-5 row d-flex justify-content-between">
                    <label for="inputPassword3" class="col-sm-6 col-form-label">Confirmer le nouveau mot de passe :</label>
                    <div class="col-sm-6">
                      <input type="password" name='confirm_password' class="form-control">
                    </div>
                  </div>

                   <div class="form-group mt-5 d-flex flex-column justify-content-center align-items-center">
                    <label for="inputPassword3" class="col-sm-8 text-center col-form-label">Saisir votre mot de passe actuel :</label>
                    <div class="col-sm-4">
                      <input type="password" name='original_password' class="form-control" required >
                    </div>
                  </div>
                  <p class="text-center text-danger"><?php if(isset($saisir_password)){echo $saisir_password;}?></p>
                  <p class="text-center text-danger"><?php if(isset($erreur_password)){echo $erreur_password;}?></p>
                  
                  <div class="form-group mt-5 row">
                    <div class="col-sm-10 mx-auto d-flex justify-content-center">
                      <button name="submit" type="submit" class="btn text-center btn-primary">Valider les modifications</button>
                    </div>
                  </div>

                </form>






              </div>
          </div>
        </div>
      </div>
    </div>
  </header>



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
