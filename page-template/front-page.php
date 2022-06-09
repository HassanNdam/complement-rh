<?php
// Déclaration des variables et test par le GET

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
						'key' => 'custom_secteur_d\'activite',
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
					<input type="text" id="s" name="s" placeholder=" MOT CLÉS" class="form-control " value="<?php echo $keyword; ?>">
				</div>

				<div class=" col-md-6">
                       <!-- Pour le prochain formulaire -->
				</div>
			</div>
			<div class="row justify-content-center mt-5 mb-1">
				<div class="col-lg-3">
					<button type="submit" id="searchsubmit" class="rechercher" name="search" value="search"><i class="fa fa-search" aria-hidden="true"></i> Rechercher des offres</button>
				</div>
			</div>
            <div class ="row">
                <?php reinitialiser();?>
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


<div class="container">
    <?php if ( $myquery->have_posts() ) : ?>
        <?php 
        $index = 0;   
        while ( $myquery->have_posts() ) : $myquery->the_post(); ?>
            <?php if ( $index % 2 == 0 ) : ?>
            <div class="row">
            <?php endif; ?>

            <?php 
                $postid = get_post_custom_values('job_id')[0];
                $postcontract = get_post_custom_values('job_contract_type')[0];
                $postlocation = get_post_custom_values('job_location')[0];
                $postactivite = get_post_custom_values('custom_secteur_d\'activite')[0];
                $postlink = get_post_custom_values('job_link')[0];
            ?>
            <div class="col-lg-6 mt-1 mb-4">
                <div class="block-offre mb-4 position-relative">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/icone/favicon.png'?>"> 
                        </div>
                        <div class="col-10"><div>			
                            <div class="row mt-2">
                                    <h4> <?php echo the_title_attribute();?></h4>	               
                            </div>
                                <div class="row">
                                        <h4 class="date-offre mt-3"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted font-italic">Publiée le <?php echo get_the_date();?></span></h4>
                                        <h4 class="local-offre mt-3"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $postlocation; ?></h4>
                                        <h4 class="type-offre mt-3 mb-4"><i class="fa fa-briefcase" aria-hidden="true"></i>  <?php echo $postcontract?></h4>
                                </div>
                            </div>    
                                        
                            <div class="col-12 text-center">
                                <a href="<?php the_permalink() ?>?s=<?php echo($keyword . '&location=' . $location); ?>" class="stretched-link " title="Visiter l'offre d'emploi <?php echo the_title_attribute();?>">
                                    <button type="submit"  class="btn btn-primary see-post text-white">Voir l'offre <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        
            <?php $index += 1; ?>
            <?php if ( $index %2 == 0 ) : ?>
                </div>
            <?php endif; ?>

            <!-- Fin boucle-->

        <?php endwhile; wp_reset_postdata(); ?>
        <?php if ( $index %2 <> 0 ) : ?>
        </div>
        <?php endif; ?>


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
            </div>
    <?php endif; ?>
</div>

    <div class="row justify-content-center mt-4 mb-5">
        <!-- <div class="col-1"></div> -->
            <div class="col-1 text-center margin-pagination mt-4 mb-5">
                <?php pagination_post(); ?>
            </div>
    </div>
</div>