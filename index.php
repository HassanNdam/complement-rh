<?php

get_header();


// Déclaration des variables globaux et des requettes wp

global $wp_query;
$args = $wp_query -> query_vars; 
$args ['post_type'] = 'post';

$metaquery = array();

$args['meta_query'] = $metaquery;
$myquery = new WP_Query($args);
$wp_query = $myquery; 

?>

<!-- Formulaire de recherche -->

<div class="container position-relative  border text-center bg-light-transparent p-5">
        <form method="get" id="" action="<?php echo(get_site_url()); ?>">
			<div class="row searchrow justify-content-center">
				<div class=" col-md-6 ">
                    <input type="text" id="location" name="location" class="form-control" placeholder="CP, DEPARTEMENT, REGION" value="<?php echo($localisation); ?>">
				</div>

				<div class=" col-md-6 search-item">
					<select name="metier" id="_metier-field" class="form-control form-select espace-mob">
						<option value="0" <?php if ($metier == '0') echo('selected'); ?>>SECTEUR D'ACTIVITE</option>
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
			<div class="row justify-content-center mt-4">
				<div class="col-md-12 search-item">
					<input type="text" id="s" name="s" placeholder=" MOT CLÉ" class="form-control " value="<?php echo($searchstring); ?>">
				</div>

				<div class=" col-md-6">
                       <!-- Pour le prochain formulaire -->
				</div>
			</div>
			<div class="row justify-content-center mt-5">
				<div class="col-lg-3">
					<button type="submit" id="searchsubmit" class="rechercher"><i class="fa fa-search" aria-hidden="true"></i> Rechercher des offres</button>
				</div>
			</div>
		</form>
</div>

<div class="container mt-5 mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item accueil"><a href="<?php echo get_site_url();?>">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nos offres</li>
        <!-- <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span> -->
    </ol>
    </nav>
</div>


<!-- Affichage poste -->

<?php if ($myquery -> have_posts()) : ;?>

<?php while ($myquery -> have_posts()) : $myquery -> the_post();

$postid = get_post_custom_values('job_id')[0];
$postcontract = get_post_custom_values('job_contract_type')[0];
$postlocation = get_post_custom_values('job_location')[0];

?>

<div class="container mt-5 mb-5  block-offre position-relative">
    <div class="row justify-content-center">
        <div class="col-lg-5 p-4">
            <h4> <?php echo the_title_attribute();?></h4>
            <p class="mt-4">
                <?php the_excerpt();?>
            </p>
        </div>
        <div class="col-lg-4 p-3">
            <div class ="col-sm pt-2">
             <div>
                <h4 class="date-offre"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date();?></h4>
             </div>
            </div>
            <div class ="col-sm pt-4">
                <div>
                    <h4 class="local-offre"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $postlocation; ?></h4>
                </div>
            </div>
            <div class ="col-sm pt-4">
                <div>
                    <h4 class="type-offre"><i class="fa fa-briefcase" aria-hidden="true"></i>  <?php echo $postcontract?></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 p-4 text-center">
            <a href="<?php the_permalink();?>" class="stretched-link" title="Visiter l'offre d'emploi <?php echo the_title_attribute();?>">
                 <button type="submit"  class="btn btn-primary voir-offre-link text-white">Voir l'offre <i class="fa fa-angle-right" aria-hidden="true"></i></button>
             </a>
        </div>
    </div>
</div>


<!-- Fin de la boucle sur les posts et reinitialisation -->

<?php endwhile ; wp_reset_postdata(); ?>

<?php else : ?>

<?php endif; ?>

<?php

get_footer();

?>