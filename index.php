<?php
  include_once("DAO/ArticleService.class.php");
  include_once("DAO/CategoryService.class.php");
?>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <title>definition</title>
  <link rel="stylesheet" href="moncss.css" media="screen"/>
  <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
  <body>
    <div id="site">
      <div id="haut"><h1>M1GLSI-NEWS LE MEILLEUR SITE D'INFOS AU SENEGAL</h1></div>
      <div id="gauche">
        <ul type="disk" id="LastArticle">
          <?php
          if(isset($_GET['requete'])){
            ?>
              <a href="index.php">page d'acceuil</a>
            <?php
            $requete = $_GET['requete'];
            if($requete == 'getArticleByCategoryId')
            {
              $id = $_GET['id'];
              $service = new CategoryService();
              $response = $service->getCategoryById($id);
              ?>
                <h2> <?php echo $response[0]['nom']; ?> </h2>
              <?php
              $service = new ArticleService();
              $response = $service->getArticleByCategoryId($id);
              $lentgh = sizeof($response);
              if($lentgh == 0){
                ?>
                  <p>Aucun article dans cette categorie...</p>
                <?php
              }
              for($i = 0 ; $i < $lentgh ; $i++)
              {
                ?>
                <ul>
                  <li class="article"><?php echo '<a href="#" class="afficher" data-id ="'.$response[$i]['id'].'">'.$response[$i]['titre'].'</a>'; ?> <br>
                    <p class="p"><?php echo substr($response[$i]['contenu'],0,50); ?></p>
                  </li>
                </ul>
                <?php
              }
            }
          }
          else
          {

            $service = new ArticleService();
            $response = $service->getLastArticle();
            $lentgh = sizeof($response);
            if($lentgh == 0)
            {
              ?>
                <p>Aucun article publie pour le moment...</p>
              <?php
            }
            for($i = 0 ; $i < $lentgh ; $i++)
            {
              ?>
              <ul>
                <li class="article"><?php echo '<a href="#" class="afficher" data-id ="'.$response[$i]['id'].'">'.$response[$i]['titre'].'</a>'; ?> <br>
                  <p class="p"><?php echo substr($response[$i]['contenu'],0,50); ?></p>
                </li>
              </ul>
              <?php
            }
          }
          ?>
        </ul>
      </div>
      <div id="droite">
        <h2><center>CATEGORIES</center></h2>
        <pre>
          <ul type="disk" id="category">
            <?php
              $service = new CategoryService();
              $response = $service->getAllCategory();
              $lentgh = sizeof($response);
              for($i = 0 ; $i < $lentgh ; $i++)
              {
                ?>
                  <li class="category"> <?php echo '<a href="#" class="afficher" data-id="'.$response[$i]['id'].'">'.$response[$i]['nom'].'</a>'; ?> </li>
                <?php
              }
            ?>
          </ul>
        </pre>
      </div>
      <!--<div id="modal" class="modal">
         <span onclick="closeForm('modal')" class="close" title="Close Modal">&times;</span>
         <div class="modal-content" id="modal_content">
           <div class="container" id="container">

           </div>
         </div>
       </div>-->
      <div id="pied">

      </div>
    </div>
    <script type="text/javascript" src="js/requete.js"></script>
    <script type="text/javascript">
          function closeForm(id) {
            document.getElementById(id).style.display='none';
            }
    </script>
  </body>
</html>
