<?php
/**
*
* @package Wordpress
* @subpackage alexportfolio
* @since alexportfolio 1.0
*/

	$title = get_sub_field('section_title');
	$form = get_sub_field('contact_form');
	$classes = get_sub_field('custom_classes');
?>

<section class="layout layout-contactsection <?php echo $classes; ?>">
	<div class="container">
		<div class="row section-title">
			<div class="col-xs-12">
				<h3><?php echo $title; ?></h3>
			</div>
		</div><!-- .row.section-title -->
		<?php if($form) : ?>
			<div class="row section-form">
				<div class="col-xs-12">
					<?php echo $form; ?>
				</div>
			</div><!-- .row.section-form -->
		<?php endif; ?>
		<?php if( have_rows('social_media') ) : ?>
			<ul class="social">
			<?php while( have_rows('social_media') ) : the_row(); 
				$icon = get_sub_field('social_icon');
				$url = get_sub_field('social_url');
				$title = get_sub_field('social_title');
			?>
				
				<li>
					<a href="<?php echo $url; ?>" title="<?php echo $title; ?>" target="_blank">
						<i class="fa <?php echo $icon; ?> fa-2x"></i>
					</a>
				</li>

			<?php endwhile; ?>
			</ul><!-- .social -->
		<?php endif; ?>
	</div><!-- .container -->
</section><!-- .layout.layout-contactsection -->