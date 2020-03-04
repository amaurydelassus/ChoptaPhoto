<div class="container" style="top: 3vh;">
    <div class="row" id="connection">
        <div class="col-sm">
            <?php
                if(isset($_POST['login'],$_POST['password'])&& $_POST['login'] != "" && $_POST['password'] != "")
                {
                    $usr = new Utilisateur($_POST["login"], $_POST["password"]);
                    if($usr->seConnecter($bdd))
                    {
                        if($usr->createSession())
                            ?><script>document.location.href="index.php?page=home&type=2"</script><?php
                        return(true);
                    }
                    else
                    {
                        echo "Utilisateur ou mot de passe inconnu";
                    }
                }
                
                if(isset($_SESSION["login"]) && $_SESSION['login'] != "")
                {                            
                }
                else
                {
                    ?>
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <h1>Login</h1>
                            <form action="" method="POST">
                                <input type="text" id="login" class="fadeIn second" name="login" placeholder="email" required>
                                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
                                <br/><br/>
                                <div class="g-recaptcha" data-sitekey="6LdAULgUAAAAAH--nzuq0IIuUnTRoQOInOR5_EHR"></div>
                                <br/><br/>
                                <button type='submit' class='btn btn-primary'>Se Connecter</button>
                                <a class="btn btn-primary" href="index.php?page=register">S'enregistrer</a>
                            </form>
                        </div>
                    </div>
                    <?php 
                }
            ?>
        </div>
    </div>
</div>
