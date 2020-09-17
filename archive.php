<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Troubleshooting
 */

get_header();
?>

	<main id="primary" class="site-main"><?php

        if ( have_posts() ) {

            $done = false;

            if ( function_exists( 'jet_theme_core' ) ) {
                $done = jet_theme_core()->locations->do_location( 'croco_archive' );
            }

            if ( ! $done ) {

                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

                the_posts_navigation();

            }

        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
