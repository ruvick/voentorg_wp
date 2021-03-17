<div class="prod-card__body d-flex">

	<a href="<?echo get_the_permalink(get_the_ID());?>" class="prod-card__link">
		<img src="<?php  $imgTm = get_the_post_thumbnail_url( get_the_ID(), "tominiatyre" ); echo empty($imgTm)?get_bloginfo("template_url")."/img/no-photo.jpg":$imgTm; ?>" alt="<? the_title();?>">
	</a>

	<a href="<?echo get_the_permalink(get_the_ID());?>" class="prod-card__text d-flex">
		<h4><? the_title();?></h4>
		<div class="prod-card__price d-flex">
			<p class="prod-card__price-old"><?echo carbon_get_post_meta(get_the_ID(),"offer_old_price"); ?> руб.</p>
			<p class="prod-card__price-new"><?echo carbon_get_post_meta(get_the_ID(),"offer_price"); ?> руб.</p>
		</div>
		<p class="prod-card__benefit">ВЫГОДА: <span><?echo carbon_get_post_meta(get_the_ID(),"offer_benefit"); ?> РУБ.</span></p>
	</a>

	<div class="prod-card__button d-flex">
		<a href="#" class="prod-card__baskcet d-flex">В корзину</a>
		<a href="#" class="prod-card__order d-flex">Заказать</a>
	</div>
</div>




