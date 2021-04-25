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

<!-- 			<nav class="pagination d-flex">
				<div class="pagination__nav-links d-flex">
					<a class="pagination__back" href="#"></a>
					<span class="pagination__numbers">1</span>
					<a class="pagination__numbers current" href="#">2</a>
					<a class="pagination__numbers" href="#">3</a>
					<a class="pagination__numbers" href="#">4</a>
					<div class="pagination__block-dot d-flex">
						<span class="pagination__dot">.</span>
						<span class="pagination__dot">.</span>
						<span class="pagination__dot">.</span>
					</div>
					<a class="pagination__numbers" href="#">10</a>
					<a class="pagination__next" href="#"></a>
				</div>
			</nav>

			<nav class="navigation pagination" role="navigation">
			</nav> -->

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