<?php get_header(); 

/**
 * Template Name: Шаблон страницы Контакты
 * Template Post Type: page
 */

?>

<?php get_template_part('template-parts/header-section');?>

<main class="main page">	

	<section class = "contacts content">
		<div class="container">

		<div class="bread-crumbs-box">
			<div class="container">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>  
			</div>
		</div>
			<h1><?php the_title();?></h1>

			<ul>
				<li>Организация: <? echo carbon_get_theme_option("as_company"); ?></li>
				<li>Адрес: <? echo carbon_get_theme_option("as_address"); ?></li>
				<li>ИНН: <? echo carbon_get_theme_option("as_inn"); ?></li>
				<li>КПП: <? echo carbon_get_theme_option("as_kpp"); ?></li>
				<li>ОРГН: <? echo carbon_get_theme_option("as_orgn"); ?></li>
				<li>Р/С: <? echo carbon_get_theme_option("as_rs"); ?></li>
				<li>К/С: <? echo carbon_get_theme_option("as_ks"); ?></li>
				<li>БИК: <? echo carbon_get_theme_option("as_bik"); ?></li>
				<li>Email: <a href="mailto:<? echo $mail = carbon_get_theme_option("as_email"); ?>"><? echo $mail; ?></a></li>
				<li>Тел: <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel = carbon_get_theme_option("as_phones_1"); ?></a></li>
			</ul>

			<div class="block__map" id="map"></div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

<script>
					// Яндекс карта
					ymaps.ready(init);

					function init () {
						var myMap = new ymaps.Map("map", {
        				// Координаты центра карты
        				center:[<?php echo carbon_get_theme_option('map_point') ?>],
        				// Масштаб карты
        				zoom: 17,
        				// Выключаем все управление картой
        				controls: []
        			}); 
						
						var myGeoObjects = [];
						
    						// Указываем координаты метки
    						myGeoObjects = new ymaps.Placemark([<?php echo carbon_get_theme_option('map_point') ?>],{
    							balloonContentBody: '<?php echo carbon_get_theme_option('text_map') ?>',
    						},{
    							iconLayout: 'default#image',
                    // Путь до нашей картинки
                    iconImageHref: '<?php bloginfo("template_url"); ?>/img/icons/map.png',  
                    // Размеры иконки
                    iconImageSize: [23, 34],
                    // Смещение верхнего угла относительно основания иконки
                    iconImageOffset: [-5, -40]
                });
    						
    						var clusterer = new ymaps.Clusterer({
    							clusterDisableClickZoom: false,
    							clusterOpenBalloonOnClick: false,
    						});
    						
    						clusterer.add(myGeoObjects);
    						myMap.geoObjects.add(clusterer);
    							// Отключим zoom
    							myMap.behaviors.disable('scrollZoom');

    						}
    					</script>


		</div>
	</section>

</main>

<?php get_footer(); ?>