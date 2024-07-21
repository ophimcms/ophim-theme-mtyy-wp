<?php

define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');
define('WIDGET', THEME_URL . '/widget');
define('SIDEBARTEMPLADE', THEME_URL . '/templates/rightbar');
define('THEMETEMPLADE', THEME_URL . '/templates');


require_once(CORE . '/init.php');
require_once(THEME_URL . '/inc/demo.php');
require_once(THEME_URL . '/inc/register_sidebar.php');
require_once(THEME_URL . '/inc/ajax.php');
require_once(THEME_URL . '/inc/front.php');
require_once(WIDGET . '/wg_ophim_categories.php');
require_once(WIDGET . '/wg_ophim_slide_poster.php');
require_once(WIDGET . '/wg_ophim_slide_thumb.php');
require_once(WIDGET . '/wg_ophim_footer.php');
