<?php


//Limitation excerpt POST

function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



// Retrait de [] dans excerpt

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



function complement_support(){
    add_theme_support('title-tag'); 
    add_theme_support('custom-logo');
    add_theme_support("post-thumbnails");
}

add_action('after_setup_theme','complement_support');

function complement_style(){

    wp_enqueue_style( 'my-custom-style', get_template_directory_uri() . '/style.css', array('ms-bootstrap'), time() );
    wp_enqueue_style('ms-bootstrap',"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), 
    '5.1.3', 'All');
    wp_enqueue_style('ms-font',"https://use.fontawesome.com/releases/v5.7.0/css/all.css", array(), 
    '5.7.0', 'All');

}
add_action('wp_enqueue_scripts', 'complement_style');


function reinitialiser(){

    if($_GET){
        if((isset($_GET['s'])) or isset($_GET['location']) or isset(($_GET['activite']))){
            ?>
            <a href="<?php echo get_site_url(); ?>" class="mt-5">
                Actualiser <i class="fas fa-sync fa-spin"></i>
            </a>
            <?php
        }
}
}

?>