<?php

define("COMPANY_NAME", "Магазин Военторг");
define("MAIL_RESEND", "noreply@1voentorg.ru");

add_action( 'carbon_fields_register_fields', 'boots_register_custom_fields' );
function boots_register_custom_fields() {
// путь к пользовательскому файлу определения поля (полей), измените под себя
require_once __DIR__ . '/inc/custom-fields-options/metaboxes.php';
require_once __DIR__ . '/inc/custom-fields-options/theme-options.php';
}
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
require_once( get_template_directory() . '/inc/carbon-fields/vendor/autoload.php' );
\Carbon_Fields\Carbon_Fields::boot();   
}

//-----Блок описания вывода меню
// 1. Осмысленные названия для алиаса и для описания на русском.
// если это меню в подвали пишем - Меню в подвале 
// если в шапке то пишем - Меню в шапке 
// если 2 меню в шапке пишем  - Меню в шапке (верхняя часть)

register_nav_menus(
	array(
		'menu_corp' => 'Общекорпоративное меню (верхняя шапка)', 
		'menu_main' => 'Меню основное',
		'menu_cat' => 'Меню каталога',  
	)
);

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	// if( 30 === $item->ID  && 'menu_corp' === $args->theme_location ){
	// 	$classes[] = 'link__drop-down';
	// }

	if( 59 === $item->ID  && 'menu_main' === $args->theme_location ){
		$classes[] = 'menu__catalogy menu__link-cat';
	}

	return $classes;
} 

// Добавление стилей к пунктам меню
// add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

// function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
// 	if( 30 === $item->ID  && 'menu_corp' === $args->theme_location ){
// 		$classes[] = 'link__drop-down';
// 	}

// 	if( 34 === $item->ID  && 'menu_main' === $args->theme_location ){
// 		$classes[] = 'menu__catalogy';
// 	}

// 	return $classes;
// }

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 185, 185 ); 

add_post_type_support( 'page', 'excerpt' );

