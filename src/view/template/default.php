<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/img/cat.png" />
    <!-- VENDOR -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css" />
    <script type="text/javascript" src="/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap.min.js"></script>
    <!-- PERSO -->
    <link rel="stylesheet" href="/css/default.css" />
    <title><?php echo $title; ?></title>
  </head>
  <body class="bg-dark">

    <header id="header">
    
        <!-- <a href="/"><h1 id="titleBlog">My Care Bear Blog</h1></a> -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light"  style="background-color: #ff5500;">
       
          <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/index.php/article/">Article</a></li>
            </ul>
          </div>

          <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="/">
              <!-- https://fr.wikipedia.org/wiki/Fichier:Creative-Tail-Halloween-black-cat.svg#filelinks -->
              <img alt="" src="/img/cat.png" height="40">
              My Cat Blog
              <img alt="" src="/img/cat.png" height="40">
            </a>
          </div>

          <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
              <?php 
                if(isset($username)) {
                  echo <<<SALUT
                  <li class="nav-item"><a class="nav-link" href="#">{$username}</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Sign Out</a></li>
SALUT;
                } else {
                  echo <<<'HEY'
                  <li class="nav-item"><a class="nav-link" href="/index.php/user/formSignIn"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
                  <li class="nav-item"><a class="nav-link" href="/index.php/user/formSignUp"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
HEY;
                }
              ?>
            </ul>
          </div>
          
        </nav>
    </header>

    <main id="main">
        <?php echo $content; ?>
    </main>

    <footer id="footer">
        <p>This blog use HTML, CSS, JS and PHP.</p>
    </footer>

  </body>
</html>