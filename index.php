<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<section class="slide"> 
		<div class="container">

			<div class="info-sl__slider slider">
						<?
							$pict = carbon_get_theme_option('slider_index');
							if($pict) {
								$pictIndex = 0;
								foreach($pict as $item) { 
									?>
								<div class="slider__item">
									<img src="<?php echo wp_get_attachment_image_src($item['slider_img'], 'full')[0];?>" alt="">
									<div class="info-sl__discounts">
										<? echo $item['slider_discount']; ?>
									</div>
									<div class="info-sl__text-new">  
										<h1><? echo $item['slider_title']; ?></h1>
										<p>
											<? echo $item['slider_subtitle']; ?>
										</p>
									</div>
								</div>
									<?
									$pictIndex++;
								}
							}
						?>
			</div>
		</section>

		<section class="products">
			<div class="container">
				<h2>Популярные товары</h2>

				<div class="prod-card d-flex">

					<?
					$args = array(
						'posts_per_page' => 8,
						'post_type' => 'voen',
						'tax_query' => array(
							array(
								'taxonomy' => 'voencat',
								'field' => 'id',
								'terms' => array(4)
							)
						)
					);
					$query = new WP_Query($args);

					foreach( $query->posts as $post ){
						$query->the_post();
						get_template_part('template-parts/product-elem');
					}  
					wp_reset_postdata();
					?>

				</div>

			</div>
		</section>

		<section id="cardinfo" class="cardinfo">
			<div class="container">

				<div class="cards d-flex">

					<a href="<?php echo get_category_link(13);?>" class="cards-item__img-l">  
						<img src="<?php echo get_template_directory_uri();?>/img/card/card-01.png" alt="">
						<div class="cards__text">
							<h3>Военная <br>
								одежда
							</h3>
							<div class="icon-cards"></div>
						</div>
					</a>

					<div class="cards-item__img-r d-flex">

						<a href="<?php echo get_category_link(12);?>" class="cards__img cards__img-1">
							<img src="<?php echo get_template_directory_uri();?>/img/card/card-02.png" alt="">
							<div class="cards__text">
								<h3>Форменная <br>
									одежда
								</h3>
								<div class="icon-cards"></div>
							</div>
						</a>

						<a href="<?php echo get_category_link(9);?>" class="cards__img cards__img-2">
							<img src="<?php echo get_template_directory_uri();?>/img/card/card-03.png" alt="">
							<div class="cards__text">
								<h3>Спецодежда
								</h3>
								<div class="icon-cards"></div>
							</div>
						</a>

						<a href="<?php echo get_category_link(14);?>" class="cards__img cards__img-3">
							<img src="<?php echo get_template_directory_uri();?>/img/card/card-04.png" alt="">
							<div class="cards__text">
								<h3>Медицинская <br>
									одежда
								</h3>
								<div class="icon-cards"></div>
							</div>
						</a>

						<a href="<?php echo get_category_link(3);?>" class="cards__img cards__img-4">
							<img src="<?php echo get_template_directory_uri();?>/img/card/card-05.png" alt="">
							<div class="cards__text">
								<h3>Охота <br>
									и рыбалка
								</h3>
								<div class="icon-cards"></div>
							</div>
						</a>

					</div>

				</div>

			</div>
		</section>

		<section id="newprod" class="newprod">
			<div class="container">
				<h2>Новинки</h2>

				<div class="prod-card d-flex">

					<?
					$args = array(
						'posts_per_page' => 8,
						'post_type' => 'voen',
						'tax_query' => array(
							array(
								'taxonomy' => 'voencat',
								'field' => 'id',
								'terms' => array(5)
							)
						)
					);
					$query = new WP_Query($args);

					foreach( $query->posts as $post ){
						$query->the_post();
						get_template_part('template-parts/product-elem');
					}  
					wp_reset_postdata();
					?>

				</div>


			</div>
		</section>

	</main>

	<?php get_footer(); ?>