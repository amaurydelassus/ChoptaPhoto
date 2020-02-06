<header>
  <!-- Bannierre -->
  <img class="bandrole" src="img/bannierre.jpg" alt="">
  <!-- Navigation -->
  <nav class="navbar fixed navbar-expand-lg navbar-dark bg-dark" style = "width:100%">
    <div class="row" style = "width:100%">
        <!-- lien toujour visible -->
        <div class="col-md-1 nav-item">
          <a class="nav-link textonglet" href="index.php?page=acceuil">Hello!</a>
        </div>
        <div class="col-md-1 nav-item">
          <a class="nav-link textonglet " href="index.php?page=léquipe">L'equipe</a>
        </div>
        <div class="col-md-2 nav-item" >
          <a class="nav-link textonglet" href="index.php?page=Contact">Un petit message ?</a>
        </div>
        <?php
        // si user connecté
        if(isset($_SESSION["login"]) && $_SESSION['login'] != ""){
          ?>
          <!-- Article -->
          <form action="index.php?page=articles" method="post">
            <div class="col-md-2 nav-item dropdown">
              <a class="nav-link textonglet dropdown-toggle" href="index.php?page=home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Article
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <button type='submit' class='dropdown-item' name="type" value="1">Consommables</button>
                <button type='submit' class='dropdown-item' name="type" value="2">Bornes</button>
                </div>
            </div>
          </form>
          <!-- User-->
          <div class="col-md-5 nav-item dropdown">
            <a class="nav-link textonglet dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php 
              echo $_SESSION['login'];
              ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Option</a>
              <a class="dropdown-item" href="index.php?page=commande">Mes Commandes</a>
              <div class="dropdown-divider"></div>
              <?php if (isset($_SESSION["type"]) && $_SESSION['type'] == "1")
              {
                //si utilisateur est admin
                ?>
                  <div class="col-md-2 nav-item ">
                    <a class="dropdown-item" href="index.php?page=admincommande">Admin Commande <span class="sr-only">(current)</span></a>
                  </div>
                  <div class="col-md-2 nav-item ">
                    <a class="dropdown-item" href="index.php?page=adminborne">Admin Bornes<span class="sr-only">(current)</span></a>
                  </div>
                <?php
              }
              ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="index.php?page=logout">Deconnexion</a>
            </div>
          </div>
          <!-- Panier -->
          <div class="col-md-1 nav-item ">
            <a class="nav-link textonglet" href="index.php?page=panier">Panier <span class="sr-only">(current)</span></a>
          </div>
          <?php
          }
        //si user non connecté
        else
        {
          ?>
          <div class="col-md-2 nav-item dropdown">
          </div>
          <div class="col-md-2 nav-item ">
            <a class="nav-link textonglet btn btn-primary" href="index.php?page=login">Se connecter <span class="sr-only">(current)</span></a>
          </div>
          <?php 
        }
        ?>
  </nav>
</header>