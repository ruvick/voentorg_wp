<?php
/**
 * voentorg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package voentorg
 */

define("COMPANY_NAME", "Магазин Военторг");
define("MAIL_RESEND", "noreply@agribest.ru");

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


if ( ! defined( '_S_VERSION' ) ) { 
	// Replace the version number of the theme on each release. 
	define( '_S_VERSION', '1.0.1' ); 
}

if ( ! function_exists( 'voentorg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function voentorg_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lipsky, use a find and replace
		 * to change 'lipsky' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'voentorg', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' ); 

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
// add_action( 'after_setup_theme', function(){
// 	register_nav_menus( [
// 		'menu-1' => 'Меню в шапке',
// 		'menu-2' => 'Мобильное меню',
// 	] ); 
// } );
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'voentorg_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'voentorg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function voentorg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'voentorg_content_width', 640 );
}
// add_action( 'after_setup_theme', 'voentorg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function voentorg_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'voentorg' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'voentorg' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}


// Подключение стилей и nonce для Ajax в админку 
add_action('admin_head', 'my_assets_admin');
function my_assets_admin(){
	wp_enqueue_style("style-adm",get_template_directory_uri()."/style-admin.css");
	
	wp_localize_script( 'jquery', 'allAjax', array(
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
}

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 
define("ALL_VERSION", "1.0.5");
add_action( 'wp_enqueue_scripts', 'my_assets' );
	function my_assets() {

		// Подключение стилей 
		wp_enqueue_style("style-modal", get_template_directory_uri()."/css/jquery.arcticmodal-0.3.css", array(), ALL_VERSION, 'all'); //Модальные окна (стили)

		wp_enqueue_style("voentorg-fancybox", get_template_directory_uri()."/css/fancybox.css", array(), $style_version, 'all'); 
	
		wp_enqueue_style("main-style", get_stylesheet_uri(), array(), ALL_VERSION, 'all' ); // Подключение основных стилей в самом конце

		// Подключение скриптов
		
		wp_enqueue_script( 'jquery'); 

		wp_enqueue_script( 'amodal', get_template_directory_uri().'/js/jquery.arcticmodal-0.3.min.js', array(), ALL_VERSION , true); //Модальные окна

		wp_enqueue_script( 'voentorg-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '1.0', true ); 

		wp_enqueue_script( 'voentorg-inputmask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array(), 1.0, true );
	
		wp_enqueue_script( 'voentorg-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0', true ); 
	
		wp_enqueue_script( 'voentorg-main', get_template_directory_uri() . '/js/main.js', array(), 1.0, true );
		
		
		wp_localize_script( 'main', 'allAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
		) );
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


// Отправщик на почту
// add_action( 'wp_ajax_send_work', 'send_work' );
// add_action( 'wp_ajax_nopriv_send_work', 'send_work' );

//   function send_work() {
//     if ( empty( $_REQUEST['nonce'] ) ) {
//       wp_die( '0' );
//     }
    
//     if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
      
//       $headers = array(
//         'From: Сайт «ЛИПСКИЙ И ПАРТНЕРЫ» <noreply@lipskiy-konsalting.ru>',
//         'content-type: text/html',
//       );
    
//       add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
//       if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заявка с сайта «ЛИПСКИЙ И ПАРТНЕРЫ»', '<strong>Имя:</strong> '.$_REQUEST["name"]. '<br/> <strong>E-mail:</strong> '.$_REQUEST["email"]. ' <br/> <strong>Телефон:</strong> '.$_REQUEST["tel"], $headers))
//         wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
//       else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
      
//     } else {
//       wp_die( 'НО-НО-НО!', '', 403 );
//     }
//   }

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