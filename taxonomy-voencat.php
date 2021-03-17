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
					Военная торговля — система торгово-бытового обеспечения военнослужащих, а также их семей. Российская система военной торговли носит 
					официальное название Главное управление торговли Министерства обороны Российской Федерации (ГУТ Минобороны России), а в разговорной речи 
					сокращенно называется военторг. Основными задачами военной торговли являются:
					торгово-бытовое обеспечение войск (сил) на полевых учениях, манёврах и в лагерях, а также в зонах конфликтов и чрезвычайных ситуаций; 
					обеспечение товарами и услугами военнослужащих и членов их семей в отдаленных и малочисленных гарнизонах и в закрытых административно-
					территориальных образованиях.
				</p>

				<p>
					Главным звеном в военной торговле являются войсковые и солдатские магазины на закрытой территории воинских частей, обеспечивающие товарами 
					повседневного спроса военнослужащих и членов их семей, а также личный состав подразделений. Кроме продажи товаров, структуры военной 
					торговли имеют в своей сети ателье для пошива повседневного и парадного обмундирования, фотоателье, мастерские по пошиву и ремонту обуви, 
					часовые мастерские, прокатные пункты.
				</p>

				<p>
					Для снабжения дальних гарнизонов и небольших воинских частей, где содержание постоянного пункта торговли экономически нецелесообразно, 
					используются выездные торговые пункты — торговые пункты на морских судах, на средствах малой авиации, на грузовых автомобилях (так называемые 
					автолавки). На 2017 год в соединениях и воинских частях, дислоцированных на территории России и за ее пределами, функционирует более 2300 
					объектов «Военторга». Военная торговля — система торгово-бытового обеспечения военнослужащих, а также их семей. Российская система военной 
					торговли носит официальное название Главное управление торговли Министерства обороны Российской Федерации (ГУТ Минобороны России), а в разговорной речи 
					сокращенно называется военторг.
				</p>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>  