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
							<div class="availability-text"><?echo carbon_get_post_meta(get_the_ID(),"offer_nal"); ?></div>
						</div>
						<div class="actions-block__price"><?echo carbon_get_post_meta(get_the_ID(),"offer_price"); ?> руб.</div>
						<span class="spacer__vendor">Артикул: <? echo carbon_get_post_meta(get_the_ID(),"offer_sku"); ?></span>

						<form class="actions-block__form form-block" action="#">
							<div class="actions-block__form-item form-block__item">
								<p>Размер</p>
								<div class="actions-block__options options d-flex">
								<?
									$size_chart = carbon_get_the_post_meta('size_chart_complex');
										if($size_chart) {
									$size_chartIndex = 0;
									foreach($size_chart as $chart) { 
								?>
									<div class="option">
										<? echo $chart['size_chart']; ?>
									<input type="radio" value="1" name="form[type]">
									</div>
								<?
									$size_chartIndex++;
										}
									}
								?>
								</div>
							</div>
							<button class="btn btn__to-card" onclick = "add_tocart(this, 0); return false;"
                				data-price = "<?echo carbon_get_post_meta(get_the_ID(),"offer_price"); ?>"
								data-sku = "<? echo carbon_get_post_meta(get_the_ID(),"offer_sku")?>"
								data-size = "<? echo $chart['size_chart']; ?>"
                				data-oldprice = "<? echo carbon_get_post_meta(get_the_ID(),"offer_old_price")?>"
                				data-lnk = "<? echo  get_the_permalink(get_the_ID());?>"
                				data-name = "<? echo  get_the_title();?>"
                				data-count = "1"
                				data-picture = "<?php echo wp_get_attachment_image_src($item['gal_img'], 'large')[0];?>"  
            >Добавить в корзину
						</button> 
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

					<?
						$cherect = carbon_get_the_post_meta('offer_cherecter');
							if($cherect) {
						$cherectIndex = 0;
							foreach($cherect as $cher) { 
						?>
						<div class="tech-text__block d-flex">
							<div class="tech-text__item tech-text__item_left">
								<? echo $cher['c_name']; ?>
							</div>
							<div class="tech-text__line"></div>
							<div class="tech-text__item">
								<? echo $cher['c_val']; ?>
							</div>
						</div>
						<?
							$cherectIndex++;
							}
						}
					?>
					</div>

				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>   
