<?php 

/*
Template Name: Шаблон карточки товара
Template Post Type: post, page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>   

<main class="page">

	<section class="card"> 
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h2><?the_title();?></h2>

			<div class="select-prod-block d-flex">

				<div class="select-prod-sl">
					<!-- Большой слайдер -->
					<div class="select-slider-big">

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-01.jpg">
								<img  src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-01.jpg" alt="">
							</a>
						</div>

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-02.jpg">
								<img  src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-02.jpg" alt="">
							</a>
						</div>

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-03.jpg">
								<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-03.jpg" alt="">
							</a>
						</div>

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-04.jpg">
								<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-04.jpg" alt="">
							</a>
						</div>

					</div>

					<!-- Малый слайдер -->
					<div class="select-prod-slider">

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-01.jpg" alt="">
						</div>

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-02.jpg" alt="">
						</div>

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-03.jpg" alt="">
						</div>

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-04.jpg" alt="">
						</div>

					</div>
				</div>

				<div class="actions-block">
					<div class="actions-block__availability">
						<div class="availability-flex d-flex">
							<div class="availability-icon active"></div>
							<div class="availability-text">В наличии</div>
						</div>
						<div class="actions-block__price">79 000 руб.</div>

						<form class="actions-block__form form-block" action="#">
							<div class="actions-block__form-item form-block__item">
								<p>Размер</p>
								<div class="actions-block__options options d-flex">
									<div class="option active">
										39
										<input type="radio" value="1" name="form[type]">
									</div>
									<div class="option">
										40
										<input type="radio" value="2" name="form[type]">
									</div>
									<div class="option">
										41
										<input type="radio" value="3" name="form[type]">
									</div>
									<div class="option">
										42
										<input type="radio" value="4" name="form[type]">
									</div>
									<div class="option">
										43
										<input type="radio" value="5" name="form[type]">
									</div>
								</div>
							</div>
							<button class="btn">Добавить в корзину</button>
						</form>
					</div>
					<div class="actions-block__text">
						<p>
							Военная торговля — система торгово-бытового обеспечения 
							военнослужащих,  также их семей. Российская система военной торговли 
							носит официальное название Главное управление торговли Министерства 
							обороны Российской Федерации, а в разговорной речи сокращенно 
							называется военторг. 
						</p>
						<p>
							Основными задачами военной торговли являются: торгово-бытовое 
							обеспечен войск (сил) на полевых учениях, манёврах и в лагерях, а также 
							в зонах конфликтов и чрезвычайных ситуаций; обеспечение товарами и 
							услугами военнослужащих и членов их семей в отдаленных.
						</p>
					</div>
				</div>

			</div>

		</div>
	</section>

	<section class="card-text d-flex">
		<div class="container">

			<div class="card-description d-flex">

				<div class="card-description__item">
					<h2>Описание</h2>
					<p>
						Военная торговля — система торгово-бытового обеспечения 
						военнослужащих,  также их семей. Российская система военной торговли 
						носит официальное название Главное управление торговли Министерства 
						обороны Российской Федерации, а в разговорной речи сокращенно 
						называется военторг. 
					</p>
					<p>
						Основными задачами военной торговли являются: торгово-бытовое 
						обеспечен войск (сил) на полевых учениях, манёврах и в лагерях, а также 
						в зонах конфликтов и чрезвычайных ситуаций; обеспечение товарами и 
						услугами военнослужащих и членов их семей в отдаленных.
					</p>
				</div>

				<div class="card-description__item">
					<h2>Характеристики</h2>

					<div class="tech-text__block d-flex">
						<div class="tech-text__item tech-text__item_left">
							Ведомство	 
						</div>
						<div class="tech-text__line"></div>
						<div class="tech-text__item">
							Обувь - Ботинки с высоким берцем
						</div>
					</div>

					<div class="tech-text__block d-flex tgrey">
						<div class="tech-text__item tech-text__item_left">
							Тип товара
						</div>
						<div class="tech-text__line"></div>
						<div class="tech-text__item tech-text__item_cold">
							Ботинки
						</div>
					</div>

					<div class="tech-text__block d-flex">
						<div class="tech-text__item tech-text__item_left">
							Цвет
						</div>
						<div class="tech-text__line"></div>
						<div class="tech-text__item tech-text__item_cold">
							Черный
						</div>
					</div>

					<div class="tech-text__block d-flex tgrey">
						<div class="tech-text__item tech-text__item_left">
							Материал
						</div>
						<div class="tech-text__line"></div>
						<div class="tech-text__item">
							Кожа (натуральная)
						</div>
					</div>

					<div class="tech-text__block d-flex">
						<div class="tech-text__item tech-text__item_left">
							Артикул товара
						</div>
						<div class="tech-text__line"></div>
						<div class="tech-text__item tech-text__item_cold">
							УТ000003690
						</div>

					</div>

				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>   
