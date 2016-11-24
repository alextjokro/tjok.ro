<?php
/**
*
* @package Wordpress
* @subpackage alexportfolio
* @since alexportfolio 1.0
*/
?>

<?php
	$posts = get_sub_field('project_showcase');
	$classes = get_sub_field('custom_classes');
	if($post) :
?>
	<section class="layout layout-projectshowcase <?php echo $classes; ?>">
		<div class="container-fluid">
			<div class="row">
				<?php foreach($posts as $post) : //variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
					<?php
						//Variables 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'fullwidth' );
						$logo = get_field("project_logo", $post->ID);
						$logo_alt = $logo['alt'];
						$bg_color = get_field("primary_color", $post->ID);
						$opacity = 0.4;
					?>
					<a href="<?php the_permalink(); ?>" class="project-col col-xs-12 col-sm-6" style="background-image: url('<?php echo $thumb['0'];?>');">
						<div class="project-col__overlay" style="background-color: rgba(<?php echo $bg_color .','. $opacity; ?>);">
							<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo_alt; ?>">
						</div><!-- .project-col__overlay -->
					</a>
				<?php endforeach; ?>
			</div><!-- .row -->
		</div><!-- .container-fluid -->
	</section>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>