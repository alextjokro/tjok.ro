<?php
/**
*
* @package Wordpress
* @subpackage alexportfolio
* @since alexportfolio 1.0
*/

	$title = get_sub_field('section_title');
	$text = get_sub_field('section_text');
	$classes = get_sub_field('custom_classes');
?>

<section class="layout layout-singlecolumn <?php echo $classes; ?>">
	<div class="container">
		<div class="row section-title">
			<div class="col-xs-12">
				<h2><?php echo $title; ?></h2>
			</div>
		</div><!-- .row -->
		<div class="row section-content">
			<div class="col-xs-12">
				<?php echo $text; ?>
			</div>
		</div><!-- .row.section-content -->
	</div><!-- .container -->
</section><!-- .layout.layout-singlecolumn -->