// Подключение стилей и nonce для Ajax в админку 
add_action('admin_head', 'my_assets_admin');
function my_assets_admin(){
	wp_enqueue_style("style-adm",get_template_directory_uri()."/style-admin.css");
	
	wp_localize_script( 'jquery', 'allAjax', array(
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
}

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 
add_action( 'wp_enqueue_scripts', 'my_assets' );
	function my_assets() {

		// Подключение стилей 

		$style_version = "1.0.1";
		$scrypt_version = "1.0.1";
		
		wp_enqueue_style("style-modal", get_template_directory_uri()."/css/jquery.arcticmodal-0.3.css", array(), $style_version, 'all'); //Модальные окна (стили)
		wp_enqueue_style("style-lightbox", get_template_directory_uri()."/css/lightbox.min.js", array(), $style_version, 'all'); //Лайтбокс (стили)
		wp_enqueue_style("style-slik", get_template_directory_uri()."/css/slick.css", array(), $style_version, 'all'); //Слайдер (стили)
		wp_enqueue_style("style-fancybox", get_template_directory_uri()."/css/fancybox.css", array(), $style_version, 'all'); //fancybox (стили)

		wp_enqueue_style("main-style", get_stylesheet_uri(), array(), $style_version, 'all' ); // Подключение основных стилей в самом конце

		// Подключение скриптов
		
		wp_enqueue_script( 'jquery');

		wp_enqueue_script( 'amodal', get_template_directory_uri().'/js/jquery.arcticmodal-0.3.min.js', array(), $scrypt_version , true); //Модальные окна
		wp_enqueue_script( 'mask', get_template_directory_uri().'/js/jquery.inputmask.bundle.js', array(), $scrypt_version , true); //маска для инпутов
		wp_enqueue_script( 'lightbox', get_template_directory_uri().'/js/lightbox.min.js', array(), $scrypt_version , true); //Лайтбокс
		wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.min.js', array(), $scrypt_version , true); //Слайдер
		wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.min.js', array(), $scrypt_version , true); //fancybox

		wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array(), $scrypt_version , true); // Подключение основного скрипта в самом конце
		
		if ( is_page(164))
		{
			wp_enqueue_script( 'vue', get_template_directory_uri().'/js/vue.js', array(), ALL_VERSION , true);
			wp_enqueue_script( 'axios', get_template_directory_uri().'/js/axios.min.js', array(), ALL_VERSION , true);
			wp_enqueue_script( 'bascet', get_template_directory_uri().'/js/bascet.js', array(), ALL_VERSION , true);
		}
		
		wp_localize_script( 'main', 'allAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' ) 
		) );
	}



	// Заготовка для вызова ajax
	add_action( 'wp_ajax_aj_fnc', 'aj_fnc' );
	add_action( 'wp_ajax_nopriv_aj_fnc', 'aj_fnc' );

	function aj_fnc() {
		if ( empty( $_REQUEST['nonce'] ) ) {
			wp_die( '0' );
		}
		
		if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {


			
		} else {
			wp_die( 'НО-НО-НО!', '', 403 );
		}
	}

	function wp_corenavi() {
		global $wp_query;
		$total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$a['total'] = $total;
		$a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
		$a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
		$a['prev_text'] = ''; // текст ссылки "Предыдущая страница"
		$a['next_text'] = ''; // текст ссылки "Следующая страница"
	
		if ( $total > 1 ) echo '<nav class="pagination">';
		echo paginate_links( $a );
		if ( $total > 1 ) echo '</nav>';
	}


	//Добавление "Цитаты" для страниц
	function page_excerpt() {
		add_post_type_support('page', array('excerpt'));
	}
	add_action('init', 'page_excerpt');


	// Регистрация кастомного поста

	add_action( 'init', 'create_taxonomies' );

	function create_taxonomies(){
	
		register_taxonomy('voencat', array('voen'), array(
			'hierarchical'  => true,
			'labels'        => array(
				'name'              => "Категория товара",
				'singular_name'     => "Категория товара",
				'search_items'      => "Найти категорию товара",
				'all_items'         => __( 'Все категории' ),
				'parent_item'       => __( 'Дочерние категории' ),
				'parent_item_colon' => __( 'Дочерние категории:' ),
				'edit_item'         => __( 'Редактировать категорию' ),
				'update_item'       => __( 'Обновить категорию' ),
				'add_new_item'      => __( 'Добавить новую категорию товара' ),
				'new_item_name'     => __( 'Имя новой категории товара' ),
				'menu_name'         => __( 'Категории товара' ),
			),
			'description' => "Категория товаров для магазина",
			'public' => true,
			'show_ui'       => true,
			'query_var'     => true,
			'show_in_rest'  => true,
			'show_admin_column'     => true,
		));
	
		register_taxonomy('voenstyle', array('voen'), array(
			'hierarchical'  => false,
			'labels'        => array(
				'name'              => "Стиль дизайна",
				'singular_name'     => "Стиль дизайна",
				'search_items'      => "Найти стиль",
				'all_items'         => __( 'Все стили' ),
				'parent_item'       => __( 'Дочерние стили' ),
				'parent_item_colon' => __( 'Дочерние стили:' ),
				'edit_item'         => __( 'Редактировать стиль' ),
				'update_item'       => __( 'Обновить стиль' ),
				'add_new_item'      => __( 'Добавить новый стиль' ),
				'new_item_name'     => __( 'Имя новго стиля товара' ),
				'menu_name'         => __( 'Стили товара' ),
			),
			'description' => "Стиль дизайна товаров",
			'public' => true,
			'show_ui'       => true,
			'query_var'     => true,
			'show_in_rest'  => true,
			'show_admin_column'     => true,
		));
	}
	
	
	add_action('init', 'voen_custom_init');
	
	function voen_custom_init(){
		register_post_type('voen', array(
			'labels'             => array(
				'name'               => 'Продукты', // Основное название типа записи
				'singular_name'      => 'Продукты', // отдельное название записи типа Book
				'add_new'            => 'Добавить новый',
				'add_new_item'       => 'Добавить новый товар',
				'edit_item'          => 'Редактировать товар',
				'new_item'           => 'Новый товар',
				'view_item'          => 'Посмотреть товар',
				'search_items'       => 'Найти товар',
				'not_found'          =>  'Товаров не найдено',
				'not_found_in_trash' => 'В корзине товаров не найдено',
				'parent_item_colon'  => '',
				'menu_name'          => 'Товары'
	
				),
			'taxonomies' => array('voencat'), 
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'show_admin_column'        => true,
			'show_in_quick_edit'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats')
		) );
	}
	
	// _____________________Колонки в таблицу админки
	
	add_filter('manage_posts_columns', 'posts_columns', 5);
	add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
	 
	function posts_columns($defaults){
			$defaults['riv_post_sku'] = __('Артикул');
		$defaults['riv_post_thumbs'] = __('Миниатюра');
		$defaults['riv_post_price'] = __('Цена');
		return $defaults;
	}
	 
	function posts_custom_columns($column_name, $id){
		
		
		if($column_name === 'riv_post_sku'){
			$SKU_t = get_post_meta(get_the_ID(), "_offer_sku", true);
			echo empty($SKU_t)?"-":$SKU_t;
		}
		
		if($column_name === 'riv_post_thumbs'){	
			$img1 = get_the_post_thumbnail_url( get_the_ID(), "thumbnail");
			
			if (empty($img1))
				$img1 = get_bloginfo("template_url")."/img/no-photo.jpg";
			
			echo '<img width = "60" src = "'.$img1.'" />';
				
		
		}
		
		if($column_name === 'riv_post_price'){
			$PRICE = get_post_meta(get_the_ID(), "_offer_price", true);
			echo empty($PRICE)?"0 руб.":$PRICE." руб.";
		}
		
	
	}
	
	add_action( 'wp_ajax_sendagri', 'sendagri' );
	add_action( 'wp_ajax_nopriv_sendagri', 'sendagri' );
	
		function sendagri() {
			if ( empty( $_REQUEST['nonce'] ) ) {
				wp_die( '0' );
			}
			
			if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
				
				$headers = array(
					'From: Сайт '.COMPANY_NAME.' <noreply@agribest.ru>', 
					'content-type: text/html',
				);
			
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
	 
	
				if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заявка с окна: «Заказать звонок»', '<strong>Имя:</strong> '.$_REQUEST["namew"]. ' <br/> <strong>Телефон:</strong> '.$_REQUEST["telw"]. ' <br/> <strong>Email:</strong> '.$_REQUEST["emailw"], $headers))
					wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
				else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>"); 
				
			} else {
				wp_die( 'НО-НО-НО!', '', 403 );
			}
		}



		add_action( 'wp_ajax_send_cart', 'send_cart' );
		add_action( 'wp_ajax_nopriv_send_cart', 'send_cart' );
	
		function send_cart() {
			if ( empty( $_REQUEST['nonce'] ) ) {
				wp_die( '0' );
			}
			
			if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
	
				$headers = array(
					'From: Сайт '.COMPANY_NAME.' <'.MAIL_RESEND.'>',
					'content-type: text/html',
				);
			
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				
				$adr_to_send = carbon_get_theme_option("as_email_send");
				$adr_to_send = (empty($adr_to_send))?"asmi046@gmail.com,s9606741999@yandex.ru":$adr_to_send;
				
				$zak_number = "A".date("H").date("i").date("s").rand(100,999);
	
				$mail_content = "<h1>Заказ на сайте №".$zak_number."</h1>";
				
				$bscet_dec = json_decode(stripcslashes ($_REQUEST["bascet"]));
				
				
	
				$mail_content .= "<table style = 'text-align: left;' width = '100%'>";
					$mail_content .= "<tr>";
						$mail_content .= "<th></th>";
						$mail_content .= "<th>ТОВАР</th>";
						$mail_content .= "<th>КОЛЛИЧЕСТВО</th>";
						$mail_content .= "<th>СУММА</th>";
					$mail_content .= "</tr>";
	
					
	
					for ($i = 0; $i<count($bscet_dec); $i++) {
						$mail_content .= "<tr>";
							$mail_content .= "<td><img src = '".$bscet_dec[$i]->picture."' width = '70' height = '70'></td>";
							$mail_content .= "<td><a href = '".$bscet_dec[$i]->lnk."'>".$bscet_dec[$i]->name." / ".$bscet_dec[$i]->sku."</a></td>";
							$mail_content .= "<td>".$bscet_dec[$i]->count."</td>";
							$mail_content .= "<td>".$bscet_dec[$i]->subtotal." р.</td>";
						$mail_content .= "</tr>";
	
						
	
					}
	
				$mail_content .= "</table>";
				$mail_content .= "<h2>Сумма: ".$_REQUEST["bascetsumm"]." р.</h2>";
	
				$mail_content .= "<strong>Имя:</strong> ".$_REQUEST["name"]."<br/>";
				$mail_content .= "<strong>Телефон:</strong> ".$_REQUEST["phone"]."<br/>";
				$mail_content .= "<strong>e-mail:</strong> ".$_REQUEST["mail"]."<br/>";
				$mail_content .= "<strong>Адрес:</strong> ".$_REQUEST["adres"]."<br/>";
				$mail_content .= "<strong>Комментарий:</strong> ".$_REQUEST["comment"]."<br/>";
				// $mail_content .= "<strong>FTP:</strong> ".($ftprez)?"Загружен":"Не загружен"."<br/>";
	
				$mail_them = "Заказ на сайте 1-й Военторг";
	
	
				
				if (wp_mail($adr_to_send, $mail_them, $mail_content, $headers)) 
				{
	
					wp_die(json_encode(array("send" => true )));
				}
				else {
					wp_die( 'Ошибка отправки!', '', 403 );
				}
				
			} else {
				wp_die( 'НО-НО-НО!', '', 403 );
			}
		}



?>