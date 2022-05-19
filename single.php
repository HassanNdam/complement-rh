<?php 

get_header();


$postid = get_post_custom_values('job_id')[0];
$postcontract = get_post_custom_values('job_contract_type')[0];
$postlocation = get_post_custom_values('job_location')[0];

?>

<div class="position-relative p-3 p-md-5 text-center overflow-hidden single-image">
   <h4 class="titre-single mt-4"></i><?php echo  the_title_attribute(); ?></h4>
</div>


<div class="container mt-5 mb-5 ">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item accueil"><a href="<?php echo get_site_url();?>">Accueil</a></li>
        <li class="breadcrumb-item " aria-current="page">Nos offres</li>
        <li class="breadcrumb-item active"><?php echo the_title_attribute();?></li>
    </ol>
    </nav>
</div>

<div id="single-page">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
                <div class="col-lg-7 p-5 border shadow-sm">
                    <?php the_content();?>

                    <div class="col mt-2 text-center">
                        <div class="col">
                            <a href="https://jobaffinity.fr/apply/uxlpt6amipoyw7dy81" target="_blank" title="Postuler à l'offre <?php echo the_title_attribute();?>">
                                <button type="button" class="btn btn-primary" onclick="this.blur();">Postuler <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </a>
                        </div>
                        <div class="col mt-4">
                            <a class="" href="<?php echo get_site_url();?>"  title="Revenir aux offres d'emploi">
                                <i class="fa fa-angle-left" aria-hidden="true"></i> Revenir aux offres 
                            </a>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4 border shadow-sm p-5 text-start post-desc-right">
                        <div class="col">
                            <h6 class="mb-3">Date de publication</h2>
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted"><?php echo get_the_date(); ?></span>
                        </div>
                        <div class="col mt-4" >
                            <h6 class="mb-3">Type de contrat</h2>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $postcontract; ?>
                        </div>
                        <div class="col mt-4" >
                            <h6 class="mb-3">Ville</h2>
                            <i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $postlocation; ?>
                        </div>
                        <div class="col text-center mt-5">
                                <a href="https://jobaffinity.fr/apply/uxlpt6amipoyw7dy81" target="_blank" title="Postuler à l'offre <?php echo the_title_attribute();?>">
                                    <button type="button" class="btn btn-primary" onclick="this.blur();">Postuler <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                </a>
                        </div>
                </div>
        </div>
    </div>
 </div>


<?php 

get_footer();

?>