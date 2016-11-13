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
			$main_image_alt = $main_image["alt"];
			$overview = get_field("project_overview");
			$tools = get_field("project_tools");
			$bg_color = get_field("primary_color");
		?>
		
		<div class="project">

			<section class="project__header" style="background-color: <?php echo $bg_color; ?>">
				<div class="container">
					<div class="section-title project__header--title row">
						<div class="col-xs-12">
							<h1><?php the_title(); ?></h1>
						</div>
					</div><!-- .project__header--title.section-title -->
					<div class="project__header--image">
						<div class="col-xs-12">
							<img src="<?php echo $main_image["url"]; ?>" alt="<?php echo $main_image_alt; ?>">
						</div>
					</div><!-- .project__header--image -->
				</div><!-- .container <-->
			</section><!-- .project__header -->

			<section class="project__overview">
				<div class="container">
					<div class="row">
						<div class="project__overview--text col-xs-12 col-sm-8">
							<h4>Project Overview</h4>
							<?php the_content(); ?>
						</div>
						<div class="project__overview--tools col-xs-12 col-sm-4">
							<h4>Tools</h4>
							<?php echo $tools; ?>
						</div><!-- .project__overview--tools -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .project__overview -->

			<?php if( have_rows('project_details') ) :
				while( have_rows('project_details') ) : the_row(); 

				$title = get_field('section_title');
				$lead_p = get_field('lead_paragraph');
				$image = get_field('image');
				$image_alt = $image['alt'];
				$bg_color = get_field("primary_color");
			?>	
				<div class="project__details">
					<div class="project__details--bg" style="background-color: <?php echo $bg_color; ?>"></div>
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
							</div><!-- .project__details--title -->
						<?php endif; ?>
						<div class="project__details--image">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image_alt; ?>">
						</div>
					</div><!-- .container -->
				</div><!-- .project__details -->
			<?php 
				endwhile;
			else :
			endif;
			?>

			<?php
				$posts = get_field('other_works');
				if($posts) :
			?>
				<div class="project__others">
					<div class="container">
						<div class="section-title project__others--title row">
							<div class="col-xs-12">
								<h3>&dash; Other Works &dash;</h3>
							</div>
						</div><!-- .section-title.project__others--title -->
						<div class="row">
							<?php foreach($posts as $post): // variable must be called $post (IMPORTANT) ?>
								<?php setup_postdata($post); ?>
									<div class="col-xs-12 col-sm-6 others-column">

										<!-- MORE IMAGE CODE HERE -->

										<div class="others-copy">
											<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
											<p><?php echo wp_trim_excerpt(); ?></p>
										</div>

									</div><!-- .others-column -->

							<?php endforeach; ?>
						</div>
					</div><!-- .container -->
				</div><!-- .project__others -->
			<?php endif; ?>

		</div><!-- .project -->

		<?php
			endwhile;
		else :
		endif; ?>

	</main><!-- #main.site-main -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>