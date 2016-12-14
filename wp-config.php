<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'paramedi_shop');

/** Имя пользователя MySQL */
define('DB_USER', 'paramedi_shop');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'RomA1941-1945');

/** Имя сервера MySQL */
define('DB_HOST', 'paramedi.mysql.ukraine.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'KnH7(j+KR]sx,@N1!<,(vzHu.]BFWVT~iZ4T& yq3eQjIX_hT7BC2<e7M.jph,wa');
define('SECURE_AUTH_KEY',  'xpUlY-}L&N<l$)A`Xq80fJI~@/z|!_1U;H];ShsF?ojK-)Q-$J9.@^9`F.o]o[Uu');
define('LOGGED_IN_KEY',    'L{B3NQ^NK{l; *pZJC+bJ.7cae|J0+ez6w$[iXQq`S(r,FZpS9`[2-C!Gsul:[4K');
define('NONCE_KEY',        'ft$x6zT#R2<#_(*2Nq!._O;_Z w5MY10r&]0AOj9NdeX+5f-.K!pF-.JC&E,!|L=');
define('AUTH_SALT',        ',t8(tBbCO/T,%UyITwePv2e1a|`=z_K+!mgVw~/pg#gHgkYAB|fLo|5oO{  c3o:');
define('SECURE_AUTH_SALT', '|2X+3E%,QoL^Xo9@dR)]`HedJ+y9LZI1#y]r>f]QcvS^!/|*1na7]x{7Zksl?}>l');
define('LOGGED_IN_SALT',   'Yb9Q!SrG[3Wu6-S{niUn/^,(DAQ0w,M)Vy|n2Ad(m>^Fy`-G{W|dNi00g8>2){YU');
define('NONCE_SALT',       'dJh2S1t]s_2CMswtb8IRRM3uhgqzm5,x(Fn#um.<R)-quGEnFfW*^HZFw 2V^vhR');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'parawp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
