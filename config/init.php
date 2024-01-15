<?php
// REGEX pour le nom de catégorie 
define('REGEX_NAME_CATEGORY', '^[a-zA-Zàáčćèéëėìíîï \'\-]{2,50}$');
define('REGEX_BRAND', '^[a-zA-Zàáčćèéëėìíîï]{2,50}$');
define('REGEX_MODEL', '^[a-zA-Z0-9 ]{2,50}$');
define('REGEX_REGISTRATION', '^[a-zA-Z0-9-]{2,50}$');
define('REGEX_MILEAGE', '^[0-9]{1,7}$');

// config
define('DSN', 'mysql:dbname=rent-my-car;host =localhost');
define('USER', 'admin_rent_my_car');
define('PASSWORD', '!&!F$zAj6jxNzqmH');

// constant
define('ARRAY_TYPES_MIMES', ['image/jpeg', 'image/png']);
define('UPLOAD_MAX_SIZE', 2 * 1024 * 1024);
