<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'cl93841_kolswp');
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/** Имя пользователя MySQL */
define('DB_USER', 'cl93841_kolswp');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'eR3YsnhN');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4'); 

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+,5VxL{@XODS@OS3!i@}/CaXP`b^;B>w=B+);80l8{0C&[<3(j61kw8PN2K*G+(c');
define('SECURE_AUTH_KEY',  '_!Q52`k{;{M|PVM9j_IGafJg[pk7:i9jC-Q+0k>i5u7&={c2:DJ.:eci*cPS`5_Z');
define('LOGGED_IN_KEY',    '/H(U_MeR.ry8#D~$86]/bniV<Fb&Q#CR*CrvP5@<>`GKG~i`0s^PD1+:^!K!u<|^');
define('NONCE_KEY',        '=F!o(4u`[tj>f,>-6(pM]U)P:Qn%1[4mBu:bPza)-C>u4eqif.-7oHqO2@oCUz&U');
define('AUTH_SALT',        'q[wHR/$e*Wfd]j*cuXdmzR4eNH!U|Xr07i|x91|cc(-z6.&2,U2 QP$)HYZ% 9o-');
define('SECURE_AUTH_SALT', 'j@UsKsa9UK#%W_7L@h9r{S.yK/?bm@9JXFrp)7s|<8WV[+[Ri1j/sPa|.7rN0Mlz');
define('LOGGED_IN_SALT',   '#B.|7dV07W|(5L>uN~0J ~Dyf$Nw-`@kSdKn47DAIyAe-Wbt@ua:1hfTa{GMX3<8');
define('NONCE_SALT',       '2(wWaZ]X39>4DjVbKQ!+/@DeOCK?l_F!xdhU@lCp}fo=w:TYXJ.`T`N!,&b4.O]T');
define( 'WP_MEMORY_LIMIT', '256M' );
define('WP_POST_REVISIONS', false);

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
