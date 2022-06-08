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
                Actualiser <i class="fas fa-sync fa-sync"></i>
            </a>
            <?php
        }
}
}


if ( ! function_exists ( 'pagination_post_nav' ) ) {
	function pagination_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
				<nav class="container navigation post-navigation">
					<div class="row nav-links justify-content-between">
						<?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous">%link</span>', '<' );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next">%link</span>',     '>');
							}
						?>
					</div>
				</nav>

		<?php
	}
}

if ( ! function_exists ( 'pagination_post' ) ) {
	function pagination_post( $args = array(), $class = 'pagination' ) {
        if ($GLOBALS['wp_query']->max_num_pages <= 1) return;
		$args = wp_parse_args( $args, array(
			'mid_size'           => 2,
			'prev_next'          => true,
			'prev_text'          => __('&laquo;'),
			'next_text'          => __('&raquo;'),
			'screen_reader_text' => __('Posts navigation'),
			'type'               => 'array',
			'current'            => max( 1, get_query_var('paged') ),
		) );
        $links = paginate_links($args);
        ?>

        <nav aria-label="<?php echo $args['screen_reader_text']; ?>">

            <ul class="pagination">

                <?php
                    foreach ( $links as $key => $link ) { ?>

                        <li class="page-item <?php echo strpos( $link, 'current' ) ? 'active' : '' ?>">

                            <?php echo str_replace( 'page-numbers', 'page-link', $link ); ?>

                        </li>

                <?php } ?>

            </ul>

        </nav>

        <?php
    }
}


?>