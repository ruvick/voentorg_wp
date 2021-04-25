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
					<?
						$pict = carbon_get_the_post_meta('offer_picture');
						if($pict) {
							$pictIndex = 0;
							foreach($pict as $item) {
								?>
								<div class="select-slider-big__item">
									<a class="fancybox" data-fancybox="gallery" href="<?php echo wp_get_attachment_image_src($item['gal_img'], 'full')[0];?>">
										<img
										id = "pict-<? echo empty($item['gal_img_sku'])?$pictIndex:$item['gal_img_sku']; ?>" 
										alt = "<? echo $item['gal_img_alt']; ?>"
										title = "<? echo $item['gal_img_alt']; ?>"
										src = "<?php echo wp_get_attachment_image_src($item['gal_img'], 'full')[0];?>" />

									</a>
								</div>

								<?
								$pictIndex++;
							}
						}
						?>
					</div>

					<!-- Малый слайдер -->
					<div class="select-prod-slider">
					<?
						$pict = carbon_get_the_post_meta('offer_picture');
						if($pict) {
							$pictIndex = 0;
							foreach($pict as $item) {
								?>
								<div class="select-prod-slider__item">
									<img 
									data-indexelem = "<?echo $i;?>"
									id = "<? echo $item['gal_img_sku']; ?>" 
									alt = "<? echo $item['gal_img_alt']; ?>"
									title = "<? echo $item['gal_img_alt']; ?>"
									src = "<?php echo wp_get_attachment_image_src($item['gal_img'], 'large')[0];?>" />
								</div>
								<?
								$pictIndex++;
							}
						}
						?>
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
							<?echo carbon_get_post_meta(get_the_ID(),"offer_smile_descr"); ?>
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
						<?echo carbon_get_post_meta(get_the_ID(),"offer_fulltext"); ?>
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
