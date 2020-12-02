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
<?php
if (!isset($_SESSION['login']) and !isset($_SESSION['id'])){header('location:../index.php');}
?>

  <!-- Navigation -->
  <?php
 include '../includes/nav-non-connecte.php';
 include '../fonctions/fonctions.php';
 ?>

  <!-- Page Header -->
  <header class="masthead vh-100" style="background-image: url('https://images.unsplash.com/photo-1606749128514-01add013f5c7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto ">
          <div class="page-heading ">
            <p class=' h3 p-4 text-uppercase bg-light text-success m-0 display-4'>inscription validée</p>
            <span class="subheading bg-light text-primary m-0 p-2 pb-3">vous allez être redirigé vers la page de connexion</span>
          
          </div>
        </div>
      </div>
    </div>
  </header>


  <meta http-equiv="refresh" content="2;url=connexion.php" />

  <!-- Main Content -->



 

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
