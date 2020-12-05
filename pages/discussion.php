<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PHOTOPICS - Discussion</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>


  <!-- Navigation -->
<?php
  include '../includes/nav-non-connecte.php';
  include '../fonctions/fonctions.php';
?>





  <!-- Page Header -->


  <header class="masthead vh-100" style="background-image: url('https://images.unsplash.com/photo-1606291587735-c10b27634c82?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80)">
    <div class="overlay h-100"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading h-100 d-flex flex-column justify-content-center">
            <h1>Enive de partage et d'échanges ?</h1>
            <span class="subheading">...ouvrez la porte, et melez-vous à la discussion !</span>
            <div> 
                  <img class='mt-3' src="../images/drop-down-arrow.png" alt="fleche">
              </div>
          </div>
        </div>
      </div>
    </div>
  </header>

<?php

// si utilisateur non connecté :
if ( !isset($_SESSION['login']) AND !isset($_SESSION['id']) )


  {?>

      <div class="container ">
        <div class="row mt-5 mb-5">
          <div class="col-6 mt-5 mb-5 mx-auto border border-info rounded">
            <p class="text-center text-danger ">Vous devez être connecté pour accéder à la discussion</p>
            <div class="text-center m-3 " >
              <a class="mx-auto text-primary " href="connexion.php">Se connecter</a>
            </div>
          </div>
        </div>
      </div>


<?php
  }



if (isset($_POST['submit']) AND isset($_SESSION['login']) AND isset($_SESSION['id']) )
                              
      {

              if (@$_POST['message']!= NULL ) 

                {
                  $message = htmlspecialchars($_POST['message']);

           
                  connection_bdd();
                  $bdd = connection_bdd();
                  $requete = $bdd->prepare('INSERT INTO messages (message, id_utilisateur,date) VALUES (:message,:id_utilisateur,NOW())');
                  $requete->execute(array(
                    'message'=> $message ,                                                                        
                    'id_utilisateur'=> $_SESSION['id']
                  ));
                  $message_ok = 'message bien envoyé' ;
                }

              else { $manque_message = 'Vous n\'avez pas saisi de message';} 


      }      





if(isset($_SESSION['login']) AND isset($_SESSION['id']) )

    {


          connection_bdd();
          $bdd = connection_bdd();
          $requete = $bdd->query(' SELECT message, DATE_FORMAT(date, "%d/%m/%Y"), login FROM messages INNER JOIN utilisateurs ON messages.id_utilisateur = utilisateurs.id');
          $donnees_messages = $requete->fetchall();
          $bdd = null;
         
          
    ?>

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">

              <table class="table table-striped table-dark w-75">
                <tbody>

                      <?php foreach ($donnees_messages as $key => $value )

                      { 
                            ?> 

                                <tr>
                                  <td id='td_date_login' class='text-info border-top "'>Message posté le : <?php echo  $value['DATE_FORMAT(date, "%d/%m/%Y")']?> par  <?php echo $value['login']?></td>
                                </tr>

                                <tr>
                                  <td id='td_message'> <?php echo $value['message']?> </td>
                                </tr>


                            <?php
                      }

                      ?>

                </tbody>


                
              </table>


              <form class='w-50 mt-5 mb-5' action='discussion.php#ancre_message' method='post'>
     
                <div class="form-group mt-5 mb-5">

                  <label for="text_area" class="text-info">Ecrire une réponse <span id="text_max_140">( 140 caractères max.)</span></label>
                  <textarea id="text_area" name='message' class="form-control"  maxlength="140" rows="3"></textarea>

                  <p class="text-center text-danger"><?php if(isset($manque_message)){echo $manque_message;}?></p>
                  <p class="text-center text-primary"><?php if(isset($message_ok)){echo $message_ok;}?></p>
                </div>

                <button name ='submit' type="submit" class="btn btn-primary mx-auto ">Envoyer</button>

              </form>


    </div>

<?php
    }
    ?>



<div id="ancre_message"></div>

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
