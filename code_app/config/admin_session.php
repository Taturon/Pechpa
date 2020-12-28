<?php

return [

	'cookie' => env('SESSION_COOKIE_ADMIN', str_slug(env('APP_NAME', 'Pechpa'), '_') . '_session'),
	'table' => env('SESSION_TABLE_ADMIN'),

];
