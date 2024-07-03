<?php

use App\Kernel;
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Credentials:true');
require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
