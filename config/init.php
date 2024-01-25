<?php
// REGEX pour le nom de catégorie 
define('REGEX_NAME_CATEGORY', '^[a-zA-Z0-9 éèàêîôù\-]*$');
define('REGEX_BRAND', '^[a-zA-Zàáčćèéëėìíîï]{2,50}$');
define('REGEX_MODEL', '^[a-zA-Z0-9 ]{2,50}$');
define('REGEX_REGISTRATION', '^[a-zA-Z0-9\-]*$');
define('REGEX_MILEAGE', '^[0-9]{1,7}$');
define('REGEX_NAME', '^[a-zA-Zàáčćèéëėìíîï \'\-]{2,50}$');
define('REGEX_EMAIL', '^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$');

define('REGEX_ZIPCODE', '^[0-9]{5}$');
define('REGEX_CITY', '^[A-Za-zÀ-ÖØ-öø-ÿ\s-]+$');
define('REGEX_DATE', '^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$');
define('REGEX_PHONE', '^0[1-9]\d{8}$');

// config
define('DSN', 'mysql:dbname=rent-my-car;host =localhost');
define('USER', 'admin_rent_my_car');
define('PASSWORD', '!&!F$zAj6jxNzqmH');

// constant
define('ARRAY_TYPES_MIMES', ['image/jpeg', 'image/png']);
define('UPLOAD_MAX_SIZE', 2 * 1024 * 1024);

// PER PAGE
define ('PER_PAGE', 5);