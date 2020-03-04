<?php
    session_start();
    include("obj/Utilisateur.php");
    include("obj/BDD.php");
    include("obj/Article.php");
    include("obj/Commande.php");
    include("obj/Borne.php");
    include("function/fonctions-panier.php");
    include("page/parameter.php");
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- titre de la page -->
    <title>Chopetaphoto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi&display=swap" rel="stylesheet">
  </head>
  <body id="page-top">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
      //haut de page
        include("page/header.php");
      //corp de la page
        if(isset($_GET['page']))
        {
            switch ($_GET['page']) {
                case 'acceuil':
                  include("page/tous/acceuil.php");
                  break;
                case 'léquipe':
                  include("page/tous/equipe.php");
                  break;
                case 'Contact':
                  include("page/tous/contact/contact.php");
                  break;                
                case 'mail':
                  include("page/tous/contact/mail.php");
                  break;
                case 'login':
                  include("page/tous/connection/login.php");                       
                  break;                
                case 'register':
                    include("page/tous/connection/register.php");
                    break;
                case 'logout':
                  include("page/tous/connection/logout.php");
                  break;             
                case 'panier':
                  include("page/user/pannier/index.php");
                  break;                
                case 'commandeencour':
                  include("page/user/commandes/commandes.php");
                  break;                
                case 'commande':
                  include("page/user/commandes/mescommandes.php");
                  break;        
                case 'mescommande':
                  include("page/user/commandes/mescommandes.php");
                  break;
                case 'home':
                  include("page/user/home/home.php");
                  break;                
                case 'article':
                    include("page/user/home/article.php");
                    break;                
                case 'articles':
                    include("page/user/home/articles.php");
                    break;                
                case 'admincommande':
                    include("page/admin/admincommande.php");
                    break;                
                case 'adminborne':
                    include("page/admin/adminborne.php");
                    break;                 
                default:
                    include("page/tous/acceuil.php");
            }
        }
        else{
            include("page/tous/acceuil.php");
        }
      //bas de la page
        include("page/footer.php");
			?>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
      <div class="scroll-to-top d-lg-none position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
          <i class="fa fa-chevron-up"></i>
        </a>
      </div>

    <!-- Portfolio Modals -->

      <!-- Portfolio Modal 6 -->
      <div class="modal" id="portfolio-modal-6" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-xl bg-white">
            <div class="container text-center">
              <div class="col-xl-10 mx-auto">
                <hr class="star-dark mb-5">
                  <div class=MentionLegal>
                  
                    <img
                        src="img/offre.jpg"
                        alt="[ABC Tech posssède 75% de part de marché et XYZ 25%]"
                        height="150%" 
                        width="100%" 
                    />
                  </div>
                <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">Close</a>
              </div>
            </div>
          </div>
        </div>
      <!-- Portfolio Modal 7 -->
      <div class="modal" id="portfolio-modal-7" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-xl bg-white">
            <div class="container text-center">
              <div class="col-xl-10 mx-auto">
                <h2 class="text-secondary text-uppercase mb-0">Mention Legale</h2>
                <hr class="star-dark mb-5">
                  <div class=MentionLegal>
                    <p>Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez sans réserves les présentes modalités. Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet <span >amaurydelassus.ovh </span>sont :</p> <p><span><b>Editeur du Site : </b></span></p> <p>Amaury<br> Email : Amaury.delassus@gmail.com<br>Site Web : <span >amaurydelassus.ovh</span></p> <p><b><span>Hébergement :</span> </b></p> <p>Hébergeur : OVH<br>2 rue Kellermann – 59100 Roubaix – France.<br> Site Web : <span >www.ovh.com</span></p> <p><span><b>Développement</b><b> : </b></span></p> <p>Amaury<br> Site Web : <span >amaurydelassus.ovh</span></p> <p><span><b>Conditions d’utilisation : </b></span></p><p>Ce site (<span >amaurydelassus.ovh</span>) est proposé en différents langages web (HTML, HTML5, php , CSS, etc…) pour un meilleur confort d’utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme <br>Edge, Safari, Firefox, Google Chrome, etc…</p> <p><span>Delassus Amaury<b> </b></span>met en œuvre tous les moyens dont il dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L’internaute devra donc s’assurer de l’exactitude des informations auprès de , et signaler toutes modifications du site qu’il jugerait utile. n’est en aucun cas responsable de l’utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.</p> <p><b>Cookies</b> : Le site <span >amaurydelassus.ovh</span> peut-être amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d’affichage. Un cookies est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent être fonctionnelles sans l’acceptation de cookies.</p> <p><b>Liens hypertextes :</b> Les sites internet de peuvent offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. Delassus Amaury ne dispose d’aucun moyen pour contrôler les sites en connexion avec ses sites internet. ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Il ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l’internaute, qui doit se conformer à leurs conditions d’utilisation.</p> <p>Les utilisateurs, les abonnés et les visiteurs des sites internet de ne peuvent mettre en place un hyperlien en direction de ce site sans l’autorisation expresse et préalable de Delassus Amaury.</p> <p>Dans l’hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de Delassus Amaury, il lui appartiendra d’adresser un email accessible sur le site afin de formuler sa demande de mise en place d’un hyperlien. Delassus Amaury se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.</p> <p><span><b>Services fournis : </b></span></p> <p>L’ensemble des activités ainsi que ses informations sont présentés sur notre site <span >amaurydelassus.ovh.</span></p> <p>Delassus Amaury s’efforce de fournir sur le site amaurydelassus.ovh des informations aussi précises que possible. les renseignements figurant sur le site <span >amaurydelassus.ovh</span> ne sont pas exhaustifs et les photos non contractuelles. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par ailleurs, tous les informations indiquées sur le site amaurydelassus.ovh<b> </b>sont données à titre indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.</p> <p><span><b>Limitation contractuelles sur les données : </b></span></p> <p>Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des omissions. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email, à l’adresse demande@Amaury.fr, en décrivant le problème de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé, …).</p> <p>Tout contenu téléchargé se fait aux risques et périls de l’utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d’un quelconque dommage subi par l’ordinateur de l’utilisateur ou d’une quelconque perte de données consécutives au téléchargement. <span style=";">De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</span></p> <p>Les liens hypertextes mis en place dans le cadre du présent site internet en direction d’autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de Delassus Amaury.</p> <p><span><b>Propriété intellectuelle :</b></span></p> <p>Tout le contenu du présent sur le site <span >amaurydelassus.ovh</span>, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la Delassus Amaury à l’exception des marques, logos ou contenus appartenant à d’autres sociétés partenaires ou auteurs.</p> <p>Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord exprès par écrit de Delassus Amaury. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.</p> <p><span><b>Déclaration à la CNIL : </b></span></p> <p>Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l’égard des traitements de données à caractère personnel) relative à l’informatique, aux fichiers et aux libertés, ce site n’a pas fait l’objet d’une déclaration auprès de la Commission nationale de l’informatique et des libertés (<span >www.cnil.fr</span>).</p> <p><span><b>Litiges : </b></span></p> <p>Les présentes conditions du site <span >amaurydelassus.ovh</span> sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l’interprétation ou de l’exécution de celles-ci seront de la compétence exclusive des tribunaux. La langue de référence, pour le règlement de contentieux éventuels, est le français.</p> <p><span><b>Données personnelles :</b></span></p> <p>De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous visitez notre site Internet <span >amaurydelassus.ovh</span>.</p> <p>Cependant, ce principe comporte certaines exceptions. En effet, pour certains services proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que : votre nom, votre fonction, le nom de votre société, votre adresse électronique, et votre numéro de téléphone. Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans la rubrique « contact ». Dans tous les cas, vous pouvez refuser de fournir vos données personnelles. Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des renseignements sur nos activités, ou de recevoir les lettres d’information.</p> <p>Enfin, nous pouvons collecter de manière automatique certaines informations vous concernant lors d’une simple navigation sur notre site Internet, notamment : des informations concernant l’utilisation de notre site, comme les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre navigateur, vos temps d’accès. De telles informations sont utilisées exclusivement à des fins de statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
                  </div>
                <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">Close</a>
              </div>
            </div>
          </div>
        </div>
  </body>
</html>
