<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="main page">	

	<section class = "content">
		<div class="container">

			<div class="bread-crumbs-box">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); 
					}
				?>  
			</div>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				<?php the_content();?>
				<?php endwhile;?> 
				<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>