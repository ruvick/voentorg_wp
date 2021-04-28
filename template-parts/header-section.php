		<header class="header-top">
			<div class="container">
				<?php wp_nav_menu( array('theme_location' => 'menu_corp','menu_class' => 'header-top__menu','container_class' => 'header-top__menu','container' => false )); ?>
			</div>
		</header> 

		<header id="header" class="header">  
			<div class="container">
				<div class="header__row d-flex">
					<a href="https://shop.1voentorg.ru" class="header__logo logo-icon"></a>

					<div class="header__info d-flex"> 
						<div class="menu__icon icon-menu">   
							<span></span>
							<span></span>
							<span></span> 
						</div>

						<div class="header__search search">
						<form role="search" method="get" id="searchform" class="search" action="<?php echo home_url( '/' ) ?>">
							<input type="text" placeholder="Поиск по сайту" class="search__input input" value="<?php echo get_search_query() ?>" name="s" id="s">
							<button type="submit" tabindex="2" id="searchsubmit" class="sub-search" value=""></button> 
						</form>
						</div>
						<button class="mob-search"></button>

						<div class="header__callback callback d-flex">
							<p><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="callback__phone"><? echo $tel = carbon_get_theme_option("as_phones_header"); ?></a></p>
							<a href="#" class="callback__popup">ЗАКАЗАТЬ ЗВОНОК</a>
						</div>
						<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="mob-callback__phone"></a>

						<div class="header__bascket-block d-flex">
							<a href="<?php echo get_permalink(164);?>" class="header__bascket">Корзина</a>
							<div class="header__bascket-icon d-flex">
								<a href="<?php echo get_permalink(164);?>" class="bascket-icon-1 d-flex"></a> 
								<a href="<?php echo get_permalink(164);?>" class="bascket-icon-2 bascet_counter d-flex">0</a>
							</div>
						</div>
					</div>

				</div>
				<nav class="mob-menu">
					<div class="mob-menu__df d-flex">
						<?php wp_nav_menu( array('theme_location' => 'menu_cat','menu_class' => 'mob-menu__list','container_class' => 'mob-menu__list','container' => false )); ?>
					</div>
				</nav>
			</div>
		</header>

		<header class="header-bottom">
			<div class="container">
				<div class="menu__body">
					<?php wp_nav_menu( array('theme_location' => 'menu_main','menu_class' => 'menu__list','container_class' => 'menu__list','container' => false )); ?>
				</div>

			</div>
		</header> 