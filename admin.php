<?php
	include_once("DAO/CategoryService.class.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<div class=" navbar-static-top">
			<nav class="navbar navbar-static-top navbar-inverse">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target="#menu" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="menu" class="collapse navbar-collapse">
					<ul class=" nav navbar-nav">
						<li class="active" ><a href="#">Déconnexion</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="btn-add-form" class="row">
			<div class="col-md-offset-1 col-md-3">
				<button  class="btn btn-primary" onclick="showForm('addCategory')">Ajouter catégorie</button>
			</div>
			<div class="col-md-offset-4 col-md-3">
				<button  class="btn btn-primary" onclick="showForm('addArticle')">Ajouter article</button>
			</div>
		</div>
		<div class="form modal" id="addArticle">
			<span onclick="closeForm('addArticle)" class="close" title="Close Modal">&times;</span>
			<form class="form-horizontal modal-content" id="addArticleForm">
				<div class="container-form">
					<div class="form-group">
						<label class="control-label col-md-2" for="a">Titre :</label>
						<div class="col-md-10"><input id="a" class="form-control" type="text" name="titre"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="b">Contenu :</label>
						<div class="col-md-10"><textarea id="b" class="form-control" name="contenu"></textarea></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="c">Categorie :</label>
						<div class="col-md-10">
							<select id="select" class="form-control" name="id_category">
								<?php
								$service = new CategoryService();
								$response = $service->getAllCategory();
								$size = sizeof($response);
								for($i = 0; $i < $size ; $i++)
								{
									echo '<option value="'.$response[$i]['id'].'">'.$response[$i]['nom'].'</option>';
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="clearfix">
					<button type="button" onclick="closeForm('addArticle')" class="cancelbtn">Cancel</button>
					<button class=" btn btn-primary col-md-offset-2 col-md-2" type="submit">Envoyer</button>
				</div>
			</form>
		</div>
		<div class="form modal" id="addCategory">
			<span onclick="closeForm('addCategory)" class="close" title="Close Modal">&times;</span>
			<form class="form-horizontal modal-content" id="addCategoryForm">
				<div class="container-form">

					<div class="form-group">
						<label class="control-label col-md-2" for="a1">Nom :</label>
						<div class="col-md-10"><input id="a1" class="form-control" type="text" name="nom"></div>
					</div>
				</div>
				<div class="clearfix">
					<button type="button" onclick="closeForm('addCategory')" class="cancelbtn">Cancel</button>
					<button class=" btn btn-primary col-md-offset-2 col-md-2" type="submit">Envoyer</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/admin.js">
	</script>
</body>
</html>
