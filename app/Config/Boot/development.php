<?php
/*
  |--------------------------------------------------------------------------
  | ERROR DISPLAY
  |--------------------------------------------------------------------------
  | In development, we want to show as many errors as possible to help
  | make sure they don't make it to production. And save us hours of
  | painful debugging.
 */
// PHP 8.2 + CodeIgniter 4.0.4 (app lama, target PHP 7.x):
//  - E_DEPRECATED  : mis. "Creation of dynamic property"
//  - E_WARNING/NOTICE: mis. "Attempt to read property ... on null" saat tabel DB kosong
// Error handler CI mengubah semua ini jadi fatal di mode development, jadi dikecualikan
// agar app tetap jalan. Error fatal asli & exception (mis. mysqli) tetap ditampilkan.
// Setelah data asli diimpor, peringatan null-access ini umumnya hilang dengan sendirinya.
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED & ~E_WARNING & ~E_USER_WARNING & ~E_NOTICE & ~E_USER_NOTICE);
ini_set('display_errors', '1');

/*
  |--------------------------------------------------------------------------
  | DEBUG BACKTRACES
  |--------------------------------------------------------------------------
  | If true, this constant will tell the error screens to display debug
  | backtraces along with the other error information. If you would
  | prefer to not see this, set this value to false.
 */
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

/*
  |--------------------------------------------------------------------------
  | DEBUG MODE
  |--------------------------------------------------------------------------
  | Debug mode is an experimental flag that can allow changes throughout
  | the system. This will control whether Kint is loaded, and a few other
  | items. It can always be used within your own application too.
 */

defined('CI_DEBUG') || define('CI_DEBUG', true);
