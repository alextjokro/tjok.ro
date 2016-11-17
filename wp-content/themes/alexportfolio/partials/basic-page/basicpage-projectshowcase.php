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
	$logo = get_sub_field('project_logo');
	$logo_alt = $logo['alt'];
	$classes = get_sub_field('custom_classes');
	if($post) :
?>
	<section class="layout layout-projectshowcase <?php echo $classes; ?>">
		<div class="container-fluid">
			<div class="row">
				<?php foreach($posts as $post) : //variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" class="project-col col-xs-12 col-sm-6" style="background-image: url('<?php the_post_thumbnail(); ?>');">
						<div class="project-col__overlay"></div>
						<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo_alt; ?>">
					</a>
				<?php endforeach; ?>
			</div><!-- .row -->
		</div><!-- .container-fluid -->
	</section>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>