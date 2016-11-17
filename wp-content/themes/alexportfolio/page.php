<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage hnfcanada
 * @since hnfcanada 1.0
 */

get_header(); ?>

<!-- Content -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
			if(have_rows('content_layouts')) :
				while(have_rows('content_layouts')) : the_row();
		?>

			<?php if(get_row_layout() == 'single_column_layout'): ?>

				<?php get_template_part( 'partials/basic-page/basicpage', 'singlecolumn' ); ?>

			<?php elseif(get_row_layout() == 'multiple_column_layout' ): ?>

				<?php get_template_part( 'partials/basic-page/basicpage', 'multiplecolumn' ); ?>

			<?php elseif(get_row_layout() == 'project_showcase_layout' ): ?>

				<?php get_template_part( 'partials/basic-page/basicpage', 'projectshowcase' ); ?>

			<?php elseif(get_row_layout() == 'contact_section_layout' ): ?>

				<?php get_template_part( 'partials/basic-page/basicpage', 'contactsection' ); ?>

		<?php
					endif;
				endwhile;
			else :
			endif;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
