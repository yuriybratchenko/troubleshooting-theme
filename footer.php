<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Troubleshooting
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info row">
				<?php
					troubleshooting_footer_copyright();
					troubleshooting_footer_social();
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
