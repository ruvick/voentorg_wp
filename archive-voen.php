<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<section class="category"> 
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 
			
			<h2><?php single_cat_title( '', true );?></h2>

			<div class="prod-card d-flex"> 
				<?php
				while(have_posts()):
					the_post();
					get_template_part('template-parts/product-elem');  
				endwhile;
				?>
			</div> 

			<?php if ( function_exists( 'wp_corenavi' ) ) wp_corenavi(); ?>
		</div>
	</section>

	<section class="category-description"> 
		<div class="container">
			<div class="category-description__text">
				<p>
					<?php echo category_description(); ?>
				</p>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>  