		<header class="header-top">
			<div class="container">
				<?php wp_nav_menu( array('theme_location' => 'menu_corp','menu_class' => 'header-top__menu','container_class' => 'header-top__menu','container' => false )); ?>
			</div>
		</header> 

		<header id="header" class="header">  
			<div class="container">
				<div class="header__row d-flex">
					<a href="http://tmp.1voentorg.ru" class="header__logo logo-icon"></a>

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
							<p><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="callback__phone"><? echo $tel = carbon_get_theme_option("as_phones_1"); ?></a></p>
							<a href="#" class="callback__popup">ЗАКАЗАТЬ ЗВОНОК</a>
						</div>
						<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="mob-callback__phone"></a>

						<div class="header__bascket-block d-flex">
							<a href="#" class="header__bascket">Корзина</a>
							<div class="header__bascket-icon d-flex">
								<a href="#" class="bascket-icon-1 d-flex"></a>
								<div class="bascket-icon-2 d-flex">99+</div>
							</div>
						</div>
					</div>

				</div>
				<nav class="mob-menu">
					<div class="mob-menu__df d-flex">
						<ul class="mob-menu__list">
							<li><a href="#">Галантерея</a></li>
							<li><a href="#">Головные уборы</a></li>
							<li><a href="#">Кобуры, ремни и портупеи</a></li>
							<li><a href="#">Маски</a></li>
							<li><a href="#">Медали</a></li>
							<li><a href="#">Новинки</a></li>
							<li><a href="#">Обувь</a></li>
						</ul>
						<ul>
							<li><a href="#">Одежда</a></li>
							<li><a href="#">Печатная продукция</a></li>
							<li><a href="#">Пневматическое оружие, сабли, шашки, ножи</a></li>
							<li><a href="#">Погоны, шевроны, нашивки,курсовки</a></li>
							<li><a href="#">Рюкзаки</a></li>
							<li><a href="#">Снаряжение</a></li>
						</ul>
						<ul class="mob-menu__list">
							<li><a href="#">Галантерея</a></li>
							<li><a href="#">Головные уборы</a></li>
							<li><a href="#">Кобуры, ремни и портупеи</a></li>
							<li><a href="#">Маски</a></li>
							<li><a href="#">Медали</a></li>
							<li><a href="#">Новинки</a></li>
							<li><a href="#">Обувь</a></li>
						</ul>
						<ul>
							<li><a href="#">Одежда</a></li>
							<li><a href="#">Печатная продукция</a></li>
							<li><a href="#">Пневматическое оружие, сабли, шашки, ножи</a></li>
							<li><a href="#">Погоны, шевроны, нашивки,курсовки</a></li>
							<li><a href="#">Рюкзаки</a></li>
							<li><a href="#">Снаряжение</a></li>
						</ul>
						<ul class="mob-menu__addit">
							<li><a href="#">Помощь</a></li>
							<li><a href="#">Оплата</a></li>
							<li><a href="#">Доставка</a></li>
							<li><a href="#">О компании</a></li>
							<li><a href="#">Бренды</a></li>
							<li><a href="#">Контакты</a></li> 
						</ul>
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