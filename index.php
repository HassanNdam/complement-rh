<?php

get_header();

?>

<!-- Formulaire de recherche -->

<div class="container position-relative text-center bg-light-transparent p-5">
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
					<button type="submit" id="searchsubmit" class="rechercher">Rechercher des offres</button>
				</div>
			</div>
		</form>
</div>

<div class="container mt-5 mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item accueil"><a href="<?php echo get_site_url();?>">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Nos offres</li>
    </ol>
    </nav>
</div>


<!-- Affichage poste -->

<div class="container mt-5 mb-5 border rounded-0">
    <div class="row justify-content-center">
        <div class="col-lg-5 p-4">
            <h4>Titre du poste</h4>
            <p class="mt-3 text-desc-offre">
                Vous intervenez sur une opération de bureaux en conception/réalisation d'un montant de 50 millions d'euros. Les corps d'états représentent 20 millions d'euros.
            </p>
        </div>
        <div class="col-lg-4 p-4">.col-sm-3</div>
        <div class="col-lg-3 p-4">
            <a href="<?php the_permalink();?>">
                 <button type="submit"  class="btn rechercher text-white">Voir l'offre</button>
             </a>
        </div>
    </div>
</div>

<?php

get_footer();

?>