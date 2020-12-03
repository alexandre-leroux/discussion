<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PHOTOPICS - Accueil</title>

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
 ?>

  <!-- Page Header -->
  <header class="masthead vh-100" style="background-image: url('https://images.unsplash.com/photo-1606755655775-e43dc21b5012?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80')">
    <div class="overlay h-100"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-8 col-md-10 mx-auto h-100">
          <div class="site-heading h-100 d-flex flex-column justify-content-center">
            <p class="display-4">Vous allez être déconnecté</p>
            <span class="subheading">A bientôt <?php echo $_SESSION['login'];?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

<?php
session_destroy();
?>

<meta http-equiv="refresh" content="2;url=../index.php" />
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
