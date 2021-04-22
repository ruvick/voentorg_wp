<?

// Описание полей для Carbon_Fields производим только в этом файле
// 1. В начале идет описание полей - Настройки темы  далее категорий (если необходимо) в конце аблонов страниц и записей
// 2. Префиксы проставляем каждый раз новые осмысленно по имени проекта 
// 3. Для Полей которые входят в состав составново схема именования следующая <Общий префикс>_<название составного поля>_<имя поля>
// 4. Название секций Так же придумываем осмысленные на русском языке чтобы небыло сплошных Доп. полей
// 5. Каждый блок комментируем


use Carbon_Fields\Container;
use Carbon_Fields\Field; 

Container::make( 'theme_options', 'as_theme_options', 'Настройки темы' )
    ->add_tab('Главная', array(
      Field::make( 'image', 'as_logo', 'Логотип в шапке')
        ->set_width(30),
      Field::make( 'image', 'as_logo_white', 'Логотип в подвале')
        ->set_width(30),
      Field::make('text', 'about_home_title', 'Заголовок на главной'),
      Field::make('rich_text', 'about_home', 'О нашей компании')
    ))
    ->add_tab('Баннер', array(
      Field::make('complex', 'auto_banner', 'Баннер на главной')
        ->add_fields(array(
          Field::make('image', 'auto_banner_img', 'Картинка')
            ->set_width(30),
          Field::make('text', 'auto_banner_title', 'Заголовок на главной')
            ->set_width(30),
          Field::make('text', 'auto_banner_subtitle', 'Подзаголовок на главной')
            ->set_width(30),
        ))
    ))
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_company', __( 'Название' ) )
          ->set_width(50),
        // Field::make( 'text', 'as_schedule', __( 'Режим работы' ) )
        //   ->set_width(50),
        Field::make( 'text', 'as_phones_1', __( 'Телефон' ) )
          ->set_width(50),
        Field::make( 'text', 'as_phone_2', __( 'Телефон дополнительный' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email', __( 'Email' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email_send', __( 'Email для отправки' ) )
          ->set_width(50),
        Field::make( 'text', 'as_inn', __( 'ИНН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_orgn', __( 'ОРГН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_kpp', __( 'КПП' ) )
          ->set_width(50),
        Field::make( 'text', 'as_address', __( 'Адрес' ) )
          ->set_width(50),
        Field::make( 'text', 'as_bik', __( 'БИК' ) )
          ->set_width(50),
        Field::make( 'text', 'as_rs', __( 'Р/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_ks', __( 'К/С' ) )
          ->set_width(50),
        // Field::make( 'text', 'as_insta', __( 'instagram' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_face', __( 'facebook' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_vk', __( 'Вконтакте' ) )
        //   ->set_width(50),
        // Field::make( 'text', 'as_telegr', __( 'telegram' ) )
        //   ->set_width(50),
        Field::make('text', 'map_point', 'Координаты карты')
          ->set_width(50),
        Field::make('text', 'text_map', 'Текст метки карты')
          ->set_width(50),
    ) );
    
Container::make('post_meta', 'voen_product_cr', 'Характеристики товара')
    ->show_on_post_type(array( 'voen'))
      ->add_fields(array(   
      Field::make('textarea', 'offer_smile_descr', 'Краткое описание')->set_width(100),
      Field::make('text', 'offer_name', 'Название товара')->set_width(30),
      Field::make('text', 'offer_label', 'Метка на товаре')->set_width(30),
      Field::make('text', 'offer_manufact', 'Производитель')->set_width(50),
      Field::make('text', 'offer_allsearch', 'Все артикулы для поиска')->set_width(50),
      Field::make('text', 'offer_siries', 'Серия (для сопутствующих)')->set_width(30),
      Field::make('select', 'offer_type', 'Тип светильника')->add_options( array(
        '0' => 'Не задано',
        'Светодиодный (LED)' => 'Светодиодный (LED)',
        'Цокольный (Со сменными лампами)' => 'Цокольный (Со сменными лампами)'
      ) )->set_width(100),

      Field::make('text', 'offer_sku', 'Артикул (Базовый)')->set_width(50),
      Field::make('text', 'offer_nal', 'Наличие на складе')->set_default_value( 'В наличии')->set_width(50), 

      Field::make('text', 'offer_sticker', 'Стикер')->set_width(50),
      Field::make('text', 'offer_benefit', 'Выгода')->set_width(50),
      
      Field::make( 'complex', 'offer_cherecter', "Характеристики товара" )
      ->add_fields( array(
        Field::make( 'text', 'c_name', 'Наименование параметра' )->set_width(50),
        Field::make( 'text', 'c_val',  'Значение' )->set_width(50),
      ) ),

      Field::make('text', 'offer_price', 'Цена (Базовая)')->set_width(50),
      Field::make('text', 'offer_old_price', 'Старая цена (Базовая)')->set_width(50),
      
      Field::make( 'complex', 'offer_modification', "Модификация товара" )
      ->add_fields( array(
        Field::make('text', 'mod_name', 'Наименование модификации' )->set_width(20),
        Field::make('text', 'mod_sku', 'Артикул модификации')->set_width(20),
        Field::make('text', 'mod_price', 'Цена модификации')->set_width(20),
        Field::make('text', 'mod_old_price', 'Старая цена модификации')->set_width(20),
        Field::make('text', 'mod_picture_id', 'Изображения модификации')->set_width(20),
      ) ),
        
      Field::make( 'complex', 'offer_picture', "Галерея товара" )
      ->add_fields( array(
        Field::make('image', 'gal_img', 'Изображение' )->set_width(30),
        Field::make('text', 'gal_img_sku', 'ID для модификации')->set_width(30),
        Field::make('text', 'gal_img_alt', 'alt и title')->set_width(30)        
      ) ),

      Field::make('rich_text', 'offer_fulltext', 'Полное описание (SEO)')->set_width(50),

      Field::make( 'complex', 'offer_rev', "Отзывы о товаре" )
      ->add_fields( array(
        Field::make('text', 'rev_name', 'Имя' )->set_width(20),
        Field::make('text', 'rev_mail', 'e-mail' )->set_width(20),
        Field::make('date', 'rev_date', 'Дата отзыва' )->set_width(20),
        Field::make('select', 'rev_reiting', 'Оценка' )->add_options( array(
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4',
          '5' => '5'
        ) )->set_width(20),
        Field::make('rich_text', 'rev_text', 'Текст отзыва')->set_width(100),
        Field::make('rich_text', 'rev_otv', 'Ответ')->set_width(100)        
      ) ),
      
      
      
      ));

      
?>