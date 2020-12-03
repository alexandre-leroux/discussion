<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PHOTOPICS - Discussion</title>

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

if(isset($_SESSION['login']) AND isset($_SESSION['id']) )



{


      connection_bdd();
      $bdd = connection_bdd();
      $requete = $bdd->query(' SELECT message, date, login FROM messages INNER JOIN utilisateurs ON messages.id_utilisateur = utilisateurs.id');
      $donnees_messages = $requete->fetchall();

    echo '<pre>';
    print_r($donnees_messages);
    echo '</pre>';

    


}
?>



<table class="table table-striped table-dark">

  <tbody>
<?php foreach ($donnees_messages as $key => $value )

{ $date = $value['date'];
?> 

    <tr>
      <td class='text-info'>Message posté le : <?php echo  $value['date']?> par  <?php echo $value['login']?></td>
    </tr>
    <tr>
      <td> <?php echo $value['message']?> </td>

    </tr>


<?php
}
?>

</tbody>
</table>



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
