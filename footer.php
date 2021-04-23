  <footer id="footer" class="footer">
    <div class='container'>
      <div class="footer__row d-flex">
        
        <div class="footer-menu">
          <ul>
            <li>ИП Ваганова Л.Ю.</li>
            <li>ИНН: 463243717316</li>
            <li>ОГРН: 318463200015264</li>
          </ul>
          <p class="footer__policy"><a href="<?php echo get_permalink(88);?>">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a></p>
          <p class="footer__developer"><a href="https://asmi-studio.ru">Разработка сайта: Asmi-Studio.ru</a></p>
        </div>

        <div class="footer-menu">
          <?php wp_nav_menu( array('theme_location' => 'menu_corp','menu_class' => 'header-top__menu','container_class' => 'header-top__menu','container' => false )); ?>
        </div>

        <div class="footer-menu">
          <ul>
            <li>Звоните в любой день с 9:00 до 21:00</li>
            <li>Заказывайте через сайт в любое время суток</li>
          </ul>
          <div class="header__callback callback d-flex">
            <p><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="callback__phone"><? echo $tel = carbon_get_theme_option("as_phones_1"); ?></a></p>
            <a href="#" class="callback__popup">ЗАКАЗАТЬ ЗВОНОК</a>
          </div>
        </div>

      </div>
    </div>
  </footer> 
</div>

<?php wp_footer(); ?> 

</body>
</html> 
