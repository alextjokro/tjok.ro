<?php
/**
*
* @package Wordpress
* @subpackage alexportfolio
* @since alexportfolio 1.0
*/

	$title = get_sub_field('section_title');
	$classes = get_sub_field('custom_classes');
?>

<section class="layout layout-multiplecolumn <?php echo $classes; ?>">
	<div class="container">
		<div class="row section-title">
			<div class="col-xs-12">
				<h2><?php echo $title; ?></h2>
			</div>
		</div><!-- .row.section-title -->
		
		<?php

		// predefine the allowed columns
		$allowed_classnames = array(
			2	=>	'column column-2 col-xs-12 col-sm-6',
			3	=>	'column column-3 col-xs-12 col-sm-4',
			4	=>	'column column-4 col-xs-12 col-sm-6 col-md-3'
		);

		// get the count on the repeater field
		$number_of_cols = count(get_sub_field('column_content'));

		// set a default classname
		$classname_to_use = $allowed_classnames[1];

		// check if the $number_of_cols exist in the predefined classnames
		if ( array_key_exists( $number_of_cols , $allowed_classnames ) ) {
	    // set the classname to be used
	    $classname_to_use = $allowed_classnames[$number_of_cols];
		}

		if( have_rows('column_content') ) : ?>
			<div class="row">

			<?php while(have_rows('column_content')) : the_row(); 
				$image = get_sub_field('column_image');
				$imageAlt = $image['alt'];
				$text = get_sub_field('column_text');
			?>
		
				<div class="<?php echo esc_attr($classname_to_use); ?>">
					<?php if($image) : ?>
						<figure class="column-img-container">
							<img src="<?php echo $image["url"] ?>" alt="<?php echo $imageAlt; ?>" />
						</figure><!-- .column-img-container -->
					<?php endif; ?>
					<?php if($text) : ?>
						<div class="column-text-container">
							<?php echo $text; ?>
						</div><!-- .column-text-container -->
					<?php endif; ?>
				</div>

			<?php endwhile; ?>
			</div><!-- .row -->
		<?php endif; ?>
	</div><!-- .container -->
</section><!-- .layout.layout-multiplecolumn -->