<div class="prod-card__body d-flex">

	<a href="<?echo get_the_permalink(get_the_ID());?>" class="prod-card__link">
		<img src="<?php  $imgTm = get_the_post_thumbnail_url( get_the_ID(), "tominiatyre" ); echo empty($imgTm)?get_bloginfo("template_url")."/img/no-photo.jpg":$imgTm; ?>" alt="<? the_title();?>">
	</a>

	<a href="<?echo get_the_permalink(get_the_ID());?>" class="prod-card__text d-flex">
		<h4><?echo carbon_get_post_meta(get_the_ID(),"offer_name"); ?></h4>
		<div class="prod-card__price d-flex">
			<?php
				$price_old = carbon_get_post_meta(get_the_ID(),"offer_old_price");
					if( strlen($price_old) == 0 ) { 
						//echo '	Скидки нет';
				} else if ( $price_old === 0 || $price_old === '0' ) {
						//echo '<div class="availability-order">Скидки нет</div>';
				} else {
					echo "<p class='prod-card__price-old'> $price_old руб.</p>";
				}
			?>
			<p class="prod-card__price-new"><?echo carbon_get_post_meta(get_the_ID(),"offer_price"); ?> руб.</p>
		</div>
		<p class="prod-card__benefit"><span><?echo carbon_get_post_meta(get_the_ID(),"offer_nal"); ?></span></p>
	</a>

	<div class="prod-card__button d-flex">
		<!-- <a href="#" class="prod-card__baskcet d-flex">В корзину</a> -->
		<a href="<?echo get_the_permalink(get_the_ID());?>" class="prod-card__order d-flex">Подробнее</a>
	</div>
</div>




