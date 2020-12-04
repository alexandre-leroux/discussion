<?php session_start();
if (!isset($_SESSION['login']) and !isset($_SESSION['id'])){header('location:../index.php');}
echo $_SESSION['login'].'<br>';
echo $_SESSION['id'].'<br>';
?>
<!DOCTYPE html>
<html lang="en">

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

                               echo '<pre>';
                               print_r($donnees) ;
                               echo '</pre>';
  $_SESSION['login'] = $donnees[0]['login'];
 include '../includes/nav-non-connecte.php';

 ?>

<?php


        if ( isset($_POST['submit']))//check bouton submit

              {
                      echo 'submit ok <br>';



                    if ( $_POST['login'] != NULL)// check si login a été rentré

                        {
                          echo 'login ok <br>';
                          if ( $_POST['original_password'] != NULL)// on vérifie le password d'origine pourmodifier le login

                              {
                                echo 'original_password ok <br>';
                                echo $_SESSION['id'].' <br>';

                                connection_bdd();
                                $bdd = connection_bdd();
                                $requete = $bdd->prepare('SELECT password FROM utilisateurs WHERE id = :id');
                                $requete->execute(array(
                                  'id' => $_SESSION['id']
                                ));
                                $donnees = $requete->fetchall();
                                $bdd = null;

                                if(password_verify($_POST['original_password'], $donnees[0]['password']  ))// si ok, on peut updater le login
                                    {
                                      
                                      echo 'password ok bien verifié <br>';
                                      connection_bdd();
                                      $bdd = connection_bdd();
                                      $requete = $bdd->prepare('UPDATE utilisateurs SET login=:login WHERE id=:id');
                                      $requete->execute(array('login'=>$_POST['login'], 'id'=>$_SESSION['id']));
                                      echo 'login changé <br>';
                                    }



                                echo '<pre>';
                                print_r($donnees) ;
                                echo '</pre>';

                                // password_verify($_POST['original_password'], $donnees['password']);
                              }


                        }








              }








?>





  <!-- Page Header -->

  <header class="masthead vh-100 d-flex align-items-center" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay w-100 bg-primary "></div>
    <div class="container w-100 bg-success ">
      <div class="row bg-info">
        <div class="col-lg-10 col-md-10 mx-auto w-100 bg-warning">
          <div class="post-heading bg-dark">




              <p class='text-center'>vous êtes connecté en tant que <span class='text-primary'><?php echo $_SESSION["login"];?></span></p>


                <form action="profil.php"  method="post" >

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
                      <input type="password" name='original_password' class="form-control" >
                    </div>
                  </div>

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
