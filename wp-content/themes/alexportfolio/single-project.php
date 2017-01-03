<?php
/**
 * The template for displaying CUSTOM PROJECT POST Page
 *
 *
 * @package WordPress
 * @subpackage hnfcanada
 * @since hnfcanada 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php if( have_posts() ) : 
			while( have_posts() ) : the_post();

			$main_image = get_field("main_image");
			$main_image_thumb = $main_image['sizes']['bgimage-small'];
			$main_image_alt = $main_image["alt"];
			$overview = get_field("project_overview");
			$tools = get_field("project_tools");
			$bg_color = get_field("primary_color");
		?>
		
		<div class="project">

			<section class="project__header">
				<div class="project__header--bg" style="background-color: rgb(<?php echo $bg_color; ?>)"></div>
				<div class="container">
					<div class="section-title project__header--title row">
						<div class="col-xs-12">
							<h1><?php the_title(); ?></h1>
						</div>
					</div><!-- .project__header--title.section-title -->
					<div class="project__header--image">
						<div class="col-xs-12">
							<img src="<?php echo $main_image_thumb; ?>" alt="<?php echo $main_image_alt; ?>">
						</div>
					</div><!-- .project__header--image -->
				</div><!-- .container <-->
			</section><!-- .project__header -->

			<section class="project__overview">
				<div class="container">
					<div class="row">
						<div class="project__overview--text project__overview--col col-xs-12 col-sm-8">
							<h5>Project Overview</h5>
							<?php the_content(); ?>
						</div>
						<div class="project__overview--tools project__overview--col col-xs-12 col-sm-4">
							<h5>Tools</h5>
							<?php echo $tools; ?>
						</div><!-- .project__overview--tools -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .project__overview -->

			<?php if( have_rows('project_details') ) :
				while( have_rows('project_details') ) : the_row(); 

				$title = get_sub_field('section_title');
				$lead_p = get_sub_field('lead_paragraph');
				$image = get_sub_field('image');
				$image_thumb = $image['sizes']['bgimage-small'];
				$image_alt = $image['alt'];
				$bg_color = get_field("primary_color");
			?>	
				<section class="project__details">
					<div class="project__details--bg" style="background-color: rgb(<?php echo $bg_color; ?>)"></div>
					<div class="container">
						<div class="section-title project__details--title row">
							<div class="col-xs-12">
								<h2><?php echo $title; ?></h2>
							</div>
						</div><!-- .section-title.project__details--title -->
						<?php if($lead_p) : ?>
							<div class="project__details--text row">
								<div class="col-xs-12">
									<?php echo $lead_p; ?>
								</div>
							</div><!-- .project__details--text -->
						<?php endif; ?>
						<div class="project__details--image">
							<img src="<?php echo $image_thumb; ?>" alt="<?php echo $image_alt; ?>">
						</div>
					</div><!-- .container -->
				</section><!-- .project__details -->
			<?php 
				endwhile;
			else :
			endif;
			?>

			<?php
				$posts = get_field('other_works');
				if($posts) :
			?>
				<section class="project__others">
					<div class="container">
						<div class="section-title project__others--title row">
							<div class="col-xs-12">
								<h3>&dash; Other Works &dash;</h3>
							</div>
						</div><!-- .section-title.project__others--title -->
						<div class="row">
							<?php foreach($posts as $post): // variable must be called $post (IMPORTANT) ?>
								<?php setup_postdata($post); ?>
								<?php 
									// Variables
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'bgimage-small' );
									$bg_color = get_field("primary_color", $post->ID);
									$opacity = 0.2;
								?>
									<div class="col-xs-12 col-sm-6 others-column">
										<a href="<?php the_permalink(); ?>">
											<div class="others-image-container">
												<div class="others-image" style="background-image: url('<?php echo $thumb[0]; ?>');">
													<div class="others-image__overlay" style="background-color: rgba(<?php echo $bg_color .','. $opacity; ?>);"></div>
												</div><!-- .others-image -->
											</div><!-- .others-image-container -->
										</a>
										<div class="others-copy">
											<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
											<p><?php echo wp_trim_excerpt(); ?></p>
										</div><!-- .others-copy -->
									</div><!-- .others-column -->
							<?php endforeach; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- .project__others -->
			<?php endif; ?>

		</div><!-- .project -->

		<?php
			endwhile;
		else :
		endif; ?>

	</main><!-- #main.site-main -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>