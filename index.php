<?php

get_header();


// Déclaration des variables globaux et des requettes wp

global $wp_query;
$args = $wp_query -> query_vars; 
$args ['post_type'] = 'post';

$metaquery = array(); 


$keyword = '';
$location ='';
$activite = '0';

if($_GET) {

	if (isset($_GET['s'])) {
		 $keyword = $_GET['s'];
		 };

	if (isset($_GET['activite'])) {
		$activite = $_GET['activite'];

		if ($activite > 0) {
			array_push($metaquery, array(
						'key' => 'job_activity',
				        'value' => ACTIVITE[$activite -1],
				        'compare' => '=',)
				);
		};
	}
    if (isset($_GET['location'])) {
		$location = $_GET['location'];
		if ($location > '') {

			if (is_numeric($location)) {
				array_push($metaquery, array(
			        'key' => 'job_id',
			        'value' => '^' . $location,
			        'compare' => 'REGEXP',
			    ));
			} else {
			array_push($metaquery, array(
			        'key' => 'job_location',
			        'value' => $location,
			        'compare' => 'LIKE',
			    ));
			};
		};
	};


};

$args['meta_query'] = $metaquery;

$myquery = new WP_Query($args);

$wp_query = $myquery;


?>

<div class="position-relative p-3 p-md-5  overflow-hidden header-image">
   <!-- header image    -->
</div>

<!-- Formulaire de recherche -->

<div class="container position-relative  border text-center bg-light-transparent p-5">
        <form method="get" id="search-form" action="<?php echo get_site_url(); ?>">
			<div class="row searchrow justify-content-center">
				<div class="col-md-6 ">
                    <input type="text" id="location" name="location" class="form-control" placeholder="CP, DEPARTEMENT, REGION, VILLE" value="<?php echo $location; ?>">
				</div>

				<div class="col-md-6">
					<select name="activite" id="_activite-field" class="form-control form-select espace-mob">
						<option value="0" <?php if ($activite == '0') echo('selected'); ?>>SECTEUR D'ACTIVITE</option>
						<?php 
						$size = count(ACTIVITE);
						for($i=0; $i < $size;++$i) {
							echo("<option value='" . ($i + 1) . "'");
							if($activite == $i + 1) {
								echo(" selected='selected'");
							}
							echo(">". ACTIVITE[$i]. "</option>");
						};
						?>

					</select>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-md-12 search-item">
					<input type="text" id="s" name="s" placeholder=" MOT CLÉ" class="form-control " value="<?php echo $keyword; ?>">
				</div>

				<div class=" col-md-6">
                       <!-- Pour le prochain formulaire -->
				</div>
			</div>
			<div class="row justify-content-center mt-5">
				<div class="col-lg-3">
					<button type="submit" id="searchsubmit" class="rechercher" value="search"><i class="fa fa-search" aria-hidden="true"></i> Rechercher des offres</button>
				</div>
			</div>
		</form>
</div>

<div class="container mt-5 mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item accueil"><a href="<?php echo get_site_url();?>">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nos offres (<span class="post-nombre"><?php echo $myquery -> found_posts ?></span>)</li>
    </ol>
    </nav>
</div>


<!-- Affichage poste -->

<?php if ($myquery -> have_posts()) : ;?>

<?php
while ($myquery -> have_posts()) : $myquery -> the_post();


$postid = get_post_custom_values('job_id')[0];
$postcontract = get_post_custom_values('job_contract_type')[0];
$postlocation = get_post_custom_values('job_location')[0];
$postactivite = get_post_custom_values('job_activity')[0];

?>

<div class="container  mt-5 mb-5  block-offre position-relative">
    <div class="row justify-content-center">
        <div class="col-lg-5 p-4">
            <h4> <?php echo the_title_attribute();?></h4>
        </div>
        <div class="col-lg-4 p-3">
            <div class ="col-sm pt-2">
                <div>
                <h4 class="date-offre"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted font-italic"><?php echo get_the_date();?></span></h4>
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

<!-- Fin boucle-->

<?php endwhile ; wp_reset_postdata(); ?>

<?php else : ?>

<div class="container post-non-trouve shadow-sm bg-light rounded-3 mt-5 mb-5 ">
   <div class="row justify-content-center mt-4">  
       <div class="col-lg-4 text-center">
       <h3 class="aucun-poste mt-3 mb-3">Aucune offre ne correspond à votre recherche !</h3>
        <a class="revenir-liste mt-4" href="<?php echo get_site_url();?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Revenir à la liste des offres</a>
       </div>
        <div class="col-lg-4 text-center">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="col-lg-4 text-center">
           <h3 class="aucun-poste mt-3 mb-3">Soumettre une candidature spontanée :</h3>
            <a  class="mt-5" href="https://jobaffinity.fr/apply/uxlpt6amipoyw7dy81" target="_blank" title="Soumettre une candidature spontanée">
                <button type="button" class="btn btn-primary" onclick="this.blur();">Candidature spontanée <i class="fa fa-angle-right" aria-hidden="true"></i></button>
            </a>
        </div>
   </div>
</div><br>

<?php endif; ?>


<?php

get_footer();

?>