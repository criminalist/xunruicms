<?php
declare(strict_types=1);
header('Content-Type: text/html; charset=utf-8');

//Режим разработчика (1 вкл., 0 выкл.)
define('IS_DEV', 1);

//Редактирование шаблонов из панели управления
define('IS_EDIT_TPL', 1);

// Корневой каталог сайта
define('ROOTPATH', dirname(__FILE__).'/');

// Каталог текущего сайта
!defined('WEBPATH') && define('WEBPATH', dirname(__FILE__).'/');

// Кэширование файлового хранилища каталогов, поддержка пользовательских путей, рекомендуется, чтобы SSD хранилища кэшировали файлы
define('WRITEPATH', ROOTPATH.'cache/');
// Системная директория ядра, поддерживается переименование и пользовательские пути
define('FCPATH', dirname(__FILE__).'/dayrui/');
!defined('SELF') && define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
!defined('IS_ADMIN') && define('IS_ADMIN', FALSE);

// Показать сообщение об ошибке
IS_ADMIN || IS_DEV ? error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT) : error_reporting(0);

if (!is_file(WRITEPATH.'install.lock') && !isset($_GET['c'])) {
	require WEBPATH.'install.php';
	exit;
}
//Инициализация фреймворка
require FCPATH.'Fcms/Init.php';