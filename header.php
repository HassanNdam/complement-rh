<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('name');?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo (get_template_directory_uri() . '/assets/icone/favicon.png') ?>" sizes="16x16 32x32 48x48 64x64">
    
<?php
include_once("listes.php");
wp_head();
?>
</head>
<body>

<header class="site-header bg-light shadow-sm position-sticky">
    <nav class="navbar navbar-default navbar-expand d-flex container flex-md-row justify-content-between py-2">
    <div class="container-fluid">
        <a class="navbar-brand" title="Aller sur la page d'accueil" href="<?php echo get_site_url(); ?>">
        <img src="<?php echo get_template_directory_uri(). '/assets/logo/logo.png'?>" alt="Logo Complement-RH" style="max-width:250px" class="img-fluid"> 
        </a>
    </div>
    <div class="d-flex">
        <a href="https://jobaffinity.fr/apply/uxlpt6amipoyw7dy81" target="_blank">
            <button type="button" class="btn btn-primary" onclick="this.blur();">Candidature spontanée</button>
        </a>
    </div>
    </nav>

</header>

<div class="position-relative p-3 p-md-5  overflow-hidden header-image">
   <!-- header image    -->
</div>

<!-- Formulaire de recherche -->

<div class="container position-relative text-center bg-light-transparent p-5">
        <form method="get" id="" action="<?php echo(get_site_url()); ?>">
			<div class="row searchrow justify-content-center">
				<div class=" col-md-6 search-item">
                 <input type="text" id="location" name="s" placeholder="VILLE, DEPARTEMENT, REGION" class="form-control " value="<?php echo($searchstring); ?>">
				</div>

				<div class=" col-md-6 search-item">
					<select name="metier" id="_metier-field" class="form-control form-select espace-mob">
						<option value="0" <?php if ($metier == '0') echo('selected'); ?>>SECTEURS  D'ACTIVITE</option>
						<?php 
						$size = count(ACTIVITE);
						for($i=0; $i < $size;++$i) {
							echo("<option value='" . ($i + 1) . "'");
							if($metier == $i + 1) {
								echo(" selected='selected'");
							}
							echo(">". ACTIVITE[$i] . "</option>");
						};
						?>

					</select>
				</div>
			</div>

			<div class="row searchrow justify-content-center mt-5">
				<div class="col-md-12 search-item">
					<input type="text" id="s" name="s" placeholder=" MOTS CLÉS" class="form-control " value="<?php echo($searchstring); ?>">
				</div>

				<div class=" col-md-6 search-item">
                       <!-- Pour le prochain formulaire -->
				</div>
			</div>

			<div class="row searchrow justify-content-center mt-5">
				<div class="col-sm-5 mb-3 text-center text-sm-end">
                    <!-- <a class="btn btn-secondary reinitialiser" href="<?php echo(get_site_url()); ?>">Actualiser </a> -->
				</div>
				<div class="col-sm-2 text-center">
					<button type="submit" id="searchsubmit" class="rechercher">Rechercher des offres</button>
				</div>
				<div class="col-sm-5"></div>
			</div>
		</form>
</div>