<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header(); ?>

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

			<h1>Результаты поиска</h1> 

			<div class="prod-card d-flex"> 
				<?php
					while(have_posts()):
						the_post();
						get_template_part('template-parts/product-elem');  
					endwhile;
				?>
			</div> 

		</div>
	</section>
</main>
<?php get_footer(); ?>   