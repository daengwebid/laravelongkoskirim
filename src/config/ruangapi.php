<?php

return [
	/*
    | Dokumentasi : https://ruangapi.com/dokumentasi/ongkos-kirim
    */

	'ruangapi_shipping' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/shipping'),
	'ruangapi_province' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/provinces'),
	'ruangapi_city' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/cities'),
	'ruangapi_district' => env('RUANGAPI_SHIPPING', 'https://ruangapi.com/api/v1/districts'),

	/*
    | Isi dengan APIKey yang didapatkan dari RuangAPI
    |
    */

	'api_key' => env('RUANGAPI_KEY', ''),
];