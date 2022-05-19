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


