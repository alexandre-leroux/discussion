<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
 <?php
 include 'includes/nav-non-connecte.php';
 ?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('https://images.unsplash.com/photo-1606149408604-b0add195ddfa?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Photopics</h1>
            <span class="subheading">Le blog du photographe</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a target='_blanck' href="https://500px.com/photo/1007553498/sound-of-sand-by-Alexandre-Leroux/">
            <h2 class="post-title">
              Les grandes exploration de l'homme.
            </h2>
            <h3 class="post-subtitle">
              Se baigner dans une mer de sable.
            </h3>
          </a>
          <p class="post-meta">Ecrit par
            <a href="#">Alex</a>
            Le 24 September 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a target='_blanck' href="https://500px.com/photo/1006027574/graphisme-hivernal-by-alexandre-leroux">
            <h2 class="post-title">
              La morsure de l'hiver, au coeur de nos montagnes.
            </h2>
          </a>
          <p class="post-meta">Ecrit par
            <a href="#">Alex</a>
            le 18 September 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a target='_blanck' href="https://500px.com/photo/1004194351/Cascade-du-Rouget-by-Alexandre-Leroux/">
            <h2 class="post-title">
              Introspection et retour aux sources, au fil de l'eau...
            </h2>
            <h3 class="post-subtitle">
              S'arrêter, contempler, rêver.
            </h3>
          </a>
          <p class="post-meta">Ecrit par
            <a href="#">Alex</a>
            le 24 Aout 2019</p>
        </div>
      
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" target='_blanck' href="https://500px.com/p/alexandreleroux?view=photos">Anciennes photos &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php
  include 'includes/footer.php';
  ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
