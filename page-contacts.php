<?php get_header(); 

/**
 * Template Name: Шаблон страницы Контакты
 * Template Post Type: page
 */

?>

<?php get_template_part('template-parts/header-section');?>

<main class="main page">	

	<section class = "contacts">
		<div class="container">

		<div class="bread-crumbs-box">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>  
		</div>
			<h1><?php the_title();?></h1>

      <h2>Наши магазины:</h2>

			<ul>
				<li>Адрес магазина: <p><? echo carbon_get_theme_option("as_address"); ?></p></li>
				<li>Тел.магазина: <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel = carbon_get_theme_option("as_phones_1"); ?></a></li>
				<li>Email: <a href="mailto:<? echo $mail = carbon_get_theme_option("as_email"); ?>"><? echo $mail; ?></a></li>
				<li>Соц.сети: <a href="<? echo carbon_get_theme_option("text', 'as_vk"); ?>"></a></li>
			</ul>

			<ul>
				<li>Адрес магазина: <p><? echo carbon_get_theme_option("as_address_2"); ?></p></li>
				<li>Тел.магазина: <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel = carbon_get_theme_option("as_phone_2"); ?></a></li>
				<li>Email: <a href="mailto:<? echo $mail = carbon_get_theme_option("as_email_2"); ?>"><? echo $mail; ?></a></li>
			</ul>

			<ul>
				<li>Адрес магазина: <p><? echo carbon_get_theme_option("as_address_3"); ?></p></li>
				<li>Тел.магазина: <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel = carbon_get_theme_option("as_phone_3"); ?></a></li>
			</ul>

			<ul>
				<li>Адрес магазина: <p><? echo carbon_get_theme_option("as_address_4"); ?></p></li>
				<li>Тел.магазина: <a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel = carbon_get_theme_option("as_phone_4"); ?></a></li>
				<li>Режим работы: <p><? echo carbon_get_theme_option("as_schedule"); ?></p></li>
			</ul>

		</div>

<div class="block__map" id="map"></div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
<script type="text/javascript">
   ymaps.ready(init);

   function init () {

    var myMap = new ymaps.Map("map", {
		center:[<?php echo carbon_get_theme_option('map_point') ?>],
     zoom: 12,
           			// Выключаем все управление картой
           			controls: []

           		}); 


    var myGeoObjects = [];

    myGeoObjects[0] = new ymaps.Placemark([<?php echo carbon_get_theme_option('map_point') ?>],{
                                // Свойства. 
                                // hintContent: '<div class="map-hint">Авто профи, Курск, ул.Комарова, 16</div>',
                                balloonContent: '<?php echo carbon_get_theme_option('text_map') ?>',
                            },{
                                // Необходимо указать данный тип макета.
                                iconLayout: 'default#image',
                                iconImageHref: '<?php bloginfo("template_url"); ?>/img/icons/map.png',
                                // Размеры метки.
																iconImageSize: [23, 34],
                    						// Смещение верхнего угла относительно основания иконки
                    						iconImageOffset: [-5, -40]
                            });

    myGeoObjects[1] = new ymaps.Placemark([<?php echo carbon_get_theme_option('map_point_2') ?>],{
                                // Свойства. 
                                // hintContent: '<div class="map-hint">Авто профи , Курск, ул.Гунатовская, 32</div>',
                                balloonContent: '<?php echo carbon_get_theme_option('text_map_2') ?>',
                            },{
                                // Необходимо указать данный тип макета.
                                iconLayout: 'default#image',
                                iconImageHref: '<?php bloginfo("template_url"); ?>/img/icons/map.png',
                                // Размеры метки.
																iconImageSize: [23, 34],
                    						// Смещение верхнего угла относительно основания иконки
                    						iconImageOffset: [-5, -40]
                            }); 
                            
    myGeoObjects[2] = new ymaps.Placemark([<?php echo carbon_get_theme_option('map_point_3') ?>],{
                                // Свойства. 
                                // hintContent: '<div class="map-hint">Авто профи , Курск, ул.Гунатовская, 32</div>',
                                balloonContent: '<?php echo carbon_get_theme_option('text_map_3') ?>',
                            },{
                                // Необходимо указать данный тип макета.
                                iconLayout: 'default#image',
                                iconImageHref: '<?php bloginfo("template_url"); ?>/img/icons/map.png',
                                // Размеры метки.
																iconImageSize: [23, 34],
                    						// Смещение верхнего угла относительно основания иконки
                    						iconImageOffset: [-5, -40]
                            }); 

// var clusterIcons=[{
//         href:'img/map-marker.svg',
//         size:[31,40],
//         offset:[0,0]
// }];

var clusterer = new ymaps.Clusterer({
	clusterDisableClickZoom: false,
	clusterOpenBalloonOnClick: false,
        // Устанавливаем стандартный макет балуна кластера "Карусель".
        clusterBalloonContentLayout: 'cluster#balloonCarousel',
        // Устанавливаем собственный макет.
           // clusterBalloonItemContentLayout: customItemContentLayout,
        // Устанавливаем режим открытия балуна. 
        // В данном примере балун никогда не будет открываться в режиме панели.
        clusterBalloonPanelMaxMapArea: 0,
        // Устанавливаем размеры макета контента балуна (в пикселях).
        clusterBalloonContentLayoutWidth: 300,
        clusterBalloonContentLayoutHeight: 200,
        // Устанавливаем максимальное количество элементов в нижней панели на одной странице
        clusterBalloonPagerSize: 5
        // Настройка внешего вида нижней панели.
        // Режим marker рекомендуется использовать с небольшим количеством элементов.
        // clusterBalloonPagerType: 'marker',
        // Можно отключить зацикливание списка при навигации при помощи боковых стрелок.
        // clusterBalloonCycling: false,
        // Можно отключить отображение меню навигации.
        // clusterBalloonPagerVisible: false
    });

clusterer.add(myGeoObjects);
myMap.geoObjects.add(clusterer);
myMap.behaviors.disable('scrollZoom');
}
</script>

	</section>

</main>

<?php get_footer(); ?>