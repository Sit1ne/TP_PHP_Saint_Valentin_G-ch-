<?php
session_start();
include "includes/header_session.php";

require_once "require/functions.php";
$infos = infos();








?>

	<div class="infos_details">

		<h1>Bienvenue <?= $infos["pseudo"] ?></h1>

		<p>Ton Adresse e-mail est: <?= $infos["mail"] ?></p>

		
		
	</div>	

<form class="form_site" method="POST" action="">
    <input type="text" placeholder="Veuillez entrez le nom de votre Article" name="nom" /><br />
    <input type="text" placeholder="Veuillez entrez une description" name="resume" /> <br />
    <input type="text" placeholder="Veuillez entrez votre prix" name="prix" /> <br />
    <input type="submit" value="Envoyer" />
</form> 


	<p>Tes derniers Articles ci-dessous</p>
	
	<article>
		<h1><?= $articles["nom"]?></h1>
		<p><?= $articles["resume"] . ' € ' ?></p>
		<p><?= $articles["prix"] ?></p>
	</article>
	
<main>

	<section class="section_main">
	
	 <?php
	foreach ($articles as $article) :
	?>
	    
	<article>
		<h1><?= $articles["nom"]?></h1>
		<p><?= $articles["resume"] . ' € ' ?></p>
		<p><?= $articles["prix"] ?></p>
	</article> 
	
	<?php
    endforeach;	
	?>
	
	<section>
		
</main>		